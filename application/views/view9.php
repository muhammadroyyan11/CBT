

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
				
			</div>
			<div class="col-md-8 plr15" >
				
				<div class="wrapper">	
					<div class="container">
						<div class="row" >
							<div class="col-md-12" >
								
								
								
								
								<p style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;text-align:center">Data Peserta Ujian</p><br/>
								
								
								<div class="col-md-3" ></div>
								<div class="col-md-6 text-center" style="color:#fff;" >
									
									
									
									<table width="100%" style="border-collapse: collapse;border-radius:1em; overflow: hidden;-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);">
										<tr>
											<td width="30%" valign="top" style="background:#15519f;padding:50px;">
												<?php if( !$this->session->userdata('foto')) 
													{ ?>
													<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:3px solid #AEAEAE;margin-right:10px;background:#fff;width:80px;height:80px;border:3px solid #fff;border-radius:50%;">
													<?php } else
													{ ?>
													<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/kcfinder/upload/foto/' . $this->session->userdata('foto') ?>" style="border:3px solid #AEAEAE;margin-right:10px;background:#fff;width:80px;height:80px;border:3px solid #fff;border-radius:50%;">	
												<?php } ?>
												<br/><br/>
												<p style="font-size:10px;">Nama Peserta</p>
												<p><?php echo "<span style='font-size:18px;font-weight:bold;'>".$this->session->userdata('nama')."</span>"; ?></p>
												<p style="font-size:10px;margin-top:10px;">Nomor Peserta</p>
												<p><?php echo "<span style='font-size:18px;font-weight:bold;'>".$this->session->userdata('no_peserta')."</span>"; ?></p>
												<p style="font-size:10px;margin-top:10px;">Asal Kelas</p>
												<p><?php echo "<span style='font-size:18px;font-weight:bold;'>".$this->session->userdata('namakelas')."</span>"; ?></p>
											</td>
											<td width="3%"></td>
											<td width="67%" valign="top" align="left" style="background:#fff;padding:60px 20px 20px 20px;color:#333;">
												
												
												<p style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;text-align:left;padding:0 0 10px 10px;">Pilihan Jurusan</p>
												<?php
													$this->db->select('*');
													$this->db->from('jurusan');
													$this->db->where('kode_jurusan', $this->session->userdata('jur1'));
													$query1 = $this->db->get ();
													if(empty($query1->result()))
													{
													?>
													
													<table width="100%" style="border-collapse: collapse;border-radius:1em; overflow: hidden;"><tr><td style="background:#78ccd0;padding:10px;">
														<p><?php echo "<span style='font-size:18px;font-weight:bold;'>1. Belum dipilih</span>"; ?></p>
														</td></tr><tr><td style="background:#15519f;color:#fff;padding:5px 10px 5px 24px;">
														
													</td></tr></table>
													<?php
														} else {
														$qrow1 = $query1->result();
														$row1 = $qrow1[0];
														$piljur1 = $row1->pil_jurusan;
														$unijur1 = $row1->nama_univ;
													?>
													
													<table width="100%" style="border-collapse: collapse;border-radius:1em; overflow: hidden;"><tr><td style="background:#78ccd0;padding:10px;">
														<p><?php echo "<span style='font-size:18px;font-weight:bold;'>1. ".$piljur1."</span>"; ?></p>
														</td></tr><tr><td style="background:#15519f;color:#fff;padding:5px 10px 5px 24px;">
														<p><?php echo "<span style='font-size:10px;'>".$unijur1."</span>"; ?></p>
													</td></tr></table>
													<?php
													}
												?>
												
												<br/>
												
												<?php
													
													$this->db->select('*');
													$this->db->from('jurusan');
													$this->db->where('kode_jurusan', $this->session->userdata('jur2'));
													
													$query2 = $this->db->get ();
													if(empty($query2->result()))
													{ ?>
													
													<table width="100%" style="border-collapse: collapse;border-radius:1em; overflow: hidden;"><tr><td style="background:#78ccd0;padding:10px;">
														<p><?php echo "<span style='font-size:18px;font-weight:bold;'>2. Belum dipilih</span>"; ?></p>
														</td></tr><tr><td style="background:#15519f;color:#fff;padding:5px 10px 5px 24px;">
														
													</td></tr></table>
													<?php
														
														} else {
														$qrow2 = $query2->result();
														$row2 = $qrow2[0];
														$piljur2 = $row2->pil_jurusan;
														$unijur2 = $row2->nama_univ;
														
													?>
													
													<table width="100%" style="border-collapse: collapse;border-radius:1em; overflow: hidden;"><tr><td style="background:#78ccd0;padding:10px;">
														<p><?php echo "<span style='font-size:18px;font-weight:bold;'>2. ".$piljur2."</span>"; ?></p>
														</td></tr><tr><td style="background:#15519f;color:#fff;padding:5px 10px 5px 24px;">
														<p><?php echo "<span style='font-size:10px;'>".$unijur2."</span>"; ?></p>
													</td></tr></table>
													
													<?php
													}
												?>
												
												
											</td>
										</tr>
									</table>
									
									<br/><br/>
									<center><a style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;background:#f7a71e;padding:10px 50px;color:#fff;border-radius:5px;" href="<?php echo site_url('pendaftaranujian')?>">
										Daftar Ujian Sekarang
									</a>
									</center>
								</div>
								<div class="col-md-3" ></div>
								
								
							</div>	
						</div>	
					</div>	
					<div class="clear"></div>						
				</div>
			</div><div class="col-md-2" ></div>	
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