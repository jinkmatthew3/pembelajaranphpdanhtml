<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
    public function index(){
      $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
      $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
      $data['header'] = $this->load->view('cart/header.php', NULL, TRUE);
      $data['body'] = $this->load->view('cart/body.php', NULL, TRUE);
      $data['footer'] = $this->load->view('cart/footer.php', NULL, TRUE);
      $this->load->view('cart/cart.php', $data);
    }
}


 ?>
