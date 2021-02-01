<?php

    if(isset($_POST['studentid']))
        $studentId = $_POST['studentid'];

    if(isset($_POST['firstname']))
        $studentFirstName = $_POST['firstname'];
    
    if(isset($_POST['lastname']))
        $studentLastName = $_POST['lastname'];

    $host = "localhost"; // lokasi mysql
    $username = "root"; // user untuk login
    $password = ""; // password untuk login
    $dbname = "student"; // database name

    $db = new mysqli($host,$username,$password,$dbname);

    $query = "INSERT INTO mhs (id, 
    first_name, last_name) 
    VALUES (" .$studentId. ", '" .$studentFirstName. "', '" .$studentLastName. "')";
    
    if ($db->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

    setcookie('status', 'addSuccess',time() - 3600, "/");

    $query = null;
    $db = null;

    header("Refresh:0; url=Kegiatan2.php");
    
    exit;
?>