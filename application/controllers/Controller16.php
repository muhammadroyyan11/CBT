<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Controller16 extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('model12');
		}
		
		public function pendaftaran_ujian(){
			$this->data['products'] = $this->model12->get_all();
			$this->load->view('view60', $this->data);
		}
		
		public function index()
		{	
			$this->data['title'] = 'Products';
			
			$this->data['products'] = $this->model12->get_all();
			
			$this->load->view('products', $this->data);
		}
		
		public function request()
	{
	$this->load->view('view61');
	}
	
	public function response()
	{
	$this->load->view('view62');
	}
	
	public function call_back()
	{
	$this->load->view('view63');
	}
		
		
	}	