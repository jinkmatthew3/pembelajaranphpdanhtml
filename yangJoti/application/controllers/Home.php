<?php

class Home extends CI_Controller {

        public function index()
        {
                $this->load->model('Home_model');
                $data['judul'] = 'FashMawo' ;
                $data['css'] = $this->load->view('templates/csstampilanBarang',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                $data['randBarang'] = $this->Home_model->randBarang();
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home/index',$data);
                $this->load->view('templates/footer',$data);
        }

        public function tampilBarang($gender = "Unisex", $kategori = "All")
        {
                $this->load->model('Home_model');
                $data['judul'] = 'FashMawo' ;
                $data['css'] = $this->load->view('templates/css',NULL,TRUE);
                $data2['css2']=$this->load->view('templates/csstampilanBarang',NULL,TRUE);
                $data['js'] = $this->load->view('templates/js',NULL,TRUE);
                $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home/tampilanBarang',$data2);
                $this->load->view('templates/footer',$data);
        }
}

?>
