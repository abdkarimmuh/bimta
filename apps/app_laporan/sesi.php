<link rel="shoutcut icon" href="../../logo.png">
<?php
	session_start();
	if(!isset($_SESSION['user_session'])){
		header("location: apps/app_materi/index.php");
	}

	include_once 'dbconfig.php';
	$stmt = $db_con->prepare("SELECT * FROM dosen WHERE id_dosen=:uid");
	$stmt->execute(array(":uid"=>$_SESSION['user_session']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	$stmt2 = $db_con->prepare("SELECT * FROM mahasiswa WHERE nim=:uid");
	$stmt2->execute(array(":uid"=>$_SESSION['user_session']));
	$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt3 = $db_con->prepare("SELECT * FROM admin_prodi WHERE id_admin=:uid");
	$stmt3->execute(array(":uid"=>$_SESSION['user_session']));
	$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
	
	$stmt4 = $db_con->prepare("SELECT * FROM kaprodi WHERE id_kaprodi=:uid");
	$stmt4->execute(array(":uid"=>$_SESSION['user_session']));
	$row4=$stmt4->fetch(PDO::FETCH_ASSOC);
	
	$stmt5 = $db_con->prepare("SELECT * FROM jurusan WHERE id_jurusan=:uid");
	$stmt5->execute(array(":uid"=>$_SESSION['user_session']));
	$row5=$stmt5->fetch(PDO::FETCH_ASSOC);

?>