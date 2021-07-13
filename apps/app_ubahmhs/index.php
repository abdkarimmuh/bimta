<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_upload.php';
switch ($view) {
	case 'edit':
		include 'apps/app_ubahmhs/editform.php';
		break;

	
}}else {include 'apps/app_ubahmhs/view.php';}


?>

