<?php  

 /*if (isset($_POST['submit1'])){
	$hash = $_POST['username'] .";". $_POST['password'];
	setcookie("SID",md5($hash));
	//echo $hash;
} */

?>  

<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
</head>
<body>
<form name="form1" action="" method="post">
	Enter username <input type="text" name="username"><br>
	Enter password <input type="text" name="password"><br>
	<input type="submit" name="submit1" value="login">
</form>
<?php
/*echo $hash;*/

if(isset($_COOKIE['SID'])){
	if ($_COOKIE['SID'] == '6521f1af7eb6762676c55b5ebea99712' ) {
		echo "</br>Hallo Pengguna Kamar Deluxe01 ini adalah akun VIP </br> Ini kode mu 007 </br>";
	}else{
		echo "</br>";
		echo "hallo " .$_POST['username']. " Ini adalah Akun Wifi Reguler </br> Tidak ada yang akan ditampilkan disini";
	}
}else{
	echo "Halo silahkan login terlebih dahulu lalu refresh page";
}


if (isset($_POST['submit1'])){
	$hash = $_POST['username'] .";reguler";
	setcookie("SID",md5($hash));
	//echo $hash;
}

?>


</body>
</html>