<!DOCTYPE HTML>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Playball%7CBitter" rel="stylesheet">
  <!-- Stylesheets -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/fluidbox.min.css" rel="stylesheet">
  <link href="assets/css/font-icon.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="assets/images/logo-black.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/custom.css">

</head>

<body>
  <?php require_once('Admin/Api/koneksi.php'); ?>
  <!-- start = Menu -->
  <!-- <header> -->
  <div class="container">
    <a class="logo" href="#"><img src="assets/images/weddinglogo.png" style="width: 30%; padding-top : 20px;" alt="Logo"></a>
    <!-- <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="icon icon-bars"></i></div> -->
    <!-- <ul class="main-menu visible-on-click" id="main-menu">
       <li><a href="index.php">BERANDA</a></li>
        <li><a href="index.php#sambutan">SAMBUTAN</a></li>
        <li><a href="index.php#ceritaKita">CERITA KITA</a></li>
        <li><a href="gallery.php">GALERI</a></li>
        <li><a href="listTamu.php">TAMU UNDANGAN</a></li> -->
    <!-- <li><a href="aboutApps.php">TENTANG APLIKASI</a></li>
        <li><a href="Login.php">MASUK</a></li> -->
    <!-- </ul> -->
  </div>
  <!-- </header> -->
  <div class="container">
    <div class="row">

      <div class="col-md-12 ">
        <div class="panel panel-default" style="background: white;padding: 20px; border-radius:10px">
          <h2 class="center-text">Login</h2>


          <div class="row">
            <div class="col-sm-4">
            </div>

            <div class="col-sm-4">
              <form method="POST" action="log.php">
                <div class="col-sm-12 margin-bottom">
                  <label>
                    <h4>E-mail</h4>
                  </label><br>
                  <input class="form-control" type="email" name="email">
                  <br><br>

                  <label>
                    <h4>Password</h4>
                  </label><br>
                  <input type="Password" class="form-control" name="password">
                  <br><br>
                </div>

                <div class="col-sm-12 center-text">
                  <button class="btn" name="login"><b>Login Now</b></button>
                </div>

              </form>
            </div>

            <div class="col-sm-4">
            </div>

          </div>
          <br>

        </div>
        <br>
        <br>
      </div>
    </div>
  </div>



  <!-- start = footer  -->
  <footer>
    <div class="container center-text" id="sosmed">

      <div class="logo-wrapper">
        <a class="logo" href="#"><img src="assets/images/weddinglogo2.png" style="width:15%;" alt="Logo Image"></a>
        <br>

        <i class="icon icon-star"></i>
      </div>
      <ul class="social-icons">
        <?php
        $sosmed = mysqli_query($conn, "SELECT * FROM sosmed");
        while ($infoSosmed = mysqli_fetch_array($sosmed)) {


        ?>
          <!-- <li><a href="#"><i class="icon icon-heart"></i></a></li> -->
          <li><a href="<?php echo $infoSosmed['twitter']; ?>" target="_blank"><i class="icon icon-twitter"></i></a></li>
          <li><a href="<?php echo $infoSosmed['ig']; ?>" target="_blank"><i class="icon icon-instagram"></i></a></li>
          <li><a href="<?php echo $infoSosmed['fb']; ?>" target="_blank"><i class="icon icon-facebook"></i></a></li>
        <?php
        }
        ?>
      </ul>
      <!-- <ul class="footer-links">
        <li><a href="index.php">BERANDA</a></li>
        <li><a href="#sambuta">SAMBUTAN</a></li>
        <li><a href="#ceritaKita">CERITA KITA</a></li>
        <li><a href="#gallery">GALERI</a></li>
        <li><a href="listTamu.php">TAMU UNDANGAN</a></li>
      </ul> -->
      <p class="copyright"> Copyright &copy;<script>
          document.write(new Date().getFullYear());
        </script>
        - with <i class="icon-heart" aria-hidden="true"></i> from heejra</p>
    </div>
  </footer>
  <!-- end = footer -->

  <script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/tether.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.countdown.min.js"></script>
  <script src="assets/js/jquery.fluidbox.min.js"></script>
  <script src="assets/js/scripts.js"></script>

</body>

</html>