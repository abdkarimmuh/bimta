<?php 
$id_dosen   	 = @$_POST['id_dosen']; 
$nip_dosen   	 = @$_POST['nip_dosen']; 
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$id_jurusan      	 = @$_POST['id_jurusan'];
$nm_dosen           = @$_POST['nm_dosen'];
$no_telp      	 = @$_POST['no_telp'];

if (isset($_POST['tambah_dosen'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO dosen(nip_dosen, nm_dosen, no_telp, id_jurusan, username, password) VALUES (:nip_dosen, :nm_dosen, :no_telp, :id_jurusan, :username, :password)");
		$stmt->bindParam(":nip_dosen", $nip_dosen);
		$stmt->bindParam(":nm_dosen", $nm_dosen);
		$stmt->bindParam(":no_telp", $no_telp);
		$stmt->bindParam(":id_jurusan", $id_jurusan);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
		echo "<script>location.href='?apps=dosen';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_dosen'])) {
	try{
		$edit = $db_con->prepare("UPDATE dosen SET nip_dosen=:nip_dosen, nm_dosen=:nm_dosen, no_telp=:no_telp WHERE id_dosen=:id_dosen");
		$edit->bindParam(":id_dosen", $id_dosen);
		$edit->bindParam(":nip_dosen", $nip_dosen);
		$edit->bindParam(":nm_dosen", $nm_dosen);
		$edit->bindParam(":no_telp", $no_telp);
		$edit->execute();
		echo "<script>location.href='?apps=dosen';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM dosen WHERE id_dosen = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>