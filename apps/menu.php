<?php if ($_SESSION['user_level']=='admin') { ?>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section1">
				<h5>PROFIL</h5>
			</div>
			<div class="panel-collapse collapse in" id="section1">
				<div class="panel-body">
					<a href="?apps=profil"><span class="fa fa-user"></span> Lihat Profil</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section2">
				<h5>MASTER DATA</h5>
			</div>
			<div class="panel-collapse collapse in" id="section2">
				<div class="panel-body">
					<a href="?apps=kaprodi"><span class="fa fa-user-plus"></span> Data Kepala Prodi</a>
				</div>
				<div class="panel-body">
					<a href="?apps=mahasiswa"><span class="fa fa-user-plus"></span> Data Mahasiswa</a>
				</div>
				<div class="panel-body">
					<a href="?apps=dosen"><span class="fa fa-group"></span> Data Dosen</a>
				</div>
				<div class="panel-body">
					<a href="?apps=prodi"><span class="fa fa-institution"></span> Data Program Studi (Prodi)</a>
				</div>
				<div class="panel-body">
					<a href="?apps=admin"><span class="fa fa-user-plus"></span> Data Admin Prodi</a>
				</div>
			</div>
		</div>
	</div>
<?php } elseif ($_SESSION['user_level']=='mahasiswa') { ?>
<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section1">
				<h5>PROFIL</h5>
			</div>
			<div class="panel-collapse collapse in" id="section1">
				<div class="panel-body">
					<a href="?apps=ubahmhs"><span class="fa fa-user"></span> Profil Mahasiswa</a>
				</div>
				<div class="panel-body">
					<a href="?apps=ubahpassword"><span class="fa fa-key"></span> Ubah Password</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section2">
				<h5>PENGAJUAN JUDUL</h5>
			</div>
			<div class="panel-collapse collapse in" id="section2">
				<div class="panel-body">
					<a href="?apps=judulta"><span class="fa fa-pencil"></span> Ajukan Judul Tugas Akhir </a>
				</div>
			</div>
		</div>
	</div>
	<?php							
	    $stmt = $db_con->prepare("SELECT * FROM judul_ta where nim='$_SESSION[user_session]' && judul_kaprodi IS NOT NULL");
		$stmt->execute();
		if($check = $stmt->fetchColumn()){
	?>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section3">
				<h5>BIMBINGAN TUGAS AKHIR</h5>
			</div>
			<div class="panel-collapse collapse in" id="section3">
				<div class="panel-body">
					<a href="?apps=materi"><span class="fa fa-plus-square"></span> Ajukan Materi Bimbingan</a>
				</div>
				<div class="panel-body">
					<a href="?apps=pesan"><span class="fa fa-envelope"></span> Pesan Terkait Bimbingan</a>
				</div>
				<div class="panel-body">
					<a href="?apps=filemahasiswa"><span class="fa fa-file"></span> File Terkait Bimbingan</a>
				</div>
				<div class="panel-body">
					<a href="?apps=pesantambahan"><span class="fa fa-comment"></span> Pesan Tambahan dari Dosen</a>
				</div>
				<?php
					$stmt2 = $db_con->prepare("SELECT * FROM evaluasi where nim_mhs ='$_SESSION[user_session]'");
					$stmt2->execute();
					$check=$stmt2->rowCount(); 
					if($check == 1) {
				?>
				<div class="panel-body">
					<a href="?apps=evaluasi"><span class="fa fa-graduation-cap"></span> Evaluasi Bimbingan Mahasiswa</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div><?php } ?>


<?php } elseif ($_SESSION['user_level']=='dosen') { ?>
<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section1">
				<h5>PROFIL</h5>
			</div>
			<div class="panel-collapse collapse in" id="section1">
				<div class="panel-body">
					<a href="?apps=profil"><span class="fa fa-user"></span> Lihat Profil</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section2">
				<h5>DATA MAHASISWA</h5>
			</div>
			<div class="panel-collapse collapse in" id="section2">
				<div class="panel-body">
					<a href="?apps=judulta"><span class="fa fa-graduation-cap"></span> Mahasiswa Bimbingan</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section3">
				<h5>BIMBINGAN</h5>
			</div>
			<div class="panel-collapse collapse in" id="section3">
				<div class="panel-body">
					<a href="?apps=materi"><span class="fa fa-book"></span> Materi Bimbingan Mahasiswa</a>
				</div>
				<div class="panel-body">
					<a href="?apps=pesan"><span class="fa fa-envelope"></span> Pesan Terkait Bimbingan</a>
				</div>
				<div class="panel-body">
					<a href="?apps=filemahasiswa"><span class="fa fa-file"></span> File Mahasiswa Terkait Bimbingan</a>
				</div>
				<div class="panel-body">
					<a href="?apps=pesantambahan"><span class="fa fa-comment"></span> Pesan Tambahan dari Dosen</a>
				</div>
			</div>
		</div>
	</div>
<?php } elseif ($_SESSION['user_level']=='kaprodi') { ?>
<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section1">
				<h5>PROFIL</h5>
			</div>
			<div class="panel-collapse collapse in" id="section1">
				<div class="panel-body">
					<a href="?apps=profil"><span class="fa fa-user"></span> Lihat Profil</a>
				</div>
				
			</div>
		</div>
	</div>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section2">
				<h5>DATA MAHASISWA</h5>
			</div>
			<div class="panel-collapse collapse in" id="section2">
				<div class="panel-body">
					<a href="?apps=judulta"><span class="fa fa-book"></span> Data Pengajuan Judul TA</a>
				</div>
				<div class="panel-body">
					<a href="?apps=mahasiswa"><span class="fa fa-graduation-cap"></span> Data Evaluasi Mahasiswa</a>
				</div>
			</div>
		</div>
	</div>
<?php } elseif ($_SESSION['user_level']=='jurusan') { ?>
<!-- <div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section1">
				<h5>PROFIL</h5>
			</div>
			<div class="panel-collapse collapse in" id="section1">
				<div class="panel-body">
					<a href="?apps=profil"><span class="fa fa-user"></span> Lihat Profil </a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-group" id="accordion">	
		<div class="panel panel-primary">
			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#section2">
				<h5>MASTER DATA</h5>
			</div>
			<div class="panel-collapse collapse in" id="section2">
				<div class="panel-body">
					<a href="?apps=prodi"><span class="fa fa-institution"></span> Data Program Studi (Prodi)</a>
				</div>
				<div class="panel-body">
					<a href="?apps=admin"><span class="fa fa-user-plus"></span> Data Admin Prodi</a>
				</div>
				<div class="panel-body">
					<a href="?apps=dosen"><span class="fa fa-user-plus"></span> Data Dosen</a>
				</div>
				
								
			</div>
		</div>
	</div> -->
<?php } ?>