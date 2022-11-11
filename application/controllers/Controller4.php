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
	class Controller4 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model2');
		}
		// bagian pengelolaan agenda
		public function index($offset=0)
		{ 
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'kelas/',
			'total_rows' => $this->model2->hitung_baris(),
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
			$data['View_kelas'] = $this->model2->select_all_paging($limit)->result();
			$this->load->view('view14', $data);
		}
		
		public function Tambah_kelas(){
			$this->load->view('view15');
		}
		
		public function Proses_tambah_kelas(){
			$data['nama_kelas'] = $this->input->post('nama_kelas');
			
			if ($this->model2->insert_kelas($data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data KELAS yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('tambahkelas'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> data KELAS baru telah berhasil ditambahkan ke dalam database.</div>');
				redirect(site_url('tambahkelas'));
				}			
		}
		
		public function edit_kelas($id_kelas){
			$data['kelas'] = $this->model2->select_by_id($id_kelas)->row();
			$this->load->view('view16', $data);
		}
		
		public function proses_edit_kelas(){
			$data['nama_kelas'] = $this->input->post('nama_kelas');
			$data['order'] = $this->input->post('order');
			$id_kelas=$this->input->post('id_kelas');
			if ($this->model2->update_kelas($id_kelas, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data KELAS yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('Controller4'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> Data KELAS telah berhasil di update ke dalam database.</div>');
				redirect(site_url('Controller4'));
			}
		}
		
		public function delete_kelas($id_kelas){
			$this->model2->delete_kelas($id_kelas);
			redirect(site_url('Controller4'));
		}
		
		public function update_aktivasi_kelas(){
			$pilih = $this->input->post('pilih');
			$id_kelas = $this->input->post('id_kelas');
			if ($pilih=="")
			{
				redirect(site_url('Controller4'));
			} 
			else if ($pilih=="2")
			{
				foreach ($id_kelas as $value)
				{
					$data[] = $value;
				}
				
				$this->model2->bulk_delete($data);
				redirect(site_url('Controller4'));	
			}
		}
		
		
		function Cari($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'carikelas/',
			'total_rows' => $this->model2->hitung_cari(),
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
			$data['View_kelas'] = $this->model2->Cari($limit)->result();
			$this->load->view('view14', $data);
		}	
	}		