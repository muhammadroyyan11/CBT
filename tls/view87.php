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
		<script type="text/javascript" src="../assets/ckeditor1/ckeditor.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.css">		
		
		
        <title> JCom CBT Online </title>	
	</HEAD> 
	<BODY>
		<div class="wrapper">	
			<div class="container">
				<div class="row" >
					<div class="col-md-1" ></div>
					<div class="col-md-10" >
						<div class="panel panel-default">
							<div class="panel-heading" style="background:#28A9E3;color:#fff;">IMPORT DATA SOAL DARI Ms. WORD</div>
							<div class="panel-body">	
								<?php
									$filename = "../tls/tempsoal.txt";
									if(isset($_POST['editor1'])){	
										$content = $_POST["editor1"];
										$kunci = $_POST["kunci"];
										$id_ujian = $_POST["nu"];
										$bobot = $_POST["bobot"];
										$kuncis = str_split($kunci);
										$Saved_File = fopen($filename, 'w');
										fwrite($Saved_File, $content);
										fclose($Saved_File);
										
										$fd = fopen ($filename, "r");
										$contents = fread ($fd,filesize ($filename));
										
										fclose ($fd); 
										$delimiter = "\\";
										$splitcontents = explode($delimiter, $contents);
										$jml = count($splitcontents);
										$j = 0;
									}	
									
									define('BASEPATH', 'dummy');
									$db = array('default' => array());
									require '../application/config/database.php';
									$conn = mysql_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']);
									mysql_select_db($db['default']['database'], $conn);
									
									$tgl = date('Y-m-d h:i:sa');
									
									for ($i=0; $i<=($jml-1); $i+=6)
									{
										$soal = $splitcontents[$i];
										$a = $splitcontents[$i+1];
										$b = $splitcontents[$i+2];
										$c = $splitcontents[$i+3];
										$d = $splitcontents[$i+4];
										$e = $splitcontents[$i+5];
										$k = $kuncis[$j];
										$j = $j+1;
										
										$sql = "INSERT INTO soal(id_soal,bobot,mm_soal,soal,pil_a,pil_b,pil_c,pil_d,pil_e,jrx,tgl_input,id_ujian,aktif) VALUES (null,'$bobot','','$soal','$a','$b','$c','$d','$e','$k','$tgl','$id_ujian','1')";
								mysql_query("set character_set_server='utf8mb4'");
								mysql_query("set names 'utf8mb4'");										
										mysql_query($sql);
									}
								?>
								<p align="center">Data Soal telah berhasil ditambahkan ke Database.</p><br/>
								<p align="center"><a href="../tls/view85.php" class="btn btn-danger btn-sm">Back</a></p>
							</div>	
						</div>	
					</div>	
					<div class="col-md-1" ></div>
				</div>			
			</div>	
		</div>	
		<div class="clear"></div>					
	</BODY>
</HTML>