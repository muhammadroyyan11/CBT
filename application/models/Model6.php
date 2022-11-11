<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model6 extends CI_Model {
		public function __construct()
		{
			parent::__construct();
		}
		
		function login($no_peserta,$password)
		{
			$this->db->where("no_peserta",$no_peserta);
			$this->db->where("password",md5($password));
			$this->db->select ( '*' ); 
			$this->db->from ( 'pengguna' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
			$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
			$query = $this->db->get ();
			
			if($query->num_rows()>0)
			{
				$row=$query->row();
				$userdata = array(
				'user_id'  => $row->id,
				'nama'  => $row->nama,
				'no_peserta'    => $row->no_peserta,
				'peminatan'    => $row->peminatan,
				'namapeminatan'    => $row->nama_peminatan,
				'sekolah'    => $row->sekolah,
				'kelas'  => $row->id_kelas,
				'namakelas' => $row->nama_kelas,
				'role'  => $row->role,
				'aktif'  => $row->aktif,
				'foto'  => $row->foto,
				'jur1'  => $row->jurusan1,
				'jur2'  => $row->jurusan2,
				'jur3'   => $row->jurusan3,
				'snl1'    => $row->jsnl1,
				'snl2'    => $row->jsnl2,
				'snl3' => $row->jsnl3,
				'email' => $row->email,
				'kota' => $row->kota,
				'hp_siswa' => $row->hp_siswa,
				'waktulogin' => time()
				);
				$this->session->set_userdata($userdata);
				return true;
			}
			return false;
		}
		
		function resetpass($data)
		{						
			$this->db->set('password',md5($data['password']));
			$this->db->where('no_peserta',$data['nopes']);
			$this->db->where('email',$data['email']);
			$this->db->update(pengguna);
		}
		
		function insert_log($data){
			$this->db->insert('log', $data);
		}
		
		function delete_log($nopes){
			$this->db->where('no_peserta', $nopes);
			$this->db->delete('log');
		}
		
		function settingheader(){
			$this->db->select('*');
			$this->db->from('setting');
			return $this->db->get();
		}
		
		function update_logo($data){
			$this->db->update('setting', $data);
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
		
		function update_temp($data){
			
			$this->db->update('temp_soal', $data);
		}
		
	}			