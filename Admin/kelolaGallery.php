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
                    <h3>Kelola Gallery</h3>
                  </div>
                   <div class="col-md-6">
                    <a href="../index.php#gallery" class="btn btn-primary " style="float:right;" target="_blank  ">LIHAT WEB</a>
                  </div>

                </div>

                <div class="col-md-12 col-sm-12 ">              
                <br>

                <form method="POST" action="crudGallery.php" enctype="multipart/form-data" class="form-horizontal form-label-left" >
                  <input type="text" value="tambah" name="kode" hidden>
                  <input type="text" name="idUpdate" value=" " hidden>
                  
                  
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Photo</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" class="form-control" name="judulPhoto" >
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambar" required>
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
                <div class="col-sm-12">
                  <h3>List Gallery</h3>
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Photo</th>
                            <th>Photo</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                            $galery = mysqli_query($conn,"SELECT * FROM galery");
                            $no =1;
                            while ($infoGallery = mysqli_fetch_array($galery)) {
                          ?>
                          <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $infoGallery['judulPhoto'];?></td>                            
                            <td><img src="fileUpload/<?php echo $infoGallery['namaFile']; ?>" width="100px" height="100px"></td>
                            <td><a href="crudGallery.php?id=<?php echo $infoGallery['idGalery'];?>">Hapus</a></td>
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
