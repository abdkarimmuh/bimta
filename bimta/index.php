<?php
	session_start();
	if (isset($_SESSION['user_session'])!="") {
		header("location: home.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Portal Bimbingan Tugas Akhir</title>

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  <link rel="shoutcut icon" href="logo.png">
</head>

<body class="special-page">
  <div class="signin-form">
    <div class="container">
      <form class="" method="post" id="login-form" autocomplete="off">
        <div class="form-signin panel panel-default">
          <div class="panel-body body2">

            <center>
              <img src='logo.png' width='130' height='130' />
              <h4 class="h41">PORTAL BIMBINGAN TUGAS AKHIR</h4>
              <h3 class="h31">BROADBAND MULTIMEDIA</h3>
            </center>
            <hr />
            <div id="error"></div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" name="username" id="username" />
              <span id="check-e"></span>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
            </div>
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col-sm-2">
                <button type="submit" class="btn btn-default btndefault2" name="btn-login" id="btn-login">
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <center>
        <p>&nbsp;</p>
        <p><small style="color: #fff"><span class="style3" style="color: black; font-weight: bold;">BIMTA - BROADBAND MULTIMEDIA
              &copy; <?php echo date('Y');?></span><br>
            <strong><span class="style3"><span style="color: black; class="style3">Jl. Prof. DR. G.A. Siwabessy, Kukusan, Kota Depok, Jawa
                  Barat 16424<br>
                  Developed by : Kukuh Al Ansor
                </span></strong></small> </p>
      </center>
    </div>
  </div>

  <script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/validation.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>