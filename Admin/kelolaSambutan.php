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
                
                <div class="row x_title" >
                  <div class="col-md-6">
                    <h3>Kelola Sambutan</h3>
                  </div>
                  <div class="col-md-6">
                    <a href="../index.php#sambutan" class="btn btn-primary " style="float:right;" target="_blank  ">LIHAT WEB</a>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 " >              
                <br>

                <form method="POST" action="updateSambutan.php" class="form-horizontal form-label-left" >
                  <?php
                    $sambutan = mysqli_query($conn,"SELECT * FROM sambutan");
                    while ($tampilSambutan=mysqli_fetch_array($sambutan)) {
                  ?>
                  <input type="text" name="idSambutan" value = "<?php echo $tampilSambutan['idSambutan'];?>" hidden>
                  
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Pembuka Sambutan 
                      
                    </label>
                    
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="pembukaSambutan" value="<?php echo $tampilSambutan['pembukaSambutan'];?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Sambutan 
                    </label>
                    
                    <div class="col-md-6 col-sm-6 ">
                     <textarea class="form-control" name="isiSambutan" rows="3" required><?php echo $tampilSambutan['isiSambutan'];?></textarea>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Penutup Sambutan 
                    </label>
                    
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="penutupSambutan" value="<?php echo $tampilSambutan['penutupSambutan'];?>">
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
