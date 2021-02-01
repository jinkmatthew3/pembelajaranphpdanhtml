<?php

class Home_model {
    
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //ambil semua temennya
    public function getAllFriends(){
        $this->db->query('SELECT * from '. $this->table .' WHERE username != \'' .$_SESSION['username'] .'\'');
        return $this->db->resultset();//supaya dapet banyak data
    }

    //ambil semua biodata temen sesuai idnya
    public function getFriendById($id){
        $this->db->query('SELECT fName ,lName , email, gender , photo from '. $this->table .' where user_id =:id' );
        $this->db->bind('id',$id);
        return $this->db->single();//supaya dapet 1 data aja
    }

    //ambil semua status
    public function getAllStatus(){
        $this->table = 'status';
        $this->db->query('SELECT user.fName, user.lName, status.status_id, status.status, status.status_time from '. $this->table . ' JOIN user on status.user_id = user.user_id ORDER BY status_time desc');
        return $this->db->resultset();
    }

    //ambil status temen itu aja
    public function getFriendStatus($id){
        $this->table = 'status';
        $this->db->query('SELECT user.fName, user.lName, status.status_id, status.status, status.status_time from '. $this->table . ' JOIN user on status.user_id = user.user_id WHERE status.user_id=:id ORDER BY status_time desc');
        $this->db->bind('id',$id);
        return $this->db->resultset();
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

        $query = "UPDATE user SET fName = :fName,lName = :lName,email = :email,username = :username,password = :pass,gender = :gender,photo = :photo
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

        $this->db->bind('user',$_SESSION['username']);

        $this->db->execute();//lihat ke core/database.php

        move_uploaded_file($_FILES['photo']['tmp_name'],__DIR__."/../../public/img/$img");//buat foto yg udah di upload disimpen di pathnya
        //__DIR__ buat kasih tau lokasi sekarang dan enggak pake BASEURL karena dia directori

        //ngebalikkin berapa banyak yg berhasil ditambahin
        return $this->db->rowCount();
    }

    //nambah status
    public function addPost($data){
        $this->table = 'status';

        $query = "INSERT INTO $this->table( user_id, status) VALUES (:user_id, :status)";

        $this->db->query($query);// supaya querynya masuk ke db yang mau dijalanin
        $this->db->bind('user_id',$_SESSION['user_id']);
        $this->db->bind('status',$data['status']);

        $this->db->execute();//lihat ke core/database.php
        
        //ngebalikkin berapa banyak yg berhasil ditambahin
        return $this->db->rowCount();
    }

    public function addComment($data,$status_id){
        $this->table = 'comment';

        $query = "INSERT INTO $this->table( user_id, status_id, comment_chat) VALUES (:user_id, :status_id, :comment_chat)";

        $this->db->query($query);// supaya querynya masuk ke db yang mau dijalanin
        $this->db->bind('user_id',$_SESSION['user_id']);
        $this->db->bind('status_id',$status_id);
        $this->db->bind('comment_chat',$data['comment_chat']);

        $this->db->execute();//lihat ke core/database.php
        
        //ngebalikkin berapa banyak yg berhasil ditambahin
        return $this->db->rowCount();
    }
}