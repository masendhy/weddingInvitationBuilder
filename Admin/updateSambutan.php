<?php
require_once('Api/koneksi.php');
$idSambutan = $_POST['idSambutan'];
$pembukaSambutan = $_POST['pembukaSambutan'];
$isiSambutan = $_POST['isiSambutan'];
$penutupSambutan = $_POST['penutupSambutan'];

mysqli_query($conn,"UPDATE sambutan SET 
			pembukaSambutan='$pembukaSambutan',
			isiSambutan='$isiSambutan', 
			penutupSambutan='$penutupSambutan' 
			WHERE idSambutan='$idSambutan'");
header('location:kelolaSambutan.php');
?>