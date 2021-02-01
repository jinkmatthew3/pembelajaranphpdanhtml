<?php  
	echo $_POST['id'];
	$id = $_POST['id'];

	$query = 'DELETE FROM students WHERE id='.$id;
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbName = 'pemweb';
	$conn = new mysqli($host, $username, $password, $dbName);
	if(mysqli_query($conn, $query)){
		header("Location: index.php");
	}
	else{
		echo 'Error';
	}
?>