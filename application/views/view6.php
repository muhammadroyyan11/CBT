<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
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
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">		
		<script src="<?php echo base_url(); ?>assets/js/5575c11027.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/alertify.core.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/alertify.default.css" />
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/css/images/ssc.png">
		
        <title> JCom CBT Online </title>
		<?php /*
			<script type="text/javascript">
			$(document).ready(function () {
			//Disable cut copy paste
			$('html').bind('cut copy paste', function (e) {
			e.preventDefault();
			});
			
			//Disable mouse right click
			$("html").on("contextmenu",function(e){
			return false;
			});
			});
			</script>
		*/ ?>
	</HEAD> 
	<BODY>
		<?php
			$this->db->select('*');
			$this->db->from('setting');
			$query1 = $this->db->get ();												
			$qrow1 = $query1->result();
			$row1 = $qrow1[0];
			$versi = $row1->versi;
		?>
		
		<nav class="navbar navbar-inverse" >
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<div class="navbar-brand" style="font-family: 'Montserrat Bold', arial;font-size:12px;color:#fff;">
						<table width="100%">
							<tr>
								<td valign="top">
									<?php if( !$this->session->userdata('foto')) 
										{ ?>
										<img src="<?php echo base_url() . 'assets/css/images/avatar.png' ?>" style="border:1px solid #AEAEAE;margin-right:10px;background:#fff;width:30px;height:30px;border:1px solid #fff;border-radius:50%;">
										<?php } else
										{ ?>
										<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/kcfinder/upload/foto/' . $this->session->userdata('foto') ?>" style="border:1px solid #AEAEAE;margin-right:10px;background:#fff;width:30px;height:30px;border:1px solid #fff;border-radius:50%;">	
									<?php } ?></td><td>
								<?php echo "<strong>Hi, ".$this->session->userdata('nama')."</strong>"; ?></td></tr></table></div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav" style="float: right;">
						<li>
							<a href="<?php echo site_url('homesiswa')?>">
								<img src="<?php echo base_url() . 'assets/css/images/icon-06.png' ?>" style="max-width:16px;margin:0 3px 5px 0"> Beranda
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('tips')?>">
								<img src="<?php echo base_url() . 'assets/css/images/icon-05.png' ?>" style="max-width:18px;margin:0 3px 3px 0"> Tips Ujian
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('piljur/'.$this->session->userdata('user_id'));?>">
								<img src="<?php echo base_url() . 'assets/css/images/icon-04.png' ?>" style="max-width:18px;margin:0 3px 5px 0"> Pilih Jurusan
							</a>
						</li>
						
			
			
						
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-pencil-square-o" style="font-size:16px;padding-right:5px;" aria-hidden="true"></i>Pendaftaran Ujian
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('pendaftaranujian')?>">Paket Ujian</a></li>
          <li><a href="<?php echo site_url('keranjangbelanja')?>">Keranjang Belanja</a></li>
          <li><a href="<?php echo site_url('riwayat')?>">Riwayat Transaksi</a></li>
        </ul>
      </li>
						
						<li>
							<a href="<?php echo site_url('daftarujian')?>">
								<img src="<?php echo base_url() . 'assets/css/images/icon-03.png' ?>" style="max-width:20px;margin:0 3px 5px 0"> Jadwal Ujian
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('editprofil')?>">
								<i class="fa fa-user-o" style="font-size:14px;max-width:20px;margin:0 3px 5px 0;" aria-hidden="true"></i> Profil
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('logout')?>">
							<span style="background:#f7a71e;padding:5px;color:#fff;border-radius:5px;"><img src="<?php echo base_url() . 'assets/css/images/icon-07.png' ?>" style="max-width:16px;margin:0 3px 5px 0;"></i> Log Out</span>
						</a>
					</li>
				</ul>
				
			</div>
		</div>
	</nav>
	
<div class="clear"></div>			