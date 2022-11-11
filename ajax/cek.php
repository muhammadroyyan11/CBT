<?php	
	$id=$_POST['nocopy'];
	define('BASEPATH', 'dummy');
	$db = array('default' => array());
	require '../application/config/database.php';
	$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'],$db['default']['database']);		
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT `hasil_jawaban`,`p_nilai` FROM `proses` where `no_copy`='$id' ";
		
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	
	if ($row["hasil_jawaban"]=='' or $row["p_nilai"]=='' or $row["p_nilai"]=='0'){
	echo 'Jawaban Ujian Anda gagal disimpan di server. Klik tombol "Kirim Ulang" untuk mengirimkannya kembali';
	} else {
	echo 'Jawaban Ujian Anda telah tersimpan di server';

	}
	
	mysqli_close($conn);

?>