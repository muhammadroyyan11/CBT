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
									<h4>PRODUK</h4>
								</div>
								<div class="col-md-6 text-right plr15" >
									<?php 				
										if ($this->input->post('cari')==''){
										echo '';}
										else {
											$c = $this->input->post('cari');
											$this->db->select('*');
											$this->db->from('products');
											$this->db->like('name', $c);
										echo '<span style="color:red;">Ditemukan '.$this->db->count_all_results().' data "'.$this->input->post("cari").'"';}
									?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
					
					<div class="wrapper">	
						<center><?php echo $this->session->flashdata('pesan3');?></center>
						<div id="container1">
							<div id="body">	
								
								<div class="container">
									<div class="row whitebox" >
										<div class="col-md-3 pb10">
											<a class="btn btn-success btn-sm" href="<?php echo site_url('tambahproduk');?>">TAMBAH PRODUK</a>
										</div>
										<div class="col-md-6">
											<form action="<?php echo site_url('cariproduk');?>" method="POST"> 
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
								<form action="<?php echo site_url('aktivasiproduk');?>" method="POST" id="frm1"> 
									<div class="container">
										<div class="row bluebox">
											
											<div class="col-md-5">
												<div class="col-md-4 pb10">
													
													<select name="pilih" class="form-control input-sm bulk">
														<option value="">-- Silahkan Pilih --</option>
														<option value="2">Hapus</option>    
													</select>
												</div>
												<div class="col-md-1 w10"></div>
												<div class="col-md-7 pb10">
													
													<input class="btn btn-danger btn-sm" onclick="alertify.confirm('Anda yakin ingin memprosesnya?<br/>',function(e){if(e) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});" value="TERAPKAN" />
													
												</div></div>
												<div class="col-md-3 pt5b10" style="color:#fff;">
													<?php	
														$this->db->from('products');
														$alamat_semua = site_url('produk');
														echo '<a class="dlink" href="'.$alamat_semua.'">Semua</a> ('.$this->db->count_all_results().')'; 
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
												
												<table width="100%" class="table-new tabelradius2" border="0" cellspacing="0" cellpadding="5">
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
														<td width="20%" align="center" class="line2">Nama Produk</td>
														<td width="45%" align="center" class="line2">Deskripsi</td>
														<td width="7%" align="center" class="line2">Harga</td>
														<td width="12%" align="center" class="line2">Foto Produk</td>
														<td width="7%" align="center" class="line2">Action</td>
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
														
														foreach ($View_produk as $produk) {?>
														<tr>
															<td class="line" valign="top" style="padding-left:3px;padding-top:6px;">	
															
																	<input type="checkbox" name="id_produk[]" value="<?php echo $produk->serial ?>">
															
															</form>
														</td>	
														<td align="center" class="line">
															<?php echo $i; ?>
														</td>
														<td align="center" class="line"> <?php echo $produk->name; ?> </td>
														<td align="center" class="line"> <?php echo $produk->description; ?> </td>
														<td align="center" class="line"> <?php echo $produk->price; ?> </td>
														<td align="center" class="line"> <img src="<?php echo base_url().'/images/'.$produk->picture; ?>" style="width:20px;"> </td>
														<td align="center" class="line3"> 
														
												
																		<a href="<?php echo site_url('editproduk/'.$produk->serial);?>" title="edit"><image src="<?php echo base_url(); ?>assets/css/images/useredit.png"></a>&nbsp;&nbsp;
																			<a href="#" title="hapus" onclick="alertify.confirm('Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapusproduk/'.$produk->serial);?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"><image src="<?php echo base_url(); ?>assets/css/images/cross.png"></a>
													
																			
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