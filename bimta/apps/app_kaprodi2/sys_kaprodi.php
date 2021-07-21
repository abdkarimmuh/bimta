<?php 
$id_kaprodi   	 = @$_POST['id_kaprodi'];
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$nm_kaprodi           = @$_POST['nm_kaprodi'];
$no_telp      	 = @$_POST['no_telp'];
$nip_kaprodi      	 = @$_POST['nip_kaprodi'];

if (isset($_POST['edit_kaprodi'])) {
	try{
		$edit = $db_con->prepare("UPDATE kaprodi SET nm_kaprodi=:nm_kaprodi, nip_kaprodi=:nip_kaprodi, no_telp=:no_telp, username=:username, password=:password WHERE id_kaprodi=:id_kaprodi");
		$edit->bindParam(":id_kaprodi", $id_kaprodi);
		$edit->bindParam(":nm_kaprodi", $nm_kaprodi);
		$edit->bindParam(":nip_kaprodi", $nip_kaprodi);
		$edit->bindParam(":no_telp", $no_telp);
		$edit->bindParam(":username", $username);
		$edit->bindParam(":password", $password);
		$edit->execute();
		echo "<script>location.href='?apps=kaprodi2';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

{include 'apps/app_profil/index.php';}

?>