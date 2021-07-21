<div class="panel panel-default">
	<div class="panel-heading">
		<?php
			$stmt2 = $db_con->prepare("SELECT * FROM evaluasi where nim_mhs ='$_SESSION[user_session]'");
			$stmt2->execute();
			$check=$stmt2->rowCount(); 
			if($check != 1) {
		?>
		<a href="?apps=pesan&amp;act=add" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Kirim Pesan</a>
		<span class="pull-right">
			<h4>Pesan Terkirim Anda ke Dosen Pembimbing </h4>
	  	</span>
	  	<?php } else { ?>
	  	<a disabled class="btn btn-success btn-sm"><i class="fa fa-check"></i> Bimbingan Telah Selesai</a>
		<span class="pull-right">
			<h4>Data Tugas Akhir Anda</h4>
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
	    			<th width="2%" style="width: 2%"><div align="center">No</div></th>
	    			<th width="7%" style="width: 7%"><div align="center">Materi Bimbingan</div></th>
	    			<th width="11%" style="width: 11%"><div align="center">Topik Pesan</div></th>
					<th width="11%" style="width: 11%"><div align="center">Tanggal</div></th>
					<th width="8%" style="width: 8%"><div align="center">Detail & Comment</div></th>
					<th width="1%" style="width: 1%"><div align="center">Aksi</div></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php							
	    		 	if ($_SESSION['user_level']=='mahasiswa') {
	    		 	    $where = "WHERE nim='$_SESSION[user_session]'";
	    		 	}else{
	    		 		$where = "";
	    		 	} 		    		   
					$stmt = $db_con->prepare("SELECT chat_mhs.*, subject.subject FROM chat_mhs, subject where chat_mhs.id_subject=subject.id_subject && chat_mhs.mhs_pengirim='$_SESSION[user_session]' ORDER BY id_chatmhs DESC");
					$stmt->execute();
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><div align="center"><?php echo $no; ?></div></td>
						<td><div align="center"><?php echo $row['subject']; ?></div></td>
						<td align="center" ><?php echo $row['topik_pesan']; ?></td>
						<td><div align="center"><?php $tgl=date_create($row['tgl']); echo date_format($tgl, 'd F Y, H:i'); ?></div></td>
					    	
					    	<?php
					    		$message=$row['id_chatmhs'];
					    		$stmt2 = $db_con->prepare("SELECT * FROM comment_bimbingan where id_chatmhs ='$message' && pengirim='dosen' && status_read='0' ");
								$stmt2->execute();
								$check=$stmt2->rowCount(); 

								$stmt3 = $db_con->prepare("SELECT * FROM comment_bimbingan where id_chatmhs ='$message' && pengirim='dosen'");
								$stmt3->execute();
								$check2=$stmt3->rowCount();
							?>
						<td align="center">
						<?php if($check > 0) { ?> 
						<a href="?apps=pesan&act=viewchat&id=<?php echo $row['id_chatmhs']; ?>" title="Komentar baru"><div align="center" class="circle"><?php echo $check; ?></div>Komentar Baru <i class="fa fa-wechat" aria-hidden="true"></i></a>
					<?php } else { if($check2 == 0) { ?>
						<a class="edit-link" href="?apps=pesan&act=viewchat&id=<?php echo $row['id_chatmhs']; ?>" title="Tampilkan detail pesan">Detail Pesan <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
					<?php } else { ?>
						<a class="edit-link" href="?apps=pesan&act=viewchat&id=<?php echo $row['id_chatmhs']; ?>" title="Lihat komentar">Lihat Komentar <i class="fa fa-comment" aria-hidden="true"></i></a>
					<?php } } ?></td>
						<td><div align="center">
							<a href="?apps=pesan&act=editpesaninti&id=<?php echo $row['id_chatmhs']; ?>" title="Edit"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
							<?php if($check2 == 0) { ?>
							<a href="?apps=pesan&act=hapuspesaninti&id=<?php echo $row['id_chatmhs']; ?>" onclick="return confirm('Yakin untuk menghapus pesan Anda?')" title="Delete"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
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