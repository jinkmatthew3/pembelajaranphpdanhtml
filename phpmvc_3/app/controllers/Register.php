<?php

class Register extends Controller {
    public function index(){//itu supaya ada nilai default buat parameternya
        $data['judul'] = "Register"; // title dari pagenya
        $this->view('templates/header',$data);
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function regis(){
      if( $this->model('Registrasi_model')->registrasiUser($_POST) > 0){//kalo berhasil
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

}
