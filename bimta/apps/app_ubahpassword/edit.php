<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT * FROM mahasiswa WHERE nim='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Ubah Username dan Password</legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Username :</label>
					<div class="col-sm-6">
						<input type="hidden" name="nim" value="<?php echo $id; ?>">
						<input type="text" name="username" id="input" class="form-control" value="<?php echo $row['username']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Password :</label>
					<div class="col-sm-6">
						<input type="hidden" name="nim" value="<?php echo $id; ?>">
						<input type="password" name="password" id="input" class="form-control" value="<?php echo $row['password']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_password" type="submit" class="btn btn-primary">Update</button>
						<a href="?apps=ubahpassword" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>