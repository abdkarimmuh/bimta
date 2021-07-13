<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT * FROM judul_ta WHERE id_ta='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Verifikasi Judul Tugas Akhir Anda</legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Judul Akhir Anda :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_ta" value="<?php echo $id; ?>">
						<textarea type="text" name="judul_akhir" id="input" class="form-control" placeholder="Judul yang akan Anda pergunakan dalam pembuatan tugas akhir" required="required"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="verifikasi_judulta" type="submit" class="btn btn-primary">Verifikasi Judul</button>
						<a href="?apps=judulta" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>