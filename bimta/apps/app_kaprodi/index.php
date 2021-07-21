<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_kaprodi.php';
switch ($view) {
	case 'add':
		include 'apps/app_kaprodi/add.php';
		break;

	case 'edit':
		include 'apps/app_kaprodi/edit.php';
		break;
	
	case 'hapus':
		include 'apps/app_kaprodi/view.php';
		break;
	
	
}
}else {include 'apps/app_kaprodi/view.php';}

?>