<?php

class Login_model {
    
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function loginUser($data){

        $pass = md5($data['username'].$data['password']);

        $query = "SELECT * FROM $this->table WHERE username=:username && password=:password" ;

        $this->db->query($query);
        $this->db->bind('username',$data['username']);
        $this->db->bind('password',$pass);

        $this->db->execute();

        return $this->db->rowCount();
    }
}