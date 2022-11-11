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
	class Controller6 extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('model4');
			$this->load->model('model5');
			$this->load->model('model1');
			$this->load->library('session'); 
			$this->load->library('pagination');
		}		
		
		public function prosesnilai_e()
		{
			$no_copy = $this->input->post('nc');
			$data['prosesnilai1'] =
			$this->model4->update_jawaban1($no_copy,$data);
		}
		
		public function kirim_ulang()
		{
			$no_copy = $this->input->post('kunc');
			$data['hasil_jawaban'] = $this->input->post('kujwb');
			
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			$query=$this->db->get ();
			$record=$query->row();		
			
			$id_soal = explode(',',$record->no_soal);		
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where_in('id_soal',$id_soal);
			$this -> db -> order_by('FIELD(id_soal, '.$record->no_soal.' )');
			$query = $this->db->get ();
			
			$p = 1;
			foreach ($query->result() as $row){
				$jrx[$p] = $row->jrx;
				$p++; 
			}	
			
			$data['jrx'] = implode(',',$jrx);
			$this->model4->update_jawaban1($no_copy,$data);
			redirect(site_url('daftarujian'));
		}
		
		public function hasil_jawaban()
		{
			$no_copy = $this->input->post('nc');
			$jk = $this->input->post('jk');
			$ws = $this->input->post('ws');
			
		    
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			$query=$this->db->get ();
			$record=$query->row();		
			$id_ujian = $this->input->post('idu');
			$id = $this->input->post('id');
            $jml_soal = $record->jml_soal;
			$s_benar = $record->benar;
			$s_salah = $record->salah;
			$s_kosong = $record->kosong;
			$skala = $record->skala;
			$mapel1 = $record->mapel1;
			$mapel2 = $record->mapel2;
			$mapel3 = $record->mapel3;
			$mapel4 = $record->mapel4;
			$mapel5 = $record->mapel5;
			$mapel6 = $record->mapel6;
			$mapel7 = $record->mapel7;
			$mapel8 = $record->mapel8;
			$mapel9 = $record->mapel9;
			$mapel10 = $record->mapel10;
			$jml_mapel1 = $record->jml_mapel1;
			$jml_mapel2 = $record->jml_mapel2;
			$jml_mapel3 = $record->jml_mapel3;
			$jml_mapel4 = $record->jml_mapel4;
			$jml_mapel5 = $record->jml_mapel5;
			$jml_mapel6 = $record->jml_mapel6;
			$jml_mapel7 = $record->jml_mapel7;
			$jml_mapel8 = $record->jml_mapel8;
			$jml_mapel9 = $record->jml_mapel9;
			$jml_mapel10 = $record->jml_mapel10;
			$mapel = $record->multi;
			$jumlah_mapel = $record->jumlah_mapel;
			
			$id_soal = explode(',',$record->no_soal);		
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where_in('id_soal',$id_soal);
			$this -> db -> order_by('FIELD(id_soal, '.$record->no_soal.' )');
			$query = $this->db->get ();
			
			$p = 1;
			foreach ($query->result() as $row){
				$jrx[$p] = $row->jrx;
				$p++; 
			}	

			
			/*$hasil = explode(',',$record->hasil_jawaban);*/
			$hasil = explode(',',$jk);				 
			
			
				/*myfile = fopen('uploads/'.$record->nama.'_'.$no_copy.'.txt', "w") or die("Unable to open file!");
				$txt = 'Jawaban: '.json_encode($record->hasil_jawaban).' No Copy: '.json_encode($record->no_copy).' Id: '.json_encode($record->id).' Id Kelas: '.json_encode($record->id_kelas).' Id Ujian: '.json_encode($record->id_ujian).' No Soal: '.json_encode($record->no_soal).' Kunci: '.json_encode($record->jrx).' Nama Kelas: '.json_encode($record->nama_kelas).' Nama: '.json_encode($record->nama).' Nama Ujian: '.json_encode($record->nama_ujian).' Jumlah Soal: '.json_encode($record->jml_soal).' Sisa Waktu: '.json_encode($record->sisa_waktu).' Benar: '.json_encode($record->benar).' Salah: '.json_encode($record->salah).' Kosong: '.json_encode($record->kosong).' Skala: '.json_encode($record->skala).' Mapel 1: '.json_encode($record->mapel1).' Jml Soal 1: '.json_encode($record->jml_mapel1).' Mapel 2: '.json_encode($record->mapel2).' Jml Soal 2: '.json_encode($record->jml_mapel2).' Mapel 3: '.json_encode($record->mapel3).' Jml Soal 3: '.json_encode($record->jml_mapel3).' Mapel 4: '.json_encode($record->mapel4).' Jml Soal 4: '.json_encode($record->jml_mapel4).' Mapel 5: '.json_encode($record->mapel5).' Jml Soal 5: '.json_encode($record->jml_mapel5).' Mapel 6: '.json_encode($record->mapel6).' Jml Soal 6: '.json_encode($record->jml_mapel6).' Mapel 7: '.json_encode($record->mapel7).' Jml Soal 7: '.json_encode($record->jml_mapel7).' Mapel 8: '.json_encode($record->mapel8).' Jml Soal 8: '.json_encode($record->jml_mapel8).' Mapel 9: '.json_encode($record->mapel9).' Jml Soal 9: '.json_encode($record->jml_mapel9).' Mapel 10: '.json_encode($record->mapel10).' Jml Soal 10: '.json_encode($record->jml_mapel10).' Multi : '.json_encode($record->multi).' Jml Soal : '.json_encode($record->jumlah_mapel).' Tgl Ujian: '.json_encode($record->tgl_ujian).' Nopes: '.json_encode($record->no_peserta).' Sekolah: '.json_encode($record->sekolah).' Jawaban Backup: '.json_encode($record->hasil_jawaban1);
				fwrite($myfile, $txt);
				fclose($myfile);*/
			
			
			$j=1;
			for($i=0;$i<$jml_soal;$i++)
			{					
				if($jrx[$j] == "*")
				{
				$nilai[$i] = 1;		
				}
				else if ($hasil[$i] == "K")
				{					
					$nilai[$i] = 9;
				}				
				else{
					if (strtolower($hasil[$i]) == strtolower($jrx[$j]))
					{						
						$nilai[$i] = 1;
					}				
					else
					{						
						$nilai[$i] = 0;	
					}
				}								
				$j++;
			}
			
			if ($record->multi==1)
			{												
				$pn1 = substr(implode('',$nilai),0,$jml_mapel1);			
				$pn2 = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
				$pn3 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
				$pn4 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
				$pn5 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
				$pn6 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
				$pn7 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
				$pn8 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
				$pn9 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
				$pn10 = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
				
				$data['prosesnilai1'] = substr(implode('',$nilai),0,$jml_mapel1);			
				$data['prosesnilai2'] = substr(implode('',$nilai),$jml_mapel1,$jml_mapel2);
				$data['prosesnilai3'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2,$jml_mapel3);
				$data['prosesnilai4'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3,$jml_mapel4);
				$data['prosesnilai5'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4,$jml_mapel5);
				$data['prosesnilai6'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5,$jml_mapel6);
				$data['prosesnilai7'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6,$jml_mapel7);
				$data['prosesnilai8'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7,$jml_mapel8);
				$data['prosesnilai9'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8,$jml_mapel9);
				$data['prosesnilai10'] = substr(implode('',$nilai),$jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9,$jml_mapel10);
				
				$data['proses_nilai'] = substr(implode(',',$nilai),0);
				$data['p_benar'] = count(array_keys($nilai, "1"));
				$data['p_salah'] = count(array_keys($nilai, "0"));
				$data['p_kosong'] = count(array_keys($nilai, "9"));
				
				$tot=0;
				$tot_k13=0;
				for($k=1;$k<=$jumlah_mapel;$k++){
					$data['benar'.+$k] = substr_count(${'pn'.$k}, "1");
					$data['salah'.+$k] = substr_count(${'pn'.$k}, "0");
					$data['kosong'.+$k] = substr_count(${'pn'.$k}, "9");
					${'benar'.$k} = substr_count(${'pn'.$k}, "1");
					${'salah'.$k} = substr_count(${'pn'.$k}, "0");
					${'kosong'.$k}  = substr_count(${'pn'.$k}, "9");
					
					if($skala==0) {				
						$data['nilai'.+$k] = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
						${'nilai'.$k} = ((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)));
					}
					
					else {
						$data['nilai'.+$k] = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
						${'nilai'.$k} = ((((${'benar'.$k}*$s_benar)+((${'salah'.$k}*$s_salah)+(${'kosong'.$k}*$s_kosong)))/${'jml_mapel'.$k})*$skala)/$s_benar;
					}															
					$data['k13_'.+$k] = +${'benar'.$k}/${'jml_mapel'.$k} * 3+1;
					${'k13_'.$k} = round(+${'benar'.$k}/${'jml_mapel'.$k} * 3+1, 2); 
					if (${'k13_'.$k} <= 4 && ${'k13_'.$k} >= 3.85) {${'predikat'.$k} = "A";}
					elseif (${'k13_'.$k} <= 3.84 && ${'k13_'.$k} >= 3.51) {${'predikat'.$k} = "A-";} 
					elseif (${'k13_'.$k} <= 3.50 && ${'k13_'.$k} >= 3.18) {${'predikat'.$k} = "B+";} 
					elseif (${'k13_'.$k} <= 3.17 && ${'k13_'.$k} >= 2.85) {${'predikat'.$k} = "B";} 
					elseif (${'k13_'.$k} <= 2.84 && ${'k13_'.$k} >= 2.51) {${'predikat'.$k} = "B-";} 
					elseif (${'k13_'.$k} <= 2.50 && ${'k13_'.$k} >= 2.18) {${'predikat'.$k} = "C+";} 
					elseif (${'k13_'.$k} <= 2.17 && ${'k13_'.$k} >= 1.85) {${'predikat'.$k} = "C";} 
					elseif (${'k13_'.$k} <= 1.84 && ${'k13_'.$k} >= 1.51) {${'predikat'.$k} = "C-";} 
					elseif (${'k13_'.$k} <= 1.50 && ${'k13_'.$k} >= 1.18) {${'predikat'.$k} = "D+";} 
					elseif (${'k13_'.$k} <= 1.17 && ${'k13_'.$k} >= 1.00) {${'predikat'.$k} = "D";} 
					$data['predikat'.+$k] = ${'predikat'.$k};											
					$tot = $tot + ${'nilai'.$k};
					$tot_k13 = $tot_k13 + ${'k13_'.$k};
					
				}								
				
				$data['p_nilai'] = $tot/$jumlah_mapel;
				$data['k13'] = $tot_k13/$jumlah_mapel;
				$k13 = round($tot_k13/$jumlah_mapel, 2); 
				
				if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
				elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
				elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
				elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
				elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
				elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
				elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
				elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
				elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
				elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
				$data['predikat'] = $predikat;	
			}	else
			{			
				$data['proses_nilai'] = substr(implode(',',$nilai),0);
				$data['p_benar'] = count(array_keys($nilai, "1"));
				$data['p_salah'] = count(array_keys($nilai, "0"));
				$data['p_kosong'] = count(array_keys($nilai, "9"));
				$benar = count(array_keys($nilai, "1"));
				$salah  = count(array_keys($nilai, "0"));
				$kosong  = count(array_keys($nilai, "9"));				
				
				if($skala==0) {		
					$data['p_nilai'] = ($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong));
				} else
				{					
					$data['p_nilai'] = (((($benar*$s_benar)+(($salah*$s_salah)+($kosong*$s_kosong)))/$jml_soal)*$skala)/$s_benar;
				}				
				$data['k13'] = +$benar/$jml_soal * 3+1;
				$k13 = round(+$benar/$jml_soal * 3+1, 2); 
				if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
				elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
				elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
				elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
				elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
				elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
				elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
				elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
				elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
				elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
				$data['predikat'] = $predikat;				
			}
			$data['jrx'] = implode(',',$jrx);
			$data['cek'] = 0;
			$data['hasil_jawaban']=$jk;
			$data['sisa_waktu']=$ws/60;
			$this->model4->update_jawaban1($no_copy,$data);
			$data['hasil'] = $this->model1->proses_all($no_copy, $id_ujian)->row();	
			
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->where('id',$id);
			$jurusan = $this->db->get();
			foreach ($jurusan->result() as $jur) {
				$kode_jurusan1 = $jur->jurusan1;
				$kode_jurusan2 = $jur->jurusan2;
				$kode_jurusan3 = $jur->jurusan3;
			}			
			$data['jurusan1'] = $this->model1->select_by_id_jurusan($kode_jurusan1)->row();	
			$data['jurusan2'] = $this->model1->select_by_id_jurusan($kode_jurusan2)->row();	
			$data['jurusan3'] = $this->model1->select_by_id_jurusan($kode_jurusan3)->row();	
			$data['View_soal'] = $this->model1->tampil($id_ujian)->result();
			
			/* if ($this->input->post('my')<($this->input->post('cmy')-1))
				{
				$this->load->view('view56', $data);		
				}
			*/
			if ($this->input->post('hs') == 1)
			{ $this->load->view('view4', $data); } else
			{ $this->load->view('view50', $data); }
			
		}		
		
		public function hasil_jawaban_e()
		{
			$no_copy = $this->input->post('nc');
			$jk = $this->input->post('jk');
			$ws = $this->input->post('ws');
		    
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			$query=$this->db->get ();
			$record=$query->row();		
			$id_ujian = $this->input->post('idu');
			$id = $this->input->post('id');
            $jml_soal = $record->jml_soal;
			$s_benar = $record->benar;
			$s_salah = $record->salah;
			$s_kosong = $record->kosong;
			$skala = $record->skala;
			$mapel1 = $record->mapel1;
			$mapel2 = $record->mapel2;
			$mapel3 = $record->mapel3;
			$mapel4 = $record->mapel4;
			$mapel5 = $record->mapel5;
			$mapel6 = $record->mapel6;
			$mapel7 = $record->mapel7;
			$mapel8 = $record->mapel8;
			$mapel9 = $record->mapel9;
			$mapel10 = $record->mapel10;
			$jml_mapel1 = $record->jml_mapel1;
			$jml_mapel2 = $record->jml_mapel2;
			$jml_mapel3 = $record->jml_mapel3;
			$jml_mapel4 = $record->jml_mapel4;
			$jml_mapel5 = $record->jml_mapel5;
			$jml_mapel6 = $record->jml_mapel6;
			$jml_mapel7 = $record->jml_mapel7;
			$jml_mapel8 = $record->jml_mapel8;
			$jml_mapel9 = $record->jml_mapel9;
			$jml_mapel10 = $record->jml_mapel10;
			$mapel = $record->multi;
			$jumlah_mapel = $record->jumlah_mapel;
			$jrx = explode(',',$record->jrx);
			/*$hasil = explode(',',$record->hasil_jawaban);*/
			$hasil = explode(',',$jk);				 
			
			
				/* $myfile = fopen('uploads/'.$record->nama.'_'.$no_copy.'.txt', "w") or die("Unable to open file!");
				$txt = 'Jawaban: '.json_encode($record->hasil_jawaban).' No Copy: '.json_encode($record->no_copy).' Id: '.json_encode($record->id).' Id Kelas: '.json_encode($record->id_kelas).' Id Ujian: '.json_encode($record->id_ujian).' No Soal: '.json_encode($record->no_soal).' Kunci: '.json_encode($record->jrx).' Nama Kelas: '.json_encode($record->nama_kelas).' Nama: '.json_encode($record->nama).' Nama Ujian: '.json_encode($record->nama_ujian).' Jumlah Soal: '.json_encode($record->jml_soal).' Sisa Waktu: '.json_encode($record->sisa_waktu).' Benar: '.json_encode($record->benar).' Salah: '.json_encode($record->salah).' Kosong: '.json_encode($record->kosong).' Skala: '.json_encode($record->skala).' Mapel 1: '.json_encode($record->mapel1).' Jml Soal 1: '.json_encode($record->jml_mapel1).' Mapel 2: '.json_encode($record->mapel2).' Jml Soal 2: '.json_encode($record->jml_mapel2).' Mapel 3: '.json_encode($record->mapel3).' Jml Soal 3: '.json_encode($record->jml_mapel3).' Mapel 4: '.json_encode($record->mapel4).' Jml Soal 4: '.json_encode($record->jml_mapel4).' Mapel 5: '.json_encode($record->mapel5).' Jml Soal 5: '.json_encode($record->jml_mapel5).' Mapel 6: '.json_encode($record->mapel6).' Jml Soal 6: '.json_encode($record->jml_mapel6).' Mapel 7: '.json_encode($record->mapel7).' Jml Soal 7: '.json_encode($record->jml_mapel7).' Mapel 8: '.json_encode($record->mapel8).' Jml Soal 8: '.json_encode($record->jml_mapel8).' Mapel 9: '.json_encode($record->mapel9).' Jml Soal 9: '.json_encode($record->jml_mapel9).' Mapel 10: '.json_encode($record->mapel10).' Jml Soal 10: '.json_encode($record->jml_mapel10).' Multi : '.json_encode($record->multi).' Jml Soal : '.json_encode($record->jumlah_mapel).' Tgl Ujian: '.json_encode($record->tgl_ujian).' Nopes: '.json_encode($record->no_peserta).' Sekolah: '.json_encode($record->sekolah).' Jawaban Backup: '.json_encode($record->hasil_jawaban1);
				fwrite($myfile, $txt);
				fclose($myfile);
				*/
			
			
			$data['cek'] = 0;
			$data['hasil_jawaban']=$jk;
			$data['sisa_waktu']=$ws/60;
			$this->model4->update_jawaban1($no_copy,$data);
			$data['hasil'] = $this->model1->proses_all($no_copy, $id_ujian)->row();	
			
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->where('id',$id);
			$jurusan = $this->db->get();
			foreach ($jurusan->result() as $jur) {
				$kode_jurusan1 = $jur->jurusan1;
				$kode_jurusan2 = $jur->jurusan2;
				$kode_jurusan3 = $jur->jurusan3;
			}			
			$data['jurusan1'] = $this->model1->select_by_id_jurusan($kode_jurusan1)->row();	
			$data['jurusan2'] = $this->model1->select_by_id_jurusan($kode_jurusan2)->row();	
			$data['jurusan3'] = $this->model1->select_by_id_jurusan($kode_jurusan3)->row();	
			$data['View_soal'] = $this->model1->tampil($id_ujian)->result();
			
			/* if ($this->input->post('my')<($this->input->post('cmy')-1))
				{
				$this->load->view('view56', $data);		
				}
			*/
			$this->load->view('view50', $data);
			
		}
		
		public function hasil_ujian()
		{
			$id = $this->session->userdata('user_id');
			$id_ujian = $this->input->post('id_ujian');
			$data['hasil'] = $this->model4->proses_all($id, $id_ujian)->result();
			$data['View_soal'] = $this->model4->tampil($id_ujian)->result();
			$this->load->view('view4', $data);		
		}
		
		public function list_ujian()
		{ 
			$kelas = $this->session->userdata('kelas');
			$data['daftarujian'] = $this->model4->select_all_ujian($kelas)->result();
			$this->load->view('view11', $data);
		}
		
		public function select_all_soal()
		{
			$soal = $this->session->userdata('kelas');
			$data['daftarujian'] = $this->model4->select_all_ujian($kelas)->result();
			$this->load->view('view11', $data);	
		}
		
		public function hasil_jawaban1()
		{   	
			
			$data['sekolah'] = $this->input->post('sek');
			$data['no_copy'] = $this->input->post('nc');
			$no_copy = $this->input->post('nc');
			$data['utbk'] = $this->input->post('utbk');
			$data['utbks'] = $this->input->post('utbks');
			$data['my2'] = $this->input->post('rj');
			$data['w1'] = $this->input->post('w1');
			$data['w2'] = $this->input->post('w2');
			$data['w3'] = $this->input->post('w3');
			$data['w4'] = $this->input->post('w4');
			$data['w5'] = $this->input->post('w5');
			$data['w6'] = $this->input->post('w6');
			$data['w7'] = $this->input->post('w7');
			$data['w8'] = $this->input->post('w8');
			$data['w9'] = $this->input->post('w9');
			$data['w10'] = $this->input->post('w10');
			$data['jur1'] = $this->input->post('jur1');
			$data['jur2'] = $this->input->post('jur2');
			$data['jur3'] = $this->input->post('jur3');
			$data['snl1'] = $this->input->post('snl1');
			$data['snl2'] = $this->input->post('snl2');
			$data['snl3'] = $this->input->post('snl3');
			$data['id_fdr'] = $this->input->post('idf');
			$data['id_ujian'] = $this->input->post('idu');
			$id_ujian = $this->input->post('idu');
			
			$userdata = array(
			'no_copy'  =>  $this->input->post('nc'),
			'jr'.$id_ujian  =>  $this->input->post('jr'),
			'tw'.$id_ujian  =>  $this->input->post('tw'),
			'tb'.$id_ujian  =>  $this->input->post('tb'),
			'hs'.$id_ujian  =>  $this->input->post('hs'),
			'ct'.$id_ujian  =>  $this->input->post('ct'),
			'wt'.$id_ujian  =>  $this->input->post('wt'),
			'ju'.$id_ujian  =>  $this->input->post('ju'),
			'w1'.$id_ujian  =>  $this->input->post('w1'),
			'w2'.$id_ujian  =>  $this->input->post('w2'),
			'w3'.$id_ujian  =>  $this->input->post('w3'),
			'w4'.$id_ujian  =>  $this->input->post('w4'),
			'w5'.$id_ujian  =>  $this->input->post('w5'),
			'w6'.$id_ujian  =>  $this->input->post('w6'),
			'w7'.$id_ujian  =>  $this->input->post('w7'),
			'w8'.$id_ujian  =>  $this->input->post('w8'),
			'w9'.$id_ujian  =>  $this->input->post('w9'),
			'w10'.$id_ujian  =>  $this->input->post('w10'),
			);
			$this->session->set_userdata($userdata);
			setcookie('wt'.$id_ujian, $this->input->post('wt'), time() + (7200), "/");
			$data['benar'] = $this->input->post('be');
			$data['salah'] = $this->input->post('sa');
			$data['kosong'] = $this->input->post('ko');
			$data['skala'] = $this->input->post('sk');	
			$data['sisa_waktu'] = $this->input->post('sw');			
			$data['id'] = $this->input->post('id');
			$data['id_kelas'] = $this->input->post('idk');
						
			$data['nama'] = $this->input->post('nm');
			$data['nama_kelas'] = $this->input->post('nk');
			$data['nama_ujian'] = $this->input->post('nu');
			$data['jml_soal'] = $this->input->post('js');
			$data['multi'] = $this->input->post('mt');
			$data['jumlah_mapel'] = $this->input->post('jm');
			$data['mapel1'] = $this->input->post('m1');
			$data['mapel2'] = $this->input->post('m2');
			$data['mapel3'] = $this->input->post('m3');
			$data['mapel4'] = $this->input->post('m4');
			$data['mapel5'] = $this->input->post('m5');
			$data['mapel6'] = $this->input->post('m6');
			$data['mapel7'] = $this->input->post('m7');
			$data['mapel8'] = $this->input->post('m8');
			$data['mapel9'] = $this->input->post('m9');
			$data['mapel10'] = $this->input->post('m10');
			$data['jml_mapel1'] = $this->input->post('jm1');
			$data['jml_mapel2'] = $this->input->post('jm2');
			$data['jml_mapel3'] = $this->input->post('jm3');
			$data['jml_mapel4'] = $this->input->post('jm4');
			$data['jml_mapel5'] = $this->input->post('jm5');
			$data['jml_mapel6'] = $this->input->post('jm6');
			$data['jml_mapel7'] = $this->input->post('jm7');
			$data['jml_mapel8'] = $this->input->post('jm8');
			$data['jml_mapel9'] = $this->input->post('jm9');
			$data['jml_mapel10'] = $this->input->post('jm10');
			$data['cek'] = 1;
			$data['ip']=$_SERVER['REMOTE_ADDR'];
			$data['no_peserta'] = $this->input->post('np');
			
			$date = new DateTime();
			$data['tgl_ujian'] = date_format($date, 'Y-m-d H:i:s');
			
			$jsoal = $this->input->post('js');
			
			$query = $this->db->get("ujian");
			$query = $this->db->get_where('ujian', array('id_ujian' => $id_ujian));
			$qrow = $query->result();
			$row = $qrow[0];
			$jumlah_soal = $row->jumlah_soal;
			$data['nama_ujian'] = $row->nama_ujian;
			
			$posting = $this->model4->show_soal_siswa($id_ujian,$jumlah_soal)->result();
			foreach($posting as $key => $row)
			{	
				$idsoal[] = $row->id_soal;
			}
			$js = count($idsoal);
			
			if (count($row->id_soal) <1)
			{
				$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
				alert-success">Soal ujian '.$row->nama_ujian.' belum tersedia. Silakan menghubungi Admin.</div>');
				redirect(site_url('daftarujian'));		
			}
			
			else if ($js<>$jumlah_soal)
			{
				$this->session->set_flashdata('pesan1','<div style="color:red;padding:10px 0px;background:#FFFFCB;margin-top:20px;" class="alert
				alert-success">Jumlah soal yang ditampilkan tidak sesuai. Silakan menghubungi Admin.</div>');
				redirect(site_url('daftarujian'));
			}
			
			else
			{
				if ($this->input->post('nosoal')==''){
				$data['no_soal'] = substr(implode(',',$idsoal),0);
				} else {
				$data['no_soal'] = $this->input->post('nosoal');
				}
				
				
				$id_soal = substr(implode(',',$idsoal),0);		
				$this->db->select('*');
				$this->db->from('soal');
				$this->db->where_in('id_soal',$idsoal);
				$this -> db -> order_by('FIELD(id_soal, '.$id_soal.' )');
				$query = $this->db->get ();
				
				$i = 1;
				foreach ($query->result() as $row){
					$jrx[$i] = $row->jrx;
					$i++; 
				}			
	
				/*
					$data['my2'] = $this->input->post('my2');
					$data['my1'] = $this->input->post('my1');
					$data['my'] = $this->input->post('my');
				*/
				
				$tipe = $this->input->post('tipe');
				$utbk = $this->input->post('utbk');
				if($tipe==0) 
				{
					$data['hasil_jawaban'] = $this->input->post('kja');	
					$this->model4->update_jawaban($data);				
					$data2['posting'] = $this->model1->proses_all1($no_copy)->row();
					
					if ($utbk == 1)
					{
					$this->load->view('view24u', $data2);
					} else
					{
					$this->load->view('view24', $data2);
					}
				} else
				{
					$data['hasil_jawaban'] = $this->input->post('kja');	
					$kja1 = str_replace("K",0,$this->input->post('kja'));
					$data['proses_nilai'] = $kja1;
					$this->model4->update_jawaban($data);				
					$data2['posting'] = $this->model1->proses_all1($no_copy)->row();
					$this->load->view('view24e', $data2);			
				}
			}
		}
		
		public function hasil_jawaban2()
		{
			$jk = $this->input->post('jk');	
			$no_copy = $this->input->post('nc');
			$data1['utbks'] = $this->input->post('utbks')+1;
			$data1['hasil_jawaban']=$jk;
			$this->model4->update_jawaban1($no_copy, $data1);	
			$data['posting'] = $this->model1->proses_all1($no_copy)->row();
			$this->load->view('view24u', $data);	
	
		}	
		
		public function lanjutujian()
		{	
			$no_copy = $this->uri->segment(2);						
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			$query=$this->db->get ();
			$record=$query->row();
			
			$this->db->select('*');
			$this->db->from('setting');
			$query3 = $this->db->get ();												
			$qrow3 = $query3->result();
			$row3 = $qrow3[0];
			$ipp = $row3->ipp;
			
			
			$ip1=$_SERVER['REMOTE_ADDR'];
			$ip2=$record->ip;	
			
			$utbk = $this->input->post('utbk');
			
			if ($ipp=="1")
			{
				if ($ip1==$ip2)
				{				
					$data['posting'] = $this->model1->proses_all1($no_copy)->row();
						if ($utbk == 1)
					{
						$this->load->view('view24u', $data);	
					} else
					{
						$this->load->view('view24', $data);	;
					}	
				}			
				else
				{				
					redirect(site_url('logout'));
				}	
			}
			else
			{
				$data['posting'] = $this->model1->proses_all1($no_copy)->row();
					if ($utbk == 1)
					{
						$this->load->view('view24u', $data);	
					} else
					{
						$this->load->view('view24', $data);	;
					}
			}
			
		}
		
		public function lanjutujian_e()
		{	
			$no_copy = $this->uri->segment(2);						
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			$query=$this->db->get ();
			$record=$query->row();
			
			$this->db->select('*');
			$this->db->from('setting');
			$query3 = $this->db->get ();												
			$qrow3 = $query3->result();
			$row3 = $qrow3[0];
			$ipp = $row3->ipp;
			
			
			$ip1=$_SERVER['REMOTE_ADDR'];
			$ip2=$record->ip;	
			
			if ($ipp=="1")
			{
				if ($ip1==$ip2)
				{				
					$data['posting'] = $this->model1->proses_all1($no_copy)->row();
					$this->load->view('view24e', $data);		
				}			
				else
				{				
					redirect(site_url('logout'));
				}	
			}
			else
			{
				$data['posting'] = $this->model1->proses_all1($no_copy)->row();
				$this->load->view('view24e', $data);
			}
			
		}
		
				public function lanjutujian_u()
		{	
			$no_copy = $this->uri->segment(2);						
			$this->db->select('*');
			$this->db->from('proses');
			$this->db->where('no_copy',$no_copy);
			$query=$this->db->get ();
			$record=$query->row();
			
			$this->db->select('*');
			$this->db->from('setting');
			$query3 = $this->db->get ();												
			$qrow3 = $query3->result();
			$row3 = $qrow3[0];
			$ipp = $row3->ipp;
			
			
			$ip1=$_SERVER['REMOTE_ADDR'];
			$ip2=$record->ip;	
			
			if ($ipp=="1")
			{
				if ($ip1==$ip2)
				{				
					$data['posting'] = $this->model1->proses_all1($no_copy)->row();
					$this->load->view('view24u', $data);		
				}			
				else
				{				
					redirect(site_url('logout'));
				}	
			}
			else
			{
				$data['posting'] = $this->model1->proses_all1($no_copy)->row();
				$this->load->view('view24u', $data);
			}
			
		}
		
		public function update_proses(){
			$no_copy = $this->input->post('no_copy');
			$data['hasil_jawaban'] = substr(implode(',',$this->input->post('jawaban')),0);
			$this->model4->update_jawaban1($no_copy, $data);			
			$data['posting'] = $this->model1->proses_all1($no_copy)->row();
			$utbk = $this->input->post('utbk');
				if ($utbk == 1)
					{
						$this->load->view('view24u', $data);	
					} else
					{
						$this->load->view('view24', $data);	;
					}
		}		
	}	
	
