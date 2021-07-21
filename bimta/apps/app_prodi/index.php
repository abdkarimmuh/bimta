<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_prodi.php';
switch ($view) {
	case 'add':
		include 'apps/app_prodi/add.php';
		break;

	case 'edit':
		include 'apps/app_prodi/edit.php';
		break;
	
	case 'hapus':
		include 'apps/app_prodi/view.php';
		break;
	
	
}
}else {include 'apps/app_prodi/view.php';}

?>