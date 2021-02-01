<?php

class Home extends Controller{
    public function index(){
        $data['judul'] = "Home";//title dari pagenya
        $data['teman'] = $this->model('Home_model')->getAllFriends();
        $this->view('templates/header',$data); //supaya enggak bolak-balik ganti2
        $this->view('templates/header_navbar');
        $this->view('home/index',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    public function friend($id){
        $data['judul'] = "Detail teman";//title dari pagenya
        $data['teman'] = $this->model('Home_model')->getAllFriends();
        $data['profile'] = $this->model('Home_model')->getFriendById($id);
        $this->view('templates/header_navbar');
        $this->view('templates/header',$data);
        $this->view('home/friend',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    public function profile($username){
        $data['judul'] = "Profile";//title dari pagenya
        $data['teman'] = $this->model('Home_model')->getAllFriends();
        $data['profile'] = $this->model('Home_model')->getFriendByUsername($username);
        $this->view('templates/header_navbar');
        $this->view('templates/header',$data);
        $this->view('home/profile',$data);//view yang mau ditampilin
        $this->view('templates/footer');
    }

    public function edit_profile(){
      if( $this->model('Home_model')->editUserProfile($_POST) > 0){//kalo berhasil
          Flasher::setFlash('success','added','success');//flashernya
          header('Location: '. BASEURL . '/login');//supaya pindah halaman
          exit;
      }
      else{//kalo gagal
          Flasher::setFlash('failed','added','danger');//flashernya
          header('Location: '. BASEURL . '/login');//supaya pindah halamam
          exit;
      }
    }

    // public function logout(){

    // }
}
