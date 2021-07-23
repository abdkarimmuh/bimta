<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body">
    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
      <div class="form-group">
        <center>
          <legend>Upload File Terkait Bimbingan</legend>
        </center>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">File Tugas Akhir :</label>
        <div class="col-sm-6">
          <input type="file" name="file" />
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">NIM Mahasiswa :</label>
        <div class="col-sm-6">
          <input type="number" maxlength="10" name="mhs_pengirim" id="input" class="form-control" readonly=""
            value="<?php if ($_SESSION['user_level']=='mahasiswa') {echo $row2['nim'];} else {echo "";} ?>"
            required="required"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
      </div>

      <?php
	    		    
					$stmt = $db_con->prepare("SELECT * FROM subject where nim='$_SESSION[user_session]' ORDER BY id_subject DESC LIMIT 1");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
				?>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Status Bimbingan :</label>
        <div class="col-sm-6">
          <input type="text" name="" id="input" class="form-control" disabled=""
            value="<?php echo $row['status_bimbingan'] ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Materi Bimbingan :</label>
        <div class="col-sm-6">
          <input type="hidden" name="id_subject" value="<?php echo $row['id_subject']; ?>">
          <input type="text" name="" id="input" class="form-control" readonly value="<?php echo $row['subject'] ?>"
            required="required">
        </div>
      </div>

      <?php } ?>

      <div class="form-group">
        <div class="col-sm-6 col-sm-offset-4">
          <button type="submit" name="btn-filemahasiswa" class="btn btn-primary">Kirim File</button>
          <a href="?apps=filemahasiswa" class="btn btn-warning">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>