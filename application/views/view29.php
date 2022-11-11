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
					<?php include 'view40.php'; 
						$idfolder = $this->session->userdata('id_folder'); 
					?>
				</div>
				<div class="col-md-10 plr15" >
					<div class="subjudul">
						<div class="container">
							<div class="row" >
								<div class="col-md-12 plr15" >
									<h4>TAMBAH UJIAN</h4>
								</div>
							</div>
						</div>
					</div>				
					<div class="clear"></div>		
					<div class="wrapper">	
						<div class="container">
							<div class="row plr15">
								
								<form class="form-horizontal" action="<?php echo site_url('simpanujian');?>" method="POST" name="rval" onsubmit="return validateFormR()">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-4">Nama Ujian</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="nama_ujian" class="form-control input-sm" id="a1">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Kode Kelas</label>
											<div class="col-md-8">      
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>													
													<table width="100%"><tr><td width="80%">
														<input type="text" name="id_kelas" class="form-control input-sm" id="a2"></td><td width="20%">
													<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"style="margin-left:5px;">PANDUAN</button></td></tr></table>
												</div>
												<!-- Modal -->
												<div id="myModal" class="modal fade" role="dialog">
													<div class="modal-dialog">
														
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">PANDUAN PENGISIAN KODE KELAS</h4>
															</div>
															<div class="modal-body">
																<span style="color:red;"><ul><li>Bila kelas lebih dari satu gunakan tanda baca koma ( , )<br/>Contoh pengisian : 8,1,25,4</li><li>Kode Kelas dapat dilihat pada Menu Kelas <br/>( kolom berwarna kuning )</li><li>Tidak boleh ada spasi</li></ul></span>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>
														
													</div>
												</div>
											</div>
											
										</div>
										<?php /*
											<div class="form-group">
											<label class="col-md-4">Kode Ujian (opsional)</label>
											<div class="col-md-8">    
											<div class="input-group">
											<div class="input-group-addon">
											<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
											</div>
											
											<table width="100%"><tr><td width="80%">
											<input type="text" name="medley" class="form-control input-sm"></td><td width="20%">
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1"style="margin-left:5px;">PANDUAN</button></td></tr></table>
											</div>											
											<!-- Modal -->
											<div id="myModal1" class="modal fade" role="dialog">
											<div class="modal-dialog">
											
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">PANDUAN PENGISIAN KODE UJIAN</h4>
											</div>
											<div class="modal-body">
											<span style="color:red;"><ul><li>Kolom ini digunakan untuk ujian bersambung bila siswa telah menyelesaikan atau waktu habis saat ujian mata pelajaran pertama, maka sistem akan otomatis langsung memulai ujian mata pelajaran berikutnya. Contoh pengisian : 1,5,31</li><li>Kode Ujian dapat dilihat pada Menu Ujian <br/>( kolom berwarna kuning )</li><li>Tidak boleh ada spasi</li></ul></span>
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
											</div>
											
											</div>
											</div>
											</div>
											</div>
										*/ ?>
										<div class="form-group">
											<label class="col-md-4">Password (opsional)</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="pwd" class="form-control input-sm">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Kategori Ujian</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php 
														$newoptions5a = array('0' => '-- Silakan Pilih --') + $ddfolder;
													echo form_dropdown('folder', $newoptions5a, '', 'class="form-control input-sm" id="a7"'); ?>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Peminatan Jurusan</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<?php 
														$newoptions5 = array('0' => '-- Silakan Pilih --') + $ddpeminatan;
													echo form_dropdown('peminatan', $newoptions5, '', 'class="form-control input-sm"'); ?>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Jumlah Soal</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="jumlah_soal" class="form-control input-sm" id="a3">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Tanggal Ujian</label>
											<div class="col-md-8">
												
												<div class="input-group date tglujian" data-link-field="tgl_ujian" data-date-format="dd-mm-yyyy">
													<div class="input-group-addon">
														<span class="glyphicon glyphicon-th"></span>
													</div>
													
													<input style="height:31px;background:#fff;" type="text" class="form-control" id="a4" readonly >
													<input type="hidden" name="tgl_ujian" id="tgl_ujian"  /> 
													
													
												</div>
												
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Jam Mulai Ujian</label>
											<div class="col-md-8">
												<div class="input-group date jaw" data-link-field="dtp_input2" data-date-format="hh.ii">
													
													<div class="input-group-addon">
														<span class="glyphicon glyphicon-th"></span>
													</div>
													<input style="height:31px;background:#fff;" type="text" class="form-control" id="a5" readonly >
													<input type="hidden" name="jaw" id="dtp_input2"  />  
													
													
												</div>
												
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Waktu Pengerjaan (menit)</label>
											<div class="col-md-8">    
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="waktu" class="form-control input-sm" id="a6">
													<input class="input-form" type="hidden" name="id_user" value="<?php echo $_SESSION['user_id'];?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">Catatan</label>
											<div class="col-md-8">    
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
													</div>
													<input type="text" name="catatan" class="form-control input-sm">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4">
												Aktifkan Ujian Essay	
											</label>
											<div class="col-md-8">
												<div class="tombolslide" style="margin-left:0px;"><input type="checkbox" id="tombolslide28" name="tipe"><label for="tombolslide28"></label>
												</div> 	
											</div>
											<div class="col-md-8"></div>
										</div>
									</div>
									<div class="col-md-6"></div>
									<div class="clear"></div>	
									<div class="garis"></div>
									
									<div class="clear"></div>	
									<div class="panel panel-default">
										<div class="panel-heading" style="background:#28A9E3;color:#fff;">MULTI MATA PELAJARAN</div>
										<div class="panel-body">
											<div class="col-md-12 p15" >
												<div class="form-group">
													<label class="col-md-2">
														Aktifkan Multi Mapel	
													</label>
													<div class="col-md-2">
														<div class="tombolslide" style="margin-left:0px;"><input type="checkbox" id="tombolslide" name="multimapel" onchange="slide(this);"><label for="tombolslide"></label>
														</div> 	
													</div>
													<div class="col-md-8"></div>
												</div>
												<div class="clear"></div>	
												
												<div class="form-group">
													<label class="col-md-2">
														Aktifkan UTBK	
													</label>
													<div class="col-md-2">
														<div class="tombolslide" style="margin-left:0px;"><input class="ts" type="checkbox" id="tombolslide99" name="utbk" onchange="xx(this);"><label for="tombolslide99"></label>
														</div> 	
													</div>
													<div class="col-md-8"></div>
												</div>
												<div class="clear"></div>
												
												<div class="form-group">  
													<label class="col-md-2">
														Jumlah Mapel
													</label>
													<div class="col-md-2">
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
															</div>															
															<select name="jumlah_mapel" class="form-control input-sm bulk" id="pil" onchange="check(this);">
																<option value="0" selected>-- Silahkan Pilih --</option>  
																<option value="2">2</option>
																<option value="3">3</option>   
																<option value="4">4</option>    
																<option value="5">5</option>
																<option value="6">6</option>  
																<option value="7">7</option>    
																<option value="8">8</option>
																<option value="9">9</option>  
																<option value="10">10</option>  
															</select>
															<script type="text/javascript">	
																$('.tglujian').datetimepicker({
																	//language:  'fr',
																	weekStart: 1,
																	todayBtn:  1,
																	autoclose: 1,
																	todayHighlight: 1,
																	startView: 2,
																	minView: 2,
																	forceParse: 0
																});
																
																$('.jaw').datetimepicker({
																	//language:  'fr',
																	format: 'hh.ii',
																	weekStart: 0,
																	todayBtn:  0,
																	autoclose: 1,
																	todayHighlight: 0,
																	startView: 1,	
																	forceParse: 0
																	
																});
																
																	$(document).ready(function() {
																	
																	
																	$("#pil").hide();
																	$("#garis").hide();
																	
																	$("#grup1").hide();
																	$("#grup2").hide();
																	
																	$("#label1").hide();
																		$("#label2").hide();
																		$("#label3").hide();
																		$("#label4").hide();
																		$("#label5").hide();
																		$("#label6").hide();
																	
																	$("#mapel1").hide();
																	$("#mapel2").hide();
																	$("#mapel3").hide();
																	$("#mapel4").hide();
																	$("#mapel5").hide();
																	$("#mapel6").hide();
																	$("#mapel7").hide();
																	$("#mapel8").hide();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").hide();
																	$("#jml_mapel2").hide();
																	$("#jml_mapel3").hide();
																	$("#jml_mapel4").hide();
																	$("#jml_mapel5").hide();
																	$("#jml_mapel6").hide();
																	$("#jml_mapel7").hide();
																	$("#jml_mapel8").hide();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#w1").hide();
																	$("#w2").hide();
																	$("#w3").hide();
																	$("#w4").hide();
																	$("#w5").hide();
																	$("#w6").hide();
																	$("#w7").hide();
																	$("#w8").hide();
																	$("#w9").hide();
																	$("#w10").hide();
																		
																});
																
																
																
															
																
																
																function validateFormR() {
																	var a1 = document.forms["rval"]["a1"].value;
																	var a2 = document.forms["rval"]["a2"].value;
																	var a7 = document.forms["rval"]["a7"].value;
																	var a3 = document.forms["rval"]["a3"].value;
																	var a4 = document.forms["rval"]["a4"].value;
																	var a5 = document.forms["rval"]["a5"].value;
																	var a6 = document.forms["rval"]["a6"].value;
																	
																	if (a1 === '') {alert('Nama ujian belum diisi');document.getElementById("a1").focus();return false;}
																	if (a2 === '') {alert('Kode kelas belum diisi');document.getElementById("a2").focus();return false;}
																	if (a7 === '0') {alert('Kategori ujian belum dipilih');document.getElementById("a7").focus();return false;}
																	if (a3 === '') {alert('Jumlah soal belum diisi');document.getElementById("a3").focus();return false;}
																	if (a4 === '') {alert('Tanggal ujian belum dipilih');document.getElementById("a4").focus();return false;}
																	if (a5 === '') {alert('Jam mulai ujian belum dipilih');document.getElementById("a5").focus();return false;}
																	if (a6 === '') {alert('Waktu pengerjaan belum diisi');document.getElementById("a6").focus();return false;}
																	
																	
																	if (document.getElementById('tombolslide').checked)
																	{
																		var pil = document.forms["rval"]["pil"].value;													
																		if (pil === '') {alert('Jumlah mata pelajaran belum dipilih');document.getElementById("pil").focus();return false;}
																		
																		var dropdown = document.getElementById("pil");
																		var current_value = dropdown.options[dropdown.selectedIndex].value;
																		
																		if (current_value == "2") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			
																			var jt = jm1 + jm2;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;} 
																			
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				
																				
																				var wt = wm1 + wm2;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 	
																			}
																			
																		}
																		
																		if (current_value == "3") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			
																			var jt = jm1+jm2+jm3;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;} 
																			
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				
																				
																				var wt = wm1+wm2+wm3;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																			
																		}
																		
																		if (current_value == "4") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			var mp4 = document.forms["rval"]["mp4"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			if (mp4 === '') {alert('Mata pelajaran 4 belum diisi');document.getElementById("mp4").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jm4 = parseInt(document.forms["rval"]["jm4"].value);
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			var jma4 = document.forms["rval"]["jm4"].value;
																			
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			if (jma4 === '') {alert('Jumlah soal 4 belum diisi');document.getElementById("jm4").focus();return false;}
																			
																			var jt = jm1+jm2+jm3+jm4;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;} 
																			
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wm4 = parseInt(document.forms["rval"]["wm4"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				var wma4 = document.forms["rval"]["wm4"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				if (wma4 === '') {alert('Waktu 4 belum diisi');document.getElementById("wm4").focus();return false;}
																				
																				
																				var wt = wm1+wm2+wm3+wm4;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																		}
																		
																		if (current_value == "5") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			var mp4 = document.forms["rval"]["mp4"].value;
																			var mp5 = document.forms["rval"]["mp5"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			if (mp4 === '') {alert('Mata pelajaran 4 belum diisi');document.getElementById("mp4").focus();return false;}
																			if (mp5 === '') {alert('Mata pelajaran 5 belum diisi');document.getElementById("mp5").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jm4 = parseInt(document.forms["rval"]["jm4"].value);
																			var jm5 = parseInt(document.forms["rval"]["jm5"].value);
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			var jma4 = document.forms["rval"]["jm4"].value;
																			var jma5 = document.forms["rval"]["jm5"].value;
																			
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			if (jma4 === '') {alert('Jumlah soal 4 belum diisi');document.getElementById("jm4").focus();return false;}
																			if (jma5 === '') {alert('Jumlah soal 5 belum diisi');document.getElementById("jm5").focus();return false;}
																			
																			var jt = jm1+jm2+jm3+jm4+jm5;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;}
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wm4 = parseInt(document.forms["rval"]["wm4"].value);
																				var wm5 = parseInt(document.forms["rval"]["wm5"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				var wma4 = document.forms["rval"]["wm4"].value;
																				var wma5 = document.forms["rval"]["wm5"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				if (wma4 === '') {alert('Waktu 4 belum diisi');document.getElementById("wm4").focus();return false;}
																				if (wma5 === '') {alert('Waktu 5 belum diisi');document.getElementById("wm5").focus();return false;}
																				
																				
																				
																				var wt = wm1+wm2+wm3+wm4+wm5;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																		}
																		
																		if (current_value == "6") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			var mp4 = document.forms["rval"]["mp4"].value;
																			var mp5 = document.forms["rval"]["mp5"].value;
																			var mp6 = document.forms["rval"]["mp6"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			if (mp4 === '') {alert('Mata pelajaran 4 belum diisi');document.getElementById("mp4").focus();return false;}
																			if (mp5 === '') {alert('Mata pelajaran 5 belum diisi');document.getElementById("mp5").focus();return false;}
																			if (mp6 === '') {alert('Mata pelajaran 6 belum diisi');document.getElementById("mp6").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jm4 = parseInt(document.forms["rval"]["jm4"].value);
																			var jm5 = parseInt(document.forms["rval"]["jm5"].value);
																			var jm6 = parseInt(document.forms["rval"]["jm6"].value);
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			var jma4 = document.forms["rval"]["jm4"].value;
																			var jma5 = document.forms["rval"]["jm5"].value;
																			var jma6 = document.forms["rval"]["jm6"].value;
																			
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			if (jma4 === '') {alert('Jumlah soal 4 belum diisi');document.getElementById("jm4").focus();return false;}
																			if (jma5 === '') {alert('Jumlah soal 5 belum diisi');document.getElementById("jm5").focus();return false;}
																			if (jma6 === '') {alert('Jumlah soal 6 belum diisi');document.getElementById("jm6").focus();return false;}
																			
																			var jt = jm1+jm2+jm3+jm4+jm5+jm6;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;} 
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wm4 = parseInt(document.forms["rval"]["wm4"].value);
																				var wm5 = parseInt(document.forms["rval"]["wm5"].value);
																				var wm6 = parseInt(document.forms["rval"]["wm6"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				var wma4 = document.forms["rval"]["wm4"].value;
																				var wma5 = document.forms["rval"]["wm5"].value;
																				var wma6 = document.forms["rval"]["wm6"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				if (wma4 === '') {alert('Waktu 4 belum diisi');document.getElementById("wm4").focus();return false;}
																				if (wma5 === '') {alert('Waktu 5 belum diisi');document.getElementById("wm5").focus();return false;}
																				if (wma6 === '') {alert('Waktu 6 belum diisi');document.getElementById("wm6").focus();return false;}
																				
																				
																				
																				var wt = wm1+wm2+wm3+wm4+wm5+wm6;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																		}
																		
																		if (current_value == "7") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			var mp4 = document.forms["rval"]["mp4"].value;
																			var mp5 = document.forms["rval"]["mp5"].value;
																			var mp6 = document.forms["rval"]["mp6"].value;
																			var mp7 = document.forms["rval"]["mp7"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			if (mp4 === '') {alert('Mata pelajaran 4 belum diisi');document.getElementById("mp4").focus();return false;}
																			if (mp5 === '') {alert('Mata pelajaran 5 belum diisi');document.getElementById("mp5").focus();return false;}
																			if (mp6 === '') {alert('Mata pelajaran 6 belum diisi');document.getElementById("mp6").focus();return false;}
																			if (mp7 === '') {alert('Mata pelajaran 7 belum diisi');document.getElementById("mp7").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jm4 = parseInt(document.forms["rval"]["jm4"].value);
																			var jm5 = parseInt(document.forms["rval"]["jm5"].value);
																			var jm6 = parseInt(document.forms["rval"]["jm6"].value);
																			var jm7 = parseInt(document.forms["rval"]["jm7"].value);
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			var jma4 = document.forms["rval"]["jm4"].value;
																			var jma5 = document.forms["rval"]["jm5"].value;
																			var jma6 = document.forms["rval"]["jm6"].value;
																			var jma7 = document.forms["rval"]["jm7"].value;
																			
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			if (jma4 === '') {alert('Jumlah soal 4 belum diisi');document.getElementById("jm4").focus();return false;}
																			if (jma5 === '') {alert('Jumlah soal 5 belum diisi');document.getElementById("jm5").focus();return false;}
																			if (jma6 === '') {alert('Jumlah soal 6 belum diisi');document.getElementById("jm6").focus();return false;}
																			if (jma7 === '') {alert('Jumlah soal 7 belum diisi');document.getElementById("jm7").focus();return false;}
																			
																			var jt = jm1+jm2+jm3+jm4+jm5+jm6+jm7;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;} 
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wm4 = parseInt(document.forms["rval"]["wm4"].value);
																				var wm5 = parseInt(document.forms["rval"]["wm5"].value);
																				var wm6 = parseInt(document.forms["rval"]["wm6"].value);
																				var wm7 = parseInt(document.forms["rval"]["wm7"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				var wma4 = document.forms["rval"]["wm4"].value;
																				var wma5 = document.forms["rval"]["wm5"].value;
																				var wma6 = document.forms["rval"]["wm6"].value;
																				var wma7 = document.forms["rval"]["wm7"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				if (wma4 === '') {alert('Waktu 4 belum diisi');document.getElementById("wm4").focus();return false;}
																				if (wma5 === '') {alert('Waktu 5 belum diisi');document.getElementById("wm5").focus();return false;}
																				if (wma6 === '') {alert('Waktu 6 belum diisi');document.getElementById("wm6").focus();return false;}
																				if (wma7 === '') {alert('Waktu 7 belum diisi');document.getElementById("wm7").focus();return false;}
																				
																				
																				
																				var wt = wm1+wm2+wm3+wm4+wm5+wm6+wm7;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																		}
																		
																		if (current_value == "8") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			var mp4 = document.forms["rval"]["mp4"].value;
																			var mp5 = document.forms["rval"]["mp5"].value;
																			var mp6 = document.forms["rval"]["mp6"].value;
																			var mp7 = document.forms["rval"]["mp7"].value;
																			var mp8 = document.forms["rval"]["mp8"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			if (mp4 === '') {alert('Mata pelajaran 4 belum diisi');document.getElementById("mp4").focus();return false;}
																			if (mp5 === '') {alert('Mata pelajaran 5 belum diisi');document.getElementById("mp5").focus();return false;}
																			if (mp6 === '') {alert('Mata pelajaran 6 belum diisi');document.getElementById("mp6").focus();return false;}
																			if (mp7 === '') {alert('Mata pelajaran 7 belum diisi');document.getElementById("mp7").focus();return false;}
																			if (mp8 === '') {alert('Mata pelajaran 8 belum diisi');document.getElementById("mp8").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jm4 = parseInt(document.forms["rval"]["jm4"].value);
																			var jm5 = parseInt(document.forms["rval"]["jm5"].value);
																			var jm6 = parseInt(document.forms["rval"]["jm6"].value);
																			var jm7 = parseInt(document.forms["rval"]["jm7"].value);
																			var jm8 = parseInt(document.forms["rval"]["jm8"].value);
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			var jma4 = document.forms["rval"]["jm4"].value;
																			var jma5 = document.forms["rval"]["jm5"].value;
																			var jma6 = document.forms["rval"]["jm6"].value;
																			var jma7 = document.forms["rval"]["jm7"].value;
																			var jma8 = document.forms["rval"]["jm8"].value;
																			
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			if (jma4 === '') {alert('Jumlah soal 4 belum diisi');document.getElementById("jm4").focus();return false;}
																			if (jma5 === '') {alert('Jumlah soal 5 belum diisi');document.getElementById("jm5").focus();return false;}
																			if (jma6 === '') {alert('Jumlah soal 6 belum diisi');document.getElementById("jm6").focus();return false;}
																			if (jma7 === '') {alert('Jumlah soal 7 belum diisi');document.getElementById("jm7").focus();return false;}
																			if (jma8 === '') {alert('Jumlah soal 8 belum diisi');document.getElementById("jm8").focus();return false;}
																			
																			var jt = jm1+jm2+jm3+jm4+jm5+jm6+jm7+jm8;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;} 
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wm4 = parseInt(document.forms["rval"]["wm4"].value);
																				var wm5 = parseInt(document.forms["rval"]["wm5"].value);
																				var wm6 = parseInt(document.forms["rval"]["wm6"].value);
																				var wm7 = parseInt(document.forms["rval"]["wm7"].value);
																				var wm8 = parseInt(document.forms["rval"]["wm8"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				var wma4 = document.forms["rval"]["wm4"].value;
																				var wma5 = document.forms["rval"]["wm5"].value;
																				var wma6 = document.forms["rval"]["wm6"].value;
																				var wma7 = document.forms["rval"]["wm7"].value;
																				var wma8 = document.forms["rval"]["wm8"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				if (wma4 === '') {alert('Waktu 4 belum diisi');document.getElementById("wm4").focus();return false;}
																				if (wma5 === '') {alert('Waktu 5 belum diisi');document.getElementById("wm5").focus();return false;}
																				if (wma6 === '') {alert('Waktu 6 belum diisi');document.getElementById("wm6").focus();return false;}
																				if (wma7 === '') {alert('Waktu 7 belum diisi');document.getElementById("wm7").focus();return false;}
																				if (wma8 === '') {alert('Waktu 8 belum diisi');document.getElementById("wm8").focus();return false;}
																				
																				
																				
																				var wt = wm1+wm2+wm3+wm4+wm5+wm6+wm7+wm8;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																		}
																		
																		if (current_value == "9") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			var mp4 = document.forms["rval"]["mp4"].value;
																			var mp5 = document.forms["rval"]["mp5"].value;
																			var mp6 = document.forms["rval"]["mp6"].value;
																			var mp7 = document.forms["rval"]["mp7"].value;
																			var mp8 = document.forms["rval"]["mp8"].value;
																			var mp9 = document.forms["rval"]["mp9"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			if (mp4 === '') {alert('Mata pelajaran 4 belum diisi');document.getElementById("mp4").focus();return false;}
																			if (mp5 === '') {alert('Mata pelajaran 5 belum diisi');document.getElementById("mp5").focus();return false;}
																			if (mp6 === '') {alert('Mata pelajaran 6 belum diisi');document.getElementById("mp6").focus();return false;}
																			if (mp7 === '') {alert('Mata pelajaran 7 belum diisi');document.getElementById("mp7").focus();return false;}
																			if (mp8 === '') {alert('Mata pelajaran 8 belum diisi');document.getElementById("mp8").focus();return false;}
																			if (mp9 === '') {alert('Mata pelajaran 9 belum diisi');document.getElementById("mp9").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jm4 = parseInt(document.forms["rval"]["jm4"].value);
																			var jm5 = parseInt(document.forms["rval"]["jm5"].value);
																			var jm6 = parseInt(document.forms["rval"]["jm6"].value);
																			var jm7 = parseInt(document.forms["rval"]["jm7"].value);
																			var jm8 = parseInt(document.forms["rval"]["jm8"].value);
																			var jm9 = parseInt(document.forms["rval"]["jm9"].value);
																			
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			var jma4 = document.forms["rval"]["jm4"].value;
																			var jma5 = document.forms["rval"]["jm5"].value;
																			var jma6 = document.forms["rval"]["jm6"].value;
																			var jma7 = document.forms["rval"]["jm7"].value;
																			var jma8 = document.forms["rval"]["jm8"].value;
																			var jma9 = document.forms["rval"]["jm9"].value;
																			
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			if (jma4 === '') {alert('Jumlah soal 4 belum diisi');document.getElementById("jm4").focus();return false;}
																			if (jma5 === '') {alert('Jumlah soal 5 belum diisi');document.getElementById("jm5").focus();return false;}
																			if (jma6 === '') {alert('Jumlah soal 6 belum diisi');document.getElementById("jm6").focus();return false;}
																			if (jma7 === '') {alert('Jumlah soal 7 belum diisi');document.getElementById("jm7").focus();return false;}
																			if (jma8 === '') {alert('Jumlah soal 8 belum diisi');document.getElementById("jm8").focus();return false;}
																			if (jma9 === '') {alert('Jumlah soal 9 belum diisi');document.getElementById("jm9").focus();return false;}
																			
																			var jt = jm1+jm2+jm3+jm4+jm5+jm6+jm7+jm8+jm9;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;}
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wm4 = parseInt(document.forms["rval"]["wm4"].value);
																				var wm5 = parseInt(document.forms["rval"]["wm5"].value);
																				var wm6 = parseInt(document.forms["rval"]["wm6"].value);
																				var wm7 = parseInt(document.forms["rval"]["wm7"].value);
																				var wm8 = parseInt(document.forms["rval"]["wm8"].value);
																				var wm9 = parseInt(document.forms["rval"]["wm9"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				var wma4 = document.forms["rval"]["wm4"].value;
																				var wma5 = document.forms["rval"]["wm5"].value;
																				var wma6 = document.forms["rval"]["wm6"].value;
																				var wma7 = document.forms["rval"]["wm7"].value;
																				var wma8 = document.forms["rval"]["wm8"].value;
																				var wma9 = document.forms["rval"]["wm9"].value;
																				
																				
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				if (wma4 === '') {alert('Waktu 4 belum diisi');document.getElementById("wm4").focus();return false;}
																				if (wma5 === '') {alert('Waktu 5 belum diisi');document.getElementById("wm5").focus();return false;}
																				if (wma6 === '') {alert('Waktu 6 belum diisi');document.getElementById("wm6").focus();return false;}
																				if (wma7 === '') {alert('Waktu 7 belum diisi');document.getElementById("wm7").focus();return false;}
																				if (wma8 === '') {alert('Waktu 8 belum diisi');document.getElementById("wm8").focus();return false;}
																				if (wma9 === '') {alert('Waktu 9 belum diisi');document.getElementById("wm9").focus();return false;}
																				
																				
																				
																				var wt = wm1+wm2+wm3+wm4+wm5+wm6+wm7+wm8+wm9;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																			
																		}
																		
																		if (current_value == "10") {
																			
																			var mp1 = document.forms["rval"]["mp1"].value;
																			var mp2 = document.forms["rval"]["mp2"].value;
																			var mp3 = document.forms["rval"]["mp3"].value;
																			var mp4 = document.forms["rval"]["mp4"].value;
																			var mp5 = document.forms["rval"]["mp5"].value;
																			var mp6 = document.forms["rval"]["mp6"].value;
																			var mp7 = document.forms["rval"]["mp7"].value;
																			var mp8 = document.forms["rval"]["mp8"].value;
																			var mp9 = document.forms["rval"]["mp9"].value;
																			var mp10 = document.forms["rval"]["mp10"].value;
																			if (mp1 === '') {alert('Mata pelajaran 1 belum diisi');document.getElementById("mp1").focus();return false;}
																			if (mp2 === '') {alert('Mata pelajaran 2 belum diisi');document.getElementById("mp2").focus();return false;}
																			if (mp3 === '') {alert('Mata pelajaran 3 belum diisi');document.getElementById("mp3").focus();return false;}
																			if (mp4 === '') {alert('Mata pelajaran 4 belum diisi');document.getElementById("mp4").focus();return false;}
																			if (mp5 === '') {alert('Mata pelajaran 5 belum diisi');document.getElementById("mp5").focus();return false;}
																			if (mp6 === '') {alert('Mata pelajaran 6 belum diisi');document.getElementById("mp6").focus();return false;}
																			if (mp7 === '') {alert('Mata pelajaran 7 belum diisi');document.getElementById("mp7").focus();return false;}
																			if (mp8 === '') {alert('Mata pelajaran 8 belum diisi');document.getElementById("mp8").focus();return false;}
																			if (mp9 === '') {alert('Mata pelajaran 9 belum diisi');document.getElementById("mp9").focus();return false;}
																			if (mp10 === '') {alert('Mata pelajaran 10 belum diisi');document.getElementById("mp10").focus();return false;}
																			
																			var jm1 = parseInt(document.forms["rval"]["jm1"].value);
																			var jm2 = parseInt(document.forms["rval"]["jm2"].value);
																			var jm3 = parseInt(document.forms["rval"]["jm3"].value);
																			var jm4 = parseInt(document.forms["rval"]["jm4"].value);
																			var jm5 = parseInt(document.forms["rval"]["jm5"].value);
																			var jm6 = parseInt(document.forms["rval"]["jm6"].value);
																			var jm7 = parseInt(document.forms["rval"]["jm7"].value);
																			var jm8 = parseInt(document.forms["rval"]["jm8"].value);
																			var jm9 = parseInt(document.forms["rval"]["jm9"].value);
																			var jm10 = parseInt(document.forms["rval"]["jm10"].value);
																			
																			var jma1 = document.forms["rval"]["jm1"].value;
																			var jma2 = document.forms["rval"]["jm2"].value;
																			var jma3 = document.forms["rval"]["jm3"].value;
																			var jma4 = document.forms["rval"]["jm4"].value;
																			var jma5 = document.forms["rval"]["jm5"].value;
																			var jma6 = document.forms["rval"]["jm6"].value;
																			var jma7 = document.forms["rval"]["jm7"].value;
																			var jma8 = document.forms["rval"]["jm8"].value;
																			var jma9 = document.forms["rval"]["jm9"].value;
																			var jma10 = document.forms["rval"]["jm10"].value;
																			
																			if (jma1 === '') {alert('Jumlah soal 1 belum diisi');document.getElementById("jm1").focus();return false;}
																			if (jma2 === '') {alert('Jumlah soal 2 belum diisi');document.getElementById("jm2").focus();return false;}
																			if (jma3 === '') {alert('Jumlah soal 3 belum diisi');document.getElementById("jm3").focus();return false;}
																			if (jma4 === '') {alert('Jumlah soal 4 belum diisi');document.getElementById("jm4").focus();return false;}
																			if (jma5 === '') {alert('Jumlah soal 5 belum diisi');document.getElementById("jm5").focus();return false;}
																			if (jma6 === '') {alert('Jumlah soal 6 belum diisi');document.getElementById("jm6").focus();return false;}
																			if (jma7 === '') {alert('Jumlah soal 7 belum diisi');document.getElementById("jm7").focus();return false;}
																			if (jma8 === '') {alert('Jumlah soal 8 belum diisi');document.getElementById("jm8").focus();return false;}
																			if (jma9 === '') {alert('Jumlah soal 9 belum diisi');document.getElementById("jm9").focus();return false;}
																			if (jma10 === '') {alert('Jumlah soal 10 belum diisi');document.getElementById("jm10").focus();return false;}
																			
																			var jt = jm1+jm2+jm3+jm4+jm5+jm6+jm7+jm8+jm9+jm10;
																			if (a3 != jt) {alert('Jumlah soal multi tidak sesuai dengan total jumlah soal yang telah ditentukan');document.getElementById("jm1").focus();return false;} 
																			
																			if (document.getElementById('tombolslide99').checked)
																			{
																				var wm1 = parseInt(document.forms["rval"]["wm1"].value);
																				var wm2 = parseInt(document.forms["rval"]["wm2"].value);
																				var wm3 = parseInt(document.forms["rval"]["wm3"].value);
																				var wm4 = parseInt(document.forms["rval"]["wm4"].value);
																				var wm5 = parseInt(document.forms["rval"]["wm5"].value);
																				var wm6 = parseInt(document.forms["rval"]["wm6"].value);
																				var wm7 = parseInt(document.forms["rval"]["wm7"].value);
																				var wm8 = parseInt(document.forms["rval"]["wm8"].value);
																				var wm9 = parseInt(document.forms["rval"]["wm9"].value);
																				var wm10 = parseInt(document.forms["rval"]["wm10"].value);
																				var wma1 = document.forms["rval"]["wm1"].value;
																				var wma2 = document.forms["rval"]["wm2"].value;
																				var wma3 = document.forms["rval"]["wm3"].value;
																				var wma4 = document.forms["rval"]["wm4"].value;
																				var wma5 = document.forms["rval"]["wm5"].value;
																				var wma6 = document.forms["rval"]["wm6"].value;
																				var wma7 = document.forms["rval"]["wm7"].value;
																				var wma8 = document.forms["rval"]["wm8"].value;
																				var wma9 = document.forms["rval"]["wm9"].value;
																				var wma10 = document.forms["rval"]["wm10"].value;
																				if (wma1 === '') {alert('Waktu 1 belum diisi');document.getElementById("wm1").focus();return false;}
																				if (wma2 === '') {alert('Waktu 2 belum diisi');document.getElementById("wm2").focus();return false;}
																				if (wma3 === '') {alert('Waktu 3 belum diisi');document.getElementById("wm3").focus();return false;}
																				if (wma4 === '') {alert('Waktu 4 belum diisi');document.getElementById("wm4").focus();return false;}
																				if (wma5 === '') {alert('Waktu 5 belum diisi');document.getElementById("wm5").focus();return false;}
																				if (wma6 === '') {alert('Waktu 6 belum diisi');document.getElementById("wm6").focus();return false;}
																				if (wma7 === '') {alert('Waktu 7 belum diisi');document.getElementById("wm7").focus();return false;}
																				if (wma8 === '') {alert('Waktu 8 belum diisi');document.getElementById("wm8").focus();return false;}
																				if (wma9 === '') {alert('Waktu 9 belum diisi');document.getElementById("wm9").focus();return false;}
																				if (wma10 === '') {alert('Waktu 10 belum diisi');document.getElementById("wm10").focus();return false;}
																				
																				
																				
																				var wt = wm1+wm2+wm3+wm4+wm5+wm6+wm7+wm8+wm9+wm10;
																				if (a6 != wt) {alert('Jumlah waktu multi tidak sesuai dengan total waktu pengerjaan yang telah ditentukan');document.getElementById("wm1").focus();return false;} 
																			}
																			
																		}
																		
																	}
																	
																}
																
																
																function slide() {
																	if (document.getElementById('tombolslide').checked)
																	{
																		$("#pil").show();
																		document.getElementById("tombolslide99").disabled = false;
																		document.getElementById("tombolslide1").disabled = true;
																		document.getElementById("tombolslide1").checked = false;
																	} else 
																	{
																		$("#pil").hide();
																		document.getElementById("tombolslide99").disabled = true;
																		document.getElementById("tombolslide99").checked = false;
																		document.getElementById("tombolslide1").disabled = false;
																		
																		document.getElementById("pil").value = '';
																		document.getElementById("mp1").value = '';
																		document.getElementById("mp2").value = '';
																		document.getElementById("mp3").value = '';
																		document.getElementById("mp4").value = '';
																		document.getElementById("mp5").value = '';
																		document.getElementById("mp6").value = '';
																		document.getElementById("mp7").value = '';
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		document.getElementById("jm1").value = '';
																		document.getElementById("jm2").value = '';
																		document.getElementById("jm3").value = '';
																		document.getElementById("jm4").value = '';
																		document.getElementById("jm5").value = '';
																		document.getElementById("jm6").value = '';
																		document.getElementById("jm7").value = '';
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		document.getElementById("wm1").value = '';
																		document.getElementById("wm2").value = '';
																		document.getElementById("wm3").value = '';
																		document.getElementById("wm4").value = '';
																		document.getElementById("wm5").value = '';
																		document.getElementById("wm6").value = '';
																		document.getElementById("wm7").value = '';
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#garis").hide();
																		
																		$("#grup1").hide();
																		$("#grup2").hide();
																		
																		$("#label1").hide();
																		$("#label2").hide();
																		$("#label3").hide();
																		$("#label4").hide();
																		
																		$("#mapel1").hide();
																		$("#mapel2").hide();
																		$("#mapel3").hide();
																		$("#mapel4").hide();
																		$("#mapel5").hide();
																		$("#mapel6").hide();
																		$("#mapel7").hide();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").hide();
																		$("#jml_mapel2").hide();
																		$("#jml_mapel3").hide();
																		$("#jml_mapel4").hide();
																		$("#jml_mapel5").hide();
																		$("#jml_mapel6").hide();
																		$("#jml_mapel7").hide();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		$("#w1").hide();
																		$("#w2").hide();
																		$("#w3").hide();
																		$("#w4").hide();
																		$("#w5").hide();
																		$("#w6").hide();
																		$("#w7").hide();
																		$("#w8").hide();
																		$("#w9").hide();
																		$("#w10").hide();
																	}
																}
																
																function check() {
																	var dropdown = document.getElementById("pil");
																	var current_value = dropdown.options[dropdown.selectedIndex].value;
																	
																	
																	
																	if (current_value == "0") {
																		document.getElementById("pil").value = '';
																		document.getElementById("mp1").value = '';
																		document.getElementById("mp2").value = '';
																		document.getElementById("mp3").value = '';
																		document.getElementById("mp4").value = '';
																		document.getElementById("mp5").value = '';
																		document.getElementById("mp6").value = '';
																		document.getElementById("mp7").value = '';
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		document.getElementById("jm1").value = '';
																		document.getElementById("jm2").value = '';
																		document.getElementById("jm3").value = '';
																		document.getElementById("jm4").value = '';
																		document.getElementById("jm5").value = '';
																		document.getElementById("jm6").value = '';
																		document.getElementById("jm7").value = '';
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		document.getElementById("wm1").value = '';
																		document.getElementById("wm2").value = '';
																		document.getElementById("wm3").value = '';
																		document.getElementById("wm4").value = '';
																		document.getElementById("wm5").value = '';
																		document.getElementById("wm6").value = '';
																		document.getElementById("wm7").value = '';
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").hide();
																		$("#grup2").hide();
																		$("#garis").hide();
																		
																		$("#mapel1").hide();
																		$("#mapel2").hide();
																		$("#mapel3").hide();
																		$("#mapel4").hide();
																		$("#mapel5").hide();
																		$("#mapel6").hide();
																		$("#mapel7").hide();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").hide();
																		$("#jml_mapel2").hide();
																		$("#jml_mapel3").hide();
																		$("#jml_mapel4").hide();
																		$("#jml_mapel5").hide();
																		$("#jml_mapel6").hide();
																		$("#jml_mapel7").hide();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		
																		$("#label1").hide();
																		$("#label2").hide();
																		$("#label3").hide();
																		$("#label4").hide();
																		$("#label5").hide();
																		$("#label6").hide();
																		
																		$("#w1").hide();
																		$("#w2").hide();
																		$("#w3").hide();
																		$("#w4").hide();
																		$("#w5").hide();
																		$("#w6").hide();
																		$("#w7").hide();
																		$("#w8").hide();
																		$("#w9").hide();
																		$("#w10").hide();
																		
																	}
																	else if (current_value == "2") {
																		
																		
																		document.getElementById("mp3").value = '';
																		document.getElementById("mp4").value = '';
																		document.getElementById("mp5").value = '';
																		document.getElementById("mp6").value = '';
																		document.getElementById("mp7").value = '';
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		
																		document.getElementById("jm3").value = '';
																		document.getElementById("jm4").value = '';
																		document.getElementById("jm5").value = '';
																		document.getElementById("jm6").value = '';
																		document.getElementById("jm7").value = '';
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		
																		document.getElementById("wm3").value = '';
																		document.getElementById("wm4").value = '';
																		document.getElementById("wm5").value = '';
																		document.getElementById("wm6").value = '';
																		document.getElementById("wm7").value = '';
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").hide();
																		$("#garis").hide();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").hide();
																		$("#mapel4").hide();
																		$("#mapel5").hide();
																		$("#mapel6").hide();
																		$("#mapel7").hide();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").hide();
																		$("#jml_mapel4").hide();
																		$("#jml_mapel5").hide();
																		$("#jml_mapel6").hide();
																		$("#jml_mapel7").hide();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").hide();
																			$("#label5").hide();
																			$("#label6").hide();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																	}
																	else if (current_value == "3") {
																		
																		
																		document.getElementById("mp4").value = '';
																		document.getElementById("mp5").value = '';
																		document.getElementById("mp6").value = '';
																		document.getElementById("mp7").value = '';
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		
																		document.getElementById("jm4").value = '';
																		document.getElementById("jm5").value = '';
																		document.getElementById("jm6").value = '';
																		document.getElementById("jm7").value = '';
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		
																		document.getElementById("wm4").value = '';
																		document.getElementById("wm5").value = '';
																		document.getElementById("wm6").value = '';
																		document.getElementById("wm7").value = '';
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").hide();
																		$("#garis").hide();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").hide();
																		$("#mapel5").hide();
																		$("#mapel6").hide();
																		$("#mapel7").hide();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").hide();
																		$("#jml_mapel5").hide();
																		$("#jml_mapel6").hide();
																		$("#jml_mapel7").hide();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").hide();
																			$("#label5").hide();
																			$("#label6").hide();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																	}
																	else if (current_value == "4") {
																		
																		document.getElementById("mp5").value = '';
																		document.getElementById("mp6").value = '';
																		document.getElementById("mp7").value = '';
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		
																		document.getElementById("jm5").value = '';
																		document.getElementById("jm6").value = '';
																		document.getElementById("jm7").value = '';
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		
																		document.getElementById("wm5").value = '';
																		document.getElementById("wm6").value = '';
																		document.getElementById("wm7").value = '';
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").hide();
																		$("#garis").hide();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").show();
																		$("#mapel5").hide();
																		$("#mapel6").hide();
																		$("#mapel7").hide();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").show();
																		$("#jml_mapel5").hide();
																		$("#jml_mapel6").hide();
																		$("#jml_mapel7").hide();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").hide();
																			$("#label5").hide();
																			$("#label6").hide();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").show();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																		
																	}
																	else if (current_value == "5") {
																		
																		document.getElementById("mp6").value = '';
																		document.getElementById("mp7").value = '';
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		
																		document.getElementById("jm6").value = '';
																		document.getElementById("jm7").value = '';
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		
																		document.getElementById("wm6").value = '';
																		document.getElementById("wm7").value = '';
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").hide();
																		$("#garis").hide();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").show();
																		$("#mapel5").show();
																		$("#mapel6").hide();
																		$("#mapel7").hide();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").show();
																		$("#jml_mapel5").show();
																		$("#jml_mapel6").hide();
																		$("#jml_mapel7").hide();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").hide();
																			$("#label5").hide();
																			$("#label6").hide();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").show();
																			$("#w5").show();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																		
																	}
																	else if (current_value == "6") {
																		
																		document.getElementById("mp7").value = '';
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		;
																		document.getElementById("jm7").value = '';
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		
																		document.getElementById("wm7").value = '';
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").show();
																		$("#garis").show();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").show();
																		$("#mapel5").show();
																		$("#mapel6").show();
																		$("#mapel7").hide();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").show();
																		$("#jml_mapel5").show();
																		$("#jml_mapel6").show();
																		$("#jml_mapel7").hide();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").show();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").show();
																			$("#w5").show();
																			$("#w6").show();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																		
																	}
																	else if (current_value == "7") {
																		
																		document.getElementById("mp8").value = '';
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		;;
																		document.getElementById("jm8").value = '';
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		
																		document.getElementById("wm8").value = '';
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").show();
																		$("#garis").show();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").show();
																		$("#mapel5").show();
																		$("#mapel6").show();
																		$("#mapel7").show();
																		$("#mapel8").hide();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").show();
																		$("#jml_mapel5").show();
																		$("#jml_mapel6").show();
																		$("#jml_mapel7").show();
																		$("#jml_mapel8").hide();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").show();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").show();
																			$("#w5").show();
																			$("#w6").show();
																			$("#w7").show();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																	}
																	else if (current_value == "8") {
																		
																		document.getElementById("mp9").value = '';
																		document.getElementById("mp10").value = '';
																		;;
																		document.getElementById("jm9").value = '';
																		document.getElementById("jm10").value = '';
																		
																		document.getElementById("wm9").value = '';
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").show();
																		$("#garis").show();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").show();
																		$("#mapel5").show();
																		$("#mapel6").show();
																		$("#mapel7").show();
																		$("#mapel8").show();
																		$("#mapel9").hide();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").show();
																		$("#jml_mapel5").show();
																		$("#jml_mapel6").show();
																		$("#jml_mapel7").show();
																		$("#jml_mapel8").show();
																		$("#jml_mapel9").hide();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").show();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").show();
																			$("#w5").show();
																			$("#w6").show();
																			$("#w7").show();
																			$("#w8").show();
																			$("#w9").hide();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																	}
																	else if (current_value == "9") {
																		
																		document.getElementById("mp10").value = '';
																		;;
																		document.getElementById("jm10").value = '';
																		;
																		document.getElementById("wm10").value = '';
																		
																		$("#grup1").show();
																		$("#grup2").show();
																		$("#garis").show();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").show();
																		$("#mapel5").show();
																		$("#mapel6").show();
																		$("#mapel7").show();
																		$("#mapel8").show();
																		$("#mapel9").show();
																		$("#mapel10").hide();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").show();
																		$("#jml_mapel5").show();
																		$("#jml_mapel6").show();
																		$("#jml_mapel7").show();
																		$("#jml_mapel8").show();
																		$("#jml_mapel9").show();
																		$("#jml_mapel10").hide();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").show();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").show();
																			$("#w5").show();
																			$("#w6").show();
																			$("#w7").show();
																			$("#w8").show();
																			$("#w9").show();
																			$("#w10").hide();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																		
																	}
																	else if (current_value == "10") {
																		
																		$("#grup1").show();
																		$("#grup2").show();
																		$("#garis").show();
																		
																		$("#mapel1").show();
																		$("#mapel2").show();
																		$("#mapel3").show();
																		$("#mapel4").show();
																		$("#mapel5").show();
																		$("#mapel6").show();
																		$("#mapel7").show();
																		$("#mapel8").show();
																		$("#mapel9").show();
																		$("#mapel10").show();
																		
																		$("#jml_mapel1").show();
																		$("#jml_mapel2").show();
																		$("#jml_mapel3").show();
																		$("#jml_mapel4").show();
																		$("#jml_mapel5").show();
																		$("#jml_mapel6").show();
																		$("#jml_mapel7").show();
																		$("#jml_mapel8").show();
																		$("#jml_mapel9").show();
																		$("#jml_mapel10").show();
																		
																		if (document.getElementById("tombolslide99").checked)
																		{
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").show();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").show();
																			
																			$("#w1").show();
																			$("#w2").show();
																			$("#w3").show();
																			$("#w4").show();
																			$("#w5").show();
																			$("#w6").show();
																			$("#w7").show();
																			$("#w8").show();
																			$("#w9").show();
																			$("#w10").show();
																			} else {
																			
																			$("#label1").show();
																			$("#label2").show();
																			$("#label3").hide();
																			$("#label4").show();
																			$("#label5").show();
																			$("#label6").hide();
																			
																			$("#w1").hide();
																			$("#w2").hide();
																			$("#w3").hide();
																			$("#w4").hide();
																			$("#w5").hide();
																			$("#w6").hide();
																			$("#w7").hide();
																			$("#w8").hide();
																			$("#w9").hide();
																			$("#w10").hide();
																		}
																	}
																}
															</script>
														</div>
													</div>
													<div class="col-md-8"></div>
												</div>
												<div class="clear"></div>	
												<div id="grup1">
													
													<div class="form-group">  
														<label class="col-md-2" id="label1">
															Mata Pelajaran
														</label>
														<div class="col-md-2">
															<div class="input-group" id="mapel1">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">1</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel1" id="mp1">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel2">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">2</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel2" id="mp2">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel3">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">3</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel3" id="mp3">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel4">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">4</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel4" id="mp4">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel5">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">5</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel5" id="mp5">
															</div>
														</div>
													</div>
													<div class="clear"></div>
													<div class="form-group">  
														<label class="col-md-2" id="label2">
															Jumlah Soal
														</label>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel1">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">1</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel1" id="jm1">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel2">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">2</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel2" id="jm2">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel3">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">3</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel3" id="jm3">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel4">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">4</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel4" id="jm4">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel5">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">5</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel5" id="jm5">
															</div>
														</div>
													</div>
													<div class="clear"></div>
													<div class="form-group">  
														<label class="col-md-2" id="label3">
															Waktu
														</label>
														<div class="col-md-2">
															<div class="input-group" id="w1">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">1</i>
																</div>
																<input class="form-control input-sm" type="text" name="w1" id="wm1">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w2">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">2</i>
																</div>
																<input class="form-control input-sm" type="text" name="w2" id="wm2">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w3">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">3</i>
																</div>
																<input class="form-control input-sm" type="text" name="w3" id="wm3">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w4">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">4</i>
																</div>
																<input class="form-control input-sm" type="text" name="w4"id="wm4">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w5">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">5</i>
																</div>
																<input class="form-control input-sm" type="text" name="w5" id="wm5">
															</div>
														</div>
													</div>
												</div>
												<div class="clear"></div>	
												<div class="garis" id="garis"></div>
												<div class="clear"></div>
												<div id="grup2">
													<div class="form-group">  
														<label class="col-md-2" id="label4">
															Mata Pelajaran
														</label>
														<div class="col-md-2">
															<div class="input-group" id="mapel6">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">6</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel6" id="mp6">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel7">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">7</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel7" id="mp7">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel8">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">8</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel8" id="mp8">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel9">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">9</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel9" id="mp9">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="mapel10">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">10</i>
																</div>
																<input class="form-control input-sm" type="text" name="mapel10" id="mp10">
															</div>
														</div>
													</div>
													<div class="clear"></div>	
													<div class="form-group">  
														<label class="col-md-2" id="label5">
															Jumlah Soal
														</label>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel6">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">6</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel6" id="jm6">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel7">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">7</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel7" id="jm7">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel8">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">8</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel8" id="jm8">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel9">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">9</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel9" id="jm9">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="jml_mapel10">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">10</i>
																</div>
																<input class="form-control input-sm" type="text" name="jml_mapel10" id="jm10">
															</div>
														</div>
													</div>
													<div class="clear"></div>	
													<div class="form-group">  
														<label class="col-md-2" id="label6">
															Waktu
														</label>
														<div class="col-md-2">
															<div class="input-group" id="w6">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">6</i>
																</div>
																<input class="form-control input-sm" type="text" name="w6" id="wm6">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w7">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">7</i>
																</div>
																<input class="form-control input-sm" type="text" name="w7" id="wm7">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w8">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">8</i>
																</div>
																<input class="form-control input-sm" type="text" name="w8" id="wm8">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w9">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">9</i>
																</div>
																<input class="form-control input-sm" type="text" name="w9" id="wm9">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group" id="w10">
																<div class="input-group-addon">
																	<i class="fa" aria-hidden="true" style="width:16px;">10</i>
																</div>
																<input class="form-control input-sm" type="text" name="w10" id="wm10">
															</div>
														</div>
													</div>
												</div>
											</div>	 
										</div>
									</div>	
									<div class="clear"></div>	
									<div class="garis"></div>
									
									<div class="clear"></div>	
									<div class="sn">					
										<div class="col-md-2">
											<div class="col-md-11">
												<div class="panel panel-default">
													<div class="panel-heading" style="background:#28A9E3;color:#fff;">SISTEM NILAI</div>
													<div class="panel-body">
														<table>
															<tr>
																<td>Benar</td><td><input class="form-control input-sm w50" type="text" name="benar" value="1"></td>
															</tr>
															<tr>
																<td>Salah</td><td><input class="form-control input-sm w50" type="text" name="salah" value="0"></td>
															</tr>
															<tr>
																<td>Kosong</td><td><input class="form-control input-sm w50" type="text" name="kosong" value="0"></td>
															</tr>
														</table>
													</div>
												</div>		</div><div class="col-md-1"></div>
										</div>
										
										<div class="col-md-2">
											<div class="col-md-11">
												<div class="panel panel-default">
													<div class="panel-heading" style="background:#28B779;color:#fff;">SKALA NILAI</div>
													<div class="panel-body">
														<p><input type="radio" name="skala" value="0" ><label style="font-weight: 400;"><span><span></span></span>Tanpa Skala</label></p>
														<p><input type="radio" name="skala" value="1"><label style="font-weight: 400;"><span><span></span></span>1</label></p>
														<p><input type="radio" name="skala" value="10"><label style="font-weight: 400;"><span><span></span></span>10</label></p>
														<p><input type="radio" name="skala" value="100" checked><label style="font-weight: 400;"><span><span></span></span>100</label></p>
													</div>
												</div>					</div>	
												<div class="col-md-1"></div>
										</div>
										<div class="col-md-2">	
											<div class="col-md-11">
												<div class="panel panel-default">
													<div class="panel-heading" style="background:#DA542F;color:#fff;">PEMILIHAN SOAL</div>
													<div class="panel-body">
														<p><input type="radio" name="pilih_model" value="0" checked><label style="font-weight: 400;"><span><span></span></span>Otomatis</label></p>
													<p><input type="radio" name="pilih_model" value="1"><label style="font-weight: 400;"><span><span></span></span>Manual</label></p></div>
												</div>	
												
											</div><div class="col-md-1"></div></div>
											<div class="col-md-4">				
												<div class="col-md-11">
													<div class="panel panel-default">
														<div class="panel-heading" style="background:#FFB94A;color:#fff;">OPSI LAIN</div>
														<div class="panel-body">
															<table width="100%">
																<tr>
																	<td width="80%">Soal Acak <span style="color:red;">( Khusus Ujian Biasa )</span></td><td width="20%">
																		<div class="tombolslide1">
																			<input type="checkbox" id="tombolslide1" name="acak"> 
																			<label for="tombolslide1"></label>
																		</div> 
																	</td>
																</tr>
																<tr>
																	<td width="80%">Opsi Jawaban Acak</td><td width="20%">
																		<div class="tombolslide6">
																			<input type="checkbox" id="tombolslide6" name="jacak"> 
																			<label for="tombolslide6"></label>
																		</div> 
																	</td>
																</tr>
																<tr>
																	<td>Tampilkan Nilai Setelah Ujian</td><td>
																		<div class="tombolslide5">
																			<input type="checkbox" id="tombolslide5" name="hasil"> 
																			<label for="tombolslide5"></label>
																		</div>
																	</td>
																</tr>
																
															</table>
														</div>
													</div>	
													
													<div class="panel panel-default">
														<div class="panel-heading" style="background:#DA542F;color:#fff;">TOMBOL SELESAI DITAMPILKAN</div>
														<div class="panel-body">
															<p><span style="color:red;">( Khusus Ujian Biasa )</span></p>
															<p><input type="radio" name="tombol" value="1" id="r1"><label style="font-weight: 400;"><span><span></span></span>Sejak awal ujian</label></p>
															
															<p><input type="radio" name="tombol" value="2" id="r2"><label style="font-weight: 400;"><span><span></span></span>Setelah semua soal terjawab</label></p>
															
															<p><input type="radio" name="tombol" value="3" id="r3"><label style="font-weight: 400;"><span><span></span></span>Beberapa menit sebelum waktu habis</label></p>
															
															<table>
																
																<tr>
																	<td width="10%"></td><td width="10%">Set</td><td width="7%"><input class="form-control input-sm w50" type="text" id="tw" name="tombolwaktu" ></td><td width="5%">menit</td><td width="68%"></td>
																</tr>
															</table>
														</div>
													</div>
													
													<script>
														function xx() {
															if (document.getElementById('tombolslide99').checked)
															
															{
																document.getElementById("r1").disabled = true
																document.getElementById("r2").disabled = true;
																document.getElementById("r3").disabled = true;
																document.getElementById("tw").disabled = true;
																document.getElementById("r1").checked = false
																document.getElementById("r2").checked = false;
																document.getElementById("r3").checked = false;
																document.getElementById("tw").value = "";
																
																var dropdown = document.getElementById("pil");
																var current_value = dropdown.options[dropdown.selectedIndex].value;
																
																if (current_value == "2") {
																	
																	$("#grup1").show();
																	$("#grup2").hide();
																	$("#garis").hide();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").hide();
																	$("#mapel4").hide();
																	$("#mapel5").hide();
																	$("#mapel6").hide();
																	$("#mapel7").hide();
																	$("#mapel8").hide();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").hide();
																	$("#jml_mapel4").hide();
																	$("#jml_mapel5").hide();
																	$("#jml_mapel6").hide();
																	$("#jml_mapel7").hide();
																	$("#jml_mapel8").hide();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").hide();
																	$("#label5").hide();
																	$("#label6").hide();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").hide();
																	$("#w4").hide();
																	$("#w5").hide();
																	$("#w6").hide();
																	$("#w7").hide();
																	$("#w8").hide();
																	$("#w9").hide();
																	$("#w10").hide();
																	
																	} else if (current_value == "3") {
																	
																	$("#grup1").show();
																	$("#grup2").hide();
																	$("#garis").hide();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").hide();
																	$("#mapel5").hide();
																	$("#mapel6").hide();
																	$("#mapel7").hide();
																	$("#mapel8").hide();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").hide();
																	$("#jml_mapel5").hide();
																	$("#jml_mapel6").hide();
																	$("#jml_mapel7").hide();
																	$("#jml_mapel8").hide();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").hide();
																	$("#label5").hide();
																	$("#label6").hide();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").hide();
																	$("#w5").hide();
																	$("#w6").hide();
																	$("#w7").hide();
																	$("#w8").hide();
																	$("#w9").hide();
																	$("#w10").hide();
																}
																
																else if (current_value == "4") {
																	
																	$("#grup1").show();
																	$("#grup2").hide();
																	$("#garis").hide();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").show();
																	$("#mapel5").hide();
																	$("#mapel6").hide();
																	$("#mapel7").hide();
																	$("#mapel8").hide();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").show();
																	$("#jml_mapel5").hide();
																	$("#jml_mapel6").hide();
																	$("#jml_mapel7").hide();
																	$("#jml_mapel8").hide();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").hide();
																	$("#label5").hide();
																	$("#label6").hide();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").show();
																	$("#w5").hide();
																	$("#w6").hide();
																	$("#w7").hide();
																	$("#w8").hide();
																	$("#w9").hide();
																	$("#w10").hide();
																}
																
																else if (current_value == "5") {
																	
																	$("#grup1").show();
																	$("#grup2").hide();
																	$("#garis").hide();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").show();
																	$("#mapel5").show();
																	$("#mapel6").hide();
																	$("#mapel7").hide();
																	$("#mapel8").hide();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").show();
																	$("#jml_mapel5").show();
																	$("#jml_mapel6").hide();
																	$("#jml_mapel7").hide();
																	$("#jml_mapel8").hide();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").hide();
																	$("#label5").hide();
																	$("#label6").hide();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").show();
																	$("#w5").show();
																	$("#w6").hide();
																	$("#w7").hide();
																	$("#w8").hide();
																	$("#w9").hide();
																	$("#w10").hide();
																}
																
																else if (current_value == "6") {
																	
																	$("#grup1").show();
																	$("#grup2").show();
																	$("#garis").show();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").show();
																	$("#mapel5").show();
																	$("#mapel6").show();
																	$("#mapel7").hide();
																	$("#mapel8").hide();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").show();
																	$("#jml_mapel5").show();
																	$("#jml_mapel6").show();
																	$("#jml_mapel7").hide();
																	$("#jml_mapel8").hide();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").show();
																	$("#label5").show();
																	$("#label6").show();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").show();
																	$("#w5").show();
																	$("#w6").show();
																	$("#w7").hide();
																	$("#w8").hide();
																	$("#w9").hide();
																	$("#w10").hide();
																}
																
																else if (current_value == "7") {
																	
																	$("#grup1").show();
																	$("#grup2").show();
																	$("#garis").show();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").show();
																	$("#mapel5").show();
																	$("#mapel6").show();
																	$("#mapel7").show();
																	$("#mapel8").hide();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").show();
																	$("#jml_mapel5").show();
																	$("#jml_mapel6").show();
																	$("#jml_mapel7").show();
																	$("#jml_mapel8").hide();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").show();
																	$("#label5").show();
																	$("#label6").show();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").show();
																	$("#w5").show();
																	$("#w6").show();
																	$("#w7").show();
																	$("#w8").hide();
																	$("#w9").hide();
																	$("#w10").hide();
																}
																
																else if (current_value == "8") {
																	
																	$("#grup1").show();
																	$("#grup2").show();
																	$("#garis").show();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").show();
																	$("#mapel5").show();
																	$("#mapel6").show();
																	$("#mapel7").show();
																	$("#mapel8").show();
																	$("#mapel9").hide();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").show();
																	$("#jml_mapel5").show();
																	$("#jml_mapel6").show();
																	$("#jml_mapel7").show();
																	$("#jml_mapel8").show();
																	$("#jml_mapel9").hide();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").show();
																	$("#label5").show();
																	$("#label6").show();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").show();
																	$("#w5").show();
																	$("#w6").show();
																	$("#w7").show();
																	$("#w8").show();
																	$("#w9").hide();
																	$("#w10").hide();
																}
																
																else if (current_value == "9") {
																	
																	$("#grup1").show();
																	$("#grup2").show();
																	$("#garis").show();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").show();
																	$("#mapel5").show();
																	$("#mapel6").show();
																	$("#mapel7").show();
																	$("#mapel8").show();
																	$("#mapel9").show();
																	$("#mapel10").hide();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").show();
																	$("#jml_mapel5").show();
																	$("#jml_mapel6").show();
																	$("#jml_mapel7").show();
																	$("#jml_mapel8").show();
																	$("#jml_mapel9").show();
																	$("#jml_mapel10").hide();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").show();
																	$("#label5").show();
																	$("#label6").show();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").show();
																	$("#w5").show();
																	$("#w6").show();
																	$("#w7").show();
																	$("#w8").show();
																	$("#w9").show();
																	$("#w10").hide();
																}
																
																else if (current_value == "10") {
																	
																	$("#grup1").show();
																	$("#grup2").show();
																	$("#garis").show();
																	
																	$("#mapel1").show();
																	$("#mapel2").show();
																	$("#mapel3").show();
																	$("#mapel4").show();
																	$("#mapel5").show();
																	$("#mapel6").show();
																	$("#mapel7").show();
																	$("#mapel8").show();
																	$("#mapel9").show();
																	$("#mapel10").show();
																	
																	$("#jml_mapel1").show();
																	$("#jml_mapel2").show();
																	$("#jml_mapel3").show();
																	$("#jml_mapel4").show();
																	$("#jml_mapel5").show();
																	$("#jml_mapel6").show();
																	$("#jml_mapel7").show();
																	$("#jml_mapel8").show();
																	$("#jml_mapel9").show();
																	$("#jml_mapel10").show();
																	
																	$("#label1").show();
																	$("#label2").show();
																	$("#label3").show();
																	$("#label4").show();
																	$("#label5").show();
																	$("#label6").show();
																	
																	$("#w1").show();
																	$("#w2").show();
																	$("#w3").show();
																	$("#w4").show();
																	$("#w5").show();
																	$("#w6").show();
																	$("#w7").show();
																	$("#w8").show();
																	$("#w9").show();
																	$("#w10").show();
																}
																
																} else {
																document.getElementById("r1").disabled = false;
																document.getElementById("r2").disabled = false;
																document.getElementById("r3").disabled = false;
																
																document.getElementById("wm1").value = '';
																document.getElementById("wm2").value = '';
																document.getElementById("wm3").value = '';
																document.getElementById("wm4").value = '';
																document.getElementById("wm5").value = '';
																document.getElementById("wm6").value = '';
																document.getElementById("wm7").value = '';
																document.getElementById("wm8").value = '';
																document.getElementById("wm9").value = '';
																document.getElementById("wm10").value = '';
																
																$("#label1").show();
																$("#label2").show();
																$("#label3").hide();
																$("#label4").show();
																$("#label5").show();
																$("#label6").hide();
																
																$("#w1").hide();
																$("#w2").hide();
																$("#w3").hide();
																$("#w4").hide();
																$("#w5").hide();
																$("#w6").hide();
																$("#w7").hide();
																$("#w8").hide();
																$("#w9").hide();
																$("#w10").hide();
															}
														}
														
														
													</script>
													
												</div><div class="col-md-1"></div></div>
												
												<div class="col-md-2">
													<div class="col-md-11">
														<div class="panel panel-default">
															<div class="panel-heading" style="background:#2455A4;color:#fff;">STATUS</div>
															<div class="panel-body">									<div class="tombolslide2">
																<input type="checkbox" id="tombolslide2" name="status"> 
																<label for="tombolslide2"></label>
															</div> </div>
														</div>	
													</div>	<div class="col-md-1"></div></div>
													
									</div>
									
									<div class="clear"></div>	
									<div class="col-md-6">
										
									</div>
									<div class="col-md-6 text-right">
										<div class="col-md-4">   
										</div>
										<div class="col-md-8">  
											<input class="btn btn-success btn-sm mr15" type="submit" value="Simpan" /><a class="btn btn-danger btn-sm" href="<?php echo site_url('tampilujian/'.$idfolder);?>">Back </a>
										</div>
									</div>
									
								</form>		
							</div>
						</div>	
					</div>										
					<div class="clear"></div>						
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