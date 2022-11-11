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
	<?php include 'view7.php'; ?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
				<?php include 'view42.php'; ?>
			</div>
			<div class="col-md-10 plr15" >
				<div class="subjudul">
					<div class="container">
						<div class="row" >
							<div class="col-md-12 plr15" >
								<h4 style="text-transform:uppercase;">UJIAN <?php echo $hasil->nama;?> (<?php echo $hasil->no_peserta;?>)</h4>
							</div>
						</div>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					
					<div class="container">	
						<div class="row" >
							<div class="col-md-6" >
								<div class="panel panel-default">
									<div class="panel-heading" style="background:#28A9E3;color:#fff;">Pesan</div>
									<div class="panel-body">
										Selamat <?php echo $hasil->nama;?> (<?php echo $hasil->no_peserta;?>) telah berhasil menyelesaikan soal-soal ujian.<br/><br/><span style="color:red;font-weight:bold;">Note:</span> Sebelum kembali ke menu utama, pastikan Jawaban Ujian Anda telah terkirim ke server dengan mengklik tombol <b>PERIKSA</b>.<br/><br/>
										
										<button class="btn btn-primary btn-sm" onclick="cek()">Periksa
										</button>&nbsp;&nbsp;
										
										<button class="btn btn-success btn-sm" id="ref_butn">Kirim Ulang
										</button>
										
									</div>
								</div>	
							</div>
							<div class="col-md-6" ></div>
						</div>	
						<div class="row" >
							<div class="col-md-6" >
							
			
											
										<a class="btn btn-warning btn-sm" href="<?php echo site_url('homesiswa')?>">Ke Menu Utama
										</a>&nbsp;&nbsp;
										
										<a class="btn btn-danger btn-sm" href="<?php echo site_url('logout')?>">Logout
										</a>
									
							
							</div>
							<div class="col-md-6" ></div>
						</div>	
					</div>
					
					<div class="clear"></div>						
					
				</div>
			</div>
		</div>
	</div>	
	
	<script language="javascript">
		
		var apl = '<?php echo base_url()."ajax/cek.php";?>';
		var no_copy = localStorage.getItem('nc');
		
		function cek() {
			$.ajax({
				type: "post",
				url: apl,
				data: {
					nocopy:no_copy,
				},
				success: function(data){
					alert(data);
				}
			});		
		}
		
		$(document).ready(function(){
			$("#ref_butn").click(function(){
				location.reload();
			});
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