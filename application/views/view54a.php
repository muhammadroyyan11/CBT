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
									<h4>SETTING IRT</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15" >
								
								<form class="form-horizontal" action="<?php echo site_url('simpansa2');?>" method="POST">
									<div class="col-md-6">
										TINGKAT KESUKARAN DAN BATAS RENTANG<br/><br/>
										
										<table>
										<tr class="tr-head">
										<td align="center" class="line2" width="30%">Kategori</td>
										<td width="5%"></td>
										<td width="45%" align="center" class="line2" colspan=3>Batas Rentang (%)</td>
										<td width="5%"> </td>
										<td width="15%" align="center" class="line2">Faktor Pengali</td>
										</tr>
											<tr>
												<td>
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														
														<input class="form-control input-sm" type="text" name="ak1" value="<?php echo $teks->ak1;?>">
													</div>	
												</td>
												<td></td>
												<td width="15%">
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r1a" value="<?php echo $teks->r1a;?>">
														</div>
													</td>
													<td width="15%" align="center">> AND <=</td>
													<td width="15%">
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r1b" value="<?php echo $teks->r1b;?>">
														</div>
													</td>
											<td></td>
													
													<td>
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="an1" value="<?php echo $teks->an1;?>">
														</div>		
													</td>
												</tr>
												<tr>
													<td>
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="ak2" value="<?php echo $teks->ak2;?>">
														</div>	
													</td>
													<td></td>
													<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r2a" value="<?php echo $teks->r2a;?>">
														</div>
													</td>
													<td align="center">> AND <=</td>
													<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r2b" value="<?php echo $teks->r2b;?>">
														</div>
													</td>
													<td></td>
														<td>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																</div>
																
																<input class="form-control input-sm" type="text" name="an2" value="<?php echo $teks->an2;?>">
															</div>		
														</td>
													</tr>
													<tr>
														<td>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																</div>
																
																<input class="form-control input-sm" type="text" name="ak3" value="<?php echo $teks->ak3;?>">
															</div>	
														</td>
														<td></td>
														<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r3a" value="<?php echo $teks->r3a;?>">
														</div>
													</td>
													<td align="center">> AND <=</td>
													<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r3b" value="<?php echo $teks->r3b;?>">
														</div>
													</td>
													<td></td>
															<td>
																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																	</div>
																	
																	<input class="form-control input-sm" type="text" name="an3" value="<?php echo $teks->an3;?>">
																</div>		
															</td>
														</tr>
														<tr>
														<td>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																</div>
																
																<input class="form-control input-sm" type="text" name="ak4" value="<?php echo $teks->ak4;?>">
															</div>	
														</td>
														<td></td>
														<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r4a" value="<?php echo $teks->r4a;?>">
														</div>
													</td>
													<td align="center">> AND <=</td>
													<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r4b" value="<?php echo $teks->r4b;?>">
														</div>
													</td>
													<td></td>
															<td>
																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																	</div>
																	
																	<input class="form-control input-sm" type="text" name="an4" value="<?php echo $teks->an4;?>">
																</div>		
															</td>
														</tr>
														<tr>
														<td>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																</div>
																
																<input class="form-control input-sm" type="text" name="ak5" value="<?php echo $teks->ak5;?>">
															</div>	
														</td>
														<td></td>
														<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r5a" value="<?php echo $teks->r5a;?>">
														</div>
													</td>
													<td align="center">=> AND <=</td>
													<td>
																																								<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="r5b" value="<?php echo $teks->r5b;?>">
														</div>
													</td>
													<td></td>
															<td>
																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																	</div>
																	
																	<input class="form-control input-sm" type="text" name="an5" value="<?php echo $teks->an5;?>">
																</div>		
															</td>
														</tr>
														</table>
														<br/>	
														<div class="form-group plr15">
											<label class="col-md-3">Nilai Maksimal</label>
											<div class="col-md-3">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="skormax" value="<?php echo $teks->skormax;?>" class="form-control input-sm">
												</div>
											</div>
											<div class="col-md-6"></div>
										</div>
														<div class="form-group plr15">
											<label class="col-md-3">Nilai Minimal</label>
											<div class="col-md-3">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="skor" value="<?php echo $teks->skor;?>" class="form-control input-sm">
												</div>
											</div>
											<div class="col-md-6"></div>
										</div>
										
														
														
														<br/>								
															<div class="form-group">  
																<div class="col-md-12 plr15">  
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