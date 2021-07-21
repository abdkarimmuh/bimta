<div class="panel panel-default">
	<div class="panel-heading">
		<span>
			<h4>Pesan Terkait Bimbingan oleh Mahasiswa</h4>
		</span>
  </div>
  <style type="text/css">
  	.circle {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  font-size: 14px;
  background: #9cc;
  line-height: 25px;
  text-align: center;
}
  </style>
	<div class="panel-body">
		<div id="alert"></div>
		<table width="20%" class="table table-hover" id="tbl_users">
			<thead>
	    		<tr>
	    			<th width="2%" style="width: 2%"><div align="center">No</div></th>
	    			<th width="10%" style="width: 10%"><div align="center">Nama</div></th>
	    			<th width="5%" style="width: 5%"><div align="center">Materi</div></th>
	    			<th width="15%" style="width: 15%"><div align="center">Topik Pesan</div></th>
					<th width="7%" style="width: 7%"><div align="center">Tanggal </div></th>
					<th width="5%" style="width: 5%"><div align="center">Comment </div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	$stmt = $db_con->prepare("SELECT * FROM chat_mhs, subject, mahasiswa, prodi where mahasiswa.id_dosen='$_SESSION[user_session]' && chat_mhs.id_subject=subject.id_subject && mahasiswa.nim=chat_mhs.mhs_pengirim && mahasiswa.id_prodi=prodi.id_prodi ORDER BY chat_mhs.tgl DESC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nm_mhs']; ?></div></td>
						<td><div align="center"><?php echo $row['subject']; ?></div></td>
						<td><?php echo $row['topik_pesan']; ?></td>
						<td><div align="center"><?php $tgl=date_create($row['tgl']); echo date_format($tgl, 'd F Y, H:i'); ?></div></td>
						<?php
					    		$message=$row['id_chatmhs'];
					    		$stmt2 = $db_con->prepare("SELECT * FROM comment_bimbingan where id_chatmhs ='$message' && pengirim='mahasiswa' && status_read='0' ");
								$stmt2->execute();
								$check=$stmt2->rowCount(); 
							?>
						<td align="center">
						<?php if($check > 0) { ?> 
						<a href="?apps=pesan&act=viewchat&id=<?php echo $row['id_chatmhs']; ?>" title="Komentar baru"><div align="center" class="circle"><?php echo $check; ?></div>Komentar Masuk <i class="fa fa-commenting" aria-hidden="true"></i></a>
					<?php } else { ?>
						<a class="edit-link" href="?apps=pesan&act=viewchat&id=<?php echo $row['id_chatmhs']; ?>" title="Lihat dan tambah komentar">Komentari Pesan <i class="fa fa-comments" aria-hidden="true"></i></a>
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