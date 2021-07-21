<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Kirim Pesan </legend>
					</center>
				</div>

				<input type="hidden" name="dosen_pengirim" value="<?php if ($_SESSION['user_level']=='dosen') {echo $row['id_dosen'];} else {echo "";} ?>">

				<?php
	    		    $stmt = $db_con->prepare("SELECT * FROM mahasiswa where id_dosen='$_SESSION[user_session]' ORDER BY nm_mhs DESC");
					$stmt->execute();
				?>
				
				<div class="form-group">
					<label for="inputLevel" class="col-sm-4 control-label">Mahasiswa Penerima Pesan :</label>
					<div class="col-sm-4">
					<select name="mhs_penerima" id="inputLevel" class="form-control" required="required">
					<option>-- Pilih Mahasiswa --</option>
					<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
					<option value="<?php echo $row['nim'] ?>"><?php echo $row['nm_mhs'] ?></option>
					<?php } ?>
					</select></div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Topik Pesan :</label>
					<div class="col-sm-6">
						<input type="text" name="topik_pesan" id="input" placeholder="Judul pesan (subjek)" class="form-control" value="" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-4 control-label">Pesan Anda :</label>
				  <div class="col-sm-6">
					    <textarea type="text" name="pesan" id="input" class="form-control" placeholder="Isi pesan" value="" required="required"></textarea>
				  </div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="tambah_pesantambahan" type="submit" class="btn btn-primary">Kirim</button>
						<a href="?apps=pesantambahan" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>