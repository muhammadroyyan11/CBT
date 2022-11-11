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
	class Model7 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select('*');
			$this->db->from('jurusan');
			return $this->db->get();
		}
		
		function insert_jurusan($data){
			$this->db->insert('jurusan', $data);
		}
		
		function select_by_id($id){
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('id', $id);
			return $this->db->get();
		}
		
		function update_jurusan($id, $data){
			$this->db->where('id', $id);
			$this->db->update('jurusan', $data);
		}
		function delete_jurusan($id){
			$this->db->where('id', $id);
			$this->db->delete('jurusan');
		}
		
		function hitung_baris(){
			$query = $this->db->get('jurusan');
			return $query->num_rows();      
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('jurusan');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id', $data);
			$this->db->delete('jurusan');
		}
		
		function hitung_cari(){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->like('nama_univ', $c);
				$this->db->or_like('pil_jurusan',$c);
				$this->db->or_like('kode_jurusan',$c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->like('nama_univ', $c);
				$this->db->or_like('pil_jurusan',$c);
				$this->db->or_like('kode_jurusan',$c);
				$query = $this->db->get();
				return $query->num_rows();  
			}
		}
		
		function Cari($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->like('nama_univ', $c);
				$this->db->or_like('pil_jurusan',$c);
				$this->db->or_like('kode_jurusan',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->like('nama_univ', $c);
				$this->db->or_like('pil_jurusan',$c);
				$this->db->or_like('kode_jurusan',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		
	}
?>