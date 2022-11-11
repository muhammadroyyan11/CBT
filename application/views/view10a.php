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
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.ui.datepicker.css">
				<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
				<script src="<?php echo base_url(); ?>assets/js/5575c11027.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
				<link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">			
				<script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
				<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/alertify.core.css" />
				<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/alertify.default.css" />
				<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/css/images/ssc.png">
				
				<title> JCom CBT Online </title>
				
				
				
			</HEAD> 
			<BODY>
				
				
				
				<script src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
				
				<div class="container" style="background:#fff;">
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
										<div class="col-md-12">
											<?php $juma = $hasil->jumlah_mapel; 
												$mp=array();
												
												for($t=1;$t<=$juma;$t++){ 
													$tmp = $hasil->{'mapel'.$t};
													array_push($mp,$tmp);
												} ?>
												<div class="col-md-7"><a href="#" title="Download PDF" class="btn-generate" onclick="convertHTMLToPDF()"><i class="fa fa-file-pdf-o" style="font-size:24px;color:red;"></i></a></div>
												<div class="col-md-5">
													<form method="post" action="<?php echo site_url('hasiltopersiswa/'.$hasil->id.'/'.$hasil->id_fdr);?>">
														<div class="col-md-2 pb10"></div>
														<div class="col-md-6 pb10">
															<div class="input-group">
																
																<select name="fname" class="form-control input-sm bulk">
																	<option value='11' selected>Semua Mapel</option>												
																	<?php
																		foreach($mp as $key=>$item){
																			echo "<option value='$key'>$item</option>";
																		}
																	?>
																	
																</select>
															</div>
														</div>
														
														
														
														<div class="col-md-4 text-right">
															<input type="submit" value="Filter" class="btn btn-success btn-sm">
														</div>
													</form>
												</div>
										</div>
										<div class="col-md-12" id="html-template">
											
											<table width="100%" border="1" cellspacing="0" cellpadding="5">
												<tr class="tr-head" style="background:#e8e8e8;">
													<td width="26%" align="center" style="font-weight:bold"> Nama Peserta </td>
													<td width="12%" align="center" style="font-weight:bold"> No Peserta </td>
													<td width="26%" align="center" style="font-weight:bold"> Kelas </td>
													
												</tr>						
												
												<tr>
													<td align="center"> <?php if ($hasil->pnama == '') {echo $hasil->nama;} else {echo $hasil->pnama;}?></td>
													<td align="center"> <?php if ($hasil->pnopes == '') {echo $hasil->no_peserta;} else {echo $hasil->pnopes;} ?></td>
													<td align="center"> <?php echo $hasil->nama_kelas;?></td>
													
												</tr>
												
											</table>
											
											<div class="clear"></div>
											
											<div class="h20" ></div>
											
											
											
											
											<div class="clear"></div>
											<div class="h10" ></div>
											
											
											<?php
												if ($_SERVER["REQUEST_METHOD"] == "POST") {
													$name = $_POST['fname']+1;	
													
												}
												
												if (empty($name)) {
													$name = 12;
												} else {}
												
												
												
												$where7 = "id='$hasil->id' AND id_fdr='$hasil->id_fdr'";
												$this->db->select('*,((nilai1+nilai2+nilai3+nilai4+nilai5+nilai6+nilai7+nilai8+nilai9+nilai10)/'.$hasil->jumlah_mapel.') as nn');
												$this->db->from('proses');
												$this->db->where($where7);
												$querys = $this->db->get();	
												
												
												$jumlah_mapel = $hasil->jumlah_mapel;
												$m=0;
												if ($name==12){
													
													$y = 1;	
													$z = $jumlah_mapel ;
												} else 
												{
													
													$y = $name;	
													$z = $name;
												}
												
												
											?>
											
											
											
											<table width="100%" border="1" cellspacing="0" cellpadding="5">
												<tr class="tr-head" style="background:#e8e8e8;">
													<td width="45%" align="center" style="font-weight:bold"> Mata Pelajaran </td>
													
													<?php 
														$i = 1;
														foreach ($querys->result() as $rows) { ?>
														
														<td width="7%" align="center" style="font-weight:bold"><?php echo $rows->nama_ujian; ?></td>
													<?php $i++; } ?>	
													
													
												</tr>
												
												<?php 
													
													
													for($k=$y;$k<=$z;$k++) {
													?>
													<tr>
														<td align="center" > <?php echo $hasil->{'mapel'.$k};?></td>														    <?php 
															foreach ($querys->result() as $rows) { ?>
															
															<td align="center"> <?php $fnilai = rtrim(rtrim($rows->{'nilai'.$k}, '0'), '.');echo $fnilai; ?>													
															</td>		
															
															<?php 
																
															} ?>
															
													</tr>
												<?php } ?>
												<tr>
													<td align="center"><b>Rata-rata</b></td>
													<?php foreach ($querys->result() as $rows) { ?>
														<td align="center"><?php echo '<b>'.round($rows->nn,2).'</b>'; ?> </td>
													<?php } ?>
												</tr>
											</table>
											<br/><br/><br/>
											<div class="col-md-12" >
												
												<div>
													<?php 
														$jm = $hasil->jumlah_mapel;
														for($a=$y;$a<=$z;$a++){ 
															$b=0;
															foreach ($querys->result() as $rows) { 
																
																$ntot[$b] = $rows->{'nilai'.$a}; 
																$nauj[$b] = $rows->nama_ujian; 
																$map = $rows->{'mapel'.$a}; 
																$b++;
															} ?>
															
															<div class="col-md-6" style="padding:50px 20px" >
																
																
																<canvas id="myChart<?php echo $a; ?>"></canvas>
																
																
																<Script>
																	var k = <?php echo $a; ?>;
																	var ctx = document.getElementById('myChart'+k).getContext('2d');
																	
																	Chart.plugins.register({
																	beforeDraw: function(chartInstance) {
																	var ctx = chartInstance.chart.ctx;
																	ctx.fillStyle = "white";
																	ctx.fillRect(0, 0, chartInstance.chart.width, chartInstance.chart.height);
																	}
																	});
																	
																	var chart = new Chart(ctx, {
																	// The type of chart we want to create
																	type: 'line',
																	
																	// The data for our dataset
																	data: {
																	labels: <?php echo json_encode($nauj);?>,
																	datasets: [{
																	label: <?php echo json_encode($map);?>,
																	backgroundColor: 'rgba(0, 0, 0, 0)',
																	borderColor: 'rgb(91, 155, 213)',
																	data:  <?php echo json_encode($ntot);?>
																	}]
																	},
																	
																	
																	// Configuration options go here
																	options: {}
																	});
																</script>
															</div>
															
															<?php 
																
																
															} ?>
												</div>
												
											</div>
											
											
											
										</div>
									</div>	
								</div>
								
								
								<div class="clear"></div>			
								<div class="h20"></div>
								
								
							</div>
						</div>
					</div>
				</div>	
				
				<script>
					function convertHTMLToPDF() {
						const { jsPDF } = window.jspdf;
						
						var hj = "<?php echo $hasil->nama; ?>"; 
						var doc = new jsPDF('l', 'mm', [1200, 1210]);
						var pdfjs = document.querySelector('#html-template');
						
						doc.html(pdfjs, {
							callback: function(doc) {
								doc.save(hj);
							},
							x: 20,
							y: 50
						});
					}
				</script>
				
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