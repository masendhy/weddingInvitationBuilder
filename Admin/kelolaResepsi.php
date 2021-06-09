<!DOCTYPE html>
<html lang="en">
<head>
   <?php 
   //koneksi
   require_once ('Api/koneksi.php');
   //header
   require_once('header.php'); ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Start = Sidebar -->
      <?php 
      //sidebar
      require_once('sidebar.php');
      //navbar atas
      require_once('topNavigation.php');
      ?>
     
    
      <!-- Start = isi konten -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Kelola Resepsi</h3>
                  </div>
                  <div class="col-md-6">
                    <a href="../index.php#home" class="btn btn-primary " style="float:right;" target="_blank  ">LIHAT WEB</a>
                  </div>
                 
                </div>

                <div class="col-md-12 col-sm-12 ">              
                <br>
                 
                <form method="POST" action="updateResepsi.php" class="form-horizontal form-label-left" enctype="multipart/form-data">
                  <?php
                    $resepsi = mysqli_query($conn,"SELECT * FROM resepsi");
                    while ($tampilResepsi=mysqli_fetch_array($resepsi)) {
                  ?>
                  <input type="text" name="gambarAsal" value="<?php echo $tampilResepsi['fileGambar'];?>" hidden>
                  <input type="text" name="gambarGedungL" value="<?php echo $tampilResepsi['gambarGedung'];?>" hidden>
                  <input type="text" name="idResepsi" value = "<?php echo $tampilResepsi['idResepsi'];?>" hidden>

                  
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mempelai Pria </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="namaPria" value="<?php echo $tampilResepsi['namaPria'];?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mempelai Wanita</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="namaWanita" value="<?php echo $tampilResepsi['namaWanita'];?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Resepsi</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="date" required class="form-control" name="tglResepsi" value="<?php echo $tampilResepsi['tglResepsi'];?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jam Resepsi</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="time" required class="form-control" name="jamResepsi" value="<?php echo $tampilResepsi['jamResepsi'];?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat resepsi</label>
                    <div class="col-md-6 col-sm-6 ">
                     <textarea class="form-control" name="alamatResepsi" rows="3" required><?php echo $tampilResepsi['alamatResepsi'];?></textarea>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Gedung</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="namaGedung" value="<?php echo $tampilResepsi['namaGedung'];?>">
                    </div>
                  </div>
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar Gedung Resepsi</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambarGedung">
                      <label>Ukuran Gambar Yang Direkomendasikan adalah 535x350 px</label>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar Background</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambar">
                      <label>Ukuran Gambar Yang Direkomendasikan adalah 700x380 px</label>
                    </div>
                  </div>
                  <?php
                    }
                  ?>

                  
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                 
                </form>
                </div>
                
                <div class="clearfix"></div>

              </div>
            </div>
          </div>
        <br/>       
      </div>
    <!-- End = isi konten -->
    



    <!--  -->
    </div>
  </div>

  
  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>
</html>
