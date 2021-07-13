<link rel="shoutcut icon" href="logo.png">
<?php
	session_start();
	if(!isset($_SESSION['user_session'])){
		header("location: index.php");
	}

	include_once 'dbconfig.php';
	$stmt = $db_con->prepare("SELECT * FROM dosen WHERE id_dosen=:uid");
	$stmt->execute(array(":uid"=>$_SESSION['user_session']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

	$stmt2 = $db_con->prepare("SELECT * FROM mahasiswa WHERE nim=:uid");
	$stmt2->execute(array(":uid"=>$_SESSION['user_session']));
	$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

	$stmt3 = $db_con->prepare("SELECT * FROM admin_prodi WHERE id_admin=:uid");
	$stmt3->execute(array(":uid"=>$_SESSION['user_session']));
	$row3=$stmt3->fetch(PDO::FETCH_ASSOC);

	$stmt4 = $db_con->prepare("SELECT * FROM kaprodi WHERE id_kaprodi=:uid");
	$stmt4->execute(array(":uid"=>$_SESSION['user_session']));
	$row4=$stmt4->fetch(PDO::FETCH_ASSOC);

	$stmt5 = $db_con->prepare("SELECT * FROM jurusan WHERE id_jurusan=:uid");
	$stmt5->execute(array(":uid"=>$_SESSION['user_session']));
	$row5=$stmt5->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if ($_SESSION['user_level']=='dosen') {echo "Dosen Pembimbing";} elseif ($_SESSION['user_level']=='mahasiswa') {echo "Mahasiswa";} elseif ($_SESSION['user_level']=='admin') {echo "Administrator";} elseif ($_SESSION['user_level']=='kaprodi') {echo "Kepala Prodi";} elseif ($_SESSION['user_level']=='jurusan') {echo "Jurusan";} ?></title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/font-awesome.css" rel="stylesheet">
	<link href="assets/css/datatables.min.css" rel="stylesheet">
    <style type="text/css">
<!--
.style3 {color: #000000}
.style4 {font-size: 16px}
-->
    </style>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
      	<div class="container">
          <div class="navbar-header">

		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="	#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>		        </button>

	          <a class="navbar-brand" href="./"><b>Portal Bimbingan Tugas Akhir</b><span class="style4"></span></a>	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
		        <ul class="nav navbar-nav"></ul>
		        <ul class="nav navbar-nav navbar-right">
			        <?php if ($_SESSION['user_level']=='mahasiswa') {
			        echo "<li><a download href=petunjuk/mahasiswa.pdf><span class=\"fa fa-download\"></span> Unduh Petunjuk Penggunaan Portal</a></li>";
			        }
					elseif ($_SESSION['user_level']=='dosen') {
			        echo "<li><a download href=petunjuk/dosen.pdf><span class=\"fa fa-download\"></span> Unduh Petunjuk Penggunaan Portal</a></li>";
			        }
					elseif ($_SESSION['user_level']=='kaprodi') {
			        echo "<li><a download href=petunjuk/kaprodi.pdf><span class=\"fa fa-download\"></span> Unduh Petunjuk Penggunaan Portal</a></li>";
			        }
					 ?>
			        <li><a href="logout.php"><span class="fa fa-sign-out"></span> Keluar</a></li>
		        </ul>
	        </div><!--/.nav-collapse -->
      	</div>
    </nav>

<div class="body-container">
		<div class="container">
	      <div class='alert alert-success'>
				<!--/ <button class='close' data-dismiss='alert'>&times;</button>  membuat tombol close-->
				<marquee>
				<strong>HALO ' <?php if ($_SESSION['user_level']=='dosen') {echo $row['nm_dosen'];} elseif ($_SESSION['user_level']=='mahasiswa') {echo $row2['nm_mhs'];} elseif ($_SESSION['user_level']=='admin') {echo $row3['nm_admin'];} elseif ($_SESSION['user_level']=='kaprodi') {echo $row4['nm_kaprodi'];} elseif ($_SESSION['user_level']=='jurusan') {echo $row5['nm_admin'];} ?></strong> | Selamat datang di halaman <?php if ($_SESSION['user_level']=='dosen') {echo "dosen pembimbing tugas akhir";} elseif ($_SESSION['user_level']=='mahasiswa') {echo "mahasiswa";} elseif ($_SESSION['user_level']=='admin') {echo "administrator prodi";} elseif ($_SESSION['user_level']=='kaprodi') {echo "kepala prodi";} elseif ($_SESSION['user_level']=='jurusan') {echo "Jurusan";} ?>
				</marquee>
	      </div>

	      <div class="row">
		    	<div class="col-md-3">
		    		<?php include 'apps/menu.php'; ?>
		    	</div>

		    	<div class="col-md-9">
		    		<?php include 'apps/content.php'; ?>
		    	</div>
	      </div>
		</div>

		</form>

			<center>
			  <p>&nbsp;</p>
			  <p><small style="color: #fff"><span class="style3" style="font-weight: bold;">SINTA - Politeknik Negeri Jakarta &copy; <?php echo date('Y');?></span><br>
		            <strong><span class="style3"><span class="style3">Jl. Prof. DR. G.A. Siwabessy, Kukusan, Kota Depok, Jawa Barat 16424<br>
		            Developed by : Developer Indonesia
		        </span></strong></small> </p>
			</center>
</div>
  </div>


<strong>
	  <script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
	  <script src="assets/js/datatables.min.js"></script>
	  <script src="assets/js/bootstrap.min.js"></script>
	  <script src="assets/js/validation.min.js"></script>
<script src="assets/js/script.js"></script>
            </strong>
</body>
</html>
