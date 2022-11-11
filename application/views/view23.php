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
	
	<div class="wrapper1">	
		<div class="container">	

		<div class="clear"></div>

					<?php 


	


						foreach($posting as $key => $row)
						{	
						$idsoal = $row->id_soal;
echo $idsoal;													
										
						} 
	
						?>	
						
				
				
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