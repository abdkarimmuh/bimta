<?php
  include '../../dbconfig.php';
  include "sesi.php";
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="laporan.css">
</head>

<body>
  <div class="page">
    <div class="header">
      <table class="tableheader" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr style="border-bottom: 1px solid black;">
          <td width="120">
            <img src="../../assets/img/logo-pnj.png" width="120" height="120">
          </td>
          <td align="center" width="400">
            <p class="title">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</p>
            <p class="title">POLITEKNIK NEGERI JAKARTA</p>
            <p class="title"><strong>JURUSAN TEKNIK ELEKTRO</strong></p>
            <p class="subtitle">Jl. Prof. Dr. G. A. Siwabessy, Kampus UI, Depok 16425</p>
            <p class="subtitle">Telepon (021) 7863534, 7864927, 7864926, 7270042, 7270035,</p>
            <p class="subtitle">Fax (021) 7270034, (021) 7270036 Hunting</p>
            <p class="subtitle">Laman : http://www.pnj.ac.id e-pos : humas@pnj.ac.id</p>
          </td>
        </tr>
      </table>
    </div>
    <div class="divider"></div>
    <table class="tableheader" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr style="border-bottom: 1px solid black;">
        <td align="center" width="440">
          <p class="title"><strong>LEMBAR KONTROL AKTIVITAS</strong></p>
          <p class="title"><strong>KONSULTASI BIMBINGAN TUGAS AKHIR</strong></p>
          <p class="title"><strong>TAHUN AKADEMIK 2020/2021</strong></p>
        </td>
        <td width="52">
          <img src="f8.png" width="52" height="49">
        </td>
      </tr>
    </table>
    <table class="nama" width="450" border="0" align="center" cellpadding="0" cellspacing="0">
      <?php 
        $stmt = $db_con->prepare("SELECT * FROM mahasiswa, prodi, judul_ta, dosen WHERE mahasiswa.nim='$_SESSION[user_session]' && mahasiswa.id_prodi=prodi.id_prodi && mahasiswa.nim=judul_ta.nim && mahasiswa.id_dosen=dosen.id_dosen");
		$stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td width="140">Nama Mahasiswa</td>
        <td width="10">:</td>
        <td width="200">
          <div align="left">
            <?php echo $row['nm_mhs'];?>
          </div>
        </td>
      </tr>
      <tr>
        <td>NIM</td>
        <td>:</td>
        <td>
          <div align="left"><?php echo $row['nim'];?></div>
        </td>
      </tr>
      <tr>
        <td>Program Studi/Jenjang</td>
        <td>:</td>
        <td>
          <div align="left">
            <?php echo $row['nama_prodi'];?>/<?php echo $row['jenjang'];?>
          </div>
        </td>
      </tr>
      <tr>
        <td>Judul Tugas Akhir</td>
        <td>:</td>
        <td>
          <div align="left">
            <?php echo $row['judul_akhir'];?>
          </div>
        </td>
      </tr>

      <tr>
        <td>Dosen Pembimbing</td>
        <td>:</td>
        <td>
          <div align="left">
            <?php echo $row['nm_dosen'];?>
          </div>
        </td>
      </tr>
      <?php }?>
    </table>
    <div class="batas"></div>

    <table border="1px" align="center" class="tabel">
      <tr class="head">
        <td width="5">No</td>
        <td width="100">Hari/Tanggal</td>
        <td width="300">Materi Konsultasi</td>
        <td width="95">Paraf Pembimbing</td>
      </tr>

      <?php  
        $stmt = $db_con->prepare("SELECT * FROM subject WHERE nim='$_SESSION[user_session]' order by id_subject asc limit 10 offset 1");
        $stmt->execute();
        $no=1;
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
      ?>
      <tr bgcolor="#fff">
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php $tgl=date_create($row['tgl']); echo date_format($tgl, 'jS F Y'); ?></td>
        <td align="left"><?php echo $row['subject']; ?></td>
        <td align="center">
          <img src="signature-example.png" width="54" height="16">
        </td>
      </tr>

      <?php
        $no++;
        }
      ?>
    </table>
    <table border="0" class="ket">
      <tr>
        <td> - Jumlah konsultasi untuk mengikuti ujian tugas akhir sekurang-kurangnya 10 (sepuluh) kali</td>
      </tr>
      <tr>
        <td> - Lembar ini diserahkan bersama dengan lembar persetujuan untuk mengikuti ujian tugas akhir dari Pembimbing
          (F7)</td>
      </tr>
    </table>
    <div class="batas2"></div>
    <table width="610" border="0" class="ttd" style="float:right;">
      <?php 
        $stmt = $db_con->prepare("SELECT * FROM kaprodi, dosen, mahasiswa, prodi WHERE mahasiswa.nim='$_SESSION[user_session]' && mahasiswa.id_dosen=dosen.id_dosen && mahasiswa.id_prodi=kaprodi.id_prodi && kaprodi.id_prodi=prodi.id_prodi");
		$stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td>Diketahui Oleh, </td>
        <td>&nbsp;</td>
        <td>Disetujui Oleh, </td>
      </tr>
      <tr>
        <td>Dosen Pembimbing, </td>
        <td>&nbsp;</td>
        <td>KPS. <?php echo $row['nama_prodi'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="251"><?php echo $row['nm_dosen'];?></td>
        <td width="99">&nbsp;</td>
        <td width="239"><?php echo $row['nm_kaprodi'];?></td>
      </tr>
      <tr>
        <td>NIP. <?php echo $row['nip_dosen'];?></td>
        <td>&nbsp;</td>
        <td>NIP. <?php echo $row['nip_kaprodi'];?></td>
      </tr><?php }?>
    </table>
  </div>
</body>

</html>