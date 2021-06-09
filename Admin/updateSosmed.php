<?php
require_once('Api/koneksi.php');

$idSosmed = $_POST['idSosmed'];
$ig=$_POST['ig'];
$fb=$_POST['fb'];
$twitter = $_POST['twitter'];

mysqli_query($conn,"UPDATE sosmed SET ig='$ig', twitter='$twitter',fb='$fb' WHERE idSosmed='$idSosmed' ");
header("location:kelolaSocialMedia.php");
?>