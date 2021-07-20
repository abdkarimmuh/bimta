<?php
include '../../dbconfig.php';
include "sesi.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="laporan.css">
	</head>
	<body><div class="page">
		<div class="header"><img src="header.png" width="633" height="137" align="center"></div>
            <div class="batas"></div>
		<table class="nama" width="419" border="0" align="center" cellpadding="0" cellspacing="0">
			<?php $stmt = $db_con->prepare("SELECT * FROM mahasiswa, prodi, judul_ta, dosen WHERE mahasiswa.nim='$_SESSION[user_session]' && mahasiswa.id_prodi=prodi.id_prodi && mahasiswa.nim=judul_ta.nim && mahasiswa.id_dosen=dosen.id_dosen");
					$stmt->execute();
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
                <td width="156"><span class="style10">Nama Mahasiswa </span></td>
                <td width="15"><span class="style10">:</span></td>
                <td width="248"><div align="left" class="style11"><span style="width:1%;"><?php echo $row['nm_mhs'];?></span></div></td>
              </tr>
              <tr>
                <td><span class="style10">NIM</span></td>
                <td>:</td>
                <td><div align="left" class="style11"><span style="width:1%;"><?php echo $row['nim'];?></span></div></td>
              </tr>
              <tr>
                <td><span class="style10">Program Studi/Jenjang </span></td>
                <td>:</td>
                <td><div align="left" class="style11"><span style="width:1%;"><?php echo $row['nama_prodi'];?>/<?php echo $row['jenjang'];?></span></div></td>
              </tr>
              <tr>
                <td><span class="style10">Judul Tugas Akhir </span></td>
                <td>:</td>
                <td><div align="left" class="style11"><span style="width:1%;"><?php echo $row['judul_akhir'];?></span></div></td>
              </tr>
              
			  <tr>
                <td><span class="style10">Dosen Pembimbing </span></td>
                <td>:</td>
                <td><div align="left" class="style11"><span style="width:1%;"><?php echo $row['nm_dosen'];?></span></div></td>
              </tr>
			        <?php } 
         $stmt = $db_con->prepare("SELECT * FROM subject where nim ='$_SESSION[user_session]' order by id_subject asc limit 1");
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
			          <td><span class="style10">Tanggal Mulai Bimbingan </span></td>
                      <td>:</td>
                <td><div align="left" class="style11"><span style="width:1%;"><?php $tgl=date_create($row['tgl']); echo date_format($tgl, 'jS F Y'); ?></span></div></td>
              </tr>
			        <?php  }
         $stmt = $db_con->prepare("SELECT * FROM subject where nim ='$_SESSION[user_session]' order by id_subject desc limit 1");
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
			          <td><span class="style10">Tanggal Selesai Bimbingan </span></td>
                      <td>:</td>
                <td><div align="left" class="style11"><span style="width:1%;"><?php $tgl=date_create($row['tgl']); echo date_format($tgl, 'jS F Y'); ?></span></div></td>
              </tr><?php }?>
      </table>
            <div class="batas"></div>
            
<table border="1px" align="center" class="tabel">
			<tr class="head">
				<td width="1">NO</td>
				<td width="70">TANGGAL ASISTENSI BIMBINGAN</td>
				<td width="210">MATERI BIMBINGAN</td>
				<td width="70">PARAF DOSEN PEMBIMBING</td>
				<td width="85">KETERANGAN</td>
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
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
						</tr>
					
					<?php
					$no++;
					}
					?>
      </table>
            <table border="0" class="ket">
            <tr>
                <td>Kartu ini harap dikembalikan melalui Administrasi</td>    
            </tr>
            <tr>
                <td>Bila bimbingan mahasiswa telah selesai (minimal telah 7 kali bimbingan)</td>    
            </tr>
            </table>
			<div class="batas2"></div>
            <table width="603" border="0" class="ttd" style="float:right;">
	  <?php $stmt = $db_con->prepare("SELECT * FROM kaprodi, dosen, mahasiswa, prodi WHERE mahasiswa.nim='$_SESSION[user_session]' && mahasiswa.id_dosen=dosen.id_dosen && mahasiswa.id_prodi=kaprodi.id_prodi && kaprodi.id_prodi=prodi.id_prodi");
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
      </table><div class="batas"></div>
	  <table class="footer"><tr>
              <td><img src="iso.png" width="98" height="60"></td>
             </tr></table>
	</div>
	</body>
</html>