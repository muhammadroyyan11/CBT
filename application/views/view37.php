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
	if(isset($_SESSION['user_id'])) { //jika variabel berisi id_user
		if (($_SESSION['role'] == 1) or ($_SESSION['role'] == 2)) {
		?>
		<?php include 'view5.php'; ?>
		
		<script language="javascript">
			$(document).ready(function(){
				$(function() {
					$( "#terdaftar" ).datepicker({dateFormat: 'yy-mm-dd'});
				});
			}
			)
			
		</script>
		
		<div class="container">
			<div class="row" >	
				<div class="col-md-2" >
					<?php include 'view40.php'; ?>
				</div>
				<div class="col-md-10 plr15" >
					<div class="subjudul">
						<div class="container">
							<div class="row" >
								<div class="col-md-12 plr15" >
									<h4>EDIT HASIL SISWA</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15" >
								
								<form class="form-horizontal" action="<?php echo site_url('simpanip');?>" method="POST">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-4">Nama Peserta</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input class="form-control input-sm" type="text" name="nama" value="<?php echo $proses->nama;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">No Peserta</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input class="form-control input-sm" type="text" name="nopes" value="<?php echo $proses->no_peserta;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">IP Address</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input class="form-control input-sm" type="text" name="ip" value="<?php echo $proses->ip;?>" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Jawaban Siswa</label>
											<div class="col-md-8">
												<textarea class="form-control input-sm" name="jawaban"  rows="5"><?php echo $proses->hasil_jawaban;?></textarea>
												
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Hasil Penilaian</label>
											<div class="col-md-8">
												<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
													<tr class="tr-head">
														<td width="10%" align="center" class="line2"> Benar </td>
														<td width="10%" align="center" class="line2"> Salah</td>
														<td width="10%" align="center" class="line2"> Kosong </td>
														<td width="10%" align="center" class="line2"> Nilai </td>
														<td width="10%" align="center" class="line2"> Skala </td>
														<td width="10%" align="center" class="line2"> Predikat </td>
													</tr>
													<tr>
														<td align="center" class="line"> <?php echo $proses->p_benar;?></td>
														<td align="center" class="line"> <?php echo $proses->p_salah;?></td>
														<td align="center" class="line"> <?php echo $proses->p_kosong;?></td>
														<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($proses->p_nilai, '0'), '.');echo $fnilai;?></td>					
														<td align="center" class="line"> <?php $fskala = rtrim(rtrim($proses->k13, '0'), '.');echo $fskala;?> </td>
														<td align="center" class="line3"> <?php echo $proses->predikat;?></td>
													</tr>
												</table>
											</div>
										</div>
										<div class="form-group">  
											<div class="col-md-4">   
											</div>
											<div class="col-md-8">  			
												<input type="hidden" name="id_proses" value="<?php echo $proses->id_proses;?>" />
												<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('closeip');?>">Close </a>
											</div>
										</div>
									</div>
									<div class="col-md-6">			
									</div>
								</form>				
							</div>	
						</div>										
						<div class="clear"></div>		
						<div class="garis"></div>
						<div class="container">
							<div class="row" >
								<div class="col-md-6">  	
									<form action="<?php echo site_url('proses');?>" method="POST">
										<input type="hidden" name="nc" value="<?php echo $proses->no_copy;?>" />
										<input type="hidden" name="idu" value="<?php echo $proses->id_ujian;?>" />
										<input type="hidden" name="id" value="<?php echo $proses->id;?>" />
										<B>MEMPROSES ULANG PENILAIAN HASIL UJIAN SISWA</B><BR/><BR/>
										Fitur berikut akan memproses ulang penilaian terhadap siswa <b><?php echo $proses->nama;?></b>, untuk memperbaiki kesalahan yang mungkin terjadi saat proses penilaian awal.
										<br/> <br/> 						
										<input onclick="alertify.confirm('Anda yakin ingin memprosesnya?<br/>',function(f){if(f) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});" class="btn btn-success btn-sm mr15" value="Proses" />
									</form>
								</div>
								<div class="col-md-6">  	
									<form action="<?php echo site_url('batal');?>" method="POST">
										<input type="hidden" name="nc" value="<?php echo $proses->no_copy;?>" />
										<B>MEMBATALKAN PENILAIAN HASIL UJIAN SISWA</B><BR/><BR/>
										Fitur berikut akan membatalkan penilaian terhadap siswa <b><?php echo $proses->nama;?></b>, yang disebabkan siswa tidak sengaja menekan tombol selesai sebelum waktunya atau kondisi lainnya.
										<br/> <br/> 						
										<input onclick="alertify.confirm('Anda yakin ingin memprosesnya?<br/>',function(f){if(f) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});" class="btn btn-success btn-sm mr15" value="Proses" />
									</form>
								</div>
							</div>
						</div>
						<div class="clear"></div>		
						<div class="garis"></div>
						<div class="container">
							<div class="row" >
								<div class="col-md-12">  
									<form action="<?php echo site_url('proses');?>" method="POST">
										<input type="hidden" name="nc" value="<?php echo $proses->no_copy;?>" />
										<input type="hidden" name="idu" value="<?php echo $proses->id_ujian;?>" />
										<input type="hidden" name="id" value="<?php echo $proses->id;?>" />
										<input type="hidden" name="stat" value="1" />
										<B>MEMPROSES PAKSA HASIL UJIAN SISWA</B><BR/><BR/>
										Fitur berikut akan memaksa dilakukannya proses penilaian terhadap siswa <b><?php echo $proses->nama;?></b> ketika ujian sedang berlangsung.<br/>
										Secara otomatis siswa tersebut akan logout dari aplikasi cbt dan tidak lagi dapat mengikuti ujian.<br/><br/>
										Berikan keterangan pada kolom dibawah ini alasan ujian dihentikan.<br/><br/> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
											</div>
											<input class="form-control input-sm" type="text" name="keterangan" value="<?php echo $proses->keterangan;?>" placeholder="Contoh: menyontek dan sebagainya." required>
										</div>
										<br/>
										<input class="btn btn-danger btn-sm mr15" value="Proses" onclick="alertify.confirm('Anda yakin ingin memprosesnya?<br/>',function(e){if(e) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"/>
									</form>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include 'view3.php'; ?>
		<?php
		}
		else
		{
		?>		
		<?php include 'view5.php'; ?>
		<div class="wrapper">
			<div class="container">	
				<div class="row" >
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background:#FFB94A;color:#fff;">PERINGATAN</div>
							<div class="panel-body text-center">
								<p>Anda harus login sebagai <b>Administrator</b>.  </p><br/><p><a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>">Login</a></p>
							</div></div></div>
							<div class="col-md-4"></div>
				</div>
			</div>
		</div>
		<?php
		}
		}else{
	?>
	<?php include 'view5.php'; ?>
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