<?php 
$id_jurusan   	 = @$_POST['id_jurusan'];
$jurusan      	 = @$_POST['jurusan'];
$nama_kajur      	 = @$_POST['nama_kajur'];
$username           = @$_POST['username'];
$password      	 = @$_POST['password'];
$nm_admin           = @$_POST['nm_admin'];
$no_telp      	 = @$_POST['no_telp'];

if (isset($_POST['edit_jurusan'])) {
	try{
		$edit = $db_con->prepare("UPDATE jurusan SET jurusan=:jurusan, nama_kajur=:nama_kajur, username=:username, password=:password, nm_admin=:nm_admin, no_telp=:no_telp WHERE id_jurusan=:id_jurusan");
		$edit->bindParam(":id_jurusan", $id_jurusan);
		$edit->bindParam(":jurusan", $jurusan);
		$edit->bindParam(":nama_kajur", $nama_kajur);
		$edit->bindParam(":username", $username);
		$edit->bindParam(":password", $password);
		$edit->bindParam(":nm_admin", $nm_admin);
		$edit->bindParam(":no_telp", $no_telp);
		$edit->execute();
		echo "<script>location.href='?apps=jurusan';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

{include 'apps/app_profil/index.php';}

?>