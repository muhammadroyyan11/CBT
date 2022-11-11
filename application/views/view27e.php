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
		<?php include 'view5.php'; 
		?>
		
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
									<h4>EDIT SOAL ESSAY</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row" >
								<?php
									echo form_open_multipart('simpaneditsoal_e');
								?>
								<div class="col-md-12">
									<table width="100%" class="table-new" border="0" cellspacing="0">
										<tr>
											<td width="15%" class="line2">Detail Soal</td><td width="75%" align="center" class="line4"><textarea class="areajawaban" name="soal" id="soal"><?php echo $soal->soal;?></textarea>
												<script type="text/javascript">
													CKEDITOR.replace( 'soal' );
												</script>
											</td>
										</tr>
										<tr>
											<td width="15%" align="right" class="line2">Upload Audio (max 8 MB) :</td><td align="left" class="line4"><input type="file" name="file_upload" /></td>
										</tr> 	
									</table>
		
							
								<div class="h20" ></div>
								<table width="100%" class="table-new" border="0" cellspacing="0">	
									
									<tr>
										<td width="15%" align="right" class="line2">Kemampuan Yang Diuji :</td><td width="75%" align="left" class="line4"><input class="form-control input-sm" type="text" name="kyd" value="<?php echo $soal->kyd;?>"></td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>	
							<div class="h20" ></div>
							<div class="col-md-12 text-center">
								<input type="hidden" name="id_ujian" value="<?php echo $soal->id_ujian;?>" />
								<input type="hidden" name="id_soal" value="<?php echo $soal->id_soal;?>" />
								<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" />
							</div>
							<?php
								echo form_close();
							?> 		
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