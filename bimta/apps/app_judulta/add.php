<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body">
    <form action="" method="POST" class="form-horizontal" role="form">
      <div class="form-group">
        <center>
          <legend>Ajukan Judul Tugas Akhir </legend>
        </center>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">NIM Mahasiswa :</label>
        <div class="col-sm-6">
          <input type="number" maxlength="10" name="nim" id="input" class="form-control" readonly=""
            value="<?php if ($_SESSION['user_level']=='mahasiswa') {echo $row2['nim'];} else {echo "";} ?>"
            required="required"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Judul 1 :</label>
        <div class="col-sm-6">
          <textarea type="text" name="judul1" id="input" class="form-control" value=""
            placeholder="Judul tugas akhir sebagai prioritas utama" required="required"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Judul 2 :</label>
        <div class="col-sm-6">
          <textarea type="text" name="judul2" id="input" class="form-control" value=""
            placeholder="Judul tugas akhir sebagai prioritas kedua" required="required"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Judul 3 :</label>
        <div class="col-sm-6">
          <textarea type="text" name="judul3" id="input" class="form-control" value=""
            placeholder="Judul tugas akhir sebagai prioritas ketiga" required="required"></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-6 col-sm-offset-4">
          <button name="tambah_judulta" type="submit" class="btn btn-primary">Ajukan Judul</button>
          <a href="?apps=judul_ta" class="btn btn-warning">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>