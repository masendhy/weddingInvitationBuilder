<head>
  <meta http-equiv="refresh" content="60" url="?time=<?php echo date('YmdHis');?>">
</head>

<?php
error_reporting(~E_NOTICE);
require_once "koneksi.php";
include('lib/paginator.class.2.php');
$pages = new Paginator;


// cek status antrian

$sql = "
	select count(*) as JML from data_wa where status='QUEUE'
";
$result = mysqli_query($conn,$sql);
$tmp = mysqli_fetch_array($result,MYSQL_ASSOC);
@$jumlah = $tmp[JML];

  


$sql1 = "
	select * from data_wa where status='QUEUE'
";
$result1 = mysqli_query($conn,$sql1);

$jml_berhasil = 0;
$jml_gagal = 0;
$jml_antri = 0;


while ($antrian = mysqli_fetch_array($result1,MYSQL_ASSOC)){
		$no_wa = $antrian[NO_WA];
		$id_msg = $antrian[ID_MSG];
		$tgl_kirim = $antrian[TGL_KIRIM];
		$status_antrian = cek_status_antrian($no_wa, $id_msg);
		if($status_antrian<>""){
			// jika gagal SENT harus diubah id_msg nya
			if($status_antrian=="SENT") {			
				$sql_antrian = "
					UPDATE data_wa SET
					status = '$status_antrian'
					WHERE id_msg=$id_msg
				";
			}
			else{
				$sql_antrian = "
					UPDATE data_wa a, (select max(id_msg)+1 as id_baru from data_wa) b SET
					a.id_msg = b.id_baru,
					a.status = '$status_antrian'
					WHERE a.id_msg=$id_msg
				";
			}
			
			
			
			if($status_antrian=="FAILED (Rejected by RAPIWHA)") $jml_gagal++;
			else if($status_antrian=="SENT") $jml_berhasil++;
			
			$result_antrian = mysqli_query($conn,$sql_antrian);
		}
		$jml_antri++;
}

echo  "<p align=right><br>Sisa Antrian: ".($jumlah-$jml_berhasil-$jml_gagal)." | Last Sync at ".date("d-m-Y H:i:s")."</span>";

mysqli_close($conn);

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
		else  if($failed<>"" && $process<>"") return "FAILED (Rejected by RAPIWHA)"; 
	}
	return "";
}

?>