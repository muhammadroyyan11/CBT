<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>


<?php	
	if(isset($_SESSION['user_id'])){ //jika variabel berisi id_user
	?>
	<?php include 'view7.php';?>
	
	
	
	
	<?php 
		
		$this->db->select('*');
		$this->db->from('proses');
		$this->db->where_in('no_copy',$posting->no_copy);
		$query1 = $this->db->get ();												
		$qrows1 = $query1->result();
		$rows1 = $qrows1[0];
		$cek = $rows1->cek;
		
		/*
			$array1 = explode(',',$rows1->my2);
			$cmy = count($array1);
		*/
		
		if($cek==0)
		{?>
		<div class="wrapper">	
			<div class="container">
				<div class="row" >
					<div class="col-md-2" >
						<?php include 'view42.php'; ?>
					</div>
					
					
					<div class="container">	
						<div class="row" >
							<div class="col-md-6" >
								<div class="panel panel-default">
									
									<div class="panel-body">
										Selamat Anda telah berhasil menyelesaikan soal-soal ujian.<br/>Jawaban Ujian Anda telah terkirim ke server.<br/><br/>
										
										<a class="btn btn-warning btn-sm" href="<?php echo site_url('homesiswa')?>">Ke Menu Utama
										</a>
										
										<a class="btn btn-danger btn-sm" href="<?php echo site_url('logout')?>">Logout
										</a>
									</div>
								</div>	
							</div>
							<div class="col-md-6" ></div>
						</div>	
					</div>
				</div>	
			</div>	
		</div>
		<?php 	} else
		{ 
			$idu = $posting->id_ujian;
			if ( $posting->ijin == 1 or isset($_COOKIE["wt".$idu]) ) {
				$this->db->select('*');
				$this->db->from('ujian');
				$this->db->where_in('id_ujian',$idu);
				$query = $this->db->get ();												
				$qrows = $query->result();
				$rows = $qrows[0];
				
				$userdata = array(
				'jr'.$idu  =>  $rows->jr,
				'tw'.$idu  =>  $rows->tombolwaktu,
				'tb'.$idu  =>  $rows->tombol,
				'hs'.$idu  =>  $rows->hasil,
				'ct'.$idu  =>  $rows->catatan,
				'wt'.$idu  =>  $rows->waktu,
				'ju'.$idu  =>  $rows->jam_ujian,
				'w1'.$idu  =>  $rows->w1,
				'w2'.$idu  =>  $rows->w2,
				'w3'.$idu  =>  $rows->w3,
				'w4'.$idu  =>  $rows->w4,
				'w5'.$idu  =>  $rows->w5,
				'w6'.$idu  =>  $rows->w6,
				'w7'.$idu  =>  $rows->w7,
				'w8'.$idu  =>  $rows->w8,
				'w9'.$idu  =>  $rows->w9,
				'w10'.$idu  => $rows->w10,
				);
				$this->session->set_userdata($userdata);
			}
			
			if ($this->session->has_userdata('wt'.$idu)) { ?>
			
			<style>
				
				.b
				{
				background-color:#B39B59;
				border: 0px;
				cursor:pointer;
				color:#ffffff;
				font-size:14px;
				width: 25px;
				height: 25px;
				margin-bottom:3px;
				text-decoration:none;
				font-family: 'BebasNeueRegular';
				}
				
				.b:hover 
				{
				background-color:#A3C2CC;
				}
				
				.b:active 
				{
				position:relative;
				top:1px;
				background-color:#A3C2CC;		
				}
				
				.e {
				background-color:#B39B59;
				border: 0px;
				cursor:pointer;
				color:#ffffff;
				font-size:14px;
				width: 25px;
				padding: 3px 0px;
				margin-bottom:3px;
				text-decoration:none;
				font-family: 'BebasNeueRegular';		
				}
				
				.e:hover 
				{
				background-color:#A3C2CC;		
				}
				
				.e:active 
				{
				position:relative;
				top:1px;
				background-color:#A3C2CC;	
				}
				
				.active
				{
				background-color:#A3C2CC;		
				}
				
				.sw 
				{
				font-size:24px;
				border:1px solid #fff;	
				}
				
				.pad 
				{
				padding-left:10px;
				}
				
				@media (max-width:768px) 
				{
				.pad 
				{
				padding-left:0px;
				}
				
				.sw 
				{
				font-size:16px;
				font-weight:bold;
				border:1px solid #fff;
				
				}
				}
				
				
			</style>
			
			<?php 
				
				$jr = $this->session->userdata('jr'.$idu);	
				
				
				$no_copy = $posting->no_copy;
				
				$proses_soal = $posting->no_soal;
				$ts = explode(',',$proses_soal);
				
				$z = $posting->utbks;
				$z1 = 'mapel'.$z;
				$z2 = 'jml_mapel'.$z;
				$z3 = 'w'.($z);	
				
				$mapel = $posting->$z1;
				$jml_mapel = $posting->$z2;	
				
				
				
				$w1 = $this->session->userdata('w1'.$idu);
				$w2 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu);
				$w3 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu);
				$w4 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu)+$this->session->userdata('w4'.$idu);
				$w5 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu)+$this->session->userdata('w4'.$idu)+$this->session->userdata('w5'.$idu);
				$w6 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu)+$this->session->userdata('w4'.$idu)+$this->session->userdata('w5'.$idu)+$this->session->userdata('w6'.$idu);
				$w7 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu)+$this->session->userdata('w4'.$idu)+$this->session->userdata('w5'.$idu)+$this->session->userdata('w6'.$idu)+$this->session->userdata('w7'.$idu);
				$w8 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu)+$this->session->userdata('w4'.$idu)+$this->session->userdata('w5'.$idu)+$this->session->userdata('w6'.$idu)+$this->session->userdata('w7'.$idu)+$this->session->userdata('w8'.$idu);
				$w9 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu)+$this->session->userdata('w4'.$idu)+$this->session->userdata('w5'.$idu)+$this->session->userdata('w6'.$idu)+$this->session->userdata('w7'.$idu)+$this->session->userdata('w8'.$idu)+$this->session->userdata('w9'.$idu);
				$w10 = $this->session->userdata('w1'.$idu)+$this->session->userdata('w2'.$idu)+$this->session->userdata('w3'.$idu)+$this->session->userdata('w4'.$idu)+$this->session->userdata('w5'.$idu)+$this->session->userdata('w6'.$idu)+$this->session->userdata('w7'.$idu)+$this->session->userdata('w8'.$idu)+$this->session->userdata('w9'.$idu)+$this->session->userdata('w10'.$idu);
				
				$tgl_now = date('M d, Y');
				$timesplit=explode(':',$this->session->userdata('ju'.$idu));
				$det=($timesplit[0]*60*60)+($timesplit[1]*60);
				
				if (file_exists("../cbt/data/d".$no_copy."_".date("dmY").".txt"))
				{
					$file = "../cbt/data/d".$no_copy."_".date("dmY").".txt";
					$lines = file($file, FILE_IGNORE_NEW_LINES);
					$hasil_jawaban = $lines[0];
				}
				else if (!isset($_COOKIE["jwbc".$no_copy])) {
					$hasil_jawaban = $posting->hasil_jawaban;			
					} else {
					$hasil_jawaban = $_COOKIE["jwbc".$posting->no_copy];	
				}
				
				if($z==1){$awalsoal=0; $jam = $det + $w1*60;}
				elseif($z==2){
				$awalsoal=0+$posting->jml_mapel1; $jam = $det + $w2*60;}
				elseif($z==3){$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2; $jam = $det + $w3*60;}
				elseif($z==4){$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2+$posting->jml_mapel3; $jam = $det + $w4*60;}
				elseif($z==5){$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2+$posting->jml_mapel3+$posting->jml_mapel4; $jam = $det + $w5*60;}
				elseif($z==6){$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2+$posting->jml_mapel3+$posting->jml_mapel4+$posting->jml_mapel5; $jam = $det + $w6*60;}
				elseif($z==7){$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2+$posting->jml_mapel3+$posting->jml_mapel4+$posting->jml_mapel5+$posting->jml_mapel6; $jam = $det + $w7*60;}
				elseif($z==8){$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2+$posting->jml_mapel3+$posting->jml_mapel4+$posting->jml_mapel5+$posting->jml_mapel6+$posting->jml_mapel7; $jam = $det + $w8*60;}
				elseif($z==9){$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2+$posting->jml_mapel3+$posting->jml_mapel4+$posting->jml_mapel5+$posting->jml_mapel6+$posting->jml_mapel7+$posting->jml_mapel8; $jam = $det + $w9*60;}
				else{$awalsoal=0+$posting->jml_mapel1+$posting->jml_mapel2+$posting->jml_mapel3+$posting->jml_mapel4+$posting->jml_mapel5+$posting->jml_mapel6+$posting->jml_mapel7+$posting->jml_mapel8+$posting->jml_mapel9; $jam = $det + $w10*60;}
				
				$sw = $tgl_now.gmdate(' H:i:s',$jam);
				
				$tampil_soal =  array_slice($ts,$awalsoal,$jml_mapel);
				$jml_soal = count($tampil_soal);
				
				$jwb = explode(',',$hasil_jawaban);
				$this->db->select('*');
				$this->db->from('soal');
				$this->db->where_in('id_soal',$tampil_soal);
				$this -> db -> order_by('FIELD(id_soal, '.$proses_soal.' )');
				$query = $this->db->get ();
				
				$i = 1+$awalsoal;
				$j = 1+$awalsoal;
				$k = 1+$awalsoal;
				$item = array();
				
				$num = $jml_mapel/1;			
				
				if(is_float($num)) {
					$b = $num+1+$awalsoal;
					$c = $num+1+$awalsoal;
					} else {
					$b = $num+$awalsoal;
					$c = $num+$awalsoal;	
					
				}	
				
				
				
			?>
			
			<nav class="navbar-fixed-top" style="background:#333;">
				
				<div class="container" style=" margin: 0px auto 0px auto;max-width:1140px;position: relative;padding:0px 30px 10px 30px">	
					<div class="row" >
						<div class="col-md-12" style="color:#fff;">
							<table width="100%">
								<tr>
									<td style="padding-top:10px;width:5%">
										<button class="btn btn-success btn-sm" id="ref_butn" style="width:70px;margin:5px 0;">Refresh</button>
									</td>
									<td style="text-align:center;width:65%"></td>
									<td style="text-align:center;width:30%">
										<span style="font-size:10px;">Sisa Waktu</span><br/>
									<div id="time" class="sw"></div></td></tr></table></div></div></div>
			</nav>
			<div class="clear"></div>
			<div class="wrapper1" style="margin-top:60px;">	
				<div class="container">	
					<div class="row" >
						
						<div class="col-md-5">
							<div class="panel panel-default">
								<div class="panel-heading" style="background:#28A9E3;color:#fff;">DATA PESERTA UJIAN</div>
								<div class="panel-body text-left">
									<table>
										
										
										<tr><td style="width:130px;"><strong>Nama</td><td width="20px">:</strong></td><td><?php echo $posting->nama; ?></td></tr>
										<tr><td style="width:130px;"><strong>No Peserta</td><td width="20px">:</strong></td><td><?php echo $posting->no_peserta; ?></td></tr>
										<tr><td style="width:130px;"><strong>Mata Pelajaran</td><td width="20px">:</strong></td><td><?php echo $posting->$z1.' ( '.$posting->nama_ujian.' )'; ?></td></tr>
										<tr><td style="width:130px;"><strong>Kelas</td><td width="20px">:</strong></td><td><?php echo $posting->nama_kelas; ?></td></tr>
										<tr><td style="width:130px;"><strong>Asal Sekolah</td><td width="20px">:</strong></td><td><?php echo $this->session->userdata('sekolah'); ?></td></tr>
										<tr><td style="width:130px;"><strong>Catatan</td><td width="20px">:</strong></td><td><?php echo $this->session->userdata('ct'.$idu); ?>
											
										</td></tr>
									</table>	
								</div></div></div>
								<div class="col-md-1"></div>
								<div class="col-md-6">
									
									
									
									<?php if($posting->jumlah_mapel==$posting->utbks)
										{ ?>
										<form id="kirim" action="<?php echo site_url('selesai');?>" method="POST">
											<?php } else
											{ ?>
											<form id="kirim" action="<?php echo site_url('selesai2');?>" method="POST">	
												<?php }
											?>
											
											<input type="hidden" name="nc" value="<?php echo $this->session->userdata('user_id').$this->session->userdata('kelas').$posting->id_ujian;?>">		
											<input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id'); ?>">
											<input type="hidden" name="idu" value="<?php echo $posting->id_ujian; ?>">
											<input type="hidden" name="hs" value="<?php echo $this->session->userdata('hs'.$idu); ?>">
											<?php /*
												<input type="hidden" name="my" value="<?php echo $rows1->my; ?>">
												<input type="hidden" name="cmy" value="<?php echo $cmy; ?>">
												<input type="hidden" name="waktu" value="<?php echo $w; ?>"> 
											*/ ?>
											<input type="hidden" name="utbks" value="<?php echo $posting->utbks; ?>"> 
											
											<input type="hidden" name="jk" id="jk">		
											<input type="hidden" name="ws" id="ws">
											<input type="hidden" name="dtk" id="dtk">
										</form>
										
										
									</div>						
								</div>
					</div>
					<div class="clear"></div>
					
					<div class="container">	
						<div class="row" >
							<div class="col-md-2" >
								
								<div class="panel panel-default">
									<div class="panel-heading" style="background:#28A9E3;color:#fff;">NO SOAL</div>
									<div class="panel-body text-left">
										<?php
											echo '<div style="background:#FFDD7F;padding:8px 8px 5px 8px">';
											$nomor=array();
											
											for ($a=1+$awalsoal;$a<=($b);$a++) {
												if ($jwb[$a-1]<>'K') { 
												?>	
												<button class="e" style="background-color:#A3C2CC;" id="e<?php echo $a; ?>" onclick="clicked(this);"><?php echo $a; ?></button>
												<?php				
													array_push($nomor,$a);	
												}
												else	
												{	
												?>
												<button class="e" id="e<?php echo $a; ?>" onclick="clicked(this);"><?php echo $a; ?></button>			
												<?php }
											}
										?>		
									</div>
								</div>
							</div>			
						</div>
						
						<div class="col-md-10 pad">
							<div class="panel panel-default">
								<div class="panel-heading" style="background:#28A9E3;color:#fff;">SOAL UJIAN</div>
								<div class="panel-body">
									<div class="tampildata"></div>
									<table width="100%" border="0" cellspacing="0">
										<tr>
											<td>
												
												<div class="soals1" style="padding:20px">
													
													<?php
														foreach (array_chunk($query->result(), 1, true) as $array)
														
														{
															
															echo '<section id="section'.$j.'" class="hideme">';
															
															
															foreach($array as $key => $row)
															
															{												
																$idsoal = $row->id_soal;
																$soal = $row->soal;
																
																if($jr == 1)
																{
																	
																	$pe = $row->pil_e;
																	
																	$o = $posting->my2;
																	if (empty($pe)) 
																	{
																		if ($o == 1) 
																		{
																			$pil_a = $row->pil_a;
																			$pil_b = $row->pil_b;
																			$pil_c = $row->pil_c;
																			$pil_d = $row->pil_d;
																			$pil_e = $row->pil_e;
																			
																			$aj = "A";
																			$bj = "B";
																			$cj = "C";
																			$dj = "D";
																			$ej = "E";
																			
																		} else if ($o == 2) 
																		{
																			$pil_a = $row->pil_b;
																			$pil_b = $row->pil_c;
																			$pil_c = $row->pil_d;
																			$pil_d = $row->pil_a;
																			$pil_e = $row->pil_e;
																			
																			$aj = "B";
																			$bj = "C";
																			$cj = "D";
																			$dj = "A";
																			$ej = "E";
																			
																		}
																		else if ($o == 3) 
																		{
																			$pil_a = $row->pil_c;
																			$pil_b = $row->pil_d;
																			$pil_c = $row->pil_a;
																			$pil_d = $row->pil_b;
																			$pil_e = $row->pil_e;
																			
																			$aj = "C";
																			$bj = "D";
																			$cj = "A";
																			$dj = "B";
																			$ej = "E";
																			
																		}
																		else if ($o == 4) 
																		{
																			$pil_a = $row->pil_d;
																			$pil_b = $row->pil_a;
																			$pil_c = $row->pil_b;
																			$pil_d = $row->pil_c;
																			$pil_e = $row->pil_e;
																			
																			$aj = "D";
																			$bj = "A";
																			$cj = "B";
																			$dj = "C";
																			$ej = "E";
																			
																		}
																		else if ($o == 5) 
																		{
																			$pil_a = $row->pil_b;
																			$pil_b = $row->pil_d;
																			$pil_c = $row->pil_a;
																			$pil_d = $row->pil_c;
																			$pil_e = $row->pil_e;
																			
																			$aj = "B";
																			$bj = "D";
																			$cj = "A";
																			$dj = "C";
																			$ej = "E";
																			
																		}
																		else if ($o == 6) 
																		{
																			$pil_a = $row->pil_d;
																			$pil_b = $row->pil_c;
																			$pil_c = $row->pil_b;
																			$pil_d = $row->pil_a;
																			$pil_e = $row->pil_e;
																			
																			$aj = "D";
																			$bj = "C";
																			$cj = "B";
																			$dj = "A";
																			$ej = "E";
																			
																		}
																		else if ($o == 7) 
																		{
																			$pil_a = $row->pil_c;
																			$pil_b = $row->pil_a;
																			$pil_c = $row->pil_d;
																			$pil_d = $row->pil_b;
																			$pil_e = $row->pil_e;
																			
																			$aj = "C";
																			$bj = "A";
																			$cj = "D";
																			$dj = "B";
																			$ej = "E";
																			
																		}
																		
																		else if ($o == 8) 
																		{
																			$pil_a = $row->pil_c;
																			$pil_b = $row->pil_d;
																			$pil_c = $row->pil_b;
																			$pil_d = $row->pil_a;
																			$pil_e = $row->pil_e;
																			
																			$aj = "C";
																			$bj = "D";
																			$cj = "B";
																			$dj = "A";
																			$ej = "E";
																			
																		}
																		else if ($o == 9) 
																		{
																			$pil_a = $row->pil_d;
																			$pil_b = $row->pil_c;
																			$pil_c = $row->pil_a;
																			$pil_d = $row->pil_b;
																			$pil_e = $row->pil_e;
																			
																			$aj = "D";
																			$bj = "C";
																			$cj = "A";
																			$dj = "B";
																			$ej = "E";
																			
																		}
																		else if ($o == 10) 
																		{
																			$pil_a = $row->pil_a;
																			$pil_b = $row->pil_d;
																			$pil_c = $row->pil_b;
																			$pil_d = $row->pil_c;
																			$pil_e = $row->pil_e;
																			
																			$aj = "A";
																			$bj = "D";
																			$cj = "B";
																			$dj = "C";
																			$ej = "E";
																			
																		}
																		
																	} else
																	
																	{
																		
																		if ($o == 1) 
																		{
																			$pil_a = $row->pil_a;
																			$pil_b = $row->pil_b;
																			$pil_c = $row->pil_c;
																			$pil_d = $row->pil_d;
																			$pil_e = $row->pil_e;
																			
																			$aj = "A";
																			$bj = "B";
																			$cj = "C";
																			$dj = "D";
																			$ej = "E";
																		} 
																		else if ($o == 2) 
																		{
																			$pil_a = $row->pil_e;
																			$pil_b = $row->pil_c;
																			$pil_c = $row->pil_d;
																			$pil_d = $row->pil_a;
																			$pil_e = $row->pil_b;
																			
																			$aj = "E";
																			$bj = "C";
																			$cj = "D";
																			$dj = "A";
																			$ej = "B";
																		}
																		else if ($o == 3) 
																		{
																			$pil_a = $row->pil_b;
																			$pil_b = $row->pil_c;
																			$pil_c = $row->pil_d;
																			$pil_d = $row->pil_e;
																			$pil_e = $row->pil_a;
																			
																			$aj = "B";
																			$bj = "C";
																			$cj = "D";
																			$dj = "E";
																			$ej = "A";
																		}
																		else if ($o == 4) 
																		{
																			$pil_a = $row->pil_d;
																			$pil_b = $row->pil_a;
																			$pil_c = $row->pil_e;
																			$pil_d = $row->pil_c;
																			$pil_e = $row->pil_b;
																			
																			$aj = "D";
																			$bj = "A";
																			$cj = "E";
																			$dj = "C";
																			$ej = "B";
																		}
																		else if ($o == 5) 
																		{
																			$pil_a = $row->pil_c;
																			$pil_b = $row->pil_d;
																			$pil_c = $row->pil_e;
																			$pil_d = $row->pil_a;
																			$pil_e = $row->pil_b;
																			
																			$aj = "C";
																			$bj = "D";
																			$cj = "E";
																			$dj = "A";
																			$ej = "B";
																		}
																		else if ($o == 6) 
																		{
																			$pil_a = $row->pil_c;
																			$pil_b = $row->pil_a;
																			$pil_c = $row->pil_b;
																			$pil_d = $row->pil_e;
																			$pil_e = $row->pil_d;
																			
																			$aj = "C";
																			$bj = "A";
																			$cj = "B";
																			$dj = "E";
																			$ej = "D";
																		}
																		else if ($o == 7) 
																		{
																			$pil_a = $row->pil_d;
																			$pil_b = $row->pil_e;
																			$pil_c = $row->pil_a;
																			$pil_d = $row->pil_b;
																			$pil_e = $row->pil_c;
																			
																			$aj = "D";
																			$bj = "E";
																			$cj = "A";
																			$dj = "B";
																			$ej = "C";
																		}
																		else if ($o == 8) 
																		{
																			$pil_a = $row->pil_b;
																			$pil_b = $row->pil_a;
																			$pil_c = $row->pil_e;
																			$pil_d = $row->pil_c;
																			$pil_e = $row->pil_d;
																			
																			$aj = "B";
																			$bj = "A";
																			$cj = "E";
																			$dj = "C";
																			$ej = "D";
																		}
																		else if ($o == 9) 
																		{
																			$pil_a = $row->pil_e;
																			$pil_b = $row->pil_a;
																			$pil_c = $row->pil_b;
																			$pil_d = $row->pil_c;
																			$pil_e = $row->pil_d;
																			
																			$aj = "E";
																			$bj = "A";
																			$cj = "B";
																			$dj = "C";
																			$ej = "D";
																		}
																		else if ($o == 10) 
																		{
																			$pil_a = $row->pil_a;
																			$pil_b = $row->pil_c;
																			$pil_c = $row->pil_e;
																			$pil_d = $row->pil_b;
																			$pil_e = $row->pil_d;
																			
																			$aj = "A";
																			$bj = "C";
																			$cj = "E";
																			$dj = "B";
																			$ej = "D";
																		}
																		
																	}
																}
																else
																{
																	$pil_a = $row->pil_a;
																	$pil_b = $row->pil_b;
																	$pil_c = $row->pil_c;
																	$pil_d = $row->pil_d;
																	$pil_e = $row->pil_e;
																	
																	$aj = "A";
																	$bj = "B";
																	$cj = "C";
																	$dj = "D";
																	$ej = "E";
																}												
																
															?>
															
															<style>
																img {
																max-width: 100%;
																height: auto;
																}
															</style>
															<table width="100%"><tr><td width="3%" valign="top"><?php echo $i.'.'; ?></td><td width="97%" valign="top"><?php echo $soal; ?>
																<input type="hidden" name="ns[<?php echo $i; ?>]" value="<?php echo $idsoal; ?>">
																
															</td></tr>
															<tr><td></td><td><br/>
																<?php 
																	$gbr = $row->mm_soal;
																	if (empty($gbr))  { echo '';
																		
																		
																	}
																	else 
																	{  ?><audio controls>
																		<source src="<?php echo base_url() . 'assets/kcfinder/upload/audio/' . $row->mm_soal; ?>" type="audio/mp3"> 
																		<source src="<?php echo base_url() . 'assets/kcfinder/upload/audio/' . $row->mm_soal; ?>" type="audio/wav">
																		<source src="<?php echo base_url() . 'assets/kcfinder/upload/audio/' . $row->mm_soal; ?>" type="audio/mid">
																	</audio>
																<?php }  ?>
															</td></tr>		
															</table>
															<?php 
																
																if($row->essay==1)
																{
																	if ($jwb[$i-1]=="K")
																	{
																		$jsw = "";
																	}
																	else
																	{	
																		$jsw = str_replace("~",",",$jwb[$i-1]);
																	}
																	echo 'Jawaban singkat : <input style="background:#fff;border:1px solid #ccc;padding:5px;width:100%;color:#535353" id="e'.$i.'" name="ja['.$i.']" type="text" value="'.$jsw.'" onchange="clickes1(this);">';
																}
																else
																{ 
																	
																	if ($jwb[$i-1]== $aj)
																	
																	{
																	echo '<input id="jawaban" name="ja['.$i.']" type="hidden" value="K">'; ?>
																	<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$aj.'" onclick="clickes(this);"  checked><label><span><span></span></span>A.</label>'; ?></div><div class="pilihan2"><?php echo $pil_a;?></div>
																	<div class="clear"></div>
																	<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$bj.'" onclick="clickes(this);" ><label><span><span></span></span>B.</label>'; ?></div><div class="pilihan2"><?php echo $pil_b;?></div>
																	<div class="clear"></div>
																	<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$cj.'" onclick="clickes(this);" ><label><span><span></span></span>C.</label>'; ?></div><div class="pilihan2"><?php echo $pil_c;?></div>
																	<div class="clear"></div>
																	<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$dj.'" onclick="clickes(this);" ><label><span><span></span></span>D.</label>'; ?></div><div class="pilihan2"><?php echo $pil_d;?></div>
																	<div class="clear"></div>
																	<div class="pilihan1">
																		<?php if (empty($pil_e)) { } else {?>
																		<?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$ej.'" onclick="clickes(this);" ><label><span><span></span></span>E.</label>'; ?></div><div class="pilihan2"><?php echo $pil_e; }?></div>
																		
																		
																		<?php }
																		
																		else if ($jwb[$i-1]== $bj)
																		
																		{ 
																		echo '<input id="jawaban" name="ja['.$i.']" type="hidden" value="K">'; ?>
																		<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$aj.'" onclick="clickes(this);"  ><label><span><span></span></span>A.</label>'; ?></div><div class="pilihan2"><?php echo $pil_a;?></div>
																		<div class="clear"></div>
																		<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$bj.'" onclick="clickes(this);"  checked><label><span><span></span></span>B.</label>'; ?></div><div class="pilihan2"><?php echo $pil_b;?></div>
																		<div class="clear"></div>
																		<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$cj.'" onclick="clickes(this);" ><label><span><span></span></span>C.</label>'; ?></div><div class="pilihan2"><?php echo $pil_c;?></div>
																		<div class="clear"></div>
																		<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$dj.'" onclick="clickes(this);" ><label><span><span></span></span>D.</label>'; ?></div><div class="pilihan2"><?php echo $pil_d;?></div>
																		<div class="clear"></div>
																		<div class="pilihan1">
																			<?php if (empty($pil_e)) { } else {?>
																			<?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$ej.'" onclick="clickes(this);" ><label><span><span></span></span>E.</label>'; ?></div><div class="pilihan2"><?php echo $pil_e; }?></div>
																			
																			
																			<?php } 
																			
																			else if ($jwb[$i-1]==$cj)
																			
																			{  
																			echo '<input id="jawaban" name="ja['.$i.']" type="hidden" value="K">'; ?>
																			<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$aj.'" onclick="clickes(this);"  ><label><span><span></span></span>A.</label>'; ?></div><div class="pilihan2"><?php echo $pil_a;?></div>
																			<div class="clear"></div>
																			<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$bj.'" onclick="clickes(this);"  ><label><span><span></span></span>B.</label>'; ?></div><div class="pilihan2"><?php echo $pil_b;?></div>
																			<div class="clear"></div>
																			<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$cj.'" onclick="clickes(this);"  checked><label><span><span></span></span>C.</label>'; ?></div><div class="pilihan2"><?php echo $pil_c;?></div>
																			<div class="clear"></div>
																			<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$dj.'" onclick="clickes(this);" ><label><span><span></span></span>D.</label>'; ?></div><div class="pilihan2"><?php echo $pil_d;?></div>
																			<div class="clear"></div>
																			<div class="pilihan1">
																				<?php if (empty($pil_e)) { } else {?>
																				<?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$ej.'" onclick="clickes(this);" ><label><span><span></span></span>E.</label>'; ?></div><div class="pilihan2"><?php echo $pil_e; }?></div>
																				
																				
																				<?php } 
																				
																				else if ($jwb[$i-1]==$dj)
																				
																				{  
																				echo '<input id="jawaban" name="ja['.$i.']" type="hidden" value="K">'; ?>
																				<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$aj.'" onclick="clickes(this);"  ><label><span><span></span></span>A.</label>'; ?></div><div class="pilihan2"><?php echo $pil_a;?></div>
																				<div class="clear"></div>
																				<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$bj.'" onclick="clickes(this);"  ><label><span><span></span></span>B.</label>'; ?></div><div class="pilihan2"><?php echo $pil_b;?></div>
																				<div class="clear"></div>
																				<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$cj.'" onclick="clickes(this);"  ><label><span><span></span></span>C.</label>'; ?></div><div class="pilihan2"><?php echo $pil_c;?></div>
																				<div class="clear"></div>
																				<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$dj.'" onclick="clickes(this);"  checked><label><span><span></span></span>D.</label>'; ?></div><div class="pilihan2"><?php echo $pil_d;?></div>
																				<div class="clear"></div>
																				<div class="pilihan1">
																					<?php if (empty($pil_e)) { } else {?>
																					<?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$ej.'" onclick="clickes(this);" ><label><span><span></span></span>E.</label>'; ?></div><div class="pilihan2"><?php echo $pil_e; }?></div>
																					
																					
																					<?php } 			
																					
																					else if ($jwb[$i-1]==$ej)
																					
																					{  
																					echo '<input id="jawaban" name="ja['.$i.']" type="hidden" value="K">'; ?>
																					<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$aj.'" onclick="clickes(this);"  ><label><span><span></span></span>A.</label>'; ?></div><div class="pilihan2"><?php echo $pil_a;?></div>
																					<div class="clear"></div>
																					<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$bj.'" onclick="clickes(this);"  ><label><span><span></span></span>B.</label>'; ?></div><div class="pilihan2"><?php echo $pil_b;?></div>
																					<div class="clear"></div>
																					<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$cj.'" onclick="clickes(this);"  ><label><span><span></span></span>C.</label>'; ?></div><div class="pilihan2"><?php echo $pil_c;?></div>
																					<div class="clear"></div>
																					<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$dj.'" onclick="clickes(this);"  ><label><span><span></span></span>D.</label>'; ?></div><div class="pilihan2"><?php echo $pil_d;?></div>
																					<div class="clear"></div>
																					<div class="pilihan1">
																						<?php if (empty($pil_e)) { } else {?>
																						<?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$ej.'" onclick="clickes(this);"  checked><label><span><span></span></span>E.</label>'; ?></div><div class="pilihan2"><?php echo $pil_e; }?></div>
																						<?php }																			
																						else 
																						{  
																						echo '<input id="jawaban" name="ja['.$i.']" type="hidden" value="K">'; ?>
																						<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$aj.'" onclick="clickes(this);"  ><label><span><span></span></span>A.</label>'; ?></div><div class="pilihan2"><?php echo $pil_a;?></div>
																						<div class="clear"></div>
																						<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$bj.'" onclick="clickes(this);"  ><label><span><span></span></span>B.</label>'; ?></div><div class="pilihan2"><?php echo $pil_b;?></div>
																						<div class="clear"></div>
																						<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$cj.'" onclick="clickes(this);"  ><label><span><span></span></span>C.</label>'; ?></div><div class="pilihan2"><?php echo $pil_c;?></div>
																						<div class="clear"></div>
																						<div class="pilihan1"><?php echo '<input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$dj.'" onclick="clickes(this);"  ><label><span><span></span></span>D.</label>'; ?></div><div class="pilihan2"><?php echo $pil_d;?></div>
																						<div class="clear"></div>
																						
																						<?php if (empty($pil_e)) { } else 
																							{ 
																							echo '<div class="pilihan1"><input class="e" id="e'.$i.'" name="ja['.$i.']" type="radio" value="'.$ej.'" onclick="clickes(this);"  ><label><span><span></span></span>E.</label></div><div class="pilihan2">'.$pil_e.'</div>'; ?>
																							
																							<?php 
																							}
																						}
																} 
															?>								
															<div class="clear"></div>
															<br/>
															<hr>
															<div class="col-md-12 text-center">						                                
																<button class="btn btn-success btn-sm" style="margin:5px 0;" onclick="prev();">SEBELUMNYA</button>  <button class="btn btn-success btn-sm" style="margin:5px 0px;" onclick="next();">SELANJUTNYA</button> <button class="btn btn-sm" onclick="raguwarna('e<?php echo $i; ?>'); return false;" style="background:#d9534f;color:#fff;font-weight:bold;margin:5px 0;">RAGU-RAGU</button>
																
															</div>	</div> 
															<div class="clear"></div>
															
															<?php	
																
																$i++; 
															} 
															$j++;
															echo '</section>';
															
													}											
												?>
											</div>
										</td></tr></table>
							</div></div> 
							
					</div>
					<div class="clear"></div>
				</div>	
			</div> 
			
			
			<script language="javascript">	
				var hj = "<?php echo $hasil_jawaban; ?>";
				var alm = '<?php echo base_url()."ajax/update.php";?>';
				var awalan = <?php echo $k; ?>;		
				
				var as = <?php echo $awalsoal; ?>;
				var q = sessionStorage.getItem("q"+nc);			
				var nc = <?php echo $no_copy; ?>;
				var jnc = 'j'+nc;
				var ync = 'y'+nc;
				var wnc = "w"+<?php echo $posting->utbks+1; ?>+nc;
				var w = localStorage.getItem(wnc);		
				var js = <?php echo $jml_soal; ?>;
				var jArray = <?php echo json_encode($nomor); ?>;
				var dnum = <?php echo $num+$awalsoal; ?>;									
				var tbl = <?php $this->db->select('*'); $this->db->from('ujian'); $this->db->where_in('id_ujian',$posting->id_ujian); $uji = $this->db->get (); $qrow1 = $uji->result();$drow = $qrow1[0];echo $drow->tombol; ?>;
				var ragu = [];
				
				
				function raguwarna(id)
				{
					if (ragu.indexOf(id)== -1)
					{
						ragu.push(id);
						localStorage.setItem(ync, JSON.stringify(ragu));	
						document.getElementById(id).style.backgroundColor = "#d9534f";
					} else
					{
						var removeItem = id;			
						ragu = jQuery.grep(ragu, function(value) {
							return value != removeItem;
						});
						localStorage.setItem(ync, JSON.stringify(ragu));
						document.getElementById(id).style.backgroundColor = "#A3C2CC";
					}
				} 
				
				$(document).ready(function () {
					
					var cek = JSON.parse( localStorage.getItem(ync) );
					if (cek==null)
					{} else
					{ fungsiragu();}
				});
				
				function fungsiragu(){
					var jr = JSON.parse( localStorage.getItem(ync) );
					var jml = jr.length;
					for(i=0;i<jml;i++){
						document.getElementById(jr[i]).style.backgroundColor = "#d9534f";	
					}
				}
				
				$(document).ready(function(){
					$("#darurat").click(function(){
						$("#beres").show();
					});
				});	
				
				$(document).ready(function(){
					$("#ref_butn").click(function(){
						location.reload();
					});
				});
				
				var items = []; 
				function clickes(item) {
					
					var jj = jArray;
					var jml = jj.length;
					var x = $(item).attr("id").substring(1);
					var v = '#b'+x;
					var wk = '#e'+x;
					var u = v + ',' + wk;	
					var no_copy = nc;
					var jml_soal = js;
					
					var today = new Date();
					var expire = new Date();
					expire.setTime(today.getTime() + 3600000*24*14);		   
					
					$(u).addClass("active");		
					items.push(x);
					
					jawaban = document.querySelector('input[name="ja['+x+']"]:checked').value;		
					if (localStorage.getItem("js"+nc) === null)
					{
						var b = hj;
					} else
					{
						var b = localStorage.getItem("js"+nc);
					}								 
					
					var jwb = new Array();
					jwb = b.split(",");
					jwb.splice(x-1,1, jawaban);
					
					localStorage.setItem(jnc,jwb);
					localStorage.setItem("js"+nc, jwb);
					
					var dataString = 'jwb=' + jwb + '&no_copy=' + no_copy;	
					$.ajax({  
						type: "post",  
						url: alm, 
						dataType:'text',
						data: dataString,  
						timeout:  2000,
						success: function(html)
						{
							$(".tampildata").html(html).show();
						},					
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert('Jawaban gagal terkirim, koneksi terputus. Klik tombol Refresh lalu coba lagi.');
						}
					});
					
					document.getElementById("jk").value = jwb;										
					document.cookie = "jwbc"+nc+"="+jwb+";expires="+expire.toGMTString()+"; path=/";
					
					for(i=0;i<jml;i++){
						var n = jArray[i].toString(); 
						items.push(n);			
					}
					
					var unique = items.filter(function(elem, pos) {
						return items.indexOf(elem) == pos;
					}); 
					var batas = dnum-as;
					
					if (unique.length==batas) {
						$("#beres").show();
						sessionStorage.setItem("q"+nc,"2");
					}
				}
				
				function clickes1(item) {
					var jj = jArray;
					var jml = jj.length;
					var x = $(item).attr("id").substring(1);
					var v = '#b'+x;
					var wk = '#e'+x;
					var u = v + ',' + wk;	
					var no_copy = nc;
					var jml_soal = js;
					
					var today = new Date();
					var expire = new Date();
					expire.setTime(today.getTime() + 3600000*24*14);
					
					$(u).addClass("active");
					items.push(x);
					
					var newStr =  document.querySelector('input[name="ja['+x+']"]').value;
					jawaban = newStr.replace(/,/g, '~');
					
					if (localStorage.getItem("js"+nc) === null)
					{
						var b = hj;
					} else
					{
						var b = localStorage.getItem("js"+nc);
					}
					var jwb = new Array();
					jwb = b.split(",");
					jwb.splice(x-1,1, jawaban);
					
					localStorage.setItem(jnc,jwb);
					localStorage.setItem("js"+nc, jwb);
					
					var dataString = 'jwb=' + jwb + '&no_copy=' + no_copy;	
					$.ajax({  
						type: "post",  
						url: alm, 
						dataType:'text',
						data: dataString,  
						timeout:  2000,
						success: function(html)
						{
							$(".tampildata").html(html).show();
						},					
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert('Jawaban gagal terkirim, koneksi terputus. Klik tombol Refresh lalu coba lagi.');
						}
					});
					
					document.getElementById("jk").value = jwb;				
					document.cookie = "jwbc"+nc+"="+jwb+";expires="+expire.toGMTString()+"; path=/";
					
					for(i=0;i<jml;i++){
						var n = jArray[i].toString(); 
						items.push(n);
					}
					
					var unique = items.filter(function(elem, pos) {
						return items.indexOf(elem) == pos;
					}); 
					var batas = dnum-as;
					if (unique.length==batas) {
						$("#beres").show();
						sessionStorage.setItem("q"+nc,"2");
					}
				}					
				
				$(document).ready(function() {
					
					var today = new Date();
					var expire = new Date();
					expire.setTime(today.getTime() + 3600000*24*14);
					
					localStorage.setItem('y',as+1);
					
					if (q=='2')
					{
						$("#beres").show();
					}
					else if (tbl==0){				
						$("#beres").hide();
						} else if (tbl==1){
						$("#beres").show();
					}
					$("section.hideme").hide();
					$('#section'+awalan).show();
					$("button.e").click(function() {
						var id = $(this).attr("id");		
						var sectionId = id.replace("e", "section");
						$("section.hideme").hide();
						$("section#" + sectionId).fadeIn("slow");
					});
					document.getElementById("jk").value = localStorage.getItem(jnc);
					
					
				});
				
				function clicked(item) {
					var x1 = $(item).attr("id").substring(1);
					localStorage.setItem('y'+nc,x1);
				}	
				
				function next() {
					if (localStorage.getItem("y"+nc) !== null)  {
						var i =  parseInt(localStorage.getItem('y'+nc));
						var batas1 = dnum;
						if (i<batas1){
							id = 'e'+(i+1);
							t = id.replace("e", "section");
							$("section.hideme").hide();
							$("section#" + t).fadeIn("slow");
							i = i + 1;
							localStorage.setItem('y'+nc,i);
						}
						} else {
						var i = 1;
						id = 'e'+(i+1);
						t = id.replace("e", "section");
						$("section.hideme").hide();
						$("section#" + t).fadeIn("slow");
						i = i + 1;
						localStorage.setItem('y'+nc,i);
					}
				}
				
				function prev() {
					var i1 =  parseInt(localStorage.getItem('y'+nc));
					
					if (i1>(as+1)) {
						id = 'e'+(i1-1);
						t = id.replace("e", "section");
						
						$("section.hideme").hide();
						$("section#" + t).fadeIn("slow");
						i1 = i1 - 1;
						localStorage.setItem('y'+nc,i1);	
					}
				}
				
				
				var time_limit = "<?php echo $sw; ?>";
				
				
				$(document).ready(function(){
					
					var countDownDate = new Date(time_limit).getTime();
					var x = setInterval(function() {
						var now = new Date().getTime();
						var distance = countDownDate - now;					
						if (distance > 0) {
							var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
							var seconds = Math.floor((distance % (1000 * 60)) / 1000);
							
							document.getElementById("time").innerHTML =   hours + ":"
							+ minutes + ":" + seconds;
							
							if(localStorage.getItem("js"+nc)===null)
							{
								document.getElementById("jk").value = hj;
							} else
							{
								document.getElementById("jk").value = localStorage.getItem("js"+nc);
							}
							
							} else {
							clearInterval(x);
							localStorage.setItem("nc",nc);
							document.getElementById("kirim").submit();					
						}
						
					},1000);
				});		
				
			</script>
			<?php
				} else {
			echo "Mohon maaf, tidak diperkenankan berpindah <i>device</i> atau <i>browser</i> yang berbeda saat melaksanakan ujian. Hubungi admin bila Anda memiliki kendala dengan <i>device</i> atau <i>browser</i>.";	}			
		}
		
		
	?>
	
	<?php include 'view3.php'; ?>
	<?php
		}else{
	?>	<?php include 'view5.php'; ?>
	<div class="wrapper">
		<div class="container">	
			<div class="row" >
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#FFB94A;color:#fff;">PERINGATAN</div>
						<div class="panel-body text-center">
							<p>Anda belum login. </p><br/><p><a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>">Login</a></p>
						</div></div></div>
						<div class="col-md-4"></div>
			</div>
		</div>
		</div><?php
	}
?>																					
