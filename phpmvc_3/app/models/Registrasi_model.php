<?php

class Registrasi_model {
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function registrasiUser($data){

        $img = $_FILES['photo']['name'];//nyiapin fotonya

        $pass = md5($data['username'] . $data['password']); //md5 username sama password

        $query = "INSERT INTO $this->table(fName,lName,email,username,password,gender,photo)
        VALUES (:fName, :lName, :email, :username, :pass, :gender, :photo)";//querynya
        //karena ada tanggal lahir makanya masih begitu

        $this->db->query($query);// supaya querynya masuk ke db yang mau dijalanin
        $this->db->bind('fName',$data['fName']);
        $this->db->bind('lName',$data['lName']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('username',$data['username']);
        $this->db->bind('pass',$pass);
        $this->db->bind('gender',$data['gender']);
        $this->db->bind('photo',$img);//bind supaya enggak kena sql injection

        $this->db->execute();//lihat ke core/database.php

        move_uploaded_file($_FILES['photo']['tmp_name'],__DIR__."/../../public/img/$img");//buat foto yg udah di upload disimpen di pathnya
        //__DIR__ buat kasih tau lokasi sekarang dan enggak pake BASEURL karena dia directori

        //ngebalikkin berapa banyak yg berhasil ditambahin
        return $this->db->rowCount();
    }
}
