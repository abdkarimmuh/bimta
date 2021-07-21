<div class="panel panel-default">
	<div class="panel-heading">
		<?php
			$stmt2 = $db_con->prepare("SELECT * FROM evaluasi where nim_mhs ='$_SESSION[user_session]'");
			$stmt2->execute();
			$check=$stmt2->rowCount(); 
			if($check != 1) {
		?>
		<a href="?apps=filemahasiswa&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Upload File Tugas Akhir</a>
		<span class="pull-right">
			<h4>Data Tugas Akhir Anda</h4>
	  	</span>
	  	<?php } else { ?>
	  	<a disabled class="btn btn-success btn-sm"><i class="fa fa-check"></i> Bimbingan Telah Selesai</a>
		<span class="pull-right">
			<h4>Data Tugas Akhir Anda</h4>
	  	</span>
	  	<?php } ?>
	</div>
	<div class="panel-body">
		<div id="alert"></div>
		<table class="table table-hover" id="tbl_mahasiswa">
			<thead>
	    		<tr>
	    			<th style="width: 2%"><div align="center">No</div></th>
	    			<th style="width: 7%"><div align="center">Materi Bimbingan</div></th>
	    			<th style="width: 7%"><div align="center">Nama File</div></th>
	    			<th style="width: 5%"><div align="center">View</div></th>
					<th style="width: 2%"><div align="center">Hapus</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php	
	    			$stmt = $db_con->prepare("SELECT * FROM file_mahasiswa, subject where file_mahasiswa.id_subject=subject.id_subject && file_mahasiswa.mhs_pengirim='$_SESSION[user_session]' ORDER BY id_file DESC");						
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
				
				
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['subject']; ?></div></td>
						<td><div align="center"><?php echo $row['file']; ?></div></td>
						<td align="center"><a href="filemahasiswa/<?php echo $row['file'] ?>" target="_blank"><i class="fa fa-file"></i> View File</a></td>
						<td align="center"><a href="?apps=filemahasiswa&act=hapus&id=<?php echo $row['id_file']; ?>" onclick="return confirm('Yakin untuk menghapus file Anda?')" title="Delete">
							   <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
						    </a></td>
						</tr>
				<?php
						$no++;
				 	}
				?>
	    	</tbody>
		</table>
	</div>
</div>