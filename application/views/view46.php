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
	?>
	<?php  include 'view6.php'; ?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
		
			</div>
			<div class="col-md-8 plr15" >
				<div class="subjudul">
					<div class="container">
						<div class="row" >
							<div class="col-md-12 plr15 text-center" >
								<span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Pilihan Jurusan</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					<center><?php echo $this->session->flashdata('pesan4');?></center>
					<div class="container">	
						<div class="row" >
						<div class="col-md-5">
							<form action="<?php echo site_url('updatejur/'.$this->session->userdata('user_id'));?>" method="POST">
								
									
							
										
										<input type="hidden" name="namakelas" value="<?php echo $this->session->userdata('kelas'); ?>">
								
							
								<div class="clear"></div>	
								<table width="100%"><tr><td>
								<div class="panel panel-default col-md-12" style="-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);">
									<div class="panel-heading text-center" style="background:#15519f;color:#fff;font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Saintek</div>
									<div class="panel-body">	
										<div class="col-md-12 pb10">	
											
											<label style="color:#15519f;">Pilihan Jurusan 1 : </label>    
											<?php 	
												$jurusan1 = $siswa->jurusan1;
												$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
											echo form_dropdown('jurusan1', $newoptions, $jurusan1, 'onchange="val()" class="form-control input-sm j1"'); ?>
											
											
											
										</div>
										
										
										
										<div class="clear"></div>							
										<div class="col-md-12 pb10">									
											<label style="color:#15519f;">Pilihan Jurusan 2 : </label>       
											<?php 			
												$jurusan2 = $siswa->jurusan2;
												$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
											echo form_dropdown('jurusan2', $newoptions, $jurusan2, 'onchange="val()" class="form-control input-sm j2"'); ?>
										</div>
										<div class="clear"></div>							
										<div class="col-md-12 pb10">									
											<label style="color:#15519f;">Pilihan Jurusan 3 : </label>       
											<?php 			
												$jurusan3 = $siswa->jurusan3;
												$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan;
											echo form_dropdown('jurusan3', $newoptions, $jurusan3, 'onchange="val()" class="form-control input-sm j3"'); ?>
										</div>
										<div class="clear"></div>							
										<div class="col-md-12 pb10">	
											
											<input type="hidden" name="id_siswa" value="<?php echo $this->session->userdata('user_id'); ?>">
											
										</div>
									</div>
								</div>
								</td></tr>
								<tr><td align="center">
								<input style="background:#f7a71e;padding:5px 15px;color:#fff;border-radius:5px;border:none;" type="submit" value="Simpan" />
								</td></tr></table>
								
								<input type="hidden" name="na1" value=<?php echo $siswa->jsnl1; ?> class="form-control input-sm" readonly>
								<input type="hidden" name="na2" value=<?php echo $siswa->jsnl2; ?> class="form-control input-sm" readonly>
								<input type="hidden" name="na3" value=<?php echo $siswa->jsnl3; ?> class="form-control input-sm" readonly>
							</form>	
							</div>
							
							<div class="col-md-2"><br/><br/></div>
							<div class="col-md-5">
							<form action="<?php echo site_url('updatejur1/'.$this->session->userdata('user_id'));?>" method="POST">
								<table width="100%"><tr><td>
									
								<div class="panel panel-default col-md-12" style="-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);">
									<div class="panel-heading text-center" style="background:#15519f;color:#fff;font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Soshum</div>
									<div class="panel-body">	
										<div class="col-md-12 pb10">	
											
											<label style="color:#15519f;">Pilihan Jurusan 1 : </label>       
											<?php 	
												$jurusan1 = $siswa->jurusan1;
												$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan1;
											echo form_dropdown('jurusan1', $newoptions, $jurusan1, 'onchange="val()" class="form-control input-sm s1 nc1"'); ?>
										</div>
										<div class="clear"></div>							
										<div class="col-md-12 pb10">									
											<label style="color:#15519f;">Pilihan Jurusan 2 : </label>       
											<?php 			
												$jurusan2 = $siswa->jurusan2;
												$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan1;
											echo form_dropdown('jurusan2', $newoptions, $jurusan2, 'onchange="val()" class="form-control input-sm s2"'); ?>
										</div>
										<div class="clear"></div>		
										<div class="col-md-12 pb10">
											<label style="color:#15519f;">Pilihan Jurusan 3 : </label>       
											<?php 			
												$jurusan3 = $siswa->jurusan3;
												$newoptions = array('0' => '-- Silakan Pilih --') + $ddjurusan1;
											echo form_dropdown('jurusan3', $newoptions, $jurusan3, 'onchange="val()" class="form-control input-sm s3" '); ?>
										</div>
										<div class="clear"></div>	
										<div class="col-md-12 pb10">	
											
											<input type="hidden" name="id_siswa" value="<?php echo $this->session->userdata('user_id'); ?>">
										
										</div>
									</div>
								</div>
								</td></tr>
								<tr><td align="center">
								<input style="background:#f7a71e;padding:5px 15px;color:#fff;border-radius:5px;border:none;" type="submit" value="Simpan" />
								</td></tr></table>
								<input type="hidden" name="ns1" value=<?php echo $siswa->jsnl1; ?> class="form-control input-sm nc2" readonly>
								<input type="hidden" name="ns2" value=<?php echo $siswa->jsnl2; ?> class="form-control input-sm" readonly>
								<input type="hidden" name="ns3" value=<?php echo $siswa->jsnl3; ?> class="form-control input-sm" readonly>
							</form>	
							</div>
							<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/select2.min.css' />
							
							<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
							<script type="text/javascript">
								$(".j1").select2();
								$(".j2").select2();
								$(".j3").select2();
								$(".s1").select2();
								$(".s2").select2();
								$(".s3").select2();
							</script>	
							
							<script type="text/javascript">
								$.ajaxSetup({
									type:"POST",
									url: "<?php echo base_url('index.php/Controller3/ambil_data') ?>",
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
								
								$(".s1").change(function(){
									var value=$(this).val();
									if(value>0){
										$.ajax({
											dataType: "json",
											data:{modul:'jurusan',id:value},
											success: function(data){											
												$('[name="ns1"]').val(data[0].standar_nilai);										
											}
										});
									} else { $('[name="ns1"]').val("0"); }
								});
								
								$(".s2").change(function(){
									var value=$(this).val();
									if(value>0){
										$.ajax({
											dataType: "json",
											data:{modul:'jurusan',id:value},
											success: function(data){											
												$('[name="ns2"]').val(data[0].standar_nilai);
												
											}
										});
									} else { $('[name="ns2"]').val("0"); }
								});
								
								$(".s3").change(function(){
									var value=$(this).val();
									if(value>0){
										$.ajax({
											dataType: "json",
											data:{modul:'jurusan',id:value},
											success: function(data){											
												$('[name="ns3"]').val(data[0].standar_nilai);
												;
											}
										});
									} else { $('[name="ns3"]').val("0"); }
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
								
								$(".s1").click(function(){
									var value=$(this).val();
									if(value>0){
										$.ajax({
											dataType: "json",
											data:{modul:'jurusan',id:value},
											success: function(data){											
												$('[name="ns1"]').val(data[0].standar_nilai);
												
											}
										});
									} else { $('[name="ns1"]').val("0"); }
								});
								
								$(".s2").click(function(){
									var value=$(this).val();
									if(value>0){
										$.ajax({
											dataType: "json",
											data:{modul:'jurusan',id:value},
											success: function(data){											
												$('[name="ns2"]').val(data[0].standar_nilai);
												
											}
										});
									} else { $('[name="ns2"]').val("0"); }
								});
								
								$(".s3").click(function(){
									var value=$(this).val();
									if(value>0){
										$.ajax({
											dataType: "json",
											data:{modul:'jurusan',id:value},
											success: function(data){											
												$('[name="ns3"]').val(data[0].standar_nilai);
												;
											}
										});
									} else { $('[name="ns3"]').val("0"); }
								});
								
								
								
							</script>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>	<div class="col-md-2" >
		
			</div>
		</div>
	</div>	
	
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