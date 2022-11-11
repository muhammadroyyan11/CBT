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
	class Controller7 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model4');
			$this->load->model('model1');
			$this->load->library('session'); 
			$this->load->library('Upload'); 
			$this->load->library('pdf');
			$this->load->helper('text');
			
		}
		
		public function index()
		{
			$data['View_soal'] = $this->model4->select_all()->result();
			$this->load->view('view25', $data);
		}
		
		public function edit_by_ujian_id($id_ujian,$offset=0)
		{   
			$this->session->set_userdata('id_ujian',$id_ujian);
			$query=$this->db->get("ujian");
			$query = $this->db->get_where('ujian', array('id_ujian' => $id_ujian));
			$row=$query->row();
            $userdata = array(
			'namaujian'  => $row->nama_ujian,
			);
			$this->session->set_userdata($userdata);
			$perpage = 50;
			$this->load->library('pagination');
			
			$config = array(
			'base_url' => base_url() . 'tampilsoal/'.$id_ujian.'',
			'total_rows' => $this->model4->hitung($id_ujian),
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
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['View_soal'] = $this->model4->select_by_id_ujian1($id_ujian,$limit)->result();
			$data['ddujian'] = $this->model1->ambilujian();
			$this->load->view('view25', $data);		
		}
		
		public function Cari($id_ujian,$offset=0)
		{
			$this->session->set_userdata('id_ujian',$id_ujian);
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'carisoal/'.$id_ujian.'',
			'total_rows' => $this->model4->hitung_cari($id_ujian),
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
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['ddujian'] = $this->model1->ambilujian();
			$data['View_soal'] = $this->model4->Cari($id_ujian,$limit)->result();
			$this->load->view('view25', $data);	
		}
		
		public function Cari_aktif($id_ujian,$offset=0)
		{
			$this->session->set_userdata('id_ujian',$id_ujian);
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'carisoalaktif/'.$id_ujian.'',
			'total_rows' => $this->model4->hitung_aktif($id_ujian),
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
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['ddujian'] = $this->model1->ambilujian();
			$data['View_soal'] = $this->model4->Cari_aktif($id_ujian,$limit)->result();
			$this->load->view('view25', $data);		
		}
		
		public function Cari_nonaktif($id_ujian,$offset=0)
		{
			$this->session->set_userdata('id_ujian',$id_ujian);
			$perpage = 50;
			$this->load->library('pagination');
			$config = array(
			'base_url' => base_url() . 'carisoalnonaktif/'.$id_ujian.'',
			'total_rows' => $this->model4->hitung_nonaktif($id_ujian),
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
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			);
			$this->pagination->initialize($config);
			$limit['perpage'] = $perpage;
			$limit['offset'] = $offset;
			$data['ddujian'] = $this->model1->ambilujian();
			$data['View_soal'] = $this->model4->Cari_nonaktif($id_ujian,$limit)->result();
			$this->load->view('view25', $data);		
		}
		
		public function kembali_ke_view(){
			$id_ujian = $this->session->userdata('id_ujian');
			$data['View_soal'] = $this->model4->select_by_id_ujian1($id_ujian)->result();
			$this->load->view('view25', $data);
		}
		
		public function Tambah_soal(){
			$this->load->view('view26');
		}
		
		public function Tambah_soal_e(){
			$this->load->view('view26e');
		}
		
		public function Proses_tambah_soal(){
			$config['upload_path'] = "assets/kcfinder/upload/audio/"; 
			$config['allowed_types'] = 'mp4|wmv|avi|mov|wav|mp3|mid'; 
			$config['file_name'] = url_title($this->input->post('file_upload')); 
			$config['max_size']      =   "8000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('file_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'mm_soal'=>$this->upload->file_name ); 
			}
			if (isset($_POST['essay'])) {  
				$data['essay'] = 1;
				$data['jrx'] =  str_replace(",","~",$this->input->post('jjrx1')) ;
			}  
			else 
			{$data['essay'] = 0;
				$data['jrx'] = $this->input->post('jjrx');
			}
			$data['bobot'] = $this->input->post('bobot');
			$data['soal'] = $this->input->post('soal');
			$data['pil_a'] = $this->input->post('pil_a');
			$data['pil_b'] = $this->input->post('pil_b');
			$data['pil_c'] = $this->input->post('pil_c');
			$data['pil_d'] = $this->input->post('pil_d');
			$data['pil_e'] = $this->input->post('pil_e');
			$data['kyd'] = $this->input->post('kyd');
			
			$data['id_ujian'] = $this->session->userdata('id_ujian');
			$idujian = $this->session->userdata('id_ujian');
			$date = new DateTime();
			$data['tgl_input'] = date_format($date, 'Y-m-d H:i:s');
			$id_soal = $this->model4->insert_soal($data,'soal');
			
			$this->db->where('id_ujian', $idujian);
			$q = $this->db->get('ujian');
			$data2 = $q->result_array();
			$name = array(($data2[0]['nosoal']));
			
			if (array_filter($name) == [])
			{
				$data1['nosoal'] = $id_soal;
			} else
			{
				array_push($name,$id_soal);
				$data1['nosoal'] = implode(',',$name);
			}
			
			$this->model4->update_ujian($idujian,$data1);
			
			$this->session->set_flashdata('pesan6','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data SOAL baru telah berhasil ditambahkan ke dalam database.</div>');
			redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
		}
		
		public function delete_soal($id_soal){
			
			$idujian = $this->session->userdata('id_ujian');			
			$this->db->where('id_ujian', $idujian);
			$q = $this->db->get('ujian');
			$data2 = $q->result_array();
			$name = explode(",",($data2[0]['nosoal']));
			
			$key = array_search($id_soal, $name);
			if (false !== $key) {
				unset($name[$key]);
			}			
			$data1['nosoal'] = implode(',',$name);			
			$this->model4->update_ujian($idujian,$data1);
			
			$this->model4->delete_soal($id_soal);
			redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
		}
		
		public function Proses_tambah_soal_e(){
			$config['upload_path'] = "assets/kcfinder/upload/audio/"; 
			$config['allowed_types'] = 'mp4|wmv|avi|mov|wav|mp3|mid'; 
			$config['file_name'] = url_title($this->input->post('file_upload')); 
			$config['max_size']      =   "8000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('file_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'mm_soal'=>$this->upload->file_name ); 
			}
			
			$data['soal'] = $this->input->post('soal');
			$data['kyd'] = $this->input->post('kyd');
			$data['id_ujian'] = $this->session->userdata('id_ujian');
			$date = new DateTime();
			$data['tgl_input'] = date_format($date, 'Y-m-d H:i:s');
			$this->model4->insert_soal($data,'soal');
			$this->session->set_flashdata('pesan6','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data SOAL baru telah berhasil ditambahkan ke dalam database.</div>');
			redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
		}
		
		public function edit_soal($id_soal){
			$data['soal'] = $this->model4->select_by_id($id_soal)->row();
			$this->load->view('view27', $data);
		}
		
		public function edit_soal_e($id_soal){
			$data['soal'] = $this->model4->select_by_id($id_soal)->row();
			$this->load->view('view27e', $data);
		}
		
		public function proses_edit_soal(){	
			$config['upload_path'] = "assets/kcfinder/upload/audio/"; 
			$config['allowed_types'] = 'mp4|wmv|avi|mov|wav|mp3|mid'; 
			$config['file_name'] = url_title($this->input->post('file_upload')); 
			$config['max_size']      =   "8000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('file_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'mm_soal'=>$this->upload->file_name ); 
			}	
			if (isset($_POST['essay'])) {  
				$data['essay'] = 1;
				$data['jrx'] = str_replace(",","~",$this->input->post('jrx1')) ;
			}  
			else 
			{$data['essay'] = 0;
				$data['jrx'] = $this->input->post('jrx');
			}
			$data['bobot'] = $this->input->post('bobot');
			$data['soal'] = $this->input->post('soal');
			$data['pil_a'] = $this->input->post('pil_a');
			$data['pil_b'] = $this->input->post('pil_b');
			$data['pil_c'] = $this->input->post('pil_c');
			$data['pil_d'] = $this->input->post('pil_d');
			$data['pil_e'] = $this->input->post('pil_e');
			$data['kyd'] = $this->input->post('kyd');
			$data['id_ujian'] = $this->input->post('idujian');
			
			$id_soal=$this->input->post('id_soal');
			$this->model4->update_soal($id_soal, $data);
			$this->session->set_flashdata('pesan6','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data SOAL telah berhasil di update ke dalam database.</div>');
			redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
		}
		
		public function proses_edit_soal_e(){	
			$config['upload_path'] = "assets/kcfinder/upload/audio/"; 
			$config['allowed_types'] = 'mp4|wmv|avi|mov|wav|mp3|mid'; 
			$config['file_name'] = url_title($this->input->post('file_upload')); 
			$config['max_size']      =   "8000"; 
			$this->upload->initialize($config); 
			
			if( !$this->upload->do_upload('file_upload')) 
			{ echo $this->upload->display_errors(); } 
			else { 
				$data = array( 'mm_soal'=>$this->upload->file_name ); 
			}	
			
			$data['soal'] = $this->input->post('soal');
			$data['kyd'] = $this->input->post('kyd');
			
			$id_soal=$this->input->post('id_soal');
			$this->model4->update_soal($id_soal, $data);
			$this->session->set_flashdata('pesan6','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
			alert-success"><b>SUKSES!</b> Data SOAL telah berhasil di update ke dalam database.</div>');
			redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
		}
		
		public function update_aktivasi_soal(){
			$pilih = $this->input->post('pilih');
			$id_ujian = $this->input->post('id_ujian');
			$id_soal = $this->input->post('id_soal');
			if ($pilih=="")
			{
				$uri = $this->input->post('uri');
				if ($uri == 'carisoalnonaktif')
				{
					redirect(site_url('carisoalnonaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else if ($uri == 'carisoalaktif') {
					redirect(site_url('carisoalaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else {
					redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
				} 
			} else if ($pilih=="2")
			{
				
				$this->db->where('id_ujian', $this->session->userdata('id_ujian'));
				$q = $this->db->get('ujian');
				$data2 = $q->result_array();
				$name = explode(",",($data2[0]['nosoal']));
				
				foreach ($id_soal as $value)
				{
					$data[] = $value;			
				}	
		
				$name = array_diff($name, $id_soal);
				$data1['nosoal'] = implode(',',$name);
				$this->model4->update_ujian($this->session->userdata('id_ujian'),$data1);
				
				$this->model4->bulk_delete($data);
				$uri = $this->input->post('uri');
				if ($uri == 'carisoalnonaktif')
				{
					redirect(site_url('carisoalnonaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else if ($uri == 'carisoalaktif') {
					redirect(site_url('carisoalaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else {
					redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
				} 	
			}
			else if ($pilih=="3")
			{	
				
				$this->db->where('id_ujian', $id_ujian);
				$q = $this->db->get('ujian');
				$data2 = $q->result_array();
				$name = array(($data2[0]['nosoal']));
				
				
				foreach ($id_soal as $key => $value)
				{
					$uj=array();
					$this->db->select('*');
					$this->db->from('soal');
					$this->db->where('id_soal',$id_soal[$key]);
					$query1 = $this->db->get ();												
					$qrows1 = $query1->result();
					$rows1 = $qrows1[0];
					$cek = $rows1->id_ujian;
					
					$ids = explode (',',$cek);
					
					if (in_array($id_ujian, $ids))
					{
						$this->session->set_flashdata('pesan6','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:10px;" class="alert
						alert-success">Duplikasi gagal, nama ujian sama.</div>');
						} else {			
						array_push($name,$id_soal[$key]);
						array_push($uj,$cek);
						array_push($uj,$id_ujian);
						$idu = implode (',',$uj);
						
						$data[] = array('id_soal' => $id_soal[$key],'id_ujian' =>$idu);
					} 
				}
				
				$str = implode(',',$name);
				if ($str[0]==','){
					$data1['nosoal'] = substr($str, 1);
					} else {
					$data1['nosoal'] = $str;
				}
				
				
				$this->model4->update_ujian($id_ujian,$data1);
				
				$this->model4->update_aktivasi_soal($data);
				
				$uri = $this->input->post('uri');
				if ($uri == 'carisoalnonaktif')
				{
				redirect(site_url('carisoalnonaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
				} else if ($uri == 'carisoalaktif') {
				redirect(site_url('carisoalaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
				} else {
				redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
				} 
			}
			else
			{
				foreach ($id_soal as $key => $value)
				{
					$data[] = array('id_soal' => $id_soal[$key],'aktif' =>$pilih);
				}    
				$this->model4->update_aktivasi_soal($data);
				$uri = $this->input->post('uri');
				if ($uri == 'carisoalnonaktif')
				{
					redirect(site_url('carisoalnonaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else if ($uri == 'carisoalaktif') {
					redirect(site_url('carisoalaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else {
					redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
				} 
			}
		}
		
		public function duplikasi(){
			$id_ujian = $this->input->post('id_ujian');
			$id_soal = $this->input->post('id_soal');
			
			print_r ($id_soal);
			echo $id_ujian;
			
			$this->db->where_in('id_soal', $id_soal);
			$query = $this->db->get('soal');
			
			foreach ($query->result() as $row){   					
				$data[] =  array(
				'bobot' => $row->bobot,
				'mm_soal' => $row->mm_soal,
				'soal' => $row->soal,
				'pil_a' => $row->pil_a,
				'pil_b' => $row->pil_b,
				'pil_c' => $row->pil_c,
				'pil_d' => $row->pil_d,
				'pil_e' => $row->pil_e,
				'jrx' => $row->jrx,
				'id_ujian' => $id_ujian,
				'aktif' => $row->aktif,
				'kyd' => $row->kyd
				);					
				}/*
				
				$this->db->insert_batch('soal',$data); 
				redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
			*/}
			
			public function view_edit_soal($id_soal){
				if (isset($_POST['status'])) {  
					$data['aktif'] = 1;
				}  
				else 
				{$data['aktif'] = 0;
				}
				$this->model4->update_view_soal($id_soal,$data);
				$uri = $this->input->post('uri');
				if ($uri == 'carisoalnonaktif')
				{
					redirect(site_url('carisoalnonaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else if ($uri == 'carisoalaktif') {
					redirect(site_url('carisoalaktif/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
					} else {
					redirect(site_url('tampilsoal/'.$this->session->userdata('id_ujian').'/'.$this->session->userdata('id_page').''));
				}
			}
			
			public function dpdf($id_ujian)
			{
				
				
				$data['View_soal'] = $this->model4->select_by_id_ujian1($id_ujian)->result();
				
				
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				$pdf->setPrintFooter(false);
				$pdf->setPrintHeader(false);
				$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
				$pdf->AddPage('');
				$pdf->SetFont('');
				$i=0;
				
				$where = "soal.id_ujian like '$id_ujian' or soal.id_ujian like '%,$id_ujian' or soal.id_ujian like '$id_ujian,%' or soal.id_ujian like '%,$id_ujian,%'";
				$this->db->select('*, soal.id_ujian as idu');
				$this->db->from('soal');
				$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
				$this->db->where($where);
				$query = $this->db->get ();												
				$qrow = $query->result();
				$row = $qrow[0];	
				
				$k = explode(',',$row->id_kelas);	
				$jml_k = count($k);
				$uk=array();
				for ($a=0;$a<$jml_k;$a++) {
					$this->db->select('*');
					$this->db->where('id_kelas',$k[$a]);
					$query = $this->db->get('kelas')->row();
					array_push($uk,$query->nama_kelas);					
				}
				$kelas = implode (',',$uk);
				
				$this->db->select('*');
				$this->db->where('id_folder',$row->id_folder);
				$query1 = $this->db->get('folder')->row();
				
				
				
				
				$html.='
				<table width="100%" border="1">
				<tr ><th align="center" style="font-size:10px;line-height: 14px;">Kelas</th><th align="center" style="font-size:10px;line-height: 14px;">Mata Pelajaran</th><th align="center" style="font-size:10px;line-height: 14px;">TO-Ke</th><th align="center" style="font-size:10px;line-height: 14px;">Tanggal Pengerjaan</th>
				</tr>
				<tr><td align="center" style="font-size:10px;line-height: 24px;">'.$kelas.'</td><td align="center" style="font-size:10px;line-height: 24px;">'.$row->nama_ujian.'</td><td align="center" style="font-size:10px;line-height: 24px;">'.$query1->nama_folder.'</td><td align="center" style="font-size:10px;line-height: 24px;">'.date('d-m-Y',strtotime($row->tanggal_ujian)).'</td></tr>
				</table><br/>
				<table width="100%" class="table-new" border="0" cellpadding="5" style=" table-layout: fixed; ">
				<tr bgcolor="#ffffff">
				<th width="5%" align="center"></th>
				<th width="95%" align="center"></th>
				</tr>';
				
				
				foreach ($data["View_soal"] as $soal) 
				{
					$i++;
					$html.='<tr bgcolor="#ffffff">
					<td align="center" valign="top" style="font-size:10px;">'.$i.'</td>
					<td style="font-size:10px;" valign="top">	
					'.strip_tags($soal->soal1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'					
					<br/>';
					
					if ($soal->jrx == "A") {
						$html.='
						<span style="color:red">A. '.strip_tags($soal->pil_a1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'</span><br/> 
						B. '.strip_tags($soal->pil_b1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						C. '.strip_tags($soal->pil_c1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						D. '.strip_tags($soal->pil_d1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						E. '.strip_tags($soal->pil_e1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						</td>
						</tr>';
						} else if ($soal->jrx == "B"){
						$html.='
						A. '.strip_tags($soal->pil_a1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						<span style="color:red">B. '.strip_tags($soal->pil_b1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'</span><br/>
						C. '.strip_tags($soal->pil_c1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						D. '.strip_tags($soal->pil_d1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						E. '.strip_tags($soal->pil_e1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						</td>
						</tr>';
						} else if ($soal->jrx == "C"){
						$html.='
						A. '.strip_tags($soal->pil_a,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						B. '.strip_tags($soal->pil_b,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						<span style="color:red">C. '.strip_tags($soal->pil_c,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'</span><br/>
						D. '.strip_tags($soal->pil_d,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						E. '.strip_tags($soal->pil_e,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						</td>
						</tr>';
						} else if ($soal->jrx == "D"){
						$html.='
						A. '.strip_tags($soal->pil_a1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						B. '.strip_tags($soal->pil_b1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						C. '.strip_tags($soal->pil_c1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						<span style="color:red">D. '.strip_tags($soal->pil_d1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'</span><br/>
						E. '.strip_tags($soal->pil_e1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						</td>
						</tr>';
						} else if ($soal->jrx == "E"){
						$html.='
						A. '.strip_tags($soal->pil_a1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						B. '.strip_tags($soal->pil_b1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						C. '.strip_tags($soal->pil_c1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						D. '.strip_tags($soal->pil_d1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						<span style="color:red">E. '.strip_tags($soal->pil_e1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'</span><br/>
						</td>
						</tr>';
						} else {
						$html.='
						A. '.strip_tags($soal->pil_a1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						B. '.strip_tags($soal->pil_b1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						C. '.strip_tags($soal->pil_c1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						D. '.strip_tags($soal->pil_d1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						E. '.strip_tags($soal->pil_e1,"<img><table><tr><td><th><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>").'<br/>
						</td>
						</tr>';
					}
				}
				$html.='</table>';
				
				$pdf->writeHTML($html, true, false, true, false, '');
				ob_clean(); 
				$pdf->Output($row->nama_ujian, 'I');
			}
	}																														