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
								<h4>TOP 10 RANKING</h4>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					<center><?php echo $this->session->flashdata('pesan2');?></center>
					<div class="container">	
						<div class="row" >
							<form class="form-horizontal" action="<?php echo site_url('rank');?>" method="POST">
								<div class="col-md-5 pb10">
									<label class="col-md-4">Kelas : </label>
									<div class="col-md-8">
																	<?php 
												$newoptions = array('0' => '-- Silakan Pilih --') + $ddkelas;
												echo form_dropdown('id_kelas', $newoptions, set_value('id_kelas', $this->session->userdata('idkelas')), 'class="form-control input-sm bulk kelas"'); ?>
									</div>
								</div>
																<div class="col-md-7 w10"></div>

								<div class="clear"></div>
								
								<div class="col-md-5 pb10">									
									<label class="col-md-4">Pilih Nama Ujian : </label>
									<div class="col-md-8">          
										<?php 
											$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddujian;
											echo form_dropdown('id_ujian', $newoptions1, set_value('id_ujian', $this->session->userdata('idujian')), 'class="form-control input-sm bulk ujian"'); ?>
									</div>
								</div>
								<div class="col-md-1 w10"></div>
								<div class="col-md-6 pb10">									
									
								</div>
								<div class="clear"></div>
								
								<div class="col-md-5 pb10">									
									<label class="col-md-4">Pilih Sekolah : </label>
									<div class="col-md-8">          
										<?php 
												$newoptions2 = array('0' => '-- Silakan Pilih --') + $ddsekolah;
											echo form_dropdown('sekolah', $newoptions2, set_value('sekolah', $this->session->userdata('sekolah')), 'class="form-control input-sm bulk sekolah"'); ?>
									</div>
								</div>
								<div class="col-md-1 w10"></div>
								<div class="col-md-6 pb10">									
									<input class="btn btn-success btn-sm mr15" type="submit" value="LIHAT" />
								</div>								
								
							</form>	
							
							
							
						</div>
					</div>
					
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
										<td width="6%" align="center" class="line2"> No</td>
										<td width="20%" align="center" class="line2"> Nama Peserta </td>
										<td width="7%" align="center" class="line2"> No Peserta </td>
										<td width="53%" align="center" class="line2"> Asal Sekolah </td>
										<td width="7%" align="center" class="line2"> Nilai </td>	   
										<td width="7%" align="center" class="line2"> Predikat </td>
									</tr>
														<?php 
						$i = 1;
						foreach ($hasil as $row) {?>
						
						<tr>
							<td align="center" class="line"> <?php echo $i; ?> </td>
							<td align="center" class="line"> <?php if ($row->pnama == '') {echo $row->nama;} else {echo $row->pnama;} ?> </td>
							<td align="center" class="line"> <?php if ($row->pnopes == '') {echo $row->no_peserta;} else {echo $row->pnopes;}?></td>
							<td align="center" class="line"> <?php echo $row->psekolah;?></td>
							<td align="center" class="line"> <?php $fnilai = str_replace('.00', '', number_format((float)$row->p_nilai, 2, '.', '')); echo $fnilai;?></td>					
							<td align="center" class="line3"> <?php echo $row->predikat;?></td>
							</tr>
							
						<?php $i++;}  ?>
								</table>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>	
	
	<script LANGUAGE="JavaScript">
		function tutup() {  
			setTimeout( function () { window.close(); }, 500);
		} 
	</script>
	
	<?php 
	include 'view3.php'; ?>
	<?php
	}
	else{
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