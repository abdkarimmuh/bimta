<div class="panel panel-default">
	<div class="panel-heading">
		<a href="apps/app_laporan/datamahasiswa.php" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-download"></i> Unduh Laporan Evaluasi</a>
			<span class="pull-right"><h4>Data Mahasiswa </h4></span>
  </div>
	<div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="2%" style="width: 2%"><div align="center">No</div></th>
	    			<th width="3%" style="width: 3%"><div align="center">NIM</div></th>
	    			<th width="13%" style="width: 13%"><div align="center">Nama Mahasiswa</div></th>
					<th width="22%" style="width: 22%"><div align="center">Dosen Pembimbing</div></th>
					<th width="3%" style="width: 3%"><div align="center">Evaluasi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	if ($_SESSION['user_level']=='kaprodi') {
	    		 	    $where = $row4['id_prodi'];;
	    		 	}else{
	    		 		$where = "";
	    		 	}
	    		 	$stmt = $db_con->prepare("SELECT * FROM mahasiswa, dosen where id_prodi=$where && dosen.id_dosen=mahasiswa.id_dosen ORDER BY nm_mhs ASC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nim']; ?></div></td>
						<td><div align="center"><?php echo $row['nm_mhs']; ?></div></td>
						<td><div align="center"><?php echo $row['nm_dosen']; ?></div></td>
						<td>
							<?php
								$evaluasi=$row['nim'];
								$stmt2 = $db_con->prepare("SELECT * FROM evaluasi where nim_mhs ='$evaluasi' ");
								$stmt2->execute();
								$check=$stmt2->rowCount(); 
								if($check == 1) {
							?>
							<div align="center"><a class="btn btn-success" href="?apps=evaluasi&amp;act=lihatevaluasi&amp;id=<?php echo $row['nim']; ?>" title="Lihat Evaluasi"> <span class="fa fa-graduation-cap"></span> Lihat Evaluasi</a></div>
							<?php } else { ?>
							<div align="center"><a class="btn btn-danger" disabled title="Lihat Evaluasi">Belum dievaluasi</a></div>
							<?php } ?>
						</td>
					</tr>
				<?php
					$no++;	
				 	}
				?>
	    	</tbody>
		</table>
	</div>
</div>