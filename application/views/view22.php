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
		
		<script language="javascript">
			$(document).ready(function(){
				$(function() {
					$( "#terdaftar" ).datepicker({dateFormat: 'yy-mm-dd'});
				});
			}
			)
		</script>
		
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
									<h4>EDIT USER</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15" >
								
								<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('simpanedituser');?>" method="POST">
									<?php if($pengguna->id == "1")
										{
										?>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-4">Nama Lengkap</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="nama" class="form-control input-sm" value="<?php echo $pengguna->nama;?>" required>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Username</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="nopes" class="form-control input-sm" value="<?php echo $pengguna->no_peserta;?>" required>
													</div>
												</div>
											</div>
											
											
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Kelas</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$kelas = $pengguna->id_kelas;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddkelas;
														echo form_dropdown('id_kelas', $newoptions, $kelas, 'class="form-control input-sm"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Peminatan Jurusan</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$peminatan = $pengguna->peminatan;
															$newoptions5 = array('0' => '-- Silakan Pilih --') + $ddpeminatan;
														echo form_dropdown('peminatan', $newoptions5, $peminatan, 'class="form-control input-sm"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Pilihan Jurusan 1</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan1 = $pengguna->jurusan1;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan1', $newoptions, $jurusan1, 'onchange="val()" class="form-control input-sm j1" '); ?>
													</div>
												</div>
											</div>
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Pilihan Jurusan 2</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan2 = $pengguna->jurusan2;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan2', $newoptions, $jurusan2, 'onchange="val()" class="form-control input-sm j2" '); ?>
													</div>
												</div>
											</div>
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Pilihan Jurusan 3</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan3 = $pengguna->jurusan3;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan3', $newoptions, $jurusan3, 'onchange="val()" class="form-control input-sm j3" '); ?>
													</div>
												</div>
											</div>
											
											<input type="hidden" name="na1" value=<?php echo $pengguna->jsnl1; ?> class="form-control input-sm" readonly>
											<input type="hidden" name="na2" value=<?php echo $pengguna->jsnl2; ?> class="form-control input-sm" readonly>
											<input type="hidden" name="na3" value=<?php echo $pengguna->jsnl3; ?> class="form-control input-sm" readonly>
											
											<script type="text/javascript">
												$.ajaxSetup({
													type:"POST",
													url: "<?php echo base_url('index.php/Controller5/ambil_data') ?>",
													cache: false,
												});
												
												
												
												$(".j1").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na1"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na1"]').val("0"); }
												});
												
												$(".j2").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na2"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na2"]').val("0"); }
												});
												
												$(".j3").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na3"]').val(data[0].standar_nilai);
																;
															}
														});
													} else { $('[name="na3"]').val("0"); }
												});
												
												
												$(".j1").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na1"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na1"]').val("0"); }
												});
												
												$(".j2").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na2"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na2"]').val("0"); }
												});
												
												$(".j3").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na3"]').val(data[0].standar_nilai);
																;
															}
														});
													} else { $('[name="na3"]').val("0"); }
												});
												
												
											</script>
											
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Tipe User</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$tipeuser = $pengguna->role;
															$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddtipeuser;
														echo form_dropdown('role', $newoptions1, $tipeuser, 'class="form-control input-sm"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Email</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="email" class="form-control input-sm" value="<?php echo $pengguna->email;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">No HP 1</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="hpsiswa" class="form-control input-sm" value="<?php echo $pengguna->hp_siswa;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">No HP 2</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="hportu" class="form-control input-sm" value="<?php echo $pengguna->hp_ortu;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Jenis Kelamin</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php if($pengguna->j_kelamin=="L") { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA">-- Silakan Pilih --</option>
																<option value="L" selected>Lelaki</option>
																<option value="P">Perempuan</option>
															</select>
															<?php } else if($pengguna->j_kelamin=="P") { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA">-- Silakan Pilih --</option>
																<option value="L">Lelaki</option>
																<option value="P" selected>Perempuan</option>
															</select>
															<?php } else { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA" selected>-- Silakan Pilih --</option>
																<option value="L">Lelaki</option>
																<option value="P">Perempuan</option>
															</select>
														<?php } ?>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Alamat</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="alamat" class="form-control input-sm" value="<?php echo $pengguna->alamat;?>">
													</div>
												</div>
											</div>
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Asal Sekolah</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="sekolah" class="form-control input-sm" value="<?php echo $pengguna->sekolah;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Terdaftar Tanggal</label>
												<div class="col-md-8">          
													<?php echo date('d-m-Y', strtotime($pengguna->terdaftar)); ?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Ganti Password</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input class="form-control input-sm" type="password" name="password">
													</div>
												</div>
											</div>
											<div class="form-group" style="display:none;">
												<label class="col-md-4">Status</label>
												<div class="col-md-8">          
													<?php if ($pengguna->aktif == 1) 
														{ ?>
														<div class="tombolslide" style="margin-left:0px;">
															<input type="checkbox" id="tombolslide" name="status" checked> 
															<label for="tombolslide"></label>
														</div> 
														<?php }
														else
														{ ?>
														<div class="tombolslide" style="margin-left:0px;">
															<input type="checkbox" id="tombolslide" name="status">
															<label for="tombolslide"></label>
														</div> 
													<?php } ?>  
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-3"></div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="panel panel-default">
														<div class="panel-heading" style="background:#FFB94A;color:#fff;">FOTO</div>
														<div class="panel-body text-center">
															<?php if ($pengguna->foto == '')
																{ ?>
																<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:1px solid #AEAEAE;padding:5px;">
																<?php } else
																{ ?>
																<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/kcfinder/upload/foto/' . $pengguna->foto ?>" style="border:1px solid #AEAEAE;padding:5px;max-width:135px;">	
															<?php } ?>
															<p><a href="<?php echo site_url('hapusfoto/'.$pengguna->id);?>">Hapus</a></p>
															<div class="h20"></div>
															<input type="file" class="form-control" style="padding-bottom:40px;" name="foto_upload" />
															<p>Ukuran file maksimal: 3 Mb<br/>Dimensi maksimal: 135 x 180px</p>
															<div class="h10"></div>
															
															
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3"></div>
										</div>
										<div class="clear"></div>	
										<div class="col-md-6">
											<div class="form-group">  
												<div class="col-md-4">   
												</div>
												<div class="col-md-8">  
													<input type="hidden" name="id" value="<?php echo $pengguna->id;?>" />
													<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('user');?>">Back </a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
										</div>
										<?php
										} else if($pengguna->role=="1" OR $pengguna->role=="2")
										
										{ ?>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-4">Tipe User</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$tipeuser = $pengguna->role;
															$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddtipeuser;
														echo form_dropdown('role', $newoptions1, $tipeuser, 'onchange="check(this);" class="form-control input-sm" id="pil"'); ?>
													</div>
												</div>
											</div>
											
											<script type="text/javascript">		
												$(document).ready(function() {
													
													$("#k1").hide();
													$("#k2").hide();
													$("#k3").hide();
													$("#k4").hide();
													$("#k6").hide();
													$("#k8").hide();
													$("#k10").hide();
													$("#k11").hide();
													$("#k12").hide();
												});
												function check() {
													var dropdown = document.getElementById("pil");
													var current_value = dropdown.options[dropdown.selectedIndex].value;
													if (current_value == "1") {
														$("#k1").hide();
														$("#k2").hide();
														$("#k3").hide();
														$("#k4").hide();
														$("#k5").show();
														$("#k6").hide();
														$("#k7").show();
														$("#k8").hide();
														$("#k9").show();
														$("#k10").hide();
														$("#k11").hide();
														$("#k12").hide();
													} else
													if (current_value == "2") {
														$("#k1").hide();
														$("#k2").hide();
														$("#k3").hide();
														$("#k4").hide();
														$("#k5").show();
														$("#k6").hide();
														$("#k7").show();
														$("#k8").hide();
														$("#k9").show();
														$("#k10").hide();
														$("#k11").hide();
														$("#k12").hide();
													} else
													if (current_value == "3") {
														$("#k1").show();
														$("#k2").show();
														$("#k3").show();
														$("#k4").show();
														$("#k5").hide();
														$("#k6").show();
														$("#k7").hide();
														$("#k8").show();
														$("#k9").hide();
														$("#k10").show();
														$("#k11").show();
														$("#k12").show();
													}
												}
											</script>
											<div class="form-group">
												<label class="col-md-4">Nama Lengkap</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="nama" class="form-control input-sm" value="<?php echo $pengguna->nama;?>" required>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4" id="k8">No Peserta / Username</label><label class="col-md-4" id="k9">Username</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="nopes" class="form-control input-sm" value="<?php echo $pengguna->no_peserta;?>" required>
													</div>
												</div>
											</div>
											<div class="form-group" id="k1">
												<label class="col-md-4">Kelas</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$kelas = $pengguna->id_kelas;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddkelas;
														echo form_dropdown('id_kelas', $newoptions, $kelas, 'class="form-control input-sm"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" id="k2">
												<label class="col-md-4">Peminatan Jurusan</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$peminatan = $pengguna->peminatan;
															$newoptions5 = array('0' => '-- Silakan Pilih --') + $ddpeminatan;
														echo form_dropdown('peminatan', $newoptions5, $peminatan, 'class="form-control input-sm"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" id="k10">
												<label class="col-md-4">Pilihan Jurusan 1</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan1 = $pengguna->jurusan1;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan1', $newoptions, $jurusan1, 'onchange="val()" class="form-control input-sm j1"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" id="k11">
												<label class="col-md-4">Pilihan Jurusan 2</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan2 = $pengguna->jurusan2;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan2', $newoptions, $jurusan2, 'onchange="val()" class="form-control input-sm j2"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" id="k12">
												<label class="col-md-4">Pilihan Jurusan 3</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan3 = $pengguna->jurusan3;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan3', $newoptions, $jurusan3, 'onchange="val()" class="form-control input-sm j3" '); ?>
													</div>
												</div>
											</div>			
											
											<input type="hidden" name="na1" value=<?php echo $pengguna->jsnl1; ?> class="form-control input-sm" readonly>
											<input type="hidden" name="na2" value=<?php echo $pengguna->jsnl2; ?> class="form-control input-sm" readonly>
											<input type="hidden" name="na3" value=<?php echo $pengguna->jsnl3; ?> class="form-control input-sm" readonly>
											
											<script type="text/javascript">
												$.ajaxSetup({
													type:"POST",
													url: "<?php echo base_url('index.php/Controller5/ambil_data') ?>",
													cache: false,
												});
												
												
												
												$(".j1").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na1"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na1"]').val("0"); }
												});
												
												$(".j2").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na2"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na2"]').val("0"); }
												});
												
												$(".j3").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na3"]').val(data[0].standar_nilai);
																;
															}
														});
													} else { $('[name="na3"]').val("0"); }
												});
												
												
												$(".j1").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na1"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na1"]').val("0"); }
												});
												
												$(".j2").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na2"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na2"]').val("0"); }
												});
												
												$(".j3").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na3"]').val(data[0].standar_nilai);
																;
															}
														});
													} else { $('[name="na3"]').val("0"); }
												});
												
												
											</script>
											
											<div class="form-group">
												<label class="col-md-4">Email</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="email" class="form-control input-sm" value="<?php echo $pengguna->email;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4" id="k4">No HP Siswa</label><label class="col-md-4" id="k5">No HP 1</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="hpsiswa" class="form-control input-sm" value="<?php echo $pengguna->hp_siswa;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4" id="k6">No HP Orang Tua</label><label class="col-md-4" id="k7">No HP 2</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="hportu" class="form-control input-sm" value="<?php echo $pengguna->hp_ortu;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Jenis Kelamin</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php if($pengguna->j_kelamin=="L") { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA">-- Silakan Pilih --</option>
																<option value="L" selected>Lelaki</option>
																<option value="P">Perempuan</option>
															</select>
															<?php } else if($pengguna->j_kelamin=="P") { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA">-- Silakan Pilih --</option>
																<option value="L">Lelaki</option>
																<option value="P" selected>Perempuan</option>
															</select>
															<?php } else { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA" selected>-- Silakan Pilih --</option>
																<option value="L">Lelaki</option>
																<option value="P">Perempuan</option>
															</select>
														<?php } ?>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Alamat</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="alamat" class="form-control input-sm" value="<?php echo $pengguna->alamat;?>">
													</div>
												</div>
											</div>
											<div class="form-group" id="k3">
												<label class="col-md-4">Asal Sekolah</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="sekolah" class="form-control input-sm" value="<?php echo $pengguna->sekolah;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Terdaftar Tanggal</label>
												<div class="col-md-8">          
													<?php echo date('d-m-Y', strtotime($pengguna->terdaftar)); ?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Ganti Password</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input class="form-control input-sm" type="password" name="password">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Status</label>
												<div class="col-md-8">          
													<?php if ($pengguna->aktif == 1) 
														{ ?>
														<div class="tombolslide" style="margin-left:0px;">
															<input type="checkbox" id="tombolslide" name="status" checked> 
															<label for="tombolslide"></label>
														</div> 
														<?php }
														else
														{ ?>
														<div class="tombolslide" style="margin-left:0px;">
															<input type="checkbox" id="tombolslide" name="status">
															<label for="tombolslide"></label>
														</div> 
													<?php } ?>  
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-3"></div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="panel panel-default">
														<div class="panel-heading" style="background:#FFB94A;color:#fff;">FOTO</div>
														<div class="panel-body text-center">
															<?php if ($pengguna->foto == '')
																{ ?>
																<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:1px solid #AEAEAE;padding:5px;">
																<?php } else
																{ ?>
																<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/kcfinder/upload/foto/' . $pengguna->foto ?>" style="border:1px solid #AEAEAE;padding:5px;max-width:135px;">	
															<?php } ?>
															<p><a href="<?php echo site_url('hapusfoto/'.$pengguna->id);?>">Hapus</a></p>
															<div class="h20"></div>
															<input type="file" class="form-control" style="padding-bottom:40px;" name="foto_upload" />
															<p>Ukuran file maksimal: 3 Mb<br/>Dimensi maksimal: 135 x 180px</p>
															<div class="h10"></div>
															
															
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3"></div>
										</div>
										<div class="clear"></div>	
										<div class="col-md-6">
											<div class="form-group">  
												<div class="col-md-4">   
												</div>
												<div class="col-md-8">  
													<input type="hidden" name="id" value="<?php echo $pengguna->id;?>" />
													<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('user');?>">Back </a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
										</div>
										<?php
										} else
										{
										?>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-4">Tipe User</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$tipeuser = $pengguna->role;
															$newoptions1 = array('0' => '-- Silakan Pilih --') + $ddtipeuser;
														echo form_dropdown('role', $newoptions1, $tipeuser, 'onchange="check(this);" class="form-control input-sm" id="pil"'); ?>
													</div>
												</div>
											</div>
											
											<script type="text/javascript">		
												$(document).ready(function() {
													$("#k5").hide();
													$("#k7").hide();
													$("#k9").hide();
												});
												function check() {
													var dropdown = document.getElementById("pil");
													var current_value = dropdown.options[dropdown.selectedIndex].value;
													if (current_value == "1") {
														$("#k1").hide();
														$("#k2").hide();
														$("#k3").hide();
														$("#k4").hide();
														$("#k5").show();
														$("#k6").hide();
														$("#k7").show();
														$("#k8").hide();
														$("#k9").show();
														$("#k10").hide();
														$("#k11").hide();
														$("#k12").hide();
													} else
													if (current_value == "2") {
														$("#k1").hide();
														$("#k2").hide();
														$("#k3").hide();
														$("#k4").hide();
														$("#k5").show();
														$("#k6").hide();
														$("#k7").show();
														$("#k8").hide();
														$("#k9").show();
														$("#k10").hide();
														$("#k11").hide();
														$("#k12").hide();
													} else
													if (current_value == "3") {
														$("#k1").show();
														$("#k2").show();
														$("#k3").show();
														$("#k4").show();
														$("#k5").hide();
														$("#k6").show();
														$("#k7").hide();
														$("#k8").show();
														$("#k9").hide();
														$("#k10").show();
														$("#k11").show();
														$("#k12").show();
													}
												}
											</script>
											<div class="form-group">
												<label class="col-md-4">Nama Lengkap</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="nama" class="form-control input-sm" value="<?php echo $pengguna->nama;?>" required>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4" id="k8">No Peserta / Username</label><label class="col-md-4" id="k9">Username</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="nopes" class="form-control input-sm" value="<?php echo $pengguna->no_peserta;?>" required>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Ganti Password</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input class="form-control input-sm" type="password" name="password">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Tanggal Lahir</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="ttl" class="form-control input-sm" value="<?php echo date('d-m-Y', strtotime($pengguna->ttl)); ?>">
														
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Jenis Kelamin</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php if($pengguna->j_kelamin=="L") { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA">-- Silakan Pilih --</option>
																<option value="L" selected>Lelaki</option>
																<option value="P">Perempuan</option>
															</select>
															<?php } else if($pengguna->j_kelamin=="P") { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA">-- Silakan Pilih --</option>
																<option value="L">Lelaki</option>
																<option value="P" selected>Perempuan</option>
															</select>
															<?php } else { ?>
															<select name="jkelamin" class="form-control input-sm" >
																<option value="NA" selected>-- Silakan Pilih --</option>
																<option value="L">Lelaki</option>
																<option value="P">Perempuan</option>
															</select>
														<?php } ?>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Email</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="email" class="form-control input-sm" value="<?php echo $pengguna->email;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4" id="k4">No HP Siswa</label><label class="col-md-4" id="k5">No HP 1</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="hpsiswa" class="form-control input-sm" value="<?php echo $pengguna->hp_siswa;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4" id="k6">No HP Orang Tua</label><label class="col-md-4" id="k7">No HP 2</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="hportu" class="form-control input-sm" value="<?php echo $pengguna->hp_ortu;?>">
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-4">Alamat</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="alamat" class="form-control input-sm" value="<?php echo $pengguna->alamat;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Instagram</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="ig" class="form-control input-sm" value="<?php echo $pengguna->ig;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Jumlah Follower</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="follower" class="form-control input-sm" value="<?php echo $pengguna->follower;?>">
													</div>
												</div>
											</div>
											
											<div class="garis"></div>
											<div class="clear"></div>	
											
											<div class="form-group" id="k2">
												<label class="col-md-12"><span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Asal Sekolah</span></label>

											</div>
											
											
											<div class="form-group">
												<label class="col-md-4">Propinsi</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="propinsi" class="form-control input-sm" value="<?php echo $pengguna->propinsi;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Kota</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="kota" class="form-control input-sm" value="<?php echo $pengguna->kota;?>">
													</div>
												</div>
											</div>
											<div class="form-group" id="k3">
												<label class="col-md-4">Asal Sekolah</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="sekolah" class="form-control input-sm" value="<?php echo $pengguna->sekolah;?>">
													</div>
												</div>
											</div>
											<div class="form-group" id="k1">
												<label class="col-md-4">Kelas</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$kelas = $pengguna->id_kelas;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddkelas;
														echo form_dropdown('id_kelas', $newoptions, $kelas, 'class="form-control input-sm"'); ?>
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-4">Rataan Nilai Rapor</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="rapor" class="form-control input-sm" value="<?php echo $pengguna->rapor;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Tahun Lulus SMA</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="tahun" class="form-control input-sm" value="<?php echo $pengguna->tahun;?>">
													</div>
												</div>
											</div>
											
											<div class="garis"></div>
											<div class="clear"></div>	
											
											<div class="form-group" id="k2">
												<label class="col-md-12"><span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Program Studi Pilihan</span></label>

											</div>
											
											<div class="form-group" id="k2">
												<label class="col-md-4">Peminatan Jurusan</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 
															$peminatan = $pengguna->peminatan;
															$newoptions5 = array('0' => '-- Silakan Pilih --') + $ddpeminatan;
														echo form_dropdown('peminatan', $newoptions5, $peminatan, 'class="form-control input-sm"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" id="k10">
												<label class="col-md-4">Pilihan Jurusan 1</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan1 = $pengguna->jurusan1;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan1', $newoptions, $jurusan1, 'onchange="val()" class="form-control input-sm j1"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" id="k11">
												<label class="col-md-4">Pilihan Jurusan 2</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan2 = $pengguna->jurusan2;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan2', $newoptions, $jurusan2, 'onchange="val()" class="form-control input-sm j2"'); ?>
													</div>
												</div>
											</div>
											<div class="form-group" id="k12">
												<label class="col-md-4">Pilihan Jurusan 3</label>
												<div class="col-md-8">   
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<?php 	
															$jurusan3 = $pengguna->jurusan3;
															$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
														echo form_dropdown('jurusan3', $newoptions, $jurusan3, 'onchange="val()" class="form-control input-sm j3"'); ?>
													</div>
												</div>
											</div>			
											
											<input type="hidden" name="na1" value=<?php echo $pengguna->jsnl1; ?> class="form-control input-sm" readonly>
											<input type="hidden" name="na2" value=<?php echo $pengguna->jsnl2; ?> class="form-control input-sm" readonly>
											<input type="hidden" name="na3" value=<?php echo $pengguna->jsnl3; ?> class="form-control input-sm" readonly>
											
											<script type="text/javascript">
												$.ajaxSetup({
													type:"POST",
													url: "<?php echo base_url('index.php/Controller5/ambil_data') ?>",
													cache: false,
												});
												
												
												
												$(".j1").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na1"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na1"]').val("0"); }
												});
												
												$(".j2").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na2"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na2"]').val("0"); }
												});
												
												$(".j3").change(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na3"]').val(data[0].standar_nilai);
																;
															}
														});
													} else { $('[name="na3"]').val("0"); }
												});
												
												
												$(".j1").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na1"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na1"]').val("0"); }
												});
												
												$(".j2").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na2"]').val(data[0].standar_nilai);
																
															}
														});
													} else { $('[name="na2"]').val("0"); }
												});
												
												$(".j3").click(function(){
													var value=$(this).val();
													if(value>0){
														$.ajax({
															dataType: "json",
															data:{modul:'jurusan',id:value},
															success: function(data){											
																$('[name="na3"]').val(data[0].standar_nilai);
																;
															}
														});
													} else { $('[name="na3"]').val("0"); }
												});
												
												
											</script>
											<div class="form-group">
												<label class="col-md-4">Kamu berminat mendaftar program KIP Kuliah</label>
												<div class="col-md-8">  
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
														</div>
														<input type="text" name="tahun" class="form-control input-sm" value="<?php echo $pengguna->kip;?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4">Terdaftar Tanggal</label>
												<div class="col-md-8">          
													<?php echo date('d-m-Y', strtotime($pengguna->terdaftar)); ?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-4">Status</label>
												<div class="col-md-8">          
													<?php if ($pengguna->aktif == 1) 
														{ ?>
														<div class="tombolslide" style="margin-left:0px;">
															<input type="checkbox" id="tombolslide" name="status" checked> 
															<label for="tombolslide"></label>
														</div> 
														<?php }
														else
														{ ?>
														<div class="tombolslide" style="margin-left:0px;">
															<input type="checkbox" id="tombolslide" name="status">
															<label for="tombolslide"></label>
														</div> 
													<?php } ?>  
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-3"></div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="panel panel-default">
														<div class="panel-heading" style="background:#FFB94A;color:#fff;">FOTO</div>
														<div class="panel-body text-center">
															<?php if ($pengguna->foto == '')
																{ ?>
																<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:1px solid #AEAEAE;padding:5px;">
																<?php } else
																{ ?>
																<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/kcfinder/upload/foto/' . $pengguna->foto ?>" style="border:1px solid #AEAEAE;padding:5px;max-width:135px;">	
															<?php } ?>
															<p><a href="<?php echo site_url('hapusfoto/'.$pengguna->id);?>">Hapus</a></p>
															<div class="h20"></div>
															<input type="file" class="form-control" style="padding-bottom:40px;" name="foto_upload" />
															<p>Ukuran file maksimal: 3 Mb<br/>Dimensi maksimal: 135 x 180px</p>
															<div class="h10"></div>
															
															
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3"></div>
										</div>
										<div class="clear"></div>	
										<div class="col-md-6">
											<div class="form-group">  
												<div class="col-md-4">   
												</div>
												<div class="col-md-8">  
													<input type="hidden" name="id" value="<?php echo $pengguna->id;?>" />
													<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('user');?>">Back </a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
										</div>
										<?php
										}
									?>
									
								</form>				
							</div>	
						</div>										
						<div class="clear"></div>						
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