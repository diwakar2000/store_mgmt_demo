<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Mdl_user');
	}
	public function index(){
		if($this->session->has_userdata('logged_in')){
			redirect('/home');
		}
		if($_POST){
			$this->form_validation->set_rules('username','UserName/Email','trim|required|max_length[100]|min_length[6]',array('required'=>'Username/email is required.'));
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
						redirect('home');
//						if(isset($_SERVER['HTTP_REFERER'])){
//							$host = parse_url($_SERVER['HTTP_REFERER'],PHP_URL_HOST);
//							if($host == 'localhost' || $host == '127.0.0.1'){
//								header($_SERVER['HTTP_REFERER']);
//							}
//						} else {
//						}
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
		check_login();
		check_admin_privilege();
		$send = array();
		if($_POST){

			$this->form_validation->set_rules('first_name','First name','trim|required|max_length[20]');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[20]');
			$this->form_validation->set_rules('user_name','User name','trim|required|max_length[20]|min_length[6]');
			$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[6]');
			$this->form_validation->set_rules('confirm_password','Confirm password','trim|required|matches[password]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('address','Address','trim|required|max_length[50]');
			$this->form_validation->set_rules('contact_no','Contact Number','trim|required|max_length[14]');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {
				$saveData = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'user_name' => $this->input->post('user_name'),
					'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'contact_no' => $this->input->post('contact_no'),
					'user_type' => 2,
					'created_at' => date('Y-m-d h:i:s'),
					'created_by' => $this->session->userdata('user_id'),
					'updated_at' => date('Y-m-d h:i:s'),
					'login_attempts' => 0,
					'disabled' => 0
				);
				if($this->Mdl_user->save($saveData)){
					$this->session->set_userdata('msg_success','User created successfully');
					redirect('home');
				}
			}
		}
		$sendHeader['title'] = "Add User";
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$this->load->view('users/addUser',$send);
		$this->load->view('includes/footer');
	}

	public function userList(){
		check_login();
		check_admin_privilege();
		$send['title'] = 'User List';
		$this->load->view('includes/header',$send);
		$this->load->view('includes/navbar');
		$send['users'] = $this->Mdl_user->getAll();
		$this->load->view('users/userList',$send);
		$this->load->view('includes/footer');
	}

	public function editUser(){
		check_login();
		check_admin_privilege();
		$id = $this->uri->segment(2);
		if($_POST){
			$this->form_validation->set_rules('first_name','First name','trim|required|max_length[20]');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[20]');
			$this->form_validation->set_rules('user_name','User name','trim|required|max_length[20]|min_length[6]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('address','Address','trim|required|max_length[50]');
			$this->form_validation->set_rules('contact_no','Contact Number','trim|required|max_length[14]');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			}
			else {
				$saveData = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'user_name' => $this->input->post('user_name'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'contact_no' => $this->input->post('contact_no'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				$id = $this->input->post('id');
				if(empty($id)){
					$this->session->set_userdata('msg_error','User could not be updated!! Unknown User');
				} else {
					if($this->Mdl_user->update(array('id'=>$id),$saveData)){
						$this->session->set_userdata('msg_success','User updated successfully.');
					} else {
						$this->session->set_userdata('msg_error','User could not be updated!!');
					}
				}
				redirect('userList');
			}
		}
		$sendHeader['title'] = 'Edit User';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$send['user'] = $this->Mdl_user->getById($id);
		$this->load->view('users/editUser',$send);
		$this->load->view('includes/footer');
	}

	public function deleteUser(){
		check_login();
		check_admin_privilege();
		$id = $this->uri->segment(2);
		if($this->Mdl_user->delete(array('id'=>$id))){
			$this->session->set_userdata('msg_success','Data deleted successfully.');
		} else {
			$this->session->set_userdata('msg_error','Data could not be deleted.');
		}
		redirect('userList');
	}

	public function userDetails(){
		$send['title'] = 'User Info';
		$this->load->view('includes/header',$send);
		$this->load->view('includes/navbar');
		$send['user'] = $this->Mdl_user->getById($this->session->userdata('user_id'));
		$this->load->view('userInfo',$send);
		$this->load->view('includes/footer');
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
