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
	<?php include 'view6.php';?>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	
				
					<?php
						
						
						$this->db->select('*,pengguna.id as idp');
						$this->db->from('pengguna');
						$this->db->join ( 'propinsi', 'propinsi.kode_prop = pengguna.propinsi' , 'left' );
						$this->db->join ( 'kota', 'kota.kode_kota = pengguna.kota' , 'left' );
						$this->db->join ( 'sma', 'sma.kode_sek = pengguna.sekolah' , 'left' );
						$this->db->join ( 'jurusan', 'jurusan.id = pengguna.jurusan1' , 'left' );
						$this->db->where('no_peserta', $this->session->userdata('no_peserta'));
						$query = $this->db->get ();												
						$qrow = $query->result();
						$row = $qrow[0];
						$id = $row->idp;
						?>
	
		
		<div class="container" style="padding:50px 0;" >
			<div class="row">
			<div class="col-md-12"><center><?php echo $this->session->flashdata('pesan2');?></center></div>
				
				<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('simpanprofil');?>" method="POST">
					<div class="col-md-1"></div>
					<div class="col-md-10" style="background:#fff;padding:30px;border-radius:5px;margin-left:auto;margin-right:auto;background:#fff;padding:30px;border-radius:5px;margin-left:auto;margin-right:auto;-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);">
						<div class="col-md-4 text-center">
							
							
							<div class="form-group">
								<label class="col-md-3 text-right"></label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group text-left" style="width:100%">
										<?php if ($row->foto == '')
											{ ?>
											<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:1px solid #AEAEAE;padding:5px;width:80px;">
											<?php } else
											{ ?>
											<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/kcfinder/upload/foto/' . $row->foto ?>" style="border:1px solid #AEAEAE;padding:5px;width:80px;">	
										<?php } ?>
										
										<input type="hidden" name="id" class="form-control input-sm" value="<?php echo $id; ?>">
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Nama Lengkap</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<input type="text" name="nama" class="form-control input-sm" value="<?php echo $this->session->userdata('nama'); ?>" required>
									
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Jenis Kelamin</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
									<?php if ($row->j_kelamin=='L')
									{ ?>
										<select name="jkelamin" class="form-control input-sm">
											<option value="NA">-- Silakan Pilih --</option>
											<option value="L" selected>Lelaki</option>
											<option value="P" >Perempuan</option>
										</select>
									<?php } else if ($row->j_kelamin=='P')
									{ ?>
								<select name="jkelamin" class="form-control input-sm">
											<option value="NA">-- Silakan Pilih --</option>
											<option value="L" >Lelaki</option>
											<option value="P" selected>Perempuan</option>
										</select>
								
									<?php } ?>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3">Tanggal Lahir</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									
									<div class="input-group date ttl" data-link-field="ttl" data-date-format="dd-mm-yyyy">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th" style="color:#ccc;"></span>
										</div>
										
										<input value="<?php echo date('d-m-Y',strtotime($row->ttl));?>"style="height:31px;background:#fff;" type="text" class="form-control" id="a1" readonly>
										<input type="hidden" name="ttl" id="ttl" /> 
										
										
									</div>
									
										
									
								</div>
								<div class="col-md-2"></div>
							</div>
							
							
							<script type="text/javascript">
								$('.ttl').datetimepicker({
									//language:  'fr',
									weekStart: 1,
									todayBtn:  1,
									autoclose: 1,
									todayHighlight: 1,
									startView: 2,
									minView: 2,
									forceParse: 0
								});
							</script>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Alamat Email</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<input type="text" name="email" value="<?php echo $row->email; ?>" class="form-control input-sm">
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Nomor HP</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<div class="input-group-addon t12">
											+62
										</div>
										<input type="text" value="<?php echo $row->hp_siswa; ?>" name="hpsiswa" class="form-control input-sm">
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Instagram</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									
									<div class="input-group" style="width:100%">
										<div class="input-group-addon t12">
											@
										</div>
										<input type="text" value="<?php echo $row->ig; ?>" name="ig" class="form-control input-sm">
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Jumlah Follower</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<input type="text" value="<?php echo $row->follower; ?>" name="follower" class="form-control input-sm">
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Foto Profil</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<input type="file" class="form-control" style="padding-bottom:40px;" name="foto_upload" />
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							
							
						</div>
						<div class="col-md-4 text-center">	
							
							<div class="form-group">
								<label class="col-md-3 text-right"></label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group text-left" style="width:100%">
										<span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Asal Sekolah</span>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Propinsi</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										
										<?php 
										
										$prop = $row->kode_prop;
										
											$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddpropinsi;
										echo form_dropdown('propinsi', $newoptions1, $prop, 'class="propinsi form-control input-sm"'); ?>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Kota</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<select class='form-control kota' name='kota' id='kota'>
											<option value='<?=$row->kode_kota?>'><?=$row->kota?></option>	
										</select>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Nama Sekolah</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<select class='form-control sma' name='sma' id='sma'>
										<option value='<?=$row->kode_sek?>'><?=$row->nama_sek?></option>	
										</select>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Kelas</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<?php 
										$kelas = $row->id_kelas;
											$newoptions4 = array('0' => '-- Silakan Pilih --') + $ddkelas;
										echo form_dropdown('kelas', $newoptions4, $kelas, 'class="kelas form-control input-sm"'); ?>

									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Jurusan</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<?php 
										$jur = $row->peminatan;
											$newoptions2 = array('0' => '-- Silakan Pilih --') + $ddpeminatan;
										echo form_dropdown('peminatan', $newoptions2, $jur, 'class="peminatan form-control input-sm"'); ?>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Rataan Nilai Rapor</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group text-left" style="width:100%">
										<input type="text" value="<?php echo $row->rapor; ?>" name="rapor" class="form-control input-sm">
										<br/><span style="font-size:10px;">Rata-rata nilai rapor semester 1 s.d. semester terakhir</span>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Tahun Lulus SMA</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group text-left" style="width:100%" >
										<input type="text" value="<?php echo $row->tahun; ?>" name="tahun" class="form-control input-sm">
										<br/><span style="font-size:10px;">Contoh : 2023. Isi dengan perkiraan jika kamu belum dapat memastikan</span>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
						</div>
						<div class="col-md-4 text-center">
							<div class="form-group">
								<label class="col-md-3 text-right"></label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group text-left" style="width:100%">
										<span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Program Studi Pilihan</span>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Perguruan Tinggi</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<?php 
										$univ = $row->univ;
											$newoptions3 = array('0' => '-- Silakan Pilih --') + $dduniv;
										echo form_dropdown('univ', $newoptions3, $univ, 'class="univ form-control input-sm"'); ?>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<div class="form-group">
								<label class="col-md-3 text-right">Program Studi</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<select class='form-control prodi' name='prodi' id='prodi' class="prodi">
										<option value='<?=$row->id?>'><?=$row->pil_jurusan?></option>	
										</select>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Kamu berminat mendaftar program KIP Kuliah</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
									<?php if ($row->kip=='Ya')
									{ ?>
										<select name="kip" class="form-control input-sm">
											<option value="NA" >-- Silakan Pilih --</option>
											<option value="Ya" selected>Ya</option>
											<option value="Tidak" >Tidak</option>
										</select>
									<?php } else  if ($row->kip=='Tidak') { ?>
									<select name="kip" class="form-control input-sm">
											<option value="NA" >-- Silakan Pilih --</option>
											<option value="Ya">Ya</option>
											<option value="Tidak" selected>Tidak</option>
										</select>
									
									<?php } else {?>
									<select name="kip" class="form-control input-sm">
											<option value="NA" selected>-- Silakan Pilih --</option>
											<option value="Ya" >Ya</option>
											<option value="Tidak" >Tidak</option>
										</select>
	<?php } ?>
									
									
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Ganti Password</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%" >
										
									<input type="password" id="pw" class="form-control input-sm" name="password" >
											
											<span for='icon2' class="p-viewer">
												<i class="fa fa-eye" aria-hidden="true" style="z-index:99999;position:absolute;margin:5px -30px; 0 0;float:right;color:#c1c1c1;width:16px;font-size:20px;" onclick="pwshow()">                     </i>
											</span>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>

						</div>
						<div class="clear"></div>
						<div class="col-md-12">
							Dengan klik Simpan, kamu menyetujui Al Uswah untuk mengolah dan menganalisis data yang kamu berikan
						</div>
						<div class="clear"></div>
						<div class="col-md-4"></div>
						<div class="col-md-4"><br/><br/>
							<input class="btn" type="submit" style="font-family:'Montserrat Bold', arial;font-weight:bold;background:#f7a71e;color:#fff;width:100%; text-transform: none;" value="Simpan"></input>
						</div>
						<div class="col-md-4"></div>
					</div>
					<div class="col-md-1"></div>
					
				</form>
			</div>
		</div>
		<div class="clear"></div>
		
		
		<script type="text/javascript">	
			function pwshow() {
				var x = document.getElementById("pw");
				if (x.type === "password") {
					x.type = "text";
					} else {
					x.type = "password";
				}
			}
			
			$.ajaxSetup({
				type:"POST",
				url: "<?php echo base_url('index.php/Controller5/ambil_data') ?>",
				cache: false,
			});
			
			$(".propinsi").change(function(){
				var value=$(this).val();
				if(value>0){
					$.ajax({
						data:{modul:'kota',id:value},
						success: function(respond){
							$(".kota").html(respond);
						}
					});
				}
				
			});
			
			$(".kota").change(function(){
				var value=$(this).val();
				if(value>0){
					$.ajax({
						data:{modul:'sma',id:value},
						success: function(respond){
							$(".sma").html(respond);
						}
					});
				}
				
			});
			
			$(".univ").change(function(){
				var value=$(this).val();
				if(value!='NA'){
					$.ajax({
						data:{modul:'prodi',id:value},
						success: function(respond){
							$(".prodi").html(respond);
						}
					});
				}
				
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