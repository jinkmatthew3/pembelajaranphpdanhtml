<?php 
	$studentid;

    if(isset($_COOKIE['studentid'])){
        $studentid = $_COOKIE['studentid'];
        
        $host = "localhost"; // lokasi mysql
        $username = "root"; // user untuk login
        $password = ""; // password untuk login
        $dbname = "northwind"; // database name
        
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
        $conn->exec("DELETE FROM employees WHERE id=$studentid");
        
        $conn = null;
        
        // clear cookie
        unset($_COOKIE['studentid']);
        setcookie('studentid', null, time() - 3600);
    }
    header("Refresh:0; url=tugas1.php");
?>