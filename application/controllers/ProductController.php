<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		check_login();
		$this->load->model('Mdl_product');
	}

	public function productList(){
		$sendHeader['title'] = 'Product List';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$send['products'] = $this->Mdl_product->getAll();
		$this->load->view('products/productList',$send);
		$this->load->view('includes/footer');
	}

	public function addProduct(){
		check_admin_privilege();
		$send = array();
		if($_POST){
			$this->form_validation->set_rules('name','Name','trim|required|max_length[50]');
			$this->form_validation->set_rules('price','Price','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {
				$saveData = array(
					'name' => $this->input->post('name'),
					'price_wholesale' => $this->input->post('price'),
					'price_retail' => $this->input->post('price'),
					'created_at' => date('Y-m-d h:i:s'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				if($this->Mdl_product->save($saveData)){
					$this->session->set_userdata('msg_success','Product created successfully');
					redirect('productList');
				}
			}
		}
		$sendHeader['title'] = "Add Product";
		$this->load->model('Mdl_vendor');
		$send['vendors'] = $this->Mdl_vendor->getAll();
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$this->load->view('products/addProduct',$send);
		$this->load->view('includes/footer');
	}

	public function editProduct(){
		check_admin_privilege();
		$id = $this->uri->segment(2);
		if($_POST){
			$this->form_validation->set_rules('name','Name','trim|required|max_length[50]');
			$this->form_validation->set_rules('price','Price','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {
				$saveData = array(
					'name' => $this->input->post('name'),
					'price' => $this->input->post('price'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				$id = $this->input->post('id');
				if(empty($id)){
					$this->session->set_userdata('msg_error','Product could not be updated!! Unknown Product');
				} else {
					if($this->Mdl_product->update(array('id'=>$id),$saveData)){
						$this->session->set_userdata('msg_success','Product updated successfully.');
					} else {
						$this->session->set_userdata('msg_error','Product could not be updated!!');
					}
				}
				redirect('productList');
			}
		}
		$sendHeader['title'] = 'Edit Product';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$send['product'] = $this->Mdl_product->getById($id);
		$this->load->model('Mdl_vendor');
		$send['vendors'] = $this->Mdl_vendor->getAll();
		$this->load->view('products/editProduct',$send);
		$this->load->view('includes/footer');
	}

	public function deleteProduct(){
		check_admin_privilege();
		$id = $this->uri->segment(2);
		if($this->Mdl_product->delete(array('id'=>$id))){
			$this->session->set_userdata('msg_success','Data deleted successfully.');
		} else {
			$this->session->set_userdata('msg_error','Data could not be deleted.');
		}
		redirect('productList');
	}
}
