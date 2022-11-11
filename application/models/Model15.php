<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php
	class Model15 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select('*');
			$this->db->from('products');
			return $this->db->get();
		}
		
		function insert_produk($data){
			$this->db->insert('products', $data);
		}
		
		function select_by_id($id_produk){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where('serial', $id_produk);
			return $this->db->get();
		}
		
		function update_produk($id_produk, $data){
			$this->db->where('serial', $id_produk);
			$this->db->update('products', $data);
		}
		function delete_produk($id_produk){
			$this->db->where('serial', $id_produk);
			$this->db->delete('products');
		}
		
		function hitung_baris(){
			$query = $this->db->get('products');
			return $query->num_rows();      
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('products');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('serial', $data);
			$this->db->delete('products');
		}
		
		function hitung_cari(){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('products');
				$this->db->like('name', $c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('products');
				$this->db->like('name', $c);
				$query = $this->db->get();
				return $query->num_rows();  
			}
		}
		
		function Cari($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('products');
				$this->db->like('name', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('products');
				$this->db->like('name', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		function hitungbaris(){
			$query = $this->db->get('order_detail');
			return $query->num_rows();           
		}
		
		function select_all_paging1($limit=array()){
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->join ( 'order_detail', 'order_detail.orderid = orders.serial' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = orders.customerid' , 'left' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
			$this->db->join ( 'products', 'products.serial = order_detail.productid' , 'left' );
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function bulk_delete_pembelian($data)
		{
			$this->db->where_in('morderid', $data);
			$this->db->delete('order_detail');
			$this->db->where_in('morderid', $data);
			$this->db->delete('orders');
			
		}
		
		function delete_pembelian($id_pembelian){
			
			$this->db->where('morderid', $id_pembelian);
			$this->db->delete('order_detail');
			$this->db->where('morderid', $id_pembelian);
			$this->db->delete('orders');
		}
		
		function Carip($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('orders');
				$this->db->join ( 'order_detail', 'order_detail.orderid = orders.serial' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = orders.customerid' , 'left' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
				$this->db->join ( 'products', 'products.serial = order_detail.productid' , 'left' );
				$this->db->like('name', $c);
				$this->db->or_like('nama',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('orders');
				$this->db->join ( 'order_detail', 'order_detail.orderid = orders.serial' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = orders.customerid' , 'left' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
				$this->db->join ( 'products', 'products.serial = order_detail.productid' , 'left' );
				$this->db->like('name', $c);
				$this->db->or_like('nama',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		
	}
?>