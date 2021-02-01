<?php
    include "db.php";

    $rs = false;
    $rt = "Wrong NIM/Password";
    $email = $_POST["loginemail"];
    //print_r($email);
    $q = "SELECT * FROM ms_user WHERE email LIKE '" . $email . "' LIMIT 1";
    $dbr = $db->prepare($q);
    $dbr->execute();

    $res = $dbr->fetch();
    //print_r($q);
    $password = $_POST["loginpassword"] . $res["salt"];
    //print_r($password);
    if($dbr->rowCount()>0){
        if(md5($password) === $res["pass"]){
            $rs=true;
            $rt="Welcome" . $res["email"];
        }
    }
    include "db2.php";

    echo json_encode([
        "s" => $rs,
        "t" => $rt
    ]);
?>
