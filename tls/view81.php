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
					<div class="col-md-1" ></div>
					<div class="col-md-10" >
						<div class="panel panel-default">
							<div class="panel-heading" style="background:#28A9E3;color:#fff;">IMPORT DATA SISWA</div>
							<div class="panel-body">	
								<?php
									include "view82.php";
									
									define('BASEPATH', 'dummy');
									$db = array('default' => array());
									require '../application/config/database.php';
									$conn = mysql_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']);
									mysql_select_db($db['default']['database'], $conn);
									
									$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
									$hasildata = $data->rowcount($sheet_index=0);
									
									$sukses = 0;
									$gagal = 0;
									
									$drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
									if($drop == 1){
										$truncate ="TRUNCATE TABLE pengguna";
										mysql_query($truncate);
									};
									
									echo "<center><b>Daftar Data Gagal Import Karena Terjadi Duplikasi No Peserta</b></center><br/><br/>";
									echo "<table width='100%' class='table-new text-center'>";
									echo "<td width='70%' style='font-weight:bold;'>Nama</td>";
									echo "<td width='20%' style='font-weight:bold;'>No Peserta</td>";
									echo "<td width='10%' style='font-weight:bold;'>ID Kelas</td>";
									for ($i=2; $i<=$hasildata; $i++)
									{
										$data1 = str_replace("'","`",$data->val($i,1));
										$data2 = $data->val($i,2);
										$data3 = md5($data->val($i,4));
										$data4 = $data->val($i,3);
										$data5 = '3';
										$data6 = date('Y-m-d h:i:sa');
										$data7 = '1';
										$data8 = $data->val($i,5);
										$data9 = $data->val($i,6);
										$data10 = $data->val($i,8);
										$data11 = $data->val($i,9);
										$data12 = $data->val($i,10);
										$data13 = $data->val($i,11);
										$data14 = $data->val($i,12);
										$data16 = $data->val($i,7);
										
										$x = $data->val($i,4);
										$jml=strlen($x);
										$a='';
										for ($q=0;$q<$jml;$q++)
										{
											$c = substr($x,$q,1);
											$a = $a.dechex(ord($c)+67);				
										}
										$data15 = $a.$a;
										
										
										$querycheck = mysql_query ("SELECT * FROM pengguna where no_peserta = '" . $data2 . "'") or die(mysql_error());
										while($result = mysql_fetch_array($querycheck))
										{
											$xxx = $result['no_peserta'];
											if($xxx == $data2)
											{
												$gagal++;
												$n = $result['nama']; 
												$np = $result['no_peserta']; 
												$idk = $result['id_kelas']; 
												echo "<tr><td>".$n."</td>";
												echo "<td>".$np."</td>";
												echo "<td>".$idk."</td></tr>";
												goto b;
											}
											else if ($xxx != $data2)
											{
												
												goto a;
												
											}
											
										}
										
										a:
										
										$query = "INSERT INTO pengguna (id,nama,no_peserta,password,id_kelas,role,hp_siswa,hp_ortu,j_kelamin,alamat,sekolah,terdaftar,aktif,catatan,foto,peminatan,email) VALUES (null,'$data1','$data2','$data3','$data4','$data5','$data8','$data9','$data10','$data11','$data12','$data6','$data7','$data15','$data14','$data13','$data16')";
										$hasil = mysql_query($query);
										$sukses++;
										
										b:
									}
									echo "</table>";
									
									echo "<br/><b>Import data selesai.</b> <br>";
									echo "Data yang berhasil di import : " . $sukses .  "<br>";
									echo "Data yang gagal di import : ".$gagal .  "<br>";
									echo "Kembali ke menu <a href='../tls/view80.php'>import</a>";
									
								?>
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