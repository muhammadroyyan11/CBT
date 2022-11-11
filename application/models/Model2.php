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
	class Model2 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select('*');
			$this->db->from('kelas');
			return $this->db->get();
		}
		
		function insert_kelas($data){
			$this->db->insert('kelas', $data);
		}
		
		function select_by_id($id_kelas){
			$this->db->select('*');
			$this->db->from('kelas');
			$this->db->where('id_kelas', $id_kelas);
			return $this->db->get();
		}
		
		function update_kelas($id_kelas, $data){
			$this->db->where('id_kelas', $id_kelas);
			$this->db->update('kelas', $data);
		}
		function delete_kelas($id_kelas){
			$this->db->where('id_kelas', $id_kelas);
			$this->db->delete('kelas');
		}
		
		function hitung_baris(){
			$query = $this->db->get('kelas');
			return $query->num_rows();      
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('kelas');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id_kelas', $data);
			$this->db->delete('kelas');
		}
		
		function hitung_cari(){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('kelas');
				$this->db->like('nama_kelas', $c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('kelas');
				$this->db->like('nama_kelas', $c);
				$query = $this->db->get();
				return $query->num_rows();  
			}
		}
		
		function Cari($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('kelas');
				$this->db->like('nama_kelas', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('kelas');
				$this->db->like('nama_kelas', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		
	}
?>