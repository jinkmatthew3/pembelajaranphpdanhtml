<?php

class Cart extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    //halaman shopping cart
    public function index(){
        if(isset($_SESSION['id'])){
            $data['judul'] = 'Shopping Cart' ;
            $this->load->model('Cart_model');
            $data['css'] = $this->load->view('templates/css',NULL,TRUE);
            $data['js'] = $this->load->view('templates/js',NULL,TRUE);
            if(isset($_SESSION['id'])){
                $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
            }
            else{
                    $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
            }

            $data['cart'] = array();
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $barang){
                    $sementara = $this->Cart_model->getItem($barang);
                    $sementara[0]['qty'] = $barang['qty'];
                    array_push($data['cart'],$sementara[0]); 
                }
            }

            //print_r($data['cart']);
            
            
            $this->load->view('templates/header', $data);
            $this->load->view('pages/cart/index',$data);
            $this->load->view('templates/footer',$data);
        }
        else{
            $_SESSION['notLoggedIn'] = "true";
            redirect(base_url()."home/index");
        }
    }

    //masukkin ke cart
    public function insertToCart($id_barang = NULL){
        if(isset($_SESSION['id'])){
            if($id_barang == NULL){
                echo "tidak bisa ferguso";
            }
            else{
                //echo "cakep";
                //$_SESSION['cart'] = array();

                //echo $id_barang;
                //print_r($_POST);
                
                $array=array("id_barang"=>$id_barang,"qty"=>$_POST['qty']);
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart'] = array();    
                }
                else{
                    $exist = 0;
                    foreach($_SESSION['cart'] as $row) {
                        if($row['id_barang'] == $id_barang){
                            $exist = 1;
                        }
                    }

                    if($exist == 1){
                        echo "tidak bisa double";
                        //isinya enggak penting yang penting sessionnya ada wkkwkwk
                        $_SESSION['errorDoubleBarang'] = "something";
                    }
                    else{
                        //kalo bisa masuk
                        array_push($_SESSION['cart'],$array);
                        $_SESSION['successBarang'] = "something";
                    }
                }
                //unset($_SESSION['cart']);
                //print_r($_SESSION['cart']);
                redirect(base_url()."home/tampilBarang/all/all");
            }
        }
        else{
            $_SESSION['notLoggedIn'] = "true";
            redirect(base_url()."home/index");
        }
    }

    public function deleteFromCart($id_barang){
        //$deleteFound;
        //print_r($_SESSION['cart']);
        
        $sementara = array();
        foreach($_SESSION['cart'] as $barang){
            if($barang['id_barang'] != $id_barang)
                array_push($sementara,$barang);
        }
        //print_r($sementara);
        $_SESSION['cart'] = $sementara;
        $_SESSION['deleteSuccess'] = "success";
        redirect(base_url()."cart/index");
    }

    public function checkOut(){
        $data['judul'] = 'Check Out' ;
        $this->load->model('Cart_model');
        $data['css'] = $this->load->view('templates/css',NULL,TRUE);
        $data['js'] = $this->load->view('templates/js',NULL,TRUE);
        if(isset($_SESSION['id'])){
            $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
        }
        else{
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        }

        $data['cart'] = array();
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $barang){
                $sementara = $this->Cart_model->getItem($barang);
                $sementara[0]['qty'] = $barang['qty'];
                array_push($data['cart'],$sementara[0]); 
            }
        }
        if(isset($_SESSION['id'])){
            $data['user_detail'] = $this->Cart_model->userDetail($_SESSION['id']);
            //print_r($data['user_detail']);
        }

        
        //print_r($data['cart']);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/cart/checkout',$data);
        $this->load->view('templates/footer',$data);
    }

    public function transaction(){
        print_r($_POST);
        $this->load->model('Cart_model');
        $insertId = $this->Cart_model->insertTransaction($_POST['shipAddress']);
        echo $insertId;
        foreach($_SESSION['cart'] as $detail){
            $this->Cart_model->insertTransactionDetail($insertId,$detail);
            //print_r($detail);
        }
        $_SESSION['transaction'] = $insertId;
        unset($_SESSION['cart']);
        redirect(base_url()."home/index");
    }

    public function receipt($id_transaksi){
        $data['judul'] = 'Receipt' ;
        $this->load->model('Cart_model');
        $data['css'] = $this->load->view('templates/css',NULL,TRUE);
        $data['js'] = $this->load->view('templates/js',NULL,TRUE);
        if(isset($_SESSION['id'])){
            $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
        }
        else{
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        }
        if(isset($_SESSION['id'])){
            $data['user_detail'] = $this->Cart_model->userDetail($_SESSION['id']);
            //print_r($data['user_detail']);
        }

        $data['transaksi'] = $this->Cart_model->getTransaction($id_transaksi);

        if(isset($_SESSION['id'])){
            $data['user_detail'] = $this->Cart_model->userDetail($_SESSION['id']);
            //print_r($data['user_detail']);
        }

        $data['item'] = array();
        $temp = $this->Cart_model->getTransactionDetail($_SESSION['transaction']);
        //print_r($temp);
        foreach($temp as $transaksi){
            $temp2 = $this->Cart_model->getItemReceipt($transaksi);
            $temp2[0]['qty'] = $transaksi['qty'];
            array_push($data['item'],$temp2[0]); 
        }

        //print_r($data['transaksi']);

        //print_r($data['user_detail']);

        //print_r($data['item']);
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/cart/receipt',$data);
        $this->load->view('templates/footer',$data);

        unset($_SESSION['transaction']);
    }

    public function something(){
        //print_r($_SESSION['cart']);

        $temp_array = array();

        foreach($_SESSION['cart'] as $barang){
            $temp = "qty".$barang['id_barang'];
            //print_r($_POST[$temp]);
            array_push($temp_array,$_POST[$temp]);
        }

        //print_r($temp_array);

        for($i = 0 ; $i < sizeof($_SESSION['cart']) ; $i++){
            $_SESSION['cart'][$i]['qty'] = $temp_array[$i];
        }

        //print_r($_SESSION['cart']);

        redirect(base_url()."cart/");
    }
}
