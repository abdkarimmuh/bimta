<?php 
if (isset($_GET['act'])){
$view = $_GET['act'];

require_once 'sys_evaluasi.php';
switch ($view) {
	case 'evaluasimhs':
		include 'apps/app_evaluasi/evaluasimhs.php';
		break;
 	case 'editevaluasi':
		include 'apps/app_evaluasi/editevaluasi.php';
		break;
	case 'lihatevaluasidosen':
		include 'apps/app_evaluasi/dosenview.php';
		break;
	case 'lihatevaluasi':
		include 'apps/app_evaluasi/lihatevaluasi.php';
		break;
} }

elseif ($_SESSION['user_level']=='mahasiswa') {
	include 'apps/app_evaluasi/mhsview.php'; } 

?>