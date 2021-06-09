<!DOCTYPE html>
<html>
<head>
     <!-- TABLE STYLES-->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="assets/css/bootstrapp.css" rel="stylesheet" />
    <?php require_once('Admin/Api/koneksi.php'); ?>
</head>
<body>
    <div  class ="col-sm-12">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	        <thead>
    	        <tr>
        	        <th>No</th>
            	    <th>Nama</th>                                         
            	    <th>Alamat</th>                                         
                </tr>
            </thead>
            <tbody>
                <?php
					$tamu = mysqli_query($conn, "SELECT * FROM tamuundangan");
					$no = 1;
					while ($infoTamu = mysqli_fetch_array($tamu)) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $infoTamu['nama']; ?></td>
						<td><?php echo $infoTamu['alamat']; ?></td>
					</tr>
				<?php } ?>                                   
            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
   
</body>
</html>
