<?php 
$pengirim           = @$_POST['pengirim'];
$comment      	 = @$_POST['comment'];
$id_chatmhs      	 = @$_POST['id_chatmhs'];
$status_read      	 = "1";

$pesan           = @$_POST['pesan'];
$id_subject      	 = @$_POST['id_subject'];
$dosen_penerima           = @$_POST['dosen_penerima'];
$mhs_pengirim      	 = @$_POST['mhs_pengirim'];
$topik_pesan      	 = @$_POST['topik_pesan'];

if (isset($_POST['kirim_comment'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO comment_bimbingan(pengirim, comment, id_chatmhs) VALUES (:pengirim, :comment, :id_chatmhs)");
		$stmt->bindParam(":pengirim", $pengirim);
		$stmt->bindParam(":comment", $comment);
		$stmt->bindParam(":id_chatmhs", $id_chatmhs);
		$stmt->execute();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['tambah_chatmhs'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO chat_mhs(dosen_penerima, mhs_pengirim, id_subject, topik_pesan, pesan) VALUES (:dosen_penerima, :mhs_pengirim, :id_subject, :topik_pesan, :pesan)");
		$stmt->bindParam(":dosen_penerima", $dosen_penerima);
		$stmt->bindParam(":mhs_pengirim", $mhs_pengirim);
		$stmt->bindParam(":id_subject", $id_subject);
		$stmt->bindParam(":topik_pesan", $topik_pesan);
		$stmt->bindParam(":pesan", $pesan);
		$stmt->execute();
		echo "<script>location.href='?apps=pesan';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_pesaninti'])) {
	try{
		$edit = $db_con->prepare("UPDATE chat_mhs SET dosen_penerima=:dosen_penerima, mhs_pengirim=:mhs_pengirim, id_subject=:id_subject, topik_pesan=:topik_pesan, pesan=:pesan WHERE id_chatmhs=:id_chatmhs");
		$edit->bindParam(":dosen_penerima", $dosen_penerima);
		$edit->bindParam(":mhs_pengirim", $mhs_pengirim);
		$edit->bindParam(":id_subject", $id_subject);
		$edit->bindParam(":topik_pesan", $topik_pesan);
		$edit->bindParam(":pesan", $pesan);
		$edit->bindParam(":id_chatmhs", $id_chatmhs);
		$edit->execute();
		echo "<script>location.href='?apps=pesan';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM comment_bimbingan WHERE id_comment = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
	header('location: '.$_SERVER['HTTP_REFERER']);
}
elseif ($view=='viewchat') {
	if ($_SESSION['user_level']=='dosen') {
	$edit = $db_con->prepare("UPDATE comment_bimbingan SET status_read=:status_read WHERE pengirim='mahasiswa' && id_chatmhs = :id");
	$edit->bindParam(":status_read", $status_read);
	$edit->bindParam(":id", $_GET['id']);
	$edit->execute();
	} 
	elseif ($_SESSION['user_level']=='mahasiswa') {
	$edit = $db_con->prepare("UPDATE comment_bimbingan SET status_read=:status_read WHERE pengirim='dosen' && id_chatmhs = :id");
	$edit->bindParam(":status_read", $status_read);
	$edit->bindParam(":id", $_GET['id']);
	$edit->execute();
	} 
}
elseif ($view=='hapuspesaninti') {
	$hapus = $db_con->prepare("DELETE FROM chat_mhs WHERE id_chatmhs = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>