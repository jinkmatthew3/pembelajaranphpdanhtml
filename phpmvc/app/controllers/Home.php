<?php

class Home extends Controller{
    // ini buat nampilin view home
    public function index(){
        $data['judul'] = "Home";//title dari pagenya
        $data['teman'] = $this->model('Home_model')->getAllFriends();
        $data['status'] = $this->model('Home_model')->getAllStatus();
        $this->view('templates/header',$data); //supaya enggak bolak-balik ganti2
        $this->view('templates/header_navbar');
        $this->view('home/index',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    // ini buat nampilin view profile temen
    public function friend($id){
        $data['judul'] = "Detail teman";//title dari pagenya
        $data['teman'] = $this->model('Home_model')->getAllFriends();
        $data['profile'] = $this->model('Home_model')->getFriendById($id);
        $data['status'] = $this->model('Home_model')->getFriendStatus($id);
        $this->view('templates/header_navbar');
        $this->view('templates/header',$data);
        $this->view('home/friend',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    //ini buat nampilin view profile
    public function profile(){
        $data['judul'] = "Profile";//title dari pagenya
        $data['teman'] = $this->model('Home_model')->getAllFriends();
        $data['profile'] = $this->model('Home_model')->getFriendByUsername($_SESSION['username']);
        $data['status'] = $this->model('Home_model')->getFriendStatus($_SESSION['user_id']);
        $this->view('templates/header_navbar');
        $this->view('templates/header',$data);
        $this->view('home/profile',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    //ini buat nampilin view edit_profile
    public function edit_profile(){
        $data['judul'] = "Edit Profile";//title dari pagenya
        $data['profile'] = $this->model('Home_model')->getFriendByUsername($_SESSION['username']);
        $this->view('templates/header_navbar');
        $this->view('templates/header',$data);
        $this->view('home/edit_profile',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    //ini buat kirim ke model update_profile
    public function update_profile(){
        if( $this->model('Home_model')->editUserProfile($_POST) > 0){//kalo berhasil
            Flasher::setFlash('success','updated','success');//flashernya
            header('Location: '. BASEURL . '/home/profile/');//supaya pindah halaman
            exit;
        }
        else{//kalo gagal
            Flasher::setFlash('failed','updated','danger');//flashernya
            header('Location: '. BASEURL . '/home/profile/');//supaya pindah halamam
            exit;
        }
    }

    //kalo post di home
    public function post(){
        if( $this->model('Home_model')->addPost($_POST) > 0){//kalo berhasil
            Flasher::setFlash('success','Added','success');//flashernya
            header('Location: '. BASEURL . '/home/index/');//supaya pindah halaman
            exit;
        }
        else{//kalo gagal
            Flasher::setFlash('failed','Added','danger');//flashernya
            header('Location: '. BASEURL . '/home/index/');//supaya pindah halamam
            exit;
        }
    }

    //kalo post di profile
    public function post2(){
        if( $this->model('Home_model')->addPost($_POST) > 0){//kalo berhasil
            Flasher::setFlash('success','Added','success');//flashernya
            header('Location: '. BASEURL . '/home/profile/');//supaya pindah halaman
            exit;
        }
        else{//kalo gagal
            Flasher::setFlash('failed','Added','danger');//flashernya
            header('Location: '. BASEURL . '/home/profile/');//supaya pindah halamam
            exit;
        }
    }

    public function insertComment($status_id){
        if( $this->model('Home_model')->addComment($_POST,$status_id) > 0){//kalo berhasil
            Flasher::setFlash('success','Added','success');//flashernya
            header('Location: '. BASEURL . '/home/index/');//supaya pindah halaman
            exit;
        }
        else{//kalo gagal
            Flasher::setFlash('failed','Added','danger');//flashernya
            header('Location: '. BASEURL . '/home/index/');//supaya pindah halamam
            exit;
        }
    }

    //buat logout
    public function logout(){
        session_start();
        session_destroy();
        header('Location: '. BASEURL . '/login/index');//supaya pindah halamam
    }
}