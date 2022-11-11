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
	if(isset($_SESSION['user_id'])){ //jika variabel berisi id_user
	?>
	<?php include 'view6.php'; 	
	?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
				<?php include 'view41.php'; ?>
			</div>
			<div class="col-md-10 plr15" >
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					
					<div id="container1">
						<div id="body"> 
							
							<div class="clear"></div>
							<div class="container">	
								<div class="row" >
									<div class="col-md-12" >
					
															
															<?php		   
										$nc1 = $this->session->userdata('no_copy');
											
										$this->db->select('*');
										$this->db->from('proses');
										$this->db->where_in('no_copy',$nc1);
										$query2 = $this->db->get ();												
										$qrows2 = $query2->result();
										$list2 = $qrows2[0];
										
										$my2 = 1 + $list2->my;
										
										$my3 = $list2->my2;										
										$array1 = explode(',',$my3);
										$cmy = count($array1);
										
									
										
										$my = $array1[$my2]; 
				
										$this->db->select('*');
										$this->db->from('ujian');
										$this->db->where_in('id_ujian',$my);
										$query = $this->db->get ();												
										$qrows = $query->result();
										$list = $qrows[0];
										
										
	$no_copy = $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;
	
																?>
																
																<form id="kirim" action="<?php echo site_url('simpanjawaban');?>" method="POST">
																	
																	<input type="hidden" name="nc" value="<?php echo $this->session->userdata('user_id').$this->session->userdata('kelas').$list->id_ujian;?>">
																	<input type="hidden" name="idu" value="<?php echo $list->id_ujian; ?>">
																	<input type="hidden" name="nm" value="<?php echo $this->session->userdata('nama'); ?>">
																	<input type="hidden" name="np" value="<?php echo $this->session->userdata('no_peserta'); ?>">
																	<input type="hidden" name="nu" value="<?php echo $this->session->userdata('namaujian'); ?>">
																	<input type="hidden" name="nk" value="<?php echo $this->session->userdata('namakelas'); ?>">
																	<input type="hidden" name="sek" value="<?php echo $this->session->userdata('sekolah'); ?>">					
																	<input type="hidden" name="js" value="<?php echo $list->jumlah_soal; ?>">
																	<input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id'); ?>">
																	<input type="hidden" name="idk" value="<?php echo $this->session->userdata('kelas'); ?>">
																	<input type="hidden" name="be" value="<?php echo $list->benar; ?>">
																	<input type="hidden" name="sa" value="<?php echo $list->salah; ?>">
																	<input type="hidden" name="ko" value="<?php echo $list->kosong; ?>">
																	<input type="hidden" name="sk" value="<?php echo $list->skala; ?>">
																	<input type="hidden" name="sw" value="<?php echo $list->waktu; ?>">
																	<input type="hidden" name="mt" value="<?php echo $list->multi; ?>">
																	<input type="hidden" name="jm" value="<?php echo $list->jumlah_mapel; ?>">
																	<input type="hidden" name="m1" value="<?php echo $list->mapel1; ?>">
																	<input type="hidden" name="m2" value="<?php echo $list->mapel2; ?>">
																	<input type="hidden" name="m3" value="<?php echo $list->mapel3; ?>">
																	<input type="hidden" name="m4" value="<?php echo $list->mapel4; ?>">
																	<input type="hidden" name="m5" value="<?php echo $list->mapel5; ?>">
																	<input type="hidden" name="m6" value="<?php echo $list->mapel6; ?>">
																	<input type="hidden" name="m7" value="<?php echo $list->mapel7; ?>">
																	<input type="hidden" name="m8" value="<?php echo $list->mapel8; ?>">
																	<input type="hidden" name="m9" value="<?php echo $list->mapel9; ?>">
																	<input type="hidden" name="m10" value="<?php echo $list->mapel10; ?>">
																	<input type="hidden" name="jm1" value="<?php echo $list->jml_mapel1; ?>">
																	<input type="hidden" name="jm2" value="<?php echo $list->jml_mapel2; ?>">
																	<input type="hidden" name="jm3" value="<?php echo $list->jml_mapel3; ?>">
																	<input type="hidden" name="jm4" value="<?php echo $list->jml_mapel4; ?>">
																	<input type="hidden" name="jm5" value="<?php echo $list->jml_mapel5; ?>">
																	<input type="hidden" name="jm6" value="<?php echo $list->jml_mapel6; ?>">
																	<input type="hidden" name="jm7" value="<?php echo $list->jml_mapel7; ?>">
																	<input type="hidden" name="jm8" value="<?php echo $list->jml_mapel8; ?>">
																	<input type="hidden" name="jm9" value="<?php echo $list->jml_mapel9; ?>">
																	<input type="hidden" name="jm10" value="<?php echo $list->jml_mapel10; ?>">
																	<input type="hidden" name="kja" value="<?php echo $list->kjawab; ?>">
															
																	<?php

																	
												       
																																	
																	echo '<input type="hidden" name="my" value="'.$my2.'">';
																	echo '<input type="hidden" name="my1" value="'.$my.'">';
																	echo '<input type="hidden" name="my2" value="'.$my3.'">';
															
																	
																	
																	?>	
															
															
																	
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
	
<script>
					$(document).ready(function(){
				document.getElementById("kirim").submit();
				});	
				</script>

	<?php include 'view3.php'; ?>
	<?php
		}else{
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