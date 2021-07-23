<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body">
    <form action="" method="POST" class="form-horizontal" role="form">
      <div class="form-group">
        <center>
          <legend>Kirim Pesan </legend>
        </center>
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

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Kode Dosen Pembimbing :</label>
        <div class="col-sm-6">
          <?php 
					$stmt = $db_con->prepare("SELECT * FROM mahasiswa, dosen where dosen.id_dosen=mahasiswa.id_dosen && nim='$_SESSION[user_session]'");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {?>
          <input type="hidden" name="dosen_penerima" value="<?php echo $row['id_dosen']; ?>">
          <input type="text" name="" id="input" class="form-control" value="<?php echo $row['nm_dosen']; }?>" disabled
            required="required">
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
        <label for="input" class="col-sm-4 control-label">Topik Pesan :</label>
        <div class="col-sm-6">
          <input type="text" name="topik_pesan" id="input" placeholder="Judul pesan Anda" class="form-control" value=""
            required="required">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Pesan Anda :</label>
        <div class="col-sm-6">
          <textarea type="text" name="pesan" id="input" class="form-control" placeholder="Isi pesan Anda" value=""
            required="required"></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-6 col-sm-offset-4">
          <button name="tambah_chatmhs" type="submit" class="btn btn-primary">Kirim</button>
          <a href="?apps=pesan" class="btn btn-warning">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>