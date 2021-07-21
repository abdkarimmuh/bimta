<?php 
$id_admin   	 = @$_POST['id_admin'];
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$nm_admin           = @$_POST['nm_admin'];
$no_telp      	 = @$_POST['no_telp'];

if (isset($_POST['edit_admin'])) {
	try{
		$edit = $db_con->prepare("UPDATE admin_prodi SET nm_admin=:nm_admin, no_telp=:no_telp, username=:username, password=:password WHERE id_admin=:id_admin");
		$edit->bindParam(":id_admin", $id_admin);
		$edit->bindParam(":nm_admin", $nm_admin);
		$edit->bindParam(":no_telp", $no_telp);
		$edit->bindParam(":username", $username);
		$edit->bindParam(":password", $password);
		$edit->execute();
		echo "<script>location.href='?apps=admin2';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

{include 'apps/app_profil/index.php';}

?>