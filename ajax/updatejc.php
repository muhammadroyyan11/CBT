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
	$sql = "UPDATE `setting` SET `versi` = '4.3', `updated` = '17 Agustus 2019'";
	if (mysqli_query($conn, $sql)) {
	
		} else {
		echo "Gagal dikirim ke server, koneksi jaringan terputus: " . mysqli_error($conn);
	}
	mysqli_close($conn);
?>
