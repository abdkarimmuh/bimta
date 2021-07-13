<div class="panel panel-default">
	<div class="panel-heading">
			<?php
				$prodi = $row3['id_prodi'];
				$stmt2 = $db_con->prepare("SELECT * FROM kaprodi where id_prodi ='$prodi' ");
				$stmt2->execute();
				$check=$stmt2->rowCount(); 
				if($check == 0) {
			?>
			<a href="?apps=kaprodi&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Data Kepala Prodi </a>
			<span class="pull-right">
			<h4>Data Kepala Prodi </h4>
			<?php } else { ?>
			<h4>Data Kepala Prodi </h4>
			<?php } ?>
	</div>
	<div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="5%" style="width: 5%"><div align="center">No</div></th>
	    			<th width="20%" style="width: 20%"><div align="center">Nama Kaprodi</div></th>
	    			<th width="7%" style="width: 7%"><div align="center">NIP Kaprodi</div></th>
					<th width="7%" style="width: 7%"><div align="center">No Telp/HP</div></th>
					<th width="7%" style="width: 7%"><div align="center">Username</div></th>
					<th width="5%" style="width: 5%"><div align="center">Aksi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	if ($_SESSION['user_level']=='admin') {
	    		 	    $where = $row3['id_prodi'];
	    		 	}else{
	    		 		$where = "";
	    		 	}
	    		 	$stmt = $db_con->prepare("SELECT * FROM kaprodi where id_prodi=$where ORDER BY nm_kaprodi ASC");
					$stmt->execute();
					if($stmt->rowCount() > 0)	{
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><?php echo $row['nm_kaprodi']; ?></td>
						<td><div align="center"><?php echo $row['nip_kaprodi']; ?></div></td>
						<td><div align="center"><?php echo $row['no_telp']; ?></div></td>
						<td><div align="center"><?php echo $row['username']; ?></div></td>
					    <td align="center">
												
							<a class="edit-link" href="?apps=kaprodi&act=edit&id=<?php echo $row['id_kaprodi']; ?>" title="Edit">
							   <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>						    </a>
							<a href="?apps=kaprodi&act=hapus&id=<?php echo $row['id_kaprodi']; ?>" onclick="return confirm('Yakin untuk menghapus data?')" title="Delete">
							   <i class="fa fa-trash fa-lg" aria-hidden="true"></i>						    </a>
					</tr>
				<?php
					$no++;	
				 	} } else{ ?>   <div class="alert alert-warning"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Data tidak ditemukan</div>
        <?php   } 	?>
	    	</tbody>
		</table>
	</div>
</div>