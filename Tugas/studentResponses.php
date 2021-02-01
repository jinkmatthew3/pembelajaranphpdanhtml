<?php
    $studentOldId;
    $studentId;
    $studentFirstName;
    $studentLastName;
    $studentDescription;
    $captcha;
    
    if(isset($_COOKIE['studentid']))
        $studentOldId = $_COOKIE['studentid'];

    if(isset($_POST['studentid']))
        $studentId = $_POST['studentid'];

    if(isset($_POST['firstname']))
        $studentFirstName = $_POST['firstname'];
    
    if(isset($_POST['lastname']))
        $studentLastName = $_POST['lastname'];

    if(isset($_POST['description']))
        $studentDescription = $_POST['description'];


    if(isset($_POST['g-recaptcha-response']))
        $captcha = $_POST['g-recaptcha-response'];
        
    if(!$captcha){
        echo "<h2>Please check the captcha form</h2>";
        exit;
    }
    if(!$studentId || !$studentFirstName || !$studentLastName || !$studentDescription){
        echo "<h2>Please fill the form correctly</h2>";
        exit;
    }

    $str = "https://www.google.com/recaptcha/api/siteverify?secret=6LcbD5MUAAAAAFPZi5_JyNVJtZPnIl1dQT_2w517"."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
    $response = file_get_contents($str);
    $response_arr = (array) json_decode($response);

    if($response_arr['success'] == false)
        echo "<h2>You are spammer! GET OUT</h2>";
    else{
        $host = "localhost"; // lokasi mysql
        $username = "root"; // user untuk login
        $password = ""; // password untuk login
        $dbname = "mahasiswa"; // database name
        
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
        if($_COOKIE['type'] == 'edit'){
            $query = "UPDATE siswa SET studentid='$studentId', first_name='$studentFirstName', last_name='$studentLastName', description='$studentDescription'  WHERE studentid='$studentOldId'";
        }
        else{
            $query = "INSERT INTO siswa VALUES (" .$studentId. ", '" .$studentFirstName. "', '" .$studentLastName. "', '" .$studentDescription. "')";
        }
        $conn->exec($query);
        $query = null;
        $conn = null;

        // clear cookie
        unset($_COOKIE['studentid']);
        unset($_COOKIE['type']);
        setcookie('studentid', null, time() - 3600);
        setcookie('type', null, time() - 3600);
        
        header("Refresh:0; url=tugas1.php");
    }
?>
