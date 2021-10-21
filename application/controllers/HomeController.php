<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		check_login();
		$send['title'] = 'Home';
		$this->load->view('includes/header',$send);
		$this->load->view('includes/navbar');
		$this->load->view('home');
		$this->load->view('includes/footer');
	}
}
