<?php

class Home extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('session');
        }

        //Nampilin halaman utama yang ada carousel/slideshow itu tuh
        public function index()
        {
                $this->load->model('Home_model');
                $data['judul'] = 'FashMawo' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                if(isset($_SESSION['id'])){
                        $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
                }
                else{
                        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                }
                $data['randBarang'] = $this->Home_model->randBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home/index',$data);
                $this->load->view('templates/footer',$data);
        }

        //Buat nampilin barang sesuai sama kategori(belom jadi)
        public function tampilBarang($gender = "all", $kategori = "all")
        {
                $this->load->model('Home_model');
                $data['judul'] = 'FashMawo' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                if(isset($_SESSION['id'])){
                        $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
                }
                else{
                        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                }
                //echo $gender . " " . $kategori;
                //echo "<br>";

                //gender possibilities 
                // model yg request semua
                if($gender == "all" && $kategori == "all"){
                        //echo "masuk1";
                        $data['barang'] = $this->Home_model->getAllProducts();
                        //print_r($data['barang']);
                }
                else if($gender == "all"){
                        $data['barang'] = $this->Home_model->getByCategoryProducts($kategori);
                }
                // model yg request semua kategori
                else if($gender == "man" && $kategori == "all" || $gender == "woman" && $kategori == "all"){
                        //echo "not something";
                        $data['barang'] = $this->Home_model->getGenderProducts($gender);
                }
                //ngecek buat cocok enggak
                else if($gender == "man" || $gender == "woman" && $kategori == "shirt" || $kategori == "t-shirt" || $kategori == "short" || $kategori == "long pants" || $kategori == "shoes"){
                        //echo "something";
                        $data['barang'] = $this->Home_model->getProducts($gender, $kategori);
                }
                //ngecek kalau diluar dari yg disediain
                else{
                        $data['barang'] = NULL;
                }
                //print_r($data['barang']);
                $data['gender'] = $gender;
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home/tampilanBarang',$data);
                $this->load->view('templates/footer',$data);
        }
        
        //buat nampilin sesuai dengan produk yg diklik
        public function productDetails($id = 1)
        {       
                $this->load->model('Home_model');
                $data['judul'] = 'FashMawo' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                if(isset($_SESSION['id'])){
                        $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
                }
                else{
                        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                }
                $data['produk'] = $this->Home_model->detailProductModel($id);
                $data['size'] = $this->Home_model->detailProductSizeModel($id);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home/detailbarang',$data);
                $this->load->view('templates/footer',$data);
        }

        public function searchProduct(){
                $this->load->model('Home_model');
                $data['judul'] = 'FashMawo' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                if(isset($_SESSION['id'])){
                        $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
                }
                else{
                        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                }
                //echo $gender . " " . $kategori;
                //echo "<br>";  

                //print_r($_POST);

                $data['barang'] = $this->Home_model->searchProduct($_POST);
                
                $data['gender'] = "man";
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home/tampilanBarang',$data);
                $this->load->view('templates/footer',$data);
        }

        public function aboutUs(){
                $this->load->model('Home_model');
                $data['judul'] = 'About Us' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                if(isset($_SESSION['id'])){
                        $data['navbar'] = $this->load->view('templates/navbaruser',NULL,TRUE);
                }
                else{
                        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                }
                $data['randBarang'] = $this->Home_model->randBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home/aboutUs',$data);
                //$this->load->view('templates/footer',$data);
        }
}

?>
