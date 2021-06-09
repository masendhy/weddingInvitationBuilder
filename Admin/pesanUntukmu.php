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
                
              

                 <div class="col-md-9 col-sm-9 ">
                  <form method="POST" >               
                    </form>
            

                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                
                <div class="row x_title">
                  <div class="col-md-6">
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
                    $pesanUntukmu = mysqli_query($conn,"SELECT * FROM pesan ORDER BY idPesan DESC");
                    $no =1;
                    while ($infoPesan = mysqli_fetch_array($pesanUntukmu)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $infoPesan['namaPengirim'];?></td>
                    <td><?php echo $infoPesan['isi'];?></td>                    
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
    <!-- End = table list tamu undangan -->
    



    <!--  -->
    </div>

  
  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>
</html>
