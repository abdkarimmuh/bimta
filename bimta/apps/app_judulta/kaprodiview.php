<div class="panel panel-default">
	<div class="panel-heading">
		
			<span class="pull-right">
			<h4>Judul Tugas Akhir </h4>
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
	    		 	if ($_SESSION['user_level']=='kaprodi') {
	    		 	    $where = $row4['id_prodi'];;
	    		 	}else{
	    		 		$where = "";
	    		 	}		    
					$stmt = $db_con->prepare("SELECT * FROM judul_ta, mahasiswa where mahasiswa.nim=judul_ta.nim && mahasiswa.id_prodi =$where ORDER BY id_ta ASC");
					$stmt->execute(); 
					if($stmt->rowCount() > 0)	{
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
				?>
          </tbody>
	      	      <tr>
	        <td width="19" rowspan="8"><div align="center"></div>
	          <?php echo $no; ?></td>
	        <td width="178" rowspan="8"><span class="col-xs-3"><img src="apps/app_ubahmhs/user_images/<?php echo $row['foto']; ?>" class="img-rounded" width="148" height="197" /></span></td>
	        <td><span style="width: 40%"><strong>NIM</strong></span></td>
	        <td width="10"><strong>:</strong></td>
	        <td width="167"><?php echo $row['nim']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Nama</strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['nm_mhs']; ?></td>
          </tr>
	      <tr>
	        <td width="167"><span style="width: 20%"><strong>Tahun Bimbingan</a></strong></span></td>
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
	        <td>
	        <?php if($row['judul_akhir']==NULL && $row['judul_kaprodi']!=NULL) { ?>
	        <div align="right"><a class="btn btn-warning" href="?apps=judulta&amp;act=pilihjudul&amp;id=<?php echo $row['id_ta']; ?>" title="Edit"> <span class="fa fa-edit"></span> Pilih Ulang Judul</a></div></td>
	    	<?php } elseif($row['judul_kaprodi']==NULL) { ?>
	        <div align="right"><a class="btn btn-primary" href="?apps=judulta&amp;act=pilihjudul&amp;id=<?php echo $row['id_ta']; ?>" title="Edit"> <span class="fa fa-edit"></span> Pilih Judul</a></div></td>
	        <?php } else { ?>
	        	<div align="right"><a disabled class="btn btn-success"><span class="fa fa-check"></span> Judul Terverifikasi</a></div></td>
	        <?php } ?>
	      </tr>
          <?php
			$no++; 
			} } else{ ?>   <div class="alert alert-warning"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Data tidak ditemukan</div>
        <?php   } 	?>
          <tr>            </tr>
        </table>
    
  </div>
</div>