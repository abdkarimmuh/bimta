<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_mahasiswa.php';
switch ($view) {
	case 'add':
		include 'apps/app_mahasiswa/add.php';
		break;

	case 'edit':
		include 'apps/app_mahasiswa/edit.php';
		break;
	
	case 'hapus':
		include 'apps/app_mahasiswa/view.php';
		break;
	
	
}
}else {
	if ($_SESSION['user_level']=='admin') {include 'apps/app_mahasiswa/view.php';} elseif ($_SESSION['user_level']=='kaprodi') {include 'apps/app_mahasiswa/kaprodiview.php';}
}
?>