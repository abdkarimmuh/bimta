<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_ubahpassword.php';
switch ($view) {
	
	case 'edit':
		include 'apps/app_ubahpassword/edit.php';
		break;
	
	
}
}else {include 'apps/app_ubahpassword/view.php';}

?>