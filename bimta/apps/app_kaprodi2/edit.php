<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT * FROM kaprodi WHERE id_kaprodi='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Edit Profil Kaprodi </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Kaprodi :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_kaprodi" value="<?php echo $id; ?>">
						<input type="text" name="nm_kaprodi" id="input" class="form-control" value="<?php echo $row['nm_kaprodi']; ?>" required="required">
					</div>
				</div>
				
				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">NIP Kaprodi :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_kaprodi" value="<?php echo $id; ?>">
						<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="18" name="nip_kaprodi" id="input" class="form-control"
            			value="<?php echo $row['nip_kaprodi']; ?>" required="required"
            			oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">No Telp/HP :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_kaprodi" value="<?php echo $id; ?>">
						<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57"" maxlength="12" name="no_telp" id="input" class="form-control"
            			value="<?php echo $row['no_telp']; ?>" required="required"
            			oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Username :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_kaprodi" value="<?php echo $id; ?>">
						<input type="text" name="username" id="input" class="form-control" value="<?php echo $row['username']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Password :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_kaprodi" value="<?php echo $id; ?>">
						<input type="password" name="password" id="input" class="form-control" value="<?php echo $row['password']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_kaprodi" type="submit" class="btn btn-primary">Update</button>
						<a href="?apps=kaprodi2" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>