<html>
<head>
	<link href="../../assets/css/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="../../assets/css/bootstrapp.css" rel="stylesheet" />
	
	<?php
		error_reporting(~E_NOTICE);
		require_once "koneksi.php";
		include('lib/paginator.class.2.php');
		$pages = new Paginator;
	?>
</head>
<body>

			<?php
				$sql1 = " select * from data_wa where (status <> 'SENT' and status<>'QUEUE') or status is null order by id_msg desc";
				$result1 = mysqli_query($conn,$sql1);

				// $sql2 = "select count(*) JML from ($sql1) x ";
				// $result2 = mysqli_query($conn,$sql2);
				// $data2 = mysqli_fetch_array($result2,MYSQL_ASSOC);


				// $pages->items_total = $data2['JML'];
				// $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
				$pages->paginate();

				$batasan = str_replace("and",",", $pages->limit );

				$sql = " $sql1 LIMIT $batasan ";
				$result = mysqli_query($conn,$sql);
				?>
				<div class="col-sm-12">
					<h3>Yuk Kirim Undangan</h3>
					<h5>Menu ini berfungsi untuk mengirim pesan WA agar bisa di broadcast ke semua tamu undangan yang telah terdaftar</h5>
					<table class="table table-striped table-bordered table-hover" id="dataTables-example""table table-striped table-hover">
						<thead>
							<tr >
								<th>NO WA</th>
								<th>STATUS</th>
								<th>ISI PESAN WA</th>
								<th>VAR_1</th>
								<th>VAR_2</th>
								<th>Action</th>
							
							</tr>
						</thead>
						<tbody>
						<?php 
						while ($data = mysqli_fetch_array($result,MYSQL_ASSOC)){
							$id_msg = $data[ID_MSG];
							$no_wa = $data[NO_WA];
							$status = $data[STATUS];
							$format_wa = $data[FORMAT_WA];
							$isi_wa = $data[ISI_WA];
							$var_1 = $data[VAR_1];
							$var_2 = $data[VAR_2];
							
							
						?>
						<tr>
							<td><?php echo $no_wa;?></td>
							<td style="color:red;"><?php echo $status;?></td>
							<td><?php echo $isi_wa;?></td>
							<td><?php echo $var_1;?></td>
							<td><?php echo $var_2;?></td>
							<td><a href="hapus.php?id_msg=<?php echo $id_msg;?>">Hapus</a></td>
							<?php } ?>
							
						</tr>
					</tbody>
					</table>
					<?php	
					
					// echo $pages->display_pages();
					// echo " | <span class=\"\">".$pages->display_items_per_page()."</span>"; 
					// echo " | Tot Data: ".$pages->items_total;
					?>
				</div>
				
			
					<div class="col-sm-12">
						<form action="update_format_wa.php" method="POST" onsubmit="return confirm('Anda yakin akan mengupdate format WA?')" >
							<h3>Bagaimana Cara Melakukan Pengiriman?</h3>
							<label>
								Gunakan tanda baca [] untuk menampilkan nilai dari variable, misalnya [VAR_1] untuk menampilkan isi data yang berada di kolom VAR_1.
								<br>Contoh: Kepada YTH. [VAR_1], yang berada di [VAR_2] kami mengundang ke acara pernikahan kami yang dilaksanakan di Gedung Sasana Krida Unjani. Terima Kasih.
							</label>
							<textarea name="teks" rows="4" cols="100" > <?php $format_wa;$coba; ?> </textarea>

					</div>
					<div class="col-sm-2">
							<input type="hidden" name="url" value="<?php $_SERVER[REQUEST_URI]; ?>">
							<input type="submit" value="Update Format" class="btn btn-primary">
						</form>
					</div>
					<div class="col-sm-2">
						<form action='kirim_wa.php' method='POST' onsubmit="return confirm('Anda yakin akan mengirimkan WA?')">
							<input type="hidden" name="url" value="<?php $_SERVER[REQUEST_URI]; ?>">
							<input type="submit" value="Kirim Pesan" class="btn btn-info">
						</form>
						<?php
							// mysqli_free_result($result);
							mysqli_free_result($result1);
							// mysqli_free_result($result2);
							mysqli_close($conn);
						?>
					</div>
				</div>
				
					
			

<script src="../../assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery.dataTables.js"></script>
<script src="../../assets/js/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
	    $('#dataTables-example').dataTable();
    });
</script>

</body>
</html>
