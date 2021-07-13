<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT * FROM prodi WHERE id_prodi='$id'");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Edit Data Program Studi  </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Prodi :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_prodi" value="<?php echo $id; ?>">
						<input type="text" name="nama_prodi" id="input" class="form-control" value="<?php echo $row['nama_prodi']; ?>" required="required">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputLevel" class="col-sm-4 control-label">Jenjang Pendidikan :</label>
					<div class="col-sm-4">
					<select name="jenjang" id="inputLevel" class="form-control" required="required">
					<option>-- Pilih Jenjang Pendidikan --</option>
						  <option value="D-III">Diploma III</option>
						  <option value="D-IV">Diploma IV</option>
					</select></div>
				</div>

				<?php 
	$edit = $db_con->query("SELECT * FROM jurusan WHERE id_jurusan='$_SESSION[user_session]'");
	while($row = $edit->fetch(PDO::FETCH_ASSOC)){
	?>
				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Jurusan :</label>
					<div class="col-sm-6">
						<input type="hidden" name="id_jurusan" value="<?php echo $row['id_jurusan']; ?>">
						<input type="text" name="" id="input" class="form-control" readonly="" value="<?php echo $row['jurusan']; ?>" required="required">
					</div>
				</div><?php }?>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_prodi" type="submit" class="btn btn-primary">Update</button>
						<a href="?apps=prodi" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>