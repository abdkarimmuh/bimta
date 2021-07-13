<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_pesan.php';
switch ($view) {
	case 'add':
		include 'apps/app_pesan/add.php';
		break;

	case 'editpesaninti':
		include 'apps/app_pesan/editpesaninti.php';
		break;

	case 'hapuspesaninti':
		include 'apps/app_pesan/view.php';
		break;

	case 'viewchat':
		if ($_SESSION['user_level']=='mahasiswa') {
		include 'apps/app_pesan/viewchat.php'; }
		else {include 'apps/app_pesan/dosenviewchat.php';}
		break;
		
}
}else {	if ($_SESSION['user_level']=='mahasiswa') {include 'apps/app_pesan/view.php';} elseif ($_SESSION['user_level']=='dosen') {include 'apps/app_pesan/dosenview.php';}
}

?>