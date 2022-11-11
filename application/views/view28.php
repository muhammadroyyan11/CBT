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
								<div class="col-md-6 plr15" >
									<h4>DAFTAR UJIAN</h4>
								</div>
								<div class="col-md-6 text-right plr15" >
									<?php 				
									$idfolder = $this->session->userdata('id_folder'); 
									
										if ($this->input->post('cari')==''){
										echo '';}
										else {
											$c = $this->input->post('cari');
											$this->db->select('*');
											$this->db->from ( 'ujian' );
											$this->db->join ( 'kelas', 'kelas.id_kelas = ujian.id_kelas' , 'left' );
											$this->db->join ( 'pengguna', 'pengguna.id = ujian.id_user' , 'left' );
											$this->db->where('ujian.id_folder', $idfolder);
											$this->db->like('ujian.nama_ujian', $c);
											$this->db->or_like('kelas.nama_kelas',$c);
										echo '<span style="color:red;">Ditemukan '.$this->db->count_all_results().' data "'.$this->input->post("cari").'"';}
									?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
					
					<div class="wrapper">	
						
						<div id="container1">
							<div id="body">	
								
								<div class="container">
									<div class="row" >
										<div class="col-md-3 pb10">
											<a class="btn btn-success btn-sm" href="<?php echo site_url('tambahujian');?>">TAMBAH UJIAN</a>
										</div>
										<div class="col-md-6">
											<form action="<?php echo site_url('cariujian/'.$idfolder);?>" method="POST"> 
												<div class="col-md-10 pb10">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
														<input type="text" name="cari" class="form-control input-sm"> 
													</div>
												</div>
												<div class="col-md-1 w10"></div>
												<div class="col-md-1">
													<input type=submit value="CARI" class="btn btn-success btn-sm">
												</div>
											</form>
										</div>
										<div class="col-md-3 text-right" >
										<a class="btn btn-danger btn-sm" href="<?php echo site_url('folder');?>">Back </a>
									</div>
									</div>
								</div>				
								
								<div class="clear"></div>			
								<div class="pb10"></div>					
								<form action="<?php echo site_url('aktivasiujian');?>" method="POST" id="frm1"> 
									<div class="container">
										<div class="row bluebox">
											
											<div class="col-md-5">
												<div class="col-md-4 pb10">
													
													<select name="pilih" class="form-control input-sm bulk">
														<option value="">-- Silahkan Pilih --</option>
														<option value="1">Aktifkan</option>    
														<option value="0">Non-aktifkan</option>
														<option value="2">Hapus</option>    
													</select>
												</div>
												<div class="col-md-1 w10"></div>
												<div class="col-md-7 pb10">
													<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
													<input class="btn btn-danger btn-sm" onclick="alertify.confirm('Anda yakin ingin memprosesnya?<br/>',function(e){if(e) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});" value="TERAPKAN" />
													
												</div></div>
												<div class="col-md-3 pt5b10" style="color:#fff;">
													<?php	
													$this->db->where('id_folder', $idfolder);
													$this->db->from('ujian');
													$alamat_semua = site_url('tampilujian/'.$idfolder);			
													echo '<a class="dlink" href="'.$alamat_semua.'">Semua</a> ('.$this->db->count_all_results().') | ';

													$this->db->where('aktif_ujian', '1') and $this->db->where('id_folder', $idfolder);
													$this->db->from('ujian');
													$alamat_aktif = site_url('cariujianaktif/'.$idfolder);
													echo '<a class="dlink" href="'.$alamat_aktif.'">Aktif</a> ('.$this->db->count_all_results().') | '; 
													
													$this->db->where('aktif_ujian', '0') and $this->db->where('id_folder', $idfolder);
													$this->db->from('ujian');
													$alamat_nonaktif = site_url('cariujiannonaktif/'.$idfolder);
													echo '<a class="dlink" href="'.$alamat_nonaktif.'">Non-aktif</a> ('.$this->db->count_all_results().')'; 
													
													$this->db->where('id_folder', $idfolder);
													$this->db->from('ujian');				
												?>		
												</div>
												<div class="col-md-4">
													<?php echo $this->pagination->create_links(); ?>	
												</div>
										</div>
										
									</div>
									
									<div class="clear"></div>
									<div class="container">	
										<div class="row" >
											<div class="col-md-12" >
												
												<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
													<tr class="tr-head">
														<td width="3%" align="center" class="line2"><input type='checkbox' name='checkall' onclick='checkedAll(frm1);'>
															<script type="text/javascript">
																checked=false;
																function checkedAll (frm1) {var aa= document.getElementById('frm1'); if (checked == false)
																	{
																		checked = true
																	}
																	else
																	{
																		checked = false
																	}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
																}
															</script>
															
														</td>
														<td width="4%" align="center" class="line2">No</td>
														<td width="4%" align="center" class="line2">Kode Ujian</td>
														<td width="14%" align="center" class="line2"> Nama Ujian</td>
														<td width="5%" align="center" class="line2"> Kelas </td>
														<td width="7%" align="center" class="line2"> Peminatan </td>
														<td width="7%" align="center" class="line2"> Tgl Ujian</td>
														<td width="5%" align="center" class="line2"> Jam</td>
														<td width="6%" align="center" class="line2"> Durasi</td>
														<td width="4%" align="center" class="line2"> Soal </td>
														<td width="4%" align="center" class="line2"> Multi </td>
														<td width="7%" align="center" class="line2"> Mapel Multi</td>
														<td width="4%" align="center" class="line2"> UTBK </td>
														<td width="6%" align="center" class="line2"> Acak Soal</td>
														<td width="6%" align="center" class="line2"> Acak Jwb</td>
														<td width="6%" align="center" class="line2"> Status </td>
														
														<td width="8%" align="center" class="line2"> Action </td>
													</tr>
													<?php 
														$last = end($this->uri->segments); 
														if ($this->uri->segment(2) == '')
														{
															$i = 1;	
														}
														else
														{
															$i = $last+1;	
														} 
														
														$k = 1;
														foreach ($View_ujian as $ujian) {?>
														<tr>
															<td class="line" valign="top" style="padding-left:3px;padding-top:6px;">		
																<input type="checkbox" name="id_ujian[]" value="<?php echo $ujian->id_ujian ?>">
															</form>
														</td>	
														<td align="center" class="line">
															<?php echo $k; ?>
														</td>
														<td class="line" valign="top" style="padding-top:3px;background:#FFFFCB;">
														<?php echo $ujian->id_ujian; ?>
													</td>
														<td align="center" class="line"> <a href="<?php echo site_url('tampilsoal/'.$ujian->id_ujian);?>"><?php echo $ujian->nama_ujian;?><br/></a> </td>
														<td align="center" class="line"> <?php echo $ujian->idk;?> </td>
														<td align="center" class="line"> <?php echo $ujian->nama_peminatan; ?></td>
														<td align="center" class="line"> <?php echo date('d-m-Y',strtotime($ujian->tanggal_ujian)); ?></td>
														<td align="center" class="line"> <?php echo date('H:i',strtotime($ujian->jam_ujian)); ?></td>
												
														<td align="center" class="line"> <?php echo $ujian->waktu;?>&nbsp;menit</td>
														<td align="center" class="line"> <?php echo $ujian->jumlah_soal; ?></td>
														<td align="center" class="line"> <?php if ($ujian->multi == 1){ ?><i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i> <?php } else { ?><i class="fa fa-minus-circle" aria-hidden="true" style="color:#FF0000;"></i><?php } ?></td>
														<td align="center" class="line"> <?php echo $ujian->jumlah_mapel; ?></td>
														<td align="center" class="line"> <?php if ($ujian->utbk == 1){ ?><i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i> <?php } else { ?><i class="fa fa-minus-circle" aria-hidden="true" style="color:#FF0000;"></i><?php } ?></td>
														<td align="center" class="line"> <?php if ($ujian->acak == 1){ ?><i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i> <?php } else { ?><i class="fa fa-minus-circle" aria-hidden="true" style="color:#FF0000;"></i><?php } ?></td>
														<td align="center" class="line"> <?php if ($ujian->jr == 1){ ?><i class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i> <?php } else { ?><i class="fa fa-minus-circle" aria-hidden="true" style="color:#FF0000;"></i><?php } ?></td>
														
														<td align="center" class="line">
															
															<?php if ($ujian->aktif_ujian == 1) 
																{ ?>
																<form action="<?php echo site_url('aktivasiujian1/'.$ujian->id_ujian);?>" method="POST" >
																	
																	<div class="tombolslide">
																		<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
																		<input type="checkbox" id="tombolslide<?php echo $ujian->id_ujian ?>" name="status" checked onclick="this.form.submit();"> 
																		<label for="tombolslide<?php echo $ujian->id_ujian ?>"></label>
																	</div>
																	
																</form>
																
																<?php }
																else
																{ ?>
																<form action="<?php echo site_url('aktivasiujian1/'.$ujian->id_ujian);?>" method="POST" >
																	
																	<div class="tombolslide">
																		<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
																		<input type="checkbox" id="tombolslide<?php echo $ujian->id_ujian ?>" name="status" onclick="this.form.submit();">
																		<label for="tombolslide<?php echo $ujian->id_ujian ?>"></label>
																	</div>
																</form>
																
															<?php } ?>   
															
															
															
															<td align="center" class="line3"> 
															
															<a href="<?php echo site_url('downloadsoal/'.$ujian->id_ujian);?>" target="_blank" title="Download Soal"><i class="fa fa-file-pdf-o" style="font-size:16px;color:red;padding-right:10px;"></i> </a>
															
																<a href="<?php echo site_url('editujian/'.$ujian->id_ujian);?>" title="edit"><image src="<?php echo base_url(); ?>assets/css/images/useredit.png"></a>&nbsp;&nbsp;
																	<a href="#" title="hapus" onclick="alertify.confirm('Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapusujian/'.$ujian->id_ujian);?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"><image src="<?php echo base_url(); ?>assets/css/images/cross.png"></a>
																	</td>
																</tr>									
															<?php $i++;$k++;} ?>
														</table>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<script type="text/javascript">
						$(function(){
							$('body').on('click','ul#search_page_pagination>li>a',function(e){
								e.preventDefault();  // prevent default behaviour for anchor tag
								var Pagination_url = $(this).attr('href'); // getting href of <a> tag
								$.ajax({
									url:Pagination_url,
									type:'POST',
									success:function(data){
										var $page_data = $(data);
										$('#container1').html($page_data.find('div#body'));
										$('table').addClass('table');
									}
								});
							});
						});
					</script>
					
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