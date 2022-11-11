<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<?php
	$grand_total = 0;
	$qty = array();	
	$harga = array();	
	$nama = array();	
	$idprod = array();	
	if ($cart = $this->cart->contents()):
	foreach ($cart as $item):
	$grand_total = $grand_total + $item['subtotal'];
	$idprod[] = $item['id'];
	$qty[]= $item['qty'];
	$harga[] = $item['price'];
	$nama[] = $item['name'];
	endforeach;
	endif;
	
	
	
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
									<div class="panel-heading text-center" style="background:#15519f;color:#fff;font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Ringkasan Pembayaran</div>
									<div class="panel-body">	
										<div class="col-md-12 pb10">	
											
											<?php /*<form name="billing" method="post" action="<?php echo base_url().'billing/save_order' ?>" >*/ ?>
											
											<?php
												echo form_open_multipart('tes');
											?>
											
											<input type="hidden" name="command" />
											
											<div align="center">
												
												<input type="hidden" id="idp" name="idp" value="<?php echo $this->session->userdata('user_id'); ?>" />
												<table border="0" style="font-size:12px;">
													<tr><td><strong>Total Tagihan :</strong></td><td><strong>Rp<?php echo number_format($grand_total,2); ?></strong></td></tr>
													<input type="hidden" value="<?php echo $this->session->userdata('nama'); ?>" name="namasiswa" id="namasiswa"/>
													<input type="hidden" value="<?php echo $this->session->userdata('no_peserta'); ?>" name="no_peserta" id="no_peserta"/>
													<input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" name="email" id="email"/>
													<input type="hidden" value="<?php echo $this->session->userdata('kota'); ?>" name="kota" id="kota"/>
													<input type="hidden" value="<?php echo $this->session->userdata('hp_siswa'); ?>" name="hp" id="hp"/>
													<input type="hidden" value="<?php echo implode(',',$idprod); ?>" name="idprod" id="idprod"/>
													<input type="hidden" value="<?php echo implode(',',$nama); ?>" name="nama" id="nama"/>
													<input type="hidden" value="<?php echo implode(',',$harga); ?>" name="harga" id="harga" />
													<input type="hidden" value="<?php echo implode(',',$qty); ?>" name="qty" id="qty"/>	
													<input type="hidden" value="<?php echo str_replace( ',', '', $grand_total ); ?>" name="total" id="total"/>
													
													<input type="hidden" name="result_type" id="result-type" value=""></div>
											<input type="hidden" name="result_data" id="result-data" value=""></div>
											<tr><td colspan="2" ><br/>
												<select class="form-control input-sm" name="jenisbayar" id="jenisbayar">
													<option value="">-- Pilih Pembayaran --</option>
													<option value="BNIVA">BNI VA</option>
													<option value="BRIVA">BRI VA</option>
													<option value="MANDIRIVA">Mandiri VA</option>
													<option value="PERMATAVA">Permata Va</option>
													<option value="QRIS">Qris</option>
												</select>
											</form>
											</td></tr><tr>
										<td colspan="2" align="center"><br/><button class="btn btn-warning">Bayar</button></td></tr>
									</table>
									
								</div>
								
								
								
								
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

<script type="text/javascript">
	
	$('#pay-button').click(function (event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");
		var namasiswa = $("#namasiswa").val();
		var no_peserta = $("#no_peserta").val();
		var email = $("#email").val();
		var hp = $("#hp").val();
		var kota = $("#kota").val();
		var idprod = $("#idprod").val();
		var nama = $("#nama").val();
		var harga = $("#harga").val();
		var qty = $("#qty").val();
		var total = $("#total").val();
		var idp = $("#idp").val();
		
		
		
		var dataString = 'nama=' + nama + '&harga=' + harga + '&qty=' + qty + '&total=' + total + '&idprod=' + idprod + '&email=' + email + '&hp=' + hp + '&kota=' + kota + '&namasiswa=' + namasiswa + '&no_peserta=' + no_peserta + '&idp=' + idp;	
		$.ajax({
			type: "post", 
			url: '<?=site_url()?>/snap/tes',
			data: dataString, 
			cache: false,
			
			
			success: function(data) {
				//location = data;
				
				console.log('tes = '+data);
				
				var resultType = document.getElementById('result-type');
				var resultData = document.getElementById('result-data');
				
				function changeResult(type,data){
					$("#result-type").val(type);
					$("#result-data").val(JSON.stringify(data));
					//resultType.innerHTML = type;
					//resultData.innerHTML = JSON.stringify(data);
				}
				
				snap.pay(data, {
					
					onSuccess: function(result){
						changeResult('success', result);
						console.log(result.status_message);
						console.log(result);
						$("#payment-form").submit();
					},
					onPending: function(result){
						changeResult('pending', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					},
					onError: function(result){
						changeResult('error', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					}
				});
			}
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