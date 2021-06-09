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
$sql1 = "select * from data_wa where status = 'SENT'  order by id_msg desc";
$result1 = mysqli_query($conn,$sql1);

// $sql2 = "select count(*) JML from ($sql1) x ";
// $result2 = mysqli_query($conn,$sql2);
// $data2 = mysqli_fetch_array($result2,MYSQL_ASSOC);


// $pages->items_total = $data2['JML'];
// $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
$pages->paginate();

$batasan = str_replace("and",",", $pages->limit );

$sql = "$sql1 LIMIT $batasan";
$result = mysqli_query($conn,$sql);
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>Sudah Dikirim</h2>
			<div class="tables-responsive">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
					<tr>
						<th>No WA</th>
						<th>Isi WA</th>
						<th>Tanggal Kirim</th>
						<th>Status</th>
					</tr>
					</thead>
					<tbody>
					<?php
					while ($data = mysqli_fetch_array($result,MYSQL_ASSOC)){
						$no_wa = $data[NO_WA];
						$tgl_kirim = $data[TGL_KIRIM];
						$status = $data[STATUS];
						$format_wa = $data[FORMAT_WA];
						$isi_wa = $data[ISI_WA];
						$var_1 = $data[VAR_1];
						$var_2 = $data[VAR_2];
						
					?>
					<tr>
						<td><?php echo $no_wa;?></td>
						<td><?php echo $isi_wa;?></td>
						<td><?php echo $tgl_kirim;?></td>
						<td><?php 
								if ($status == "SENT"){
									echo "Pesan Terikirim";
								} else if($status == "QUEUE"){
									echo "Pending";
								}
							?>
						</td>
					</tr>
					<?php
						}
					?>
					</tbody>
				</table>
				<?php
					// echo $pages->display_pages();
					// echo " | <span class=\"\">".$pages->display_items_per_page()."</span>"; 
					// echo " | Tot Data: ".$pages->items_total;

					// mysqli_free_result($result);
					mysqli_free_result($result1);
					// mysqli_free_result($result2);
					mysqli_close($conn);
				?>
			</div>
			<br>

		</div>
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
