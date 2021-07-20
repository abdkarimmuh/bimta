<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT * FROM dosen WHERE id_dosen='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Edit dosen </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Dosen :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_dosen" value="<?php echo $id; ?>">
						<input type="text" name="nm_dosen" id="input" class="form-control" value="<?php echo $row['nm_dosen']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">NIP Dosen :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_dosen" value="<?php echo $id; ?>">
						<input type="text" name="nip_dosen" id="input" class="form-control" value="<?php echo $row['nip_dosen']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">No Telp/HP :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_dosen" value="<?php echo $id; ?>">
						<input type="text" name="no_telp" id="input" class="form-control" value="<?php echo $row['no_telp']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_dosen" type="submit" class="btn btn-primary">Update</button>
						<a href="?apps=dosen" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>