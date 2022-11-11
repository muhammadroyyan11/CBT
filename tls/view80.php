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
        <script src="../js/jquery.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">	
		<link href="../css/font-awesome.css" rel="stylesheet">	
		<script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.css">	
		
        <title> JCom CBT Online </title>
		
	</HEAD> 
	<BODY>
		<div class="wrapper">	
			<div class="container">
				<div class="row" >
					<div class="col-md-4" ></div>
					<div class="col-md-4" >
						<div class="panel panel-default">
							<div class="panel-heading" style="background:#28A9E3;color:#fff;">IMPORT DATA SISWA</div>
							<div class="panel-body text-center">	
								<form method="post" enctype="multipart/form-data" action="view81.php">
									<div class="form-group">
										<label>Pilih File Excel*:  </label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>
											</div><input class="form-control input-sm" type="file" name="fileexcel" style="padding-bottom:40px;"></div>
											
									</div>	
									<div class="form-group">
										<input class="btn btn-success btn-sm" name="upload" type="submit" value="Import" title="Import"/>
									</div>	
									<?php /*
										<label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
									*/ ?>
									
								</form><br/>
								* file yang bisa di import adalah .xls (Excel 2003-2007).	
							</div>	
						</div>	
					</div>	
					<div class="col-md-4" ></div>
				</div>			
			</div>	
		</div>	
		<div class="clear"></div>					
	</BODY>
</HTML>
