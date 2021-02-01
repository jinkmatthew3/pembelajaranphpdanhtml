<?php
    class Login_model extends CI_model
    {   
        //Register punya user
        public function insertUser($dataUserBaru){
        
            $pass = md5($dataUserBaru['pass']);
            $data = array(
                'fName' => $dataUserBaru['fName'],
                'lName' => $dataUserBaru['lName'],
                'email' => $dataUserBaru['email'],
                'password' => $pass,
                'address' => $dataUserBaru['address'],
                'pNumber' => $dataUserBaru['phonenumber']
            );
            
            if($this->db->insert('user', $data)){
                return 1;
            }
            else{
                return 0;
            }
                
        }

        //Login User 
        public function loginUser($dataLogin){
            $query = $this->db->query("
            SELECT user_id, fName, lName, email, address 
            FROM user WHERE email = '".$dataLogin['txtEmail']."' 
            AND password='".md5($dataLogin['txtPass'])."'");
            return $query->result_array();
        }
    }
?>