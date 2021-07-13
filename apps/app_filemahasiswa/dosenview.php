<div class="panel panel-default">
	<div class="panel-heading">
		<span>
			<h4>File Mahasiswa Terkait Bimbingan</h4>
			</span>
  </div>
	<div class="panel-body">
		<div id="alert"></div>
		<table class="table table-hover" id="tbl_mahasiswa">
			<thead>
	    		<tr>
	    			<th style="width: 1%"><div align="center">No</div></th>
	    			<th style="width: 10%"><div align="center">Nama Mahasiswa</div></th>
	    			<th style="width: 10%"><div align="center">Prodi</div></th>
	    			<th style="width: 7%"><div align="center">Materi Bimbingan</div></th>
	    			<th style="width: 5%"><div align="center">File</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php	
	    			$stmt = $db_con->prepare("SELECT * FROM file_mahasiswa, subject, mahasiswa, prodi where subject.nim=file_mahasiswa.mhs_pengirim && mahasiswa.id_dosen='$_SESSION[user_session]' && prodi.id_prodi=mahasiswa.id_prodi && subject.id_subject=file_mahasiswa.id_subject && file_mahasiswa.mhs_pengirim=mahasiswa.nim ORDER BY nm_mhs DESC");						
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
				
				
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nm_mhs']; ?></div></td>
						<td><div align="center"><?php echo $row['nama_prodi']; ?></div></td>
						<td><div align="center"><?php echo $row['subject']; ?></div></td>
						<td align="center"><a href="filemahasiswa/<?php echo $row['file'] ?>" target="_blank"><span class="fa fa-file"></span> View File</a></td>
					</tr>
				<?php
						$no++;
				 	}
				?>
	    	</tbody>
		</table>
	</div>
</div>