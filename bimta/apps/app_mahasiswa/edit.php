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
					  <legend>Edit Data Mahasiswa </legend>
					</center>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">NIM Mahasiswa :</label>
					<div class="col-sm-6">
						<input type="hidden" name="nim" value="<?php echo $id; ?>">
						<input type="text" name="nim" readonly="" id="input" class="form-control" value="<?php echo $row['nim']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Nama Mahasiswa :</label>
					<div class="col-sm-6">
						<input type="hidden" name="nim" value="<?php echo $id; ?>">
						<input type="text" name="nm_mhs" id="input" class="form-control" value="<?php echo $row['nm_mhs']; ?>" required="required">
					</div>
				</div>

				<?php
	    		    if ($_SESSION['user_level']=='admin') {
	    		 	    $where = $row3['id_prodi'];
	    		 	}else{
	    		 		$where = "";
	    		 	}
					$stmt = $db_con->prepare("SELECT * FROM dosen, prodi where id_prodi=$where");
					$stmt->execute();
				?>
				
				<div class="form-group">
					<label for="inputLevel" class="col-sm-4 control-label">Dosen Pembimbing :</label>
					<div class="col-sm-4">
					<select name="id_dosen" id="inputLevel" class="form-control" required="required">
					<option>-- Pilih Dosen Pembimbing --</option>
					<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $row['id_dosen'] ?>"><?php echo $row['nm_dosen'] ?></option>
					<?php } ?>
					</select></div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_mahasiswa" type="submit" class="btn btn-primary">Update</button>
						<a href="?apps=mahasiswa" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>