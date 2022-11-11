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

<div class="subjudul">
Edit Kelas
</div>
<div class="clear"></div>	
<div class="wrapper" >	
<form action="<?php echo site_url('simpaneditkelas');?>" method="POST">
<div class="kolomform1"><label>ID Kelas</label></div><div class="kolomform2"><?php echo $kelas->id_kelas;?></div><div class="kolomform3"><a class="tombolback" href="<?php echo site_url('kelas');?>">Back </a></div>
<div class="clear"></div>
<div class="kolomform1"><label>Nama Kelas</label></div><div class="kolomform2"><input class="input-form" type="text" name="nama_kelas" value="<?php echo $kelas->nama_kelas;?>"></div><div class="kolomform3"><input class="tombol1" type="submit" value="Simpan" /></div>
<div class="clear"></div>
<input type="hidden" name="id_kelas" value="<?php echo $kelas->id_kelas;?>" />
</form>

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