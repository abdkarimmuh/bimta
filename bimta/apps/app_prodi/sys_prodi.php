<?php 
$id_prodi   	 = @$_POST['id_prodi']; 
$nama_prodi           = @$_POST['nama_prodi'];
$jenjang      	 = @$_POST['jenjang'];

if (isset($_POST['tambah_prodi'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO prodi(nama_prodi, jenjang) VALUES (:nama_prodi, :jenjang)");
		$stmt->bindParam(":nama_prodi", $nama_prodi);
		$stmt->bindParam(":jenjang", $jenjang);
		$stmt->execute();
		echo "<script>location.href='?apps=prodi';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_prodi'])) {
	try{
		$edit = $db_con->prepare("UPDATE prodi SET nama_prodi=:nama_prodi, jenjang=:jenjang WHERE id_prodi=:id_prodi");
		$edit->bindParam(":nama_prodi", $nama_prodi);
		$edit->bindParam(":jenjang", $jenjang);
		$edit->bindParam(":id_prodi", $id_prodi);
		$edit->execute();
		echo "<script>location.href='?apps=prodi';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM prodi WHERE id_prodi = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>