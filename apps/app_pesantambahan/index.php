<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_pesantambahan.php';
switch ($view) {
	case 'add':
		include 'apps/app_pesantambahan/add.php';
		break;

	case 'editpesaninti':
		include 'apps/app_pesantambahan/editpesaninti.php';
		break;

	case 'hapuspesaninti':
		include 'apps/app_pesantambahan/dosenview.php';
		break;

	case 'viewchat':
		if ($_SESSION['user_level']=='mahasiswa') {
		include 'apps/app_pesantambahan/viewchat.php'; }
		else {include 'apps/app_pesantambahan/dosenviewchat.php';}
		break;
		
}
}else {	if ($_SESSION['user_level']=='mahasiswa') {include 'apps/app_pesantambahan/view.php';} elseif ($_SESSION['user_level']=='dosen') {include 'apps/app_pesantambahan/dosenview.php';}
}

?>