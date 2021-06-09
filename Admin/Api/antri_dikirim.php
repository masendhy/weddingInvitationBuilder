<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="300">
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
$sql1 = "SELECT * FROM data_wa WHERE status='QUEUE' ORDER BY id_msg DESC";
$result1 = mysqli_query($conn,$sql1);

$jml_berhasil = 0;
$jml_gagal = 0;

if($_GET[sinkronisasi]=="1"){
	while ($antrian = mysqli_fetch_array($result1,MYSQL_ASSOC)){
		$no_wa = $antrian[NO_WA];
		$id_msg = $antrian[ID_MSG];
		$tgl_kirim = $antrian[TGL_KIRIM];
		$status_antrian = cek_status_antrian($no_wa, $id_msg);
		if($status_antrian<>""){
			
			if($status_antrian=="SENT") {			
				$sql_antrian = "UPDATE data_wa SET status = '$status_antrian' WHERE id_msg=$id_msg ";
			}
			else{
				$sql_antrian = "
					UPDATE data_wa a, (select max(id_msg)+1 as id_baru from data_wa) b SET
					a.id_msg = b.id_baru,
					a.status = '$status_antrian'
					WHERE a.id_msg=$id_msg
				";
			}
			
			if($status_antrian=="Pengiriman Gagal (Rejected by RAPIWHA)") $jml_gagal++;
			else if($status_antrian=="SENT") $jml_berhasil++;
			
			$result_antrian = mysqli_query($conn,$sql_antrian);
		}
		$jml_antri++;
	}
	echo "<script>alert('Menunggu Antrian: ".($jml_antri-$jml_berhasil-$jml_gagal).". Berhasil dikirim: $jml_berhasil. Gagal dikirim: $jml_gagal')</script>";  
	echo "<script>window.open('autosinkron2.php','sinkron')</script>";
}

$pages->paginate();
$batasan = str_replace("and",",", $pages->limit );

$sql = " $sql1 LIMIT $batasan";
 $result = mysqli_query($conn,$sql);
?>

    <div  class ="col-sm-12">
    	<h3>Menunggu Antrian</h3>
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
					<td style="color:red;"><?php
						if ($status == "QUEUE") {
						 	echo "Pending";
						 } else if ($status == "SENT"){
						 	echo "Pesan Terkirim";
						 }
						 ?>
					</td>
               </tr>  
               <?php  } ?>                     
            </tbody>
        </table>
        <?php
 			echo "<br><br>";
			mysqli_free_result($result1);
			mysqli_close($conn);

        ?>
        <input type="button" class="btn btn-primary" value="Sinkronisasi Manual" type="button" onClick="if(confirm('Anda yakin akan melakukan Sinkronisasi Manual?')) window.open('antri_dikirim.php?sinkronisasi=1','_self')">
    </div>
    <?php
    	function cek_status_antrian($no_wa,$custom_data){
				$my_apikey = $GLOBALS['my_apikey']; 
				$number = $no_wa; 
				$type = "OUT"; 
				$api_url  = "http://panel.apiwha.com/get_messages.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .=	"&number=". urlencode ($number); 
				$api_url .=	"&custom_data=". urlencode ($custom_data); 
				$api_url .= "&type=". urlencode ($type); 
				$my_json_result = file_get_contents($api_url, false); 
				$my_php_arr = json_decode($my_json_result); 
				foreach($my_php_arr as $item) 
				{ 
					$from_temp = $item->from; 
					$to_temp = $item->to; 
					$text_temp = $item->text; 
					$type_temp = $item->type; 
					$failed = $item->failed_date;
					$process = $item->process_date;
					
					if($failed=="" && $process<>"") return "SENT";
					else if($failed<>"" && $process<>"") return "FAILED (Rejected by RAPIWHA)";
				  
				}
				return "";
			}

    ?>


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
