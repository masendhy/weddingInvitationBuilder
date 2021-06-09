<?php
require_once('Api/koneksi.php');
$idAdat = $_POST['idAdat'];
$penjelasan = $_POST['penjelasan'];
mysqli_query($conn,"UPDATE adat SET penjelasan='$penjelasan' where idAdat ='$idAdat'");
echo "<script>alert('berhasil disimpan');history.go(-1);</script>";
//header("location:kelolaWeddingCeremonies.php");
?>