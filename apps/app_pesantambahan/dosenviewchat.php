<div class="panel panel-default">
	<div class="panel-heading">
		<span>
			<h3>Komentar Pesan Tambahan</h3>
		</span>
		
<style>
.w3-padding{padding:8px 16px!important}
.w3-panel{
	padding:0.01em 16px;
	margin-top:6px;margin-bottom:6px;
}
.w3-panel2{
	padding:0.01em 16px;
	margin-top:0px;margin-bottom:26px;
}
.w3-topbar{border-top:6px solid #ccc!important}.w3-bottombar{border-bottom:6px solid #ccc!important}
.w3-border-color,.w3-hover-border-amber:hover{border-color:#add8e6!important}
.w3-subject,.w3-hover-teal:hover{color:#000!important;background-color:#ffffff!important}
.w3-mhs,.w3-hover-teal:hover{color:#000!important;background-color:#add8e6!important}
.w3-dosen,.w3-hover-khaki:hover{color:#000!important;background-color:#d2b48c!important}
.w3-right-align{text-align:right!important}
.letak-button {
    float: right;
}
.time-right {
    float: right;
    color: #708090;
}
.time-left {
    float: left;
    color: #708090;
}
.color_text {
    color: #708090;
}
</style>

<div class="panel-body">

<?php 
	$id = $_GET['id'];
	$edit = $db_con->query("SELECT pesan_tambahan.*, mahasiswa.nm_mhs, prodi.nama_prodi FROM pesan_tambahan, mahasiswa, prodi WHERE id_pesantambahan='$id' && mahasiswa.id_prodi=prodi.id_prodi && mahasiswa.id_dosen='$_SESSION[user_session]' && pesan_tambahan.dosen_pengirim='$_SESSION[user_session]' && mahasiswa.nim=pesan_tambahan.mhs_penerima");
	$row = $edit->fetch(PDO::FETCH_ASSOC);
	
?>

<div class="w3-panel2 w3-subject w3-topbar w3-bottombar w3-border-color">
<h4><strong>Topik : <?php echo $row['topik_pesan']; ?></strong></h4>
<p><?php echo $row['pesan']; ?></p>
<p>Dikirim untuk : <?php echo $row['nm_mhs']; ?> | <?php echo $row['nama_prodi']; ?></p>
<p class="color_text"><i class="fa fa-calendar-o"></i> <?php $tgl=date_create($row['tgl']); echo date_format($tgl, 'd F Y, H:i'); ?></p>
</div>

<?php							
	$stmt = $db_con->prepare("SELECT comment_tambahan.*, pesan_tambahan.id_pesantambahan, dosen.nm_dosen, mahasiswa.nm_mhs FROM comment_tambahan, pesan_tambahan, dosen, mahasiswa where comment_tambahan.id_pesantambahan=pesan_tambahan.id_pesantambahan && comment_tambahan.id_pesantambahan='$id' && pesan_tambahan.id_pesantambahan='$id' && dosen.id_dosen='$_SESSION[user_session]' && mahasiswa.id_dosen=dosen.id_dosen && mahasiswa.nim=pesan_tambahan.mhs_penerima ORDER BY id_comment ASC");
	$stmt->execute();
	$no=1;
	while($row_2=$stmt->fetch(PDO::FETCH_ASSOC)) {
		if($row_2['pengirim']=="mahasiswa"){
?>

<div class="w3-panel w3-padding w3-dosen col-sm-9 col-sm-offset-0">
<h5><strong><?php echo $row_2['nm_mhs']; ?></strong></h5>
<p><?php echo $row_2['comment']; ?></p>
<span class="time-left"><?php $tgl2=date_create($row_2['tgl']); echo date_format($tgl2, 'd F Y, H:i'); ?></span>
</div>

<?php } else { ?>

<div class="w3-panel w3-padding w3-mhs w3-right-align col-sm-9 col-sm-offset-3">
<h5><strong><?php echo $row_2['nm_dosen']; ?></strong></h5>
<p><?php echo $row_2['comment']; ?></p>
<p class="time-right"><?php if ($row_2['status_read']=="1") { echo "Read"; } elseif ($row_2['status_read']=="0") { echo "Unread"; } ?> | <?php $tgl2=date_create($row_2['tgl']); echo date_format($tgl2, 'd F Y, H:i'); ?> | <a href="?apps=pesantambahan&act=hapus&id=<?php echo $row_2['id_comment']; ?>" onclick="return confirm('Yakin untuk menghapus komentar?')" title="Delete"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></p>
</div>

<?php } } ?>
		<form action="" method="POST" class="form-horizontal" role="form">
				
				<div class="form-group">
					<div class="col-sm-12">
						<input type="hidden" name="pengirim" value="<?php if ($_SESSION['user_level']=='mahasiswa') { echo "mahasiswa"; } else { echo "dosen"; } ?>">
						<input type="hidden" name="id_pesantambahan" value="<?php echo $id; ?>">
						<textarea type="text" name="comment" placeholder="Type your comment" value="" id="input" class="form-control" required="required"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<a href="?apps=pesantambahan" class="letak-button btn btn-warning">Kembali</a>
						<button name="kirim_comment" type="submit" class="letak-button btn btn-primary"><span class="fa fa-send"></span> Kirim</button>
					</div>
				</div>
		</form>

</div>
</div>