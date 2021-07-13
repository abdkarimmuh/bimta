<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_judulta.php';
switch ($view) {
	case 'add':
		include 'apps/app_judulta/add.php';
		break;

	case 'edit':
		include 'apps/app_judulta/edit.php';
		break;
	
	case 'hapus':
		include 'apps/app_judulta/view.php';
		break;

	case 'pilihjudul':
		include 'apps/app_judulta/pilihjudul.php';
		break;

	case 'verifikasi':
		include 'apps/app_judulta/verifikasi.php';
		break;
	
}
}else {
	if ($_SESSION['user_level']=='mahasiswa') {include 'apps/app_judulta/view.php';} elseif ($_SESSION['user_level']=='kaprodi') {include 'apps/app_judulta/kaprodiview.php';} elseif ($_SESSION['user_level']=='dosen') {include 'apps/app_judulta/dosenview.php';}
}

?>