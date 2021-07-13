<?php 
$id_evaluasi      	 = @$_POST['id_evaluasi'];
$nim_mhs           = @$_POST['nim_mhs'];
$status_bimbingan      	 = @$_POST['status_bimbingan'];
$evaluasi_judul      	 = @$_POST['evaluasi_judul'];
$evaluasi_pendahuluan      	 = @$_POST['evaluasi_pendahuluan'];
$evaluasi_pustaka      	 = @$_POST['evaluasi_pustaka'];
$evaluasi_metodologi      	 = @$_POST['evaluasi_metodologi'];
$evaluasi_pembahasan      	 = @$_POST['evaluasi_pembahasan'];
$evaluasi_kesimpulan      	 = @$_POST['evaluasi_kesimpulan'];

$id = $_GET['id'];
$get_data = $db_con->query("SELECT * FROM mahasiswa, evaluasi WHERE mahasiswa.nim='$id' && evaluasi.nim_mhs='$id'");
$row = $get_data->fetch(PDO::FETCH_ASSOC);
$nama = $row['nm_mhs'];


if (isset($_POST['tambah_evaluasi'])) {
	try {
		$stmt = $db_con->prepare("INSERT INTO evaluasi(nim_mhs, status_bimbingan, evaluasi_judul, evaluasi_pendahuluan, evaluasi_pustaka, evaluasi_metodologi, evaluasi_pembahasan, evaluasi_kesimpulan) VALUES (:nim_mhs, :status_bimbingan, :evaluasi_judul, :evaluasi_pendahuluan, :evaluasi_pustaka, :evaluasi_metodologi, :evaluasi_pembahasan, :evaluasi_kesimpulan)");
		$stmt->bindParam(":nim_mhs", $nim_mhs);
		$stmt->bindParam(":status_bimbingan", $status_bimbingan);
		$stmt->bindParam(":evaluasi_judul", $evaluasi_judul);
		$stmt->bindParam(":evaluasi_pendahuluan", $evaluasi_pendahuluan);
		$stmt->bindParam(":evaluasi_pustaka", $evaluasi_pustaka);
		$stmt->bindParam(":evaluasi_metodologi", $evaluasi_metodologi);
		$stmt->bindParam(":evaluasi_pembahasan", $evaluasi_pembahasan);
		$stmt->bindParam(":evaluasi_kesimpulan", $evaluasi_kesimpulan);
		$stmt->execute();
		echo "<script>alert('Anda berhasil mengevaluasi mahasiswa')</script>";
		echo "<script>location.href='?apps=judulta';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
elseif (isset($_POST['edit_evaluasi'])) {
	try{
		$edit = $db_con->prepare("UPDATE evaluasi SET nim_mhs=:nim_mhs, status_bimbingan=:status_bimbingan, evaluasi_judul=:evaluasi_judul, evaluasi_pendahuluan=:evaluasi_pendahuluan, evaluasi_pustaka=:evaluasi_pustaka, evaluasi_metodologi=:evaluasi_metodologi, evaluasi_pembahasan=:evaluasi_pembahasan, evaluasi_kesimpulan=:evaluasi_kesimpulan WHERE id_evaluasi=:id_evaluasi");
		$edit->bindParam(":id_evaluasi", $id_evaluasi);
		$edit->bindParam(":nim_mhs", $nim_mhs);
		$edit->bindParam(":status_bimbingan", $status_bimbingan);
		$edit->bindParam(":evaluasi_judul", $evaluasi_judul);
		$edit->bindParam(":evaluasi_pendahuluan", $evaluasi_pendahuluan);
		$edit->bindParam(":evaluasi_pustaka", $evaluasi_pustaka);
		$edit->bindParam(":evaluasi_metodologi", $evaluasi_metodologi);
		$edit->bindParam(":evaluasi_pembahasan", $evaluasi_pembahasan);
		$edit->bindParam(":evaluasi_kesimpulan", $evaluasi_kesimpulan);
		$edit->execute();
		echo "<script>alert('Anda berhasil mengubah data evaluasi mahasiswa : $nama')</script>";		
		echo "<script>location.href='?apps=judulta';</script>"; 
		exit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
?>