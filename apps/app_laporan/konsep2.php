<?php
include '../../dbconfig.php';
include "sesi.php";
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="laporan2.css">
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
    <div class="kop">
      <h2><strong>LAPORAN EVALUASI MAHASISWA BIMBINGAN AKHIR</strong></h2>
    </div>
    <div class="batas"></div>

    <table border="1px" align="center" class="tabel">
      <tr class="head">
        <td width="1">NO</td>
        <td width="10">NIM</td>
        <td width="30">NAMA</td>
        <td width="40">DOSEN PEMBIMBING</td>
        <td width="10">HASIL EVALUASI</td>
      </tr>

      <?php  
				if ($_SESSION['user_level']=='admin') {
	    		 	    $where = $row3['id_prodi'];
	    		 	}elseif ($_SESSION['user_level']=='kaprodi') {
                $where = $row4['id_prodi'];
            }
                $stmt = $db_con->prepare("SELECT * FROM mahasiswa, dosen WHERE mahasiswa.id_prodi=$where && dosen.id_dosen=mahasiswa.id_dosen order by mahasiswa.nm_mhs asc");
                $stmt->execute();
                $no=1;
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
            ?>
      <tr bgcolor="#fff">
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $row['nim']; ?></td>
        <td align="left"><?php echo $row['nm_mhs']; ?></td>
        <td align="center"><?php echo $row['nm_dosen']; ?></td>
        <?php
                              $evaluasi=$row['nim'];
                              $stmt2 = $db_con->prepare("SELECT * FROM evaluasi where nim_mhs ='$evaluasi' ");
                              $stmt2->execute();
                              $check=$stmt2->rowCount(); 
                              if($check == 1) { 
                               while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)) { 

                            ?>
        <td align="center"><?php echo $row2['status_bimbingan']; ?></td>
        <?php } } else { ?>
        <td align="center">belum dievaluasi</td>
        <?php } ?>
      </tr>


      <?php
					$no++;
					}
					?>
    </table>

    <div class="batas2"></div>
    <table width="603" border="0" class="ttd" style="float:right;">
      <?php 
    if ($_SESSION['user_level']=='admin') {
                $where = $row3['id_prodi'];
            }elseif ($_SESSION['user_level']=='kaprodi') {
                $where = $row4['id_prodi'];
            }
            $stmt = $db_con->prepare("SELECT * FROM kaprodi, prodi WHERE kaprodi.id_prodi=$where && prodi.id_prodi=$where ");
					$stmt->execute();
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td>Diketahui Oleh, </td>
      </tr>
      <tr>
        <td>KPS. <?php echo $row['nama_prodi'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="239"><?php echo $row['nm_kaprodi'];?></td>
      </tr>
      <tr>
        <td>NIP. <?php echo $row['nip_kaprodi'];?></td>
      </tr><?php }?>
    </table>
    <div class="batas"></div>
  </div>
</body>

</html>