<?php
    session_start();
    $email;
    $password;

    if(isset($_POST['email']))
        $email = $_POST['email'];
    if(isset($_POST['pwd']))
        $password = $_POST['pwd'];
    
    $host = "localhost"; // lokasi mysql
    $username = "root"; // user untuk login
    $pass = ""; // password untuk login
    $dbname = "student"; // database name
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $pass);

    $password = md5($password);

    $query= "SELECT COUNT(*) FROM user WHERE Email = '$email' AND Pass ='$password'";
    $result = $conn->query($query);
    
    if($result->fetchColumn()){ // result found > 0
        $_SESSION['isLoginCorret'] = true;
        $_SESSION['showmodal'] = false;
    }
    else{
        $_SESSION['isLoginCorret'] = false;
        $_SESSION['showmodal'] = true;
    }
    header("Location:challenge.php");
?>
