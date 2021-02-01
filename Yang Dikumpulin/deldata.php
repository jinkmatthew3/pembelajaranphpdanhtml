<?php
    include "db.php";

    $nim = $_POST["nim"];
    $status = false;

    try{
        $res = $db->prepare("DELETE FROM ms_mahasiswa WHERE NIM = ?");
        $res->execute([$nim]);

        if($res->rowCount() > 0) $status = true;
    }
    catch(Exception $e){

    }
    
    include "db2.php";
    echo json_encode($status);
?>