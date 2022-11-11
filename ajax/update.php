<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php /*
	define('BASEPATH', 'dummy');
	$db = array('default' => array());
	require '../application/config/database.php';
	$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'],$db['default']['database']); 

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} */
	$id=$_POST['no_copy'];
	$jwb=$_POST['jwb'];
	$waktu=$_POST['waktu'];
	
	 /*	
	$sql = "UPDATE `proses` SET `hasil_jawaban` = '$jwb', `sisa_waktu` = '$sisa_waktu', `hasil_jawaban1` = '$jwb' WHERE `no_copy` = '$id'";
	if (mysqli_query($conn, $sql)) {
	
		} else {
		echo "Gagal dikirim ke server, koneksi jaringan terputus: " . mysqli_error($conn);
	}
	mysqli_close($conn); */

	$myfile = fopen('../data/d'.$id.'_'.date("dmY").'.txt', "w") or die("Unable to open file!");
				$txt = $jwb."\n".$waktu;
				fwrite($myfile, $txt);
				fclose($myfile);	
?>
