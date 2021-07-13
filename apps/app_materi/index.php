<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_materi.php';
switch ($view) {
	case 'add':
		include 'apps/app_materi/add.php';
		break;

	case 'edit':
		include 'apps/app_materi/edit.php';
		break;
	
	
	
}
}else {	if ($_SESSION['user_level']=='mahasiswa') {include 'apps/app_materi/view.php';} elseif ($_SESSION['user_level']=='dosen') {include 'apps/app_materi/dosenview.php';}
}

?>