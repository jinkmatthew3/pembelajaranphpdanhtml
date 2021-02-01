<?php

class Login extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('session');
        }

        //Tampilan Login
	public function index()
	{
                $data['judul'] = 'Login' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/login/index',$data);
                $this->load->view('templates/footer',$data);
        }
        
        //Supayya bisa login
        public function loginuser(){
                $this->load->model('Login_model');
                //print_r($_POST);
                $pass = md5($_POST['txtPass']);
                //passnya admin0
                if($_POST['txtEmail'] == "admin@gmail.com" && $pass == "62f04a011fbb80030bb0a13701c20b41"){
                        //echo "cakep";
                        $_SESSION['username'] = "admin";
                        //echo $_SESSION['username'];
                        redirect('/admin', 'location', 301);
                }
                else{   
                        //print_r($_POST);
                        $cek = $this->Login_model->loginUser($_POST);
                        //print_r($cek);
                        //echo sizeof($cek);
                        if($cek == NULL){
                                $_SESSION['loginFail'] = "Login Fail";
                                redirect(base_url()."login/index");
                        }
                        else if(sizeof($cek) > 1)
                        {
                                $_SESSION['loginSqlInjection'] = "Sql Injection Fail";
                                redirect(base_url()."login/index");
                        }
                        else{
                                $_SESSION['id'] = $cek[0]['user_id'];
                                $_SESSION['username'] = $cek[0]['fName'] . " " . $cek[0]['lName'];
                                redirect(base_url()."home/index");
                                //echo $_SESSION['username'];
                                //echo $_SESSION['id'];
                        }
                }              
        }

        //Nampilin tampilan Sign Up
        public function signup(){
                $data['judul'] = 'Sign Up' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/login/signup',$data);
                $this->load->view('templates/footer',$data);
        }

        //Supaya bisa register
        public function signUpUser(){
                $this->load->model('Login_model');
                //print_r($_POST);
                
                if(md5($_POST['pass']) == md5($_POST['rePass'])){
                        $cek = $this->Login_model->insertUser($_POST);
                        if($cek == 0){
                                $_SESSION['signUpFail'] = "Insert Fail";
                                redirect(base_url()."login/signup");
                        }
                        else{
                                //$_SESSION['signUpSuccess'] = "Success";
                                $this->session->set_userdata('signUpSuccess', 'Success');
                                print_r($this->session->userdata());
                                redirect(base_url()."login/index");
                        }
                        
                }
                else{
                        $_SESSION['signUpFail'] = "Not Match";
                        redirect(base_url()."login/signup");
                }
        }

        public function signOut(){
                unset($_SESSION['id']);
                unset($_SESSION['username']);
                redirect(base_url()."home/index");
        }
}
?>
