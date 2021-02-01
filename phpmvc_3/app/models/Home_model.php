<?php

class Home_model {

    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //ambil semua temennya
    public function getAllFriends(){
        $this->db->query('SELECT * from '. $this->table);
        return $this->db->resultset();//supaya dapet banyak data
    }

    //ambil semua biodata temen sesuai idnya
    public function getFriendById($id){
        $this->db->query('SELECT fName ,lName , email, gender , photo from '. $this->table .' where user_id =:id' );
        $this->db->bind('id',$id);
        return $this->db->single();//supaya dapet 1 data aja
    }

    //buat biodata di profile ambil dari username yang login
    public function getFriendByUsername($username){
        $this->db->query('SELECT fName ,lName , email, gender , photo from '. $this->table .' where username =:username' );
        $this->db->bind('username',$username);
        return $this->db->single();//supaya dapet 1 data aja
    }

    // ini buat ngedit profile tapi blom jalan pas load ke form buat edit msh error
    public function editUserProfile($data){

        $img = $_FILES['photo']['name'];//nyiapin fotonya

        $pass = md5($data['username'] . $data['password']); //md5 username sama password

        $query = "UPDATE user SET (fName = :fName,lName = :lName,email = :email,username = :username,password = :pass,gender = :gender,photo :photo)
        WHERE username = :user ";//querynya
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
