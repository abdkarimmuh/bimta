<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body">
    <form action="" method="POST" class="form-horizontal" role="form">
      <div class="form-group">
        <center>
          <legend>Tambah Mahasiswa </legend>
        </center>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">NIM Mahasiswa :</label>
        <div class="col-sm-6">
          <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="10" name="nim" id="input" class="form-control"
            placeholder="NIM berupa 10 angka" value="" required="required"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Nama Mahasiswa :</label>
        <div class="col-sm-6">
          <input type="text" pattern="^[a-zA-Z ]{2,30}$" name="nm_mhs" id="input" class="form-control" placeholder="Nama lengkap mahasiswa" value=""
            required="required">
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
          </select>
        </div>
      </div>

      <?php 
				if ($_SESSION['user_level']=='admin') {
	    		 	    $where = $row3['id_prodi'];
	    		 	}else{
	    		 		$where = "";
	    		 	}
				$edit = $db_con->query("SELECT * FROM prodi WHERE id_prodi=$where");
				while($row = $edit->fetch(PDO::FETCH_ASSOC)){
				?>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Program Studi :</label>
        <div class="col-sm-6">
          <input type="hidden" name="id_prodi" value="<?php echo $row['id_prodi']; ?>">
          <input type="text" name="" id="input" class="form-control" readonly=""
            value="<?php echo $row['nama_prodi']; ?>" required="required">
        </div>
      </div><?php }?>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Tahun Bimbingan :</label>
        <div class="col-sm-6">
          <input type="text" name="th_bimbingan" id="input" class="form-control" readonly=""
            value="<?php $tahun=date("Y"); echo $tahun; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Username :</label>
        <div class="col-sm-6">
          <input type="text" name="username" id="input" class="form-control" readonly=""
            value="<?php $bytes=random_bytes(5); echo bin2hex($bytes);?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Password :</label>
        <div class="col-sm-6">
          <input type="text" name="password" id="input" class="form-control" readonly=""
            value="<?php $kode=date("mY"); echo $kode;?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-6 col-sm-offset-4">
          <button name="tambah_mahasiswa" type="submit" class="btn btn-primary">Save</button>
          <a href="?apps=mahasiswa" class="btn btn-warning">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>