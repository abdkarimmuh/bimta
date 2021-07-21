<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Edit Pesan Tambahan</legend>
					</center>
				</div>

				<input type="hidden" name="dosen_pengirim" value="<?php if ($_SESSION['user_level']=='dosen') {echo $row['id_dosen'];} else {echo "";} ?>">

				<?php  

				$id = $_GET['id'];
				$edit = $db_con->query("SELECT * FROM pesan_tambahan, mahasiswa WHERE id_pesantambahan='$id' && mahasiswa.nim=pesan_tambahan.mhs_penerima");
				$row = $edit->fetch(PDO::FETCH_ASSOC);
	
				?>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Penerima :</label>
					<div class="col-sm-6">
						<input type="hidden" name="mhs_penerima" value="<?php echo $row['mhs_penerima'] ?>">
						<input type="text" name="" id="input" readonly="" class="form-control" value="<?php echo $row['nm_mhs'] ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Topik Pesan :</label>
					<div class="col-sm-6">
						<input type="text" name="topik_pesan" id="input" placeholder="Judul pesan Anda" class="form-control" value="<?php echo $row['topik_pesan'] ?>" required="required">
						<input type="hidden" name="id_pesantambahan" value="<?php echo $id; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Pesan Anda :</label>
				  <div class="col-sm-6">
					    <textarea type="text" name="pesan" id="input" class="form-control" placeholder="Isi pesan Anda" required="required"><?php echo $row['pesan']; ?></textarea>
				  </div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_pesaninti" type="submit" class="btn btn-primary">Kirim</button>
						<a href="?apps=pesantambahan" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>