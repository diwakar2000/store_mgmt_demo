<?php

function check_login(){
	$CI = & get_instance();
	if(!$CI->session->has_userdata('logged_in')){
		$CI->session->set_userdata('redirect_site',$_SERVER['PATH_INFO']);
		redirect('login');
	}
}

function check_admin_privilege(){
	$CI = & get_instance();
	if($CI->session->userdata('user_type') != '1'){
		$CI->session->set_userdata('msg_error','Action not allowed.');
		redirect('home');
	}
}
