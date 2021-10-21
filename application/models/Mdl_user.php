<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_user extends CI_Model
{
	private $_tableName = 'users';
	public function __construct()
	{
		parent::__construct();
	}

	public function check_login($login,$passw){
		$this->db->where('user_name',$login);
		$this->db->or_where('email',$login);
		$user_row = $this->db->get($this->_tableName)->row();
		if($user_row){
			if(password_verify($passw, $user_row->password)){
				$this->update(array('id'=>$user_row->id),array('login_attempts' => 0 ));
				$this->update(array('id'=>$user_row->id),array('last_login' => date('Y-m-d h:i:s') ));
				$this->session->set_userdata('logged_in',TRUE);
				$this->session->set_userdata('user_id',$user_row->id);
				$this->session->set_userdata('user_type',$user_row->user_type);
				$this->session->set_userdata('user_name',$user_row->user_name);
				$this->session->set_userdata('user_email',$user_row->email);
				return array('error'=>0);
			} else {
				$this->update(array('id'=>$user_row->id),array('login_attempts' => ($user_row->login_attempts + 1) ));
				return array('error'=>1);
			}
		} else {
			return array('error'=>2);
		}
	}

	public function getById($id){
		$this->db->where(array('id'=>$id));
		return $this->db->get($this->_tableName)->row();
	}

	public function getAll($limit='', $offset="", $order_by = 'id', $dir = 'DESC'){
		$this->db->select('id,first_name,last_name,user_name,email,address,contact_no,disabled');
		$this->db->order_by($order_by, $dir);
		if(!empty($limit) && !empty($offset)){
			$this->db->limit($limit, $offset);
		}
		$this->db->where_not_in('id',$this->session->userdata('user_id'));
		return $this->db->get($this->_tableName)->result();
	}

	public function getWhere($data, $order_by = 'id', $dir = 'DESC'){
		$this->db->where($data);
		$this->db->order_by($order_by,$dir);
		return $this->db->get($this->_tableName)->result();
	}

	public function save($data){
		return $this->db->insert($this->_tableName, $data);
	}

	public function update($where, $data){
		$this->db->where($where);
		$this->db->set($data);
		return $this->db->update($this->_tableName);
	}

	public function delete($where){
		return $this->db->delete($this->_tableName,$where);
	}
}
