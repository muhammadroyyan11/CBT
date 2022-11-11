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
	class Controller11 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model7');
		}
		// bagian pengelolaan agenda
		public function index($offset=0)
		{ 
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'jurusan/',
			'total_rows' => $this->model7->hitung_baris(),
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
			$data['View_jurusan'] = $this->model7->select_all_paging($limit)->result();
			$this->load->view('view43', $data);
		}
		
		public function Tambah_jurusan(){
			$this->load->view('view44');
		}
		
		public function Proses_tambah_jurusan(){
			$data['kode_jurusan'] = $this->input->post('kode_jurusan');
			$data['pil_jurusan'] = $this->input->post('pil_jurusan');
			$data['standar_nilai'] = $this->input->post('snl');
			$data['nama_univ'] = $this->input->post('nama_univ');
			$data['program_studi'] = $this->input->post('ps');
			
			if ($this->model7->insert_jurusan($data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data JURUSAN yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('tambahjurusan'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> data JURUSAN baru telah berhasil ditambahkan ke dalam database.</div>');
				redirect(site_url('tambahjurusan'));
			}			
		}
		
		public function edit_jurusan($id){
			$data['jurusan'] = $this->model7->select_by_id($id)->row();
			$this->load->view('view45', $data);
		}
		
		public function proses_edit_jurusan(){
			$data['kode_jurusan'] = $this->input->post('kode_jurusan');
			$data['pil_jurusan'] = $this->input->post('pil_jurusan');
			$data['standar_nilai'] = $this->input->post('snl');
			$data['nama_univ'] = $this->input->post('nama_univ');
			$data['program_studi'] = $this->input->post('ps');
			$id = $this->input->post('id');
			if ($this->model7->update_jurusan($id, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data JURUSAN yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('Controller11'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> Data JURUSAN telah berhasil di update ke dalam database.</div>');
				redirect(site_url('Controller11'));
			}
		}
		
		public function delete_jurusan($id){
			$this->model7->delete_jurusan($id);
			redirect(site_url('Controller11'));
		}
		
		public function update_aktivasi_jurusan(){
			$pilih = $this->input->post('pilih');
			$id = $this->input->post('id');
			if ($pilih=="")
			{
				redirect(site_url('Controller11'));
			} 
			else if ($pilih=="2")
			{
				foreach ($id as $value)
				{
					$data[] = $value;
				}
				
				$this->model7->bulk_delete($data);
				redirect(site_url('Controller11'));	
			}
		}
		
		
		function Cari($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'carijurusan/',
			'total_rows' => $this->model7->hitung_cari(),
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
			$data['View_jurusan'] = $this->model7->Cari($limit)->result();
			$this->load->view('view43', $data);
		}	
	}		