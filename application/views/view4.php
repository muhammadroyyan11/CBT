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
	<?php include 'view7.php'; ?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
				<?php include 'view42.php'; ?>
			</div>
			<div class="col-md-10 plr15" >
				<div class="subjudul">
					<div class="container">
						<div class="row" >
							<div class="col-md-12 plr15" >
								<h4 style="text-transform:uppercase;">HASIL UJIAN <?php echo $hasil->nama;?> (<?php echo $hasil->no_peserta;?>)</h4>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					
					<div class="container">	
						<div class="row" >
							<div class="col-md-12" >
								<?php
									if ($hasil->multi==1)
									
									{ ?>
									<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
										<tr class="tr-head">
											<td width="26%" align="center" class="line2"> Nama Peserta </td>
											<td width="12%" align="center" class="line2"> No Peserta </td>
											<td width="26%" align="center" class="line2"> Kelas </td>
											<td width="12%" align="center" class="line2"> Nilai Rata<sup>2</sup>  </td>
											<td width="12%" align="center" class="line2"> Skala Rata<sup>2</sup> </td>
											<td width="12%" align="center" class="line2"> Predikat Rata<sup>2</sup> </td>	
										</tr>
										<tr>
											<td align="center" class="line"> <?php echo $hasil->nama;?></td>
											<td align="center" class="line"> <?php echo $hasil->no_peserta;?></td>
											<td align="center" class="line"> <?php echo $hasil->nama_kelas;?></td>
											<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($hasil->p_nilai, '0'), '.');echo $fnilai; ?>													
											</td>					
											<td align="center" class="line"> <?php $fskala = rtrim(rtrim($hasil->k13, '0'), '.');echo $fskala; ?> </td>
											<td align="center" class="line3"> <?php echo $hasil->predikat;?></td>
										</tr>
									</table>
									<div class="h20" ></div>
									<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
										<tr class="tr-head">
											<td width="45%" align="center" class="line2"> Mata Pelajaran </td>
											<td width="10%" align="center" class="line2"> Jumlah Soal </td>
											<td width="7%" align="center" class="line2"> Benar </td>
											<td width="7%" align="center" class="line2"> Salah </td>
											<td width="7%" align="center" class="line2"> Kosong </td>
											<td width="7%" align="center" class="line2"> Nilai </td>		
											<td width="7%" align="center" class="line2"> Skala </td>
											<td width="10%" align="center" class="line2"> Predikat </td
											</tr>
											<?php 
												$jumlah_mapel = $hasil->jumlah_mapel;
												for($k=1;$k<=$jumlah_mapel;$k++){ ?>
												<tr>
													<td align="center" class="line"> <?php echo $hasil->{'mapel'.$k};?></td>
													<td align="center" class="line"> <?php echo $hasil->{'jml_mapel'.$k};?></td>
													<td align="center" class="line"> <?php echo $hasil->{'benar'.$k};?></td>
													<td align="center" class="line"> <?php echo $hasil->{'salah'.$k};?></td>					
													<td align="center" class="line"> <?php echo $hasil->{'kosong'.$k};?></td>
													<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($hasil->{'nilai'.$k}, '0'), '.');echo $fnilai; ?>													
													</td>					
													<td align="center" class="line"> <?php $fskala = rtrim(rtrim($hasil->{'k13_'.$k}, '0'), '.');echo $fskala; ?> </td>
													<td align="center" class="line3"> <?php echo $hasil->{'predikat'.$k};?></td>
												</tr>
											<?php } ?>
										</table>
										<?php	}
										
										else{ ?>
										
										<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
											<tr class="tr-head">
												<td width="20%" align="center" class="line2"> Nama Peserta </td>
												<td width="12%" align="center" class="line2"> No Peserta </td>
												<td width="12%" align="center" class="line2"> Kelas </td>
												<td width="14%" align="center" class="line2"> Nama Ujian </td>
												<td width="7%" align="center" class="line2"> Benar </td>
												<td width="7%" align="center" class="line2"> Salah</td>
												<td width="7%" align="center" class="line2"> Kosong </td>
												<td width="7%" align="center" class="line2"> Nilai </td>
												<td width="7%" align="center" class="line2"> Skala </td>
												<td width="7%" align="center" class="line2"> Predikat </td>		
											</tr>
											<tr>
												<td align="center" class="line"> <?php echo $hasil->nama;?></td>
												<td align="center" class="line"> <?php echo $hasil->no_peserta;?></td>
												<td align="center" class="line"> <?php echo $hasil->nama_kelas;?></td>
												<td align="center" class="line"> <?php echo $hasil->nama_ujian;?></td>
												<td align="center" class="line"> <?php echo $hasil->p_benar;?></td>
												<td align="center" class="line"> <?php echo $hasil->p_salah;?></td>
												<td align="center" class="line"> <?php echo $hasil->p_kosong;?></td>
												<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($hasil->p_nilai, '0'), '.');echo $fnilai; ?>
												</td>					
												<td align="center" class="line"> <?php $fskala = rtrim(rtrim($hasil->k13, '0'), '.');echo $fskala; ?> </td>
												<td align="center" class="line3"> <?php echo $hasil->predikat;?></td>
											</tr>
										</table>
									<?php } ?>
								</div>
							</div>	
						</div>
						
						<div class="clear"></div>
						<div class="h20"></div>
						<div class="container">
							<div class="row" >
								<div class="col-md-6" >
									<div class="panel panel-default">
										<div class="panel-heading" style="background:#28A9E3;color:#fff;">PILIHAN JURUSAN</div>
										<div class="panel-body">
										
											Pilihan Jurusan 1 : <?php if (isset($jurusan1->kode_jurusan)) { echo $jurusan1->kode_jurusan.' - '.$jurusan1->pil_jurusan.' - '.$jurusan1->nama_univ;} else { echo "<span style='color:red;'>Siswa belum memilih</span>";}    ?><br/>
											Pilihan Jurusan 2 : <?php if (isset($jurusan2->kode_jurusan)) { echo $jurusan2->kode_jurusan.' - '.$jurusan2->pil_jurusan.' - '.$jurusan2->nama_univ; } else { echo "<span style='color:red;'>Siswa belum memilih</span>";}  ?><br/>
											Pilihan Jurusan 3 : <?php if (isset($jurusan3->kode_jurusan)) { echo $jurusan3->kode_jurusan.' - '.$jurusan3->pil_jurusan.' - '.$jurusan3->nama_univ; } else { echo "<span style='color:red;'>Siswa belum memilih</span>";} ?>
											<br/><br/>
											<a class="btn btn-primary btn-sm" href="<?php echo site_url('piljur/'.$this->session->userdata('user_id'));?>">Pilih Jurusan
									</a>
										</div>
									</div>	
								</div>
								<div class="col-md-6" >
									
									</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="h20"></div>
						<div class="container">
							<div class="row" >
								<div class="col-md-6" >		
									<div class="panel panel-default">
									<div class="panel-body">
									<p><span style='color:red;font-weight:bold;'>Note:</span> Apabila nilai tidak keluar, klik tombol <b>KIRIM ULANG</b> untuk mengirimkan kembali Jawaban Ujian.</p><br/>
									<button class="btn btn-success btn-sm" id="ref_butn">Kirim Ulang
										</button>
									</div>
									</div></div><div class="col-md-6" >	</div>
											<div class="col-md-12" >
									<a class="btn btn-warning btn-sm" href="<?php echo site_url('homesiswa')?>">Menu Utama
									</a>&nbsp;&nbsp;
									
									<a class="btn btn-danger btn-sm" href="<?php echo site_url('logout')?>">Logout
									</a>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>	
		
		<script language="javascript">
		
		var apl = '<?php echo base_url()."ajax/cek.php";?>';
		var no_copy = localStorage.getItem('nc');
		
		function cek() {
			$.ajax({
				type: "post",
				url: apl,
				data: {
					nocopy:no_copy,
				},
				success: function(data){
					alert(data);
				}
			});		
		}
		
		$(document).ready(function(){
			$("#ref_butn").click(function(){
				location.reload();
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