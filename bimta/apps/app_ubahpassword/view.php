<style type="text/css">
yl .<!--
.style1 {
	font-family: Harrington;
	font-weight: bold;
}
.style2 {font-family: Georgia, "Harrington", Times, serif}
-->
</style>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4><span class="pull-right style2"><a class="btn btn-info" href="?apps=ubahpassword&act=edit&id=<?php echo $row2['nim']; ?>" title="Ubah password Anda" ><span class="fa fa-edit"></span> Ubah Password</a></span></h4>
      <h4 class="style1">Username dan Password Anda</h4>
      <table width="566" height="82" border="0" align="center">
        <tr>
          <td width="133" height="21">Username</td>
          <td width="16">:</td>
          <td width="393"><?php echo $row2['username']; ?></td>
        </tr>
        <tr>
          <td height="21">Password</td>
          <td>:</td>
          <td><?php echo $row2['password']; ?></td>
        </tr>
		</table>
      <span>
      <p>&nbsp;</p>
  </span></div>
</div>
