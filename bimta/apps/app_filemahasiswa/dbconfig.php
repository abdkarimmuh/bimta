<?php
	$db_host = "siteofmeylina.web.id";
	$db_name = "siteofme_db_ta"; //nama database
	$db_user = "siteofme_mellina";
	$db_pass = "ada1998adas4y4s4y4";

	try{
		//koneksi menggunakan PDO
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

?>