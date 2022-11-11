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
									<h4>TAMBAH SOAL</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row" >
								<?php
									echo form_open_multipart('simpansoal');
								?>
								<div class="col-md-12">
									<table width="100%" class="table-new" border="0" cellspacing="0">
										<tr>
											<td width="15%" class="line2">Detail Soal</td><td width="75%" align="center" class="line4"><textarea class="areajawaban" name="soal" id="soal"></textarea>
												<script type="text/javascript">
													CKEDITOR.replace( 'soal' );
												</script>
											</td>
										</tr>
										<tr>
											<td width="15%" align="right" class="line2">Upload Audio (max 8 MB) :</td><td align="left" class="line4"><input type="file" name="file_upload" /> </td>
										</tr> 	
									</table>
									<div class="h20" ></div>
									<table width="100%" class="table-new" border="0" cellspacing="0">
										<tr>
											<td width="15%" align="right" class="line2">Aktifkan Jawaban Singkat :</td><td width="75%" align="left" class="line4">																					
												<div class="tombolslide27" style="margin-left:0px;">
													<input type="checkbox" id="tombolslide27" name="essay" onchange="slide(this);"> 
													<label for="tombolslide27"></label>
												</div> 											
											</td>
										</tr> 	
									</table>
									<script type="text/javascript">	
										$(document).ready(function() {
											if (document.getElementById('tombolslide27').checked){$("#pil").hide();$("#pil1").show();} else {$("#pil").show();$("#pil1").hide();}
										});
										function slide() {
											if (document.getElementById('tombolslide27').checked){$("#pil").hide();$("#pil1").show();} else {$("#pil").show();$("#pil1").hide();}
										}
									</script>
									<div class="h20" ></div>
									
									<div id="pil">
										<table width="100%" class="table-new" border="0" cellspacing="0">
											<tr class="tr-head">
												<td width="15%" align="center" class="line2">Pilihan</td>
												<td width="75%" align="center" class="line2">Jawaban Soal</td>
											</tr>
											
											<tr>
												<td align="center" class="line4">A.</td><td align="center" class="line4"><textarea class="areajawaban" name="pil_a" id="pil_a"></textarea>
													<script type="text/javascript">
														CKEDITOR.replace( 'pil_a' );
													</script>
												</td>
											</tr>
											<tr>
												<td align="center" class="line4">B.</td><td align="center" class="line4"><textarea class="areajawaban" name="pil_b" id="pil_b"></textarea>
													<script type="text/javascript">
														CKEDITOR.replace( 'pil_b' );
													</script>
												</td>
											</tr>
											<tr>
												<td align="center" class="line4">C.</td><td align="center" class="line4"><textarea class="areajawaban" name="pil_c" id="pil_c"></textarea>
													<script type="text/javascript">
														CKEDITOR.replace( 'pil_c' );
													</script>
												</td>
											</tr>
											<tr>
												<td align="center" class="line4">D.</td><td align="center" class="line4"><textarea class="areajawaban" name="pil_d" id="pil_d"></textarea>
													<script type="text/javascript">
														CKEDITOR.replace( 'pil_d' );
													</script>
												</td>
											</tr>
											<tr>
												<td align="center" class="line4">E.</td><td align="center" class="line4"><textarea class="areajawaban" name="pil_e" id="pil_e"></textarea>
													<script type="text/javascript">
														CKEDITOR.replace( 'pil_e' );
													</script>
												</td>
											</tr>
										</table>	
										<div class="h20" ></div>
										<table width="100%" class="table-new" border="0" cellspacing="0">
											<tr>
												<td width="15%" align="right" class="line2">Kunci Jawaban :</td><td width="75%" align="left" class="line4">&nbsp;&nbsp;&nbsp;<input type="radio" name="jjrx" value="A"><label><span><span></span></span>A&nbsp;&nbsp;&nbsp;</label><input type="radio" name="jjrx" value="B"><label><span><span></span></span>B&nbsp;&nbsp;&nbsp;</label><input type="radio" name="jjrx" value="C"><label><span><span></span></span>C&nbsp;&nbsp;&nbsp;</label><input type="radio" name="jjrx" value="D"><label><span><span></span></span>D&nbsp;&nbsp;&nbsp;</label><input type="radio" name="jjrx" value="E"><label><span><span></span></span>E</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><span style="padding:2px 8px 5px 5px;border-radius:5px;background:#a90100;color:#fff;"><input type="radio" name="jjrx" value="*"><label><span><span></span></span>Anulir</label></span>								
											</td>											
												</td>
											</tr>
										</table>
									</div>
									<div id="pil1">
										<table width="100%" class="table-new" border="0" cellspacing="0">	
											<tr>
												<td width="15%" align="right" class="line2">Kunci Jawaban Singkat :</td>
												<td width="75%" align="left" class="line4">
												<input class="form-control input-sm" type="text" name="jjrx1"></td>
												</tr><tr>
												<td width="15%" align="right" class="line2"></td>
												<td width="75%" align="left" class="line4">
													<style>
														.pjk li {
														padding-left: 0;
														padding-bottom: 0;
														margin-left: 15px;										
														}
													</style>
													<br/><span style="color:red;"><b>PERHATIAN!</b><ul class="pjk"><li>Fitur jawaban singkat sebaiknya hanya terdiri dari satu atau dua buah kata.</li><li>Jawaban siswa dan kunci jawaban harus sama persis agar sistem dapat menghasilkan nilai.</li></ul></span><br/>
													</td>
												</tr>
											</table>
										</div>
										<div class="h20" ></div>
										<table width="100%" class="table-new" border="0" cellspacing="0">	
											<tr>
												<td width="15%" align="right" class="line2">Bobot Soal :</td><td width="75%" align="left" class="line4" colspan="3"><input class="form-control input-sm w50" type="text" name="bobot" value="1"></td>
											</tr>
											<tr>
												<td width="15%" align="right" class="line2">Kemampuan Yang Diuji :</td><td colspan="3" width="75%" align="left" class="line4"><input class="form-control input-sm" type="text" name="kyd"></td>
											</tr>
										</table>
									</div>
									<div class="clear"></div>	
									<div class="h20" ></div>
									<div class="col-md-12 text-center">
										<input type="hidden" name="id_ujian" >
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