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
									<h4>USER</h4>
								</div>
								<div class="col-md-6 text-right plr15" >
									<?php 				
										if ($this->input->post('cari')==''){
										echo '';}
										else {
											$c = $this->input->post('cari');
											$this->db->select('*');
											$this->db->from('pengguna');
											$this->db->join ( 'kelas', 'kelas.id_kelas = pengguna.id_kelas' , 'left' );
											$this->db->join ( 'tipe_user', 'tipe_user.id_tipeuser = pengguna.role' , 'left' );
											$this->db->join ( 'peminatan', 'peminatan.id_peminatan = pengguna.peminatan' , 'left' );
											$this->db->like('nama', $c);
											$this->db->or_like('no_peserta',$c);
											$this->db->or_like('sekolah',$c);
											$this->db->or_like('nama_kelas',$c);
											$this->db->or_like('nama_peminatan',$c);
											$this->db->or_like('nama_tipe',$c);
											
										echo '<span style="color:red;">Ditemukan '.$this->db->count_all_results().' data "'.$this->input->post("cari").'"';}
									?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
					
					<div class="wrapper">	
						<center><?php echo $this->session->flashdata('pesan2');?></center>
						<div id="container1">
							<div id="body">	
								
								<div class="container" >
									<div class="row whitebox">
										<div class="col-md-3 pb10">
											<a class="btn btn-success btn-sm" href="<?php echo site_url('tambahuser');?>">TAMBAH USER</a> <a class="btn btn-success btn-sm" target="_blank" href="<?php echo base_url('tls/view80.php');?>">UPLOAD SISWA</a>
										</div>
										<div class="col-md-6">
											<form action="<?php echo site_url('cariuser');?>" method="POST"> 
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
										<div class="col-md-3" >
										</div>
									</div>
								</div>				
								
								<div class="clear"></div>			
								<div class="pb10"></div>					
								<form action="<?php echo site_url('aktivasiuser');?>" method="POST" id="frm1"> 
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
													<input class="btn btn-danger btn-sm" value="TERAPKAN" onclick="alertify.confirm('Anda yakin ingin memprosesnya?<br/>',function(e){if(e) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"/>
													
												</div></div>
												<div class="col-md-3 pt5b10" style="color:#fff;">
													<?php	
														$this->db->from('pengguna');
														$alamat_semua = site_url('user');
														echo '<a class="dlink" href="'.$alamat_semua.'">Semua</a> ('.$this->db->count_all_results().') | ';
														
														$this->db->where('aktif', '1');
														$this->db->from('pengguna');
														$alamat_aktif = site_url('cariuseraktif');
														echo '<a class="dlink" href="'.$alamat_aktif.'">Aktif</a> ('.$this->db->count_all_results().') | '; 
														
														$this->db->where('aktif', '0');
														$this->db->from('pengguna');
														$alamat_nonaktif = site_url('cariusernonaktif');
														echo '<a class="dlink" href="'.$alamat_nonaktif.'">Non-aktif</a> ('.$this->db->count_all_results().')'; 
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
												
												<table width="100%" class="table-new tabelradius2" border="0" cellspacing="0" cellpadding="5" >
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
														<td width="6%" align="center" class="line2">No</td>
														<td width="10%" align="center" class="line2"> No Peserta</td>
														<td width="25%" align="center" class="line2"> Nama Lengkap </td>
														<td width="12%" align="center" class="line2"> Kelas </td>
														<td width="8%" align="center" class="line2"> Peminatan </td>
														<td width="6%" align="center" class="line2"> Tipe User </td>
														<td width="16%" align="center" class="line2"> Nama Sekolah </td>
														<td width="7%" align="center" class="line2"> Status </td>
														<td width="7%" align="center" class="line2"> Action </td>
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
														
														foreach ($View_pengguna as $pengguna) {?>
														<tr>
															<td class="line" valign="top" style="padding-left:3px;padding-top:6px;">		
																
																
																<?php if($pengguna->id == "1")
																	{
																	?>
																	<input type="checkbox" name="id_user[]" value="<?php echo $pengguna->id ?>" disabled>
																	<?php
																	} else
																	{
																	?>
																	<input type="checkbox" name="id_user[]" value="<?php echo $pengguna->id ?>">
																	<?php
																	}
																?>
															</form>
														</td>	
														<td align="center" class="line">
															<?php echo $i; ?>
														</td>
														<td align="center" class="line"> <?php echo $pengguna->no_peserta; ?> </td>
														<td align="center" class="line"> <?php echo $pengguna->nama; ?> </td>
														<td align="center" class="line"> <?php echo $pengguna->nama_kelas; ?></td>
														<td align="center" class="line"> <?php echo $pengguna->nama_peminatan; ?></td>
														<td align="center" class="line"> <?php echo $pengguna->nama_tipe; ?></td>
														<td align="center" class="line"> <?php echo $pengguna->sekolah; ?></td>
														<td align="center" class="line"> 
															<?php if($pengguna->id == "1")
																{
																?>
																<div class="tombolslide">
																	
																	<input type="checkbox" id="tombolslide<?php echo $pengguna->id ?>" name="status" checked disabled> 
																	<label for="tombolslide<?php echo $pengguna->id ?>"></label>
																</div>
																<?php
																} else
																{
																	if ($pengguna->aktif == 1) 
																	{ ?>
																	<form action="<?php echo site_url('aktivasiuser1/'.$pengguna->id);?>" method="POST" >
																		
																		<div class="tombolslide">
																			<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
																			<input type="checkbox" id="tombolslide<?php echo $pengguna->id ?>" name="status" checked onclick="this.form.submit();"> 
																			<label for="tombolslide<?php echo $pengguna->id ?>"></label>
																		</div>
																		
																	</form>
																	
																	<?php }
																	else
																	{ ?>
																	<form action="<?php echo site_url('aktivasiuser1/'.$pengguna->id);?>" method="POST" >
																		
																		<div class="tombolslide">
																			<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
																			<input type="checkbox" id="tombolslide<?php echo $pengguna->id ?>" name="status" onclick="this.form.submit();">
																			<label for="tombolslide<?php echo $pengguna->id ?>"></label>
																		</div>
																	</form>
																	
																	<?php } 
																}
															?>
															
															
															
														</td>
														<td align="center" class="line3"> 
															
															
															<?php if($pengguna->id == "1")
																{
																?>
																<a href="<?php echo site_url('edituser/'.$pengguna->id);?>" title="edit"><image src="<?php echo base_url(); ?>assets/css/images/useredit.png"></a>&nbsp;&nbsp;
																	<a href="#" title="hapus"><image src="<?php echo base_url(); ?>assets/css/images/cross.png"></a>
																		<?php
																		} else
																		{
																		?>
																		<a href="<?php echo site_url('edituser/'.$pengguna->id);?>" title="edit"><image src="<?php echo base_url(); ?>assets/css/images/useredit.png"></a>&nbsp;&nbsp;
																			<a href="#" title="hapus" onclick="alertify.confirm('Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapususer/'.$pengguna->id);?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});" ><image src="<?php echo base_url(); ?>assets/css/images/cross.png"></a>
																				<?php
																				}
																			?>
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
							</div>
						</div>
						
						<script type="text/javascript">
							function reset () {
								$("#toggleCSS").attr("href", "../css/alertify.default.css");
								alertify.set({
									labels : {
										ok     : "OK",
										cancel : "Cancel"
									},
									delay : 5000,
									buttonReverse : false,
									buttonFocus   : "ok"
								});
							}
							
							$("#confirm").on( 'click', function () {
								reset();
								alertify.confirm("This is a confirm dialog", function (e) {
									if (e) {
										alertify.success("You've clicked OK");
										} else {
										alertify.error("You've clicked Cancel");
									}
								});
								return false;
							});
							
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