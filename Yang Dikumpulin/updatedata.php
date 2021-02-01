<?php
    include "db.php";

    $nim = $_POST["nim"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $desc = $_POST["deskripsi"];
    $status = false;
    //print_r($nim);
    try{
        $db->prepare("UPDATE ms_mahasiswa SET first_name=?, last_name=?, `description`=? WHERE NIM=?")
            ->execute([$fname, $lname, $desc, $nim]);

        $status = true;
    }
    catch(Exception $e){

    }

    include "db2.php";
    echo json_encode($status);
?>