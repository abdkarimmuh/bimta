<?php 
$id_dosen   	 = @$_POST['id_dosen'];
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$nm_dosen           = @$_POST['nm_dosen'];
$no_telp      	 = @$_POST['no_telp'];
$nip_dosen           = @$_POST['nip_dosen'];

if (isset($_POST['edit_dosen'])) {
	try{
		$edit = $db_con->prepare("UPDATE dosen SET nip_dosen=:nip_dosen, nm_dosen=:nm_dosen, no_telp=:no_telp, username=:username, password=:password WHERE id_dosen=:id_dosen");
		$edit->bindParam(":id_dosen", $id_dosen);
		$edit->bindParam(":nip_dosen", $nip_dosen);
		$edit->bindParam(":nm_dosen", $nm_dosen);
		$edit->bindParam(":no_telp", $no_telp);
		$edit->bindParam(":username", $username);
		$edit->bindParam(":password", $password);
		$edit->execute();
		echo "<script>location.href='?apps=dosen2';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

{include 'apps/app_profil/index.php';}

?>