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
								<?php
									$filename = "../tls/tempsoal.txt";
									$filename1 = "../tls/tempkunci.txt";

									if(isset($_POST['editor1'])){	
										$content = $_POST["editor1"];
										$kunci = $_POST["kunci"];

										$kuncis = str_split($kunci);
										$Saved_File = fopen($filename, 'w');
										fwrite($Saved_File, $content);
										fclose($Saved_File);
										
										$Saved_File1 = fopen($filename1, 'w');
										fwrite($Saved_File1, $kunci);
										fclose($Saved_File1);
										
										$fd = fopen ($filename, "r");
										$contents = fread ($fd,filesize ($filename));
										
										fclose ($fd); 
										$delimiter = "\\";
										$splitcontents = explode($delimiter, $contents);
										$counter = 1;
										$i = 2;
										$j = 6;
										$k = 0;
									}	
								?>	
										<div class="wrapper">	
			<div class="container">
				<div class="row" >
					<div class="col-md-1" ></div>
					<div class="col-md-10" >
						<div class="panel panel-default">
							<div class="panel-heading" style="background:#28A9E3;color:#fff;"><table width="100%"><tr><td width="85%">IMPORT DATA SOAL DARI Ms. WORD </td><td width="15%" align="right">
							
							<form name="savefile" method="post" class="form-horizontal">
							<textarea id="contents" name="editor1" style="width: 0px;height:0px;visibility:hidden;"><?php echo preg_replace('/(<p.+?)style=".+?"(>.+?)/i', "$1$2",str_replace("\ ","\\",strip_tags($contents,"<img><table><tr><td><th><p><tbody><b><i><br><sub><sup><ins><small><del><mark><em><strong><form><input><textarea><label><caption><ul><ol><li>"))); ?></textarea>
	<input type="submit" value="BACK" name="submitsave" formaction="../tls/view85.php" class="btn btn-warning btn-sm"></form>
	</td></tr></table>
	
  </div>
							
								<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5"><tr>
									<td width="5%" align="center" class="line2">No</td>
									<td width="40%" align="center" class="line2">Soal</td>
									<td width="10%" align="center" class="line2">A</td>
									<td width="10%" align="center" class="line2">B</td>
									<td width="10%" align="center" class="line2">C</td>
									<td width="10%" align="center" class="line2">D</td>
									<td width="10%" align="center" class="line2">E</td>
									<td width="5%" align="center" class="line2">Kunci</td>
								</tr>
								<tr><td align="center" class="line">1</td>
									<?php
										foreach ( $splitcontents as $color )
										{
											if($counter <= $j) {	
												echo "<td class='line'>".$color."</td>";
												$counter = $counter+1;
												
												} else {
												echo "<td align='center' class='line'>$kuncis[$k]</td></tr><tr><td align='center' class='line'>$i</td>";
												echo "<td class='line'>".$color."</td>";
												$j = $j+5;
												$i = $i+1;
												$k = $k+1;
											}
										}					
									?>
								<td align="center" class="line"><?php echo $kuncis[$k] ?></td></tr>
								</table>
</div>
							</div>
							<div class="col-md-1" ></div>
							</div>
							</div>
							</div>
							
		<div class="clear"></div>					
	</BODY>
</HTML>