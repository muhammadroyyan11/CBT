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
									<h4>MONITORING</h4>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
					
					<div class="wrapper">	
						<center><?php echo $this->session->flashdata('pesan2');?></center>
						<div class="container">	
							<div class="row" >
								<form class="form-horizontal" action="<?php echo site_url('monitor');?>" method="POST">
									
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
														$newoptions2 = array('0' => '-- Pilih Sekolah --') + $ddsekolah;
													echo form_dropdown('sekolah', $newoptions2, set_value('sekolah', $this->session->userdata('sekolah')), 'class="form-control input-sm bulk sekolah"'); ?>
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
												
												<div class="col-md-11"> 
													
													<input class="btn btn-success btn-sm mr15" type="submit" value="REFRESH" />
													<span style="font-size:10px;"><?php echo "Refresh terakhir jam " . date("H:i:s"); ?></span>
												</div>
												<div class="col-md-1"></div>
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
													<td width="6%" align="center" class="line2"> <a href="<?php echo site_url('msort1');?>">Tanggal</a> </td>
													<td width="11%" align="center" class="line2"> <a href="<?php echo site_url('msort2');?>">Ujian</a> </td>
													<td width="13.7%" align="center" class="line2"> <a href="<?php echo site_url('msort3');?>">Nama</a> </td>
													<td width="10%" align="center" class="line2"> <a href="<?php echo site_url('msort4');?>">Nopes</a> </td>
													<td width="10%" align="center" class="line2"> <a href="<?php echo site_url('msort5');?>">Kelas</a> </td>
													<td width="11%" align="center" class="line2"> <a href="<?php echo site_url('msort6');?>">Sekolah</a> </td>
													<td width="8%" align="center" class="line2"> IP </td>
													<td width="12.3%" align="center" class="line2"> Jawaban</td>
													<td width="3%" align="center" class="line2"> Jml </td>

													
													<td width="5%" align="center" class="line2"> <a href="<?php echo site_url('msort7');?>">Nilai</a> </td>
													<td width="5%" align="center" class="line2"> stat </td>
												</tr>
												<?php 
													$i = 1;
													foreach ($hasil as $row) {?>
													<tr>
														<td align="center" valign="top" class="line"> <?php echo $i; ?> </td>
														<td align="center" valign="top" class="line"> <?php echo date('d M y H:i',strtotime($row->tgl_ujian)); ?>
														</td>
														<td align="center" valign="top" class="line" style="padding-left:3px;"><?php echo $row->nama_ujian;?></td>
														<td align="center" valign="top" class="line" style="padding-left:3px;padding-right:3px;">
														<?php if ($row->pnama == '') {echo $row->nama;} else {echo $row->pnama;} ?> </td>
														<td align="center" valign="top" class="line" style="padding-left:3px;padding-right:3px;color:blue;"><a href="<?php echo site_url('editip/'.$row->id_proses);?>" title="edit" target="_blank" onclick="tutup()" ><?php if ($row->pnopes == '') {echo $row->no_peserta;} else {echo $row->pnopes;}?></a></td>
														<td align="center" valign="top" class="line" style="padding-left:3px;"><?php echo $row->nama_kelas;?></td>
														<td align="center" valign="top" class="line" style="padding-left:3px;"><?php echo $row->sekolah;?></td>
														<td align="center" valign="top" class="line" style="padding-left:3px;"><?php echo $row->ip;?></td>
														<td align="left" valign="top" class="line" style="padding-left:3px;max-width:50px;word-wrap:break-word;"> <?php echo str_replace( ',', '', $row->hasil_jawaban );?></td>
														<td align="center" valign="top" class="line"> <?php echo $row->jml_soal - substr_count($row->hasil_jawaban, "K"); ?></td>
															
															
														<td align="center" valign="top" class="line"> <?php $fnilai = rtrim(rtrim($row->p_nilai, '0'), '.');echo $fnilai;?></td>	
														<td align="center" valign="top" class="line">													
															<?php if ($row->k13 == 0) { ?>
															<i class="fa fa-user-circle-o" aria-hidden="true" style="color:red;"></i><?php } else { ?><i class="fa fa-user-circle-o" aria-hidden="true" style="color:green;"></i><?php } ?>
															&nbsp;
															<a href="<?php echo site_url('uploadjawaban_m/'.$row->id_proses);?>" title="Tarik Jawaban"><i class="fa fa-upload" aria-hidden="true" style="color:#1A73CD;"></i></a>
															</td>
													</tr>
													
													
												<?php $i++;} ?>
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