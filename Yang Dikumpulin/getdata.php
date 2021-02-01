<?php 
    include "db.php";
    $q = "SELECT * FROM ms_mahasiswa";
    $res = $db->query($q);

    $i = 1;
    $all_data = array();

    foreach($res as $row){
        $all_data[] = array(
            "Nomer" => $i,
            "MahasiswaNIM"=> $row['NIM'],
            "MahasiswaFirstName"=> $row['first_name'],
            "MahasiswaLastName"=> $row['last_name']
        );
        $i++;
    }
    include "db2.php";
    echo json_encode($all_data);
?>