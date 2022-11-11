<?php	
	$id=$_POST['nocopy'];
	define('BASEPATH', 'dummy');
	$db = array('default' => array());
	require '../application/config/database.php';
	$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'],$db['default']['database']);		
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT `hasil_jawaban`,`hasil_jawaban1`,`jml_soal` FROM `proses` where `no_copy`='$id' ";
		
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$jwb = $row["hasil_jawaban"];
	$js = $row["jml_soal"];
	$jb = count(explode(',',$row["hasil_jawaban"]));
	
	if ($jb<$js){
	echo $row["hasil_jawaban1"];
	} else {
	echo $row["hasil_jawaban"];
	mysqli_query($conn,"UPDATE `proses` SET `hasil_jawaban1` = '$jwb' WHERE `no_copy` = '$id'");
	}

	mysqli_free_result($result);
	mysqli_close($conn);	
?>