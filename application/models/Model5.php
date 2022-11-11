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
	class Model5 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select ( '*' ); 
			$this->db->from ( 'ujian' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
			
			$query = $this->db->get ();
			return $query->result ();
		}
		
		function insert_ujian($data){
			$this->db->insert('ujian', $data);
		}
		
		function select_by_id($id_ujian){
			$this->db->select('*');
			$this->db->from('ujian');
			$this->db->where('id_ujian', $id_ujian);
			return $this->db->get();
		}
		
		function update_ujian($id_ujian, $data){
			$this->db->where('id_ujian', $id_ujian);
			$this->db->update('ujian', $data);
		}
		
		function update_view_ujian($id_ujian,$data){
			$this->db->where('id_ujian', $id_ujian);
			$this->db->update('ujian', $data);
		}
		
		function delete_ujian($id_ujian){
			$this->db->where('id_ujian', $id_ujian);
			$this->db->delete('ujian');
		}
		
		function ambilkelas()
		{
			$this->db->from('kelas');
			$this->db->order_by('nama_kelas');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['id_kelas']] = $row['nama_kelas'];
				}
			}
			
			return $return;
			
		}
		
		function ambilpeminatan()
		{
			$this->db->from('peminatan');
			$this->db->order_by('nama_peminatan');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['id_peminatan']] = $row['nama_peminatan'];
				}
			}
			return $return;
		}
		
		function hitungbaris(){
			$query = $this->db->get('ujian');
			return $query->num_rows();           
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*,ujian.id_kelas as idk');
			$this->db->from('ujian');
			$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
			$this->db->order_by('ujian.id_kelas','asc');
			$this->db->order_by('nama_ujian','asc');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function Cari($id_folder,$limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*,ujian.id_kelas as idk');
				$this->db->from ( 'ujian' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
				$this->db->where('ujian.id_folder', $id_folder);
				$this->db->like('ujian.nama_ujian', $c);
				$this->db->or_like('kelas.nama_kelas',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*,ujian.id_kelas as idk');
				$this->db->from ( 'ujian' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
				$this->db->where('ujian.id_folder', $id_folder);
				$this->db->like('ujian.nama_ujian', $c);
				$this->db->or_like('kelas.nama_kelas',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		function hitung_cari(){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from ( 'ujian' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
				$this->db->like('ujian.nama_ujian', $c);
				$this->db->or_like('kelas.nama_kelas',$c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from ( 'ujian' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
				$this->db->like('ujian.nama_ujian', $c);
				$this->db->or_like('kelas.nama_kelas',$c);
				$query = $this->db->get();
				return $query->num_rows();  
			}
		}
		
		function hitungbaris_aktif(){
			$this->db->where('aktif_ujian', 1);	
			$query = $this->db->get('ujian');
			return $query->num_rows();           
		}
		
		
		function hitungbaris_nonaktif(){
			$this->db->where('aktif_ujian', 0);
			$query = $this->db->get('ujian');
			return $query->num_rows();           
		}
		

		
		function Cari_nonaktif($id_folder,$limit=array()){
			$this->db->select('*,ujian.id_kelas as idk');
			$this->db->from('ujian');
			$this->db->join ( 'folder', 'folder.id_folder = ujian.id_folder' , 'left' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );			
			$this->db->where('ujian.id_folder', $id_folder) AND $this->db->where('ujian.aktif_ujian', 0);
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}		
		
			function hitung_nonaktif($id_folder){
			$this->db->select('*,ujian.id_kelas as idk');
			$this->db->from('ujian');
			$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
			$this->db->join ( 'folder', 'folder.id_folder = ujian.id_folder' , 'left' );
			$this->db->where('ujian.id_folder', $id_folder);
			$this->db->order_by('ujian.id_kelas','asc');
			$this->db->order_by('nama_ujian','asc');
			$query = $this->db->get();
			return $query->num_rows();           
		}
		
				function hitung_aktif($id_folder){
			$this->db->select('*,ujian.id_kelas as idk');
			$this->db->from('ujian');
			$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
			$this->db->join ( 'folder', 'folder.id_folder = ujian.id_folder' , 'left' );
			$this->db->where('ujian.id_folder', $id_folder) AND $this->db->where('ujian.aktif_ujian', 1);
			$query = $this->db->get();
			return $query->num_rows();           
		}
		
		function Cari_aktif($id_folder,$limit=array()){			
						$this->db->select('*,ujian.id_kelas as idk');
			$this->db->from('ujian');
			$this->db->join ( 'folder', 'folder.id_folder = ujian.id_folder' , 'left' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );			
			$this->db->where('ujian.id_folder', $id_folder) AND $this->db->where('ujian.aktif_ujian', 1);
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function update_aktivasi_ujian($data = array())
		{
			if (is_array($data) && ! empty($data))
			{
				$this->db->update_batch('ujian', $data, 'id_ujian');
			}
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id_ujian', $data);
			$this->db->delete('ujian');
		}
		
				function hitung($id_folder){
			$this->db->select('*');
			$this->db->from('ujian');
			$this->db->join ( 'folder', 'folder.id_folder = ujian.id_folder' , 'left' );
			$this->db->where('ujian.id_folder', $id_folder);
			$query = $this->db->get();
			return $query->num_rows();           
		}
		
				function select_by_id_folder1($id_folder,$limit=array()){
			$this->db->where('id_folder', $id_folder);
			$q = $this->db->get('folder');
			$data = $q->result_array();
			$this->db->select('*,ujian.id_kelas as idk');
			$this->db->from('ujian');
			$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = ujian.jminat' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
			$this->db->join ( 'folder', 'folder.id_folder = ujian.id_folder' , 'left' );
			$this->db->where('ujian.id_folder', $id_folder);
						$this->db->order_by('ujian.id_kelas','asc');
			$this->db->order_by('nama_ujian','asc');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
				function ambilfolder()
		{
			$this->db->from('folder');
			$this->db->order_by('nama_folder');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['id_folder']] = $row['nama_folder'];
				}
			}
			return $return;
		}
		
		
	}
?>

