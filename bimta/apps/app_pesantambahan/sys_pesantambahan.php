<?php 
$pengirim           = @$_POST['pengirim'];
$comment      	 = @$_POST['comment'];
$id_pesantambahan      	 = @$_POST['id_pesantambahan'];
$status_read      	 = "1";

$pesan           = @$_POST['pesan'];
$dosen_pengirim           = @$_POST['dosen_pengirim'];
$mhs_penerima      	 = @$_POST['mhs_penerima'];
$topik_pesan      	 = @$_POST['topik_pesan'];

if (isset($_POST['kirim_comment'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO comment_tambahan(pengirim, comment, id_pesantambahan) VALUES (:pengirim, :comment, :id_pesantambahan)");
		$stmt->bindParam(":pengirim", $pengirim);
		$stmt->bindParam(":comment", $comment);
		$stmt->bindParam(":id_pesantambahan", $id_pesantambahan);
		$stmt->execute();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['tambah_pesantambahan'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO pesan_tambahan(dosen_pengirim, mhs_penerima, topik_pesan, pesan) VALUES (:dosen_pengirim, :mhs_penerima, :topik_pesan, :pesan)");
		$stmt->bindParam(":dosen_pengirim", $dosen_pengirim);
		$stmt->bindParam(":mhs_penerima", $mhs_penerima);
		$stmt->bindParam(":topik_pesan", $topik_pesan);
		$stmt->bindParam(":pesan", $pesan);
		$stmt->execute();
		echo "<script>location.href='?apps=pesantambahan';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_pesaninti'])) {
	try{
		$edit = $db_con->prepare("UPDATE pesan_tambahan SET dosen_pengirim=:dosen_pengirim, mhs_penerima=:mhs_penerima, topik_pesan=:topik_pesan, pesan=:pesan WHERE id_pesantambahan=:id_pesantambahan");
		$edit->bindParam(":dosen_pengirim", $dosen_pengirim);
		$edit->bindParam(":mhs_penerima", $mhs_penerima);
		$edit->bindParam(":topik_pesan", $topik_pesan);
		$edit->bindParam(":pesan", $pesan);
		$edit->bindParam(":id_pesantambahan", $id_pesantambahan);
		$edit->execute();
		echo "<script>location.href='?apps=pesantambahan';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM comment_tambahan WHERE id_comment = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
	header('location: '.$_SERVER['HTTP_REFERER']);
}
elseif ($view=='viewchat') {
	if ($_SESSION['user_level']=='dosen') {
	$edit = $db_con->prepare("UPDATE comment_tambahan SET status_read=:status_read WHERE pengirim='mahasiswa' && id_pesantambahan = :id");
	$edit->bindParam(":status_read", $status_read);
	$edit->bindParam(":id", $_GET['id']);
	$edit->execute();
	} 
	elseif ($_SESSION['user_level']=='mahasiswa') {
	$edit = $db_con->prepare("UPDATE comment_tambahan SET status_read=:status_read WHERE pengirim='dosen' && id_pesantambahan = :id");
	$edit->bindParam(":status_read", $status_read);
	$edit->bindParam(":id", $_GET['id']);
	$edit->execute();
	} 
}
elseif ($view=='hapuspesaninti') {
	$hapus = $db_con->prepare("DELETE FROM pesan_tambahan WHERE id_pesantambahan = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>