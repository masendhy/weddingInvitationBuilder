<!DOCTYPE html>
<html lang="en">
<head>
   <?php 
    require_once('header.php');
    require_once('Api/koneksi.php');
   ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Start = Sidebar -->
      <?php require_once('sidebar.php');?>
      <!-- End = Sidebar -->

      <!-- Start = navbar atas -->
      <?php require_once('topNavigation.php');?>
      <!-- End = navbar atas -->

    
      <!-- Start = table list tamu undangan-->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Edit Data Tamu Undangan</h3>
                  </div>

                </div>
                
                <div class="col-md-9 col-sm-9 ">
                  <form method="POST" action="crudTamu.php?id=">
                    <?php
                      $idUpdate = $_GET['idUpdate'];
                      $tamu = mysqli_query($conn,"SELECT * FROM tamuundangan WHERE idTamu = '$idUpdate'");
                      while ($infoTamu=mysqli_fetch_array($tamu)) {
                      
                    ?>
                    <input type="text" name="kodeT" value="edit" hidden>
                    <input type="text" name="idUpdate" value="<?php echo $idUpdate;?>" hidden>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Tamu Undangan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" required class="form-control" name="namaTamu" value="<?php echo $infoTamu['nama'];?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">No Telp</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" required class="form-control" name="noTelp" placeholder="Nomor Hp 10-12 Digit" value="<?php echo $infoTamu['noTelp'];?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" required class="form-control" name="alamat" value="<?php echo $infoTamu['alamat'];?>">
                      </div>
                    </div>
                    <?php
                      }
                    ?>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="tambahTamuUndangan.php" class="btn btn-secondary  ">Kembali</a>
                        <button type="submit" class="btn btn-info">Ubah</button>
                      </div>
                    </div>

                  </form>


                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          
               
      </div>
    <!-- End = table list tamu undangan -->
    



    <!--  -->
    </div>
  </div>

  
  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>
</html>
