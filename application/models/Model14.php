<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model14 extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_customer($data)
	{
		$this->db->insert('customers', $data);

		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;		
	}
	
	function select_by_id(){
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->join ( 'order_detail', 'order_detail.orderid = orders.serial' , 'left' );
			$this->db->where_in('orders.customerid', $this->session->userdata('user_id'));
			return $this->db->get();
		}
		
		function hitung_baris(){
			$query = $this->db->get('order_detail');
			return $query->num_rows();      
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->join ( 'order_detail', 'order_detail.orderid = orders.serial' , 'left' );
			$this->db->where_in('orders.customerid', $this->session->userdata('user_id'));
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
	
	public function insert_order($data)
	{
		$this->db->insert('orders', $data);
		
		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;
	}
	
	public function insert_order_detail($data)
	{
		$this->db->insert('order_detail', $data);
	}
}