<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-body">
		<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<center>
					  <legend>Edit Evaluasi Bimbingan Tugas Akhir Mahasiswa </legend>
					</center>
				</div>

				<?php 
					$id = $_GET['id'];
					$edit = $db_con->query("SELECT * FROM mahasiswa, evaluasi WHERE mahasiswa.nim='$id' && evaluasi.nim_mhs='$id'");
					$row = $edit->fetch(PDO::FETCH_ASSOC);
				?>
				
				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Nama Mahasiswa :</label>
					<div class="col-sm-5">
						<input type="hidden" name="nim_mhs" value="<?php echo $id; ?>">
						<input type="hidden" name="id_evaluasi" value="<?php echo $row['id_evaluasi']; ?>">
						<input type="text" name="" id="input" class="form-control" readonly="" value="<?php echo $row['nm_mhs']; ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Status Akhir Bimbingan </br>(Menurut Penilaian Anda) :</label>
				  <div class="col-sm-6">
				  	<?php if($row['status_bimbingan']=="telah selesai") { ?>
				    <input name="status_bimbingan" type="radio" class="radiobutton" value="telah selesai" checked=""> Telah Selesai</br>
					<input name="status_bimbingan" type="radio" class="radiobutton" value="tidak selesai"> Tidak Selesai</br>
					<?php } else { ?>
				    <input name="status_bimbingan" type="radio" class="radiobutton" value="telah selesai"> Telah Selesai</br>
					<input name="status_bimbingan" type="radio" class="radiobutton" value="tidak selesai" checked=""> Tidak Selesai</br>
					<?php } ?>
				  </div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Perumusan/Pemilihan Judul :</label>
				  <div class="col-sm-6">
				  	<?php if($row['evaluasi_judul']=="ok") { ?>
				    <input name="evaluasi_judul" type="radio" class="radiobutton" value="ok" checked=""> Ok</br>
					<input name="evaluasi_judul" type="radio" class="radiobutton" value="kurang"> Kurang</br>
					<?php } else { ?>
					<input name="evaluasi_judul" type="radio" class="radiobutton" value="ok"> Ok</br>
					<input name="evaluasi_judul" type="radio" class="radiobutton" value="kurang" checked=""> Kurang</br>
					<?php } ?>
				  </div>
				</div>
				
				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Proposal/Pendahuluan :</label>
				  <div class="col-sm-6">
				  	<?php if($row['evaluasi_pendahuluan']=="ok") { ?>
				    <input name="evaluasi_pendahuluan" type="radio" class="radiobutton" value="ok" checked=""> Ok</br>
					<input name="evaluasi_pendahuluan" type="radio" class="radiobutton" value="kurang"> Kurang</br>
					<?php } else { ?>
					<input name="evaluasi_pendahuluan" type="radio" class="radiobutton" value="ok"> Ok</br>
					<input name="evaluasi_pendahuluan" type="radio" class="radiobutton" value="kurang" checked=""> Kurang</br>
					<?php } ?>
				  </div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Tinjauan Pustaka/Landasan Teori :</label>
				  <div class="col-sm-6">
				  	<?php if($row['evaluasi_pustaka']=="ok") { ?>
				    <input name="evaluasi_pustaka" type="radio" class="radiobutton" value="ok" checked=""> Ok</br>
					<input name="evaluasi_pustaka" type="radio" class="radiobutton" value="kurang"> Kurang</br>
					<?php } else { ?>
					<input name="evaluasi_pustaka" type="radio" class="radiobutton" value="ok"> Ok</br>
					<input name="evaluasi_pustaka" type="radio" class="radiobutton" value="kurang" checked=""> Kurang</br>
					<?php } ?>
				  </div>
				</div>
				
				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Metodologi Penelitian/Pengumpulan </br>Data/ Analisis dan Perancangan :</label>
				  <div class="col-sm-6">
				  	<?php if($row['evaluasi_metodologi']=="ok") { ?>
				    <input name="evaluasi_metodologi" type="radio" class="radiobutton" value="ok" checked=""> Ok</br>
					<input name="evaluasi_metodologi" type="radio" class="radiobutton" value="kurang"> Kurang</br>
					<?php } else { ?>
					<input name="evaluasi_metodologi" type="radio" class="radiobutton" value="ok"> Ok</br>
					<input name="evaluasi_metodologi" type="radio" class="radiobutton" value="kurang" checked=""> Kurang</br>
					<?php } ?>
				  </div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Hasil dan Pembahasan/ </br>Pengujian dan Analisa :</label>
				  <div class="col-sm-6">
				  	<?php if($row['evaluasi_pembahasan']=="ok") { ?>
				    <input name="evaluasi_pembahasan" type="radio" class="radiobutton" value="ok" checked=""> Ok</br>
					<input name="evaluasi_pembahasan" type="radio" class="radiobutton" value="kurang"> Kurang</br>
					<?php } else { ?>
					<input name="evaluasi_pembahasan" type="radio" class="radiobutton" value="ok"> Ok</br>
					<input name="evaluasi_pembahasan" type="radio" class="radiobutton" value="kurang" checked=""> Kurang</br>
					<?php } ?>
				  </div>
				</div>

				<div class="form-group">
					<label for="input" class="col-sm-5 control-label">Kesimpulan dan Saran :</label>
				  <div class="col-sm-6">
				  	<?php if($row['evaluasi_kesimpulan']=="ok") { ?>
				    <input name="evaluasi_kesimpulan" type="radio" class="radiobutton" value="ok" checked=""> Ok</br>
					<input name="evaluasi_kesimpulan" type="radio" class="radiobutton" value="kurang"> Kurang</br>
					<?php } else { ?>
					<input name="evaluasi_kesimpulan" type="radio" class="radiobutton" value="ok"> Ok</br>
					<input name="evaluasi_kesimpulan" type="radio" class="radiobutton" value="kurang" checked=""> Kurang</br>
					<?php } ?>
				  </div>
				</div>

				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-4">
						<button name="edit_evaluasi" type="submit" class="btn btn-primary">Save</button>
						<a href="?apps=evaluasi&amp;act=lihatevaluasidosen&amp;id=<?php echo $id; ?>" class="btn btn-warning">Batal</a>
					</div>
				</div>
		</form>
	</div>
</div>