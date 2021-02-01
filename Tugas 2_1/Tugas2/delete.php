<?php
  if(isset($_POST['nim'])){
    $nim = $_POST['nim'];

    $host = "localhost";
    $username = "root";
    $dbname = "pemweb";
    $password = "";

    $db = new mysqli($host, $username, $password, $dbname);

    $query = "DELETE FROM ms_mahasiswa WHERE nim=".$nim;
    $result = $db->query($query);

    mysqli_free_result($result);
    mysqli_close($db);
  }
?>
