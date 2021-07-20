<style type="text/css">
.style1 {
  font-family: Harrington;
  font-weight: bold;
}
.penjelasan{
    margin-left: 45px;
    margin-top: 22px;
    margin-right: 45px;
}
.nilai{
    margin-left: 45px;
    margin-top: 10px;
    margin-right: 45px;
}
.batas{
    padding: 5px;
}
.w3-centered tr th,.w3-centered tr td{text-align:center}
.w3-card-2{box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)}
.w3-table-all{border-collapse:collapse;border-spacing:0;width:80%;display:table}.w3-table-all{border:1px solid #ccc}
.w3-bordered tr,.w3-table-all tr{border-bottom:1px solid #ddd}-->
</style>
<div class="panel panel-default">
  <div class="panel-heading">
    <?php
      $id = $_GET['id'];             
      $stmt = $db_con->prepare("SELECT * FROM judul_ta, mahasiswa, dosen where judul_ta.nim='$id' && mahasiswa.nim='$id' && dosen.id_dosen='$_SESSION[user_session]' && dosen.id_dosen=mahasiswa.id_dosen");
      $stmt->execute();
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
  <h4 align="center">EVALUASI BIMBINGAN TUGAS AKHIR MAHASISWA</h4>
  <h4 align="center">oleh <?php echo $row['nm_dosen']; ?></h4>
  <p align="center">&nbsp;</p>
  <table width="559" height="139" border="0" align="center">
        <tr>
          <td width="154" height="36">NIM</td>
          <td width="13">:</td>
          <td width="378"><?php echo $row['nim']; ?></td>
        </tr>
        <tr>
          <td height="43">Nama </td>
          <td>:</td>
          <td><?php echo $row['nm_mhs']; ?></td>
        </tr>
        <tr>
          <td height="52">Judul Tugas Akhir </td>
          <td>:</td>
          <td><?php echo $row['judul_akhir']; ?></td>
        </tr>
    <?php } ?>
  </table>
  <?php             
      $stmt2 = $db_con->prepare("SELECT * FROM evaluasi, prodi, mahasiswa where evaluasi.nim_mhs='$id' && mahasiswa.nim='$id' && mahasiswa.id_prodi=prodi.id_prodi");
      $stmt2->execute();
      while($row_2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
  ?>
  <p align="justify" class="penjelasan">Dinyatakan <strong><?php echo $row_2['status_bimbingan']; ?></strong> dalam pelaksanaan bimbingan tugas akhir di Program Studi <strong><?php echo $row_2['nama_prodi']; ?></strong> Politeknik Negeri Medan. Adapun pelaksanaan yang dimaksud yaitu pelaksanaan bimbingan tugas akhir melalui Portal Bimbingan Tugas Akhir milik Politeknik Negeri Medan, dengan daftar capaian yaitu sebagai berikut :</p>
    <div class="batas"></div>
  <table class="w3-table-all w3-card-2 w3-centered" width="94%" height="321" border="1" align="center">
      <tr>
        <td width="57" rowspan="2"><div align="center"><strong>No</strong></div></td>
        <td width="449" rowspan="2"><div align="center"><strong>Bidang Penilaian</strong></div></td>
        <td height="32" colspan="2"><div align="center"><strong>Status</strong></div></td>
      </tr>
      <tr>
        <td width="148" height="32"><div align="center"><strong>Ok</strong></div></td>
        <td width="148"><div align="center"><strong>Kurang</strong></div></td>
      </tr>
      <tr>
        <td height="37"><div align="center">1</div></td>
        <td><div align="center">Perumusan/Pemilihan Judul </div></td>
        <?php if($row_2['evaluasi_judul']=="ok") { ?>
        <td>&#x2705;</td>
        <td>&nbsp;</td>
        <?php } elseif($row_2['evaluasi_judul']=="kurang") { ?>
        <td>&nbsp;</td>
        <td>&#x2705;</td>
        <?php } else { ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
    <tr>
        <td height="37"><div align="center">2</div></td>
        <td><div align="center">Proposal/Pendahulan </div></td>
        <?php if($row_2['evaluasi_pendahuluan']=="ok") { ?>
        <td>&#x2705;</td>
        <td>&nbsp;</td>
        <?php } elseif($row_2['evaluasi_pendahuluan']=="kurang") { ?>
        <td>&nbsp;</td>
        <td>&#x2705;</td>
        <?php } else { ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
    <tr>
        <td height="37"><div align="center">3</div></td>
        <td><div align="center">Tinjauan Pustaka/Landasan Teori </div></td>
        <?php if($row_2['evaluasi_pustaka']=="ok") { ?>
        <td>&#x2705;</td>
        <td>&nbsp;</td>
        <?php } elseif($row_2['evaluasi_pustaka']=="kurang") { ?>
        <td>&nbsp;</td>
        <td>&#x2705;</td>
        <?php } else { ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
    <tr>
        <td height="55"><div align="center">4</div></td>
        <td><div align="center">Metodologi Penelitian/Pengumpulan Data/Analisis dan Perancangan </div></td>
        <?php if($row_2['evaluasi_metodologi']=="ok") { ?>
        <td>&#x2705;</td>
        <td>&nbsp;</td>
        <?php } elseif($row_2['evaluasi_metodologi']=="kurang") { ?>
        <td>&nbsp;</td>
        <td>&#x2705;</td>
        <?php } else { ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
    <tr>
        <td height="55"><div align="center">5</div></td>
        <td><div align="center">Hasil dan Pembahasan/Pengujian dan Analisa </div></td>
        <?php if($row_2['evaluasi_pembahasan']=="ok") { ?>
        <td>&#x2705;</td>
        <td>&nbsp;</td>
        <?php } elseif($row_2['evaluasi_pembahasan']=="kurang") { ?>
        <td>&nbsp;</td>
        <td>&#x2705;</td>
        <?php } else { ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
    <tr>
        <td height="37"><div align="center">6</div></td>
        <td><div align="center">Kesimpulan dan Saran </div></td>
        <?php if($row_2['evaluasi_kesimpulan']=="ok") { ?>
        <td>&#x2705;</td>
        <td>&nbsp;</td>
        <?php } elseif($row_2['evaluasi_kesimpulan']=="kurang") { ?>
        <td>&nbsp;</td>
        <td>&#x2705;</td>
        <?php } else { ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php } ?>
      </tr>
      <?php } ?>
    </table>
    <div class="batas"></div>
  <span>
  <p><div align="right"><a href="?apps=mahasiswa" class="btn btn-warning">Kembali</a></div></p></span>
  </div>
</div>
