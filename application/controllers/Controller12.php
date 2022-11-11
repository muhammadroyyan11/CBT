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
	class Controller12 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model8');
		}
		// bagian pengelolaan agenda
		public function index($offset=0)
		{ 
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'peminatan/',
			'total_rows' => $this->model8->hitung_baris(),
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
			$data['View_peminatan'] = $this->model8->select_all_paging($limit)->result();
			$this->load->view('view51', $data);
		}
		
		public function Tambah_peminatan(){
			$this->load->view('view52');
		}
		
		public function Proses_tambah_peminatan(){
			$data['nama_peminatan'] = $this->input->post('nama_peminatan');
			
			if ($this->model8->insert_peminatan($data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data PEMINATAN JURUSAN yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('tambahpeminatan'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> data PEMINATAN JURUSAN baru telah berhasil ditambahkan ke dalam database.</div>');
				redirect(site_url('tambahpeminatan'));
				}			
		}
		
		public function edit_peminatan($id_peminatan){
			$data['peminatan'] = $this->model8->select_by_id($id_peminatan)->row();
			$this->load->view('view53', $data);
		}
		
		public function proses_edit_peminatan(){
			$data['nama_peminatan'] = $this->input->post('nama_peminatan');
			$id_peminatan=$this->input->post('id_peminatan');
			if ($this->model8->update_peminatan($id_peminatan, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data PEMINATAN JURUSAN yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('Controller12'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> Data PEMINATAN JURUSAN telah berhasil di update ke dalam database.</div>');
				redirect(site_url('Controller12'));
			}
		}
		
		public function delete_peminatan($id_peminatan){
			$this->model8->delete_peminatan($id_peminatan);
			redirect(site_url('Controller12'));
		}
		
		public function update_aktivasi_peminatan(){
			$pilih = $this->input->post('pilih');
			$id_peminatan = $this->input->post('id_peminatan');
			if ($pilih=="")
			{
				redirect(site_url('Controller12'));
			} 
			else if ($pilih=="2")
			{
				foreach ($id_peminatan as $value)
				{
					$data[] = $value;
				}
				
				$this->model8->bulk_delete($data);
				redirect(site_url('Controller12'));	
			}
		}
		
		
		function Cari($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'caripeminatan/',
			'total_rows' => $this->model8->hitung_cari(),
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
			$data['View_peminatan'] = $this->model8->Cari($limit)->result();
			$this->load->view('view51', $data);
		}	
	}		