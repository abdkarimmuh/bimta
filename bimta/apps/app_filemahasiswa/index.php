<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_filemahasiswa.php';
switch ($view) {
	case 'add':
		include 'apps/app_filemahasiswa/add.php';
		break;

	case 'hapus':
		include 'apps/app_filemahasiswa/view.php';
		break;
	
	
}
}else {if ($_SESSION['user_level']=='mahasiswa') {include 'apps/app_filemahasiswa/view.php';} elseif ($_SESSION['user_level']=='dosen') {include 'apps/app_filemahasiswa/dosenview.php';}
}

?>