<html>
<head>
	<title></title>
  <?php
  require_once ('Api/koneksi.php');
  ?>
</head>
<body>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">

    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"> <span>weddingpage</span></a>
    </div>
    <div class="clearfix"></div>

    <!-- start = profile admin -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="assets/images/admin.png" class="img-circle profile_img">
        </div>

        <div class="profile_info">
          <span>Selamat Datang,</span>
          <h2><?php
              $email = $_SESSION['email'];
              $query = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' ");
              while ($nama=mysqli_fetch_array($query)) {
                  echo $nama['nama'];
              }
              ?>
          </h2>
        </div>
      </div>
      <br />
      <!-- end = profile admin -->

    <!-- start = side menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                  <li><a href="kelolaResepsi.php">Kelola Resepsi</a></li>
                  <li><a href="kelolaSambutan.php">Kelola Sambutan</a></li>
                  <li><a href="kelolaCeritaKita.php">Kelola Cerita Kita</a></li>
                  <li><a href="kelolaWeddingCeremonies.php">Kelola Wedding Ceremonies</a></li>
                  <li><a href="kelolaGallery.php">Kelola GALERI</a></li>
                  <li><a href="kelolaSocialMedia.php">Kelola Social Media</a></li>

              </ul>
            </li>

             <li> <a>  <i class="fa fa-edit"></i> Kelola Tamu Undangan<span class="fa fa-chevron-down"></span>  </a>
              <ul class="nav child_menu">
                <li><a href="tambahTamuUndangan.php">Tambah Tamu Undangan</a></li>
                <li><a href="pesanUntukmu.php">Pesan Untukmu</a></li>
              </ul>
             </li>
            
            <li><a><i class="fa fa-edit"></i> Kelola Pesan <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="massageUnsend.php" > Buat Pesan</a></li>
                <li><a href="messageWait.php"> Menunggu Antrian</a></li>
                <li><a href="messageSuccess.php">Sudah Terkirim</a></li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
    <!-- end = side menu -->

  </div>
</div>
</body>
</html>