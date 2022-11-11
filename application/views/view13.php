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
									<h4>LAPORAN HASIL UJIAN</h4>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
					
					
					<div class="wrapper">	
						
						<div class="container">
							<div class="row" >
								
								<div class="col-md-8">
									<form action="<?php echo site_url('carinama');?>" method="POST"> 
										<div class="col-md-5 pb10">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
												<input type="text" placeholder="Pencarian berdasarkan nama" name="nama" class="form-control input-sm bulk" size="16"> 
											</div>
										</div>
										<div class="col-md-1 w10"></div>
								
											<div class="col-md-1 " style="margin-bottom:20px;"> 
											
											<div class="tombolslide" style="margin-left:0px;">
												<input type="checkbox" id="tombolslide1" name="multimapel1" value="1"> 
												<label for="tombolslide1"></label>
												<span style="font-size:10px;">Multi/UTBK</span>
											</div>  
										</div>
										<div class="col-md-1 w10">  </div>
										<div class="col-md-2">  
											
											<input class="btn btn-success btn-sm mr15" type="submit" value="CARI" />
										</div>
										
										<div class="col-md-2">  
										</div>
									</form>
								</div>
								<div class="col-md-4 text-right" >
									
								</div>
							</div>
						</div>	
						<div class="garis" ></div>
							
						<center><?php echo $this->session->flashdata('pesan4');?></center>
						<form class="form-horizontal" action="<?php echo site_url('cari');?>" method="POST">
							
							<div class="container">	
								<div class="row" >
									
									
									
									<div class="col-md-4 pb10">
										
										<div class="col-md-11">
											
											<?php 
												$newoptions = array('0' => '-- Pilih Kelas --') + $ddkelas;
											echo form_dropdown('id_kelas', $newoptions, set_value('id_kelas', $this->session->userdata('idkelas')), 'class="form-control input-sm bulk kelas"'); ?>
										</div>
										<div class="col-md-1"></div>
									</div>
									
									
									
									
									<div class="col-md-4 pb10">
										
										<div class="col-md-11">          
											
											<?php 
												$newoptions1 = array('0' => '-- Pilih Nama Ujian --') + $ddujian;
											echo form_dropdown('id_ujian', $newoptions1, set_value('id_ujian', $this->session->userdata('idujian')), 'class="form-control input-sm bulk ujian"'); ?>
										</div>
										<div class="col-md-1"></div>
									</div>
									
									
									<div class="col-md-4 pb10">									
										
										<div class="col-md-11"> 
										
											<?php 
											
											$newoptions2 = array('0' => '-- Pilih Sekolah --' ) + $ddsekolah;
											echo form_dropdown('sekolah', $newoptions2, set_value('sekolah', $this->session->userdata('sekolah')), 'class="form-control input-sm bulk sekolah" '); ?>
										</div>
										<div class="col-md-1"></div>
									</div>
									
									<div class="clear"></div>
									
									
									<div class="col-md-4 pb10">
										
										<div class="col-md-11">
											
											<div class="input-group date mulai" data-date-format="dd M yyyy - hh:ii" data-link-field="dtp_input1">
												<input class="form-control" placeholder="Tanggal dan Jam Mulai Ujian" size="16" type="text" value="<?php if ($this->session->userdata('wmulai')==''){$this->session->userdata('wmulai');} else { echo date('d M Y - H:i',strtotime($this->session->userdata('wmulai')));} ?>" readonly>
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
											</div>
											<input type="hidden" name="wmulai" id="dtp_input1" value="<?php echo $this->session->userdata('wmulai'); ?>" /> 
											
											
										</div>
										
										<script type="text/javascript">
											$('.mulai').datetimepicker({
												//language:  'fr',
												weekStart: 1,
												todayBtn:  1,
												autoclose: 1,
												todayHighlight: 1,
												startView: 2,
												forceParse: 0,
												showMeridian: 1
											});
										</script>
										<div class="col-md-1"></div>
									</div>
									
									<div class="col-md-4 pb10">
										
										<div class="col-md-11">          
											<div class="input-group date selesai" data-date-format="dd M yyyy - hh:ii" data-link-field="dtp_input2">
												<input class="form-control" placeholder="Tanggal dan Jam Selesai Ujian" size="16" type="text" value="<?php if ($this->session->userdata('wakhir')==''){$this->session->userdata('wakhir');} else { echo date('d M Y - H:i',strtotime($this->session->userdata('wakhir')));} ?>" readonly>
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
											</div>
											<input type="hidden" name="wakhir" id="dtp_input2" value="<?php echo $this->session->userdata('wakhir'); ?>" /> 
											<script type="text/javascript">
												$('.selesai').datetimepicker({
													//language:  'fr',
													weekStart: 1,
													todayBtn:  1,
													autoclose: 1,
													todayHighlight: 1,
													startView: 2,
													forceParse: 0,
													showMeridian: 1
												});
											</script>
										</div>
										<div class="col-md-1"></div>
									</div>
									
									
									<div class="col-md-4 pb10">									
										
										<div class="col-md-2" style="margin-bottom:20px;"> 
										    
											<div class="tombolslide" style="margin-left:0px;">
												<input type="checkbox" id="tombolslide" name="multimapel" value="1"> 
												<label for="tombolslide"></label>
													<span style="font-size:10px;">Multi/UTBK : </span>
											</div>  
										</div>
										<div class="col-md-1 w10">  </div>
										<div class="col-md-9">  
											
											
											<input class="btn btn-success btn-sm mr15" type="submit" value="CARI" />
										</div>
										
									</div>	
								</div>
							</div>	
						</form>	
						<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/select2.min.css' />
							
							<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
							<script type="text/javascript">
								$(".kelas").select2();
								$(".ujian").select2();
								$(".sekolah").select2();
								</script>
						<div class="clear"></div>
						<div class="container">	
							<div class="row" >
								<div class="col-md-12" >
									
									<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
										<tr class="tr-head">
											<td width="5%" align="center" class="line2"> No</td>
											<td width="11%" align="center" class="line2"> Tanggal </td>
											<td width="11%" align="center" class="line2"> Nama Ujian </td>
											<td width="20%" align="center" class="line2"> Nama Peserta </td>
											<td width="11%" align="center" class="line2"> No Peserta </td>
											<td width="9%" align="center" class="line2"> Nama Kelas </td>
											<td width="12%" align="center" class="line2"> Nama Sekolah </td>
											<td width="4%" align="center" class="line2"> B </td>
											<td width="4%" align="center" class="line2"> S</td>
											<td width="4%" align="center" class="line2"> K </td>
											<td width="4%" align="center" class="line2"> Nilai </td>    
											<td width="5%" align="center" class="line2"> Action </td>
										</tr>
									</table>
								</div>
							</div>	
						</div>
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