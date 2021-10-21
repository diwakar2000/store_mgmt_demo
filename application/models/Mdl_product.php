<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_product extends CI_Model
{
	private $_tableName = 'product';
	public function __construct()
	{
		parent::__construct();
	}

	public function getById($id){
		$this->db->where(array('id'=>$id));
		return $this->db->get($this->_tableName)->row();
	}

	public function getAll($limit='', $offset="", $order_by = 'id', $dir = 'DESC'){
		$this->db->order_by($order_by, $dir);
		if(!empty($limit) && !empty($offset)){
			$this->db->limit($limit, $offset);
		}
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

	public function getAllWIthVendorName(){
		$this->db->select('product.*, vendor.name as vendor_name');
		$this->db->join('vendor','vendor.id = product.vendor_id');
		return $this->db->get('product')->result();
	}
}
