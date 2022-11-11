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
	
	//berkas
	
	$sql =  "ALTER TABLE pengguna ADD berkas varchar(10)  NOT NULL";	
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	//proses
	
	$sql =  "ALTER TABLE proses	ADD `stat` tinyint(1) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `sekolah` char(100)  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `sort_soal` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `sort_jawaban` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `sort_jrx` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `sort_hasil` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `analisa` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `hasil_jawaban1` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `cek` tinyint(1) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `my` varchar(50)  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `my1` varchar(50)  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `my2` varchar(50)  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `utbk` int(1) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `utbks` int(2) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w1` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w2` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w3` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w4` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w5` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w6` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w7` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w8` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w9` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE proses	ADD `w10` smallint(10) NOT NULL";	
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	//setting

	$sql =  "ALTER TABLE setting ADD COLUMN `p1` varchar(5) NOT NULL";
		if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `p2` varchar(5) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `p3` varchar(5) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `p4` varchar(5) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `k1` varchar(30) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `k2` varchar(30) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `k3` varchar(30) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `k4` varchar(30) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `ipp` varchar(1) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `sess` varchar(1)  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `page` varchar(1) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `fol_db` varchar(255) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `fol_satu` varchar(255) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `fol_banyak` varchar(255) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `x1` varchar(20) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn);
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `x2` varchar(20) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `x3` varchar(20) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `x4` varchar(20) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `x5` varchar(20) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE setting ADD COLUMN `lc` varchar(15) NOT NULL";	
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	//soal
	
	$sql =  "ALTER TABLE soal ADD `kyd` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE soal ADD `essay` int(1) NOT NULL";	
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	//temp_soal
	
	$sql =  "ALTER TABLE temp_soal ADD `kyd` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE temp_soal ADD `essay` int(1) NOT NULL";	
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	// ujian
	
	$sql =  "ALTER TABLE ujian ADD `tombol` tinyint(1) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `catatan` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `kjawab` text  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `hasil` tinyint(1) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `jminat` smallint(8) unsigned NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `win` varchar(20)  DEFAULT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `medley` varchar(50)  NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `utbk` int(11) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w1` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w2` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w3` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w4` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w5` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w6` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w7` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w8` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w9` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `w10` smallint(10) NOT NULL";
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `tipe` int(1) NOT NULL";	
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql =  "ALTER TABLE ujian ADD `jr` int(1) NOT NULL";	
	if (mysqli_query($conn, $sql)) {} else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	$sql = "UPDATE `setting` SET `versi` = '5.3', `updated` = '10 Januari 2020'";
	if (mysqli_query($conn, $sql)) { echo "<br/><span style='color:red;font-weight:bold;'>Update database berhasil.</span>"; } else
	{
		echo mysqli_error($conn)."<br/>";
	}
	
	mysqli_close($conn);
?>
