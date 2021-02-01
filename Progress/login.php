<?php

    $rs = false;
    $rt = "Wrong NIM/Password";

    if(isset($_POST['email']))
        $email = $_POST['email'];

    if(isset($_POST['password']))
        $passwordlogin = $_POST['password'];


    $host = "localhost"; // lokasi mysql
    $username = "root"; // user untuk login
    $password = ""; // password untuk login
    $dbname = "student"; // database name

    $db = new mysqli($host,$username,$password,$dbname);

    $stmt = $db->prepare("SELECT pass, salt FROM user
    where email=? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($pass,$salt);
    $stmt->fetch();

    $passmd5 = md5($passwordlogin . $salt);
    echo $passwordlogin . $salt ."<br>";
    echo $passmd5 ." " . $pass . " " .$stmt->num_rows;
    
    
    if($stmt->num_rows == 1 AND $passmd5 == $pass){
        $rs = true;
        //header("Location : Kegiatan2.php");
    }
    else{
        //setcookie('loginStatus', 'loginFail',time() - 3600, "/");
        //echo 'Password or email wrong';
        //print_r($password);
    }

    $query = null;
    $db = null;

    echo json_encode([
        "s" => $rs,
        "t" => $rt
    ]);
    
    exit;
?>