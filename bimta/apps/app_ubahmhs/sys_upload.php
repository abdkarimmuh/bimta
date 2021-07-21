<?php 

if (isset($_POST['edit_foto'])) {
	try{
		$imagename= basename($_FILES['foto']['name']);
		$image=str_replace(' ','-',$imagename);
		$path="apps/app_ubahmhs/user_images/" . $image;
		move_uploaded_file($_FILES['foto']['tmp_name'], $path);
		$edit = $db_con->prepare("UPDATE mahasiswa SET foto=:foto WHERE nim=:nim");
		$edit->bindParam(":nim", $_POST['nim']);
		$edit->bindParam(":foto", $image);
		$edit->execute();
		echo "<script>location.href='?apps=ubahmhs';</script>"; 
		exit();
	} 
		catch (PDOException $e) {
		echo $e->getMessage();
			}
	}
		else {'location=apps/app_ubahmhs/view.php'; }
	
?>
