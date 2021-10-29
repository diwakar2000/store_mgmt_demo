<?php

class TransactionController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		check_login();
	}

	public function dailyTransaction(){
		$send = array();
		if($_POST){
			$this->form_validation->set_rules('product_id','Product Name','trim|required');
			$this->form_validation->set_rules('quantity','Quantity','trim|required');

			if($this->form_validation->run() === FALSE){
				$send['errors'] = validation_errors();
			} else {
				$product_id = $this->input->post('product_id');
				$quantity = $this->input->post('quantity');
				$payment_type = $this->input->post('payment_type');
				$this->load->model('Mdl_product');
				$product_info = $this->Mdl_product->getById($product_id);
				$price = ($this->input->post('sale_mode') === 'wholesale') ? $product_info->price_wholesale : $product_info->price_retail;
				if( $payment_type == 'cash'){
					$this->form_validation->set_rules('cash','Cash','trim|required');
					$cash = $price * $quantity;
					$credit = 0;
				} elseif($payment_type == 'credit'){
					$this->form_validation->set_rules('credit','Credit','trim|required');
					$this->form_validation->set_rules('customer_id','Customer Name','trim|required');
					$credit = $price * $quantity;
					$cash = 0;
				} elseif($payment_type == 'both') {
					$this->form_validation->set_rules('cash','Cash','trim|required');
					$cash = $this->input->post('cash');
					$credit = ($price * $quantity) - $cash;
				}
				$saveData = array(
					'product_id' => $product_id,
					'quantity' => $quantity,
					'customer_id' => $this->input->post('customer_id'),
					'user_id' => $this->session->userdata('user_id'),
					'date' => date('Y-m-d h:i:s'),
					'cash' => $cash,
					'credit' => $credit
				);
				if($this->Mdl_customer->save($saveData)){
					$this->session->set_userdata('msg_success','Customer created successfully');
					redirect('customerList');
				}
			}
		}
		$sendHeader['title'] = 'Daily Transaction';
		$this->load->view('includes/header',$sendHeader);
		$this->load->view('includes/navbar');
		$this->load->model('Mdl_product');
		$this->load->model('Mdl_customer');
		$send['products'] = $this->Mdl_product->getAll();
		$send['customers'] = $this->Mdl_customer->getAll();
		$this->load->view('dailyTransaction',$send);
		$this->load->view('includes/footer');
	}

}
