<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('insert_model');
    }

    public function index(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
        $this->load->view('insert.php',$data);
    }

    public function insert_action(){
        //print_r($POST);
        $values = array(
            'product_name' => $this->input->post('pName'),
            'quantity_per_unit' => $this->input->post('pQtyPerUnit'),
            'list_price' => $this->input->post('pPrice'),
            'supplier_ids' => $this->input->post('pSupplier'),
            'category' => $this->input->post('pCategory')
        );
        //print_r($values);
        $this->insert_model->insert($values);
        redirect(site_url().'/home');
    }
}