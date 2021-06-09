<?php
//KONVERSI PHP KE PHP 7
require_once "parser-php-version.php";

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_dbname = "wedding1";

//Api key diganti lagi karena saldo habis
$my_apikey = "VXSW4FVOF6Z81PPZVAE8";



$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_dbname);
if(! $conn ) {
  die('Database tidak terhubung ' . mysql_error());
}

?>

