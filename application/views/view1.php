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
									<h4>BACKUP & RESTORE</h4>
								</div>
								<div class="clear"></div>	
								<div class="col-md-11 text-center" >
									<?php echo $error;?>
									<?php echo $this->session->flashdata('pesan');?>
									<?php echo $this->session->flashdata('pesan1');?>
								</div>
								<div class="col-md-1 text-center" ></div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						
						<div class="container">
							<div class="row">					
								<div class="col-md-2" >																					<div class="panel panel-default">
									<div class="panel-heading" style="background:#1B1464;color:#fff;">HAPUS DATABASE</div>
									<div class="panel-body text-center" style="background:#1B1464;">	
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_full');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Full</a></p>
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_siswa');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Siswa</a></p>
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_kelas');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Kelas</a></p>
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_jurusan');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Jurusan</a></p>
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_peminatan');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Peminatan</a></p>
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_soal');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Soal Ujian</a></p>
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_haji');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Hasil Ujian</a></p>	
										<p class="pb5"><a class="btn btn-sm" style="background:#f7a71e;color:#fff;" href="#" onclick="alertify.confirm('Backup terlebih dahulu sebelum menghapus. Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapus_log');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});">Login Session</a></p>
									</div>
								</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-4" >
									<div class="panel panel-default">
										<div class="panel-heading" style="background:#15519f;color:#fff;">BACKUP DATABASE</div>
										<div class="panel-body text-center">	
											<div class="col-md-5" >
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup');?>">Full</a></p>
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_user');?>">User</a></p>
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_kelas');?>">Kelas</a></p>
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_jurusan');?>">Jurusan</a></p>
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_peminatan');?>">Peminatan</a></p>
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_soal');?>">Soal Ujian</a></p>
												<p><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_haji');?>">Hasil Ujian</a></p>
												</div><vr><div class="col-md-7">
												<?php echo form_open_multipart('restore'); ?>
												<input type="file" class="form-control" style="padding-bottom:40px;"
												name="file_restore" id="file_restore" required>
												<div class="h10"></div>
												Pilih Tipe Database :
												<div class="h10"></div>
												
												<div class="col-md-6 text-left" >
													<p><input type="radio" name="dbase" value="0" ><label style="font-weight: 400;"><span><span></span></span>Full</label></p>
													<p><input type="radio" name="dbase" value="1"><label style="font-weight: 400;"><span><span></span></span>User</label></p>
													<p><input type="radio" name="dbase" value="2"><label style="font-weight: 400;"><span><span></span></span>Kelas</label></p>
													<p><input type="radio" name="dbase" value="5"><label style="font-weight: 400;"><span><span></span></span>Jurusan</label></p>
												</div>
												<div class="col-md-6 text-left" >
													<p><input type="radio" name="dbase" value="6"><label style="font-weight: 400;"><span><span></span></span>Peminatan</label></p>
													<p><input type="radio" name="dbase" value="3"><label style="font-weight: 400;"><span><span></span></span>Soal Ujian</label></p>
													<p><input type="radio" name="dbase" value="4"><label style="font-weight: 400;"><span><span></span></span>Hasil Ujian</label></p>
												</div>
												<div class="clear"></div>	
												
												
												<div class="h10"></div>
												<input class="btn btn-warning btn-sm" value="RESTORE" onclick="alertify.confirm('PERHATIAN!!<br/>Proses Restore akan menghapus seluruh data lama dan menggantinya dengan data baru.<br/>Pastikan FILE yang akan di Restore sesuai dengan TIPE DATABASE yang dipilih.<br/>Anda yakin ingin memprosesnya?<br/>',function(e){if(e) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"/>
												
												<?php echo form_close();?>
											</div>
										</div>	
									</div>	
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-3" >
									<div class="panel panel-default">
										<div class="panel-heading" style="background:#15519f;color:#fff;">BACKUP SOAL PER MATA PELAJARAN</div>
										<div class="panel-body text-center">	
											<form class="form-horizontal" action="<?php echo site_url('pbackup');?>" method="POST">
												Dari Bank Soal :
												<?php 
													$newoptions = array('0' => '-- Silakan Pilih --') + $ddujian;
												echo form_dropdown('id_ujian', $newoptions, '','class="form-control input-sm bulk"'); ?>
												<div class="h10"></div>
												<p>	<input class="btn btn-success btn-sm mr15" type="submit" value="Backup" /></p>
												
												</form>
												<hr>
												<?php echo form_open_multipart('prestore');?>
												
												
												
												<input type="file" class="form-control" style="padding-bottom:40px;"
												name="file_prestore" id="file_prestore" required>
												<div class="h10"></div>
												Ke Bank Soal :
												<?php 
												$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddujian;
												echo form_dropdown('id_ujian', $newoptions1, '', 'class="form-control input-sm bulk"','required="required"'); 
												?>
												
												<div class="h10"></div>										
												<input class="btn btn-warning btn-sm" value="RESTORE" onclick="alertify.confirm('PERHATIAN!!<br/>Proses Restore akan <i>menambahkan</i> soal baru ke bank soal<br/>Anda yakin ingin memprosesnya?<br/>',function(e){if(e) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"/>
												<?php echo form_close();?>
												</div>
												</div>
												</div>
												<div class="col-md-1"></div>
												<div class="clear"></div>		
												<div class="col-md-3" >
												<div class="panel panel-default">
												<div class="panel-heading" style="background:#15519f;color:#fff;">BACKUP GAMBAR SOAL</div>
												<div class="panel-body text-center">
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_gbr');?>">Backup </a></p>
												<hr>
												<p class="pb5">
												<?php echo form_open_multipart('restore_gbr');?>
												<input type="file" class="form-control" style="padding-bottom:40px;"
												name="file_gbr" id="file_gbr" required>
												<div class="h10"></div>										
												<input type="submit" class="btn btn-warning btn-sm" value="Restore"/>
												<?php echo form_close();?>
												</p>
												</div>
												</div>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-3" >						
												<div class="panel panel-default">
												<div class="panel-heading" style="background:#15519f;color:#fff;">BACKUP AUDIO SOAL</div>
												<div class="panel-body text-center">
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_audio');?>">Backup </a></p>
												<hr>
												<p class="pb5">
												<?php echo form_open_multipart('restore_audio');?>
												<input type="file" class="form-control" style="padding-bottom:40px;"
												name="file_audio" id="file_audio" required>
												<div class="h10"></div>										
												<input type="submit" class="btn btn-warning btn-sm" value="RESTORE"/>
												<?php echo form_close();?>
												</p>
												</div>
												</div>
												</div>	
												<div class="col-md-1"></div>
												<div class="col-md-3" >
												<div class="panel panel-default">
												<div class="panel-heading" style="background:#15519f;color:#fff;">BACKUP FOTO PROFIL</div>
												<div class="panel-body text-center">	
												<p class="pb5"><a class="btn btn-success btn-sm" href="<?php echo site_url('backup_profil');?>">Backup </a></p>
												<hr>
												<p class="pb5">
												<?php echo form_open_multipart('restore_profil');?>	
												<input type="file" class="form-control" style="padding-bottom:40px;"
												name="file_profil" id="file_profil" required>
												<div class="h10"></div>										
												<input type="submit" class="btn btn-warning btn-sm" value="RESTORE"/>
												<?php echo form_close();?>
												</p>
												</div>
												</div>
												</div>
												<div class="col-md-1"></div>
												<div class="clear"></div>	
												<div class="col-md-12 text-center" >
												</div>
												</div>
												</div>	
												</div>										
												<div class="clear"></div>						
												</div>
												</div>
												</div>
												
												
												<?php include 'view3.php'; 
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