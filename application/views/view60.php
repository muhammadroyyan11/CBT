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
	?>
	<?php  include 'view6.php'; ?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
				
			</div>
			<div class="col-md-8 plr15" >
				<div class="subjudul">
					<div class="container">
						<div class="row" >
							<div class="col-md-12 plr15 text-center" >
								<?php /*<span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Pendaftaran Ujian</span>*/ ?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					<center><?php echo $this->session->flashdata('pesan4');?></center>
					<div class="container">	
						<div class="row" >
					
							<div class="col-md-12">
								
								<div class="panel panel-default col-md-12" style="-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);">
									<div class="panel-heading text-center" style="background:#15519f;color:#fff;font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Pendaftaran Ujian</div>
									<div class="panel-body">	
										<div class="col-md-12 pb10">	
											
											<table border="0" cellpadding="2px" width="600px">
												<?php
													foreach ($products as $product){
														$id = $product['serial'];
														$name = $product['name'];
														$description = $product['description'];
														$price = $product['price'];
													?>
													<tr>
														<td><img src="<?php echo 'images/'.$product['picture']?>" style="max-width:130px;"/></td>
														<td><b><?php echo $name; ?></b><br />
															<?php echo $description; ?><br />
															Harga:<big style="color:green">
															Rp<?php echo $price; ?></big><br /><br />
															<?php
																echo form_open('keranjangbelanja');
																echo form_hidden('id', $id);
																echo form_hidden('name', $name);
																echo form_hidden('price', $price);
																echo form_submit('action', 'Beli');
																echo form_close();
															?>
														</td>
													</tr>
													<tr><td colspan="2"><hr size="1" /></td>
													<?php } ?>
												</table>
												
												
												
											</div>
											
											
											
											
											
										</div>
									</div>
									
								</div>
								
					

								
								
								
							</div>
						</div>
						<div class="clear"></div>
					</div>
					</div>	<div class="col-md-2" >
					
				</div>
			</div>
		</div>	
		
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