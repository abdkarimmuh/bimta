<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_dosen.php';
switch ($view) {
	case 'add':
		include 'apps/app_dosen/add.php';
		break;

	case 'edit':
		include 'apps/app_dosen/edit.php';
		break;
	
	case 'hapus':
		include 'apps/app_dosen/view.php';
		break;
	
	
}
}else {
	if ($_SESSION['user_level']=='jurusan') {include 'apps/app_dosen/view.php';} elseif ($_SESSION['user_level']=='admin') {include 'apps/app_dosen/adminview.php';}
}

?>