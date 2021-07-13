<div class="panel panel-default">
	<div class="panel-heading">
		<?php if ($_SESSION['user_level']=='mahasiswa') { 

			$stmt = $db_con->prepare("SELECT * FROM judul_ta, mahasiswa where mahasiswa.nim=judul_ta.nim && mahasiswa.nim ='$_SESSION[user_session]' ORDER BY id_ta ASC");
			$stmt->execute();
			if($stmt->rowCount() > 0)	{ while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$stmt2 = $db_con->prepare("SELECT * FROM judul_ta where nim='$_SESSION[user_session]' && judul_akhir IS NOT NULL");
			$stmt2->execute();
			if($check = $stmt2->fetchColumn()){
				?>
				<a disabled class="btn btn-info btn-danger">Judul telah diverifikasi. Anda tidak lagi dapat mengedit judul !</a>
			<?php } else {?>
			<a href="?apps=judulta&act=edit&id=<?php echo $row['id_ta']; ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit Judul Tugas Akhir</a>

			<?php }}} else{ ?> 

			<a href="?apps=judulta&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Ajukan Judul Tugas Akhir</a><?php }?>
			<span class="pull-right">
			<h4>Judul Tugas Akhir </h4>
	  </span>
		<?php } else { ?>
			<span>
			<h4>Data Mahasiswa </h4>
			</span>
		<?php } ?>
  </div>
  <div class="panel-body">
		<div id="alert"></div>
		<table width="565" class="table table-hover" id="mahasiswa">
          
          <tbody>
            <?php							
	    		 	if ($_SESSION['user_level']=='mahasiswa') {
	    		 	    $where = "WHERE nim='$_SESSION[user_session]'";
	    		 	}else{
	    		 		$where = "";
	    		 	} 		    
					$stmt = $db_con->prepare("SELECT * FROM judul_ta, mahasiswa where mahasiswa.nim=judul_ta.nim && mahasiswa.nim ='$_SESSION[user_session]' ORDER BY id_ta ASC");
					$stmt->execute(); 
					if($stmt->rowCount() > 0)	{
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
				?>
          </tbody>
	      	      <tr>
	        <td width="19" rowspan="6"><div align="center"></div>
	          <?php echo $no; ?></td>
	        <td width="178" rowspan="6"><span class="col-xs-3"><img src="apps/app_ubahmhs/user_images/<?php echo $row['foto']; ?>" class="img-rounded" width="148" height="197" /></span></td>
	        <td width="167"><span style="width: 20%"><strong>Judul Prioritas 1</strong></span></td>
	        <td width="10"><strong>:</strong></td>
	        <td width="167"><?php echo $row['judul1']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Judul Prioritas 2</strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['judul2']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Judul Prioritas 3</strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['judul3']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Judul Pilihan Kaprodi</strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['judul_kaprodi']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Judul Setelah Verifikasi </strong></span></td>
	        <td><strong>:</strong></td>
            <td><?php echo $row['judul_akhir']; ?></td>
          </tr>
	      <tr>
	        <td>&nbsp;</td>
            <td>&nbsp;</td>
        <?php 
            $stmt3 = $db_con->prepare("SELECT * FROM subject where nim ='$_SESSION[user_session]' order by id_subject");
			$stmt3->execute();
			$check2=$stmt3->rowCount();
			if($check2 >= 7)	{
			?>
	        <td><div align="right"><a disabled class="btn btn-success"><span class="fa fa-check"></span> Bimbingan Telah Selesai Diadakan</a></div></td> 
	    <?php } else { 
	        	$no_verifikasi=$row['nim'];
	        	$no_verifikasi2=$row['id_ta'];
	        	$stmt4 = $db_con->prepare("SELECT * FROM judul_ta where id_ta='$no_verifikasi2' && nim ='$no_verifikasi' && judul_kaprodi IS NOT NULL");
				$stmt4->execute();
				$check3=$stmt4->rowCount();
				if($check3 == 1) { 
	        	?>
	        <td><div align="right"><a class="btn btn-info" href="?apps=judulta&act=verifikasi&id=<?php echo $row['id_ta']; ?>" title="Verifikasi"> <span class="fa fa-edit"></span> Verifikasi Judul Akhir</a></div></td> 
	        <?php } else { ?>
	        	<td><div align="right"><a class="btn btn-danger" disabled> <span class="fa fa-minus-circle"></span> Judul Belum Dipilih oleh Kaprodi</a></div></td> 
	    <?php } } ?>
	      </tr>
          <?php
			$no++; 
			} } else{ ?>   <div class="alert alert-warning"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Data Anda tidak ditemukan. Ajukan judul sekarang !</div>
        <?php   } 	?>
          <tr>            </tr>
        </table>
    
  </div>
</div>