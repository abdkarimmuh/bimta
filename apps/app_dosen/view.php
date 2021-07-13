<div class="panel panel-default">
	<div class="panel-heading">
		<?php if ($_SESSION['user_level']=='jurusan') { ?>
			<a href="?apps=dosen&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Dosen </a>
			<span class="pull-right">
			<h4>Data dosen </h4>
	  </span>
		<?php } else { ?>
			<span>
			<h4>Data Dosen </h4>
			</span>
		<?php } ?>
  </div>
	<div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="2%" style="width: 2%"><div align="center">No</div></th>
	    			<th width="22%" style="width: 22%"><div align="center">Nama Dosen </div></th>
	    			<th width="5%" style="width: 5%"><div align="center">NIP </div></th>
					<th width="5%" style="width: 5%"><div align="center">No Telp/HP </div></th>
					<th width="5%" style="width: 5%"><div align="center">Username </div></th>
					<th width="3%" style="width: 3%"><div align="center">Aksi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	if ($_SESSION['user_level']=='jurusan') {
	    		 	    $where = "WHERE id_jurusan='$_SESSION[user_session]'";
	    		 	}else{
	    		 		$where = "";
	    		 	} 		    		    
					$stmt = $db_con->prepare("SELECT * FROM dosen $where ORDER BY nm_dosen ASC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><?php echo $row['nm_dosen']; ?></td>
						<td><div align="center"><?php echo $row['nip_dosen']; ?></div></td>
						<td><div align="center"><?php echo $row['no_telp']; ?></div></td>
						<td><div align="center"><?php echo $row['username']; ?></div></td>
					    <td align="center">
												
							<a class="edit-link" href="?apps=dosen&act=edit&id=<?php echo $row['id_dosen']; ?>" title="Edit"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
							<?php
								$no_delete=$row['id_dosen'];
								$stmt2 = $db_con->prepare("SELECT * FROM mahasiswa where id_dosen ='$no_delete' ");
								$stmt2->execute();
								$check=$stmt2->rowCount(); 
								if($check == 0) {
							?>
							<a href="?apps=dosen&act=hapus&id=<?php echo $row['id_dosen']; ?>" onclick="return confirm('Yakin untuk menghapus data?')" title="Delete"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
						<?php } else { ?>
							<a title="Tidak diizinkan untuk menghapus data"><i class="fa fa-trash text-danger fa-lg"></i></a>
						<?php } ?>
						</td>
					</tr>
				<?php
					$no++;	
				 	}
				?>
	    	</tbody>
		</table>
		<p>Catatan : Default password adalah <?php $today=date("mY"); echo $today; ?>. Anda wajib menyarankan pergantian password terhadap dosen yang bersangkutan.</p>
	</div>
</div>