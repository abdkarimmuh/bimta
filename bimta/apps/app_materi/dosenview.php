<div class="panel panel-default">
	<div class="panel-heading">
			<span>
			<h4>Materi Bimbingan Mahasiswa</h4>
			</span>
  </div>
	<div class="panel-body">
		<div id="alert"></div>
		<table class="table table-hover" id="tbl_mahasiswa">
			<thead>
	    		<tr>
	    			<th style="width: 2%"><div align="center">No</div></th>
	    			<th style="width: 7%"><div align="center">Program Studi</div></th>
	    			<th style="width: 7%"><div align="center">Nama Mahasiswa</div></th>
	    			<th style="width: 7%"><div align="center">Materi</div></th>
	    			<th style="width: 7%"><div align="center">Status</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php	
	    			$stmt = $db_con->prepare("SELECT * FROM mahasiswa, subject, prodi where mahasiswa.id_dosen='$_SESSION[user_session]' && subject.nim=mahasiswa.nim && prodi.id_prodi=mahasiswa.id_prodi ORDER BY nm_mhs DESC");						
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
				
				
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nama_prodi']; ?></div></td>
						<td><div align="center"><?php echo $row['nm_mhs']; ?></div></td>
						<td><div align="center"><?php echo $row['subject']; ?></div></td>
						<td><div align="center"><?php echo $row['status_bimbingan']; ?></div></td>
					</tr>
				<?php
						$no++;
				 	}
				?>
	    	</tbody>
		</table>
	</div>
</div>