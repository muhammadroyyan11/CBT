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
	<script>
function removeSpaces() {
  var str = document.getElementById("contents").value;
while (str.search(/<p>a./g) > -1) {
    var txt = str.replace(/<p>a./g, "\\<p>~A.");
    document.getElementById("contents").value = txt;
    str = document.getElementById("contents").value;
  }
  
while (str.search(/<p>b./g) > -1) {
    var txt = str.replace(/<p>b./g, "\\<p>~B.");
    document.getElementById("contents").value = txt;
    str = document.getElementById("contents").value;
  }

while (str.search(/<p>c./g) > -1) {
    var txt = str.replace(/<p>c./g, "\\<p>~C.");
    document.getElementById("contents").value = txt;
    str = document.getElementById("contents").value;
  }
 
 while (str.search(/<p>d./g) > -1) {
    var txt = str.replace(/<p>d./g, "\\<p>~D.");
    document.getElementById("contents").value = txt;
    str = document.getElementById("contents").value;
  }
  
while (str.search(/<p>e./g) > -1) {
    var txt = str.replace(/<p>e./g, "\\<p>~E.");
    document.getElementById("contents").value = txt;
    str = document.getElementById("contents").value;
  }

var i;
var w = document.getElementById("no").value;
for (i = 2; i <= w; i++) { 
var j = '<p>'+i+'.';
while (str.search(j) > -1) {
    var txt = str.replace(j, "\\<p>~"+i+".");
    document.getElementById("contents").value = txt;
    str = document.getElementById("contents").value;
  }	
}

var x = document.getElementById("alm").value;
var y = document.getElementById("prf").value;
while (str.search(x) > -1) {
    var txt = str.replace(x, "/cbt/assets/kcfinder/upload/images/"+y);
    document.getElementById("contents").value = txt;
    str = document.getElementById("contents").value;
  }
}

function removeSpaces1() {
  var str1 = document.getElementById("contents").value;
while (str1.search(/<p>~a./g) > -1) {
    var txt1 = str1.replace(/<p>~a./g, "\<p>");
    document.getElementById("contents").value = txt1;
    str1 = document.getElementById("contents").value;
  }
  
while (str1.search(/<p>~b./g) > -1) {
    var txt1 = str1.replace(/<p>~b./g, "\<p>");
    document.getElementById("contents").value = txt1;
    str1 = document.getElementById("contents").value;
  }
  
  while (str1.search(/<p>~c./g) > -1) {
    var txt1 = str1.replace(/<p>~c./g, "\<p>");
    document.getElementById("contents").value = txt1;
    str1 = document.getElementById("contents").value;
  }
  
  while (str1.search(/<p>~d./g) > -1) {
    var txt1 = str1.replace(/<p>~d./g, "\<p>");
    document.getElementById("contents").value = txt1;
    str1 = document.getElementById("contents").value;
  }
  
  while (str1.search(/<p>~e./g) > -1) {
    var txt1 = str1.replace(/<p>~e./g, "\<p>");
    document.getElementById("contents").value = txt1;
    str1 = document.getElementById("contents").value;
  }
  
  while (str1.search(/<p>1./g) > -1) {
    var txt1 = str1.replace(/<p>1./g, "<p>");
    document.getElementById("contents").value = txt1;
    str1 = document.getElementById("contents").value;
  }
  
  var i;
  var w = document.getElementById("no").value;

for (i = 1; i <= w; i++) { 
var j = '<p>~'+i+'.';
while (str1.search(j) > -1) {
    var txt1 = str1.replace(j, "<p>");
    document.getElementById("contents").value = txt1;
    str1 = document.getElementById("contents").value;
  }	
}
}


</script>
								<?php 
								$filename1 = "../tls/tempkunci.txt";
									$fd1 = fopen ($filename1, "r");
									$contents1 = fread ($fd1,filesize ($filename1));
									fclose ($fd1);
									
									$filename2 = "../tls/tempf.txt";
									$fd2 = fopen ($filename2, "r");
									$contents2 = fread ($fd2,filesize ($filename2));
									fclose ($fd2);
									
									$filename3 = "../tls/temppg.txt";
									$fd3 = fopen ($filename3, "r");
									$contents3 = fread ($fd3,filesize ($filename3));
									fclose ($fd3);
									
									$filename4 = "../tls/tempjs.txt";
									$fd4 = fopen ($filename4, "r");
									$contents4 = fread ($fd4,filesize ($filename4));
									fclose ($fd4);
									
									$filename = "../tls/tempsoal.txt";
								
									if(isset($_POST['editor1'])){	
										$content = $_POST["editor1"];
										
									
										$Saved_File = fopen($filename, 'w');
										fwrite($Saved_File, $content);
										fclose($Saved_File);
										
										
										$fd = fopen ($filename, "r");
										$contents = fread ($fd,filesize ($filename));
										
										fclose ($fd); 

									} 
								?>	
										<div class="wrapper">	
			<div class="container">
				<div class="row" >
					<div class="col-md-1" ></div>
					<div class="col-md-10" >
						<div class="panel panel-default col-md-8">
							<div class="panel-heading" style="background:#28A9E3;color:#fff;">IMPORT DATA SOAL DARI Ms. WORD <a href="../tls/view85.php" class="btn btn-warning btn-sm" style="float:right;margin-top:-5px;">Back</a></div>
							<form name="savefile" method="post" class="form-horizontal">
							<textarea id="contents" name="editor1" style="width: 100%;height:300px;"><?php echo $contents; ?></textarea>
							
							</div>
							
							<div class="col-md-4" style="padding-left:15px;">
								<div class="form-group">
						
							
									<p><input class="form-control" type="text" name="alm" id="alm" placeholder="Input Alamat Gambar" style="width:100%;" value="<?php echo $contents2; ?>"/>
									</p><br/>
									<p>
									<input class="form-control" type="text" name="prf" id="prf" placeholder="Input Prefiks Gambar" style="width:100%;" value="<?php echo $contents3; ?>"/>
									</p>
									<br/>
									<p>
									<input class="form-control" type="text" name="no" id="no" placeholder="Jumlah Soal" style="width:100%;" value="<?php echo $contents4; ?>"/>
									</p>
								</div>
							<button type="button" onclick="removeSpaces()" class="btn btn-success btn-sm">Proses</button>
							<br/><br/>
						<p><strong>Hapus Karakter Opsi Jawaban</strong></p>
							<button type="button" onclick="removeSpaces1()" class="btn btn-danger btn-sm" style="margin-top:5px;">Hapus</button>
							<br/>

						
							</div>
						
										<div class="clear"></div>	
							
							
										<div class="form-group">
											<label class="col-md-2">Kunci</label>
											<div class="col-md-10"> 
												<div class="input-group">											<div class="input-group-addon">
												<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>					</div>
												<input type="text" name="kunci" class="form-control input-sm" value="<?php echo $contents1; ?>">
												</div>
											</div>
										</div>
									<div class="clear"></div>	<br/>
										<div class="form-group">
											<label class="col-md-2">Bobot Soal</label>
											<div class="col-md-10" style="width:100px"> 
												<div class="input-group">											<div class="input-group-addon">
												<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>					</div>
												<input type="text" name="bobot" class="form-control input-sm" value="1">
												</div>
											</div>
										</div>
											<div class="clear"></div><br/>	
										<div class="form-group">
											<label class="col-md-2">Nama Ujian</label>
											<div class="col-md-10" style="width:300px"> 
												<div class="input-group">											
													<div class="input-group-addon">
													<i class="fa fa-pencil-square-o" aria-hidden="true" style="width:16px;"></i>					</div>
													<?php 
														define('BASEPATH', 'dummy');
														$db = array('default' => array());
														require '../application/config/database.php';
														$conn = mysql_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']);
														mysql_select_db($db['default']['database'], $conn);
														
														$sql = "SELECT * FROM ujian";
														$result = mysql_query($sql);
														echo "<select name='nu' class='form-control input-sm'>";
														while ($row = mysql_fetch_array($result)) {
															echo "<option value='" . $row['id_ujian'] ."'>" . $row['nama_ujian'] ."</option>";
														}
														echo "</select>";
														
													?>
												</div>
											</div>
										</div>	
										<div class="clear"></div>	<br/>
										<label class="col-md-2"></label>
										<div class="col-md-10"> 
											<input type="submit" value="VIEW" name="submitsave" formaction="../tls/view86.php" class="btn btn-success btn-sm mr15">
											
											<button type="submit" name="submit" formaction="../tls/view87.php" class="btn btn-success btn-sm mr15">IMPORT</button>
										</div>
									</form>
						
		
							</div>
							<div class="col-md-1" ></div>
							</div>
							
							</div>
						
			</div>
								
		<div class="clear"></div>					
	</BODY>
</HTML>