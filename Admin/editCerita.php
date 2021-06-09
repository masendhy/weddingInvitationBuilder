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
                    <h3>Kelola Cerita Kita</h3>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 ">              
                <br>
               

                <form method="POST" action="crudCerita.php?id=" enctype="multipart/form-data" class="form-horizontal form-label-left" >
                  <?php
                    $idUpdate = $_GET['idUpdate'];
                    $cerita = mysqli_query($conn,"SELECT * FROM cerita WHERE idCerita = '$idUpdate'");
                    while ($infoCerita=mysqli_fetch_array($cerita)) {      
                  ?>
                    <input type="text" name="kode" value="edit" hidden>
                    <input type="text" name="idUpdate" value="<?php echo $idUpdate;?>" hidden>
                    <input type="text" name="gbrCeritaAsal" value="<?php echo $infoCerita['gambarCerita'];?>" hidden>
                  
                  

                  
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Cerita</label>
                    
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="judulCerita" value="<?php echo $infoCerita['judulCerita'] ;?>" >
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Cerita
                    </label>
                    
                    <div class="col-md-6 col-sm-6 ">
                     <textarea class="form-control" name="isiCerita"><?php echo $infoCerita['isiCerita'] ;?></textarea>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar 
                    </label>
                    
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambar" >
                    </div>
                  </div>

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
