<?php 
$nim   	 = @$_POST['nim']; 
$nm_mhs           = @$_POST['nm_mhs'];
$th_bimbingan      	 = @$_POST['th_bimbingan'];
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$id_prodi      	 = @$_POST['id_prodi'];
$id_dosen      	 = @$_POST['id_dosen'];


if (isset($_POST['tambah_mahasiswa'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO mahasiswa(nim, nm_mhs, th_bimbingan, id_prodi, id_dosen, username, password) VALUES (:nim, :nm_mhs, :th_bimbingan, :id_prodi, :id_dosen, :username, :password)");
		$stmt->bindParam(":nim", $nim);
		$stmt->bindParam(":nm_mhs", $nm_mhs);
		$stmt->bindParam(":th_bimbingan", $th_bimbingan);
		$stmt->bindParam(":id_prodi", $id_prodi);
		$stmt->bindParam(":id_dosen", $id_dosen);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
		echo "<script>location.href='?apps=mahasiswa';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_mahasiswa'])) {
	try{
		$edit = $db_con->prepare("UPDATE mahasiswa SET nim=:nim, nm_mhs=:nm_mhs, id_dosen=:id_dosen WHERE nim=:nim");
		$edit->bindParam(":nim", $nim);
		$edit->bindParam(":nm_mhs", $nm_mhs);
		$edit->bindParam(":id_dosen", $id_dosen);
		$edit->execute();
		echo "<script>location.href='?apps=mahasiswa';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM mahasiswa WHERE nim = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>