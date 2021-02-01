<?php
    $h = "localhost"; //host
    $u = "root"; //username
    $d = "northwind"; //db name
    $p = "";                              //PASSWORDNYA DISESUAIKAN YA HEHE 
    $all_data = array();

    $db = new PDO("mysql:host=$h; dbname=$d;", $u, $p);
    $q = "SELECT * FROM employees";
    $res = $db->query($q);
    foreach($res as $r){
                        $json_array[] = array(
                            "id" => $r["id"],
                             "first_name" => $r["first_name"],
                             "last_name" => $r["last_name"],
                             "address" => $r["address"],
                             "email_address" => $r["email_address"], //karena ga ada birth date jadi di ganti email
                             "city" => $r["city"],
                             "job_title" => $r["job_title"],
                             "home_phone" => $r["home_phone"] // karena ga ada extension jadi di ganti home_phone
                         ); 
                    }
   
    $res = null;
    $db = null;
    echo json_encode($json_array);
    
    exit;
?>

