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
									<h4>LAPORAN HASIL UJIAN MULTI/UTBK MATA PELAJARAN</h4>
								</div>
							</div>
						</div>
					</div>
					<?php
						$this->db->select('*');
						$this->db->from('setting');
						$query1 = $this->db->get ();												
						$qrow1 = $query1->result();
						$row1 = $qrow1[0];
						$folsiswa = $row1->folder_cet_kelas;
					?>
					<div class="clear"></div>
					<center><?php echo $this->session->flashdata('pesan4');?></center>
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
												<input type="checkbox" id="tombolslide1" name="multimapel1" value="1" checked> 
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
												<input type="checkbox" id="tombolslide" name="multimapel" value="1" checked> 
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
						<div class="col-md-12" style="padding-left:15px;padding-right:15px;padding-bottom:5px;background:#FFFFCB;margin-bottom:10px;border-radius:4px;">
							<div class="col-md-5" style="padding-top:10px;">
								<form class="form-horizontal" action="<?php echo site_url('mprosesnilai');?>" method="POST">
									<table>
										<tr>
											<td style="padding-right:5px;">
												<label>Skala: </label></td><td style="padding-right:10px;">
												<select name="skala" class="form-control input-sm bulk" style="width:130px;">
													<option value="">-- Silahkan Pilih --</option>
													<option value="0">Tanpa Skala</option> 
													<option value="1">1</option>    
													<option value="10">10</option>
													<option value="100" selected>100</option>   
												</select>
											</td>
											<td style="padding-right:5px;">
												<label>Benar: </label></td><td style="padding-right:10px;">
												<input class="form-control input-sm" type="text" name="benar" value="1" style="width:35px;">
											</td>
											<td style="padding-right:5px;">
												<label>Salah: </label></td><td style="padding-right:10px;">
												<input class="form-control input-sm w50" type="text" name="salah" value="0" style="width:35px;">
											</td>
											<td style="padding-right:5px;">
												<label>Kosong: </label></td><td style="padding-right:10px;"> 
												<input class="form-control input-sm w50" type="text" name="kosong" value="0" style="width:35px;">
											</td>
											<tr>
											</table>
										</div>
										<div class="col-md-1 w10"></div>
										<div class="col-md-6" style="padding-top:10px;padding-bottom:10px;">
											<input onclick="alertify.confirm('Anda yakin ingin melakukan penilaian ulang semua siswa dibawah ini?<br/>',function(f){if(f) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses tidak dijalankan.');}});" class="btn btn-success btn-sm mr15" value="Penilaian Ulang" />											
										</form>
										<a onclick="alertify.confirm('Anda yakin ingin melakukan pembatalan semua nilai siswa dibawah ini?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('mbatalnilai');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses tidak dijalankan.');}});" class="btn btn-warning btn-sm mr15">Batalkan Nilai</a>
										
										<a onclick="alertify.confirm('Anda yakin ingin melakukan penghapusan semua hasil ujian siswa dibawah ini?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('mhapushu');?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses tidak dijalankan.');}});" class="btn btn-danger btn-sm mr15">Hapus Hasil Ujian</a>
									</div>
									<div class="clear"></div>
									<div class="col-md-12" >
										<span style="color:red"><b>PERHATIAN!</b> Fitur penilaian ulang dan pembatalan nilai ini tidak dapat digunakan pada soal essay dengan sistem penilaian manual.</span>
									</div>
								</div>
								
								<div class="clear"></div>
								<div class="container">	
									<div class="row" >
										<div class="col-md-12" >
											
											<?php 
												
												foreach ($hasil as $row)
												{}
											?>
											<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
												<tr class="tr-head">
													<td width="6%" align="center" class="line2"> No</td>
													<td width="11%" align="center" class="line2"> <a href="<?php echo site_url('sort1');?>">Tanggal</a> </td>
													<td width="11%" align="center" class="line2"> <a href="<?php echo site_url('sort2');?>">Nama Ujian</a> </td>
													<td width="20%" align="center" class="line2"> <a href="<?php echo site_url('sort3');?>">Nama Peserta</a> </td>
													<td width="12%" align="center" class="line2"> <a href="<?php echo site_url('sort4');?>">No Peserta</a> </td>
													<td width="9%" align="center" class="line2"> <a href="<?php echo site_url('sort5');?>">Nama Kelas</a> </td>
													<td width="14%" align="center" class="line2"> <a href="<?php echo site_url('sort6');?>">Nama Sekolah</a> </td>	
													<?php for ($i=1;$i<=($row->jumlah_mapel);$i++) 
														{ ?>
														<td align="center" class="line2"> <?php echo $row->{'mapel'.$i}; ?> </td>
													<?php } ?>
													<td width="7%" align="center" class="line2"> <a href="<?php echo site_url('sort7');?>">Nilai</a> </td>   
													<td width="10%" align="center" class="line2"> Action </td>
												</tr>
												<?php 
													$i = 1;
													
													foreach ($hasil as $row) {?>
													<tr>
														<td align="center" class="line"> <?php echo $i; ?> </td>
														<td align="center" class="line"> <?php echo date('d M y - H:i',strtotime($row->tgl_ujian)); ?>
														</td>
														<td align="center" class="line"> <?php echo $row->nama_ujian;?></td>
														<td align="center" class="line"> <?php if ($row->pnama == '') {echo $row->nama;} else {echo $row->pnama;} ?> </td>
														<td align="center" class="line"> <?php if ($row->pnopes == '') {echo $row->no_peserta;} else {echo $row->pnopes;}?></td>
														<td align="center" class="line"> <?php echo $row->nama_kelas;?></td>
														<td align="center" class="line"> <?php if ($row->psekolah == '') {echo $row->sekolah;} else {echo $row->psekolah;} ?></td>
														<?php for ($k=1;$k<=$row->jumlah_mapel;$k++) 
															{ ?>
															<td align="center" class="line"><?php $fnilai = rtrim(rtrim($row->{'nilai'.$k}, '0'), '.');echo $fnilai;?></td> 
														<?php } ?>
														<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($row->p_nilai, '0'), '.');echo $fnilai;?></td>									
														<td align="center" class="line3"> 
															<a href="#" title="hapus" onclick="alertify.confirm('Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapushasil/'.$row->id_proses);?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"><i class="fa fa-trash" aria-hidden="true" style="color:#DA542F;"></i></a>&nbsp;&nbsp;<a href="<?php echo site_url('hasilpersiswa/'.$row->id_proses);?>" title="Lihat Hasil" target="_blank"><i class="fa fa-file-text" aria-hidden="true" style="color:#449D44;"></i></a>
															&nbsp;&nbsp;<a href="<?php echo site_url('hasiltopersiswa/'.$row->id.'/'.$row->id_fdr);?>" title="Hasil TO" target="_blank"><i class="fa fa-file-text" aria-hidden="true" style="color:blue;"></i></a>
														</td> 
													</tr>
													
													
												<?php $i++;} ?>
											</table>
										</div>
									</div>	
								</div>
								<div class="h20" ></div>
								<div class="container">	
									<div class="row">
										<div class="col-md-12 p15">
											<form class="form-horizontal" action="<?php echo site_url('prosesanalisa');?>" method="POST" target="_blank">
												
											<input class="btn btn-danger btn-sm" type="submit" value="Proses Analisa" title="Proses Analisa"/></form>
										</div>		
										<div class="col-md-6 p15">
											<div class="panel panel-default">
												<div class="panel-heading" style="background:#28A9E3;color:#fff;">EKSPOR ANALISA SOAL MODEL A</div>
												<div class="panel-body">
													<?php
														
														if (isset($row->id_proses)) {
															$this->db->select('*');
															$this->db->from('proses');
															$this->db->where_in('id_proses',$row->id_proses);
															$query = $this->db->get ();												
															$qrow = $query->result();
															$row = $qrow[0];
															
															if ($query->num_rows() > 0) {
																$nkelas = $row->nama_kelas;
																$nujian = $row->nama_ujian;							
															?>
															
															
															<form class="form-horizontal plr15" action="<?php echo site_url('eksporanalisa');?>" method="POST" target="_blank">
																
																<div class="form-group">											
																	<label class="col-md-5" style="width:182px;">Header 1 :  </label>
																	<div class="col-md-7"><div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																		</div><input class="form-control input-sm" type="text" name="judul" value="Analisa Soal Ujian <?php echo $nujian; ?>"></div>
																	</div></div>		
																	<div class="form-group">
																		<label class="col-md-5" style="width:182px;">Header 2 : </label>
																		<div class="col-md-7"><div class="input-group">
																			<div class="input-group-addon">
																				<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																			</div><input class="form-control input-sm" type="text" name="ketkelas" value="Kelas <?php echo $nkelas; ?>"></div>
																		</div></div>	
																		
																		
																		<div class="form-group">
																			<label class="col-md-5" style="width:182px;">Nama File Excel : </label>
																			<div class="col-md-7"><div class="input-group">
																				<div class="input-group-addon">
																					<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																				</div><input class="form-control input-sm" type="text" name="excel2" required></div>
																			</div></div>		
																			<div class="form-group">
																				<div class="col-md-5" style="width:182px;"></div>
																				<div class="col-md-7"><table width="100%"><tr><td><input class="btn btn-success btn-sm" type="submit" value="Ekspor ke Excel" title="Ekspor ke Excel"/>
																					
																				</form></td><td>&nbsp;&nbsp;&nbsp;</td><td>
																				</td></tr></table></div>
															</div>			
															
														<?php } else {}} ?>		
												</div>
											</div>
										</div>	
										
										<div class="col-md-6 p15">
											<div class="panel panel-default">
												<div class="panel-heading" style="background:#28A9E3;color:#fff;">EKSPOR ANALISA IRT</div>
												<div class="panel-body">
													
													
													<form class="form-horizontal plr15" action="<?php echo site_url('eksporanalisa1');?>" method="POST" target="_blank">
														
														<div class="form-group">											
															<label class="col-md-5" style="width:182px;">Header 1 :  </label>
															<div class="col-md-7"><div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																</div><input class="form-control input-sm" type="text" name="judul" value="Analisa Soal Ujian <?php echo $nujian; ?>"></div>
															</div></div>		
															<div class="form-group">
																<label class="col-md-5" style="width:182px;">Header 2 : </label>
																<div class="col-md-7"><div class="input-group">
																	<div class="input-group-addon">
																		<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																	</div><input class="form-control input-sm" type="text" name="ketkelas" value="Kelas <?php echo $nkelas; ?>"></div>
																</div></div>	
																
																
																<div class="form-group">
																	<label class="col-md-5" style="width:182px;">Nama File Excel : </label>
																	<div class="col-md-7"><div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																		</div><input class="form-control input-sm" type="text" name="excel2" required></div>
																	</div></div>		
																	<div class="form-group">
																		<div class="col-md-5" style="width:182px;"></div>
																		<div class="col-md-7"><input class="btn btn-success btn-sm" type="submit" value="Ekspor ke Excel" title="Ekspor ke Excel"/>
																			
																		</form>
																		
																		
																	</div>
													</div>
												</div>	
												</div>
											</div>	
												<div class="col-md-6 p15">
													<div class="panel panel-default">
														<div class="panel-heading" style="background:#28A9E3;color:#fff;">EKSPOR LAPORAN UJIAN MULTI</div>
														<div class="panel-body">
															<?php
																if (isset($row->id_proses)) {
																	$this->db->select('*');
																	$this->db->from('proses');
																	$this->db->where_in('id_proses',$row->id_proses);
																	$query = $this->db->get();
																	$qrow = $query->result();
																	$row = $qrow[0];
																	if ($query->num_rows() > 0) {
																		$nkelas = $row->nama_kelas;
																		$nujian = $row->nama_ujian;							
																	?>
																	<form class="form-horizontal plr15" action="<?php echo site_url('ekspor_multi');?>" method="POST" target="_blank">
																		
																		<div class="form-group">											
																			<label class="col-md-5" style="width:182px;">Header 1 :  </label>
																			<div class="col-md-7"><div class="input-group">
																				<div class="input-group-addon">
																					<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																				</div><input class="form-control input-sm" type="text" name="judul" value="Hasil Ujian <?php echo $nujian; ?>"></div></div>
																		</div>	
																		<div class="form-group">
																			<label class="col-md-5" style="width:182px;">Header 2 : </label>
																			<div class="col-md-7"><div class="input-group">
																				<div class="input-group-addon">
																					<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																				</div><input class="form-control input-sm" type="text" name="ketkelas" value="Kelas <?php echo $nkelas; ?>"></div></div>
																		</div>	
																		
																		
																		<div class="form-group">
																			<label class="col-md-5" style="width:182px;">Nama File Excel : </label>
																			<div class="col-md-7"><div class="input-group">
																				<div class="input-group-addon">
																					<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																				</div><input class="form-control input-sm" type="text" name="excel2" required></div></div>
																				<input type="hidden" name="jml_mapel" value="<?php echo $row->jumlah_mapel; ?>">
																				<input type="hidden" name="mapel1" value="<?php echo $row->mapel1; ?>">
																				<input type="hidden" name="mapel2" value="<?php echo $row->mapel2; ?>">
																				<input type="hidden" name="mapel3" value="<?php echo $row->mapel3; ?>">
																				<input type="hidden" name="mapel4" value="<?php echo $row->mapel4; ?>">
																				<input type="hidden" name="mapel5" value="<?php echo $row->mapel5; ?>">
																				<input type="hidden" name="mapel6" value="<?php echo $row->mapel6; ?>">
																				<input type="hidden" name="mapel7" value="<?php echo $row->mapel7; ?>">
																				<input type="hidden" name="mapel8" value="<?php echo $row->mapel8; ?>">
																				<input type="hidden" name="mapel9" value="<?php echo $row->mapel9; ?>">
																				<input type="hidden" name="mapel10" value="<?php echo $row->mapel10; ?>">
																		</div>	
																		<div class="form-group">
																			<div class="col-md-5" style="width:182px;"></div>
																			<div class="col-md-7"><input class="btn btn-success btn-sm" type="submit" value="Ekspor ke Excel" title="Ekspor ke Excel"/></div>
																		</div>	
																	</form>
																<?php } else {}} ?>		
														</div>	
													</div>	
												</div>	
												
												
												<div class="col-md-6 p15">
													<div class="panel panel-default">
														<div class="panel-heading" style="background:#28A9E3;color:#fff;">EKSPOR LAPORAN UJIAN UTBK</div>
														<div class="panel-body">
															<form class="form-horizontal plr15" action="<?php echo site_url('ekspor_multi1');?>" method="POST" target="_blank">
																
																<div class="form-group">											
																	<label class="col-md-5" style="width:182px;">Header 1 :  </label>
																	<div class="col-md-7"><div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																		</div><input class="form-control input-sm" type="text" name="judul" value="Hasil Ujian <?php echo $nujian; ?>"></div></div>
																</div>	
																<div class="form-group">
																	<label class="col-md-5" style="width:182px;">Header 2 : </label>
																	<div class="col-md-7"><div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																		</div><input class="form-control input-sm" type="text" name="ketkelas" value="Kelas <?php echo $nkelas; ?>"></div></div>
																</div>	
																
																
																<div class="form-group">
																	<label class="col-md-5" style="width:182px;">Nama File Excel : </label>
																	<div class="col-md-7"><div class="input-group">
																		<div class="input-group-addon">
																			<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
																		</div><input class="form-control input-sm" type="text" name="excel2" required></div></div>
																		<input type="hidden" name="jml_mapel" value="<?php echo $row->jumlah_mapel; ?>">
																		<input type="hidden" name="mapel1" value="<?php echo $row->mapel1; ?>">
																		<input type="hidden" name="mapel2" value="<?php echo $row->mapel2; ?>">
																		<input type="hidden" name="mapel3" value="<?php echo $row->mapel3; ?>">
																		<input type="hidden" name="mapel4" value="<?php echo $row->mapel4; ?>">
																		<input type="hidden" name="mapel5" value="<?php echo $row->mapel5; ?>">
																		<input type="hidden" name="mapel6" value="<?php echo $row->mapel6; ?>">
																		<input type="hidden" name="mapel7" value="<?php echo $row->mapel7; ?>">
																		<input type="hidden" name="mapel8" value="<?php echo $row->mapel8; ?>">
																		<input type="hidden" name="mapel9" value="<?php echo $row->mapel9; ?>">
																		<input type="hidden" name="mapel10" value="<?php echo $row->mapel10; ?>">
																</div>	
																<div class="form-group">
																	<div class="col-md-5" style="width:182px;"></div>
																	<div class="col-md-7"><input class="btn btn-success btn-sm" type="submit" value="Ekspor ke Excel" title="Ekspor ke Excel"/></div>
																</div>	
															</form>
															
														</div>	
													</div>	
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>		
						
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