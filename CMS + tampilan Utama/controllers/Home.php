<?php 	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller
	{
		public function index(){
			$data['product']=$this->Model_CMS_Barang->get_product();
			$data['js']=$this->load->view('include/javascript.php', NULL,TRUE);
			$data['css']=$this->load->view('include/css.php', NULL, TRUE);
			$data['header']=$this->load->view('pages/header.php', NULL, TRUE);
			$data['footer']=$this->load->view('pages/footer.php', NULL, TRUE);
			$this->load->view('pages/home.php', $data);
		}
		public function __construct(){
			parent::__construct();
			$this->load->model('Model_CMS_Barang');
		}

		// public function index(){
		// 	$data['product']=$this->home_model->get_product();
		// 	$data['js']=$this->load->view('include/javascript.php', NULL, TRUE);
		// 	$data['css']=$this->load->view('include/css.php', NULL, TRUE);
		// 	$data['header']=$this->load->view('pages/header.php', NULL, TRUE);
		// 	$data['footer']=$this->load->view('pages/footer.php', NULL, TRUE);
		// 	$this->load->view('pages/homeview.php',$data);

			
		// }
	}
 ?>