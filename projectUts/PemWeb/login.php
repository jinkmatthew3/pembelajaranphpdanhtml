<?php

    $rs = false;
    $rt = "Wrong NIM/Password";

    if(isset($_POST['email']))
        $email = $_POST['email'];

    if(isset($_POST['password']))
        $passwordlogin = $_POST['password'];


    include "koneksi.php";

    $stmt = $conn->prepare("SELECT password  FROM user
    where email=? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($pass);
    $stmt->fetch();

    $passmd5 = md5($passwordlogin);
    echo $passwordlogin ."<br>";
    echo $passmd5 ." <br>" . $pass . " <br>" .$stmt->num_rows . "<br>";
    
    
    if($stmt->num_rows == 1 AND $passmd5 == $pass){
        $rs = true;
        header("Location : home.php");
        echo "Yeay";
    }
    else{
        echo "Password / email is wrong";
    }
    
    exit;
?>