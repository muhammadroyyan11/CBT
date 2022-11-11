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
	class Model9 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select('*');
			$this->db->from('folder');
			return $this->db->get();
		}
		
		function insert_folder($data){
			$this->db->insert('folder', $data);
		}
		
		function select_by_id($id_folder){
			$this->db->select('*');
			$this->db->from('folder');
			$this->db->where('id_folder', $id_folder);
			return $this->db->get();
		}
		
		function update_folder($id_folder, $data){
			$this->db->where('id_folder', $id_folder);
			$this->db->update('folder', $data);
		}
		function delete_folder($id_folder){
			$this->db->where('id_folder', $id_folder);
			$this->db->delete('folder');
		}
		
		function hitung_baris(){
			$query = $this->db->get('folder');
			return $query->num_rows();      
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('folder');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id_folder', $data);
			$this->db->delete('folder');
		}
		
		function hitung_cari(){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('folder');
				$this->db->like('nama_folder', $c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('folder');
				$this->db->like('nama_folder', $c);
				$query = $this->db->get();
				return $query->num_rows();  
			}
		}
		
		function Cari($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('folder');
				$this->db->like('nama_folder', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('folder');
				$this->db->like('nama_folder', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		
	}
?>