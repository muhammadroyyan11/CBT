<?php ob_start();  
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Controller1 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model6');
			$this->load->library('session'); 
			$this->load->library('Upload'); 
			$this->load->helper('text');
			$this->load->database();
			$this->load->library('zip');
			$this->load->helper('download');
		}
		
		public function index()
		{
			$this->load->dbutil();
			$config = array(
			'tables' => array(), 
			'ignore' => array(), 
			'format' => 'sql', 
			'add_drop' => TRUE, 
			'add_insert' => TRUE, 
			'newline' => "\n" 
			);
			
		
			$backup = $this->dbutil->backup($config);
			
			$this->load->helper('file');		
			$file_name = 'full_'.date("dmy_his").'.sql';
			force_download($file_name, $backup);
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Full Backup Database telah selesai dan
			berhasil.</div>');
			redirect('backrest');
		}
		
		public function user()
		{
			$this->load->dbutil();
			$config = array(
			'tables' => array('pengguna'), 
			'ignore' => array(), 
			'format' => 'sql', 
			'add_drop' => TRUE, 
			'add_insert' => TRUE, 
			'newline' => "\n" 
			);
			
			
			$backup = $this->dbutil->backup($config);
			
			$this->load->helper('file');
			$file_name = 'user_'.date("dmy_his").'.sql';
			force_download($file_name, $backup);
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Database User telah selesai dan
			berhasil.</div>');
			redirect('backrest');
		}
		
		public function kelas()
		{
			$this->load->dbutil();
			$config = array(
			'tables' => array('kelas'), 
			'ignore' => array(), 
			'format' => 'sql', 
			'add_drop' => TRUE, 
			'add_insert' => TRUE, 
			'newline' => "\n" 
			);
			
			$backup = $this->dbutil->backup($config);
			
			
			
			$this->load->helper('file');
			$file_name = 'kelas_'.date("dmy_his").'.sql';
			force_download($file_name, $backup);
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Database Kelas telah selesai dan
			berhasil.</div>');
			redirect('backrest');	
		}
		
		public function peminatan()
		{
			$this->load->dbutil();
			$config = array(
			'tables' => array('peminatan'), 
			'ignore' => array(), 
			'format' => 'sql', 
			'add_drop' => TRUE, 
			'add_insert' => TRUE, 
			'newline' => "\n" 
			);
			
			$backup = $this->dbutil->backup($config);
			
			
			$this->load->helper('file');
			$file_name = 'peminatan_'.date("dmy_his").'.sql';
			force_download($file_name, $backup);
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Database Peminatan telah selesai dan
			berhasil.</div>');
			redirect('backrest');	
		}
		
		public function jurusan()
		{
			$this->load->dbutil();
			$config = array(
			'tables' => array('jurusan'), 
			'ignore' => array(), 
			'format' => 'sql', 
			'add_drop' => TRUE, 
			'add_insert' => TRUE, 
			'newline' => "\n" 
			);
			
			$backup = $this->dbutil->backup($config);
			
			
			
			$this->load->helper('file');
			$file_name = 'jurusan_'.date("dmy_his").'.sql';
			force_download($file_name, $backup);
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Database Jurusan telah selesai dan
			berhasil.</div>');
			redirect('backrest');	
		}
		
		public function soal()
	 	{   
			$this->load->dbutil();
			$config = array(
			'tables' => array('ujian','soal'),  
			'ignore' => array(), 
			'format' => 'sql',  
			'add_drop' => FALSE, 
			'add_insert' => TRUE, 
			'delimiter' => '|',
			'newline' => "\n" 
			);
			
			
			$backup = $this->dbutil->backup($config);
			
			$this->load->helper('file');
			$file_name = 'soal_'.date("dmy_his").'.sql';
			force_download($file_name, $backup);
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Database Soal telah selesai dan
			berhasil.</div>');
			redirect('backrest');
		}
		
		public function haji()
		{
			$this->load->dbutil();
			$config = array(
			'tables' => array('proses'), 
			'ignore' => array(), 
			'format' => 'sql', 
			'add_drop' => TRUE, 
			'add_insert' => TRUE, 
			'newline' => "\n" 
			);
			
			$backup = $this->dbutil->backup($config);
			
			$this->load->helper('file');
			$file_name = 'hasil_'.date("dmy_his").'.sql';
			force_download($file_name, $backup);
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Database Hasil Ujian telah selesai dan
			berhasil.</div>');
			redirect('backrest');
			
		}
		
		public function hapus_haji()
		{
			$this->db->from('proses'); 
			$this->db->truncate(); 
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database Hasil Ujian telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		public function hapus_siswa()
		{
			$dm1 = "role='3' OR role='2'";
			$this->db->from('pengguna'); 
			$this->db->where($dm1);
			$this->db->delete(); 
			$this->db->query('ALTER TABLE pengguna AUTO_INCREMENT 2');
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database Siswa telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		public function hapus_full()
		{
			$dm1 = "role='3' OR role='2'";
			$this->db->from('pengguna'); 
			$this->db->where($dm1);
			$this->db->delete(); 
			$this->db->query('ALTER TABLE pengguna AUTO_INCREMENT 2');
			$dm = "id_kelas!='1'"; 
			$this->db->from('kelas'); 
			$this->db->where($dm);
			$this->db->delete();
			$this->db->query('ALTER TABLE kelas AUTO_INCREMENT 2');
			$this->db->truncate('ujian');
			$this->db->truncate('soal');
			$this->db->truncate('proses');
			$this->db->truncate('jurusan');
			$this->db->truncate('peminatan');
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		public function hapus_jurusan()
		{
			$this->db->truncate('jurusan'); 
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database jurusan telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		public function hapus_log()
		{
			$this->db->truncate('log'); 
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database Login Session telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		
		public function hapus_peminatan()
		{
			$this->db->truncate('peminatan'); 
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database Peminatan telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		public function hapus_kelas()
		{
		    $dm = "id_kelas!='1'"; 
			$this->db->from('kelas'); 
			$this->db->where($dm);
			$this->db->delete();
			$this->db->query('ALTER TABLE kelas AUTO_INCREMENT 2');
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database Kelas telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		public function hapus_soal()
		{
			$this->db->truncate('ujian');
			$this->db->truncate('soal');
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Database Soal Ujian telah berhasil dihapus.</div>');
			redirect('backrest');
		}
		
		
		
		public function restore(){
			
$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'sql';
			$config['max_size'] = '';
			$config['overwrite'] = TRUE;
			$this->load->library('upload');			
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file_restore')){
			
				$error = array('error' => $this->upload->display_errors('<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert alert-success">', '</div>'));
				$error['ddujian'] = $this->model6->ambilujian();
				$this->load->view('view1', $error);
				}else{
				$dbase = $this->input->post('dbase');
				if ($dbase == ''){
					$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
					alert-success"><b>Backup Gagal!</b> Anda belum memilih Tipe Database.</div>');
					} else {
					
					if ($dbase == 0){
						$this->db->truncate('pengguna');
						$this->db->truncate('kelas');
						$this->db->truncate('ujian');
						$this->db->truncate('soal');
						$this->db->truncate('proses');
						$this->db->truncate('jurusan');
						$this->db->truncate('program_studi');
						$this->db->truncate('peminatan');
					} 
					else if ($dbase == 1){
						$this->db->truncate('pengguna');
					}
					else if ($dbase == 2){
						$this->db->truncate('kelas');
					}
					else if ($dbase == 3){
						$this->db->truncate('ujian');
						$this->db->truncate('soal');
					}
					else if ($dbase == 4){
						$this->db->truncate('proses');
					}
					else if ($dbase == 5){
						$this->db->truncate('jurusan');
					}
					else if ($dbase == 6){
						$this->db->truncate('peminatan');
					}
					
					$folback = 'uploads/';
					$datafile = $this->upload->data();
					$namafile = $datafile['file_name'];
					$direktori = $folback.$namafile;
					$tables = $this->db->list_tables();
					
					$templine = '';
					$lines = file($direktori);
					foreach ($lines as $line)
					{
						if (substr($line, 0, 2) == '--' || $line == '')
						continue;
						$templine .= $line;
						if (substr(trim($line), -1, 1) == ';')
						{
							$this->db->query($templine);
							$templine = '';
						}
					}
					$this->session->set_flashdata('pesan','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin:20px 0 10px 0;" class="alert
					alert-success"><b>Sukses!</b> Restore Database telah selesai dan
					berhasil.</div>');
				}
				redirect('backrest');
			}
		}
		
		
		public function settingheader(){
			$data['teks'] = $this->model6->settingheader()->row();
			$this->load->view('view47', $data);
		}
		
		public function simpansetting()
		{
			$data['teks1'] = $this->input->post('teks1');
			$data['teks2'] = $this->input->post('teks2');
			$data['teks3'] = $this->input->post('teks3');
			$data['ipp'] = $this->input->post('ipp');
			$data['sess'] = $this->input->post('sess');
			$data['page'] = $this->input->post('hal');
            $this->model6->update_logo($data);
			$data['teks'] = $this->model6->settingheader()->row();
			$this->load->view('view47', $data);
		}
		
		public function simpanlogo()
		{
			$config['upload_path'] = "assets/css/images/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('logo_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('logo_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'logo'=>$this->upload->file_name ); 
			}	
			
			$this->model6->update_logo($data);
			$data['teks'] = $this->model6->settingheader()->row();
			$this->load->view('view47', $data);
		}
		
		public function pbackup()
		{   
			$id_ujian = $this->input->post('id_ujian');
			if($id_ujian == 0){
				$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
				alert-success"><b>Backup Gagal!</b> Anda belum memilih Mata Pelajaran Ujian.</div>');
				}else{
				$conn = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password);	
				$this->db->select('*');
				$this->db->from('ujian');
				$this->db->where_in('id_ujian',$id_ujian);
				$query = $this->db->get ();												
				$qrow = $query->result();
				$row = $qrow[0];
				$mapel = $row->nama_ujian;
				$namafile = $mapel.'_'.date("dmy_his").'.sql';
				
				$folback= FCPATH.'/uploads/';     
				
				$sql = "SELECT * INTO OUTFILE '$folback$namafile' FROM soal WHERE id_ujian='$id_ujian'";
				
				
				mysqli_select_db($conn,$this->db->database);
				$retval = mysqli_query( $conn,$sql);
				
				
				if(! $retval ) {
					die('Gagal Backup Soal, Silakan coba lagi!' . mysqli_error($conn));
				}
				
				$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
				alert-success"><b>Sukses!</b> Backup Database Soal '.$mapel.' telah selesai dan
				berhasil.</div>');
				
				mysqli_close($conn);
			}
			
			
			force_download(FCPATH.'/uploads/'.$namafile, null);
			
			redirect('backrest');
		}
		
		public function prestore()
		{		
			$conn = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password);
			$file_name = $this->input->post('file_prestore');

			$folback= FCPATH.'/uploads/';  
			$id_ujian = $this->input->post('id_ujian');
			$config['upload_path'] = $folback;
			$config['allowed_types'] = '*';
			$config['max_size'] = '0';
			$config['overwrite'] = TRUE;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file_prestore')){
				$error = array('error' => $this->upload->display_errors('<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert alert-success">', '</div>'));
				$error['ddujian'] = $this->model6->ambilujian();				
				$this->load->view('view1', $error);
				}else{			
				if($id_ujian == 0){
					$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
					alert-success"><b>Restore Gagal!</b> Anda belum memilih Mata Pelajaran Ujian.</div>');
					}else{
					$datafile = $this->upload->data();
					$namafile = $datafile['file_name'];
					
					$sql = "LOAD DATA INFILE '$folback$namafile' INTO TABLE temp_soal";
					
					mysqli_select_db($conn,$this->db->database);
					$retval = mysqli_query( $conn,$sql);
					
					if(! $retval ) {
						die('Could not load data : ' . mysqli_error($conn));
					}
					$data['id_ujian'] = $this->input->post('id_ujian');
					$id_ujian = $this->input->post('id_ujian');
					$this->model6->update_temp($data);
					$this->db->select('*');
					$query = $this->db->get('temp_soal');
					
					foreach ($query->result() as $row){   					
						$data1[] =  array(
						'bobot' => $row->bobot,
						'mm_soal' => $row->mm_soal,
						'soal' => $row->soal,
						'pil_a' => $row->pil_a,
						'pil_b' => $row->pil_b,
						'pil_c' => $row->pil_c,
						'pil_d' => $row->pil_d,
						'pil_e' => $row->pil_e,
						'jrx' => $row->jrx,
						'id_ujian' => $row->id_ujian,
						'aktif' => $row->aktif,
						'kyd' => $row->kyd
						);					
					}
					
					$this->db->insert_batch('soal',$data1); 
					$this->db->truncate('temp_soal'); 
					
					$this->db->select('*');
					$this->db->from('ujian');
					$this->db->where_in('id_ujian',$id_ujian);
					$query = $this->db->get ();												
					$qrow = $query->result();
					$row = $qrow[0];
					$mapel = $row->nama_ujian;
					
					$this->session->set_flashdata('pesan','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin:20px 0 10px 0;" class="alert
					alert-success"><b>Sukses!</b> Restore Database Soal '.$mapel.' telah selesai dan
					berhasil.</div>');
					
					mysqli_close($conn);
				}
				redirect('backrest');
			}
		}
		
		public function backrest()
		{
			$data['error'] = '';
			$data['ddujian'] = $this->model6->ambilujian();
			$this->load->view('view1', $data);
		}
		
		function zipgbr()
		{
			
			$path = 'assets/kcfinder/upload/images';
			$this->zip->read_dir($path, FALSE); 
			$this->zip->download('gambar.zip');
			
			
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Gambar Soal telah selesai dan
			berhasil.</div>');
			redirect('backrest');
		}
		
		function zipprofil()
		{
			
			$path = 'assets/kcfinder/upload/foto';
			$this->zip->read_dir($path, FALSE); 
			$this->zip->download('foto_profil.zip');
			
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Foto Profil telah selesai dan
			berhasil.</div>');
			redirect('backrest');
		}
		
		function zipaudio()
		{
			
			$path = 'assets/kcfinder/upload/audio';
			$this->zip->read_dir($path, FALSE); 
			$this->zip->download('audio.zip');
			
			$this->session->set_flashdata('pesan1','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
			alert-success"><b>Sukses!</b> Backup Audio Soal telah selesai dan
			berhasil.</div>');
			redirect('backrest');
		}
		
		function uploadgbr ()
		{
$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'zip';
			$config['max_size']    = '';
			$config['overwrite'] = TRUE;
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('file_gbr'))
			{
				$error = array('error' => $this->upload->display_errors('<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert alert-success">', '</div>'));
				$error['ddujian'] = $this->model6->ambilujian();
				$this->load->view('view1', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$zip = new ZipArchive;
				$file = $data['upload_data']['full_path'];
				chmod($file,0777);
				
				if ($zip->open($file) === TRUE) {
                    $zip->extractTo('assets/kcfinder/upload/');
                    $zip->close();
					$this->session->set_flashdata('pesan','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin:20px 0 10px 0;" class="alert
					alert-success"><b>Sukses!</b> Restore Gambar Soal telah selesai dan
					berhasil.</div>');
					} else {
					$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
					alert-success"><b>Restore Gagal!</b></div>');
				}
				redirect('backrest');
			}
		}
		
		function uploadprofil ()
		{
$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'zip';
			$config['max_size']    = '';
			$config['overwrite'] = TRUE;
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('file_profil'))
			{
				$error = array('error' => $this->upload->display_errors('<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert alert-success">', '</div>'));
				$error['ddujian'] = $this->model6->ambilujian();
				$this->load->view('view1', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$zip = new ZipArchive;
				$file = $data['upload_data']['full_path'];
				
				if ($zip->open($file) === TRUE) {
                    $zip->extractTo('assets/kcfinder/upload/');
                    $zip->close();
					$this->session->set_flashdata('pesan','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin:20px 0 10px 0;" class="alert
					alert-success"><b>Sukses!</b> Restore Foto Profil telah selesai dan
					berhasil.</div>');
					} else {
					$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
					alert-success"><b>Restore Gagal!</b></div>');
				}
				redirect('backrest');
			}
		}
		
		function uploadaudio ()
		{

			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'zip';
			$config['max_size']    = '';
			$config['overwrite'] = TRUE;
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('file_audio'))
			{
				$error = array('error' => $this->upload->display_errors('<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert alert-success">', '</div>'));
				$error['ddujian'] = $this->model6->ambilujian();
				$this->load->view('view1', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$zip = new ZipArchive;
				$file = $data['upload_data']['full_path'];
				
				if ($zip->open($file) === TRUE) {
                    $zip->extractTo('assets/kcfinder/upload/');
                    $zip->close();
					$this->session->set_flashdata('pesan','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin:20px 0 10px 0;" class="alert
					alert-success"><b>Sukses!</b> Restore Audio Soal telah selesai dan
					berhasil.</div>');
					} else {
					$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
					alert-success"><b>Restore Gagal!</b></div>');
				}
				redirect('backrest');
			}
		}
		
		function hapuslogo(){
			
			$this->db->where('id','0');
			$query = $this->db->get('setting');
			$row = $query->row();
			
			unlink("assets/css/images/$row->logo");
			$this->db->where('id', '0');
			$this->db->update('setting', array('logo' => ''));
			redirect(site_url('setting'));
		}
		
		public function tips(){
			$this->load->view('view49');
		}
	}										