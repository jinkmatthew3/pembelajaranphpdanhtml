<?php

class Login extends CI_Controller {

	public function index()
	{
        //$this->load->model('Home_model');
                $data['judul'] = 'Login' ;
                $data['css'] = $this->load->view('templates/csstampilanBarang',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                //$data['randBarang'] = $this->Home_model->randBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/login/index',$data);
                $this->load->view('templates/footer',$data);
        }
        
        public function loginuser(){
                print_r($_POST);
                $pass = md5($_POST['txtPass']);
                //passnya admin0
                if($_POST['txtEmail'] == "admin@gmail.com" && $pass == "62f04a011fbb80030bb0a13701c20b41"){
                        echo "cakep";
                        $_SESSION['username'] = "admin";
                        echo $_SESSION['username'];
                        //redirect('/admin', 'location', 301);
                }
                else{
                        echo "cari user";
                }              
        }

        public function signup(){
                $data['judul'] = 'Sign Up' ;
                $data['css'] = $this->load->view('templates/csstampilanBarang',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                //$data['randBarang'] = $this->Home_model->randBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/login/signup',$data);
                $this->load->view('templates/footer',$data);
        }

        public function signUpUser(){
                print_r($_POST);
                // Array ( 
                //         [fName] => Michael 
                //         [lName] => Roni 
                //         [email] => someone@gmail.com 
                //         [address] => allogio timur 2 nomor 62 
                //         [phonenumber] => 08984596788 
                //         [pass] => halohalo 
                //         [rePass] => halohalo 
                // )
                if(md5($_POST['pass']) == md5($_POST['rePass'])){
                        echo "cakep";
                }
                else{
                        echo "beda";
                }
        }
}
?>
