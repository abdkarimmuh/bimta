<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Tambah Admin Prodi </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Admin Prodi :</label>
					<div class="col-sm-6">
						<input type="text" name="nm_admin" id="input" class="form-control" placeholder="Nama administrator yang bertugas di program studi" value="" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">No Telp/HP :</label>
					<div class="col-sm-6">
						<input type="text" name="no_telp" id="input" class="form-control" placeholder="Maximum 12 angka" value="" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Username :</label>
					<div class="col-sm-6">
						<input type="text" name="username" id="input" class="form-control" readonly="" value="<?php $bytes=random_bytes(5); echo bin2hex($bytes);?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Password :</label>
					<div class="col-sm-6">
						<input type="text" name="password" id="input" class="form-control" readonly="" value="<?php $kode=date("mY"); echo $kode;?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="tambah_admin" type="submit" class="btn btn-primary">Save</button>
						<a href="?apps=admin" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>