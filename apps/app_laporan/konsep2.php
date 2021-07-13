<?php
include '../../dbconfig.php';
include "sesi.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="laporan2.css">
	</head>
	<body><div class="page">
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
      </table><div class="batas"></div>
	  <table class="footer"><tr>
              <td><img src="iso.png" width="98" height="60"></td>
             </tr></table>
	</div>
	</body>
</html>