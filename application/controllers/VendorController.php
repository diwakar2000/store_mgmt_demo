<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		check_login();
		check_admin_privilege();
		$this->load->model('Mdl_vendor');
	}

	public function vendorList(){
		check_login();
		check_admin_privilege();
		$sendHeader['title'] = 'Vendor List';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$send['vendors'] = $this->Mdl_vendor->getAll();
		$this->load->view('vendor/vendorList',$send);
		$this->load->view('includes/footer');
	}

	public function addVendor(){
		check_login();
		check_admin_privilege();
		$send = array();
		if($_POST){
			$this->form_validation->set_rules('name','Name','trim|required|max_length[100]');
			$this->form_validation->set_rules('address','Address','trim|required|max_length[50]');
			$this->form_validation->set_rules('contact_no','Contact Number','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {
				$saveData = array(
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'contact_no' => $this->input->post('contact_no'),
					'created_by' => $this->session->userdata('user_id'),
					'created_at' => date('Y-m-d h:i:s'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				if($this->Mdl_vendor->save($saveData)){
					$this->session->set_userdata('msg_success','Vendor created successfully');
				} else {
					$this->session->set_userdata('msg_error','Vendor could not be created!!');
				}
				redirect('home');
			}
		}
		$sendHeader['title'] = "Add User";
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$this->load->view('vendor/addVendor',$send);
		$this->load->view('includes/footer');
	}

	public function editVendor(){
		$id = $this->uri->segment(2);
		if($_POST){
			$this->form_validation->set_rules('name','Name','trim|required|max_length[100]');
			$this->form_validation->set_rules('address','Address','trim|required|max_length[50]');
			$this->form_validation->set_rules('contact_no','Contact Number','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {
				$saveData = array(
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'contact_no' => $this->input->post('contact_no'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				$id = $this->input->post('id');
				if(empty($id)){
					$this->session->set_userdata('msg_error','Vendor could not be updated!! Unknown Vendor');
				} else {
					if($this->Mdl_vendor->update(array('id'=>$id),$saveData)){
						$this->session->set_userdata('msg_success','Vendor updated successfully.');
					} else {
						$this->session->set_userdata('msg_error','Vendor could not be updated!!');
					}
				}
				redirect('vendorList');
			}
		}
		$sendHeader['title'] = 'Edit Vendor';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$send['vendor'] = $this->Mdl_vendor->getById($id);
		$this->load->view('vendor/editVendor',$send);
		$this->load->view('includes/footer');
	}

	public function deleteVendor(){
		check_login();
		check_admin_privilege();
		$id = $this->uri->segment(2);
		if($this->Mdl_vendor->delete(array('id'=>$id))){
			$this->session->set_userdata('msg_success','Data deleted successfully.');
		} else {
			$this->session->set_userdata('msg_error','Data could not be deleted.');
		}
		redirect('vendorList');
	}
}


