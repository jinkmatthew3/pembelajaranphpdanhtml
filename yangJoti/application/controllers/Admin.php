<?php

class Admin extends CI_Controller {

    public function index()
    {
        $this->load->model('Home_model');
        $data['judul'] = 'CMS Product Page' ;
        $data['css'] = $this->load->view('templates/css',NULL,TRUE);
        $data['js'] = $this->load->view('templates/js',NULL,TRUE);
        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/admin/barang',$data);
        $this->load->view('templates/footer',$data);
    }
}
