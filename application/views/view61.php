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
								
								<div class="panel panel-default col-md-12" style="-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);">
									<div class="panel-heading text-center" style="background:#15519f;color:#fff;font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Rincian Transaksi</div>
									<div class="panel-body">	
										<div class="col-md-12 pb10">	
											
                                            <table class="table table-bordered table-striped text-center">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th class="text-center">Order ID</th>
                                                        <th class="text-center" >Total</th>
                                                        <th class="text-center">Tipe Pembayaran</th>
                                                        <th class="text-center">Jatuh Tempo</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td><?php echo $order->morderid; ?></td>
                                                        <td><?php echo $order->gross_amount; ?></td>
                                                        <td><?php echo $order->payment_type; ?></td>
                                                        <td>
                                                            
                                                            <?php 
                                                                
                                                                $now = new DateTime($order->transaction_time);
                                                                echo $now->modify('+1 day')->format('d-m-Y H:i:s');
                                                                
                                                                
                                                            ?>
                                                            
                                                            
                                                        </td>
                                                        <td>
                                                            <?php if ($order->status_code == "200") {
                                                            ?>
                                                            <span class="badge bg-success" style="font-size:10px;">Success</span>
                                                            <?php } else { ?>
                                                            <span class="badge bg-warning" style="font-size:10px;background:#f7a71e;">Pending</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td><a href="<?php echo $order->pdf_url; ?>" target="_blank" class="btn btn-success btn-sm">Instruksi</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
												
												
                                            </div>
											
											
											
											
											
                                        </div>
                                    </div>
									
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