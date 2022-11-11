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
									<h4>SETTING</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15" >
								
								
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-4">Logo</label>
										<div class="col-md-8">
											<div class="panel panel-default">
												<div class="panel-heading" style="background:#FFB94A;color:#fff;">UPLOAD</div>
												<div class="panel-body text-center">
													<div class="col-md-8">
													<?php echo form_open_multipart('simpanlogo');?>
													
													<label>Pilih File Logo (max width 120px)</label><br>
													
													<input type="file" class="form-control" style="padding-bottom:40px;" name="logo_upload" />
													<div class="h10"></div>
													<button class="btn btn-warning btn-sm" type="submit" name="submit">UPLOAD</button><br/><br/>
													<?php echo form_close();?>
													</div><div class="col-md-4">
													<?php if ($teks->logo == '')
													{ ?>
													<img src="<?php echo base_url() . 'assets/css/images/jayvyn-host.png' ?>" style="border:1px solid #AEAEAE;padding:5px;max-width:80px;">
													<?php } else
													{ ?>
													<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/css/images/' . $teks->logo ?>" style="border:1px solid #AEAEAE;padding:5px;max-width:80px;">	
												<?php } ?>
												<p><a href="<?php echo site_url('hapuslogo');?>">Hapus</a></p>
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6">
								</div>
								<div class="clear"></div>
	
								<form class="form-horizontal" action="<?php echo site_url('simpansetting');?>" method="POST">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-4">Teks Header 1</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													
													<input class="form-control input-sm" type="text" name="teks1" value="<?php echo $teks->teks1;?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Teks Header 2</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													
													<input class="form-control input-sm" type="text" name="teks2" value="<?php echo $teks->teks2;?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Teks Header 3</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													
													<input class="form-control input-sm" type="text" name="teks3" value="<?php echo $teks->teks3;?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Aktifkan IP Mode</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php if ($teks->ipp=="1") 
														{ ?>
														<select name="ipp" class="form-control input-sm" style="width:100px;">
															<option value="1" selected>Ya</option>    
															<option value="0">Tidak</option> 
														</select>
														<?php }
														else
														{ ?>
														<select name="ipp" class="form-control input-sm" style="width:100px;">
															<option value="1" >Ya</option>    
															<option value="0" selected>Tidak</option> 
														</select>
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Aktifkan Session Mode</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php if ($teks->sess=="1") 
														{ ?>
														<select name="sess" class="form-control input-sm" style="width:100px;">
															<option value="1" selected>Ya</option>    
															<option value="0">Tidak</option> 
														</select>
														<?php }
														else
														{ ?>
														<select name="sess" class="form-control input-sm" style="width:100px;">
															<option value="1" >Ya</option>    
															<option value="0" selected>Tidak</option> 
														</select>
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Aktifkan Halaman Pop Up</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php if ($teks->page=="1") 
														{ ?>
														<select name="hal" class="form-control input-sm" style="width:100px;">
															<option value="1" selected>Ya</option>    
															<option value="0">Tidak</option> 
														</select>
														<?php }
														else
														{ ?>
														<select name="hal" class="form-control input-sm" style="width:100px;">
															<option value="1" >Ya</option>    
															<option value="0" selected>Tidak</option> 
														</select>
													<?php } ?>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4">Lisensi Software</label>
											<div class="col-md-8">
												<div class="input-group">
												<?php echo $teks->lc;?> User
												</div>
											</div>
										</div>
										
										
										
										<div class="form-group">  
											<div class="col-md-4">   
											</div>
											<div class="col-md-8">  
												<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" />
											</div>
										</div>
									</div>
									<div class="col-md-6">
										
									</div>
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