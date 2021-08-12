<?php
	$db_host = "localhost";
	$db_name = "u613798807_bimta"; //nama database
	$db_user = "u613798807_bimta";
	$db_pass = "Pnjjayajayajaya1";

	try{
		//koneksi menggunakan PDO
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

?>