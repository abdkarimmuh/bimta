<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT * FROM jurusan WHERE id_jurusan='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Edit Profil Jurusan </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Jurusan :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_jurusan" value="<?php echo $id; ?>">
						<input type="text" name="jurusan" id="input" class="form-control" value="<?php echo $row['jurusan']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Ketua Jurusan :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_jurusan" value="<?php echo $id; ?>">
						<input type="text" name="nama_kajur" id="input" class="form-control" value="<?php echo $row['nama_kajur']; ?>" required="required">
					</div>
				</div>
				
				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Username :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_jurusan" value="<?php echo $id; ?>">
						<input type="text" name="username" id="input" class="form-control" value="<?php echo $row['username']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Password :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_jurusan" value="<?php echo $id; ?>">
						<input type="password" name="password" id="input" class="form-control" value="<?php echo $row['password']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Admin :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_jurusan" value="<?php echo $id; ?>">
						<input type="text" name="nm_admin" id="input" class="form-control" value="<?php echo $row['nm_admin']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">No Telp/HP :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_jurusan" value="<?php echo $id; ?>">
						<input type="text" name="no_telp" id="input" class="form-control" value="<?php echo $row['no_telp']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_jurusan" type="submit" class="btn btn-primary">Update</button>
						<a href="?apps=jurusan" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>