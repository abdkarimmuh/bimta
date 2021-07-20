<style type="text/css">
.style1 {
	font-family: Harrington;
	font-weight: bold;
}
.style2 {font-family: Georgia, "Harrington", Times, serif}
</style>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4><span class="pull-right style2"><?php if ($_SESSION['user_level']=='mahasiswa') {echo "Profil Mahasiswa";} elseif ($_SESSION['user_level']=='admin') {?> <a class="btn btn-info" href="?apps=admin2&act=edit&id=<?php echo $row3['id_admin']; ?>" title="click for edit"><span class="glyphicon glyphicon-edit"></span> Edit Profil Admin</a> <?php } elseif ($_SESSION['user_level']=='kaprodi') {?> <a class="btn btn-info" href="?apps=kaprodi2&act=edit&id=<?php echo $row4['id_kaprodi']; ?>" title="click for edit" ><span class="glyphicon glyphicon-edit"></span> Edit Profil Kaprodi</a> <?php } elseif ($_SESSION['user_level']=='dosen') {?> <a class="btn btn-info" href="?apps=dosen2&act=edit&id=<?php echo $row['id_dosen']; ?>" title="click for edit" ><span class="glyphicon glyphicon-edit"></span> Edit Profil Dosen</a> <?php } ?></span></h4>
      <h4 class="style1">Profil Anda</h4>
      <table width="566" height="160" border="0" align="center">
        <tr>
          <td width="133"><?php if ($_SESSION['user_level']=='dosen') {echo "Nama dosen";} elseif ($_SESSION['user_level']=='mahasiswa') {echo "Nama Mahasiswa";} elseif ($_SESSION['user_level']=='admin') {echo "Nama admin";} elseif ($_SESSION['user_level']=='kaprodi') {echo "Nama Kaprodi";}?></td>
          <td width="16">:</td>
          <td width="393"><?php if ($_SESSION['user_level']=='dosen') {echo $row['nm_dosen'];} elseif ($_SESSION['user_level']=='mahasiswa') {echo $row2['nm_mhs'];} elseif ($_SESSION['user_level']=='admin') {echo $row3['nm_admin'];} elseif ($_SESSION['user_level']=='kaprodi') {echo $row4['nm_kaprodi'];}?></td>
        </tr>
        <?php if ($_SESSION['user_level']=='dosen') {?>
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td><?php echo $row['nip_dosen'];?></td>
        </tr><?php } else {echo"";}?>
        <?php if ($_SESSION['user_level']=='kaprodi') {?>
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td><?php echo $row4['nip_kaprodi'];?></td>
        </tr><?php } else {echo"";}?>
        <tr>
          <td><?php if ($_SESSION['user_level']=='dosen') {echo "No Telp/HP";} elseif ($_SESSION['user_level']=='mahasiswa') {echo "Nim";} elseif ($_SESSION['user_level']=='admin') {echo "No Telp/HP";} elseif ($_SESSION['user_level']=='kaprodi') {echo "No Telp/HP";}?> </td>
          <td>:</td>
          <td><?php if ($_SESSION['user_level']=='dosen') {echo $row['no_telp'];} elseif ($_SESSION['user_level']=='mahasiswa') {echo $row2['id_mahasiswa'];} elseif ($_SESSION['user_level']=='admin') {echo $row3['no_telp'];} elseif ($_SESSION['user_level']=='kaprodi') {echo $row4['no_telp'];}?></td>
        </tr>
        <tr>
          <td><?php if ($_SESSION['user_level']=='dosen') {echo "Username";} elseif ($_SESSION['user_level']=='mahasiswa') {echo "Bimbingan";} elseif ($_SESSION['user_level']=='admin') {echo "Username";} elseif ($_SESSION['user_level']=='kaprodi') {echo "Username";}?></td>
          <td>:</td>
          <td><?php if ($_SESSION['user_level']=='dosen') {echo $row['username'];} elseif ($_SESSION['user_level']=='mahasiswa') {echo $row2['id_bimbingan'];} elseif ($_SESSION['user_level']=='admin') {echo $row3['username'];} elseif ($_SESSION['user_level']=='kaprodi') {echo $row4['username'];}?></td>
        </tr>
        <tr>
          <td><?php if ($_SESSION['user_level']=='dosen') {echo "Password";} elseif ($_SESSION['user_level']=='mahasiswa') {echo "Thn Angkatan";} elseif ($_SESSION['user_level']=='admin') {echo "Password";} elseif ($_SESSION['user_level']=='kaprodi') {echo "Password";}?> </td>
          <td>:</td>
          <td><?php if ($_SESSION['user_level']=='dosen') {echo $row['password'];} elseif ($_SESSION['user_level']=='mahasiswa') {echo $row2['th_angkatan'];} elseif ($_SESSION['user_level']=='admin') {echo $row3['password'];} elseif ($_SESSION['user_level']=='kaprodi') {echo $row4['password'];}?></td>
        </tr>
		</table>
      <span>
      <p>&nbsp;</p>
  </span></div>
</div>
