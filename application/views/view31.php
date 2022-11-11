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
			body {background:#515151;}
			.input-group-addon{color:#ff0000; background-color: #ffffff;}
			.tombolmulai{
			font-size: 28px;
			border-radius: 2px;
			padding: 30px;
			background:    #5CB85C;
			color:         #fff;
			font-family: 'BebasNeueRegular';
			width:100%;
			border:none;
			cursor:pointer;
			}
		</style>
		
		<div class="container" >
			
			
			<div class="row" style="background:#fff;padding:15px 20px;">
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
						<img src="<?php echo base_url() . 'assets/css/images/jayvyn-host.png' ?>" style="max-width:120px;">
						<?php } else
						{ ?>
						<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/css/images/' . $logo ?>" style="max-width:120px;">	
					<?php } ?>
				</div>
				<div class="col-md-8 text-center" style="padding-top:20px;">
					<h1><?php echo $teks1; ?></h1>
					<h4><?php echo $teks2; ?></h4>
					<h4><?php echo $teks3; ?></h4>
				</div>
				<div class="col-md-2 text-center"></div>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="container" >
			<div class="row" style="padding:100px 0 150px 0;background:url('<?php echo base_url(); ?>assets/css/images/bg.jpg');">
				
				<div class="col-md-4 text-center">	</div>
				<div class="col-md-4 text-center">	
					<script language="javascript">
						localStorage.clear();
					</script>
					
					<div class="panel panel-default" style="background:#FBF6D6;max-width:365px;margin-left:auto;margin-right:auto;padding:15px;">
						<div class="panel-body">
							
							<b>Note:</b><br/>Pastikan POP UP BLOCKER pada browser dalam kondisi TIDAK AKTIF.<br/><br/>
							<button onclick="myFunction()" class="tombolmulai">MULAI UJIAN</button>
							
						</div>
						
					</div>
					
					<script>
						function myFunction(element) {							
							window.open('/cbt/loginform', 'window','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,fullscreen=1');
							window.moveTo(0, 0);
							window.opener=self; 
							window.close(); 
							return false;
						}
					</script>
					
					<div class="error">
						<?php echo validation_errors(); ?>
					</div></div></div></div>
					<div class="clear"></div>
					<div class="container" >
						<div class="row" style="padding:50px 0 50px 0;color:#fff;">
							<div class="col-md-12 text-center main-teks16w">	
								<strong>JCom Computer Based Test Online Version <?php echo $versi; ?></strong><br/><br/>
								Created by Agi Nugraha<br/>
								&copy; <?php echo date("Y") ?> All Rights Reserved<br/>
								Home Page <a style="color:#fff;text-decoration:none;" href="http://www.jayvyn-host.com" target="_blank">www.jayvyn-host.com</a><br/>
							</div>
							
						</div>	
						
					</div>
					
					
	</BODY>
</HTML>