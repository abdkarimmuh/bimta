<?php 
$id_ta   	 = @$_POST['id_ta']; 
$nim           = @$_POST['nim'];
$judul1      	 = @$_POST['judul1'];
$judul2      	 = @$_POST['judul2'];
$judul3           = @$_POST['judul3'];
$judul_kaprodi           = @$_POST['judul_kaprodi'];
$judul_akhir           = @$_POST['judul_akhir'];


if (isset($_POST['tambah_judulta'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO judul_ta(nim, judul1, judul2, judul3) VALUES (:nim, :judul1, :judul2, :judul3)");
		$stmt->bindParam(":nim", $nim);
		$stmt->bindParam(":judul1", $judul1);
		$stmt->bindParam(":judul2", $judul2);
		$stmt->bindParam(":judul3", $judul3);
		$stmt->execute();
		echo "<script>location.href='?apps=judulta';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_judulta'])) {
	try{
		$edit = $db_con->prepare("UPDATE judul_ta SET nim=:nim, judul1=:judul1, judul2=:judul2, judul3=:judul3 WHERE id_ta=:id_ta");
		$edit->bindParam(":id_ta", $id_ta);
		$edit->bindParam(":nim", $nim);
		$edit->bindParam(":judul1", $judul1);
		$edit->bindParam(":judul2", $judul2);
		$edit->bindParam(":judul3", $judul3);
		$edit->execute();
		echo "<script>location.href='?apps=judulta';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif (isset($_POST['pilih_judulta'])) {
	try{
		$edit = $db_con->prepare("UPDATE judul_ta SET judul_kaprodi=:judul_kaprodi WHERE id_ta=:id_ta");
		$edit->bindParam(":id_ta", $id_ta);
		$edit->bindParam(":judul_kaprodi", $judul_kaprodi);
		$edit->execute();
		echo "<script>location.href='?apps=judulta';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif (isset($_POST['verifikasi_judulta'])) {
	try{
		$edit = $db_con->prepare("UPDATE judul_ta SET judul_akhir=:judul_akhir WHERE id_ta=:id_ta");
		$edit->bindParam(":id_ta", $id_ta);
		$edit->bindParam(":judul_akhir", $judul_akhir);
		$edit->execute();
		echo "<script>location.href='?apps=judulta';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM judul_ta WHERE id_ta = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}


?>