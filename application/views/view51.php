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
									<h4>DAFTAR PEMINATAN JURUSAN</h4>
								</div>
								<div class="col-md-6 text-right plr15" >
									<?php 				
										if ($this->input->post('cari')==''){
										echo '';}
										else {
											$c = $this->input->post('cari');
											$this->db->select('*');
											$this->db->from('peminatan');
											$this->db->like('nama_peminatan', $c);
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
											<a class="btn btn-success btn-sm"  style="width:130px;" href="<?php echo site_url('tambahpeminatan');?>">TAMBAH PEMINATAN</a>
										</div>
										<div class="col-md-6">
											<form action="<?php echo site_url('caripeminatan');?>" method="POST"> 
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
								<form action="<?php echo site_url('aktivasipeminatan');?>" method="POST" id="frm1"> 
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
														$this->db->from('peminatan');
														$peminatan_semua = site_url('peminatan');
														echo '<a class="dlink" href="'.$peminatan_semua.'">Semua</a> ('.$this->db->count_all_results().')'; 
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
														<td width="77%" align="center" class="line2">Nama peminatan</td>
														<td width="7%" align="center" class="line2">Kode peminatan</td>
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
														
														foreach ($View_peminatan as $peminatan) {?>
														<tr>
															<td class="line" valign="top" style="padding-left:3px;padding-top:6px;">		
																<input type="checkbox" name="id_peminatan[]" value="<?php echo $peminatan->id_peminatan ?>">
															</form>
														</td>	
														<td align="center" class="line">
															<?php echo $i; ?>
														</td>
														<td align="center" class="line"> <?php echo $peminatan->nama_peminatan; ?> </td>
														<td align="center" class="line" style="background:#FFFFCB;"> <?php echo $peminatan->id_peminatan; ?> </td>
														<td align="center" class="line3"> 
															<a href="<?php echo site_url('editpeminatan/'.$peminatan->id_peminatan);?>" title="edit"><image src="<?php echo base_url(); ?>assets/css/images/useredit.png"></a>&nbsp;&nbsp;
																<a href="#" title="hapus" onclick="alertify.confirm('Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapuspeminatan/'.$peminatan->id_peminatan);?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"><image src="<?php echo base_url(); ?>assets/css/images/cross.png"></a>
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