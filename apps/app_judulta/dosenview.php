<div class="panel panel-default">
	<div class="panel-heading">
		
			<span class="pull-right">
			<h4>Mahasiswa Bimbingan Anda </h4>
	  </span>
			<span>
			<h4>Data Mahasiswa </h4>
			</span>
  </div>
  <div class="panel-body">
		<div id="alert"></div>
		<table width="575" class="table table-hover" id="mahasiswa">
          
          <tbody>
            <?php							
	    		 	if ($_SESSION['user_level']=='dosen') {
	    		 	    $where = "WHERE id_dosen='$_SESSION[user_session]'";
	    		 	}else{
	    		 		$where = "";
	    		 	} 		    
					$stmt = $db_con->prepare("SELECT * FROM judul_ta, mahasiswa, dosen, prodi where mahasiswa.id_dosen=dosen.id_dosen && mahasiswa.id_dosen ='$_SESSION[user_session]' && judul_ta.nim=mahasiswa.nim && mahasiswa.id_prodi=prodi.id_prodi ORDER BY nm_mhs ASC");
					$stmt->execute(); 
					if($stmt->rowCount() > 0)	{
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
				?>
          </tbody>
	      	      <tr>
	      	        <td width="19" rowspan="12"><div align="center"></div>
	            <?php echo $no; ?></td>
	      	        <td width="178" rowspan="12"><span class="col-xs-3"><img src="apps/app_ubahmhs/user_images/<?php echo $row['foto']; ?>" class="img-rounded" width="148" height="197" /></span></td>
	      	        <td><strong>Nama</strong></td>
	      	        <td width="10"><strong>:</strong></td>
	      	        <td><?php echo $row['nm_mhs']; ?></td>
          </tr>
	      	      <tr>
	        <td><strong>Program Studi </strong></td>
	        <td><strong>:</strong></td>
	        <td width="167"><?php echo $row['nama_prodi']; ?></td>
          </tr>
	      <tr>
	        <td height="22"><span style="width: 40%"><strong>Tahun Bimbingan</a></strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['th_bimbingan']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Judul Kaprodi</strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['judul_kaprodi']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Judul Akhir</strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['judul_akhir']; ?></td>
	      </tr>
	      <tr>
	        <td>&nbsp;</td>
            <td>&nbsp;</td>
	        <td><div align="right">

	        	<?php
					$evaluasi=$row['nim'];
					$stmt2 = $db_con->prepare("SELECT * FROM evaluasi where nim_mhs ='$evaluasi' ");
					$stmt2->execute();
					$check=$stmt2->rowCount(); 
					if($check == 0) {
				?>

	          <div align="right"><a class="btn btn-info" href="?apps=evaluasi&amp;act=evaluasimhs&amp;id=<?php echo $row['nim']; ?>" title="Evaluasi Mahasiswa"> <span class="fa fa-check-square-o"></span> Evaluasi Mahasiswa</a></div>
	     		<?php } else { ?>
	          <div align="right"><a class="btn btn-success" href="?apps=evaluasi&amp;act=lihatevaluasidosen&amp;id=<?php echo $row['nim']; ?>" title="Lihat Evaluasi"> <span class="fa fa-graduation-cap"></span> Lihat Evaluasi Mahasiswa</a></div>
	      		<?php } ?>
	        </div></td>
	      </tr>
          <?php
			$no++; 
			} } else{ ?>   <div class="alert alert-warning"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Data mahasiswa tidak ditemukan.</div>
        <?php   } 	?>
          <tr>            </tr>
        </table>
    
  </div>
</div>