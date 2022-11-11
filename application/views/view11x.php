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
											<li>Hasil ujian Anda akan langsung ditampilkan di layar komputer.</li>
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
												<td width="50%" align="center" class="line2">Nama Ujian</td>
												<td width="15%" align="center" class="line2">Jumlah Soal</td>
												<td width="15%" align="center" class="line2">Waktu Pengerjaan</td>
												<td width="20%" align="center" class="line2">Action</td>
											</tr>
											
											<?php 
												$j=1;
												foreach ($daftarujian as $list) {?>
												<?php
													$id_ujian = $list->id_ujian;
													$id = $this->session->userdata('user_id');
													$peminatan = $this->session->userdata('peminatan');
													$kelas = $this->session->userdata('kelas');
													$where = "proses.id_ujian=$id_ujian AND proses.id=$id AND proses.id_kelas=$kelas";
													$jml = $this->db->query("SELECT * FROM proses WHERE $where");
													if  (((($jml->num_rows()) == 1) or ($list->aktif_ujian) == 1) and (($list->jminat) == 0 or ($list->jminat) == $peminatan))
													{ 
													?>
													
													<tr>
														<td align="center" class="line"><strong>
														<?php echo $list->nama_ujian;	?></strong>
														</td>
														<td align="center" class="line"> 
															<?php echo $list->jumlah_soal;	?>
														</td>
														<td align="center" class="line"> 
															<?php echo $list->waktu;	?> menit
														</td>
														<td align="center" class="line3"> 
															
															
															
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
																
																if (empty($record->proses_nilai) AND isset($record->hasil_jawaban)) {
																	echo '<a style="color:#fff;text-decoration:none;" href="'.site_url("lanjutujian/".$no_copy).'" title="Lanjut Ujian" class="tombol2b" onclick="return beku();">Lanjut Ujian</a>';
																	
																} 			
																else if (($jml->num_rows()) == 1)
																{  /*
																	echo '<a href="'.site_url("lihathasil/".$list->id_ujian).'" title="Lihat Hasil" class="tombol2a">Lihat Hasil</a>';
																*/
																echo "<strong>Selesai</strong>";
																
																} 
																else
																{
																?>
																
																
																<form id="kirim" action="<?php echo site_url('simpanjawaban');?>" method="POST" onsubmit="return validateForm<?php echo $j;?>()">
																	
																	<input type="hidden" name="nc" value="<?php echo $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;?>">
																	<input type="hidden" name="idu" value="<?php echo $list->id_ujian; ?>">
																	<input type="hidden" name="nm" value="<?php echo $this->session->userdata('nama'); ?>">
																	<input type="hidden" name="np" value="<?php echo $this->session->userdata('no_peserta'); ?>">
																	<input type="hidden" name="nu" value="<?php echo $this->session->userdata('namaujian'); ?>">
																	<input type="hidden" name="nk" value="<?php echo $this->session->userdata('namakelas'); ?>">
																	<input type="hidden" name="sek" value="<?php echo $this->session->userdata('sekolah'); ?>">					
																	<input type="hidden" name="js" value="<?php echo $list->jumlah_soal; ?>">
																	<input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id'); ?>">
																	<input type="hidden" name="idk" value="<?php echo $this->session->userdata('kelas'); ?>">
																	<input type="hidden" name="utbk" value="<?php echo $list->utbk; ?>">
																	<input type="hidden" name="be" value="<?php echo $list->benar; ?>">
																	<input type="hidden" name="sa" value="<?php echo $list->salah; ?>">
																	<input type="hidden" name="ko" value="<?php echo $list->kosong; ?>">
																	<input type="hidden" name="sk" value="<?php echo $list->skala; ?>">
																	<?php if($list->utbk==0)
																	{ ?>
																	<input type="hidden" name="sw" value="<?php echo $list->waktu; ?>">
																	<?php } else { ?>
																	<input type="hidden" name="sw" value="<?php echo $list->w1; ?>">
																	<?php }
																	?>
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
																	<input type="hidden" name="w1" value="<?php echo $list->w1; ?>">
																	<input type="hidden" name="w2" value="<?php echo $list->w2; ?>">
																	<input type="hidden" name="w3" value="<?php echo $list->w3; ?>">
																	<input type="hidden" name="w4" value="<?php echo $list->w4; ?>">
																	<input type="hidden" name="w5" value="<?php echo $list->w5; ?>">
																	<input type="hidden" name="w6" value="<?php echo $list->w6; ?>">
																	<input type="hidden" name="w7" value="<?php echo $list->w7; ?>">
																	<input type="hidden" name="w8" value="<?php echo $list->w8; ?>">
																	<input type="hidden" name="w9" value="<?php echo $list->w9; ?>">
																	<input type="hidden" name="w10" value="<?php echo $list->w10; ?>">
																	<input type="hidden" name="kja" value="<?php echo $list->kjawab; ?>">
																	<?php $my = $list->medley; 
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
																	?>
																	
																	
																	<?php if($list->win=='') { ?>																	
																	<?php } else { ?>
																		<input type="text" placeholder="Password" id="win<?php echo $j; ?>" name="win" style="height:20px;width:100px;" required>
																		
																	<?php } ?>
																	<input class="tombol2" type="submit" value="Mulai Ujian"/>
																	
																	
																	
																</form>
																
																<script type="text/javascript">	
																	
																	var j = <?php echo $j;?>;
																	
																	window["validateForm" + j]=function() {	
																		
																		var i = <?php echo $j;?>;
																		var n = "<?php echo $list->win;?>";
																		var m =  document.getElementById("win"+i).value;	
																		if (n!=m)
																		{
																			alert('Password tidak sesuai');
																			document.getElementById("win"+i).focus();
																			return false;
																		}	
																	};
																	
																</script>
																<?php
																	$j++;
																} ?>
														</td>
														</tr> <?php
													} else 
													{
														continue;	
													}
													
													
													
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
		localStorage.removeItem("waktu")
	</script>
	<script type="text/javascript">
		var clickCount = 0;
		function beku(item)
		{     			
			if(clickCount == 0)
			{
				clickCount++;
				return true;				
			}
			else
			{
				return false;				
			}			
		}		
	</script>
	
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