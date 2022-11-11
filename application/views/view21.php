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
									<h4>TAMBAH USER</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<center><?php echo $this->session->flashdata('pesan2');?></center>	
						<div class="container">
							<div class="row plr15" >
								
								<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('simpanuser');?>" method="POST">
									<div class="col-md-6">
									<div class="form-group">
											<label class="col-md-4">Tipe User</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php 
														$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddtipeuser;
													echo form_dropdown('role', $newoptions1,'3','onchange="check(this);" class="form-control input-sm" id="pil"'); ?>
												</div>
											</div>
										</div>
										
										<script type="text/javascript">		
										$(document).ready(function() {
																	$("#k5").hide();
																	$("#k7").hide();
																	$("#k9").hide();
																});
																function check() {
								var dropdown = document.getElementById("pil");
																	var current_value = dropdown.options[dropdown.selectedIndex].value;
																	if (current_value == "1") {
																	$("#k1").hide();
																	$("#k2").hide();
																	$("#k3").hide();
																	$("#k4").hide();
																	$("#k5").show();
																	$("#k6").hide();
																	$("#k7").show();
																	$("#k8").hide();
																	$("#k9").show();
																	} else
																	if (current_value == "2") {
																	$("#k1").hide();
																	$("#k2").hide();
																	$("#k3").hide();
																	$("#k4").hide();
																	$("#k5").show();
																	$("#k6").hide();
																	$("#k7").show();
																	$("#k8").hide();
																	$("#k9").show();
																	} else
																	if (current_value == "3") {
																	$("#k1").show();
																	$("#k2").show();
																	$("#k3").show();
																	$("#k4").show();
																	$("#k5").hide();
																	$("#k6").show();
																	$("#k7").hide();
																	$("#k8").show();
																	$("#k9").hide();
																	}
																}
															</script>
															
										<div class="form-group">
											<label class="col-md-4">Nama Lengkap</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="nama" class="form-control input-sm" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4" id="k8">No Peserta / Username</label><label class="col-md-4" id="k9">Username</label>
											<div class="col-md-8"> 
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="nopes" class="form-control input-sm" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Password</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="password" name="password" class="form-control input-sm" required>
												</div>
											</div>
										</div>
										<div class="form-group" id="k1">
											<label class="col-md-4">Kelas</label>
											<div class="col-md-8">    
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php 
														$newoptions = array('0' => '-- Silakan Pilih --') + $ddkelas;
													echo form_dropdown('id_kelas', $newoptions, '1', 'class="form-control input-sm"'); ?>
												</div>
											</div>
										</div>
										<div class="form-group" id="k2">
											<label class="col-md-4">Peminatan Jurusan</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php 
														$newoptions5 = array('0' => '-- Silakan Pilih --') + $ddpeminatan;
													echo form_dropdown('peminatan', $newoptions5, '', 'class="form-control input-sm"'); ?>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4">Email</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="email" class="form-control input-sm">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4" id="k4">No HP Siswa</label><label class="col-md-4" id="k5">No HP 1</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="hpsiswa" class="form-control input-sm">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4" id="k6">No HP Orang Tua</label><label class="col-md-4" id="k7">No HP 2</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="hportu" class="form-control input-sm">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Jenis Kelamin</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<select name="jkelamin" class="form-control input-sm">
													    <option value="NA" selected>-- Silakan Pilih --</option>
														<option value="L">Lelaki</option>
														<option value="P" >Perempuan</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Alamat</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="alamat" class="form-control input-sm">
												</div>
											</div>
										</div>
										<div class="form-group" id="k3">
											<label class="col-md-4">Asal Sekolah</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="sekolah" class="form-control input-sm">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Status</label>
											<div class="col-md-8">          
												<div class="tombolslide" style="margin-left:0px;"><input type="checkbox" id="tombolslide" name="status"><label for="tombolslide"></label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="panel panel-default">
													<div class="panel-heading" style="background:#FFB94A;color:#fff;">FOTO</div>
													<div class="panel-body text-center">
														<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:1px solid #AEAEAE;padding:5px;">
														<div class="h20"></div>
														<label>Pilih File Foto (maks 135 x 180px)</label><br>
														
														<input type="file" class="form-control" style="padding-bottom:40px;" name="foto_upload" />
														<div class="h10"></div>
														
														
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
									<div class="clear"></div>	
									<div class="col-md-6">
										<div class="form-group">  
											<div class="col-md-4">   
											</div>
											<div class="col-md-8">  
												<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('user');?>">Back </a>
											</div>
										</div>
									</div>
									<div class="col-md-6"></div>
								</form>				
							</div>	
						</div>										
						<div class="clear"></div>						
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