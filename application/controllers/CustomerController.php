<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		check_login();
		check_admin_privilege();
		$this->load->model('Mdl_customer');
	}

	public function customerList(){
		check_login();
		check_admin_privilege();
		$sendHeader['title'] = 'Customer List';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$send['customers'] = $this->Mdl_customer->getAll();
		$this->load->view('customer/customerList',$send);
		$this->load->view('includes/footer');
	}

	public function addCustomer(){
		check_login();
		check_admin_privilege();
		$send = array();
		if($_POST){
			$this->form_validation->set_rules('first_name','First Name','trim|required|max_length[50]');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[50]');
			$this->form_validation->set_rules('address','Address','trim|required|max_length[50]');
			$this->form_validation->set_rules('contact_no','Contact Number','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			} else {
				$saveData = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'address' => $this->input->post('address'),
					'contact_no' => $this->input->post('contact_no'),
					'created_by' => $this->session->userdata('user_id'),
					'created_at' => date('Y-m-d h:i:s'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				if($this->Mdl_customer->save($saveData)){
					$this->session->set_userdata('msg_success','Customer created successfully');
					redirect('customerList');
				}
			}
		}
		$sendHeader['title'] = "Add Customer";
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$this->load->view('customer/addCustomer',$send);
		$this->load->view('includes/footer');
	}

	public function editCustomer(){
		$id = $this->uri->segment(2);
		if($_POST){
			$this->form_validation->set_rules('first_name','First Name','trim|required|max_length[50]');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[50]');
			$this->form_validation->set_rules('address','Address','trim|required|max_length[50]');
			$this->form_validation->set_rules('contact_no','Contact Number','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {
				$saveData = array(
					'first_name' => $this->input->post('first_name'),
					'last_time' => $this->input->post('last_time'),
					'address' => $this->input->post('address'),
					'contact_no' => $this->input->post('contact_no'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				if($this->Mdl_customer->save($saveData)){
					$this->session->set_userdata('msg_success','Customer created successfully');
				}
				else {
					$this->session->set_userdata('msg_success','Customer could not be created!!');
				}
				redirect('home');
			}
		}
		$sendHeader['title'] = 'Edit Customer';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$send['customer'] = $this->Mdl_customer->getById($id);
		$this->load->view('customer/editCustomer',$send);
		$this->load->view('includes/footer');
	}

	public function deleteCustomer(){
		check_login();
		check_admin_privilege();
		$id = $this->uri->segment(2);
		if($this->Mdl_customer->delete(array('id'=>$id))){
			$this->session->set_userdata('msg_success','Data deleted successfully.');
		} else {
			$this->session->set_userdata('msg_error','Data could not be deleted.');
		}
		redirect('customerList');
	}
}
