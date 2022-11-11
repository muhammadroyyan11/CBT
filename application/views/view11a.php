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
	<?php include 'view6.php'; 	
	?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
				<?php include 'view41.php'; ?>
			</div>
			<div class="col-md-10 plr15" >
				<div class="subjudul">
					<div class="container">
						<div class="row" >
							<div class="col-md-12 plr15" >
								<h4>DAFTAR UJIAN</h4>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					<div class="container">	
						<div class="row" >
							<div class="col-md-12" >
								<div class="panel panel-default">
									<div class="panel-heading" style="background:#FFB94A;color:#fff;">PERATURAN UJIAN</div>
									<div class="panel-body">
										<ol class="plr15">
											<li>Pengerjaan soal-soal ujian akan diberikan batasan waktu, apabila waktu telah habis Anda tidak dapat lagi mengoreksi atau mengisi kembali jawaban dari soal-soal yang tersedia. Begitu pula sebaliknya, apabila waktu yang tersedia masih ada maka Anda dapat mengoreksi atau memeriksa kembali jawaban-jawaban Anda.</li>
											<li>Waktu ujian akan tampil di layar komputer dan mulai menghitung mundur saat soal ujian mulai diakses.</li>
											<li><span style="color:red"><b>* Clear Cached</b></span> hanya digunakan ketika terjadi perpindahan ke device yang berbeda.</li>
											
										</ol>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div id="container1">
						<div id="body"> 
							
							
							<div class="clear"></div>
							<div class="container">	
								<div class="row" >
									<div class="col-md-12" >
										<center><?php echo $this->session->flashdata('pesan1');?></center>
										<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
											<tr class="tr-head">			
												
												<td width="25%" align="center" class="line2">Nama Ujian</td>
												<td width="10%" align="center" class="line2">Jumlah Soal</td>
												<td width="9%" align="center" class="line2">Tanggal Ujian</td>
												<td width="9%" align="center" class="line2">Jam Mulai</td>
												<td width="9%" align="center" class="line2">Jam Selesai</td>
												<td width="8%" align="center" class="line2">Durasi</td>
												<td width="8%" align="center" class="line2">Clear Cached <span style="color:red">*</span></td>
												<td width="8%" align="center" class="line2">Cached</td>
												<td width="14%" align="center" class="line2">Action 
													
													
												</td>
											</tr>
											
											<?php 
												$j=1;
												$tgl_now = date('d-m-Y');
												$jam_now = date('H:i:s');
												$tgl_now1 = date('M d, Y');
												
												$timesplit1=explode(':',$jam_now);												
												$jn = ($timesplit1[0]*60)+($timesplit1[1]);		
												
												
												foreach ($daftarujian as $list) {?>
												<?php
													
													$timesplit=explode(':',$list->jam_ujian);
													$det=($timesplit[0]*60*60)+($timesplit[1]*60);	
													$min=($timesplit[0]*60)+($timesplit[1]);
													$telat = $jn - $min;
													$jam = $det + ($list->waktu*60);
													$jam_akhir = gmdate('H:i:s',$jam);
													
													
													$w1 = $list->w1;
													$w2 = $list->w1+$list->w2;
													$w3 = $list->w1+$list->w2+$list->w3;
													$w4 = $list->w1+$list->w2+$list->w3+$list->w4;
													$w5 = $list->w1+$list->w2+$list->w3+$list->w4+$list->w5;
													$w6 = $list->w1+$list->w2+$list->w3+$list->w4+$list->w5+$list->w6;
													$w7 = $list->w1+$list->w2+$list->w3+$list->w4+$list->w5+$list->w6+$list->w7;
													$w8 = $list->w1+$list->w2+$list->w3+$list->w4+$list->w5+$list->w6+$list->w7+$list->w8;
													$w9 = $list->w1+$list->w2+$list->w3+$list->w4+$list->w5+$list->w6+$list->w7+$list->w8+$list->w9;
													$w10 = $list->w1+$list->w2+$list->w3+$list->w4+$list->w5+$list->w6+$list->w7+$list->w8+$list->w9+$list->w10;
													
													if ($w1>=$telat)
													{
														$utbks = 1;
														$jam = $det + $w1*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w2>=$telat)
													{
														$utbks = 2;
														$jam = $det + $w2*60;
														$jam_akhir1 =$tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w3>=$telat)
													{
														$utbks = 3;
														$jam = $det + $w3*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w4>=$telat)
													{
														$utbks = 4;
														$jam = $det + $w4*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w5>=$telat)
													{
														$utbks = 5;
														$jam = $det + $w5*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w6>=$telat)
													{
														$utbks = 6;
														$jam = $det + $w6*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w7>=$telat)
													{
														$utbks = 7;
														$jam = $det + $w7*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w8>=$telat)
													{
														$utbks = 8;
														$jam = $det + $w8*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w9>=$telat)
													{
														$utbks = 9;
														$jam = $det + $w9*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													} else if ($w10>=$telat)
													{
														$utbks = 10;
														$jam = $det + $w10*60;
														$jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam);
														
													}
													
													$id_ujian = $list->id_ujian;
													$id = $this->session->userdata('user_id');
													$peminatan = $this->session->userdata('peminatan');
													$kelas = $this->session->userdata('kelas');
													$where = "proses.id_ujian=$id_ujian AND proses.id=$id AND proses.id_kelas=$kelas";
													$jml = $this->db->query("SELECT * FROM proses WHERE $where");
													if  (((($jml->num_rows()) == 1) or ($list->aktif_ujian) == 1) and (($list->jminat) == 0 or ($list->jminat) == $peminatan) and ($tgl_now == date('d-m-Y',strtotime($list->tanggal_ujian))) and ($jam_now >= date('H:i',strtotime($list->jam_ujian))) and ($jam_now < date('H:i',strtotime($jam_akhir))))
													{ 
													?>
													
													
													<tr>
														<td align="center" class="line"><strong>
															<?php echo $list->nama_ujian;	
																
																
															?>
															
															
															
														</strong>
														</td>
														<td align="center" class="line"> 
															<?php echo $list->jumlah_soal; 		
															?><br/> 
														</td>
														<td align="center" class="line"> 
															<?php echo date('d-m-Y',strtotime($list->tanggal_ujian));	?> 
														</td>
														<td align="center" class="line"> 
															<?php 
																echo date('H:i',strtotime($list->jam_ujian));
															?> 
														</td>
														<td align="center" class="line"> 
															<?php  echo date('H:i',strtotime($jam_akhir)); ?>
														</td>
														<td align="center" class="line"> 
															<?php echo $list->waktu;	?> menit
														</td>
														
														<td align="center" class="line"> 
															
															<?php 
																$no_copy = $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;
																
																$this->db->select('*');
																$this->db->from('proses');
																$this->db->where('no_copy',$no_copy);
																$query=$this->db->get ();
																$record=$query->row();
																
																$userdata = array(
																'ncp'  => $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian
																);
																$this->session->set_userdata($userdata);
																
																if (!isset($_COOKIE["jwbc".$no_copy])) {
																?>		
																
																Cleared
																
																<?php } else { ?>
																<button class="tombol4b" title="Tombol clear akan menghapus hasil jawaban ujian dari memori device anda" onclick="return klir<?php echo $j;?>()">Clear</button>	
																<?php 
																	
																	
																} ?>
																
																<script type="text/javascript">
																	var b = "<?php echo $j;?>";
																	
																	window["klir" + b]=function() {	
																		var nc = "<?php echo $no_copy; ?>";												
																		document.cookie = "jwbc"+nc+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";														
																		localStorage.removeItem("ws"+nc);
																		localStorage.removeItem("js"+nc);
																		location.reload();														
																	}
																</script>
														</td>
														
														<td align="center" class="line"> 
															<?php 
																if (!isset($_COOKIE["jwbc".$no_copy])) {
																	
																	} else {
																	$jwb = explode(',',$_COOKIE["jwbc".$no_copy]);
																	$k = substr_count($_COOKIE["jwbc".$no_copy], 'K'); 																
																	$jw = count($jwb); 
																	echo $jw - $k . " jawaban";
																}
															?>
														</td>
														
														<td align="center" class="line3"> 
															
															<?php	
																
																if($list->utbk==1) 
																{																	
																	if (empty($record->proses_nilai) AND isset($record->hasil_jawaban)) {
																		if (!isset($_COOKIE["jwbc".$no_copy]))
																		{ ?>
																		<a style="color:#fff;text-decoration:none;" href="<?php echo site_url('lanjutujian_u/'.$no_copy)?>" title="Lanjut Ujian" class="tombol2b">Lanjut Ujian</a>
																		
																		<?php		} else { ?>
																		
																		<a style="color:#fff;text-decoration:none;" href="<?php echo site_url('lanjutujian_u/'.$no_copy)?>" title="Lanjut Ujian" class="tombol2b">Lanjut Ujian</a>
																		<?php  
																			
																		} 
																		
																	} 			
																	else if (($jml->num_rows()) == 1)
																	{  
																		
																		echo "<strong>Selesai</strong>";
																		
																	} 
																	else
																	{
																	?>
																	
																	
																	<form id="kirim" action="<?php echo site_url('simpanjawaban');?>" method="POST" onsubmit="return validateForm<?php echo $j;?>()">
																		
																		<input type="hidden" name="nc" value="<?php echo $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;?>">
																		<input type="hidden" id="noc<?php echo $j; ?>" name="noc" value="<?php echo $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;?>">
																		<input type="hidden" name="idu" value="<?php echo $list->id_ujian; ?>">
																		<input type="hidden" name="nm" value="<?php echo $this->session->userdata('nama'); ?>">
																		<input type="hidden" name="np" value="<?php echo $this->session->userdata('no_peserta'); ?>">
																		<input type="hidden" name="nu" value="<?php echo $this->session->userdata('namaujian'); ?>">
																		<input type="hidden" name="nk" value="<?php echo $this->session->userdata('namakelas'); ?>">
																		<input type="hidden" name="sek" value="<?php echo $this->session->userdata('sekolah'); ?>">		
																		<input type="hidden" name="jur1" value="<?php echo $this->session->userdata('jur1'); ?>">
																		<input type="hidden" name="jur2" value="<?php echo $this->session->userdata('jur2'); ?>">
																		<input type="hidden" name="jur3" value="<?php echo $this->session->userdata('jur3'); ?>">
																		<input type="hidden" name="snl1" value="<?php echo $this->session->userdata('snl1'); ?>">
																		<input type="hidden" name="snl2" value="<?php echo $this->session->userdata('snl2'); ?>">
																		<input type="hidden" name="snl3" value="<?php echo $this->session->userdata('snl3'); ?>">
																		<input type="hidden" name="js" value="<?php echo $list->jumlah_soal; ?>">
																		<input type="hidden" id="id<?php echo $j; ?>" name="id" value="<?php echo $this->session->userdata('user_id'); ?>">
																		<input type="hidden" name="idk" value="<?php echo $this->session->userdata('kelas'); ?>">
																		<input type="hidden" name="utbk" value="<?php echo $list->utbk; ?>">
																		<input type="hidden" name="be" value="<?php echo $list->benar; ?>">
																		<input type="hidden" name="sa" value="<?php echo $list->salah; ?>">
																		<input type="hidden" name="ko" value="<?php echo $list->kosong; ?>">
																		<input type="hidden" name="sk" value="<?php echo $list->skala; ?>">
																		<input type="hidden" name="tipe" value="<?php echo $list->tipe; ?>">
																		<?php
																			
																		?>
																		<input type="hidden" name="utbks" value="<?php echo $utbks; ?>">
																		
																		<input type="hidden" id="sw<?php echo $j; ?>" name="sw" value="<?php echo $jam_akhir1; ?>">
																		
																		
																		<input type="hidden" name="rj" value="<?php echo rand(1,10); ?>">
																		<input type="hidden" name="mt" value="<?php echo $list->multi; ?>">
																		<input type="hidden" name="jm" value="<?php echo $list->jumlah_mapel; ?>">
																		<input type="hidden" name="m1" value="<?php echo $list->mapel1; ?>">
																		<input type="hidden" name="m2" value="<?php echo $list->mapel2; ?>">
																		<input type="hidden" name="m3" value="<?php echo $list->mapel3; ?>">
																		<input type="hidden" name="m4" value="<?php echo $list->mapel4; ?>">
																		<input type="hidden" name="m5" value="<?php echo $list->mapel5; ?>">
																		<input type="hidden" name="m6" value="<?php echo $list->mapel6; ?>">
																		<input type="hidden" name="m7" value="<?php echo $list->mapel7; ?>">
																		<input type="hidden" name="m8" value="<?php echo $list->mapel8; ?>">
																		<input type="hidden" name="m9" value="<?php echo $list->mapel9; ?>">
																		<input type="hidden" name="m10" value="<?php echo $list->mapel10; ?>">
																		<input type="hidden" name="jm1" value="<?php echo $list->jml_mapel1; ?>">
																		<input type="hidden" name="jm2" value="<?php echo $list->jml_mapel2; ?>">
																		<input type="hidden" name="jm3" value="<?php echo $list->jml_mapel3; ?>">
																		<input type="hidden" name="jm4" value="<?php echo $list->jml_mapel4; ?>">
																		<input type="hidden" name="jm5" value="<?php echo $list->jml_mapel5; ?>">
																		<input type="hidden" name="jm6" value="<?php echo $list->jml_mapel6; ?>">
																		<input type="hidden" name="jm7" value="<?php echo $list->jml_mapel7; ?>">
																		<input type="hidden" name="jm8" value="<?php echo $list->jml_mapel8; ?>">
																		<input type="hidden" name="jm9" value="<?php echo $list->jml_mapel9; ?>">
																		<input type="hidden" name="jm10" value="<?php echo $list->jml_mapel10; ?>">
																		<input type="hidden" id="kja<?php echo $j; ?>" name="kja" value="<?php echo $list->kjawab; ?>">
																		<input type="hidden" id="w1<?php echo $j; ?>" name="w1" value="<?php echo $list->w1; ?>">
																		<input type="hidden" id="w2<?php echo $j; ?>"name="w2" value="<?php echo $list->w2; ?>">
																		<input type="hidden" id="w3<?php echo $j; ?>"name="w3" value="<?php echo $list->w3; ?>">
																		<input type="hidden" id="w4<?php echo $j; ?>"name="w4" value="<?php echo $list->w4; ?>">
																		<input type="hidden" id="w5<?php echo $j; ?>"name="w5" value="<?php echo $list->w5; ?>">
																		<input type="hidden" id="w6<?php echo $j; ?>"name="w6" value="<?php echo $list->w6; ?>">
																		<input type="hidden" id="w7<?php echo $j; ?>"name="w7" value="<?php echo $list->w7; ?>">
																		<input type="hidden" id="w8<?php echo $j; ?>"name="w8" value="<?php echo $list->w8; ?>">
																		<input type="hidden" id="w9<?php echo $j; ?>"name="w9" value="<?php echo $list->w9; ?>">
																		<input type="hidden" id="w10<?php echo $j; ?>"name="w10" value="<?php echo $list->w10; ?>">
																		
																		<?php
																			/*
																				$my = $list->medley; 
																				if ($my!=='')
																				{
																				echo '<input type="hidden" name="my" value="0">';
																				echo '<input type="hidden" name="my1" value="'.$my[0].'">';
																				echo '<input type="hidden" name="my2" value="'.$my.'">';
																				}
																				else
																				{
																				echo '<input type="hidden" name="my" value="0">';
																				echo '<input type="hidden" name="my1" value="0">';
																				echo '<input type="hidden" name="my2" value="'.$my.'">';
																				}
																			*/
																		?>
																		
																		
																		<?php if($list->win=='') { ?>
																			<input type="hidden" value="" id="win<?php echo $j; ?>" name="win" style="height:20px;width:100px;" >															
																			<?php } else { ?>
																			<input type="text" placeholder="Password" id="win<?php echo $j; ?>" name="win" style="height:20px;width:100px;" required>
																			
																		<?php } ?>
																		<input class="tombol2" type="submit" value="Mulai Ujian"/>
																		
																		
																		
																	</form>
																	
																	<script type="text/javascript">
																		var j = "<?php echo $j;?>";	
																		var today = new Date();
																		var expire = new Date();
																		expire.setTime(today.getTime() + 3600000*24*14);
																		
																		window["validateForm" + j]=function() {	
																			
																			var i = "<?php echo $j;?>";
																			var n = "<?php echo $list->win;?>";
																			var m =  document.getElementById("win"+i).value;
																			
																			var sw_ls = document.getElementById("sw"+i).value;
																			
																			var kja_ls = document.getElementById("kja"+i).value;
																			var nc_ls = document.getElementById("noc"+i).value;
																			var w1_ls = document.getElementById("w1"+i).value;
																			var w2_ls = document.getElementById("w2"+i).value;
																			var w3_ls = document.getElementById("w3"+i).value;
																			var w4_ls = document.getElementById("w4"+i).value;
																			var w5_ls = document.getElementById("w5"+i).value;
																			var w6_ls = document.getElementById("w6"+i).value;
																			var w7_ls = document.getElementById("w7"+i).value;
																			var w8_ls = document.getElementById("w8"+i).value;
																			var w9_ls = document.getElementById("w9"+i).value;
																			var w10_ls = document.getElementById("w10"+i).value;
																			
																			
																			sessionStorage.removeItem('q'+nc_ls);
																			localStorage.removeItem("y"+nc_ls); 
																			localStorage.removeItem("js"+nc_ls); 
																			localStorage.removeItem("ws"+nc_ls); 
																			
																			localStorage.setItem("js"+nc_ls, kja_ls); 
																			localStorage.setItem("j"+nc_ls, kja_ls);
																			localStorage.setItem("ws"+nc_ls, sw_ls);
																			localStorage.setItem("w1"+nc_ls, w1_ls);
																			localStorage.setItem("w2"+nc_ls, w2_ls);
																			localStorage.setItem("w3"+nc_ls, w3_ls);
																			localStorage.setItem("w4"+nc_ls, w4_ls);
																			localStorage.setItem("w5"+nc_ls, w5_ls);
																			localStorage.setItem("w6"+nc_ls, w6_ls);
																			localStorage.setItem("w7"+nc_ls, w7_ls);
																			localStorage.setItem("w8"+nc_ls, w8_ls);
																			localStorage.setItem("w9"+nc_ls, w9_ls);
																			localStorage.setItem("w10"+nc_ls, w10_ls);
																			document.cookie = "jwbc"+nc_ls+"="+kja_ls+";expires="+expire.toGMTString()+"; path=/";																			
																			
																			
																			if (n!=m)
																			{
																				alert('Password tidak sesuai');
																				document.getElementById("win"+i).focus();
																				return false;
																			}
																		};	
																	</script>
																	<?php
																	}
																}
																
																
																else {															
																	if (empty($record->proses_nilai) AND isset($record->hasil_jawaban)) {
																		if (!isset($_COOKIE["jwbc".$no_copy]))
																		{ if($list->tipe==1) 
																			{ ?>
																			<a style="color:#fff;text-decoration:none;" href="<?php echo site_url('lanjutujian_e/'.$no_copy)?>" title="Lanjut Ujian" class="tombol2b">Lanjut Ujian</a>
																			<?php } else
																			
																			{ ?>
																			<a style="color:#fff;text-decoration:none;" href="<?php echo site_url('lanjutujian/'.$no_copy)?>" title="Lanjut Ujian" class="tombol2b">Lanjut Ujian</a>
																			<?php
																			}
																			} else {
																			if($list->tipe==1) 
																			{ ?>
																			<a style="color:#fff;text-decoration:none;" href="<?php echo site_url('lanjutujian_e/'.$no_copy)?>" title="Lanjut Ujian" class="tombol2b">Lanjut Ujian</a>
																			<?php } else
																			
																			{ ?>
																			<a style="color:#fff;text-decoration:none;" href="<?php echo site_url('lanjutujian/'.$no_copy)?>" title="Lanjut Ujian" class="tombol2b">Lanjut Ujian</a>
																			<?php
																			}
																		} 
																		
																	} 			
																	else if (($jml->num_rows()) == 1)
																	{  
																		
																		echo "<strong>Selesai</strong>";
																		
																	} 
																	else
																	{
																	?>
																	
																	
																	<form id="kirim" action="<?php echo site_url('simpanjawaban');?>" method="POST" onsubmit="return validateForm<?php echo $j;?>()">
																		
																		<input type="hidden" name="nc" value="<?php echo $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;?>">
																		<input type="hidden" id="noc<?php echo $j; ?>" name="noc" value="<?php echo $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;?>">
																		<input type="hidden" name="idu" value="<?php echo $list->id_ujian; ?>">
																		<input type="hidden" name="nm" value="<?php echo $this->session->userdata('nama'); ?>">
																		<input type="hidden" name="np" value="<?php echo $this->session->userdata('no_peserta'); ?>">
																		<input type="hidden" name="nu" value="<?php echo $this->session->userdata('namaujian'); ?>">
																		<input type="hidden" name="nk" value="<?php echo $this->session->userdata('namakelas'); ?>">
																		<input type="hidden" name="sek" value="<?php echo $this->session->userdata('sekolah'); ?>">					
																		<input type="hidden" name="js" value="<?php echo $list->jumlah_soal; ?>">
																		<input type="hidden" id="id<?php echo $j; ?>" name="id" value="<?php echo $this->session->userdata('user_id'); ?>">
																		<input type="hidden" name="idk" value="<?php echo $this->session->userdata('kelas'); ?>">
																		<input type="hidden" name="jur1" value="<?php echo $this->session->userdata('jur1'); ?>">
																		<input type="hidden" name="jur2" value="<?php echo $this->session->userdata('jur2'); ?>">
																		<input type="hidden" name="jur3" value="<?php echo $this->session->userdata('jur3'); ?>">
																		<input type="hidden" name="snl1" value="<?php echo $this->session->userdata('snl1'); ?>">
																		<input type="hidden" name="snl2" value="<?php echo $this->session->userdata('snl2'); ?>">
																		<input type="hidden" name="snl3" value="<?php echo $this->session->userdata('snl3'); ?>">
																		<input type="hidden" name="utbk" value="<?php echo $list->utbk; ?>">
																		<input type="hidden" name="be" value="<?php echo $list->benar; ?>">
																		<input type="hidden" name="sa" value="<?php echo $list->salah; ?>">
																		<input type="hidden" name="ko" value="<?php echo $list->kosong; ?>">
																		<input type="hidden" name="sk" value="<?php echo $list->skala; ?>">
																		<input type="hidden" name="tipe" value="<?php echo $list->tipe; ?>">
																		<input type="hidden" name="utbks" value="1">
																		<?php $jam_akhir1 = $tgl_now1.gmdate(' H:i:s',$jam); ?>
																		<input type="hidden" id="sw<?php echo $j; ?>" name="sw" value="<?php echo $jam_akhir1; ?>">
																		<input type="hidden" name="rj" value="<?php echo rand(1,10); ?>">
																		<input type="hidden" name="mt" value="<?php echo $list->multi; ?>">
																		<input type="hidden" name="jm" value="<?php echo $list->jumlah_mapel; ?>">
																		<input type="hidden" name="m1" value="<?php echo $list->mapel1; ?>">
																		<input type="hidden" name="m2" value="<?php echo $list->mapel2; ?>">
																		<input type="hidden" name="m3" value="<?php echo $list->mapel3; ?>">
																		<input type="hidden" name="m4" value="<?php echo $list->mapel4; ?>">
																		<input type="hidden" name="m5" value="<?php echo $list->mapel5; ?>">
																		<input type="hidden" name="m6" value="<?php echo $list->mapel6; ?>">
																		<input type="hidden" name="m7" value="<?php echo $list->mapel7; ?>">
																		<input type="hidden" name="m8" value="<?php echo $list->mapel8; ?>">
																		<input type="hidden" name="m9" value="<?php echo $list->mapel9; ?>">
																		<input type="hidden" name="m10" value="<?php echo $list->mapel10; ?>">
																		<input type="hidden" name="jm1" value="<?php echo $list->jml_mapel1; ?>">
																		<input type="hidden" name="jm2" value="<?php echo $list->jml_mapel2; ?>">
																		<input type="hidden" name="jm3" value="<?php echo $list->jml_mapel3; ?>">
																		<input type="hidden" name="jm4" value="<?php echo $list->jml_mapel4; ?>">
																		<input type="hidden" name="jm5" value="<?php echo $list->jml_mapel5; ?>">
																		<input type="hidden" name="jm6" value="<?php echo $list->jml_mapel6; ?>">
																		<input type="hidden" name="jm7" value="<?php echo $list->jml_mapel7; ?>">
																		<input type="hidden" name="jm8" value="<?php echo $list->jml_mapel8; ?>">
																		<input type="hidden" name="jm9" value="<?php echo $list->jml_mapel9; ?>">
																		<input type="hidden" name="jm10" value="<?php echo $list->jml_mapel10; ?>">
																		<input type="hidden" id="kja<?php echo $j; ?>" name="kja" value="<?php echo $list->kjawab; ?>">
																		<input type="hidden" id="w1<?php echo $j; ?>" name="w1" value="<?php echo $list->w1; ?>">
																		<input type="hidden" id="w2<?php echo $j; ?>"name="w2" value="<?php echo $list->w2; ?>">
																		<input type="hidden" id="w3<?php echo $j; ?>"name="w3" value="<?php echo $list->w3; ?>">
																		<input type="hidden" id="w4<?php echo $j; ?>"name="w4" value="<?php echo $list->w4; ?>">
																		<input type="hidden" id="w5<?php echo $j; ?>"name="w5" value="<?php echo $list->w5; ?>">
																		<input type="hidden" id="w6<?php echo $j; ?>"name="w6" value="<?php echo $list->w6; ?>">
																		<input type="hidden" id="w7<?php echo $j; ?>"name="w7" value="<?php echo $list->w7; ?>">
																		<input type="hidden" id="w8<?php echo $j; ?>"name="w8" value="<?php echo $list->w8; ?>">
																		<input type="hidden" id="w9<?php echo $j; ?>"name="w9" value="<?php echo $list->w9; ?>">
																		<input type="hidden" id="w10<?php echo $j; ?>"name="w10" value="<?php echo $list->w10; ?>">
																		
																		<?php
																			/*
																				$my = $list->medley; 
																				if ($my!=='')
																				{
																				echo '<input type="hidden" name="my" value="0">';
																				echo '<input type="hidden" name="my1" value="'.$my[0].'">';
																				echo '<input type="hidden" name="my2" value="'.$my.'">';
																				}
																				else
																				{
																				echo '<input type="hidden" name="my" value="0">';
																				echo '<input type="hidden" name="my1" value="0">';
																				echo '<input type="hidden" name="my2" value="'.$my.'">';
																				}
																			*/
																		?>
																		
																		
																		<?php if($list->win=='') { ?>
																			<input type="hidden" value="" id="win<?php echo $j; ?>" name="win" style="height:20px;width:100px;" >															
																			<?php } else { ?>
																			<input type="text" placeholder="Password" id="win<?php echo $j; ?>" name="win" style="height:20px;width:100px;" required>
																			
																		<?php } ?>
																		<input class="tombol2" type="submit" value="Mulai Ujian"/>
																		
																		
																		
																	</form>
																	
																	<script type="text/javascript">
																		var j = "<?php echo $j;?>";	
																		var today = new Date();
																		var expire = new Date();
																		expire.setTime(today.getTime() + 3600000*24*14);
																		
																		window["validateForm" + j]=function() {	
																			
																			var i = "<?php echo $j;?>";
																			var n = "<?php echo $list->win;?>";
																			var m =  document.getElementById("win"+i).value;
																			
																			var sw_ls = document.getElementById("sw"+i).value;
																			var kja_ls = document.getElementById("kja"+i).value;
																			var nc_ls = document.getElementById("noc"+i).value;
																			
																			sessionStorage.removeItem('q'+nc_ls);
																			localStorage.removeItem("y"+nc_ls); 
																			localStorage.removeItem("js"+nc_ls); 
																			localStorage.removeItem("ws"+nc_ls); 
																			localStorage.setItem("js"+nc_ls, kja_ls); 
																			localStorage.setItem("j"+nc_ls, kja_ls);
																			localStorage.setItem("ws"+nc_ls, sw_ls);
																			
																			document.cookie = "jwbc"+nc_ls+"="+kja_ls+";expires="+expire.toGMTString()+"; path=/";																		
																			if (n!=m)
																			{
																				alert('Password tidak sesuai');
																				document.getElementById("win"+i).focus();
																				return false;
																			}
																		};	
																	</script>
																	<?php
																	}	
																} ?>
														</td>
														</tr> <?php
													} else 
													{
														continue;	
													}
													
													$j++;
													
												} ?>
										</table>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>	
	
	
	
	
	<script type="text/javascript">
		$(function(){
			$('body').on('click','ul#search_page_pagination>li>a',function(e){
				e.preventDefault();  // prevent default behaviour for anchor tag
				var Pagination_url = $(this).attr('href'); // getting href of <a> tag
				$.ajax({
					url:Pagination_url,
					type:'POST',
					success:function(data){
						var $page_data = $(data);
						$('#container').html($page_data.find('div#body'));
						$('table').addClass('table');
					}
				});
			});
		});
	</script>
	
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