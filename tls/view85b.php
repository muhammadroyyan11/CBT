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
		 <link rel="stylesheet" href="wordup.css">
		
        <title> JCom CBT Online </title>	
	</HEAD> 
	<BODY>
		<div class="wrapper">	
			<div class="container">
				<div class="row" >
					
					<div class="col-md-12" >
						<div class="panel panel-default">
							<div class="panel-heading" style="background:#28A9E3;color:#fff;">IMPORT DATA SOAL DARI Ms. WORD</div>
							<div class="panel-body">	
								
								<?php

									
									$filename = "../tls/tempsoal.txt";
									$fd = fopen ($filename, "r");
									$contents = fread ($fd,filesize ($filename));	
									fclose ($fd); 
									$delimiter = "\\";
									$splitcontents = explode($delimiter, $contents);
								?>	
																<section class="tool">
  <div class="before">
    <h2><label for="wordup">Paste Dari Word Document</label></h2>
    <textarea id="wordup"><?php echo $contents; ?></textarea>
  </div>
  <div class="run">
    <p><button id="convert">Konversi<span aria-hidden="true"> &rarr;</span></button><br>
    <button id="clear" class="btn btn-danger btn-sm">Clear<span aria-hidden="true"> &times;</span></button><br/><br/>
	<form name="savefile" method="post" class="form-horizontal">
	<input type="submit" value="LANJUT" name="submitsave" formaction="../tls/view85a.php" class="btn btn-success btn-sm"></p>
  </div>
  
  <div class="after">
    <h2><label for="output">Clean HTML</label></h2>
    <textarea id="output" name="editor1"></textarea>
    <div class="options">
      <p><input type="checkbox" id="targetblank" name="targetblank" /> <label for="targetblank">Add <code>target="_blank"</code> and <code>rel="noopener noreferrer"</code> to links</label></p>

      <p><input type="checkbox" id="domainfilter" name="domainfilter" /> Remove <label for="domainname" class="hidden-visually">Domain name</label> <input type="text" id="domainname" name="domainname" placeholder="example.com" /> <label for="domainfilter">from internal links</label></p>

      <p><input type="checkbox" id="markdown" name="markdown" /> <label for="markdown">Convert to <a href="https://en.wikipedia.org/wiki/Markdown#Example">Markdown</a></label></p>
    </div>
  </div>
</section>
<script src="turndown.js"></script>
<script src="wordup.js"></script>
										<div class="col-md-12 text-center"> 
											

										</div>
									</form>
							
							</div>	
						</div>	
					</div>	
					
				</div>			
			</div>	
		</div>	
		<div class="clear"></div>					
	</BODY>
</HTML>