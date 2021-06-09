<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Tamu Undangan</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Playball%7CBitter" rel="stylesheet">
	<!-- Stylesheets -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/fluidbox.min.css" rel="stylesheet">
	<link href="assets/css/font-icon.css" rel="stylesheet">
	<link href="assets/css/listTamu/styles.css" rel="stylesheet">
	<link href="assets/css/listTamu/responsive.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-black.png">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lovers+Quarrel&display=swap" rel="stylesheet">


	<?php
	require_once('Admin/Api/koneksi.php');
	?>
</head>

<body>
	<!-- start = Menu -->
	<header>
	<div class="container">
		<a class="logo" href="#"><img src="assets/images/weddinglogo.png" style="width: 20%; " alt="Logo"></a>
		<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="icon icon-bars"></i></div>
		<ul class="main-menu visible-on-click" id="main-menu">
       <!-- <li><a href="index.php">BERANDA</a></li>
        <li><a href="index.php#sambutan">SAMBUTAN</a></li>
        <li><a href="index.php#ceritaKita">CERITA KITA</a></li>
        <li><a href="gallery.php">GALERI</a></li> -->
        <li><a href="index.php"><span style="color: #fff; font-weight:bolder;"><<</span>&emsp; <span style="font-weight: bolder;">kembali</span></a></li>
		<!-- <li><a href="aboutApps.php">TENTANG APLIKASI</a></li>
        <li><a href="Login.php">MASUK</a></li> -->
		<!-- </ul> -->
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


						<h3 class="pre-title" style="color:aliceblue; font-size:50px; font-family: 'Lovers Quarrel', cursive;">List Tamu Undangan</h3>
						<h1 class="title"><?php echo $infoResepsi['namaPria']; ?> <i class="icon icon-heart"></i> <?php echo $infoResepsi['namaWanita']; ?></h1>
					<?php
				}
					?>
					</div>
				</div>
			</div>
		</div>
		<!-- end = konten save the date -->

		<!-- start = untuk list tamu -->
		<section class="section contact-area">
			<div class="container">
				<div class="row">

					<!-- start = untuk table -->
					<div class="col-sm-8">
						<div class="contact-form margin-bottom">
							<div class="row">
								<div class="col-md-12 col-sm-12 ">
									<div class="dashboard_graph">

										<div class="row x_title">
											<div class="col-md-12">
												<h3>Registrasi Kehadiran Anda</h3>
											</div>

										</div>

										<div class="col-md-12 col-sm-12 ">
											<form method="POST" action="">
												<input type="text" name="kodeT" value="tambah" hidden>
												<input type="text" name="idUpdate" value=" " hidden>

												<div class="item form-group">
													<label class="col-form-label col-md-6 col-sm-6 label-align">Nama Anda</label>
													<div class="col-md-12 col-sm-12 ">
														<input type="text" required class="form-control" name="namaTamu" value="">
													</div>
												</div>

												<div class="item form-group">
													<label class="col-form-label col-md-12 col-sm-12 label-align">Nomor Telephone Anda</label>
													<div class="col-md-12 col-sm-12 ">
														<input type="text" required class="form-control" name="noTelp" placeholder="isi dengan no contact whatsapp anda" pattern="^\d{10,12}$" value="">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-12 col-sm-12 label-align">Alamat</label>
													<div class="col-md-12 col-sm-12 ">
														<input type="text" required class="form-control" name="alamat" value="">
													</div>
												</div>
												<div class="item form-group">
													<div class="col-md-6 col-sm-6 offset-md-3">
														<button type="submit" name="reg" class="btn btn-info">Registrasi</button>
													</div>
												</div>

											</form>
											<?php
											if (isset($_POST['reg'])) {
												$namaTamu = $_POST['namaTamu'];
												$no = $_POST['noTelp'];
												$alamat = $_POST['alamat'];
												mysqli_query($conn, "INSERT INTO tamuundangan VALUES ('','$namaTamu','$no','$alamat')");
											}

											?>

										</div>

										<div class="clearfix"></div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- pesan -->

					<div class="col-sm-4">
						<div class="contact-form margin-bottom">
							<h2 class="center-text">Pesan Untuk Pengantin</h2>
							<form method="post">
								<div class="row">
									<form method="POST" action="">
										<div class="col-sm-12 margin-bottom">
											<label>Nama</label>
											<input class="name-input" type="text" name="nama">
											<br>

											<label>Pesan</label>
											<input type="text" class="name-input" name="isi">
										</div>
										<div class="col-sm-12 center-text">
											<button class="btn" name="kirim"><b>Kirim</b></button>
										</div>
									</form>
									<?php
									if (isset($_POST['kirim'])) {
										$namaPengirim = $_POST['nama'];
										$isi = $_POST['isi'];
										mysqli_query($conn, "INSERT INTO pesan VALUES ('','$namaPengirim','$isi')");
									}

									?>


								</div><!-- row -->
							</form>
						</div><!-- contact-form -->
					</div><!-- col-sm-6 -->

					<!-- list tamu -->
					<div class="col-sm-12">

						<div class="contact-form margin-bottom">
							<div class="heading">
								<h2 class="title">List Daftar Tamu</h2>

							</div>


							<iframe src="listTamuu.php" frameborder="0" class="col-sm-12" height="300px"></iframe>


						</div>
					</div>
					<!-- end = untuk table -->
					<div class="col-sm-12">
						<div class="contact-form margin-bottom">
							<div class="row">
								<div class="col-md-12 col-sm-12 ">
									<div class="dashboard_graph">

										<div class="row x_title">
											<div class="col-md-12">
												<h3>List Pesan Masuk</h3>
											</div>

										</div>

										<div class="col-md-12 col-sm-12 ">

											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Pengirim</th>
														<th>Pesan</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$pesanUntukmu = mysqli_query($conn, "SELECT * FROM pesan ORDER BY idPesan DESC");
													$no = 1;
													while ($infoPesan = mysqli_fetch_array($pesanUntukmu)) {
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><?php echo $infoPesan['namaPengirim']; ?></td>
															<td><?php echo $infoPesan['isi']; ?></td>
														</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div><!-- row -->
			</div><!-- container -->
		</section><!-- section -->
		<!-- end = untuk list tamu -->



		<!-- start = footer  -->
		<footer>
			<div class="container center-text">

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
						<li><a href="#"><i class="icon icon-heart"></i></a></li>
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
		<script src="assets/js/scripts.js"></script>




</body>

</html>