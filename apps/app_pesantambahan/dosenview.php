<div class="panel panel-default">
	<div class="panel-heading">
		<?php if ($_SESSION['user_level']=='dosen') { ?>
			<a href="?apps=pesantambahan&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Kirim Pesan Tambahan </a>
			<span class="pull-right">
			<h4>Pesan Terkirim Anda ke Mahasiswa</h4>
	  </span>
		<?php } ?>
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
	    			<th width="1%" style="width: 1%"><div align="center">No</div></th>
	    			<th width="9%" style="width: 9%"><div align="center">Penerima</div></th>
	    			<th width="15%" style="width: 15%"><div align="center">Topik Pesan</div></th>
					<th width="9%" style="width: 9%"><div align="center">Tanggal</div></th>
					<th width="8%" style="width: 8%"><div align="center">Detail & Comment</div></th>
					<th width="1%" style="width: 1%"><div align="center">Aksi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	$stmt = $db_con->prepare("SELECT * FROM pesan_tambahan, mahasiswa where mahasiswa.id_dosen='$_SESSION[user_session]' && pesan_tambahan.dosen_pengirim='$_SESSION[user_session]' && mahasiswa.nim=pesan_tambahan.mhs_penerima ORDER BY tgl DESC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['nm_mhs']; ?></div></td>
						<td><div align="left"><?php echo $row['topik_pesan']; ?></div></td>
						<td><div align="center"><?php $tgl=date_create($row['tgl']); echo date_format($tgl, 'd F Y, H:i'); ?></div></td>
						<?php
					    		$message=$row['id_pesantambahan'];
					    		$stmt2 = $db_con->prepare("SELECT * FROM comment_tambahan where id_pesantambahan ='$message' && pengirim='mahasiswa' && status_read='0' ");
								$stmt2->execute();
								$check=$stmt2->rowCount(); 

								$stmt3 = $db_con->prepare("SELECT * FROM comment_tambahan where id_pesantambahan ='$message' && pengirim='mahasiswa'");
								$stmt3->execute();
								$check2=$stmt3->rowCount();
							?>
						<td align="center">
						<?php if($check > 0) { ?> 
						<a href="?apps=pesantambahan&act=viewchat&id=<?php echo $row['id_pesantambahan']; ?>" title="Komentar baru"><div align="center" class="circle"><?php echo $check; ?></div>Komentar Baru <i class="fa fa-wechat" aria-hidden="true"></i></a>
					<?php } else { if($check2 == 0) {  ?>
						<a class="edit-link" href="?apps=pesantambahan&act=viewchat&id=<?php echo $row['id_pesantambahan']; ?>" title="Tampilkan detail pesan">Detail Pesan <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
					<?php } else { ?>
						<a class="edit-link" href="?apps=pesantambahan&act=viewchat&id=<?php echo $row['id_pesantambahan']; ?>" title="Lihat komentar">Lihat Komentar <i class="fa fa-comment" aria-hidden="true"></i></a>
					<?php } } ?>
						</td>
					<td><div align="center">
							<a href="?apps=pesantambahan&act=editpesaninti&id=<?php echo $row['id_pesantambahan']; ?>" title="Edit"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
							<?php if($check2 == 0) { ?>
							<a href="?apps=pesantambahan&act=hapuspesaninti&id=<?php echo $row['id_pesantambahan']; ?>" onclick="return confirm('Yakin untuk menghapus pesan Anda?')" title="Delete"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
							<?php } ?>
						</div>
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