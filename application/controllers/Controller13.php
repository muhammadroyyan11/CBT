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
	class Controller13 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model9');
		}
		// bagian pengelolaan agenda
		public function index($offset=0)
		{ 
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'folder/',
			'total_rows' => $this->model9->hitung_baris(),
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
			$data['View_folder'] = $this->model9->select_all_paging($limit)->result();
			$this->load->view('view57', $data);
		}
		
		public function Tambah_folder(){
			$this->load->view('view58');
		}
		
		public function Proses_tambah_folder(){
			$data['nama_folder'] = $this->input->post('nama_folder');
			
			if ($this->model9->insert_folder($data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data FOLDER yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('tambahfolder'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> data FOLDER baru telah berhasil ditambahkan ke dalam database.</div>');
				redirect(site_url('tambahfolder'));
				}			
		}
		
		public function edit_folder($id_folder){
			$data['folder'] = $this->model9->select_by_id($id_folder)->row();
			$this->load->view('view59', $data);
		}
		
		public function proses_edit_folder(){
			$data['nama_folder'] = $this->input->post('nama_folder');
		
			$id_folder=$this->input->post('id_folder');
			if ($this->model9->update_folder($id_folder, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data FOLDER yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('Controller13'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> Data FOLDER telah berhasil di update ke dalam database.</div>');
				redirect(site_url('Controller13'));
			}
		}
		
		public function delete_folder($id_folder){
			$this->model9->delete_folder($id_folder);
			redirect(site_url('Controller13'));
		}
		
		public function update_aktivasi_folder(){
			$pilih = $this->input->post('pilih');
			$id_folder = $this->input->post('id_folder');
			if ($pilih=="")
			{
				redirect(site_url('Controller13'));
			} 
			else if ($pilih=="2")
			{
				foreach ($id_folder as $value)
				{
					$data[] = $value;
				}
				
				$this->model9->bulk_delete($data);
				redirect(site_url('Controller13'));	
			}
		}
		
		
		function Cari($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'carifolder/',
			'total_rows' => $this->model9->hitung_cari(),
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
			$data['View_folder'] = $this->model9->Cari($limit)->result();
			$this->load->view('view57', $data);
		}	
	}		