<?php
	include "connect.php";
	$nim	= $_REQUEST['nim'];
	$nama	= $_REQUEST['nama'];
	$alamat	= $_REQUEST['alamat'];
	$mysqli	= "INSERT INTO ms_mahasiswa (nim, nama, alamat) VALUES ('$nim', '$nama', '$alamat')";
	$result	= mysqli_query($connect, $mysqli);

	mysqli_close($connect);
  header("location:challenge.php");
?>
