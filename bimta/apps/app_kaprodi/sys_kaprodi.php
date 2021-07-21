<?php 
$id_kaprodi   	 = @$_POST['id_kaprodi']; 
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$id_prodi      	 = @$_POST['id_prodi'];
$nm_kaprodi           = @$_POST['nm_kaprodi'];
$nip_kaprodi           = @$_POST['nip_kaprodi'];
$no_telp      	 = @$_POST['no_telp'];

if (isset($_POST['tambah_kaprodi'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO kaprodi(nm_kaprodi, nip_kaprodi, no_telp, id_prodi, username, password) VALUES (:nm_kaprodi, :nip_kaprodi, :no_telp, :id_prodi, :username, :password)");
		$stmt->bindParam(":nm_kaprodi", $nm_kaprodi);
		$stmt->bindParam(":nip_kaprodi", $nip_kaprodi);
		$stmt->bindParam(":no_telp", $no_telp);
		$stmt->bindParam(":id_prodi", $id_prodi);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
		echo "<script>location.href='?apps=kaprodi';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_kaprodi'])) {
	try{
		$edit = $db_con->prepare("UPDATE kaprodi SET nm_kaprodi=:nm_kaprodi, nip_kaprodi=:nip_kaprodi, no_telp=:no_telp WHERE id_kaprodi=:id_kaprodi");
		$edit->bindParam(":id_kaprodi", $id_kaprodi);
		$edit->bindParam(":nm_kaprodi", $nm_kaprodi);
		$edit->bindParam(":nip_kaprodi", $nip_kaprodi);
		$edit->bindParam(":no_telp", $no_telp);
		$edit->execute();
		echo "<script>location.href='?apps=kaprodi';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM kaprodi WHERE id_kaprodi = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>