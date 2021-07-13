<link rel="shoutcut icon" href="logo.png">
<?php include("sys_jurusan.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register Jurusan Polmed</title>

	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.css" rel="stylesheet"> 	
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="special-page">	
	<div class="signin-form">
		<div class="container">
			<form class="" method="post" autocomplete="off">
				<div class="form-signin panel panel-default">
					<div class="panel-body">
						<center>
					  <legend>Register Jurusan Portal Bimbingan Tugas Akhir</br>Politeknik Negeri Medan</legend>
					</center>			
							<div id="error"></div>
							
							<div class="form-group">
						<select name="jurusan" id="inputLevel" class="form-control" required="required">
						  <option value="">-- Pilih Jurusan --</option>
						  <option value="Teknik Komputer dan Informatika">Teknik Komputer dan Informatika</option>
						  <option value="Teknik Elektro">Teknik Elektro</option>
						  <option value="Teknik Mesin">Teknik Mesin</option>
						  <option value="Teknik Sipil">Teknik Sipil</option>
						  <option value="Akuntansi">Akuntansi</option>
						  <option value="Administrasi Niaga">Administrasi Niaga</option>
						</select>
				</div>
				
				<div class="form-group">
						<input type="text" name="nama_kajur" id="input" placeholder="Nama Ketua Jurusan" class="form-control" value="" required="required">
				</div>

				<div class="form-group">
						<input type="text" name="nm_admin" id="input" placeholder="Nama Admin Jurusan" class="form-control" value="" required="required">
				</div>
				
				<div class="form-group">
						<input type="text" name="no_telp" id="input" placeholder="No Telp Jurusan/No HP Admin" class="form-control" value="" required="required">
				</div>

				<div class="form-group">
						<input type="text" name="username" id="input" placeholder="Username max 8 karakter" class="form-control" value="" required="required">
				</div>
				
				<div class="form-group">
						<input type="password" name="password" id="input" placeholder="Password max 8 karakter" class="form-control" value="" required="required">
				</div>
							
								
					</div>
					<div class="panel-footer">
					<div class="row">						
							<div class="col-sm-2">
								<button type="submit" class="btn btn-default" name="tambah_jurusan" >
									<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register
								</button>
							</div>
					</div>							
					</div>
				</div>
			</form>

			<center>
			  <p>&nbsp;</p>
			  <p><small style="color: #fff"><span class="style3" style="font-weight: bold;">Bimbingan Tugas Akhir Politeknik Negeri Medan &copy; 2018</span><br>
		            <strong><span class="style3"><span class="style3">Jl. Almamater No. 3 Kampus USU, Padang Bulan. Medan<br> 
		            CP : Mellina Sudirman |
			            No. HP : 0822 7436 9581| 
              Email: polmed.ac.id				    </span></strong></small> </p>
			</center>
		</div>
	</div>

	<script src="../assets/js/jquery-1.11.3-jquery.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/validation.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>
</html>