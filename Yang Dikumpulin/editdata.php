<?php
    include "db.php";

    $nim = $_GET["nim"];
    //print_r($nim);

    $res = $db->query("SELECT * FROM ms_mahasiswa WHERE NIM = " . $nim)->fetch();

    $data = array(
        "nim" => $res["NIM"],
        "first_name" => $res["first_name"],
        "last_name" => $res["last_name"],
        "description" => $res["description"]
    );

    // print_r($data);

    include "db2.php";

    echo json_encode($data);
?>