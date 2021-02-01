<?php 
    $studentid;
    
    //echo '<script>console.log("Masuk kok")</script>';

    if(isset($_POST['id'])){
        $studentid = $_POST['id'];
        
        $host = "localhost"; // lokasi mysql
        $username = "root"; // user untuk login
        $password = ""; // password untuk login
        $dbname = "student"; // database name

        $db = new mysqli($host,$username,$password,$dbname);
        $con = mysqli_connect("localhost","root","","northwind");

        $query = "SET foreign_key_checks = 0";
        
        $query = "DELETE FROM mhs WHERE id=".$studentid;

        if(mysqli_query($db, $query)){
            header("Location: Kegiatan2.php");
        }
        else{
            echo 'Error'. $db->error;
        }

        $query = "SET foreign_key_checks = 1";
        
        
        setcookie('status', 'deleteSuccess',time() - 3600, "/");

        $query = null;
        $db = null;
    }
   // header("Refresh:0; url=Kegiatan2.php");
?>