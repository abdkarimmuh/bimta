<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_dosen.php';
switch ($view) {
	
	case 'edit':
		include 'apps/app_dosen2/edit.php';
		break;
	
	
}
}else {include 'apps/app_profil/index.php';}

?>