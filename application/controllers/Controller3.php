<?php ob_start();
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Controller3 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model1');
			$this->load->model('model4');
			$this->load->library('session'); 
			$this->load->library('Upload'); 
			$this->load->helper('text');
			
		}
		
		public function index()
		{
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil'] = $this->model1->select_all();
			$this->load->view('view17', $data);
		}
		
		public function cari_laporan()
		{
			
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$this->load->view('view13', $data);
		}
		
		function cari() {
			$userdata = array(
			'multimapel'  => $this->input->post('multimapel'),
			);
			$this->session->set_userdata($userdata);			
			
			$multimapel = $this->input->post('multimapel');
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->caridata();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		function sort1() {		
			$multimapel = $this->session->userdata('multimapel');
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->sortdata1();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda urutkan tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		function sort2() {			
			$multimapel = $this->session->userdata('multimapel');
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->sortdata2();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda urutkan tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		function sort3() {			
			$multimapel = $this->session->userdata('multimapel');
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->sortdata3();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda urutkan tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		function sort4() {		
			$multimapel = $this->session->userdata('multimapel');
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->sortdata4();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda urutkan tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		function sort5() {		
			$multimapel = $this->session->userdata('multimapel');
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->sortdata5();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda urutkan tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		function sort6() {		
			$multimapel = $this->session->userdata('multimapel');
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->sortdata6();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda urutkan tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		function sort7() {			
			$multimapel = $this->session->userdata('multimapel');
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->sortdata7();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda urutkan tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		public function monitoring()
		{
			
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$this->load->view('view35', $data);
		}
		
		function monitor() {
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->monitoring();
			
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function msort1() {		
			
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->msortdata1();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function msort2() {			
			
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->msortdata2();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function msort3() {			
			
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->msortdata3();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function msort4() {		
			
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->msortdata4();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function msort5() {		
			
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->msortdata5();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function msort6() {		
			
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->msortdata6();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function msort7() {			
			
			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->msortdata7();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view35',$data); 
			}
			
			else
			{
				$this->load->view('view36',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		public function edit_ip($id_proses){
			$data['proses'] = $this->model1->select_by_id($id_proses)->row();
			$this->session->set_userdata("id_proses",$id_proses);
			$this->load->view('view37', $data);
		}
		
		public function proses_edit_ip(){
			$data['nama'] = $this->input->post('nama');
			$data['no_peserta'] = $this->input->post('nopes');
			$data['ip'] = $this->input->post('ip');
			$data['hasil_jawaban'] = $this->input->post('jawaban');
			$id_proses=$this->input->post('id_proses');
			
			$this->model1->update_ip($id_proses, $data);
			$this->session->set_flashdata('pesan2','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data telah berhasil di update ke dalam database.</div>');
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->after_update();	
			$this->load->view('view36',$data); 
			$this->session->unset_userdata('id_proses');
		}
		
		public function close_ip(){
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->after_update();	
			$this->load->view('view36',$data); 
			$this->session->unset_userdata('id_proses');
		}
		
		public function show_by_ujian_id($id_ujian)
		{
			$this->session->set_userdata('id_ujian',$id_ujian);
			$data['View_soal'] = $this->model1->select_by_id_ujian($id_ujian)->result();
			$this->load->view('view10', $data);
		}
		
		public function hasil_ujian($id_proses)
		{   
		    $this->db->select('*');
			$this->db->from('proses');
			$this->db->where('id_proses',$id_proses);
			$query = $this->db->get();
			$pjur = $query->result();
			$row = $pjur[0]; 
			$id = $row->id;
			
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->where('id',$id);
			$query1 = $this->db->get();
			if ($query1->num_rows() > 0) {
				$jurusan = $query1->result();
				$jur = $jurusan[0]; 
				
				$kode_jurusan1 = $jur->jurusan1;
				$kode_jurusan2 = $jur->jurusan2;
				$kode_jurusan3 = $jur->jurusan3;
				
				$data['jurusan1'] = $this->model1->select_by_id_jurusan($kode_jurusan1)->row();	
				$data['jurusan2'] = $this->model1->select_by_id_jurusan($kode_jurusan2)->row();	
				$data['jurusan3'] = $this->model1->select_by_id_jurusan($kode_jurusan3)->row();	
			} else {}
			
			$data['hasil'] = $this->model1->select_by_id_proses($id_proses)->row();	
			$this->load->view('view10', $data);
		}
		
		public function uploadjawaban($id_proses)
		{
			
			
			
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('id_proses',$id_proses);
			$query=$this->db->get ();
			$record=$query->row();	
			
			$no_copy = $record->no_copy;
			$tgl = $record->tgl_ujian;
			$file = "../cbt/data/d".$no_copy."_".date("dmY",strtotime($tgl)).".txt";
			$lines = file($file, FILE_IGNORE_NEW_LINES);
			
			$data['hasil_jawaban'] = $lines[0];
			$data['ijin'] = 1;		 
			
			$id_soal = explode(',',$record->no_soal);		
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where_in('id_soal',$id_soal);
			$this -> db -> order_by('FIELD(id_soal, '.$record->no_soal.' )');
			$query = $this->db->get ();
			
			$p = 1;
			foreach ($query->result() as $row){
				$jrx[$p] = $row->jrx;
				$p++; 
			}	
			
			$data['jrx'] = implode(',',$jrx);
			$this->model1->update_jawaban1($no_copy,$data);
			redirect(site_url('Controller3/after_delete'));
		}
		
		public function uploadjawaban_m($id_proses)
		{
			
			
			
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('id_proses',$id_proses);
			$query=$this->db->get ();
			$record=$query->row();	
			
			$no_copy = $record->no_copy;
			$tgl = $record->tgl_ujian;
			$file = "../cbt/data/d".$no_copy."_".date("dmY",strtotime($tgl)).".txt";
			$lines = file($file, FILE_IGNORE_NEW_LINES);
			
			$data['hasil_jawaban'] = $lines[0];
			$data['ijin'] = 1;		 
			
			$id_soal = explode(',',$record->no_soal);		
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where_in('id_soal',$id_soal);
			$this -> db -> order_by('FIELD(id_soal, '.$record->no_soal.' )');
			$query = $this->db->get ();
			
			$p = 1;
			foreach ($query->result() as $row){
				$jrx[$p] = $row->jrx;
				$p++; 
			}	
			
			$data['jrx'] = implode(',',$jrx);
			$this->model1->update_jawaban1($no_copy,$data);
			redirect(site_url('Controller3/after_delete_m'));
		}
		
		public function hasil_ujian_siswa()
		{
			$id = $this->session->userdata('user_id');
			$id_ujian = $this->session->userdata('id_ujian');
			$data['hasil'] = $this->model1->proses_all($id, $id_ujian)->row();
			$data['View_soal'] = $this->model1->tampil($id_ujian)->result();
			$this->load->view('view4', $data);		
		}
		
		public function lihat_hasil($id_ujian)
		{
			$id = $this->session->userdata('user_id');
			$data['hasil'] = $this->model1->proses_all($id, $id_ujian)->row();
			$data['View_soal'] = $this->model1->tampil($id_ujian)->result();
			$this->load->view('view4', $data);		
		}
		
		public function delete_proses($id_proses){
			
		 	$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('id_proses',$id_proses);
			$query = $this->db->get();
			$pjur = $query->result();
			$row = $pjur[0]; 
			$nc = $row->no_copy;
			$tg = date('dmY', strtotime($row->tgl_ujian));
			
			unlink('../cbt/data/d'.$nc.'_'.$tg.'.txt');
			
			$this->model1->delete_hasil($id_proses);
			redirect(site_url('Controller3/after_delete'));
		}
		
		public function after_delete(){
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->after_delete();
			$this->load->view('view17',$data); 
		}
		
		public function after_delete_m(){
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->after_delete();
			$this->load->view('view36',$data); 
		}
		
		public function mafter_delete(){
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->after_delete();
			$this->load->view('view13',$data); 
		}
		
		public function batalkan_nilai()
		{
			$no_copy = $this->input->post('nc');
			$data['proses_nilai'] = "";
			$data['p_benar'] = "";
			$data['p_salah'] = "";
			$data['p_kosong'] = "";
			$data['p_nilai'] = "";
			$data['predikat'] = "";
			$data['k13'] = "";
			$data['prosesnilai1'] = "";
			$data['prosesnilai2'] = "";
			$data['prosesnilai3'] = "";
			$data['prosesnilai4'] = "";
			$data['prosesnilai5'] = "";
			$data['prosesnilai6'] = "";
			$data['prosesnilai7'] = "";
			$data['prosesnilai8'] = "";
			$data['prosesnilai9'] = "";
			$data['prosesnilai10'] = "";
			$data['benar1'] = "";
			$data['benar2'] = "";
			$data['benar3'] = "";
			$data['benar4'] = "";
			$data['benar5'] = "";
			$data['benar6'] = "";
			$data['benar7'] = "";
			$data['benar8'] = "";
			$data['benar9'] = "";
			$data['benar10'] = "";
			$data['salah1'] = "";
			$data['salah2'] = "";
			$data['salah3'] = "";
			$data['salah4'] = "";
			$data['salah5'] = "";
			$data['salah6'] = "";
			$data['salah7'] = "";
			$data['salah8'] = "";
			$data['salah9'] = "";
			$data['salah10'] = "";
			$data['kosong1'] = "";
			$data['kosong2'] = "";
			$data['kosong3'] = "";
			$data['kosong4'] = "";
			$data['kosong5'] = "";
			$data['kosong6'] = "";
			$data['kosong7'] = "";
			$data['kosong8'] = "";
			$data['kosong9'] = "";
			$data['kosong10'] = "";
			$data['nilai1'] = "";
			$data['nilai2'] = "";
			$data['nilai3'] = "";
			$data['nilai4'] = "";
			$data['nilai5'] = "";
			$data['nilai6'] = "";
			$data['nilai7'] = "";
			$data['nilai8'] = "";
			$data['nilai9'] = "";
			$data['nilai10'] = "";
			$data['k13_1'] = "";
			$data['k13_2'] = "";
			$data['k13_3'] = "";
			$data['k13_4'] = "";
			$data['k13_5'] = "";
			$data['k13_6'] = "";
			$data['k13_7'] = "";
			$data['k13_8'] = "";
			$data['k13_9'] = "";
			$data['k13_10'] = "";
			$data['predikat1'] = "";
			$data['predikat2'] = "";
			$data['predikat3'] = "";
			$data['predikat4'] = "";
			$data['predikat5'] = "";
			$data['predikat6'] = "";
			$data['predikat7'] = "";
			$data['predikat8'] = "";
			$data['predikat9'] = "";
			$data['predikat10'] = "";
			$data['sort_soal'] = "";
			$data['sort_jawaban'] = "";
			$data['sort_jrx'] = "";
			$data['sort_hasil'] = "";
			$data['analisa'] = "";
			$data['cek'] = 1;
			
			$this->model4->batalkan_nilai($no_copy,$data);
			$id_proses = $this->session->userdata("id_proses");
			$data['proses'] = $this->model1->select_by_id($id_proses)->row();
			$this->load->view('view37', $data);
		}
		
		public function hasil_jawaban()
		{
		    $no_copy = $this->input->post('nc');
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			$query=$this->db->get ();
			$record=$query->row();		
			$id_ujian = $this->input->post('idu');
			$id = $this->input->post('id');
            $jml_soal = $record->jml_soal;
			$s_benar = $record->benar;
			$s_salah = $record->salah;
			$s_kosong = $record->kosong;
			$skala = $record->skala;
			$mapel1 = $record->mapel1;
			$mapel2 = $record->mapel2;
			$mapel3 = $record->mapel3;
			$mapel4 = $record->mapel4;
			$mapel5 = $record->mapel5;
			$mapel6 = $record->mapel6;
			$mapel7 = $record->mapel7;
			$mapel8 = $record->mapel8;
			$mapel9 = $record->mapel9;
			$mapel10 = $record->mapel10;
			$jml_mapel1 = $record->jml_mapel1;
			$jml_mapel2 = $record->jml_mapel2;
			$jml_mapel3 = $record->jml_mapel3;
			$jml_mapel4 = $record->jml_mapel4;
			$jml_mapel5 = $record->jml_mapel5;
			$jml_mapel6 = $record->jml_mapel6;
			$jml_mapel7 = $record->jml_mapel7;
			$jml_mapel8 = $record->jml_mapel8;
			$jml_mapel9 = $record->jml_mapel9;
			$jml_mapel10 = $record->jml_mapel10;
			$mapel = $record->multi;
			$jumlah_mapel = $record->jumlah_mapel;
			
			$id_soal = explode(',',$record->no_soal);		
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where_in('id_soal',$id_soal);
			$this -> db -> order_by('FIELD(id_soal, '.$record->no_soal.' )');
			$query = $this->db->get ();
			
			$p = 1;
			foreach ($query->result() as $row){
				$item[$p] = $row->jrx;
				$p++; 
			}	
			$jrx = implode('',$item);
			
			$hasil = explode(',',$record->hasil_jawaban);
			
			$j=0;
			for($i=0;$i<$jml_soal;$i++)
			{
				if($jrx[$j] == "*") 
				{
					$nilai[$i] = 1;	
				} 
				else if (($hasil[$i] == "K") or (empty($hasil[$i])))
				{
					$nilai[$i] = 9;
				}
				else{
					if (strtolower($hasil[$i]) == strtolower($jrx[$j]))
					{
						$nilai[$i] = 1;
					}
					else
					{
						$nilai[$i] = 0;	
					}
				}
				$j++;
			}
			
			if ($record->multi==1)
			{
				
				$pn1 = substr(implode('',$nilai),0,$jml_mapel1);			
				$pn2 = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
				$pn3 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
				$pn4 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
				$pn5 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
				$pn6 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
				$pn7 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
				$pn8 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
				$pn9 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
				$pn10 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
				
				$data['prosesnilai1'] = substr(implode('',$nilai),0,$jml_mapel1);			
				$data['prosesnilai2'] = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
				$data['prosesnilai3'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
				$data['prosesnilai4'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
				$data['prosesnilai5'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
				$data['prosesnilai6'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
				$data['prosesnilai7'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
				$data['prosesnilai8'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
				$data['prosesnilai9'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
				$data['prosesnilai10'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
				
				$data['proses_nilai'] = substr(implode(',',$nilai),0);
				$data['p_benar'] = count(array_keys($nilai, "1"));
				$data['p_salah'] = count(array_keys($nilai, "0"));
				$data['p_kosong'] = count(array_keys($nilai, "9"));
				
				$tot=0;
				$tot_k13=0;
				for($k=1;$k<=$jumlah_mapel;$k++){
					$data['benar'.+$k] = substr_count(${'pn'.$k}, "1");
					$data['salah'.+$k] = substr_count(${'pn'.$k}, "0");
					$data['kosong'.+$k] = substr_count(${'pn'.$k}, "9");
					${'benar'.$k} = substr_count(${'pn'.$k}, "1");
					${'salah'.$k} = substr_count(${'pn'.$k}, "0");
					${'kosong'.$k}  = substr_count(${'pn'.$k}, "9");
					
					if($skala==0) {				
						$data['nilai'.+$k] = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
						${'nilai'.$k} = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
					}
					else {
						$data['nilai'.+$k] = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
						${'nilai'.$k} = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
					}
					
					$data['k13_'.+$k] = +${'benar'.$k}/${'jml_mapel'.$k} * 3+1;
					${'k13_'.$k} = round(+${'benar'.$k}/${'jml_mapel'.$k} * 3+1, 2); 
					if (${'k13_'.$k} <= 4 && ${'k13_'.$k} >= 3.85) {${'predikat'.$k} = "A";}
					elseif (${'k13_'.$k} <= 3.84 && ${'k13_'.$k} >= 3.51) {${'predikat'.$k} = "A-";} 
					elseif (${'k13_'.$k} <= 3.50 && ${'k13_'.$k} >= 3.18) {${'predikat'.$k} = "B+";} 
					elseif (${'k13_'.$k} <= 3.17 && ${'k13_'.$k} >= 2.85) {${'predikat'.$k} = "B";} 
					elseif (${'k13_'.$k} <= 2.84 && ${'k13_'.$k} >= 2.51) {${'predikat'.$k} = "B-";} 
					elseif (${'k13_'.$k} <= 2.50 && ${'k13_'.$k} >= 2.18) {${'predikat'.$k} = "C+";} 
					elseif (${'k13_'.$k} <= 2.17 && ${'k13_'.$k} >= 1.85) {${'predikat'.$k} = "C";} 
					elseif (${'k13_'.$k} <= 1.84 && ${'k13_'.$k} >= 1.51) {${'predikat'.$k} = "C-";} 
					elseif (${'k13_'.$k} <= 1.50 && ${'k13_'.$k} >= 1.18) {${'predikat'.$k} = "D+";} 
					elseif (${'k13_'.$k} <= 1.17 && ${'k13_'.$k} >= 1.00) {${'predikat'.$k} = "D";} 
					$data['predikat'.+$k] = ${'predikat'.$k};	
					
					$tot = $tot + ${'nilai'.$k};
					$tot_k13 = $tot_k13 + ${'k13_'.$k};
					
				}
				
				$data['p_nilai'] = $tot/$jumlah_mapel;
				$data['k13'] = $tot_k13/$jumlah_mapel;
				$k13 = round($tot_k13/$jumlah_mapel, 2); 
				
				if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
				elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
				elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
				elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
				elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
				elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
				elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
				elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
				elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
				elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
				$data['predikat'] = $predikat;	
			}	else
			{
				
				$data['proses_nilai'] = substr(implode(',',$nilai),0);
				$data['p_benar'] = count(array_keys($nilai, "1"));
				$data['p_salah'] = count(array_keys($nilai, "0"));
				$data['p_kosong'] = count(array_keys($nilai, "9"));
				
				$benar = count(array_keys($nilai, "1"));
				$salah  = count(array_keys($nilai, "0"));
				$kosong  = count(array_keys($nilai, "9"));
				
				if($skala==0) {		
					$data['p_nilai'] = ($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong));
				} else
				{
					$data['p_nilai'] = (((($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong)))/$jml_soal)*$skala)/$s_benar;
				}
				
				$data['k13'] = +$benar/$jml_soal * 3+1;
				$k13 = round(+$benar/$jml_soal * 3+1, 2); 
				if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
				elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
				elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
				elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
				elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
				elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
				elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
				elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
				elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
				elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
				$data['predikat'] = $predikat;				
			}
			$data['jrx'] = implode(',',$item);
			$data['keterangan'] = $this->input->post('keterangan');
			$data['stat'] = $this->input->post('stat');
			$data['cek'] = 0;
			$this->model4->update_jawaban1($no_copy,$data);
			$id_proses = $this->session->userdata("id_proses");
			$data['proses'] = $this->model1->select_by_id($id_proses)->row();
			$this->load->view('view37', $data);
			
		}	
		
		function carirank() {
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$this->load->view('view38', $data);
		}	
		
		function rank() {
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddkelas'] = $this->model1->ambilkelas();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->carirank();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view38',$data); 
			}
			
			else
			{
				$this->load->view('view39',$data); 
				$this->session->unset_userdata('pesan2');
			}
		}
		
		function ambil_data(){
			
			$modul=$this->input->post('modul');
			$id=$this->input->post('id');
			if($modul=="jurusan"){
				$data = $this->model1->ambiljurusan1($id);
				echo json_encode($data);
			}
		}
		
		function pilih_jurusan($id_siswa) {
			$data['ddjurusan'] = $this->model1->pilih_jurusan();
			$data['ddjurusan1'] = $this->model1->pilih_jurusan1();
			$data['siswa'] = $this->model1->select_by_id_siswa($id_siswa)->row();
			$this->load->view('view46', $data);
		}	
		
		public function update_jurusan(){
			$data['jurusan1'] = $this->input->post('jurusan1');
			$data['jurusan2'] = $this->input->post('jurusan2');
			$data['jurusan3'] = $this->input->post('jurusan3');
			$data['jsnl1'] = $this->input->post('na1');
			$data['jsnl2'] = $this->input->post('na2');
			$data['jsnl3'] = $this->input->post('na3');
			
			$userdata = array(
			'jur1'  => $this->input->post('jurusan1'),
			'jur2'  => $this->input->post('jurusan2'),
			'jur3'  => $this->input->post('jurusan3'),
			'snl1'  => $this->input->post('na1'),
			'snl2'  => $this->input->post('na2'),
			'snl3'  => $this->input->post('na3')
			);
			$this->session->set_userdata($userdata);
			
			$id_siswa = $this->input->post('id_siswa');
			
			$this->model1->update_jurusan($id_siswa, $data);
			$this->session->set_flashdata('pesan4','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data telah berhasil di update ke dalam database.</div>');
			$data['ddjurusan'] = $this->model1->pilih_jurusan();	
			$data['ddjurusan1'] = $this->model1->pilih_jurusan1();
			$data['siswa'] = $this->model1->select_by_id_siswa($id_siswa)->row();
			$this->load->view('view46',$data); 
		}
		
		public function update_jurusan1(){
			$data['jurusan1'] = $this->input->post('jurusan1');
			$data['jurusan2'] = $this->input->post('jurusan2');
			$data['jurusan3'] = $this->input->post('jurusan3');
			$data['jsnl1'] = $this->input->post('ns1');
			$data['jsnl2'] = $this->input->post('ns2');
			$data['jsnl3'] = $this->input->post('ns3');
			
			$userdata = array(
			'jur1'  => $this->input->post('jurusan1'),
			'jur2'  => $this->input->post('jurusan2'),
			'jur3'  => $this->input->post('jurusan3'),
			'snl1'  => $this->input->post('na1'),
			'snl2'  => $this->input->post('na2'),
			'snl3'  => $this->input->post('na3')
			);
			$this->session->set_userdata($userdata);
			
			$id_siswa = $this->input->post('id_siswa');
			
			$this->model1->update_jurusan($id_siswa, $data);
			$this->session->set_flashdata('pesan4','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data telah berhasil di update ke dalam database.</div>');
			$data['ddjurusan'] = $this->model1->pilih_jurusan();	
			$data['ddjurusan1'] = $this->model1->pilih_jurusan1();
			$data['siswa'] = $this->model1->select_by_id_siswa($id_siswa)->row();
			$this->load->view('view46',$data); 
		}
		
		public function log($offset=0)
		{ 
			$perpage = 100;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'log/',
			'total_rows' => $this->model1->hitung_baris(),
			'per_page' => $perpage,
			'full_tag_open' => '<ul class="pagination" id="search_page_pagination">',
			'full_tag_close' => '</ul>',
			'cur_tag_open' => '<li class="active"><a href="javascript:void(0)">',
			'num_tag_open' => '<li>',
			'num_tag_close' =>'</li>',
			'cur_tag_close' => '</a></li>',
			'first_link' => 'Awal',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_link' => 'Akhir',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'next_link' => 'Selanjutnya',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_link' => 'Sebelumnya',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'page_query_string' => FALSE,
			'display_pages' => FALSE,
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['View_log'] = $this->model1->select_all_paging($limit)->result();
			$this->load->view('view48', $data);
		}
		
		public function delete_log($no_peserta){
			$this->model1->hapus_log($no_peserta);
			redirect(site_url('log'));
		}
		
		public function del_all(){
			$this->model1->hapus_all();
			redirect(site_url('log'));
		}
		
		function Carilog($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'carilog/',
			'total_rows' =>  $this->model1->hitung_baris(),
			'per_page' => $perpage,
			'full_tag_open' => '<ul class="pagination" id="search_page_pagination">',
			'full_tag_close' => '</ul>',
			'cur_tag_open' => '<li class="active"><a href="javascript:void(0)">',
			'num_tag_open' => '<li>',
			'num_tag_close' =>'</li>',
			'cur_tag_close' => '</a></li>',
			'first_link' => 'Awal',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_link' => 'Akhir',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'next_link' => 'Selanjutnya',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_link' => 'Sebelumnya',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'page_query_string' => FALSE,
			'display_pages' => FALSE,
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['View_log'] = $this->model1->Carilog($limit)->result();
			$this->load->view('view48', $data);
		}
		
		public function update_log(){
			$pilih = $this->input->post('pilih');
			$id_log = $this->input->post('id_log');
			if ($pilih=="")
			{
				redirect(site_url('log'));
			} 
			else if ($pilih=="2")
			{
				foreach ($id_log as $value)
				{
					$data[] = $value;
				}
				
				$this->model1->bulk_delete($data);
				redirect(site_url('log'));	
			}
		}
		
		public function hasil_jawaban2()
		{   
		    $data1 = $this->model1->cetak();
			
			foreach ($data1 AS $record) {
				$jml_soal = $record->jml_soal;
				$s_benar = $this->input->post('benar');
				$s_salah = $this->input->post('salah');
				$s_kosong = $this->input->post('kosong');
				$skala = $this->input->post('skala');				
				$mapel1 = $record->mapel1;
				$mapel2 = $record->mapel2;
				$mapel3 = $record->mapel3;
				$mapel4 = $record->mapel4;
				$mapel5 = $record->mapel5;
				$mapel6 = $record->mapel6;
				$mapel7 = $record->mapel7;
				$mapel8 = $record->mapel8;
				$mapel9 = $record->mapel9;
				$mapel10 = $record->mapel10;
				$jml_mapel1 = $record->jml_mapel1;
				$jml_mapel2 = $record->jml_mapel2;
				$jml_mapel3 = $record->jml_mapel3;
				$jml_mapel4 = $record->jml_mapel4;
				$jml_mapel5 = $record->jml_mapel5;
				$jml_mapel6 = $record->jml_mapel6;
				$jml_mapel7 = $record->jml_mapel7;
				$jml_mapel8 = $record->jml_mapel8;
				$jml_mapel9 = $record->jml_mapel9;
				$jml_mapel10 = $record->jml_mapel10;
				$jumlah_mapel = $record->jumlah_mapel;
				$multi = $record->multi;
				
				$id_soal = explode(',',$record->no_soal);		
				$this->db->select('*');
				$this->db->from('soal');
				$this->db->where_in('id_soal',$id_soal);
				$this -> db -> order_by('FIELD(id_soal, '.$record->no_soal.' )');
				$query = $this->db->get ();
				
				$p = 1;
				foreach ($query->result() as $row){
					$item[$p] = $row->jrx;
					$p++; 
				}	
				$jrx = implode('',$item);
				
				$hasil = explode(',',$record->hasil_jawaban);
				
				$j=0;
				for($i=0;$i<$jml_soal;$i++)
				{
					if($jrx[$j] == "*") 
					{
						$nilai[$i] = 1;	
					} 
					else if (($hasil[$i] == "K") or (empty($hasil[$i])))
					{
						$nilai[$i] = 9;
					}
					else{
						if (strtolower($hasil[$i]) == strtolower($jrx[$j]))
						{
							$nilai[$i] = 1;
						}
						else
						{
							$nilai[$i] = 0;	
						}
					}
					$j++;
				}
				
				if ($multi==1)
				{						
					$pn1 = substr(implode('',$nilai),0,$jml_mapel1);			
					$pn2 = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
					$pn3 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
					$pn4 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
					$pn5 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
					$pn6 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
					$pn7 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
					$pn8 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
					$pn9 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
					$pn10 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
					
					$data['prosesnilai1'] = substr(implode('',$nilai),0,$jml_mapel1);			
					$data['prosesnilai2'] = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
					$data['prosesnilai3'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
					$data['prosesnilai4'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
					$data['prosesnilai5'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
					$data['prosesnilai6'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
					$data['prosesnilai7'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
					$data['prosesnilai8'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
					$data['prosesnilai9'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
					$data['prosesnilai10'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
					
					$data['proses_nilai'] = substr(implode(',',$nilai),0);
					$data['p_benar'] = count(array_keys($nilai, "1"));
					$data['p_salah'] = count(array_keys($nilai, "0"));
					$data['p_kosong'] = count(array_keys($nilai, "9"));
					
					$tot=0;
					$tot_k13=0;
					for($k=1;$k<=$jumlah_mapel;$k++){
						$data['benar'.+$k] = substr_count(${'pn'.$k}, "1");
						$data['salah'.+$k] = substr_count(${'pn'.$k}, "0");
						$data['kosong'.+$k] = substr_count(${'pn'.$k}, "9");
						${'benar'.$k} = substr_count(${'pn'.$k}, "1");
						${'salah'.$k} = substr_count(${'pn'.$k}, "0");
						${'kosong'.$k}  = substr_count(${'pn'.$k}, "9");
						
						if($skala==0) {				
							$data['nilai'.+$k] = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
							${'nilai'.$k} = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
						}
						else {
							$data['nilai'.+$k] = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
							${'nilai'.$k} = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
						}
						
						$data['k13_'.+$k] = +${'benar'.$k}/${'jml_mapel'.$k} * 3+1;
						${'k13_'.$k} = round(+${'benar'.$k}/${'jml_mapel'.$k} * 3+1, 2); 
						if (${'k13_'.$k} <= 4 && ${'k13_'.$k} >= 3.85) {${'predikat'.$k} = "A";}
						elseif (${'k13_'.$k} <= 3.84 && ${'k13_'.$k} >= 3.51) {${'predikat'.$k} = "A-";} 
						elseif (${'k13_'.$k} <= 3.50 && ${'k13_'.$k} >= 3.18) {${'predikat'.$k} = "B+";} 
						elseif (${'k13_'.$k} <= 3.17 && ${'k13_'.$k} >= 2.85) {${'predikat'.$k} = "B";} 
						elseif (${'k13_'.$k} <= 2.84 && ${'k13_'.$k} >= 2.51) {${'predikat'.$k} = "B-";} 
						elseif (${'k13_'.$k} <= 2.50 && ${'k13_'.$k} >= 2.18) {${'predikat'.$k} = "C+";} 
						elseif (${'k13_'.$k} <= 2.17 && ${'k13_'.$k} >= 1.85) {${'predikat'.$k} = "C";} 
						elseif (${'k13_'.$k} <= 1.84 && ${'k13_'.$k} >= 1.51) {${'predikat'.$k} = "C-";} 
						elseif (${'k13_'.$k} <= 1.50 && ${'k13_'.$k} >= 1.18) {${'predikat'.$k} = "D+";} 
						elseif (${'k13_'.$k} <= 1.17 && ${'k13_'.$k} >= 1.00) {${'predikat'.$k} = "D";} 
						$data['predikat'.+$k] = ${'predikat'.$k};	
						
						$tot = $tot + ${'nilai'.$k};
						$tot_k13 = $tot_k13 + ${'k13_'.$k};
						
					}
					
					$data['p_nilai'] = $tot/$jumlah_mapel;
					$data['k13'] = $tot_k13/$jumlah_mapel;
					$k13 = round($tot_k13/$jumlah_mapel, 2); 
					
					if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
					elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
					elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
					elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
					elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
					elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
					elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
					elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
					elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
					elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
					$data['predikat'] = $predikat;	
				}
				else
				{
					
					$data['proses_nilai'] = substr(implode(',',$nilai),0);
					$data['p_benar'] = count(array_keys($nilai, "1"));
					$data['p_salah'] = count(array_keys($nilai, "0"));
					$data['p_kosong'] = count(array_keys($nilai, "9"));
					
					$benar = count(array_keys($nilai, "1"));
					$salah  = count(array_keys($nilai, "0"));
					$kosong  = count(array_keys($nilai, "9"));
					
					if($skala==0) {		
						$data['p_nilai'] = ($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong));
					} else
					{
						$data['p_nilai'] = (((($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong)))/$jml_soal)*$skala)/$s_benar;
					}
					
					$data['k13'] = +$benar/$jml_soal * 3+1;
					$k13 = round(+$benar/$jml_soal * 3+1, 2); 
					if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
					elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
					elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
					elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
					elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
					elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
					elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
					elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
					elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
					elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
					$data['predikat'] = $predikat;				
				}
				
				$data['jrx'] = implode(',',$item);
				$data['keterangan'] = $this->input->post('keterangan');
				$data['stat'] = $this->input->post('stat');
				$data['cek'] = 0;
				$data['benar'] = $this->input->post('benar');
				$data['salah'] = $this->input->post('salah');
				$data['kosong'] = $this->input->post('kosong');
				$data['skala'] = $this->input->post('skala');
				
				$no_copy = $record->no_copy;
				$this->model4->update_jawaban1($no_copy,$data);		
			}	
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->caridata1();
			$this->load->view('view17', $data);
		}
		
		public function batalkan_banyak_nilai()
		{
			$data1 = $this->model1->cetak();			
			foreach ($data1 AS $record) {
				$data['proses_nilai'] = "";
				$data['p_benar'] = "";
				$data['p_salah'] = "";
				$data['p_kosong'] = "";
				$data['p_nilai'] = "";
				$data['predikat'] = "";
				$data['k13'] = "";
				$data['prosesnilai1'] = "";
				$data['prosesnilai2'] = "";
				$data['prosesnilai3'] = "";
				$data['prosesnilai4'] = "";
				$data['prosesnilai5'] = "";
				$data['prosesnilai6'] = "";
				$data['prosesnilai7'] = "";
				$data['prosesnilai8'] = "";
				$data['prosesnilai9'] = "";
				$data['prosesnilai10'] = "";
				$data['benar1'] = "";
				$data['benar2'] = "";
				$data['benar3'] = "";
				$data['benar4'] = "";
				$data['benar5'] = "";
				$data['benar6'] = "";
				$data['benar7'] = "";
				$data['benar8'] = "";
				$data['benar9'] = "";
				$data['benar10'] = "";
				$data['salah1'] = "";
				$data['salah2'] = "";
				$data['salah3'] = "";
				$data['salah4'] = "";
				$data['salah5'] = "";
				$data['salah6'] = "";
				$data['salah7'] = "";
				$data['salah8'] = "";
				$data['salah9'] = "";
				$data['salah10'] = "";
				$data['kosong1'] = "";
				$data['kosong2'] = "";
				$data['kosong3'] = "";
				$data['kosong4'] = "";
				$data['kosong5'] = "";
				$data['kosong6'] = "";
				$data['kosong7'] = "";
				$data['kosong8'] = "";
				$data['kosong9'] = "";
				$data['kosong10'] = "";
				$data['nilai1'] = "";
				$data['nilai2'] = "";
				$data['nilai3'] = "";
				$data['nilai4'] = "";
				$data['nilai5'] = "";
				$data['nilai6'] = "";
				$data['nilai7'] = "";
				$data['nilai8'] = "";
				$data['nilai9'] = "";
				$data['nilai10'] = "";
				$data['k13_1'] = "";
				$data['k13_2'] = "";
				$data['k13_3'] = "";
				$data['k13_4'] = "";
				$data['k13_5'] = "";
				$data['k13_6'] = "";
				$data['k13_7'] = "";
				$data['k13_8'] = "";
				$data['k13_9'] = "";
				$data['k13_10'] = "";
				$data['predikat1'] = "";
				$data['predikat2'] = "";
				$data['predikat3'] = "";
				$data['predikat4'] = "";
				$data['predikat5'] = "";
				$data['predikat6'] = "";
				$data['predikat7'] = "";
				$data['predikat8'] = "";
				$data['predikat9'] = "";
				$data['predikat10'] = "";
				$data['sort_soal'] = "";
				$data['sort_jawaban'] = "";
				$data['sort_jrx'] = "";
				$data['sort_hasil'] = "";
				$data['analisa'] = "";
				$data['cek'] = 1;
				
				$no_copy = $record->no_copy;
				$this->model4->batalkan_nilai($no_copy,$data);	
			}			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->caridata1();
			
			$this->load->view('view17', $data);
		}
		
		
		public function hapus_ujian_siswa()
		{
			
			$data1 = $this->model1->hapus_hasil_ujian();			
			redirect(site_url('Controller3/mafter_delete'));			
		}
		
		public function mhasil_jawaban2()
		{   
		    $data1 = $this->model1->cetak();
			
			foreach ($data1 AS $record) {
				$jml_soal = $record->jml_soal;
				$s_benar = $this->input->post('benar');
				$s_salah = $this->input->post('salah');
				$s_kosong = $this->input->post('kosong');
				$skala = $this->input->post('skala');
				$mapel1 = $record->mapel1;
				$mapel2 = $record->mapel2;
				$mapel3 = $record->mapel3;
				$mapel4 = $record->mapel4;
				$mapel5 = $record->mapel5;
				$mapel6 = $record->mapel6;
				$mapel7 = $record->mapel7;
				$mapel8 = $record->mapel8;
				$mapel9 = $record->mapel9;
				$mapel10 = $record->mapel10;
				$jml_mapel1 = $record->jml_mapel1;
				$jml_mapel2 = $record->jml_mapel2;
				$jml_mapel3 = $record->jml_mapel3;
				$jml_mapel4 = $record->jml_mapel4;
				$jml_mapel5 = $record->jml_mapel5;
				$jml_mapel6 = $record->jml_mapel6;
				$jml_mapel7 = $record->jml_mapel7;
				$jml_mapel8 = $record->jml_mapel8;
				$jml_mapel9 = $record->jml_mapel9;
				$jml_mapel10 = $record->jml_mapel10;
				$jumlah_mapel = $record->jumlah_mapel;
				$multi = $record->multi;
				
				$id_soal = explode(',',$record->no_soal);		
				$this->db->select('*');
				$this->db->from('soal');
				$this->db->where_in('id_soal',$id_soal);
				$this -> db -> order_by('FIELD(id_soal, '.$record->no_soal.' )');
				$query = $this->db->get ();
				
				$p = 1;
				foreach ($query->result() as $row){
					$item[$p] = $row->jrx;
					$p++; 
				}	
				$jrx = implode('',$item);
				
				$hasil = explode(',',$record->hasil_jawaban);
				
				$j=0;
				for($i=0;$i<$jml_soal;$i++)
				{
					if($jrx[$j] == "*") 
					{
						$nilai[$i] = 1;	
					} 
					else if (($hasil[$i] == "K") or (empty($hasil[$i])))
					{
						$nilai[$i] = 9;
					}
					else{
						if (strtolower($hasil[$i]) == strtolower($jrx[$j]))
						{
							$nilai[$i] = 1;
						}
						else
						{
							$nilai[$i] = 0;	
						}
					}
					$j++;
				}
				
				if ($multi==1)
				{						
					$pn1 = substr(implode('',$nilai),0,$jml_mapel1);			
					$pn2 = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
					$pn3 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
					$pn4 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
					$pn5 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
					$pn6 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
					$pn7 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
					$pn8 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
					$pn9 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
					$pn10 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
					
					$data['prosesnilai1'] = substr(implode('',$nilai),0,$jml_mapel1);			
					$data['prosesnilai2'] = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
					$data['prosesnilai3'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
					$data['prosesnilai4'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
					$data['prosesnilai5'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
					$data['prosesnilai6'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
					$data['prosesnilai7'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
					$data['prosesnilai8'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
					$data['prosesnilai9'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
					$data['prosesnilai10'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
					
					$data['proses_nilai'] = substr(implode(',',$nilai),0);
					$data['p_benar'] = count(array_keys($nilai, "1"));
					$data['p_salah'] = count(array_keys($nilai, "0"));
					$data['p_kosong'] = count(array_keys($nilai, "9"));
					
					$tot=0;
					$tot_k13=0;
					for($k=1;$k<=$jumlah_mapel;$k++){
						$data['benar'.+$k] = substr_count(${'pn'.$k}, "1");
						$data['salah'.+$k] = substr_count(${'pn'.$k}, "0");
						$data['kosong'.+$k] = substr_count(${'pn'.$k}, "9");
						${'benar'.$k} = substr_count(${'pn'.$k}, "1");
						${'salah'.$k} = substr_count(${'pn'.$k}, "0");
						${'kosong'.$k}  = substr_count(${'pn'.$k}, "9");
						
						if($skala==0) {				
							$data['nilai'.+$k] = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
							${'nilai'.$k} = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
						}
						else {
							$data['nilai'.+$k] = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
							${'nilai'.$k} = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
						}
						
						$data['k13_'.+$k] = +${'benar'.$k}/${'jml_mapel'.$k} * 3+1;
						${'k13_'.$k} = round(+${'benar'.$k}/${'jml_mapel'.$k} * 3+1, 2); 
						if (${'k13_'.$k} <= 4 && ${'k13_'.$k} >= 3.85) {${'predikat'.$k} = "A";}
						elseif (${'k13_'.$k} <= 3.84 && ${'k13_'.$k} >= 3.51) {${'predikat'.$k} = "A-";} 
						elseif (${'k13_'.$k} <= 3.50 && ${'k13_'.$k} >= 3.18) {${'predikat'.$k} = "B+";} 
						elseif (${'k13_'.$k} <= 3.17 && ${'k13_'.$k} >= 2.85) {${'predikat'.$k} = "B";} 
						elseif (${'k13_'.$k} <= 2.84 && ${'k13_'.$k} >= 2.51) {${'predikat'.$k} = "B-";} 
						elseif (${'k13_'.$k} <= 2.50 && ${'k13_'.$k} >= 2.18) {${'predikat'.$k} = "C+";} 
						elseif (${'k13_'.$k} <= 2.17 && ${'k13_'.$k} >= 1.85) {${'predikat'.$k} = "C";} 
						elseif (${'k13_'.$k} <= 1.84 && ${'k13_'.$k} >= 1.51) {${'predikat'.$k} = "C-";} 
						elseif (${'k13_'.$k} <= 1.50 && ${'k13_'.$k} >= 1.18) {${'predikat'.$k} = "D+";} 
						elseif (${'k13_'.$k} <= 1.17 && ${'k13_'.$k} >= 1.00) {${'predikat'.$k} = "D";} 
						$data['predikat'.+$k] = ${'predikat'.$k};	
						
						$tot = $tot + ${'nilai'.$k};
						$tot_k13 = $tot_k13 + ${'k13_'.$k};
						
					}
					
					$data['p_nilai'] = $tot/$jumlah_mapel;
					$data['k13'] = $tot_k13/$jumlah_mapel;
					$k13 = round($tot_k13/$jumlah_mapel, 2); 
					
					if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
					elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
					elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
					elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
					elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
					elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
					elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
					elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
					elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
					elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
					$data['predikat'] = $predikat;	
				}
				else
				{
					
					$data['proses_nilai'] = substr(implode(',',$nilai),0);
					$data['p_benar'] = count(array_keys($nilai, "1"));
					$data['p_salah'] = count(array_keys($nilai, "0"));
					$data['p_kosong'] = count(array_keys($nilai, "9"));
					
					$benar = count(array_keys($nilai, "1"));
					$salah  = count(array_keys($nilai, "0"));
					$kosong  = count(array_keys($nilai, "9"));
					
					if($skala==0) {		
						$data['p_nilai'] = ($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong));
					} else
					{
						$data['p_nilai'] = (((($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong)))/$jml_soal)*$skala)/$s_benar;
					}
					
					$data['k13'] = +$benar/$jml_soal * 3+1;
					$k13 = round(+$benar/$jml_soal * 3+1, 2); 
					if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
					elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
					elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
					elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
					elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
					elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
					elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
					elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
					elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
					elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
					$data['predikat'] = $predikat;				
				}
				$data['keterangan'] = $this->input->post('keterangan');
				$data['stat'] = $this->input->post('stat');
				$data['cek'] = 0;
				
				$no_copy = $record->no_copy;
				$data['benar'] = $this->input->post('benar');
				$data['salah'] = $this->input->post('salah');
				$data['kosong'] = $this->input->post('kosong');
				$data['skala'] = $this->input->post('skala');
				$data['jrx'] = implode(',',$item);
				$this->model4->update_jawaban1($no_copy,$data);		
			}	
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->caridata1();
			$this->load->view('view18', $data);
		}
		
		public function mbatalkan_banyak_nilai()
		{
			$data1 = $this->model1->cetak();			
			foreach ($data1 AS $record) {
				$data['proses_nilai'] = "";
				$data['p_benar'] = "";
				$data['p_salah'] = "";
				$data['p_kosong'] = "";
				$data['p_nilai'] = "";
				$data['predikat'] = "";
				$data['k13'] = "";
				$data['prosesnilai1'] = "";
				$data['prosesnilai2'] = "";
				$data['prosesnilai3'] = "";
				$data['prosesnilai4'] = "";
				$data['prosesnilai5'] = "";
				$data['prosesnilai6'] = "";
				$data['prosesnilai7'] = "";
				$data['prosesnilai8'] = "";
				$data['prosesnilai9'] = "";
				$data['prosesnilai10'] = "";
				$data['benar1'] = "";
				$data['benar2'] = "";
				$data['benar3'] = "";
				$data['benar4'] = "";
				$data['benar5'] = "";
				$data['benar6'] = "";
				$data['benar7'] = "";
				$data['benar8'] = "";
				$data['benar9'] = "";
				$data['benar10'] = "";
				$data['salah1'] = "";
				$data['salah2'] = "";
				$data['salah3'] = "";
				$data['salah4'] = "";
				$data['salah5'] = "";
				$data['salah6'] = "";
				$data['salah7'] = "";
				$data['salah8'] = "";
				$data['salah9'] = "";
				$data['salah10'] = "";
				$data['kosong1'] = "";
				$data['kosong2'] = "";
				$data['kosong3'] = "";
				$data['kosong4'] = "";
				$data['kosong5'] = "";
				$data['kosong6'] = "";
				$data['kosong7'] = "";
				$data['kosong8'] = "";
				$data['kosong9'] = "";
				$data['kosong10'] = "";
				$data['nilai1'] = "";
				$data['nilai2'] = "";
				$data['nilai3'] = "";
				$data['nilai4'] = "";
				$data['nilai5'] = "";
				$data['nilai6'] = "";
				$data['nilai7'] = "";
				$data['nilai8'] = "";
				$data['nilai9'] = "";
				$data['nilai10'] = "";
				$data['k13_1'] = "";
				$data['k13_2'] = "";
				$data['k13_3'] = "";
				$data['k13_4'] = "";
				$data['k13_5'] = "";
				$data['k13_6'] = "";
				$data['k13_7'] = "";
				$data['k13_8'] = "";
				$data['k13_9'] = "";
				$data['k13_10'] = "";
				$data['predikat1'] = "";
				$data['predikat2'] = "";
				$data['predikat3'] = "";
				$data['predikat4'] = "";
				$data['predikat5'] = "";
				$data['predikat6'] = "";
				$data['predikat7'] = "";
				$data['predikat8'] = "";
				$data['predikat9'] = "";
				$data['predikat10'] = "";
				$data['sort_soal'] = "";
				$data['sort_jawaban'] = "";
				$data['sort_jrx'] = "";
				$data['sort_hasil'] = "";
				$data['analisa'] = "";
				$data['cek'] = 1;
				
				$no_copy = $record->no_copy;
				$this->model4->batalkan_nilai($no_copy,$data);	
			}			
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->caridata1();
			
			$this->load->view('view18', $data);
		}
		
		public function mhapus_ujian_siswa()
		{
			$data1 = $this->model1->hapus_hasil_ujian();			
			redirect(site_url('Controller3/mafter_delete'));			
		}
		
		public function hasil_ujian_to($id,$idf)
		{   		  
			$data['hasil'] = $this->model1->select_by_id_proses1($id,$idf)->row();	
			$this->load->view('view10a', $data);
		}
		
		function carinama() {
			$userdata = array(
			'multimapel1'  => $this->input->post('multimapel1'),
			);
			$this->session->set_userdata($userdata);			
			
			$multimapel = $this->input->post('multimapel1');
			$data['ddkelas'] = $this->model1->ambilkelas(); 
			$data['ddujian'] = $this->model1->ambilujian();
			$data['ddsekolah'] = $this->model1->ambilsekolah();
			$data['hasil']=$this->model1->caridatanama();
			//jika data yang dicari tidak ada maka akan keluar informasi 
			//bahwa data yang dicari tidak ada
			if($data['hasil']==null) {
				$this->session->set_flashdata('pesan4','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
				alert-success">Maaf data yang anda cari tidak ada.</div>');
				$this->load->view('view13',$data); 
			}
			else if ($multimapel==1)
			{
				
				$this->load->view('view18',$data); 
			}
			else
			{
				$this->load->view('view17',$data); 
				
			}
		}
		
		
	}																											