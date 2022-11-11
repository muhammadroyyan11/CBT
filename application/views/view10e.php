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
									<h4 style="text-transform:uppercase;">HASIL UJIAN <?php if ($hasil->pnama == '') {echo $hasil->nama;} else {echo $hasil->pnama;} ?> (<?php if ($hasil->pnopes == '') {echo $hasil->no_peserta;} else {echo $hasil->pnopes;} ?>)</h4>
								</div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
					
					<div class="wrapper">	
						
						<div class="container">	
							<div class="row" >
								<div class="col-md-12 text-right" >
									<a class="btn btn-danger btn-sm" href="#" onclick="javascript:window.close();opener.window.focus();" >Close</a>
								</div>
								<div class="clear"></div>
								<div class="h10" ></div>
								<div class="col-md-12" >
									<?php 
										if ($hasil->multi==1)
										
										{ ?>
										<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
											<tr class="tr-head">
												<td width="26%" align="center" class="line2"> Nama Peserta </td>
												<td width="12%" align="center" class="line2"> No Peserta </td>
												<td width="26%" align="center" class="line2"> Kelas </td>
												<td width="12%" align="center" class="line2"> Nilai Rata<sup>2</sup>  </td>
												<td width="12%" align="center" class="line2"> Skala Rata<sup>2</sup> </td>
												<td width="12%" align="center" class="line2"> Predikat Rata<sup>2</sup> </td>	
											</tr>
											<tr>
												<td align="center" class="line"> <?php if ($hasil->pnama == '') {echo $hasil->nama;} else {echo $hasil->pnama;}?></td>
												<td align="center" class="line"> <?php if ($hasil->pnopes == '') {echo $hasil->no_peserta;} else {echo $hasil->pnopes;} ?></td>
												<td align="center" class="line"> <?php echo $hasil->nama_kelas;?></td>
												<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($hasil->p_nilai, '0'), '.');echo $fnilai; ?>													
												</td>					
												<td align="center" class="line"> <?php $fskala = rtrim(rtrim($hasil->k13, '0'), '.');echo $fskala; ?> </td>
												<td align="center" class="line3"> <?php echo $hasil->predikat;?></td>
											</tr>
										</table>
									</div>
								</div>	
							</div>
							<div class="clear"></div>
							<div class="h20" ></div>
							<div class="container">	
								<div class="row" >
									<div class="col-md-12" >
										<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
											<tr class="tr-head">
												<td width="45%" align="center" class="line2"> Mata Pelajaran </td>
												<td width="10%" align="center" class="line2"> Jumlah Soal </td>
												<td width="7%" align="center" class="line2"> Benar </td>
												<td width="7%" align="center" class="line2"> Salah </td>
												<td width="7%" align="center" class="line2"> Kosong </td>
												<td width="7%" align="center" class="line2"> Nilai </td>		
												<td width="7%" align="center" class="line2"> Skala </td>
												<td width="10%" align="center" class="line2"> Predikat </td>					
											</tr>
											<?php 
												$jumlah_mapel = $hasil->jumlah_mapel;
												for($k=1;$k<=$jumlah_mapel;$k++){ ?>
												<tr>
													<td align="center" class="line"> <?php echo $hasil->{'mapel'.$k};?></td>
													<td align="center" class="line"> <?php echo $hasil->{'jml_mapel'.$k};?></td>
													<td align="center" class="line"> <?php echo $hasil->{'benar'.$k};?></td>
													<td align="center" class="line"> <?php echo $hasil->{'salah'.$k};?></td>					
													<td align="center" class="line"> <?php echo $hasil->{'kosong'.$k};?></td>			
													<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($hasil->{'nilai'.$k}, '0'), '.');echo $fnilai; ?>													
													</td>					
													<td align="center" class="line"> <?php $fskala = rtrim(rtrim($hasil->{'k13_'.$k}, '0'), '.');echo $fskala; ?> </td>
													<td align="center" class="line3"> <?php echo $hasil->{'predikat'.$k};?></td>
												</tr>
											<?php } ?>
										</table>										
									</div>
								</div>	
							</div>
							
							<?php	}
							
							else{ ?>
							
							<div class="container">	
								<div class="row" >
									<div class="col-md-12" >
										<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
											<tr class="tr-head">
												<td width="20%" align="center" class="line2"> Nama Peserta </td>
												<td width="12%" align="center" class="line2"> No Peserta </td>
												<td width="12%" align="center" class="line2"> Kelas </td>
												<td width="14%" align="center" class="line2"> Nama Ujian </td>
												<td width="7%" align="center" class="line2"> Benar </td>
												<td width="7%" align="center" class="line2"> Salah</td>
												<td width="7%" align="center" class="line2"> Kosong </td>
												<td width="7%" align="center" class="line2"> Nilai </td>
												<td width="7%" align="center" class="line2"> Skala </td>
												<td width="7%" align="center" class="line2"> Predikat </td>		
											</tr>
											<tr>
												<td align="center" class="line"> <?php if ($hasil->pnama == '') {echo $hasil->nama;} else {echo $hasil->pnama;}?></td>
												<td align="center" class="line"> <?php if ($hasil->pnopes == '') {echo $hasil->no_peserta;} else {echo $hasil->pnopes;} ?></td>
												<td align="center" class="line"> <?php echo $hasil->nama_kelas;?></td>
												<td align="center" class="line"> <?php echo $hasil->pnama_ujian;?></td>
												<td align="center" class="line"> <?php echo $hasil->p_benar;?></td>
												<td align="center" class="line"> <?php echo $hasil->p_salah;?></td>
												<td align="center" class="line"> <?php echo $hasil->p_kosong;?></td>
												<td align="center" class="line"> <?php $fnilai = rtrim(rtrim($hasil->p_nilai, '0'), '.');echo $fnilai; ?>
												</td>					
												<td align="center" class="line"> <?php $fskala = rtrim(rtrim($hasil->k13, '0'), '.');echo $fskala; ?> </td>
												<td align="center" class="line3"> <?php echo $hasil->predikat;?></td>
											</tr>
										</table>
									</div>
								</div>	
							</div>
							
						<?php } ?>
						<div class="clear"></div>			
						<div class="h20"></div>
						<div class="container">
							<div class="row" >
								<div class="col-md-6" >
									<div class="panel panel-default">
										<div class="panel-heading" style="background:#28A9E3;color:#fff;">PILIHAN JURUSAN</div>
										<div class="panel-body">	
											
											Pilihan Jurusan 1 : <?php if (isset($jurusan1->kode_jurusan)) { echo $jurusan1->kode_jurusan.' - '.$jurusan1->pil_jurusan.' - '.$jurusan1->nama_univ;} else { echo "<span style='color:red;'>Siswa belum memilih</span>";}    ?><br/>
											Pilihan Jurusan 2 : <?php if (isset($jurusan2->kode_jurusan)) { echo $jurusan2->kode_jurusan.' - '.$jurusan2->pil_jurusan.' - '.$jurusan2->nama_univ; } else { echo "<span style='color:red;'>Siswa belum memilih</span>";}  ?><br/>
											Pilihan Jurusan 3 : <?php if (isset($jurusan3->kode_jurusan)) { echo $jurusan3->kode_jurusan.' - '.$jurusan3->pil_jurusan.' - '.$jurusan3->nama_univ; } else { echo "<span style='color:red;'>Siswa belum memilih</span>";} ?>
											
											
											
										</div>
									</div>	
								</div>
								<div class="col-md-6" ></div>
							</div>
						</div>
						<div class="clear"></div>
						
						
						<div class="h20" ></div>
						<?php 							
							//no soal
							$no_soal = explode(',',$hasil->no_soal);
							$no_soal1 = explode(',',$hasil->no_soal);
							sort($no_soal);
							$soal = implode('',$no_soal);
							
							//jrx
							$jrx = explode(',',$hasil->jrx);
							$jrx1 = array_combine($no_soal1, $jrx);
							
							//jawaban siswa
							$jwb = explode(',',$hasil->hasil_jawaban);
							$jwb1 = array_combine($no_soal1, $jwb);
							
							//koreksi
							if ($hasil->proses_nilai == '') {
								$koreksi = 'none';
								$koreksi1 = 'none';
								} else {
								$koreksi = explode(',',$hasil->proses_nilai);
								$koreksi1 = array_combine($no_soal1, $koreksi);													
							}
							
							$this ->db->order_by("FIELD(id_soal, $soal)");
							$this->db->select('*');
							$this->db->from('soal');
							$this->db->where_in('id_soal',$no_soal);
							$query = $this->db->get ();		
							
						
						?>
						
						<script type="text/javascript">
							var jml = <?php echo count($no_soal); ?>;
							function buka() {
								for (var i=0;i<jml;i++) {
									document.getElementById('spoiler['+i+']').style.display = "";
									document.getElementById('elips['+i+']').style.display = "none";
								}
							}
						</script>
						
						<div class="container">	
							<div class="row" >
								<div class="col-md-12" >
								<?php if($hasil->tipe==0) { ?>
								
									<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
										<tr class="tr-head">
											<td  align="center" width="6%" class="line2"> No</td>
											<td  align="center" width="7%" class="line2"> Kode Soal</td>
											<td  align="center" width="60%" class="line2"> Soal <input style="font-family: 'SourceSansPro-Regular', arial;color:#FFFFCB;background:#449D44;float:right; margin:2px 7px 3px 0px;width: 60px; font-size: 10px;" type="button" onclick="javascript:buka();" value="Show All" /></td>
											<td  align="center" width="7%" class="line2"> Kunci</td>
											<td  align="center" width="10%" class="line2"> Jawaban Siswa</td>
											<td  align="center" width="10%" class="line2"> Koreksi </td>
										</tr>
										<?php $i=0; foreach ($query->result() as $row)
											{ ?>
											<tr>
												<td class="line" valign="top" style="padding-top:3px;">
													<?php echo $i+1; ?>
												</td>
												<td class="line" valign="top" style="padding-top:3px;background:#FFFFCB;">
													<?php print $no_soal[$i]; ?>
												</td>
												<td  class="line soals" valign="top" style="text-align:left;padding-left:5px;">
													<p>
														<?php 
															$gbr = $row->mm_soal;
															
															if (empty($gbr))  { echo '';
															}
															else 
															
															{  ?><audio controls>
																<source src="<?php echo base_url() . 'assets/image/' . $row->mm_soal; ?>" type="audio/mp3"> 
																<source src="<?php echo base_url() . 'assets/image/' . $row->mm_soal; ?>" type="audio/wav">
																<source src="<?php echo base_url() . 'assets/image/' . $row->mm_soal; ?>" type="audio/mid"> 											
															</audio>			
														<?php }  ?></p>
														<div><input value="Show" style="float:right; margin-top:2px; margin-right:5px;width: 60px; font-size: 10px;" onclick="var i = <?php echo $i; ?>;if (this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display != '') { document.getElementById('elips['+i+']').style.display = 'none';this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.parentNode.parentNode.getElementsByTagName('div')[0].style.visibility = 'hidden';this.value = 'Hide';} else {document.getElementById('elips['+i+']').style.display = '';this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.parentNode.parentNode.getElementsByTagName('div')[0].style.visibility = 'visible';this.value = 'Show'; }" type="button"></div>
														<?php echo '<div id="elips['.$i.']" style="float:left;">'; ?>
												<?php $soal_string = ellipsize($row->soal,70);echo $soal_string; ?></div>
												<div><?php echo '<div id="spoiler['.$i.']" style="display:none;">'; ?>
													<div class="clear"></div>
													<p><?php echo $row->soal; ?></p>
													<div class="clear"></div>
													<?php					
														$e = $row->pil_e;
														$jrx = $row->jrx;
														if ($jrx == "A") {?>													
														<div class="pilihan3"><span class="kunci">A.</span></div><div class="pilihan4"><?php echo $row->pil_a;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $row->pil_b;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $row->pil_c;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $row->pil_d;?></div>
														<div class="clear"></div>
														
														<?php if (empty($e)) { } else {?>
															<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $row->pil_e;?></div>
															<div class="clear"></div>
														<?php } ?>
														
														<?php
														} elseif ($jrx == "B") {?>
														<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $row->pil_a;?></div>
														<div class="clear"></div>	
														<div class="pilihan3"><span class="kunci">B.</span></div><div class="pilihan4"><?php echo $row->pil_b;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $row->pil_c;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $row->pil_d;?></div>
														<div class="clear"></div>
														
														<?php if (empty($e)) { } else {?>
															<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $row->pil_e;?></div>
															<div class="clear"></div>
														<?php } ?>															
														
														<?php
														} elseif ($jrx == "C") {?>
														<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $row->pil_a;?></div>
														<div class="clear"></div>	
														<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $row->pil_b;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3"><span class="kunci">C.</span></div><div class="pilihan4"><?php echo $row->pil_c;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $row->pil_d;?></div>
														<div class="clear"></div>
														
														<?php if (empty($e)) { } else {?>
															<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $row->pil_e;?></div>
															<div class="clear"></div>
														<?php } ?>	
														<?php
														} elseif ($jrx == "D") {?>
														<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $row->pil_a;?></div>
														<div class="clear"></div>	
														<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $row->pil_b;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $row->pil_c;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3"><span class="kunci">D.</span></div><div class="pilihan4"><?php echo $row->pil_d;?></div>
														<div class="clear"></div>
														
														<?php if (empty($e)) { } else {?>
															<div class="pilihan3">E.</div><div class="pilihan4"><?php echo $row->pil_e;?></div>
															<div class="clear"></div>
														<?php } ?>	
														<?php
														} elseif ($jrx == "E") {?>
														<div class="pilihan3">A.</div><div class="pilihan4"><?php echo $row->pil_a;?></div>
														<div class="clear"></div>	
														<div class="pilihan3">B.</div><div class="pilihan4"><?php echo $row->pil_b;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">C.</div><div class="pilihan4"><?php echo $row->pil_c;?></div>
														<div class="clear"></div>
														
														<div class="pilihan3">D.</div><div class="pilihan4"><?php echo $row->pil_d;?></div>
														<div class="clear"></div>
														
														<?php if (empty($e)) { } else {?>
															<div class="pilihan3"><span class="kunci">E.</span></div><div class="pilihan4"><?php echo $row->pil_e;?></div>
															<div class="clear"></div>
														<?php } ?>	
														<?php
														}
														else
														{														
															echo "<span class='kunci'>Belum ada kunci jawaban</span>";													
														}
														
													?>
												</div>
											</td>
											<td class="line" valign="top" style="padding-top:3px;"><?php echo $jrx1[$no_soal[$i]]; ?></td>
											<td class="line" valign="top" style="padding-top:3px;"><?php echo str_replace("|",",",$jwb1[$no_soal[$i]]); ?></td>
											<td class="line3" valign="top" style="padding-top:3px;">
												<?php 
												
													if ($koreksi1 == 'none'){ echo "<span style='color:red;'>Belum ada nilai</span>";} else {
														if ($koreksi1[$no_soal[$i]] == 9)
														{print "Kosong"; } elseif ($koreksi1[$no_soal[$i]] == 1)
														{print "<span style='color:green;'>Benar</span>"; } else {print "<span style='color:red;'>Salah</span>"; }
													}
											
												?>
											</td>
										</tr>
										<?php $i++; }
									?>
								</table>
								
								<?php } else { ?>
									<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
										<tr class="tr-head">
											<td  align="center" width="6%" class="line2"> No</td>
											<td  align="center" width="7%" class="line2"> Kode Soal</td>
											<td  align="center" width="45%" class="line2"> Soal <input style="font-family: 'SourceSansPro-Regular', arial;color:#FFFFCB;background:#449D44;float:right; margin:2px 7px 3px 0px;width: 60px; font-size: 10px;" type="button" onclick="javascript:buka();" value="Show All" /></td>
										
											<td  align="center" width="42%" class="line2"> Jawaban Siswa</td>
										
										</tr>
										<?php $i=0; foreach ($query->result() as $row)
											{ ?>
											<tr>
												<td class="line" valign="top" style="padding-top:3px;">
													<?php echo $i+1; ?>
												</td>
												<td class="line" valign="top" style="padding-top:3px;background:#FFFFCB;">
													<?php print $no_soal[$i]; ?>
												</td>
												<td  class="line soals" valign="top" style="text-align:left;padding-left:5px;">
													<p>
														<?php 
															$gbr = $row->mm_soal;
															
															if (empty($gbr))  { echo '';
															}
															else 
															
															{  ?><audio controls>
																<source src="<?php echo base_url() . 'assets/image/' . $row->mm_soal; ?>" type="audio/mp3"> 
																<source src="<?php echo base_url() . 'assets/image/' . $row->mm_soal; ?>" type="audio/wav">
																<source src="<?php echo base_url() . 'assets/image/' . $row->mm_soal; ?>" type="audio/mid"> 											
															</audio>			
														<?php }  ?></p>
														<div><input value="Show" style="float:right; margin-top:2px; margin-right:5px;width: 60px; font-size: 10px;" onclick="var i = <?php echo $i; ?>;if (this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display != '') { document.getElementById('elips['+i+']').style.display = 'none';this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.parentNode.parentNode.getElementsByTagName('div')[0].style.visibility = 'hidden';this.value = 'Hide';} else {document.getElementById('elips['+i+']').style.display = '';this.parentNode.parentNode.getElementsByTagName('div')[2].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.parentNode.parentNode.getElementsByTagName('div')[0].style.visibility = 'visible';this.value = 'Show'; }" type="button"></div>
														<?php echo '<div id="elips['.$i.']" style="float:left;">'; ?>
												<?php $soal_string = ellipsize($row->soal,70);echo $soal_string; ?></div>
												<div><?php echo '<div id="spoiler['.$i.']" style="display:none;">'; ?>
													<div class="clear"></div>
													<p><?php echo $row->soal; ?></p>
													<div class="clear"></div>
											

														
							
												</div>
											</td>
										
											<td class="line" valign="top" style="padding-top:3px;"><?php echo str_replace("|",",",$jwb1[$no_soal[$i]]); ?></td>
											<td class="line3" valign="top" style="padding-top:3px;">
							
												
											</td>
										</tr>
										<?php $i++; }
									?>
								</table>
									
								<?php } ?>
							</div>
						</div>
						<div class="clear"></div>
						<div class="h20" ></div>
						<div class="container">	
							<div class="row">
								<div class="col-md-6"></div>	
								<div class="col-md-6">
									<?php if ($hasil->multi==1)
										
										{ 
											$this->db->select('*');
											$this->db->from('proses');
											$this->db->where('id_proses',$hasil->id_proses);
											$query = $this->db->get ();			
											$qrow = $query->result();
											$row = $qrow[0];
											if ($query->num_rows() > 0) {
												$nkelas = $row->nama_kelas;
												$nujian = $row->nama_ujian;
												
												$this->db->select('*');
												$this->db->from('setting');
												$query1 = $this->db->get ();												
												$qrow1 = $query1->result();
												$row1 = $qrow1[0];
												$folsiswa = $row1->folder_cet_siswa;						
											?>
											<form class="form-horizontal" action="<?php echo site_url('eksporsiswamulti');?>" method="POST" target="_blank">
												
												<div class="form-group">											
													<label class="col-md-5" style="width:182px;">Judul Header Baris Ke-1:  </label>
													<div class="col-md-7"><input class="form-control input-sm" type="text" name="judul" value="Hasil Ujian <?php echo $nujian; ?>"></div>
												</div>	
												<div class="form-group">
													<label class="col-md-5" style="width:182px;">Judul Header Baris Ke-2 : </label>
													<div class="col-md-7"><input class="form-control input-sm" type="text" name="ketkelas" value="Kelas <?php echo $nkelas; ?>"></div>
												</div>	
												<div class="form-group">
													<label class="col-md-5" style="width:182px;">Lokasi Folder : </label>
													<div class="col-md-7"><input class="form-control input-sm" type="text" name="excel1" value="<?php echo $folsiswa ?>" required></div>
												</div>	
												<div class="form-group">
													<label class="col-md-5" style="width:182px;">Nama File Excel : </label>
													<div class="col-md-7"><input class="form-control input-sm" type="text" name="excel2" required></div>
													<input type="hidden" name="id_proses" value="<?php echo $hasil->id_proses;?>" />
												</div>	
												<div class="form-group">
													<div class="col-md-5" style="width:182px;"></div>
													<div class="col-md-7"><input class="btn btn-success btn-sm" type="submit" value="Ekspor ke Excel" title="Ekspor ke Excel"/></div>
												</div>	
											</form>
										<?php  } else {} }
										else {
											$this->db->select('*');
											$this->db->from('proses');
											$this->db->where('id_proses',$hasil->id_proses);
											$query = $this->db->get ();												
											$qrow = $query->result();
											$row = $qrow[0];
											if ($query->num_rows() > 0) {
												$nkelas = $row->nama_kelas;
												$nujian = $row->nama_ujian;
												
												$this->db->select('*');
												$this->db->from('setting');
												$query1 = $this->db->get ();												
												$qrow1 = $query1->result();
												$row1 = $qrow1[0];
												$folsiswa = $row1->folder_cet_siswa;	
											?>	
											
											<?php if($hasil->tipe==0) { ?>
											<form class="form-horizontal" action="<?php echo site_url('eksporsiswa');?>" method="POST" target="_blank">
											<?php } else { ?>
											<form class="form-horizontal" action="<?php echo site_url('eksporsiswa_e');?>" method="POST" target="_blank">
											<?php } ?>
												<div class="form-group">											
													<label class="col-md-5" style="width:182px;">Judul Header Baris Ke-1:  </label>
													<div class="col-md-7"><div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div><input class="form-control input-sm" type="text" name="judul" value="Hasil Ujian <?php echo $nujian; ?>"></div></div>
												</div>	
												<div class="form-group">
													<label class="col-md-5" style="width:182px;">Judul Header Baris Ke-2 : </label>
													<div class="col-md-7"><div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div><input class="form-control input-sm" type="text" name="ketkelas" value="Kelas <?php echo $nkelas; ?>"></div></div>
												</div>	
												<div class="form-group">
													<label class="col-md-5" style="width:182px;">Lokasi Folder : </label>
													<div class="col-md-7"><div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div><input class="form-control input-sm" type="text" name="excel1" value="<?php echo $folsiswa ?>" required></div></div>
												</div>	
												<div class="form-group">
													<label class="col-md-5" style="width:182px;">Nama File Excel : </label>
													<div class="col-md-7"><div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div><input class="form-control input-sm" type="text" name="excel2" required></div>
													<input type="hidden" name="id_proses" value="<?php echo $hasil->id_proses;?>" /></div>
												</div>	
												<div class="form-group">
													<div class="col-md-5" style="width:182px;"></div>
													<div class="col-md-7"><input class="btn btn-success btn-sm" type="submit" value="Ekspor ke Excel" title="Ekspor ke Excel"/></div>
												</div>	
												<input type="hidden" name="id_proses" value="<?php echo $hasil->id_proses;?>" />
											</form>
											<?php  } else {}
										}?>
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
	include 'view3.php'; 
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