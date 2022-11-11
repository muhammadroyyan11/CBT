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
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/5575c11027.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">		
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>	   
        <title> JCom CBT Online </title>
		
	</HEAD> 
	<BODY>
		<style>
		    body {background:#e8e8e8;}
			.input-group-addon{color:#ff0000; background-color: #ffffff;}
			.p-viewer {
			position: relative;
			margin: -27px 10px;
			float: right;
			z-index: 9999;
			color:#ccc;
			}
			
		</style>
		
		<div class="container" >
			<div class="row" style="height:320px;background: rgb(120,204,208);background: linear-gradient(45deg, rgba(120,204,208,1) 0%, rgba(21,81,159,1) 45%, rgba(27,20,100,1) 100%);padding:15px 20px;">
				<div class="col-md-2 text-center">	
					<?php
						$this->db->select('*');
						$this->db->from('setting');
						$query1 = $this->db->get ();												
						$qrow1 = $query1->result();
						$row1 = $qrow1[0];
						$logo = $row1->logo;
						$teks1 = $row1->teks1;
						$teks2 = $row1->teks2;
						$teks3 = $row1->teks3;
						$versi = $row1->versi;
						
						if ($logo == '')
						{ ?>
						<img src="<?php echo base_url() . 'assets/css/images/jayvyn-host.png' ?>" style="max-width:60px;">
						<?php } else
						{ ?>
						<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/css/images/' . $logo ?>" style="max-width:60px;">	
					<?php } ?>
				</div>
				
				<div class="col-md-8 text-center" style="padding-top:20px;">
					
				</div>
				<div class="col-md-2 text-center"></div>
			</div>
		</div>
		
		
		<div class="clear"></div>
		
		
		<div class="container" >
			<div class="row" style="padding:0px 0 0px 0;">
				
				<div class="col-md-3 text-center"></div>
				<div class="col-md-6 text-center">	
					<div style="font-family: 'Montserrat Bold', arial;font-size:20px;color:#78ccd0;text-align:center;margin: -250px 0 20px 0px;"><?php echo $teks1; ?></div>
					<div style="background:#fff;max-width:450px;padding:30px;border-radius:5px;margin-left:auto;margin-right:auto;background:#fff;max-width:450px;padding:30px;border-radius:5px;margin-left:auto;margin-right:auto;-webkit-box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58); box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.58);">
						<center><?php echo $this->session->flashdata('pesan2');?></center>
						<span style="font-family: 'Montserrat Bold', arial;font-weight:bold;font-size:18px;">Login Peserta Ujian</span>
						<div class="garis2"></div>
						<?php echo $this->session->userdata('user_id');?>
						
						<form action="<?php echo site_url('login');?>" method="post">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user" aria-hidden="true" style="color:#c1c1c1;width:16px;font-size:20px;"></i>
									</div>
									<input class="form-control" type="text" name="l_nopes" placeholder="Username"/>
								</div></div>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-lock" aria-hidden="true" style="color:#c1c1c1;width:16px;font-size:20px;"></i>
										</div>	
										<input id="pw" class="form-control" type="password" name="l_pass" placeholder="Password"/>
										
										<span for='icon2' class="p-viewer">
											<i class="fa fa-eye" aria-hidden="true" style="color:#c1c1c1;width:16px;font-size:20px;" onclick="pwshow()">                     </i>
										</span>
									</div></div>
									
									
									<input class="btn" type="submit" style="font-family: 'Montserrat Bold', arial;font-weight:bold;background:#f7a71e;color:#fff;width:100%;    text-transform: none;" value="Masuk" name="signin"/>
									
									<div class="garis2"></div>
									<div class="clear"></div>
									
									<table width="100%">
										<tr>
											<td width="50%">
												<a href="<?php echo site_url('resetpassword');?>" style="font-size:10px;">Lupa Kata Sandi</a>	
											</td>
											<td width="50%">
												<a href="<?php echo site_url('daftar');?>" style="font-size:10px;">Daftar Sekarang</a>
											</td>
										</tr>
									</table>
									
									
									
						</form>
					</div>
					<div class="error">
						<?php echo validation_errors(); ?>
					</div>		
					
				</div>
				<div class="col-md-3 text-center">	</div>
			</div></div>
			<div class="clear"></div>
			
			
			<script type="text/javascript">	
				function pwshow() {
					var x = document.getElementById("pw");
					if (x.type === "password") {
						x.type = "text";
						} else {
						x.type = "password";
					}
				}
			</script>
			
			
	</BODY>
</HTML>