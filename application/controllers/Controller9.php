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
	class Controller9 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->model('model6');
			$this->load->library('session');
		}
		public function index()
		{
		
		
			if(($this->session->userdata('user_id')!=""))
			{   
		        $this->session->sess_destroy();
				redirect(site_url('loginform'));
			}
			else
			{
		        $this->db->select('*');
				$this->db->from('setting');
				$query1 = $this->db->get ();												
				$qrow1 = $query1->result();
				$row1 = $qrow1[0];
				$page = $row1->page;
				
				if ($page=="0")
				{
					redirect(site_url('loginform'));
				}
				else
				{
					$this->load->view("view31");
				}
			}
		}
		
		public function login_form()
		{
			if(($this->session->userdata('user_id')!=""))
			{
				
				$this->load->view("view9");
			}
			else
			{
				$this->load->view("view19");
			}
		}
		
				public function reset_password()
		{
			$this->load->view("view55");			
		}
		
		public function reset_pass()
		{						
			$this->db->where('no_peserta',$this->input->post('l_nopes'));
			$this->db->where('email',$this->input->post('l_email'));
			$query  = $this->db->get("pengguna");   
			
			if($query->num_rows() > 0){ 
				$data = array
				(
				'nopes' => $this->input->post('l_nopes'),
				'email' => $this->input->post('l_email'),
				'password' => $this->input->post('l_pass')
				);
				$this->model6->resetpass($data);
				$this->session->set_flashdata('pesan2','<div style="color:green;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>SUKSES!</b> PASSWORD telah berhasil diperbaharui.</div>');
				redirect(site_url('loginform'));
			} else 
			{
		        
				$this->session->set_flashdata('pesan2','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-bottom:20px;" class="alert
				alert-success"><b>GAGAL!</b> NO PESERTA atau EMAIL yang Anda masukan salah.</div>');
				redirect(site_url('resetpassword'));
			}	
			
			
			
			
			
		}
		
		public function home()
		{
			$this->load->view('view8');	
		}
		
		public function home2()
		{
			$this->load->view('view9');	
		}
		
		public function login()
		{
			$rules = array(array('field'=>'l_nopes','label'=>'No Peserta','rules'=>'required'),
			array('field'=>'l_pass','label'=>'Password','rules'=>'required'));
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == FALSE)
			{
				redirect(site_url('loginform'));
			}
			else
			{
				$auth=$this->model6->login($this->input->post('l_nopes'),$this->input->post('l_pass'));
				if($auth)
				{
					
					$this->db->select('*');
					$this->db->from('log');
					$this->db->where('no_peserta',$this->input->post('l_nopes'));
					$query=$this->db->get ();
					$record=$query->row();
					
					$log1= $this->session->userdata('waktulogin');		
					$log2= $record->wkt_login;
					
					if ($query->num_rows() == 0) 
					{
						
						if ($this->session->userdata('aktif') == 1)
						{
							if (($this->session->userdata('role') == 1) or ($this->session->userdata('role') == 2))
							{redirect(site_url('logout'));}
							else					
							{   
								$data['no_peserta']=$this->input->post('l_nopes');
								$data['nama_peserta']=$this->session->userdata('nama');
								$date = new \DateTime();
								$data['wkt_login'] = date_format($date, 'Y-m-d H:i:s');
								$this->model6->insert_log($data);
								redirect(site_url('homesiswa'));
							}
						} else
						{
							$this->logout();
							exit;
						}
						
						} else {
						
						$this->db->select('*');
						$this->db->from('setting');
						$query2 = $this->db->get ();												
						$qrow2 = $query2->result();
						$row2 = $qrow2[0];
						$sess = $row2->sess;
						
						if ($sess=="1")
						{
							if ($log1==$log2)
							{
								if ($this->session->userdata('aktif') == 1)
								{
									if (($this->session->userdata('role') == 1) or ($this->session->userdata('role') == 2))
									{redirect(site_url('logout'));}
									else					
									{   
										$data['no_peserta']=$this->input->post('l_nopes');
										$this->model6->insert_log($data);
										redirect(site_url('homesiswa'));
									}
								} else
								{
									$this->logout();
									exit;
								}
							} else
							
							{
								$this->stoplog();				 
								exit;
								
							}
						}
						else {
							if ($this->session->userdata('aktif') == 1)
							{
								if (($this->session->userdata('role') == 1) or ($this->session->userdata('role') == 2))
								{redirect(site_url('logout'));}
								else					
								{   
									$data['no_peserta']=$this->input->post('l_nopes');
									$this->model6->insert_log($data);
									redirect(site_url('homesiswa'));
								}
							} else
							{
								$this->logout();
								exit;
							}
						}
					}	
				}
				else
				{
					redirect(site_url('loginform'));
				}
			}
		}
		
		
		public function a_form()
		{
			if(($this->session->userdata('user_id')!=""))
			{
				redirect(site_url('home'));
			}
			else
			{
				$this->load->view("view32");
			}
		}
		
		public function a_msk()
		{
			ob_start(); // Turn on output buffering
			system('ipconfig /all'); //Execute external program to display output
			$mycom=ob_get_contents(); // Capture the output into a variable
			ob_clean(); // Clean (erase) the output buffer
			
			$findme = 'Physical';
			$pmac = strpos($mycom, $findme); // Find the position of Physical text
			$uk=substr($mycom,($pmac+36),17); // Get Physical Address
			
			$rules = array(array('field'=>'l_nopes','label'=>'No Peserta','rules'=>'required'),
			array('field'=>'l_pass','label'=>'Password','rules'=>'required'));
			$this->form_validation->set_rules($rules);
			
			
			if($this->form_validation->run() == FALSE)
			{
				redirect(site_url('admlogau'));
			}
			else
			{
				$auth=$this->model6->login($this->input->post('l_nopes'),$this->input->post('l_pass'));
				if($auth)


				{
					
					
						if ($this->session->userdata('aktif') == 1)
						{
							if (($this->session->userdata('role') == 1) or ($this->session->userdata('role') == 2))
							{redirect(site_url('home'));}
							else
							{redirect(site_url('logout'));}
						} else
						{
							$this->logout();
							exit;
						}
					
					
					
				}
				else
				{
					redirect(site_url('admlogau'));
				}
			}
		}
		
		public function logout()
		{   
			$nopes = $this->session->userdata('no_peserta');
			$this->model6->delete_log($nopes);		
			$this->session->sess_destroy();
			redirect(site_url('loginform'));
		}
		
		public function stoplog()
		{   
			$nopes = $this->session->userdata('no_peserta');
			$this->session->sess_destroy();
			redirect(site_url('loginform'));
		}
		
		public function Logout_admin()
		{
			$this->session->sess_destroy();
			redirect(site_url('admlogau'));
		}
		
		public function about()
		{
			$data['error'] = '';
			$this->load->view('view1', $data);
		}		
		
		
	}												