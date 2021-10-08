<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Mdl_user');
	}
	public function index(){
		if($this->session->userdata('logged_in') === TRUE){
			redirect('/home');
		}
		if($_POST){
			$this->form_validation->set_rules('username','UserName/Email','trim|required|max_length[100]|min_length[6]|valid_email',array('required'=>'Username/email is required.'));
			$this->form_validation->set_rules('password','Password','trim|required|max_length[50]|min_length[6]');
			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			} else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$return = $this->Mdl_user->check_login($username,$password);
				if($return){
					if($return['error'] === 0){
						if($this->input->post('remember_me')){
							set_cookie('user_name',$username,'100000',$_SERVER['HTTP_HOST'],'/codeigniter');
							set_cookie('pass_word',$password,'100000',$_SERVER['HTTP_HOST'],'/codeigniter');
						} else {
							delete_cookie('user_name',$_SERVER['HTTP_HOST'],'/codeigniter');
							delete_cookie('pass_word',$_SERVER['HTTP_HOST'],'/codeigniter');
						}
						redirect('/home');
					}
					elseif($return['error'] === 1){
						$send['msg_err'] = 'Wrong Password. Please try again.';
					}
					elseif ($return['error'] === 2){
						$send['msg_err'] = 'No such username found';
					}
				} else {
					$send['msg_err'] = 'Internal Error';
				}
			}
		}
		$send['title'] = 'Login';
		$send['css'] = array('global-style','bootstrap.min');
		$send['js'] = array('jquery-3.6.0.min','bootstrap.min');
		$this->load->view('includes/header',$send);
		$this->load->view('login',$send);
		$this->load->view('includes/footer');
	}

	public function addUser(){
		if($_POST){
			$this->form_validation->set_rules('first_name','First name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules('user_name','User name','trim|required|max_length[50]|min_length[6]');
			$this->form_validation->set_rules('password','Password','trim|required|max_length[50]|min_length[6]');
			$this->form_validation->set_rules('confirm_password','Confirm password','trim|required|matches[password]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('address','Address','trim|required');
			$this->form_validation->set_rules('contact_no','Contact Number','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {

			}
		}
		$send['title'] = "Add User";
		$this->load->view('includes/header',$send);
		$this->load->view('includes/navbar');
		$this->load->view('addUser');
		$this->load->view('includes/footer');
	}

	public function userList(){

	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_email');
		$this->session->sess_destroy();
		redirect('/login');
	}

}
