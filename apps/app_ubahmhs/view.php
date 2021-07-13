<div class="panel panel-default">
	<div class="panel-heading">
		<span>
			<h4>Profil Mahasiswa </h4>
		</span>
		
  <div class="panel-body">
		<div id="alert"></div>
		<table width="565" class="table table-hover" id="mahasiswa">
          
          <tbody>
            <?php							
	    		 	$stmt = $db_con->prepare("SELECT * FROM dosen, mahasiswa, prodi where mahasiswa.id_dosen=dosen.id_dosen && mahasiswa.nim ='$_SESSION[user_session]' && mahasiswa.id_prodi=prodi.id_prodi");
					$stmt->execute(); 
					if($stmt->rowCount() > 0)	{
					$no=1;
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
				?>
          </tbody>
	      	      <tr>
	        <td width="178" rowspan="6"><span class="col-xs-3"><img src="apps/app_ubahmhs/user_images/<?php echo $row['foto']; ?>" class="img-rounded" width="181" height="233" /></span></td>
	        <td width="167"><span style="width: 20%"><strong>NIM</strong></span></td>
	        <td width="10"><strong>:</strong></td>
	        <td width="167"><?php echo $row['nim']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Nama Mahasiswa </strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['nm_mhs']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Program Studi </strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['nama_prodi']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Tahun Bimbingan </strong></span></td>
	        <td><strong>:</strong></td>
	        <td><?php echo $row['th_bimbingan']; ?></td>
          </tr>
	      <tr>
	        <td><span style="width: 40%"><strong>Dosen Pembimbing </strong></span></td>
	        <td><strong>:</strong></td>
            <td><?php echo $row['nm_dosen']; ?></td>
          </tr>
	      <tr>
	        <td colspan="3"><div align="center"><a class="btn btn-info" href="?apps=ubahmhs&amp;act=edit&amp;id=<?php echo $row['nim']; ?>" title="Edit Foto Profil">Edit Foto Profil </a></div></td>
          </tr>
          <?php
			$no++; 
			} } ?>
        </table>
    
  </div>
</div>