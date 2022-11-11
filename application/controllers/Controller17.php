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
	class Controller17 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model15');
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
			'base_url' => base_url() . 'produk/',
			'total_rows' => $this->model15->hitung_baris(),
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
			$data['View_produk'] = $this->model15->select_all_paging($limit)->result();
			$this->load->view('view62', $data);
		}
		
		public function Tambah_produk(){
			$this->load->view('view63');
		}
		
		public function Proses_tambah_produk(){
			$config['upload_path'] = "images/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('foto_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('foto_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'picture'=>$this->upload->file_name ); 
			}
			
			$data['name'] = $this->input->post('nama_produk');
			$data['description'] = $this->input->post('deskripsi');
			$data['price'] = $this->input->post('harga');
			
			if ($this->model15->insert_produk($data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('tambahproduk'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> data baru telah berhasil ditambahkan ke dalam database.</div>');
				redirect(site_url('tambahproduk'));
			}			
		}
		
		public function edit_produk($id_produk){
			$data['produk'] = $this->model15->select_by_id($id_produk)->row();
			$this->load->view('view64', $data);
		}
		
		public function proses_edit_produk(){
			$data['name'] = $this->input->post('nama_produk');
			$data['description'] = $this->input->post('deskripsi');
			$data['price'] = $this->input->post('harga');
			$config['upload_path'] = "images/"; 
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; 
			$config['file_name'] = url_title($this->input->post('foto_upload')); 
			$config['max_size']      =   "3000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('foto_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'picture'=>$this->upload->file_name ); 
			}
			
			$id_produk=$this->input->post('id_produk');
			if ($this->model15->update_produk($id_produk, $data)) {
			}
			$error = $this->db->error();
			if ($error['code'] == 1062) {
				$this->session->set_flashdata('pesan3','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> data yang Anda masukan sudah ada, silakan ganti dengan yang lain.</div>');
				redirect(site_url('Controller17'));
			} else
			{
				$this->session->set_flashdata('pesan3','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> Data telah berhasil di update ke dalam database.</div>');
				redirect(site_url('Controller17'));
			}
		}
		
		public function delete_produk($id_produk){
			$this->model15->delete_produk($id_produk);
			redirect(site_url('Controller17'));
		}
		
		public function update_aktivasi_produk(){
			$pilih = $this->input->post('pilih');
			$id_produk = $this->input->post('id_produk');
			if ($pilih=="")
			{
				redirect(site_url('Controller17'));
			} 
			else if ($pilih=="2")
			{
				foreach ($id_produk as $value)
				{
					$data[] = $value;
				}
				
				$this->model15->bulk_delete($data);
				redirect(site_url('Controller17'));	
			}
		}
		
		
		function Cari($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'cariproduk/',
			'total_rows' => $this->model15->hitung_cari(),
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
			$data['View_produk'] = $this->model15->Cari($limit)->result();
			$this->load->view('view62', $data);
		}	
		
		function delete($id){
			
			$this->db->where('serial',$id);
			$query = $this->db->get('products');
			$row = $query->row();
			
			unlink("images/$row->picture");
			$this->db->where('serial', $id);
			$this->db->update('products', array('picture' => ''));
			redirect(site_url('editproduk/'.$id));
		}
		
				function pembelian($offset=0)
		{ 
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'pembelian/',
			'total_rows' => $this->model15->hitungbaris(),
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
			$data['View_pembelian'] = $this->model15->select_all_paging1($limit)->result();
			$this->load->view('view65', $data);
		}
		
		public function update_aktivasi_pembelian(){
			$pilih = $this->input->post('pilih');
			$id_pembelian = $this->input->post('id_pembelian');
			if ($pilih=="")
			{
				redirect(site_url('Controller17'));
			} 
			else if ($pilih=="2")
			{
				foreach ($id_pembelian as $value)
				{
					$data[] = $value;
				}
				
				$this->model15->bulk_delete_pembelian($data);
				redirect(site_url('pembelian'));	
			}
		}
		
		public function delete_pembelian($id_pembelian){
			$this->model15->delete_pembelian($id_pembelian);
			redirect(site_url('pembelian'));
		}
		
		function Carip($offset=0)
		{
			$perpage = 50;
			$this->load->library('pagination');
						$config = array(
			'base_url' => base_url() . 'pembelian/',
			'total_rows' => $this->model15->hitungbaris(),
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
			$data['View_pembelian'] = $this->model15->Carip($limit)->result();
			$this->load->view('view65', $data);
		}	
	}			