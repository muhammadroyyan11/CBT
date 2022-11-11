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
									<h4>SETTING ANALISA MODEL A</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15" >
								
								<form class="form-horizontal" action="<?php echo site_url('simpansa');?>" method="POST">
									<div class="col-md-6">
										TINGKAT KESUKARAN DAN BATAS RENTANG (%)<br/><br/>
										
										<table>
											<tr>
												<td>
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														
														<input class="form-control input-sm" type="text" name="k1" value="<?php echo $teks->k1;?>">
													</div>	
												</td>
												<td width="20px"></td>
												<td>0 > AND <=</td>
													<td width="20px"></td>
													<td>
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="p1" value="<?php echo $teks->p1;?>">
														</div>		
													</td>
												</tr>
												<tr>
													<td>
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>
															
															<input class="form-control input-sm" type="text" name="k2" value="<?php echo $teks->k2;?>">
														</div>	
													</td>
													<td width="20px"></td>
													<td><?php echo $teks->p1;?> > AND <=</td>
														<td width="20px"></td>
														<td>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																</div>
																
																<input class="form-control input-sm" type="text" name="p2" value="<?php echo $teks->p2;?>">
															</div>		
														</td>
													</tr>
													<tr>
														<td>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																</div>
																
																<input class="form-control input-sm" type="text" name="k3" value="<?php echo $teks->k3;?>">
															</div>	
														</td>
														<td width="20px"></td>
														<td><?php echo $teks->p2;?> > AND <=</td>
															<td width="20px"></td>
															<td>
																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																	</div>
																	
																	<input class="form-control input-sm" type="text" name="p3" value="<?php echo $teks->p3;?>">
																</div>		
															</td>
														</tr>
														<tr>
															<td>
																<div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																	</div>
																	
																	<input class="form-control input-sm" type="text" name="k4" value="<?php echo $teks->k4;?>">
																</div>	
															</td>
															<td width="20px"></td>
															<td><?php echo $teks->p3;?> > AND <=</td>
																<td width="20px"></td>
																<td>
																	<div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																		</div>
																		
																		<input class="form-control input-sm" type="text" name="p4" value="<?php echo $teks->p4;?>">
																	</div>		
																</td>
															</tr>
															</table>	<br/>								
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