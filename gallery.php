<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Wedding Invitation</title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	<?php require_once('Admin/Api/koneksi.php'); ?>
	<!-- start = Menu -->
	<header>
		<a class="logo" href="#"><img src="assets/images/weddinglogo.png" style="width: 30%; padding-left:20px " alt="Logo"></a>
	<div class="container">
		<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="icon icon-bars"></i></div>
		<ul class="main-menu visible-on-click" id="main-menu">
			<!-- <li><a href="index.php" style="font-weight:normal;">kembali</a></li>
			<li><a href="index.php#sambutan">SAMBUTAN</a></li>
			<li><a href="index.php#ceritaKita">CERITA KITA</a></li>
			<li><a href="gallery.php">GALERI</a></li> -->
			<li><a href="index.php"><span style="color: #fff; font-weight:bolder;"><<</span>&emsp; <span style="font-weight: bolder;">kembali</span></a></li>
			<!-- <li><a href="aboutApps.php">TENTANG APLIKASI</a></li>
        	<li><a href="Login.php">MASUK</a></li> -->
		</ul>
	</div>
	</header>
	<!-- end = menu -->


	<!-- start = konten save the date -->
	<?php
	$resepsi = mysqli_query($conn, "SELECT * FROM resepsi");
	while ($infoResepsi = mysqli_fetch_array($resepsi)) {
	?>
		<div class="main-slider" style="background:url(Admin/fileUpload/<?php echo $infoResepsi['fileGambar']; ?>); background-size:cover;">
			<div class="display-table center-text">
				<div class="display-table-cell">
					<div class="slider-content">

						<i class="small-icon icon icon-tie"></i>
						<h3 class="pre-title">Gallery</h3>
						<h1 class="title"><?php echo $infoResepsi['namaPria']; ?> <i class="icon icon-heart"></i> <?php echo $infoResepsi['namaWanita']; ?></h1>
					<?php
				}
					?>
					</div>
				</div>
			</div>
		</div>
		<!-- end = konten save the date -->


		<!-- start = gallery prewedding -->
		<section class="section galery-area center-text" id="gallery">
			<div class="container">
				<div class="row">

					<div class="col-sm-12">

						<div class="heading">
							<h2 class="title">Gallery Prewedding</h2>
							<span class="heading-bottom"><i class="icon icon-star"></i></span>
						</div>

						<div class="image-gallery">

							<!-- start = untuk menampilkan foto -->
							<!-- nanti setting ukuran 600x400 -->
							<div class="row">
								<?php
								$galeri = mysqli_query($conn, "SELECT * FROM galery");
								while ($infoGaleri = mysqli_fetch_array($galeri)) {


								?>
									<div class="col-md-4 col-sm-6">
										<?php
										$judul = $infoGaleri['judulPhoto'];
										if (empty($judul)) {
											echo "<h3> Prewedding </h3>";
										} else if (!empty($judul)) {
											echo "<h3>" . $judul . "</h3>";
										}
										?>
										<a href="Admin/fileUpload/<?php echo $infoGaleri['namaFile']; ?>" data-fluidbox><img class="margin-bottom" src="Admin/fileUpload/<?php echo $infoGaleri['namaFile']; ?>" style="width:350px; height:350px;"></a>
									</div>
								<?php
								}
								?>


							</div>
							<!-- end = untuk tampilkan foto -->



						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- end = galery prewedding -->

		<!-- start = footer  -->
		<footer>
			<div class="container center-text" id="sosmed">

				<div class="logo-wrapper">
					<a class="logo" href="#"><img src="assets/images/weddinglogo2.png" style="width:15%;" alt="Logo Image"></a>
					<br>
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