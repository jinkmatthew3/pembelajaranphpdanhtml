<?php

$connect = mysqli_connect("localhost","root","","northwind");

//alert("Hello World");

if(isset($_POST["id"]))
{	

	$id = $_POST['id'];
	
	//echo "Masuk pak eko";
	
	$query = "DELETE FROM employees WHERE id = $id";
	
	if(mysqli_query($connect, $query))
	{
		//console.log("persetan");
		alert("Hello World");
	}
	else{
		alert("Hello World");
	}
}
?>