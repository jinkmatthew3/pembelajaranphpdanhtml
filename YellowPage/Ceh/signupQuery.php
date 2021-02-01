<?php 
    session_start();
    include 'connect.php';
 
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $data = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
 
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);

    if($cek > 0){
        header("location:signup.php?pesan=gagal");
    }
    else{
        $daftar = mysqli_query($connect, "INSERT INTO `user` VALUES ('$username','$password',NULL)");
        if($daftar == TRUE)
            header("location:index.php?pesan=berhasil_daftar");
        else
            header("location:signup.php?pesan=entahlah");
        mysqli_free_result($daftar);
    }
    
?>