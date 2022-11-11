<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model1 extends CI_Model {
		public function __construct()
		{
			parent::__construct();
		}
		
		function select_all(){
			$this->db->select ( '*' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->order_by("proses.p_nilai", "desc"); 
			$query = $this->db->get ();
			return $query->result ();
		}
		
		function cetak(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc"); 
			$query = $this->db->get ();
			return $query->result ();
		}
		
		function hapus_hasil_ujian(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->delete('proses');
			
		}
		
		function select_id_proses(){
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function ambilkelas()
		{
			$this->db->from('kelas');
			$this->db->order_by('nama_kelas');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['id_kelas']] = $row['nama_kelas'];
				}
			}
			return $return;
		}
		
		function ambilsekolah()
		{
			$this->db->from('pengguna');
			$this->db->order_by('sekolah');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['sekolah']] = $row['sekolah'];
				}
			}
			return $return;
		}
		
		function ambilujian()
		{
			$this->db->from('ujian');
			$this->db->order_by('nama_ujian');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['id_ujian']] = $row['nama_ujian'];
				}
			}
			return $return;
		}
		
		
		function select_by_id_ujian($id_ujian){
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
			$this->db->where('soal.id_ujian', $id_ujian);
			return $this->db->get();
		}
		
		function tampil($id_ujian){
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where('soal.id_ujian', $id_ujian);
			return $this->db->get();
		}
		
		function proses_all($no_copy,$id_ujian){
			$where = "proses.no_copy='$no_copy' AND proses.id_ujian='$id_ujian'";
			$this->db->select('*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah');
			$this->db->from('proses');
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			return $this->db->get();
		}
		
		function select_by_id_proses($id_proses){
			$where = "proses.id_proses='$id_proses'";
			$this->db->select('*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah');
			$this->db->from('proses');
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			return $this->db->get();	
		}
		
		function delete_hasil($id_proses){
			$this->db->where('id_proses', $id_proses);
			$this->db->delete('proses');
		}
		
		function after_delete(){			
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm = $this->session->userdata('wmulai');
			$wa = $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc"); 
			$query = $this->db->get ();
	        if ($query->num_rows() > 0) {
				return $query->result ();
				} else {
				return $query->result ();
				$this->session->unset_userdata('idujian');
				$this->session->unset_userdata('idkelas');
				$this->session->unset_userdata('sekolah');
			}
		}
		
		function after_update(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm = $this->session->userdata('wmulai');
			$wa = $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,(LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("jml", "desc") and $this->db->order_by("proses.p_nilai", "asc");
			$query = $this->db->get ();
	        if ($query->num_rows() > 0) {
				return $query->result ();
				} else {
				return $query->result ();
				$this->session->unset_userdata('idujian');
				$this->session->unset_userdata('idkelas');
				$this->session->unset_userdata('sekolah');
				$this->session->unset_userdata('wmulai');
				$this->session->unset_userdata('wakhir');
			}
		}
		
		function caridata(){
			$userdata = array(
			'idkelas'  => $this->input->POST ('id_kelas'),
			'idujian'  => $this->input->POST ('id_ujian'),
			'sekolah'  => $this->input->POST ('sekolah'),
			'wmulai'  => $this->input->POST ('wmulai'),
			'wakhir'  => $this->input->POST ('wakhir'),
			);
			$this->session->set_userdata($userdata);
			$c = $this->input->POST ('id_kelas');
			$d = $this->input->POST ('id_ujian');
			$e = $this->input->POST ('sekolah');
			$wm = $this->input->POST ('wmulai');
			$wa = $this->input->POST ('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.p_nilai", "desc"); 
			$query = $this->db->get ();
			return $query->result ();
			
		}
		
		function sortdata1(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.tgl_ujian", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function sortdata2(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.nama_ujian", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function sortdata3(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.nama", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function sortdata4(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.no_peserta", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function sortdata5(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.nama_kelas", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function sortdata6(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.sekolah", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function sortdata7(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.p_nilai", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function caridata1(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm = $this->session->userdata('wmulai');
			$wa = $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc"); 
			$query = $this->db->get ();
			return $query->result ();
			
		}
		
		function monitoring(){
			$userdata = array(
			'idkelas'  => $this->input->POST ('id_kelas'),
			'idujian'  => $this->input->POST ('id_ujian'),
			'sekolah'  => $this->input->POST ('sekolah'),
			'wmulai'  => $this->input->POST ('wmulai'),
			'wakhir'  => $this->input->POST ('wakhir'),
			);
			$this->session->set_userdata($userdata);
			$c = $this->input->POST ('id_kelas');
			$d = $this->input->POST ('id_ujian');
			$e = $this->input->POST ('sekolah');
			$wm = $this->input->POST ('wmulai');
			$wa = $this->input->POST ('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("jml", "desc") and $this->db->order_by("proses.p_nilai", "asc"); 
			$query = $this->db->get ();
			return $query->result ();
		}
		
		function msortdata1(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.tgl_ujian", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function msortdata2(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.nama_ujian", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function msortdata3(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.nama", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function msortdata4(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.no_peserta", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function msortdata5(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.nama_kelas", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function msortdata6(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.sekolah", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function msortdata7(){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			if ($this->session->userdata('n')=='' or $this->session->userdata('n')=='1')
			{
			$userdata = array(
			'n'  => '2',
			);
			$this->session->set_userdata($userdata);	
			$s = 'desc';
			} 
			elseif ($this->session->userdata('n')=='2')
			{
			$userdata = array(
			'n'  => '1',
			);
			$this->session->set_userdata($userdata);
			$s = 'asc';
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, (LENGTH(proses.hasil_jawaban)-LENGTH(REPLACE(proses.hasil_jawaban, "K", ""))) as jml, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);			
			$this->db->order_by("proses.p_nilai", $s); 
			$query = $this->db->get ();
			return $query->result ();	
		}
		
		function select_by_id($id_proses){
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('id_proses', $id_proses);
			return $this->db->get();
		}
		
		function update_ip($id_proses, $data){
			$this->db->where('id_proses', $id_proses);
			$this->db->update('proses', $data);
		}
		
		function proses_all1($no_copy){
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			return $this->db->get();
		}
		
		function proses_nilai($no_copy){
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			return $this->db->get();
		}
		
		function carirank(){
			$userdata = array(
			'idkelas'  => $this->input->POST ('id_kelas'),
			'idujian'  => $this->input->POST ('id_ujian'),
			);
			$this->session->set_userdata($userdata);
			$c = $this->input->POST ('id_kelas');
			$d = $this->input->POST ('id_ujian');
			$e = $this->input->POST ('sekolah');
			if ($e == '0'){
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			}
			else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			}
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->limit(10);
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc"); 
			
			$query = $this->db->get ();
			return $query->result ();
			
		}
		
		function ambiljurusan1($idp){
			$response = array();
			$this->db->select('*');
			$this->db->where('kode_jurusan', $idp);
			$q = $this->db->get('jurusan');
			$response = $q->result_array();
			return $response;
		}
		
		function pilih_jurusan(){
			$this->db->from('jurusan');
			$this->db->where('program_studi', 'IPA');
			$this->db->order_by('kode_jurusan');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['kode_jurusan']] = $row['kode_jurusan'].' - '.$row['pil_jurusan'].' - '.$row['nama_univ'];
				}
			}
			return $return;
		}
		
		function pilih_jurusan1(){
			$this->db->from('jurusan');
			$this->db->where('program_studi', 'IPS');
			$this->db->order_by('kode_jurusan');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['kode_jurusan']] = $row['kode_jurusan'].' - '.$row['pil_jurusan'].' - '.$row['nama_univ'];
				}
			}
			return $return;
		}
		
		function select_by_id_siswa($id_siswa){
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->where('id', $id_siswa);
			return $this->db->get();
		}
		
		function update_jurusan($id_siswa, $data){
			$this->db->where('id', $id_siswa);
			$this->db->update('pengguna', $data);
		}
		
		function select_by_id_jurusan($kode_jurusan){
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('kode_jurusan', $kode_jurusan);
			return $this->db->get();
		}
		
		function hapus_log($no_peserta){
			$this->db->where('no_peserta', $no_peserta);
			$this->db->delete('log');
		}
		
		function hapus_all(){
			$this->db->from('log'); 
			$this->db->truncate(); 
		}
		
		function bulk_delete($data)
		{
			$this->db->where_in('id_log', $data);
			$this->db->delete('log');
		}
		
		function hitung_baris(){
			$query = $this->db->get('log');
			return $query->num_rows();      
		}
		
		function select_all_paging($limit=array()){
			$this->db->select('*');
			$this->db->from('log');
			if ($limit != NULL)
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get();
		}
		
		function Carilog($limit=array()) {
			if ( $this->input->post('cari') == ''){
				$c = $this->session->userdata('cari');
				$this->db->select('*');
				$this->db->from('log');
				$this->db->like('nama_peserta', $c);
				$this->db->or_like('no_peserta',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
				} else{
				$c = $this->input->post('cari');
				$this->session->set_userdata('cari',$c);
				$this->db->select('*');
				$this->db->from('log');
				$this->db->like('nama_peserta', $c);
				$this->db->or_like('no_peserta',$c);
				if ($limit != NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
				return $this->db->get();
			}
		}
		
		function settinganalisa(){
			$this->db->select('*');
			$this->db->from('setting');
			return $this->db->get();
		}
		

		function updateanalisa($data){
			$this->db->update('setting', $data);
		}	
		
		function prosesupdate($id,$data){
			$this->db->where('id_proses', $id);
			$this->db->update('proses', $data);
		}
		
		function prosesupdate2($data){
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($c!=='0' AND $d!=='0' AND $wm!=='' AND $wa!==''  AND ($e=='0'))
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			elseif ($c!=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_kelas='$c'";	
			} 
			elseif ($c=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND ($e=='0' OR $e==''))
			{
				$where= "proses.id_ujian='$d'";	
			} 
			elseif ($c=='0' AND $d=='0' AND $wm=='' AND $wa=='' AND ($e!=='0' OR $e!==''))
			{
				$where= "proses.sekolah='$e'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d'";	
			} 
			elseif ($c!=='0' AND $d!=='0' AND $wm=='' AND $wa=='' AND $e!=='0')
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e'";	
			} 
			else
			{
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->update('proses', $data);
		}
		
				function update_jawaban1($no_copy, $data){
			$this->db->where('no_copy', $no_copy);
			$this->db->update('proses', $data);
		}
		
		function select_by_id_proses1($id,$idf){
			$where = "id='$id' AND id_fdr='$idf'";
			$this->db->select('*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah');
			$this->db->from('proses');
			$this->db->where($where);
			return $this->db->get();	
		}
		
		function caridatanama(){
			$userdata = array(
			'nama'  => $this->input->POST ('nama'),
			);
			$this->session->set_userdata($userdata);
			$c = $this->input->POST ('nama');
	
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->like('proses.nama', $c);		
			$this->db->order_by("proses.p_nilai", "desc"); 
			$query = $this->db->get ();
			return $query->result ();
			
		}
		
		function ambilkategori()
		{
			$this->db->from('folder');
			$this->db->order_by('nama_folder');
			$result = $this->db->get();
			$return = array();
			if($result->num_rows() > 0) {
				foreach($result->result_array() as $row) {
					$return[$row['id_folder']] = $row['nama_folder'];
				}
			}
			return $return;
		}
		
		
	}											