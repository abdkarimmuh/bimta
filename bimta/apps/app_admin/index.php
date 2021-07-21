<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_admin.php';
switch ($view) {
	case 'add':
		include 'apps/app_admin/add.php';
		break;

	case 'edit':
		include 'apps/app_admin/edit.php';
		break;
	
	case 'hapus':
		include 'apps/app_admin/view.php';
		break;
	
	
}
}else {include 'apps/app_admin/view.php';}

?>