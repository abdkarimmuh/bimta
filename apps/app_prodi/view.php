<div class="panel panel-default">
	<div class="panel-heading">
		<?php if ($_SESSION['user_level']=='admin') { ?>
			<a href="?apps=prodi&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Prodi </a>
			<span class="pull-right">
			<h4>Data Prodi </h4>
	  		</span>
		<?php } else { ?>
			<span>
			<h4>Data Prodi </h4>
			</span>
		<?php } ?>
  </div>
	<div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="3%" style="width: 3%"><div align="center">No</div></th>
	    			<th width="10%" style="width: 10%"><div align="center">Program Studi</div></th>
	    			<th width="10%" style="width: 10%"><div align="center">Jenjang Pendidikan</div></th>
					<th width="5%" style="width: 5%"><div align="center">Aksi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
					$stmt = $db_con->prepare("SELECT * FROM prodi ORDER BY nama_prodi ASC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nama_prodi']; ?></div></td>
						<td><div align="center"><?php echo $row['jenjang']; ?></div></td>
					    <td align="center">
							
							<a class="edit-link" href="?apps=prodi&act=edit&id=<?php echo $row['id_prodi']; ?>" title="Edit"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>

							<a href="?apps=prodi&act=hapus&id=<?php echo $row['id_prodi']; ?>" title="Delete" onclick="return confirm('Yakin untuk menghapus data?')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
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