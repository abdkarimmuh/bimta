<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT foto FROM mahasiswa WHERE nim='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
				<div class="form-group">
					<center>
					  <legend>Upload Foto Profil  Mahasiswa </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Pas Foto Mahasiswa :</label>
				  <div class="col-sm-6">
					  <p>
					    <input type="hidden" name="nim" value="<?php echo $id; ?>">
					    <input class="input-group" required="required" type="file" name="foto" accept="image/*" />
					</p>
					  <p>Catatan : Foto yang diizinkan hanya pas foto resmi dgn ukuran max 2 mb </p>
				  </div>
				</div>
				
				
				<div class="form-group">
				  <div class="col-sm-6 col-sm-offset-4">
						<button type="submit" name="edit_foto" class="btn btn-primary">Update</button>
					<a href="?apps=ubahmhs" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>