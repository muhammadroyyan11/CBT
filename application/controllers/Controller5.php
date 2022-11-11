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
	class Controller5 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model3');
			$this->load->model('model6');
			$this->load->library('session'); 
			$this->load->library('upload'); 
			$this->load->helper('text');
		}
		// bagian pengelolaan agenda
		public function index($offset=0)
		{ 
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'user/',
			'total_rows' => $this->model3->hitungbaris(),
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
			$data['View_pengguna'] = $this->model3->select_all_paging($limit)->result();
			$this->load->view('view20', $data);
		}
		
		function Cari($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'cariuser/',
			'total_rows' => $this->model3->hitung_cari(),
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
			$data['View_pengguna'] = $this->model3->Cari($limit)->result();
			$this->load->view('view20', $data);
		}
		
		
		public function Tambah_pengguna(){
			$data['ddkelas'] = $this->model3->ambilkelas();
			$data['ddtipeuser'] = $this->model3->ambiltipeuser();
			$data['ddpeminatan'] = $this->model3->ambilpeminatan();
			$this->load->view('view21',$data);
		}
		
		public function Proses_tambah_pengguna(){
			$config['upload_path'] = "assets/kcfinder/upload/foto/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('foto_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('foto_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'picture'=>$this->upload->file_name ); 
			}	
			
			$data['nama'] = $this->input->post('nama');
			$data['no_peserta'] = $this->input->post('nopes');
			$data['password'] = md5($this->input->post('password'));
			$data['id_kelas'] = $this->input->post('id_kelas');
			$data['role'] = $this->input->post('role');
			$data['peminatan'] = $this->input->post('peminatan');
			$data['email'] = $this->input->post('email');
			$data['hp_siswa'] = $this->input->post('hpsiswa');
			$data['hp_ortu'] = $this->input->post('hportu');
			$data['j_kelamin'] = $this->input->post('jkelamin');
			$data['alamat'] = $this->input->post('alamat');
			$data['sekolah'] = $this->input->post('sekolah');
			$date = new DateTime();		
			$data['terdaftar'] = date_format($date, 'Y-m-d H:i:s');
			$x = $this->input->post('password');
			$jml=strlen($x);
			$a='';
			for ($q=0;$q<$jml;$q++)
			{
				$c = substr($x,$q,1);
				$a = $a.dechex(ord($c)+67);				
			}
			$data['catatan'] = $a.$a;
			if (isset($_POST['status'])) {  
				$data['aktif'] = 1;
			}  
			else 
			{$data['aktif'] = 0;
			}
			
			if ($this->model3->insert_pengguna($data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan2','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> NO PESERTA yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('tambahuser'));
			} else
			{
				$this->session->set_flashdata('pesan2','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> data USER baru telah berhasil ditambahkan ke dalam database.</div>');
				redirect(site_url('tambahuser'));
			}		
		}
		
		public function edit_pengguna($id_pengguna){
			$data['ddkelas'] = $this->model3->ambilkelas();
			$data['ddtipeuser'] = $this->model3->ambiltipeuser();
			$data['ddpeminatan'] = $this->model3->ambilpeminatan();
			$data['ddjurusan'] = $this->model3->pilih_jurusan();	
			$data['pengguna'] = $this->model3->select_by_id($id_pengguna)->row();
			$this->load->view('view22', $data);
		}
		
		public function proses_edit_pengguna(){		
			$config['upload_path'] = "assets/kcfinder/upload/foto/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('foto_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('foto_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'foto'=>$this->upload->file_name ); 
			}	
			
			$data['nama'] = $this->input->post('nama');
			$data['no_peserta'] = $this->input->post('nopes');
			if (empty($_POST['password'])) { 
			}
			else {
				$data['password'] = md5($this->input->post('password'));
				$x = $this->input->post('password');
				$jml=strlen($x);
				$a='';
				for ($q=0;$q<$jml;$q++)
				{
					$c = substr($x,$q,1);
					$a = $a.dechex(ord($c)+67);				
				}
				$data['catatan'] = $a.$a;
			}
			$data['id_kelas'] = $this->input->post('id_kelas');
			$data['role'] = $this->input->post('role');
			$data['peminatan'] = $this->input->post('peminatan');
			$data['email'] = $this->input->post('email');
			$data['hp_siswa'] = $this->input->post('hpsiswa');
			$data['hp_ortu'] = $this->input->post('hportu');
			$data['j_kelamin'] = $this->input->post('jkelamin');
			$data['alamat'] = $this->input->post('alamat');
			$data['sekolah'] = $this->input->post('sekolah');
			$data['jurusan1'] = $this->input->post('jurusan1');
			$data['jurusan2'] = $this->input->post('jurusan2');
			$data['jurusan3'] = $this->input->post('jurusan3');
			$data['jsnl1'] = $this->input->post('na1');
			$data['jsnl2'] = $this->input->post('na2');
			$data['jsnl3'] = $this->input->post('na3');
			$data['ttl'] = $this->input->post('ttl');
			$data['ig'] = $this->input->post('ig');
			$data['follower'] = $this->input->post('follower');
			$data['propinsi'] = $this->input->post('propinsi');
			$data['kota'] = $this->input->post('kota');
			$data['rapor'] = $this->input->post('rapor');
			$data['tahun'] = $this->input->post('tahun');
			$data['kip'] = $this->input->post('kip');
			$id_pengguna=$this->input->post('id');
			if (isset($_POST['status'])) {  
				$data['aktif'] = 1;
			}  
			else 
			{$data['aktif'] = 0;
			}
			
			if ($this->model3->update_pengguna($id_pengguna, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan2','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> NO PESERTA yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('Controller5'));
			} else
			{
				$this->session->set_flashdata('pesan2','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> Data USER telah berhasil di update ke dalam database.</div>');
				redirect(site_url('Controller5'));
			}	
		}
		
		public function delete_pengguna($id_pengguna){
			$this->db->where('id',$id_pengguna);
			$query = $this->db->get('pengguna');
			$row = $query->row();			
			unlink("assets/kcfinder/upload/foto/$row->foto");
			$this->model3->delete_pengguna($id_pengguna);
			redirect(site_url('Controller5'));
		}
		
		public function view_edit_pengguna($id_pengguna){
			if (isset($_POST['status'])) {  
				$data['aktif'] = 1;
			}  
			else 
			{$data['aktif'] = 0;
			}
			$this->model3->update_view_pengguna($id_pengguna,$data);
			$uri = $this->input->post('uri');
			if ($uri == 'cariusernonaktif')
			{
				redirect(site_url('cariusernonaktif'));
				} else if ($uri == 'cariuseraktif') {
				redirect(site_url('cariuseraktif'));
				} else {
				redirect(site_url('Controller5'));
			}
		}
		
		public function edit_status(){
			if (isset($_POST['status'])) {  
				$data['aktif'] = 1;
			}  
			else 
			{$data['aktif'] = 0;
			}
			$this->model3->simpan_pengguna($data);
			redirect(site_url('Controller5'));
		}
		
		function Cari_aktif($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'cariuseraktif/',
			'total_rows' => $this->model3->hitungbaris_aktif(),
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
			$data['View_pengguna'] = $this->model3->Cari_aktif($limit)->result();
			$this->load->view('view20', $data);
		}
		
		function Cari_nonaktif($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'cariusernonaktif/',
			'total_rows' => $this->model3->hitungbaris_nonaktif(),
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
			$data['View_pengguna'] = $this->model3->Cari_nonaktif($limit)->result();
			$this->load->view('view20', $data);
		}
		
		public function update_aktivasi_pengguna(){
			$pilih = $this->input->post('pilih');
			$id_user = $this->input->post('id_user');
			if ($pilih=="")
			{
				$uri = $this->input->post('uri');
				if ($uri == 'cariusernonaktif')
				{
					redirect(site_url('cariusernonaktif'));
					} else if ($uri == 'cariuseraktif') {
					redirect(site_url('cariuseraktif'));
					} else {
					redirect(site_url('Controller5'));
				}
			} else if ($pilih=="2")
			{
				foreach ($id_user as $value)
				{
					$data[] = $value;
				}
				
				$this->model3->bulk_delete($data);
				$uri = $this->input->post('uri');
				if ($uri == 'cariusernonaktif')
				{
					redirect(site_url('cariusernonaktif'));
					} else if ($uri == 'cariuseraktif') {
					redirect(site_url('cariuseraktif'));
					} else {
					redirect(site_url('Controller5'));
				}
			}
			else
			{
				foreach ($id_user as $key => $value)
				{
					$data[] = array('id' => $id_user[$key],'aktif' =>$pilih);
				}    
				$this->model3->update_aktivasi_pengguna($data);
				$uri = $this->input->post('uri');
				if ($uri == 'cariusernonaktif')
				{
					redirect(site_url('cariusernonaktif'));
					} else if ($uri == 'cariuseraktif') {
					redirect(site_url('cariuseraktif'));
					} else {
					redirect(site_url('Controller5'));
				}
			} 
		}
		
		function delete($id){
			
			$this->db->where('id',$id);
			$query = $this->db->get('pengguna');
			$row = $query->row();
			
			unlink("assets/kcfinder/upload/foto/$row->foto");
			$this->db->where('id', $id);
			$this->db->update('pengguna', array('foto' => ''));
			redirect(site_url('edituser/'.$id));
		}
		
		public function daftar(){
			$data['ddkelas'] = $this->model3->ambilkelas();
			$data['ddtipeuser'] = $this->model3->ambiltipeuser();
			$this->load->view('view21a',$data);
		}
		
		public function Proses_daftar(){
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				//validation fails
				redirect(site_url('daftar'));
			}
			else
			{
				//get the form data
				$data['nama'] = $this->input->post('nama');	
				$data['no_peserta'] = $this->input->post('username');	
				$data['password'] = md5($this->input->post('password'));
				$data['role'] = '3';
				$data['email'] = $this->input->post('email');
				$this->session->set_userdata('nama', $this->input->post('nama'));
				$this->session->set_userdata('username', $this->input->post('username'));
				$this->session->set_userdata('password', $this->input->post('password'));
				$this->session->set_userdata('email', $this->input->post('email'));
				$data['aktif'] = '1';
				
				if ($this->model3->insert_pengguna($data)) {
				}
				$error = $this->db->error();
				if ($error['code'] == 1062) {
					$this->session->set_flashdata('pesan2','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
					alert-success"><b>GAGAL!</b> Alamat Email sudah terdaftar.</div>');
					redirect(site_url('daftar'));
				} else
				{
					$this->model3->insert_pengguna($data);
					
					
					// Read the  values
					$success = false;
					$nama = $_POST['nama'];
					$email = $_POST['email'];;
					
					
					// Define some constants
					define( "RECIPIENT_NAME",  $nama );
					define( "RECIPIENT_EMAIL", "ahraha@gmail.com" );
					define( "EMAIL_SUBJECT", "Pendaftar Baru Try Out Online BTA 70 Palembang" );
					
					
					$msg .= "Data Pendaftar \r\n";
					$msg .= "Nama: ".$nama." \r\n";
					$msg .= "Email: ".$email." \r\n";
					
					
					// If all values exist, send the email
					if ( $nama && $email && $nopes ) {
						
						$recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
						$headers = "From: BTA 70 Palembang <ahraha@gmail.com>";
						$success = mail( $recipient, EMAIL_SUBJECT, $msg, $headers );
						
						$respond_subject = "Terima kasih telah mendaftar di web Try Out Online BTA 70 Palembang";
						$respond_headers = "From: BTA 70 Palembang <noreply@tryoutonline-bta70palembang.com>";
						$respond_message = "Halo ".$nama.",
						
						Terima kasih telah melakukan pendaftaran di web Try Out Online BTA 70 Palembang.
						Selanjutnya proses aktivasi akan dilakukan oleh Admin dan pemberitahuan aktivasi akan dikirimkan melalui email terdaftar.
						
						Terima Kasih.
						
						Wassalam,
						Admin
						BTA 70 Palembang
						
						";
						
						mail($email, $respond_subject, $respond_message, $respond_headers);
					}
					
					
					$this->session->set_flashdata('pesan2','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
					alert-success"><b>Pendaftaran berhasil. Ayo lengkapi profil!.</div>');
					redirect(site_url('isiprofil'));
				}	
				
				
			}
		}
		
		public function isiprofil(){
			$data['ddkelas'] = $this->model3->ambilkelas();
			$data['ddtipeuser'] = $this->model3->ambiltipeuser();
			$data['ddpropinsi'] = $this->model3->ambilpropinsi();
			$data['ddpeminatan'] = $this->model3->ambilpeminatan();
			$data['dduniv'] = $this->model3->ambiluniv();
			$this->load->view('view21b',$data);
		}
		
		public function Proses_isiprofil(){
			//get the form data
			$config['upload_path'] = "assets/kcfinder/upload/foto/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('foto_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('foto_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'foto'=>$this->upload->file_name ); 
			}	
			$id_pengguna = $this->input->post('id');
			$data['nama'] = $this->input->post('nama');
			$data['ttl'] = $this->input->post('ttl');
			$data['email'] = $this->input->post('email');
			$data['j_kelamin'] = $this->input->post('jkelamin');
			$data['hp_siswa'] = $this->input->post('hpsiswa');
			$data['ig'] = $this->input->post('ig');
			$data['follower'] = $this->input->post('follower');
			$data['propinsi'] = $this->input->post('propinsi');
			$data['kota'] = $this->input->post('kota');
			$data['sekolah'] = $this->input->post('sma');
			$data['id_kelas'] = $this->input->post('kelas');
			$data['peminatan'] = $this->input->post('peminatan');
			$data['rapor'] = $this->input->post('rapor');
			$data['tahun'] = $this->input->post('tahun');
			$data['univ'] = $this->input->post('univ');
			$data['jurusan1'] = $this->input->post('prodi');
			$data['kip'] = $this->input->post('kip');
			$date = new DateTime();		
			$data['terdaftar'] = date_format($date, 'Y-m-d H:i:s');

			if ($this->model3->update_pengguna($id_pengguna, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan2','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success">Silakan lengkapi data profil.</div>');
				redirect(site_url('isiprofil'));
			} else
			{	
				
				$this->session->set_flashdata('pesan2','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>Pendaftaran akun selesai, terima kasih telah mengisi data. Silakan login menggunakan data Anda.</div>');

					redirect(site_url('loginform'));
					
			}		
		}
		
		public function simpan_isiprofil(){
			//get the form data
			$config['upload_path'] = "assets/kcfinder/upload/foto/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('foto_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('foto_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'foto'=>$this->upload->file_name ); 
			}	
			$id_pengguna = $this->input->post('id');
			$data['nama'] = $this->input->post('nama');
			$data['ttl'] = $this->input->post('ttl');
			$data['email'] = $this->input->post('email');
			$data['j_kelamin'] = $this->input->post('jkelamin');
			$data['hp_siswa'] = $this->input->post('hpsiswa');
			$data['ig'] = $this->input->post('ig');
			$data['follower'] = $this->input->post('follower');
			$data['propinsi'] = $this->input->post('propinsi');
			$data['kota'] = $this->input->post('kota');
			$data['sekolah'] = $this->input->post('sma');
			$data['id_kelas'] = $this->input->post('kelas');
			$data['peminatan'] = $this->input->post('peminatan');
			$data['rapor'] = $this->input->post('rapor');
			$data['tahun'] = $this->input->post('tahun');
			$data['univ'] = $this->input->post('univ');
			$data['jurusan1'] = $this->input->post('prodi');
			$data['kip'] = $this->input->post('kip');
			$data['password'] = md5($this->input->post('password'));
			$date = new DateTime();		
			$data['terdaftar'] = date_format($date, 'Y-m-d H:i:s');

			if ($this->model3->update_pengguna($id_pengguna, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan2','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> Alamat Email sudah terdaftar.</div>');
				redirect(site_url('editprofil'));
			} else
			{	
				
				$this->session->set_flashdata('pesan2','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>Update profil berhasil.</div>');
				redirect(site_url('editprofil'));
			}		
		}
		
		public function edit_profil(){
		$data['ddkelas'] = $this->model3->ambilkelas();
			$data['ddtipeuser'] = $this->model3->ambiltipeuser();
			$data['ddpropinsi'] = $this->model3->ambilpropinsi();
			$data['ddpeminatan'] = $this->model3->ambilpeminatan();
			$data['dduniv'] = $this->model3->ambiluniv();
			$this->load->view('view21c',$data);
		}
		
		function simpan_foto($id_pengguna){
			//get the form data
			$config['upload_path'] = "assets/kcfinder/upload/foto/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('foto_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('foto_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'foto'=>$this->upload->file_name ); 
			}	
			
			if ($this->model3->update_pengguna($id_pengguna, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan2','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> Alamat Email sudah terdaftar.</div>');
				redirect(site_url('isiprofil'));
			} else
			{
				redirect(site_url('isiprofil'));
			}
		}
		
		function ambil_data(){
			
			$modul=$this->input->post('modul');
			$id=$this->input->post('id');
			if($modul=="jurusan"){
				$data = $this->model3->ambiljurusan1($id);
				echo json_encode($data);
			}
			else if($modul=="kota"){
				echo $this->model3->ambilkota1($id);
			}
			else if($modul=="sma"){
				echo $this->model3->ambilsma1($id);
			}
			else if($modul=="prodi"){
				echo $this->model3->ambilprodi1($id);
			}
			
		}
	}											