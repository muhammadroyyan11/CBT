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
	class Model8 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select('*');
			$this->db->from('peminatan');
			return $this->db->get();
		}
		
		function insert_peminatan($data){
			$this->db->insert('peminatan', $data);
		}
		
		function select_by_id($id_peminatan){
			$this->db->select('*');
			$this->db->from('peminatan');
			$this->db->where('id_peminatan', $id_peminatan);
			return $this->db->get();
		}
		
		function update_peminatan($id_peminatan, $data){
			$this->db->where('id_peminatan', $id_peminatan);
			$this->db->update('peminatan', $data);
		}
		function delete_peminatan($id_peminatan){
			$this->db->where('id_peminatan', $id_peminatan);
			$this->db->delete('peminatan');
		}
		
		function hitung_baris(){
			$query = $this->db->get('peminatan');
			return $query->num_rows();      
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('peminatan');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id_peminatan', $data);
			$this->db->delete('peminatan');
		}
		
		function hitung_cari(){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('peminatan');
				$this->db->like('nama_peminatan', $c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('peminatan');
				$this->db->like('nama_peminatan', $c);
				$query = $this->db->get();
				return $query->num_rows();  
			}
		}
		
		function Cari($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('peminatan');
				$this->db->like('nama_peminatan', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('peminatan');
				$this->db->like('nama_peminatan', $c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		
	}
?>