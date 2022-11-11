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
	class Model4 extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			return $this->db->get();
		}
		
		function insert_soal($data){
			$this->db->insert('soal', $data);
			$id = $this->db->insert_id();	
		return (isset($id)) ? $id : FALSE;
		}
		
		function insert_jawaban($data){
			$this->db->insert('proses', $data);
		}
		
		
		function select_by_id_ujian($id_ujian,$limit=array()){
		$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
			$this->db->where('id_ujian', $id_ujian);
			$q = $this->db->get('ujian');
			$data = $q->result_array();
			if (($data[0]['acak']) == 1)
			{
				$this->db->order_by('rand()');
			}
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function select_by_id_ujian1($id_ujian,$limit=array()){
			$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
			$this->db->where('id_ujian', $id_ujian);
			$q = $this->db->get('ujian');
			$data = $q->result_array();
			$proses_soal = $data[0]['nosoal'];
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			if ($proses_soal==''){
		} else {
			$this -> db -> order_by('FIELD(id_soal, '.$proses_soal.' )');
		}
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function show_soal_siswa($id_ujian,$jumlah_soal,$limit=array()){
			$this->db->where('id_ujian', $id_ujian);
			$q = $this->db->get('ujian');
			$data = $q->result_array();
			if (($data[0]['acak']) == 1)
			{
				$this->db->order_by('rand()');
			}
			$where1 = "(soal.id_ujian like '$id_ujian' AND soal.aktif='1') or (soal.id_ujian like '%,$id_ujian' AND soal.aktif='1') or (soal.id_ujian like '$id_ujian,%' AND soal.aktif='1') or (soal.id_ujian like '%,$id_ujian,%' AND soal.aktif='1')";
			
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where1);
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get('',$jumlah_soal);
		}
		
		function hitung($id_ujian){
		$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			return $query->num_rows();           
		}
		
		function kunci($id_ujian){
		$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
			$this->db->select('kunci');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			return $this->db->get();
			$data = array();
			foreach ($query->result() as $row)
			{
				$data[] = array(
				'kunci' => $row->kunci,
				);
			}
			return $data;
		}
		
		function select_by_id($id_soal){
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->where('id_soal', $id_soal);
			return $this->db->get();
		}
		
		function select_by_id1($id_soal){
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->where('id_ujian', $id_soal);
			return $this->db->get();
		}
		
		function update_soal($id_soal, $data){
			$this->db->where('id_soal', $id_soal);
			$this->db->update('soal', $data);
		}
		
		function delete_soal($id_soal){
			$this->db->where('id_soal', $id_soal);
			$this->db->delete('soal');
		}
		
		function view($num, $offset)  {
			
			/*variable num dan offset digunakan untuk mengatur jumlah
			data yang akan dipaging, yang kita panggil di controller*/
			
			$query = $this->db->get("soal",$num, $offset);
			return $query->result();
			
		}
		
		function proses_all($id,$id_ujian){
			$where = "proses.id='$id' AND proses.id_ujian='$id_ujian'";
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where($where);
			return $this->db->get();
		}
		
		function list_soal()
		{
			$query = $this->db->query('select * from soal');
			//lihat apakah ada data dalam tabel
			$num = $query->num_rows();
			if($num>0){
				//Mengirimkan data array hasil query
				return $query->result();
				//Function result() hampir sama dengan function mysql_fetch_array()
			}
			else{
				return 0;
				//Kirimkan 0 jika tidak ada datanya
			}
		}
		
		function select_all_ujian($kelas){
			$where = "ujian.id_kelas like '$kelas' or ujian.id_kelas like '%,$kelas' or ujian.id_kelas like '$kelas,%' or ujian.id_kelas like '%,$kelas,%'";	
			$this->db->select('*');
			$this->db->from('ujian');
			$this->db->where($where);
			return $this->db->get();
		}
		
		function select_proses_all($id_ujian,$id,$kelas){
			$where = "proses.id_ujian='$id_ujian' AND proses.id='$id' AND proses.id_kelas='$kelas'";
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where($where);
			return $this->db->get();
		}
		
		function tampil($id_ujian){
		$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->where($where);
			return $this->db->get();
		}
		
		function select_proses(){
			$this->db->select('*');
			$this->db->from('proses');
			return $this->db->get();
		}
		
		function hitungbaris(){
			$query = $this->db->get('ujian');
			return $query->num_rows();           
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('ujian');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function Cari($id_ujian,$limit=array()){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
				$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
				$this->db->from('soal');
				$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
				$this->db->where($where);
				$this->db->like('soal', $c);
				$this->db->or_like('pil_a',$c);
				$this->db->or_like('pil_b',$c);
				$this->db->or_like('pil_c',$c);
				$this->db->or_like('pil_d',$c);
				$this->db->or_like('pil_e',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
				$this->session->set_userdata('cari',$c);
				$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
				$this->db->from('soal');
				$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
				$this->db->where($where);
				$this->db->like('soal', $c);
				$this->db->or_like('pil_a',$c);
				$this->db->or_like('pil_b',$c);
				$this->db->or_like('pil_c',$c);
				$this->db->or_like('pil_d',$c);
				$this->db->or_like('pil_e',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		function hitung_cari($id_ujian){
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
				$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
				$this->db->from('soal');
				$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
				$this->db->where($where);
				$this->db->like('soal', $c);
				$this->db->or_like('pil_a',$c);
				$this->db->or_like('pil_b',$c);
				$this->db->or_like('pil_c',$c);
				$this->db->or_like('pil_d',$c);
				$this->db->or_like('pil_e',$c);
				$query = $this->db->get();
				return $query->num_rows();  
				} else{
				$c = $this->input->post('cari');
				$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
				$this->session->set_userdata('cari',$c);
				$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
				$this->db->from('soal');
				$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
				$this->db->where($where);
				$this->db->like('soal', $c);
				$this->db->or_like('pil_a',$c);
				$this->db->or_like('pil_b',$c);
				$this->db->or_like('pil_c',$c);
				$this->db->or_like('pil_d',$c);
				$this->db->or_like('pil_e',$c);
				$query = $this->db->get();
				return $query->num_rows();  
			}	         
		}
		
		function hitung_aktif($id_ujian){
			$where = "(soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%') AND soal.aktif=1";
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			return $query->num_rows();           
		}
		
		function Cari_aktif($id_ujian,$limit=array()){
			$where = "(soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%') AND soal.aktif=1";
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function hitung_nonaktif($id_ujian){
			$where = "(soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%') AND soal.aktif=0";
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			return $query->num_rows();           
		}
		
		function Cari_nonaktif($id_ujian,$limit=array()){
			$where = "(soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%') AND soal.aktif=0";
			$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a1, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b1, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c1, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d1, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e1');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where($where);
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function update_aktivasi_soal($data = array())
		{
			if (is_array($data) && ! empty($data))
			{
				$this->db->update_batch('soal', $data, 'id_soal');
			}
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id_soal', $data);
			$this->db->delete('soal');
		}
		
		function update_view_soal($id_soal,$data){
			$this->db->where('id_soal', $id_soal);
			$this->db->update('soal', $data);
		}
		
		function update_jawaban($data){
			$this->db->insert('proses', $data);
		}
		
		function update_jawaban1($no_copy, $data){
			$this->db->where('no_copy', $no_copy);
			$this->db->update('proses', $data);
		}
		
		function batalkan_nilai($no_copy, $data){
			$this->db->where('no_copy', $no_copy);
			$this->db->update('proses', $data);
		}
		
		function getnosoal($idujian){
			$this->db->select('*');
			$this->db->from('ujian');
			$this->db->where('id_ujian', $idujian);
			return $this->db->get();
		}
		
		function update_ujian($idujian,$data1){
			$this->db->select('*');
			$this->db->from('ujian');
			$this->db->where('id_ujian', $idujian);
			
			$this->db->update('ujian', $data1);
		}
		
		
	}
?>