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
		<?php include 'view5.php';
			$this->session->set_userdata('id_page',$this->uri->segment(3));						
			$last = end($this->uri->segments); 
			if ($this->uri->segment(3) == '')
			{
				$i = 1;	
			}
			else
			{
				$i = $last+1;	
			} ?>
			
			<div class="container">
				<div class="row" >	
					<div class="col-md-2" >
						<?php include 'view40.php'; 
							$idfolder = $this->session->userdata('id_folder'); 
						?>
					</div>
					<div class="col-md-10 plr15" >
						<div class="subjudul">
							<div class="container">
								<div class="row" >
									<div class="col-md-6 plr15" >
										<h4 style="text-transform:uppercase;">SOAL <?php echo $this->session->userdata('namaujian'); ?></h4>
									</div>
									<div class="col-md-6 text-right plr15" >
										<?php
											$idujian = $this->session->userdata('id_ujian'); 
											
											
											if ($this->input->post('cari')==''){
											echo '';}
											else {
												$c = $this->input->post('cari');
												$this->db->select('*, soal.id_ujian as idu, replace(replace(replace(soal, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as soal1, replace(replace(replace(pil_a, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_a, replace(replace(replace(pil_b, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_b, replace(replace(replace(pil_c, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_c, replace(replace(replace(pil_d, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_d, replace(replace(replace(pil_e, "<p>&nbsp;</p>", ""),"<p>",""),"</p>","") as pil_e');
												$this->db->from('soal');
												$this->db->join ( 'ujian', 'ujian.id_ujian = soal.id_ujian' , 'left' );
												$this->db->where('soal.id_ujian', $idujian);
												$this->db->like('soal', $c);
												$this->db->or_like('pil_a',$c);
												$this->db->or_like('pil_b',$c);
												$this->db->or_like('pil_c',$c);
												$this->db->or_like('pil_d',$c);
												$this->db->or_like('pil_e',$c);
											echo '<span style="color:red;">Ditemukan '.$this->db->count_all_results().' data "'.$this->input->post("cari").'"';}
										?>
										
									</div>
								</div>
							</div>
						</div>
						
						<div class="clear"></div>
						
						<?php 
							$this->db->select('*');
							$this->db->from('ujian');
							$this->db->where_in('id_ujian',$idujian);
							$query1 = $this->db->get ();												
							$qrows1 = $query1->result();
							$rows1 = $qrows1[0];
							$tipe = $rows1->tipe;
						?>
						
						<div class="wrapper">	
							<center><?php echo $this->session->flashdata('pesan6');?></center>							
							<div class="container">
								<div class="row" >
									<div class="col-md-3 pb10">
										
										<?php if($tipe==0) { ?>
											<a class="btn btn-success btn-sm" href="<?php echo site_url('tambahsoal/ujian');?>" style="margin-right:10px;"><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;"></i>SOAL PG</a>
											<button class="btn btn-warning btn-sm" disabled><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;"></i>SOAL ESSAY</button>
											<?php } else { ?>
											<button class="btn btn-success btn-sm" disabled style="margin-right:10px;"><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;" onclick="alertify.alert('Opsi ujian essay belum diaktifkan!',function(){});">></i>SOAL PG</button>
											<a class="btn btn-warning btn-sm" href="<?php echo site_url('tambahsoal/ujian_e');?>" ><i class="fa fa-plus" aria-hidden="true" style="margin-right:10px;" ></i>SOAL ESSAY</a>
										<?php } ?>
									</div>
									<div class="col-md-6">
										<form action="<?php echo site_url('carisoal/'.$idujian);?>" method="POST"> 
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
										<a class="btn btn-danger btn-sm" href="<?php echo site_url('tampilujian/'.$idfolder);?>">Back </a>
									</div>
								</div>
							</div>				
							
							<div class="clear"></div>			
							<div class="pb10"></div>					
							<form action="<?php echo site_url('aktivasisoal');?>" method="POST" id="frm1"> 
								<div class="container">
									<div class="row bluebox">
										
										<div class="col-md-5">
											<div class="col-md-4 pb10">
												
												<select name="pilih" class="form-control input-sm bulk">
													<option value="">-- Silahkan Pilih --</option>
													<option value="1">Aktifkan</option>    
													<option value="0">Non-aktifkan</option>
													<option value="3">Duplikasi</option>
													<option value="2">Hapus</option>    
												</select>
												
											</div>
											<div class="col-md-1 w10"></div>
											<div class="col-md-3 pb10"><?php echo form_dropdown('id_ujian', $ddujian, '', 'class="form-control input-sm bulk"'); ?></div>
											<div class="col-md-1 w10"></div>
											<div class="col-md-3 pb10">		
												<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
												<input class="btn btn-danger btn-sm" onclick="alertify.confirm('Anda yakin ingin memprosesnya?<br/>',function(e){if(e) {submit();alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});" value="TERAPKAN" />
												
											</div></div>
											<div class="col-md-3 pt5b10" style="color:#fff;">
												<?php	
													$where1 = "id_ujian like '$idujian' or id_ujian like '%,$idujian' or id_ujian like '$idujian,%' or id_ujian like '%,$idujian,%'";
													$this->db->where($where1);
													$this->db->from('soal');
													$alamat_semua = site_url('tampilsoal/'.$idujian);			
													echo '<a class="dlink" href="'.$alamat_semua.'">Semua</a> ('.$this->db->count_all_results().') | ';
													
													$where2 = "(id_ujian like '$idujian' or id_ujian like '%,$idujian' or id_ujian like '$idujian,%' or id_ujian like '%,$idujian,%') AND soal.aktif=1";
													$this->db->where($where2);
													$this->db->from('soal');
													$alamat_aktif = site_url('carisoalaktif/'.$idujian);
													echo '<a class="dlink" href="'.$alamat_aktif.'">Aktif</a> ('.$this->db->count_all_results().') | '; 
													
													$where3 = "(id_ujian like '$idujian' or id_ujian like '%,$idujian' or id_ujian like '$idujian,%' or id_ujian like '%,$idujian,%') AND soal.aktif=0";
													$this->db->where($where3);
													$this->db->from('soal');
													$alamat_nonaktif = site_url('carisoalnonaktif/'.$idujian);
													echo '<a class="dlink" href="'.$alamat_nonaktif.'">Non-aktif</a> ('.$this->db->count_all_results().')'; 
													
													$this->db->where('id_ujian', $idujian);
													$this->db->from('soal');				
												?>	
												
												<script type="text/javascript">
													var jml = <?php echo $this->db->count_all_results(); ?>;
													var k = <?php echo $i; ?>;
													function buka() {
														for (var i=k;i<=jml;i++) {
															document.getElementById('spoiler['+i+']').style.display = "";
															document.getElementById('elips['+i+']').style.display = "none";
														}
													}
												</script>
												
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
													<td width="6%" align="center" class="line2">No</td>
													<td width="7%" align="center" class="line2">Kode Soal</td>
													<td width="50%" align="center" class="line2">Soal <input style="font-family: 'SourceSansPro-Regular', arial;color:#FFFFCB;background:#449D44;float:right; margin:2px 4px 3px 0px;width: 60px; font-size: 10px;" type="button" onclick="javascript:buka();" value="Show All" /></td>
													<td width="5%" align="center" class="line2">Kunci</td>
													<td width="5%" align="center" class="line2">Bobot</td>
													<td width="10%" align="center" class="line2">Keterangan Ujian</td>
													<td width="7%" align="center" class="line2">Status</td>
													<td width="7%" align="center" class="line2">Action</td>
												</tr>
												
												<?php
													
													foreach ($View_soal as $key => $soal)
													
													{
														
													?>
													<tr>
														<td class="line" valign="top" style="padding-left:3px;padding-top:3px;">		
															<input type="checkbox" name="id_soal[]" value="<?php echo $soal->id_soal ?>">
														</form>
													</td>	
													<td align="center" class="line" valign="top" style="padding-top:3px;">
														<?php echo $i; ?>
													</td>
													<td class="line" valign="top" style="padding-top:3px;background:#FFFFCB;">
														<?php echo $soal->id_soal; ?>
													</td>
													<td class="line soals" valign="top" style="text-align:left;padding-left:5px;padding-top:3px;">	
														<div><input value="Show" style="float:right; margin-top:2px; margin-right:2px;width: 60px; font-size: 10px;" onclick="var i = <?php echo $i; ?>;if (this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display != '') { document.getElementById('elips['+i+']').style.display = 'none';this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.parentNode.parentNode.getElementsByTagName('div')[0].style.visibility = 'hidden';this.value = 'Hide'; } else { document.getElementById('elips['+i+']').style.display = '';this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.parentNode.parentNode.getElementsByTagName('div')[0].style.visibility = 'visible';this.value = 'Show'; }" type="button"></div>
														<p>
															<?php 
																$gbr = $soal->mm_soal;
																
																if (empty($gbr))  { echo '';
																}
																else 
																
																{  ?><audio controls>
																	<source src="<?php echo base_url() . 'assets/kcfinder/upload/audio/' . $soal->mm_soal; ?>" type="audio/mp3"> 
																	<source src="<?php echo base_url() . 'assets/kcfinder/upload/audio/' . $soal->mm_soal; ?>" type="audio/wav">
																	<source src="<?php echo base_url() . 'assets/kcfinder/upload/audio/' . $soal->mm_soal; ?>" type="audio/mid"> 											
																</audio>			
															<?php }  ?>
														</p>
														
														<?php echo '<div id="elips['.$i.']" style="float:left;">'; ?>
													<?php $soal_string = ellipsize($soal->soal,70);echo $soal_string; ?></div>
													
													<div>
														<?php echo '<div id="spoiler['.$i.']" style="display:none;">'; ?>
														
														<div class="clear"></div>
														
															<?php echo $soal->soal; ?>
														
														<div class="clear"></div>
														<?php	
															if($soal->tipe==0)
															{ 
																
																$e = $soal->pil_e;
																$jrx = $soal->jrx;
																if ($jrx == "A") {?>													
																<div class="pilihan3"><span class="kunci">A.</span></div><div class="pilihan4"><?php echo $soal->pil_a;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $soal->pil_b;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $soal->pil_c;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $soal->pil_d;?></div>
																<div class="clear"></div>
																
																<?php if (empty($e)) { } else {?>
																	<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $soal->pil_e;?></div>
																	<div class="clear"></div>
																<?php } ?>
																
																<?php
																} elseif ($jrx == "B") {?>
																<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $soal->pil_a;?></div>
																<div class="clear"></div>	
																<div class="pilihan3"><span class="kunci">B.</span></div><div class="pilihan4"><?php echo $soal->pil_b;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $soal->pil_c;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $soal->pil_d;?></div>
																<div class="clear"></div>
																
																<?php if (empty($e)) { } else {?>
																	<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $soal->pil_e;?></div>
																	<div class="clear"></div>
																<?php } ?>															
																
																<?php
																} elseif ($jrx == "C") {?>
																<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $soal->pil_a;?></div>
																<div class="clear"></div>	
																<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $soal->pil_b;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3"><span class="kunci">C.</span></div><div class="pilihan4"><?php echo $soal->pil_c;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $soal->pil_d;?></div>
																<div class="clear"></div>
																
																<?php if (empty($e)) { } else {?>
																	<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $soal->pil_e;?></div>
																	<div class="clear"></div>
																<?php } ?>	
																<?php
																} elseif ($jrx == "D") {?>
																<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $soal->pil_a;?></div>
																<div class="clear"></div>	
																<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $soal->pil_b;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $soal->pil_c;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3"><span class="kunci">D.</span></div><div class="pilihan4"><?php echo $soal->pil_d;?></div>
																<div class="clear"></div>
																
																<?php if (empty($e)) { } else {?>
																	<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $soal->pil_e;?></div>
																	<div class="clear"></div>
																<?php } ?>	
																<?php
																} elseif ($jrx == "E") {?>
																<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $soal->pil_a;?></div>
																<div class="clear"></div>	
																<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $soal->pil_b;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $soal->pil_c;?></div>
																<div class="clear"></div>
																
																<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $soal->pil_d;?></div>
																<div class="clear"></div>
																
																<?php if (empty($e)) { } else {?>
																	<div class="pilihan3"><span class="kunci">E.</span></div><div class="pilihan4"><?php echo $soal->pil_e;?></div>
																	<div class="clear"></div>
																<?php } ?>	
																<?php
																}
																elseif ($jrx == "")
																{
																	echo "<span class='kunci'>Belum ada kunci jawaban</span>";
																}
																
																
																
															?>
															
															
														</div>	</div>	
												</td> 
												<td class="line" valign="top" style="padding-top:3px;">
													<?php echo str_replace("~",",",$soal->jrx);?>
												</td>
												<td class="line" valign="top" style="padding-top:3px;">
													<?php echo $soal->bobot;?>
												</td>
												<?php
												} 
												else
												{ ?>
												
												<td class="line" valign="top" style="padding-top:3px;">
													
												</td>
												<td class="line" valign="top" style="padding-top:3px;">
													
												</td>
												<?php		
												}
											?>
											<td class="line" valign="top" style="padding-top:3px;">
												<?php 
													$tampil_u = explode(',',$soal->idu);
												
													$jml_u = count($tampil_u);
													$uj=array();
													for ($a=0;$a<$jml_u;$a++) {
														$this->db->select('*');
														$this->db->where('id_ujian',$tampil_u[$a]);
														$query = $this->db->get('ujian')->row();
														if(empty($query)){
														array_push($uj,$tampil_u[$a]);
														} else {
														
														array_push($uj,$query->nama_ujian);
														}
														
														
													}
													$nama = implode (',',$uj);
													echo $nama;	
												?>
											</td>
											<td class="line" valign="top" style="padding-top:3px;">
												
												<?php if ($soal->aktif == 1) 
													{ ?>
													<form action="<?php echo site_url('aktivasisoal1/'.$soal->id_soal);?>" method="POST" >
														
														<div class="tombolslide">
															<input type="checkbox" id="tombolslide<?php echo $soal->id_soal ?>" name="status" checked onclick="this.form.submit();"> 
															<label for="tombolslide<?php echo $soal->id_soal ?>"></label>
															<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
														</div>
														
													</form>
													
													<?php }
													else
													{ ?>
													<form action="<?php echo site_url('aktivasisoal1/'.$soal->id_soal);?>" method="POST" >
														
														<div class="tombolslide">
															<input type="checkbox" id="tombolslide<?php echo $soal->id_soal ?>" name="status" onclick="this.form.submit();">
															<label for="tombolslide<?php echo $soal->id_soal ?>"></label>
															<input type="hidden" name="uri" value="<?php echo $this->uri->segment(1);?>" />
														</div>
													</form>
													
												<?php } ?>   			
											</td>
											<td align="center" class="line3" valign="top" style="padding-top:3px;"> 
												<?php if($soal->tipe==0)
													{ ?>
													<a href="<?php echo site_url('editsoal/'.$soal->id_soal);?>" title="edit"><image src="<?php echo base_url(); ?>assets/css/images/useredit.png"></a>
														<?php } else { ?>
														<a href="<?php echo site_url('editsoal_e/'.$soal->id_soal);?>" title="edit"><image src="<?php echo base_url(); ?>assets/css/images/useredit.png"></a>
														<?php } ?>
														
														&nbsp;&nbsp;
														<a href="#" title="hapus" onclick="alertify.confirm('Anda yakin ingin menghapusnya?<br/>',function(e){if(e) {window.location.href ='<?php echo site_url('hapussoal/'.$soal->id_soal);?>';  alertify.success('Proses dijalankan.');} else {alertify.error('Proses dibatalkan.');}});"><image src="<?php echo base_url(); ?>assets/css/images/cross.png"></a>
														</td>
													</tr>
													
													
													<?php $i++;} ?>
											</table>
										</div>
										<div class="clear"></div>
										<div class="col-md-12 p15" >
											<?php echo $this->pagination->create_links(); ?>
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