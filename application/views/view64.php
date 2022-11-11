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
									<h4>EDIT PRODUK</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15" >
								
								<form class="form-horizontal" action="<?php echo site_url('simpaneditproduk');?>" enctype="multipart/form-data" method="POST">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-4">ID Produk</label>
											<div class="col-md-8">
												<?php echo $produk->serial;?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Nama Produk</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													
													<input class="form-control input-sm" type="text" name="nama_produk" value="<?php echo $produk->name;?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Deskripsi</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													
													<textarea class="form-control input-sm" type="text" name="deskripsi"><?php echo $produk->description;?></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Harga Rp.</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													
													<input class="form-control input-sm" type="text" name="harga" value="<?php echo $produk->price;?>">
												</div>
											</div>
										</div>
										<div class="form-group  text-left">
											<label class="col-md-4">Foto Produk <br/>(maks 130 x 180px)</label>
											<div class="col-md-8">
												<div class="input-group">
												<?php if ($produk->picture == '')
																{ ?>
																<img src="<?php echo base_url() . 'assets/css/images/produk.jpg' ?>" style="border:1px solid #AEAEAE;padding:5px;">
																<?php } else
																{ ?>
																<img class="img-responsive" src="<?php echo base_url() . 'images/' . $produk->picture ?>" style="border:1px solid #AEAEAE;padding:5px;max-width:135px;">	
															<?php } ?>
															<p><a href="<?php echo site_url('hapusfotoproduk/'.$produk->serial);?>">Hapus</a></p>
															<div class="h20"></div>
															<input type="file" class="form-control" style="padding-bottom:40px;" name="foto_upload" />
													
												</div>
											</div>
										</div>
										
										<div class="form-group">  
											<div class="col-md-4">   
											</div>
											<div class="col-md-8">  
												<input type="hidden" name="id_produk" value="<?php echo $produk->serial;?>" />
												<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('produk');?>">Back </a>
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