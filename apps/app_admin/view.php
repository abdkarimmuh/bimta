<div class="panel panel-default">
	<div class="panel-heading">
		<?php if ($_SESSION['user_level']=='jurusan') { ?>
			<a href="?apps=admin&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Admin </a>
			<span class="pull-right">
			<h4>Data Admin </h4>
	  </span>
		<?php } else { ?>
			<span>
			<h4>Data Admin </h4>
			</span>
		<?php } ?>
  </div>
	<div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="2%" style="width: 2%"><div align="center">No</div></th>
	    			<th width="10%" style="width: 10%"><div align="center">Program Studi</div></th>
	    			<th width="10%" style="width: 10%"><div align="center">Nama Admin</div></th>
					<th width="7%" style="width: 7%"><div align="center">No Telp/HP</div></th>
					<th width="5%" style="width: 5%"><div align="center">Username</div></th>
					<th width="3%" style="width: 3%"><div align="center">Aksi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	$stmt = $db_con->prepare("SELECT * FROM admin_prodi, prodi where admin_prodi.id_prodi = prodi.id_prodi && prodi.id_jurusan='$_SESSION[user_session]' ORDER BY nm_admin ASC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nama_prodi']; ?></div></td>
						<td><div align="center"><?php echo $row['nm_admin']; ?></div></td>
						<td><div align="center"><?php echo $row['no_telp']; ?></div></td>
						<td><div align="center"><?php echo $row['username']; ?></div></td>
					    <td align="center">
												
							<a class="edit-link" href="?apps=admin&act=edit&id=<?php echo $row['id_admin']; ?>" title="Edit">
							   <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>						    </a>
							<a href="?apps=admin&act=hapus&id=<?php echo $row['id_admin']; ?>" onclick="return confirm('Yakin untuk menghapus data?')" title="Delete">
							   <i class="fa fa-trash fa-lg" aria-hidden="true"></i>						    </a>
					</tr>
				<?php
					$no++;	
				 	}
				?>
	    	</tbody>
		</table>
		<p>Catatan : Default password adalah <?php $today=date("mY"); echo $today; ?>. Anda wajib menyarankan pergantian password terhadap admin yang bersangkutan.</p>
	</div>
</div>