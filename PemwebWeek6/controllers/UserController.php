<?php
	
	include "../include/db_connect.php";
    include "../models/User.php";
		
	//memulai session
	session_start(); 

	$act = (isset($_POST["act"])) ? $_POST["act"] : ((isset($_GET["act"])) ? $_GET["act"] : "");

	
	switch($act){
		case "view": {
			include "../views/index.php";
			exit; 
			break;
		}
	//Buat Login
		case "login":{
			//nangkep post nya
			$usn = $_POST["usn"];
            $pwd = $_POST["pwd"];

            
            $usr = new User();
            $data = $usr->Login($usn, $pwd, $db);

        if ($data != false) {
            //SET SESSION
            $_SESSION["logged"] = true;
                
            $rs = true;
            $rt = "Login success.";
               echo json_encode([
                    "s" => $rs,
                    "t" => $rt,
                    "d" => json_decode(json_encode($data), true)
                ]);
            exit;
        }

        else{
                $rs = false;
                $rt = "User not found";
            }
            
        break;
        }// tutup kurung login 


        
        case "logout":{
            //KILL SESSION
            unset($_SESSION["logged"]);
            $rs = true;
            $rt = "Logged out.";
            break;
        }
        //??
        default:{
            $rt = "Hayoo apa...";
            break;
        }
    }

    include "../include/db_disconnect.php";

    echo json_encode([
        "s" => $rs,
        "t" => $rt
    ]);
?>