<?php 
$nim   	 = @$_POST['nim'];
$password      	 = @$_POST['password'];
$password2		 = @$_POST['password2'];
$username      	 = @$_POST['username'];

if ($password !== $password2) {
	echo "Oops, pastikan password yang anda masukan sama!";
	return false;
  }

if (isset($_POST['edit_password'])) {
	try{
		$edit = $db_con->prepare("UPDATE mahasiswa SET username=:username ,password=:password WHERE nim=:nim");
		$edit->bindParam(":nim", $nim);
		$edit->bindParam(":username", $username);
		$edit->bindParam(":password", $password);
		$edit->execute();
		echo "<script>location.href='?apps=ubahpassword';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
else {include 'apps/app_ubahpassword/view.php';}

?>