<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once('header.php'); ?>
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

    
      <!-- Start = isi konten -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                
                <div class="row x_title">
                  <div class="col-md-4">
                    <br>
                    <h3>Kelola Pesan</h3>
                    <br>
                  </div>
                  <div class="col-md-8">
                    <iframe name="sinkron"  src="Api/autosinkron2.php" width="100%" height="50px" frameborder="0" style="margin-top:10px;"></iframe>
                  </div>

                  
                </div>
                 <div class="col">
                  <iframe name="frm" src="Api/belum_dikirim.php"frameborder="0" width="100%" height="800px"></iframe>
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
