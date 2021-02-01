<?php

class Login extends Controller{
    public function index(){
        $data['judul'] = "Login";//title dari pagenya
        $this->view('templates/header',$data); //supaya enggak bolak-balik ganti2
        $this->view('login/index',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    public function loginuser(){
        if( $this->model('Login_model')->loginUser($_POST) > 0){
            $_SESSION['username'] = $_POST['username'];
            header('Location: '. BASEURL . '/home');
        }
        else{
            Flasher::setFlash('failed','to login','danger');//flashernya
            header('Location: '. BASEURL . '/login');//supaya pindah halamam
            exit;
        }
    }
}