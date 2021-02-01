<?php
    if(isset($_POST['studentid']))
        $studentId = $_POST['studentid'];

    if(isset($_POST['firstname']))
        $studentFirstName = $_POST['firstname'];

    $host = "localhost"; // lokasi mysql
    $username = "root"; // user untuk login
    $password = ""; // password untuk login
    $dbname = "student2"; // database name

    $db = new mysqli($host,$username,$password,$dbname);

    $query = "INSERT INTO mhs (nim,
    nama) 
    VALUES (" .$studentId. ", '" .$studentFirstName. "')";
    //INSERT INTO mhs (nim,nama) VALUES (1025,'bella') ; DROP TABLE mhs -- ')
    
    if ($db->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

    setcookie('status', 'addSuccess',time() - 3600, "/");

    $query = null;
    $db = null;

    header("Refresh:0; url=coba2.php");
    
    exit;
?>