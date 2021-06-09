<?php

error_reporting(~E_NOTICE);
require_once "koneksi.php";

$url = $_POST[url];
$teks = $_POST[teks];
$sql = "select * from data_wa where (status <> 'SENT' and status<>'QUEUE') or status is null";

$result = mysqli_query($conn,$sql);
$jml_berhasil=0;
$jml_gagal=0;


while($data = mysqli_fetch_array($result,MYSQL_ASSOC)){
	$jml_data++;
	$id_msg = $data[ID_MSG];
	$no_wa = $data[NO_WA];
	$isi_wa = $data[ISI_WA];
	
	// seleksi internal
	if($isi_wa=="") $status_failed = "Pengiriman Gagal! Pesan WA Tidak Boleh Kosong!";
	else if(substr($no_wa,0,3)<>"+62") $status_failed = "FAILED (No Depan WA Harus Menggunakan +62)";
	else if(strlen($no_wa)<5) $status_failed = "FAILED (No WA kurang dari 5 Angka)";
	else if(is_angka(substr($no_wa,1))=="0") $status_failed = "FAILED (No WA Bukan Angka)";
	
	
	if($status_failed=="") $terkirim = kirim_wa($no_wa,$isi_wa,$id_msg);
	else $terkirim = false;
	
	if($terkirim){
		$sql2 = "
			UPDATE data_wa SET
				status = 'QUEUE', tgl_kirim=now()
			WHERE id_msg = $id_msg
		";
		$result2 = mysqli_query($conn,$sql2);
		$jml_berhasil++;
	}
	else {
		$sql2 = "
			UPDATE data_wa SET
				status = '$status_failed', tgl_kirim=now()
			WHERE id_msg = $id_msg
		";
		$result2 = mysqli_query($conn,$sql2);
		$jml_gagal++;
	}
}

if($jml_data>0) echo  "<script>alert('Berhasil masuk Antrian: $jml_berhasil. Gagal masuk Antrian: $jml_gagal')</script>";  
else echo "<script>alert('Data WA masih kosong')</script>";
	
mysqli_free_result($result);
mysqli_close($conn);

//echo "<script>alert('WA sudah diproses Kirim')</script>";    
if($jml_berhasil>0) {
	echo "<script>window.open('autosinkron2.php','sinkron')</script>";
	echo "<script>window.open('antri_dikirim.php','_self')</script>";
}
else echo "<script>window.open('belum_dikirim.php','_self')</script>";




function kirim_wa($no_wa,$isi_wa,$custom_data){
	// Send Message 
	$my_apikey = $GLOBALS['my_apikey']; 
	$destination = $no_wa;
	$message = $isi_wa;
	$api_url = "http://panel.apiwha.com/send_message.php"; 
	$api_url .= "?apikey=". urlencode ($my_apikey); 
	$api_url .= "&number=". urlencode ($destination); 
	$api_url .= "&text=". urlencode ($message);
	$api_url .= "&custom_data=". urlencode ($custom_data); 
	$my_result_object = json_decode(file_get_contents($api_url, false)); 
	//echo "<br>Result: ". $my_result_object->success; 
	//echo "<br>Description: ". $my_result_object->description; 
	//echo "<br>Code: ". $my_result_object->result_code;
	return $my_result_object->success;
}

function is_angka($s){
	for ($i = 0; $i < strlen($s); $i++){
		$char = $s[$i];
		if (is_numeric($char)) {
		  $jml_angka++;
		} else {
		  $jml_huruf++;
		}
	}
	if($jml_huruf>0) return 0;
	else return 1;
}


?>