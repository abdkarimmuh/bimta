<?php 
$id_admin   	 = @$_POST['id_admin']; 
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$id_prodi      	 = @$_POST['id_prodi'];
$nm_admin           = @$_POST['nm_admin'];
$no_telp      	 = @$_POST['no_telp'];

if (isset($_POST['tambah_admin'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO admin_prodi(nm_admin, no_telp, id_prodi, username, password) VALUES (:nm_admin, :no_telp, :id_prodi, :username, :password)");
		$stmt->bindParam(":nm_admin", $nm_admin);
		$stmt->bindParam(":no_telp", $no_telp);
		$stmt->bindParam(":id_prodi", $id_prodi);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
		echo "<script>location.href='?apps=admin';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_admin'])) {
	try{
		$edit = $db_con->prepare("UPDATE admin_prodi SET nm_admin=:nm_admin, no_telp=:no_telp, id_prodi=:id_prodi WHERE id_admin=:id_admin");
		$edit->bindParam(":id_admin", $id_admin);
		$edit->bindParam(":nm_admin", $nm_admin);
		$edit->bindParam(":no_telp", $no_telp);
		$edit->bindParam(":id_prodi", $id_prodi);
		$edit->execute();
		echo "<script>location.href='?apps=admin';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM admin_prodi WHERE id_admin = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>