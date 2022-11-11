

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
	if(isset($_SESSION['user_id'])){ //jika variabel berisi id_user
	?>
	<?php include 'view6.php';?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
				<?php include 'view41.php'; ?>
			</div>
			<div class="col-md-10 plr15" >
				<div class="subjudul">
					<div class="container">
						<div class="row" >
							<div class="col-md-12 plr15" >
								<h4 style="text-transform:uppercase;"><?php echo "Selamat datang <strong>".$this->session->userdata('nama')."</strong>"; ?></h4>
							</div>
						</div>
					</div>
				</div>				
				<div class="clear"></div>		
				<div class="wrapper">	
					<div class="container">
						<div class="row" >
							<div class="col-md-12" >
								<div class="panel panel-default">
									<div class="panel-heading" style="background:#28A9E3;color:#fff;">DASHBOARD</div>
									<div class="panel-body text-center">
										<p style="font-weight:bold;font-size:36px;color:red;">PERHATIAN !!!</p>
										<p style="font-weight:bold;">SEBELUM MEMULAI UJIAN PASTIKAN BAHWA DATA DIBAWAH INI ADALAH BENAR DIRI ANDA</p>
										
										<div class="clear h20"></div>	
										<div class="col-md-3" ></div>
										<div class="col-md-6 text-left" >
											<div class="panel panel-default">
												<div class="panel-heading" style="background:#FFB94A;color:#fff;">PESERTA UJIAN</div>
												<div class="panel-body" style="background:#FFFFCB;">
													<table width="100%">
														<tr>
															<td width="30%" valign="top">
																<?php if( !$this->session->userdata('foto')) 
																	{ ?>
																	<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:1px solid #AEAEAE;padding:5px;background:#fff;">
																	<?php } else
																	{ ?>
																	<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/kcfinder/upload/foto/' . $this->session->userdata('foto') ?>" style="border:1px solid #AEAEAE;padding:5px;max-width:135px;">	
																<?php } ?>
															</td>
															<td width="3%"></td>
															<td width="67%" valign="top">
																<p style="font-weight:bold;">NAMA PESERTA</p>
																<p><?php echo "<span style='font-size:18px;'>".strtoupper($this->session->userdata('nama'))."</span>"; ?></p>
																<p style="font-weight:bold;">NO PESERTA</p>
																<p><?php echo "<span style='font-size:18px;'>".strtoupper($this->session->userdata('no_peserta'))."</span>"; ?></p>
																<p style="font-weight:bold;">KELAS</p>
																<p><?php echo "<span style='font-size:18px;'>".strtoupper($this->session->userdata('namakelas'))."</span>"; ?></p>
																<p style="font-weight:bold;">PEMINATAN JURUSAN</p>
																<p><?php echo "<span style='font-size:18px;'>".strtoupper($this->session->userdata('namapeminatan'))."</span>"; ?></p>
																<p style="font-weight:bold;">ASAL SEKOLAH</p>
																<p><?php echo "<span style='font-size:18px;'>".strtoupper($this->session->userdata('sekolah'))."</span>"; ?></p>
															</td>
														</tr>
													</table>
													
												</div>
											</div>
										</div>
										<div class="col-md-3" ></div>
									</div>
								</div>
							</div>	
						</div>	
					</div>	
					<div class="clear"></div>						
				</div>
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