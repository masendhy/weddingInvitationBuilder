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
                    <h3>Tambah Tamu Undangan</h3>
                  </div>

                </div>
                
                <div class="col-md-9 col-sm-9 ">
                  <form method="POST" action="crudTamu.php?id=">
                    <input type="text" name="kodeT" value="tambah" hidden>
                    <input type="text" name="idUpdate" value=" " hidden>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Tamu Undangan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" required class="form-control" name="namaTamu" value="">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">No Telp</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" required class="form-control" name="noTelp" placeholder="Nomor Hp 10-12 Digit, Contoh : 081809412771"pattern="^\d{10,12}$" value="">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" required class="form-control" name="alamat" value="">
                      </div>
                    </div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-info">Tambah</button>
                      </div>
                    </div>

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
                    <h3>List Tamu Undangan</h3>
                  </div>

                </div>

                <div class="col-md-12 col-sm-12 ">
                 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $tamuUndangan = mysqli_query($conn,"SELECT * FROM tamuundangan");
                    $no =1;
                    while ($infoTamu = mysqli_fetch_array($tamuUndangan)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $infoTamu['nama'];?></td>
                    <td><?php echo $infoTamu['noTelp'];?></td>
                    <td><?php echo $infoTamu['alamat'];?></td>
                    <td><a href="editTamu.php?idUpdate=<?php echo $infoTamu['idTamu'];?>">Edit</a> | <a href="crudTamu.php?id=<?php echo $infoTamu['idTamu'];?>">Hapus</a></td>
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
  </div>

  
  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>
</html>
