<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body">
    <form action="" method="POST" class="form-horizontal" role="form">
      <div class="form-group">
        <center>
          <legend>Tambah Dosen </legend>
        </center>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">Nama Dosen :</label>
        <div class="col-sm-6">
          <input type="text" name="nm_dosen" id="input" class="form-control" placeholder="Disertai dengan gelar lengkap"
            value="" required="required">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">NIP Dosen :</label>
        <div class="col-sm-6">
          <input type="number" maxlength="18" name="nip_dosen" id="input" class="form-control"
            placeholder="Diketik tanpa spasi" value="" required="required"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
      </div>

      <div class="form-group">
        <label for="input" class="col-sm-4 control-label">No Telp/HP :</label>
        <div class="col-sm-6">
          <input type="number" maxlength="13" name="no_telp" id="input" class="form-control"
            placeholder="Maximum 13 angka" value="" required="required"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
          <button name="tambah_dosen" type="submit" class="btn btn-primary">Save</button>
          <a href="?apps=dosen" class="btn btn-warning">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>