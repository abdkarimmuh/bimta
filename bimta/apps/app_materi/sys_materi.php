<?php 
$id_subject   	 = @$_POST['id_subject']; 
$subject           = @$_POST['subject'];
$nim      	 = @$_POST['nim'];
$status_bimbingan      	 = @$_POST['status_bimbingan'];
$tgl           = @$_POST['tgl'];

if (isset($_POST['tambah_materi'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO subject(subject, nim, status_bimbingan) VALUES (:subject, :nim, :status_bimbingan)");
		$stmt->bindParam(":subject", $subject);
		$stmt->bindParam(":nim", $nim);
		$stmt->bindParam(":status_bimbingan", $status_bimbingan);
		$stmt->execute();
		echo "<script>location.href='?apps=materi';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_materi'])) {
	try{
		$edit = $db_con->prepare("UPDATE subject SET subject=:subject, nim=:nim, status_bimbingan=:status_bimbingan WHERE id_subject=:id_subject");
		$edit->bindParam(":id_subject", $id_subject);
		$edit->bindParam(":subject", $subject);
		$edit->bindParam(":nim", $nim);
		$edit->bindParam(":status_bimbingan", $status_bimbingan);
		$edit->execute();
		echo "<script>location.href='?apps=materi';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

?>