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
								<?php /*<span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Pendaftaran Ujian</span>*/ ?>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="clear"></div>
				
				<div class="wrapper">	
					<center><?php echo $this->session->flashdata('pesan4');?></center>
					<div class="container">	
						<div class="row" >
                            
							<div class="col-md-12">
								
								<?php

$privateKey = 'ebr4X-5FKMm-PxITt-B8Hba-3XbtX';

// ambil data json callback notifikasi
$json = file_get_contents('php://input');
$signature = hash_hmac('sha256', $json, $privateKey);

// result
// 9f167eba844d1fcb369404e2bda53702e2f78f7aa12e91da6715414e65b8c86a

?>
									
                                </div>
								
                                
                                
								
								
								
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