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
	class Model3 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select ( '*' ); 
			$this->db->from ( 'pengguna' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
			$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
			$this->db->order_by("pengguna.role", "asc");
			$this->db->order_by("pengguna.id_kelas", "asc");
			$this->db->order_by("pengguna.nama", "asc");
			$query = $this->db->get ();
			return $query->result ();
		}
		
		
		function insert_pengguna($data){  
			$this->db->insert('pengguna', $data);
		}
		
		function select_by_id($id_pengguna){
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->where('id', $id_pengguna);
			return $this->db->get();
		}
		
		function update_pengguna($id_pengguna, $data){
			$this->db->where('id', $id_pengguna);
			$this->db->update('pengguna', $data);
		}
		function delete_pengguna($id_pengguna){
			$this->db->where('id', $id_pengguna);
			$this->db->delete('pengguna');
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
		
		function ambiltipeuser()
		{
			$this->db->from('tipe_user');
			$this->db->order_by('nama_tipe');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['id_tipeuser']] = $row['nama_tipe'];
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
		
		function update_view_pengguna($id_pengguna,$data){
			$this->db->where('id', $id_pengguna);
			$this->db->update('pengguna', $data);
		}
		
		function hitungbaris(){
			$query = $this->db->get('pengguna');
			return $query->num_rows();           
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
			$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function hitung_cari(){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
				$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
				$this->db->like('nama', $c);
				$this->db->or_like('no_peserta',$c);
				$this->db->or_like('sekolah',$c);
				$this->db->or_like('nama_kelas',$c);
				$this->db->or_like('nama_peminatan',$c);
				$this->db->or_like('nama_tipe',$c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
				$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
				$this->db->like('nama', $c);
				$this->db->or_like('no_peserta',$c);
				$this->db->or_like('sekolah',$c);
				$this->db->or_like('nama_kelas',$c);
				$this->db->or_like('nama_peminatan',$c);
				$this->db->or_like('nama_tipe',$c);
				$query = $this->db->get();
				return $query->num_rows();  
			}
		}
		
		function Cari($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
				$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
				$this->db->like('nama', $c);
				$this->db->or_like('no_peserta',$c);
				$this->db->or_like('sekolah',$c);
				$this->db->or_like('nama_kelas',$c);
				$this->db->or_like('nama_peminatan',$c);
				$this->db->or_like('nama_tipe',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
				$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
				$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
				$this->db->like('nama', $c);
				$this->db->or_like('no_peserta',$c);
				$this->db->or_like('sekolah',$c);
				$this->db->or_like('nama_kelas',$c);
				$this->db->or_like('nama_peminatan',$c);
				$this->db->or_like('nama_tipe',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		function hitungbaris_aktif(){
			$this->db->where('aktif', 1);	
			$query = $this->db->get('pengguna');
			return $query->num_rows();           
		}
		
		function Cari_aktif($limit=array()){
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
			$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
			$this->db->where('pengguna.aktif', 1);
			$this->db->order_by("pengguna.role", "asc");
			$this->db->order_by("pengguna.id_kelas", "asc");
			$this->db->order_by("pengguna.nama", "asc");
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function hitungbaris_nonaktif(){
			$this->db->where('aktif', 0);
			$query = $this->db->get('pengguna');
			return $query->num_rows();           
		}
		
		function Cari_nonaktif($limit=array()){
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
			$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
			$this->db->where('pengguna.aktif', 0);
			$this->db->order_by("pengguna.role", "asc");
			$this->db->order_by("pengguna.id_kelas", "asc");
			$this->db->order_by("pengguna.nama", "asc");
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function update_aktivasi_pengguna($data = array())
		{
			if (is_array($data) && ! empty($data))
			{
				$this->db->update_batch('pengguna', $data, 'id');
			}
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id', $data);
			$this->db->delete('pengguna');
		}
		
		function pilih_jurusan(){
			$this->db->from('jurusan');
			$this->db->order_by('nama_univ');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['kode_jurusan']] = $row['kode_jurusan'].' - '.$row['pil_jurusan'].' - '.$row['nama_univ'];
				}
			}
			return $return;
		}
		
		function ambiljurusan1($idp){
			$response = array();
			$this->db->select('*');
			$this->db->where('kode_jurusan', $idp);
			$q = $this->db->get('jurusan');
			$response = $q->result_array();
			return $response;
		}
		
		
		function ambilpropinsi()
		{
			$this->db->from('propinsi');
			$this->db->order_by('propinsi');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['kode_prop']] = $row['propinsi'];
				}
			}
			return $return;
		}
		
		function ambiluniv()
		{   
			$this->db->select('nama_univ');
			$this->db->distinct();
			$this->db->from('jurusan');
			$this->db->order_by('nama_univ');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['nama_univ']] = $row['nama_univ'];
				}
			}
			return $return;
		}
		
	
		function ambilkota1($idkota){
			
			$this->db->order_by('kota','ASC');
			$kota1= $this->db->get_where('kota',array('kode_prop'=>$idkota));
			foreach ($kota1->result_array() as $data ){
				$kota.= "<option value='$data[kode_kota]'>$data[kota]</option>";
			}
			return $kota;
		}
		
		
		
		function ambilsma1($idsma){
			
			$this->db->order_by('nama_sek','ASC');
			$sma1= $this->db->get_where('sma',array('kode_kota'=>$idsma));
			foreach ($sma1->result_array() as $data ){
				$sma.= "<option value='$data[kode_sek]'>$data[nama_sek]</option>";
			}
			return $sma;
		}
		
		function ambilprodi1($idprodi){
			
			$this->db->order_by('pil_jurusan','ASC');
			$prodi1= $this->db->get_where('jurusan',array('nama_univ'=>$idprodi));
			foreach ($prodi1->result_array() as $data ){
				$prodi.= "<option value='$data[id]'>$data[pil_jurusan]</option>";
			}
			return $prodi;
		}
	}
	
	
?>

