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
	class Controller8 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model5');
		}
		
		public function index($offset=0)
		{ 
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'ujian/',
			'total_rows' => $this->model5->hitungbaris(),
			'per_page' => $perpage,
			'uri_segment' => 2,
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
			$data['View_ujian'] = $this->model5->select_all_paging($limit)->result();
			$this->load->view('view28', $data);
		}
		
function Cari($id_folder,$offset=0)
		{
			$this->session->set_userdata('id_folder',$id_folder);
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'cariujian/'.$id_folder.'',
			'total_rows' => $this->model5->hitung_cari($id_folder),
			'per_page' => $perpage,
			'uri_segment' => 2,
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
			$data['ddfolder'] = $this->model5->ambilfolder();
			$data['View_ujian'] = $this->model5->Cari($id_folder,$limit)->result();
			$this->load->view('view28', $data);
		}
		
		public function Tambah_ujian(){
			$data['ddkelas'] = $this->model5->ambilkelas();
			$data['ddpeminatan'] = $this->model5->ambilpeminatan();
			$data['ddfolder'] = $this->model5->ambilfolder();										
			$this->load->view('view29', $data);
		}
		
		public function Proses_tambah_ujian(){
			
			/* $data['medley'] = $this->input->post('medley'); */
			$data['win'] = $this->input->post('pwd');
			$data['nama_ujian'] = $this->input->post('nama_ujian');
			$data['id_kelas'] = $this->input->post('id_kelas');
			$data['jminat'] = $this->input->post('peminatan');
			$data['id_folder'] = $this->input->post('folder');										 
			$data['jumlah_soal'] = $this->input->post('jumlah_soal');
			$data['waktu'] = $this->input->post('waktu');
			$data['benar'] = $this->input->post('benar');
			$data['salah'] = $this->input->post('salah');
			$data['kosong'] = $this->input->post('kosong');
			$data['skala'] = $this->input->post('skala');
			$data['pilih_model'] = $this->input->post('pilih_model');
			$data['id_user'] = $this->input->post('id_user');
			$data['mapel1'] = $this->input->post('mapel1');
			$data['mapel2'] = $this->input->post('mapel2');
			$data['mapel3'] = $this->input->post('mapel3');
			$data['mapel4'] = $this->input->post('mapel4');
			$data['mapel5'] = $this->input->post('mapel5');
			$data['mapel6'] = $this->input->post('mapel6');
			$data['mapel7'] = $this->input->post('mapel7');
			$data['mapel8'] = $this->input->post('mapel8');
			$data['mapel9'] = $this->input->post('mapel9');
			$data['mapel10'] = $this->input->post('mapel10');
			$data['jumlah_mapel'] = $this->input->post('jumlah_mapel');
			$data['jml_mapel1'] = $this->input->post('jml_mapel1');
			$data['jml_mapel2'] = $this->input->post('jml_mapel2');
			$data['jml_mapel3'] = $this->input->post('jml_mapel3');
			$data['jml_mapel4'] = $this->input->post('jml_mapel4');
			$data['jml_mapel5'] = $this->input->post('jml_mapel5');
			$data['jml_mapel6'] = $this->input->post('jml_mapel6');
			$data['jml_mapel7'] = $this->input->post('jml_mapel7');
			$data['jml_mapel8'] = $this->input->post('jml_mapel8');
			$data['jml_mapel9'] = $this->input->post('jml_mapel9');
			$data['jml_mapel10'] = $this->input->post('jml_mapel10');
			$data['w1'] = $this->input->post('w1');
			$data['w2'] = $this->input->post('w2');
			$data['w3'] = $this->input->post('w3');
			$data['w4'] = $this->input->post('w4');
			$data['w5'] = $this->input->post('w5');
			$data['w6'] = $this->input->post('w6');
			$data['w7'] = $this->input->post('w7');
			$data['w8'] = $this->input->post('w8');
			$data['w9'] = $this->input->post('w9');
			$data['w10'] = $this->input->post('w10');
			$data['catatan'] = $this->input->post('catatan');
			$data['tanggal_ujian'] = $this->input->post('tgl_ujian');
			
			
			$timestamp = strtotime($this->input->post('jaw'));
			$data['jam_ujian'] = date('H:i', $timestamp);
			$date = new \DateTime();
			$data['tgl_input'] = date_format($date, 'Y-m-d H:i:s');
			
			if (isset($_POST['status'])) {  
				$data['aktif_ujian'] = 1;
			}  
			else 
			{$data['aktif_ujian'] = 0;
			}
			
			if (isset($_POST['tombolwaktu'])) {  
				$data['tombolwaktu'] = $this->input->post('tombolwaktu');
			}  
			else 
			{$data['tombolwaktu'] = 0;
			}
			
			if (isset($_POST['utbk'])) {  
				$data['utbk'] = 1;
			}  
			else 
			{$data['utbk'] = 0;
			}
			
			if (isset($_POST['tombol'])) {  
				$data['tombol'] = $this->input->post('tombol');
			}  
			else 
			{$data['tombol'] = 0;
			}
			
			
			
			if (isset($_POST['jacak'])) {  
				$data['jr'] = 1;
			}  
			else 
			{$data['jr'] = 0;
			}
			
			if (isset($_POST['tipe'])) {  
				$data['tipe'] = 1;				
				$data['kjawab']  = substr(str_repeat("K,",$this->input->post('jumlah_soal')), 0, -1);
			}  
			else 
			{$data['tipe'] = 0;
				$data['kjawab']  = substr(str_repeat("K,",$this->input->post('jumlah_soal')), 0, -1);
			}
			
			
			if (isset($_POST['hasil'])) {  
				$data['hasil'] = 1;
			}  
			else 
			{$data['hasil'] = 0;
			}
			
			if (isset($_POST['multimapel'])) {  
				$data['multi'] = 1;
				$data['acak'] = 0;
			}  
			else 
			{$data['multi'] = 0;
				
				
				if (isset($_POST['acak'])) {  
					$data['acak'] = 1;
				}  
				else 
				{$data['acak'] = 0;
				}
			}
			$this->model5->insert_ujian($data);
			$this->session->set_flashdata('pesan5','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data Ujian telah berhasil ditambahkan ke dalam database.</div>');
			redirect(site_url('Controller8'));
			
			
			
		}
		
		public function edit_ujian($id_ujian){
			$data['ddkelas'] = $this->model5->ambilkelas();
			$data['ddpeminatan'] = $this->model5->ambilpeminatan();
			$data['ddfolder'] = $this->model5->ambilfolder();										
			$data['ujian'] = $this->model5->select_by_id($id_ujian)->row();
			$this->load->view('view30', $data);
		}
		
		public function proses_edit_ujian(){
		$userdata = array(
			'r1'  => $this->input->POST ('tgl_ujian'),
			'r2'  => substr($this->input->POST ('jaw'),11,8),
			'r2a'  => $this->input->POST ('jaw'),
			);
			$this->session->set_userdata($userdata);
			
			$data['win'] = $this->input->post('pwd');
			$data['nama_ujian'] = $this->input->post('nama_ujian');
			$data['id_kelas'] = $this->input->post('id_kelas');
			$data['jminat'] = $this->input->post('peminatan');
			$data['id_folder'] = $this->input->post('folder');										 
			$data['jumlah_soal'] = $this->input->post('jumlah_soal');
			/* $data['medley'] = $this->input->post('medley'); */
			
			if (isset($_POST['tombol'])) {  
				$data['tombol'] = $this->input->post('tombol');
			}  
			else 
			{$data['tombol'] = 0;
			}
			
			if (isset($_POST['status'])) {  
				$data['aktif_ujian'] = 1;
			}  
			else 
			{$data['aktif_ujian'] = 0;
			}
			
			if (isset($_POST['tipe'])) {  
				$data['tipe'] = 1;
				$data['kjawab']  = substr(str_repeat("K,",$this->input->post('jumlah_soal')), 0, -1);
			}  
			else 
			{
				$data['tipe'] = 0;
				$data['kjawab']  = substr(str_repeat("K,",$this->input->post('jumlah_soal')), 0, -1);
			}
			
			if (isset($_POST['utbk'])) {  
				$data['utbk'] = 1;
			}  
			else 
			{$data['utbk'] = 0;
			}
			
			if (isset($_POST['tombolwaktu'])) {  
				$data['tombolwaktu'] = $this->input->post('tombolwaktu');
			}  
			else 
			{$data['tombolwaktu'] = 0;
			}
			
			if (isset($_POST['jacak'])) {  
				$data['jr'] = 1;
			}  
			else 
			{$data['jr'] = 0;
			}
			
			if (isset($_POST['hasil'])) {  
				$data['hasil'] = 1;
			}  
			else 
			{$data['hasil'] = 0;
			}
			
			if (isset($_POST['multimapel'])) {  
				$data['multi'] = 1;
				$data['acak'] = 0;
			}  
			else 
			{$data['multi'] = 0;
				
				
				if (isset($_POST['acak'])) {  
					$data['acak'] = 1;
				}  
				else 
				{$data['acak'] = 0;
				}
			}
			$data['waktu'] = $this->input->post('waktu');
			$data['benar'] = $this->input->post('benar');
			$data['salah'] = $this->input->post('salah');
			$data['kosong'] = $this->input->post('kosong');
			$data['skala'] = $this->input->post('skala');
			$data['mapel1'] = $this->input->post('mapel1');
			$data['mapel2'] = $this->input->post('mapel2');
			$data['mapel3'] = $this->input->post('mapel3');
			$data['mapel4'] = $this->input->post('mapel4');
			$data['mapel5'] = $this->input->post('mapel5');
			$data['mapel6'] = $this->input->post('mapel6');
			$data['mapel7'] = $this->input->post('mapel7');
			$data['mapel8'] = $this->input->post('mapel8');
			$data['mapel9'] = $this->input->post('mapel9');
			$data['mapel10'] = $this->input->post('mapel10');
			$data['jumlah_mapel'] = $this->input->post('jumlah_mapel');
			$data['jml_mapel1'] = $this->input->post('jml_mapel1');
			$data['jml_mapel2'] = $this->input->post('jml_mapel2');
			$data['jml_mapel3'] = $this->input->post('jml_mapel3');
			$data['jml_mapel4'] = $this->input->post('jml_mapel4');
			$data['jml_mapel5'] = $this->input->post('jml_mapel5');
			$data['jml_mapel6'] = $this->input->post('jml_mapel6');
			$data['jml_mapel7'] = $this->input->post('jml_mapel7');
			$data['jml_mapel8'] = $this->input->post('jml_mapel8');
			$data['jml_mapel9'] = $this->input->post('jml_mapel9');
			$data['jml_mapel10'] = $this->input->post('jml_mapel10');
			$data['w1'] = $this->input->post('w1');
			$data['w2'] = $this->input->post('w2');
			$data['w3'] = $this->input->post('w3');
			$data['w4'] = $this->input->post('w4');
			$data['w5'] = $this->input->post('w5');
			$data['w6'] = $this->input->post('w6');
			$data['w7'] = $this->input->post('w7');
			$data['w8'] = $this->input->post('w8');
			$data['w9'] = $this->input->post('w9');
			$data['w10'] = $this->input->post('w10');
			$data['pilih_model'] = $this->input->post('pilih_model');
			$data['catatan'] = $this->input->post('catatan');
			$data['tanggal_ujian'] = $this->input->post('tgl_ujian');
		
			$data['jam_ujian'] = $this->input->post('jaw');
			$id_ujian=$this->input->post('id_ujian');
			$this->model5->update_ujian($id_ujian, $data);
			$this->session->set_flashdata('pesan5','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data Ujian telah berhasil di update ke dalam database.</div>');
			$data['ddkelas'] = $this->model5->ambilkelas();
			$data['ddpeminatan'] = $this->model5->ambilpeminatan();
			$data['ddfolder'] = $this->model5->ambilfolder();										
			$data['ujian'] = $this->model5->select_by_id($id_ujian)->row();
			$this->load->view('view30', $data);
		}
		
		public function view_edit_ujian($id_ujian){
			if (isset($_POST['status'])) {  
				$data['aktif_ujian'] = 1;
			}  
			else 
			{$data['aktif_ujian'] = 0;
			}			
			
			$this->model5->update_view_ujian($id_ujian,$data);
			$uri = $this->input->post('uri');
			if ($uri == 'cariujiannonaktif')
			{
				redirect(site_url('cariujiannonaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
				} else if ($uri == 'cariujianaktif') {
				redirect(site_url('cariujianaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
				} else {
				redirect(site_url('tampilujian/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
			}
		}
		
		public function delete_ujian($id_ujian){
			$this->model5->delete_ujian($id_ujian);
			redirect(site_url('Controller8'));
		}
		



		
		public function update_aktivasi_ujian(){
			$pilih = $this->input->post('pilih');
			$id_ujian = $this->input->post('id_ujian');
			if ($pilih=="")
			{
				$uri = $this->input->post('uri');
				if ($uri == 'cariujiannonaktif')
				{
					redirect(site_url('cariujiannonaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
					} else if ($uri == 'cariujianaktif') {
					redirect(site_url('cariujianaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
					} else {
					redirect(site_url('tampilujian/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
				}
			} else if ($pilih=="2")
			{
				foreach ($id_ujian as $value)
				{
					$data[] = $value;
				}
				
				$this->model5->bulk_delete($data);
				$uri = $this->input->post('uri');
				if ($uri == 'cariujiannonaktif')
				{
					redirect(site_url('cariujiannonaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
					} else if ($uri == 'cariujianaktif') {
					redirect(site_url('cariujianaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
					} else {
					redirect(site_url('tampilujian/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
				}
			}
			else
			{
				foreach ($id_ujian as $key => $value)
				{
					$data[] = array('id_ujian' => $id_ujian[$key],'aktif_ujian' =>$pilih);
				}    
				$this->model5->update_aktivasi_ujian($data);
				$uri = $this->input->post('uri');
				if ($uri == 'cariujiannonaktif')
				{
					redirect(site_url('cariujiannonaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
					} else if ($uri == 'cariujianaktif') {
					redirect(site_url('cariujianaktif/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
					} else {
					redirect(site_url('tampilujian/'.$this->session->userdata('id_folder').'/'.$this->session->userdata('id_page1').''));
				}
			} 
		}


		public function edit_by_folder_id($id_folder,$offset=0)
		{   
			$this->session->set_userdata('id_folder',$id_folder);
			$query=$this->db->get("folder");
			$query = $this->db->get_where('folder', array('id_folder' => $id_folder));
			$row=$query->row();
            $userdata = array(
			'namafolder'  => $row->nama_folder,
			);
			$this->session->set_userdata($userdata);
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'tampilujian/'.$id_folder.'',
			'total_rows' => $this->model5->hitung($id_folder),
			'per_page' => $perpage,
			'uri_segment' => 3,
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
			$data['View_ujian'] = $this->model5->select_by_id_folder1($id_folder,$limit)->result();
			$data['ddfolder'] = $this->model5->ambilfolder();
			$this->load->view('view28', $data);		
		}
		
				public function Cari_aktif($id_folder,$offset=0)
		{
			$this->session->set_userdata('id_folder',$id_folder);
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'cariujianaktif/'.$id_folder.'',
			'total_rows' => $this->model5->hitung_aktif($id_folder),
			'per_page' => $perpage,
			'uri_segment' => 3,
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
			$data['ddfolder'] = $this->model5->ambilfolder();
			$data['View_ujian'] = $this->model5->Cari_aktif($id_folder,$limit)->result();
			$this->load->view('view28', $data);		
		}
		
		public function Cari_nonaktif($id_folder,$offset=0)
		{
			$this->session->set_userdata('id_folder',$id_folder);
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'cariujiannonaktif/'.$id_folder.'',
			'total_rows' => $this->model5->hitung_nonaktif($id_folder),
			'per_page' => $perpage,
			'uri_segment' => 3,
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
			$data['ddfolder'] = $this->model5->ambilfolder();
			$data['View_ujian'] = $this->model5->Cari_nonaktif($id_folder,$limit)->result();
			$this->load->view('view28', $data);		
		}
		
	}													