<?php
require_once 'dbconfig.php';
if (empty($_GET['apps'])) { ?>
<style type="text/css">
<!--
.style1 {font-family: Broadway}
-->
</style>

	<div class="panel panel-default">
		<div class="panel-body">
			<center>
				<h2 class="style1">Selamat Datang di Halaman <?php if ($_SESSION['user_level']=='dosen') {echo "Dosen Pembimbing";} elseif ($_SESSION['user_level']=='mahasiswa') {echo "Mahasiswa";} elseif ($_SESSION['user_level']=='admin') {echo "Administrator Prodi";} elseif ($_SESSION['user_level']=='kaprodi') {echo "Kepala Prodi";} elseif ($_SESSION['user_level']=='jurusan') {echo "Jurusan";} ?></h2>
				<br>
				<span class="office">
					<h2>Sistem Informasi Tugas Akhir</h2>
				</span>
			</center>
		</div>
	</div>
<?php
} elseif ($_GET['apps']=='jurusan') {
	include 'app_jurusan/index.php';
} elseif ($_GET['apps']=='materi') {
	include 'app_materi/index.php';
} elseif ($_GET['apps']=='filemahasiswa') {
	include 'app_filemahasiswa/index.php';
} elseif ($_GET['apps']=='profilmahasiswa') {
	include 'app_profilmahasiswa/index.php';
} elseif ($_GET['apps']=='judulta') {
	include 'app_judulta/index.php';
} elseif ($_GET['apps']=='mahasiswa') {
	include 'app_mahasiswa/index.php';
} elseif ($_GET['apps']=='admin2') {
	include 'app_admin2/index.php';
} elseif ($_GET['apps']=='dosen2') {
	include 'app_dosen2/index.php';
} elseif ($_GET['apps']=='kaprodi2') {
	include 'app_kaprodi2/index.php';
} elseif ($_GET['apps']=='dosen') {
	include 'app_dosen/index.php';
} elseif ($_GET['apps']=='admin') {
	include 'app_admin/index.php';
} elseif ($_GET['apps']=='profil') {
	include 'app_profil/index.php';
} elseif ($_GET['apps']=='ubahmhs') {
	include 'app_ubahmhs/index.php';
} elseif ($_GET['apps']=='kaprodi') {
	include 'app_kaprodi/index.php';
} elseif ($_GET['apps']=='prodi') {
	include 'app_prodi/index.php';
} elseif ($_GET['apps']=='ubahpassword') {
	include 'app_ubahpassword/index.php';
} elseif ($_GET['apps']=='laporan') {
	include 'app_laporan/index.php';
} elseif ($_GET['apps']=='pesan') {
	include 'app_pesan/index.php';
} elseif ($_GET['apps']=='pesantambahan') {
	include 'app_pesantambahan/index.php';
} elseif ($_GET['apps']=='evaluasi') {
	include 'app_evaluasi/index.php';
} ?>
