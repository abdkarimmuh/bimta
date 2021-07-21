<div class="panel panel-default">
	<div class="panel-heading">
			<a href="?apps=mahasiswa&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Mahasiswa</a>
			<a href="apps/app_laporan/datamahasiswa.php" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-file"></i> Laporan Evaluasi</a>
			<span class="pull-right"><h4>Data Mahasiswa </h4></span>
  </div>
	<div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="2%" style="width: 2%"><div align="center">No</div></th>
	    			<th width="3%" style="width: 3%"><div align="center">NIM</div></th>
	    			<th width="17%" style="width: 17%"><div align="center">Nama</div></th>
					<th width="17%" style="width: 17%"><div align="center">Dosen Pembimbing</div></th>
					<th width="2%" style="width: 2%"><div align="center">Username</div></th>
					<th width="2%" style="width: 2%"><div align="center">Aksi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	if ($_SESSION['user_level']=='admin') {
	    		 	    $where = $row3['id_prodi'];
	    		 	}else{
	    		 		$where = "";
	    		 	}		    		    
					$stmt = $db_con->prepare("SELECT mahasiswa.*, dosen.nm_dosen FROM mahasiswa, dosen where mahasiswa.id_prodi=$where && mahasiswa.id_dosen=dosen.id_dosen ORDER BY nm_mhs ASC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nim']; ?></div></td>
						<td><div align="center"><?php echo $row['nm_mhs']; ?></div></td>
						<td><div align="center"><?php echo $row['nm_dosen']; ?></div></td>
						<td><div align="center"><?php echo $row['username']; ?></div></td>
					    <td align="center">
							<?php
								$no_edit=$row['nim'];
								$stmt2 = $db_con->prepare("SELECT * FROM judul_ta where nim ='$no_edit' ");
								$stmt2->execute();
								$check=$stmt2->rowCount(); 

								$stmt3 = $db_con->prepare("SELECT * FROM evaluasi where nim_mhs ='$no_edit' ");
								$stmt3->execute();
								$check2=$stmt3->rowCount();

								if($check == 0) {
							?>					
							<a class="edit-link" href="?apps=mahasiswa&act=edit&id=<?php echo $row['nim']; ?>" title="Edit"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
							<a href="?apps=mahasiswa&act=hapus&id=<?php echo $row['nim']; ?>" onclick="return confirm('Yakin untuk menghapus data?')" title="Delete"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
						<?php } else { if($check2 == 0) { ?>
							<div align="center"><a class="btn btn-danger" disabled title="Mahasiswa sudah dalam masa bimbingan">Masa Bimbingan</a></div>
						<?php } else { ?>
							<div align="center"><a class="btn btn-success" href="?apps=evaluasi&amp;act=lihatevaluasi&amp;id=<?php echo $row['nim']; ?>" title="Lihat Evaluasi"> <span class="fa fa-graduation-cap"></span> Lihat Evaluasi</a></div>
						<?php } } ?>
						</td>
					</tr>
				<?php
					$no++;	
				 	} ?>
	    	</tbody>
		</table>
		<p>Catatan : Default password adalah <?php $today=date("mY"); echo $today; ?>. Anda wajib menyarankan pergantian password terhadap mahasiswa yang bersangkutan.</p>
	</div>
</div>