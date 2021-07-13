<div class="panel panel-default">
	<div class="panel-heading">
		<?php if ($_SESSION['user_level']=='jurusan') { ?>
			<a href="?apps=dosen&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Dosen </a>
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
	    			<th width="7%" style="width: 7%"><div align="center">No</div></th>
	    			<th width="25%" style="width: 25%"><div align="center">Nama Dosen </div></th>
	    			<th width="15%" style="width: 15%"><div align="center">NIP Dosen</div></th>
					<th width="10%" style="width: 10%"><div align="center">No Telp/HP </div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php
	    			if ($_SESSION['user_level']=='admin') {
	    		 	    $where = $row3['id_prodi'];
	    		 	}else{
	    		 		$where = "";
	    		 	}							
	    		 	$stmt = $db_con->prepare("SELECT * FROM dosen, prodi, jurusan where prodi.id_prodi=$where && jurusan.id_jurusan=prodi.id_jurusan && dosen.id_jurusan=jurusan.id_jurusan ORDER BY nm_dosen ASC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><?php echo $row['nm_dosen']; ?></td>
						<td><div align="center"><?php echo $row['nip_dosen']; ?></div></td>
						<td><div align="center"><?php echo $row['no_telp']; ?></div></td>
					</tr>
				<?php
					$no++;	
				 	}
				?>
	    	</tbody>
		</table>
	</div>
</div>