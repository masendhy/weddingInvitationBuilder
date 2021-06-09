 <?php
require_once('Api/koneksi.php');
//error_reporting(0);

$tambah = $_POST['kodeT'];
$idHapus = $_GET['id'];
$idUpdate = $_POST['idUpdate'];




	$namaTamu = $_POST['namaTamu'];
 	$noTelp = $_POST['noTelp'];
 	$alamat = $_POST['alamat'];
 	$potongTelp = substr($noTelp, 1);
 	$splitTelp = str_split($noTelp);
 	$telp=$splitTelp[0];
 	if ($telp == 0) {
 		$no = "+62".$potongTelp;
 	} else if ($telp != 0){
 		$no="+".$noTelp;
 	} else if ($telp == "+"){
 		$no=$noTelp;
 	}
 	

if ($tambah == "tambah") {
	echo $namaTamu.$no.$alamat;
 	mysqli_query($conn,"INSERT INTO tamuundangan VALUES('','$namaTamu','$no','$alamat')");
 	header('location:tambahTamuUndangan.php');
} else if (empty($tambah) && empty($idUpdate)){
	mysqli_query($conn,"DELETE FROM tamuundangan WHERE idTamu = '$idHapus' ") or die(mysql_error());
   	header("location:tambahTamuUndangan.php");
   	//kalo pas di hosting ga bisa hapus karena error masalahnya disini soalnya ada beberapa variable yang ga ada nilainya.
} else if ($tambah == "edit" ){
	mysqli_query($conn,"UPDATE tamuundangan SET nama='$namaTamu',noTelp='$no',alamat='$alamat' WHERE idTamu='$idUpdate'");
	header("location:tambahTamuUndangan.php");
}
 	
?>