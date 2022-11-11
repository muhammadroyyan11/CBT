<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<HTML>
	<HEAD>	
        <meta http-equiv="content-language" content="en"/>
        <meta http-equiv="content-style-type" content="text/css"/>
        <meta http-equiv="content-script-type" content="text/javascript"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">	
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">	
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/5575c11027.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">		
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>	
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <title> JCom CBT Online </title>
		
	</HEAD> 
	<BODY>
		<style>
		    body {background:#e8e8e8;}
			.input-group-addon{color:#ff0000; background-color: #ffffff;}
			.p-viewer {
			position: relative;
			margin: -27px 10px;
			float: right;
			z-index: 9999;
			color:#ccc;
			}
			
			.dropdown-menu {
			font-size:12px;
			}
			
			.t12 {
			font-size:12px;
			color:#ccc
			}
			
		</style>
		
		
		<div class="container" >
			<div class="row" style="height:320px;background: rgb(120,204,208);background: linear-gradient(45deg, rgba(120,204,208,1) 0%, rgba(21,81,159,1) 45%, rgba(27,20,100,1) 100%);padding:15px 20px;">
				<div class="col-md-2 text-center">	
					<?php
						$this->db->select('*');
						$this->db->from('setting');
						$query1 = $this->db->get ();												
						$qrow1 = $query1->result();
						$row1 = $qrow1[0];
						$logo = $row1->logo;
						$teks1 = $row1->teks1;
						$teks2 = $row1->teks2;
						$teks3 = $row1->teks3;
						$versi = $row1->versi;
						
						
						$this->db->select('*');
						$this->db->from('pengguna');
						$this->db->where('email', $this->session->userdata('email'));
						$query = $this->db->get ();												
						$qrow = $query->result();
						$row = $qrow[0];
						$id = $row->id;
						
						if ($logo == '')
						{ ?>
						<img src="<?php echo base_url() . 'assets/css/images/jayvyn-host.png' ?>" style="max-width:60px;">
						<?php } else
						{ ?>
						<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/css/images/' . $logo ?>" style="max-width:60px;">	
					<?php } ?>
				</div>
				<div class="col-md-8 text-center" style="padding-top:20px;">
					
				</div>
				<div class="col-md-2 text-center"></div>
			</div>
		</div>
		
		
		<div class="clear"></div>
		
		
		<div class="container" >
			<div class="row" style="padding:0px 0 100px 0;">
				
				<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('kirimprofil');?>" method="POST">
					<div class="col-md-1"></div>
					<div class="col-md-10" style="background:#fff;padding:30px;border-radius:5px;margin-left:auto;margin-right:auto;background:#fff;padding:30px;border-radius:5px;margin-left:auto;margin-right:auto;-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);margin-top:-200px;">
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
										<select name="jkelamin" class="form-control input-sm">
											<option value="NA" selected>-- Silakan Pilih --</option>
											<option value="L">Lelaki</option>
											<option value="P" >Perempuan</option>
										</select>
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
										
										<input style="height:31px;background:#fff;" type="text" class="form-control" id="a1" readonly>
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
										<input type="text" name="email" value="<?php echo $this->session->userdata('email'); ?>" class="form-control input-sm">
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
										<input type="text" name="hpsiswa" class="form-control input-sm">
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
										<input type="text" name="ig" class="form-control input-sm">
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Jumlah Follower</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<input type="text" name="follower" class="form-control input-sm">
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
											$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddpropinsi;
										echo form_dropdown('propinsi', $newoptions1, '', 'class="propinsi form-control input-sm"'); ?>
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
											<option value='0'>-- Silakan Pilih --</option>
											<?php 
												
												foreach ($kota as $kota1) {
													
													
													echo "<option value='$kota1[kode_kab_kota]'>$kota1[kabupaten_kota]</option>";
													
												}
											?>
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
											<option value='0'>-- Silakan Pilih --</option>
											<?php 
												
												foreach ($sma as $sma1) {
													
													
													echo "<option value='$sma1[nama_sek]'>$sma1[nama_sek]</option>";
													
												}
											?>
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
											$newoptions4 = array('0' => '-- Silakan Pilih --') + $ddkelas;
										echo form_dropdown('kelas', $newoptions4, '', 'class="kelas form-control input-sm"'); ?>
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
											$newoptions2 = array('0' => '-- Silakan Pilih --') + $ddpeminatan;
										echo form_dropdown('peminatan', $newoptions2, '', 'class="peminatan form-control input-sm"'); ?>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 text-right">Rataan Nilai Rapor</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group text-left" style="width:100%">
										<input type="text" name="rapor" class="form-control input-sm">
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
										<input type="text" name="tahun" class="form-control input-sm">
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
											$newoptions3 = array('0' => '-- Silakan Pilih --') + $dduniv;
										echo form_dropdown('univ', $newoptions3, '', 'class="univ form-control input-sm"'); ?>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<div class="form-group">
								<label class="col-md-3 text-right">Program Studi</label>
								<div class="col-md-1" style="width:10px;"></div>
								<div class="col-md-6">
									<div class="input-group" style="width:100%">
										<select class='form-control prodi' name='prodi' id='prodi'>
											<option value='0'>-- Silakan Pilih --</option>
											<?php 
												
												foreach ($prodi as $prodi1) {
													
													
													echo "<option value='$prodi1[pil_jurusan]'>$prodi1[pil_jurusan]</option>";
													
												}
											?>
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
										<select name="kip" class="form-control input-sm">
											<option value="NA" selected>-- Silakan Pilih --</option>
											<option value="Ya">Ya</option>
											<option value="Tidak" >Tidak</option>
										</select>
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
		
		
	</BODY>
</HTML>