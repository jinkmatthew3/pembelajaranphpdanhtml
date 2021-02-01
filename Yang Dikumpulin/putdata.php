<?php
    //BUAT DATA BARU
    
    include "db.php";
    
    //$h = "localhost";
    //$u = "root";
    //$d = "data_mahasiswa";
    //$p = "root";
    //$db = new PDO("mysql:host=$h; dbname=$d", $u, $p);

    $nim = $_POST["nim"];
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $deskripsi = $_POST["deskripsi"];
    $status = false;
    try{
        $db->prepare("INSERT INTO ms_mahasiswa (`description`, first_name, last_name, NIM) VALUES (?, ?, ?, ?)")
            ->execute([$deskripsi, $first_name, $last_name, $nim]);
        $status=true;
    }
    catch(Exception $e){
        // print_r($e);
    }

    //$res = null;
    //$db = null;

    include "db2.php";
    echo json_encode($status);
?>