<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_admin.php';
switch ($view) {
	
	case 'edit':
		include 'apps/app_admin2/edit.php';
		break;
	
	
}
}else {include 'apps/app_profil/index.php';}

?>