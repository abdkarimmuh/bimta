<div class="panel panel-default">
	<div class="panel-heading">
		<?php if ($_SESSION['user_level']=='mahasiswa') { 

			$stmt2 = $db_con->prepare("SELECT * FROM subject where nim ='$_SESSION[user_session]' order by id_subject");
			$stmt2->execute();
			$check=$stmt2->rowCount();
			if($check != 0 && $check <= 10)	{

			$stmt = $db_con->prepare("SELECT * FROM subject where nim ='$_SESSION[user_session]' order by id_subject desc limit 1");
			$stmt->execute();
			if($stmt->rowCount() > 0)	{ while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$today=date("Y-m-d H:i:s");
			$tgl= $row['tgl'];
			if ($tgl < $today) {?>
				<a href="?apps=materi&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Materi Bimbingan</a>
			<?php } else { ?><a href="?apps=materi&amp;act=add" disabled class="btn btn-primary btn-sm">Button dinonaktifkan hingga esok hari</a><?php }}}}
			
			elseif($check == 0) { ?>
			<a href="?apps=materi&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Materi Bimbingan</a>
			<span class="pull-right">
			<h4>Materi Bimbingan</h4> <?php } 

			elseif($check >= 11) { ?>
			<a disabled class="btn btn-success btn-sm"><span class="fa fa-check"></span> Bimbingan Telah Selesai</a>
			<?php }

			} else { ?>
			<span>
			<h4>Data Materi </h4>
			</span>
		<?php } ?>
  </div>
  <div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="2%" style="width: 2%"><div align="center">No</div></th>
	    			<th width="20%" style="width: 20%"><div align="center">Materi Bimbingan </div></th>
					<th width="5%" style="width: 5%"><div align="center">Status </div></th>
					<th width="10%" style="width: 10%"><div align="center">Tanggal Update </div></th>
					<th width="2%" style="width: 2%"><div align="center">Edit</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	if ($_SESSION['user_level']=='mahasiswa') {
	    		 	    $where = "WHERE nim='$_SESSION[user_session]'";
	    		 	}else{
	    		 		$where = "";
	    		 	} 		    		    
					$stmt = $db_con->prepare("SELECT * FROM subject where nim='$_SESSION[user_session]' ORDER BY id_subject ASC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div>					    </td>
						<td><?php echo $row['subject']; ?></td>
						<td><div align="center"><?php echo $row['status_bimbingan']; ?></div></td>
						<td><div align="center"><?php echo $row['tgl']; ?></div></td>
					    <td align="center">
												
							<a class="edit-link" href="?apps=materi&act=edit&id=<?php echo $row['id_subject']; ?>" title="Edit">
							   <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
					</tr>
				<?php
					$no++;	
				 	}
				?>
	    	</tbody>
		</table>
	    <p>Catatan : Pengajuan materi bimbingan hanya boleh diadakan min satu hari sekali</p>
	    <?php
	    if ($no < 8){?>
	    	<a class="btn btn-info btn-warning"> Kartu bimbingan dapat diunduh minimal saat status terakhir adalah "Bimbingan 7" </a><?php }
	    else {?>
	    	<a href="apps/app_laporan/kartubimbingan.php" target="_blank" class="btn btn-info btn-sm"> Download Kartu Bimbingan</a>
	    <?php }
	    ?>
	</div>
</div>