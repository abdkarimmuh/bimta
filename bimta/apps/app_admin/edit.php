<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT * FROM admin_prodi WHERE id_admin='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Edit Admin Prodi  </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Admin :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_admin" value="<?php echo $id; ?>">
						<input type="text" name="nm_admin" id="input" class="form-control" value="<?php echo $row['nm_admin']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">No Telp/HP :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_admin" value="<?php echo $id; ?>">
						<input type="text" name="no_telp" id="input" class="form-control" value="<?php echo $row['no_telp']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_admin" type="submit" class="btn btn-primary">Update</button>
						<a href="?apps=admin" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>