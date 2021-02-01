<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        redirect(site_url()."/home/produk");
    }

    public function produk(){
        
        $crud = new grocery_CRUD();
        $crud->set_table('products')
        ->columns('product_code','product_name')
        ->fields('PRODUCT CODE','NAMA PRODUK')
        ->add_fields('product_code','product_name');
        
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        
        $data['js'] = $this->load->view('include/javascript.php', $data, TRUE);
        $data['css'] = $this->load->view('include/css.php', $data, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
        //$data['product'] = $this->home_model->get_product();
        //$data['data'] = $this->load->view('pages/data.php',$data, TRUE);
        //print_r($data['crud']['js_files']);
        $this->load->view('pages/home.php', $data);
    }

    public function __construct(){
        parent::__construct();
        $this->load->model('home_model');
        $this->load->library('grocery_CRUD');
    }
}