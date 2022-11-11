<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php
	define('BASEPATH', 'dummy');
	$db = array('default' => array());
	require '../application/config/database.php';
	$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'],$db['default']['database']);
?>
<?php	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$id=$_POST['no_copy'];
	$jwb=$_POST['jwb'];
	$nilai=$_POST['nilai'];
	$salah=$_POST['salah'];
	$kosong=$_POST['kosong'];
	$tot = $salah + $kosong;
	$pn = explode(',',$jwb);
	$jml = count($pn);
	$benar = $jml -$tot;
	
	$k13 = round(+$benar/$jml * 3+1, 2); 
				if ($k13 <= 4 && $k13 >= 3.85) {$predikat = "A";}
				elseif ($k13 <= 3.84 && $k13 >= 3.51) {$predikat = "A-";} 
				elseif ($k13 <= 3.50 && $k13 >= 3.18) {$predikat = "B+";} 
				elseif ($k13 <= 3.17 && $k13 >= 2.85) {$predikat = "B";} 
				elseif ($k13 <= 2.84 && $k13 >= 2.51) {$predikat = "B-";} 
				elseif ($k13 <= 2.50 && $k13 >= 2.18) {$predikat = "C+";} 
				elseif ($k13 <= 2.17 && $k13 >= 1.85) {$predikat = "C";} 
				elseif ($k13 <= 1.84 && $k13 >= 1.51) {$predikat = "C-";} 
				elseif ($k13 <= 1.50 && $k13 >= 1.18) {$predikat = "D+";} 
				elseif ($k13 <= 1.17 && $k13 >= 1.00) {$predikat = "D";} 
				
	$sql = "UPDATE `proses` SET `proses_nilai` = '$jwb', `p_nilai` = '$nilai', `p_salah` = '$salah', `p_kosong` = '$kosong', `p_benar` = '$benar', `predikat` = '$predikat' WHERE `no_copy` = '$id'";
	if (mysqli_query($conn, $sql)) {
	
		} else {
		echo "Gagal dikirim ke server, koneksi jaringan terputus: " . mysqli_error($conn);
	}
	mysqli_close($conn);
?>
