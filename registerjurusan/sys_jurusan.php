<?php 
include("../dbconfig.php");

$jurusan      	 = @$_POST['jurusan'];
$nama_kajur      	 = @$_POST['nama_kajur'];
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$nm_admin           = @$_POST['nm_admin'];
$no_telp      	 = @$_POST['no_telp'];

if (isset($_POST['tambah_jurusan'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO jurusan(jurusan, nama_kajur, nm_admin, no_telp, username, password) VALUES (:jurusan, :nama_kajur, :nm_admin, :no_telp, :username, :password)");
		$stmt->bindParam(":jurusan", $jurusan);
		$stmt->bindParam(":nama_kajur", $nama_kajur);
		$stmt->bindParam(":nm_admin", $nm_admin);
		$stmt->bindParam(":no_telp", $no_telp);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
		echo "<script>alert('Jurusan Anda berhasil didaftarkan!')</script>";		
		echo "<script>location.href='../index.php';</script>"; 
		exit();		
	} 
	catch (PDOException $e) {
		echo "<script>alert('Tidak diperbolehkan untuk mendaftar kembali. Jurusan Anda telah terdaftar sebelumnya! Silahkan login dengan akun milik jurusan Anda')</script>";
		echo "<script>location.href='../index.php';</script>";
	}
}

?>