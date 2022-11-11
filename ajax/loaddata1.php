<?php	
	$id=$_POST['nocopy'];	
	define('BASEPATH', 'dummy');
	$db = array('default' => array());
	require '../application/config/database.php';
	$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'],$db['default']['database'], $conn);		
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT `stat` FROM `proses` where `no_copy`='$id' ";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	echo $row["stat"];
	mysqli_free_result($result);
	mysqli_close($conn);	
?>