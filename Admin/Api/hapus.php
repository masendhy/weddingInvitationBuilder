<?php
error_reporting(~E_NOTICE);
require_once "koneksi.php";
$id_msg = $_GET[id_msg];
$sql = "delete from data_wa where id_msg='$id_msg'";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);

echo "<script>window.open('belum_dikirim.php','_self');</script>";



?>
