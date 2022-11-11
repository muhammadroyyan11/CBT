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
	
	<script>
		function clear_cart() {
			var result = confirm('Yakin akan dihapus semua?');
			
			if(result) {
				window.location = "<?php echo base_url(); ?>cart/remove/all";
				}else{
				return false; // cancel button
			}
		}
	</script>
	
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
									<div class="panel-heading text-center" style="background:#15519f;color:#fff;font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Keranjang Belanja</div>
									<div class="panel-body">	
										<div class="col-md-12 pb10">	
											
											<div style="padding-bottom:10px">
												
												<input type="button" value="Lanjut Belanja" onclick="window.location='pendaftaranujian'" />
											</div>
											<div style="color:#F00"><?php echo $message?></div>
											<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
												<?php if ($cart = $this->cart->contents()): ?>
												<tr bgcolor="#FFFFFF" style="font-weight:bold">
													<td>No</td>
													<td>Nama</td>
													<td>Harga</td>
													<td>Qty</td>
													<td>Jumlah</td>
													<td>Opsi</td>
												</tr>
												<?php
													echo form_open('cart/update_cart');
													$grand_total = 0; $i = 1;
													
													foreach ($cart as $item):
													echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
													echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
													echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
													echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
													echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
												?>
												<tr bgcolor="#FFFFFF">
													<td>
														<?php echo $i++; ?>
													</td>
													<td>
														<?php echo $item['name']; ?>
													</td>
													<td>
														Rp <?php echo number_format($item['price'],2); ?>
													</td>
													<td>
														<?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
													</td>
													<?php $grand_total = $grand_total + $item['subtotal']; ?>
													<td>
														Rp <?php echo number_format($item['subtotal'],2) ?>
													</td>
													<td>
														<?php echo anchor('cart/remove/'.$item['rowid'],'Batal'); ?>
													</td>
													<?php endforeach; ?>
												</tr>
												<tr>
													<td><b>Total Order: Rp<?php echo number_format($grand_total,2); ?></b></td>
													<td colspan="5" align="right"><input type="button" value="Hapus Keranjang" onclick="clear_cart()">
														<input type="submit" value="Perbarui">
														<?php echo form_close(); ?>
													<input type="button" value="Pilih Pembayaran" onclick="window.location='billing'"></td>
												</tr>
												<?php endif; ?>
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