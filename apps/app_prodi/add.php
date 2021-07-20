<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Tambah  Program Studi </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Prodi :</label>
					<div class="col-sm-6">
						<input type="text" name="nama_prodi" id="input" class="form-control" value="" placeholder="Nama program studi" required="required">
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
				
				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="tambah_prodi" type="submit" class="btn btn-primary">Save</button>
						<a href="?apps=prodi" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>