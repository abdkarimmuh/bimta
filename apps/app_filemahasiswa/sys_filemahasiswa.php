<?php 
include_once 'dbconfig.php';
$id_file   	 = @$_POST['id_file']; 

if (isset($_POST['btn-filemahasiswa'])) {
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="filemahasiswa/";
	$mhs_pengirim    = $_POST['mhs_pengirim']; 
	$id_subject    = $_POST['id_subject'];
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file)){
	try {
		$stmt = $db_con->prepare("INSERT INTO file_mahasiswa(file, type, size, mhs_pengirim, id_subject) VALUES (:final_file, :file_type, :new_size, :mhs_pengirim, :id_subject)");
		$stmt->bindParam(":final_file", $final_file);
		$stmt->bindParam(":file_type", $file_type);
		$stmt->bindParam(":new_size", $new_size);
		$stmt->bindParam(":mhs_pengirim", $mhs_pengirim);
		$stmt->bindParam(":id_subject", $id_subject);
		$stmt->execute();
		echo "<script>location.href='?apps=filemahasiswa';</script>"; 
		exit();
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}} else {echo "<script>location.href='?apps=filemahasiswa';</script>"; }
}

elseif ($view=='hapus') {
	$hapus = $db_con->prepare("DELETE FROM file_mahasiswa WHERE id_file = :id");
	$hapus->bindParam(":id", $_GET['id']);
	$hapus->execute();
}
?>