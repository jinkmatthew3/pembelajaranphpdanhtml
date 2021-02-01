<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class AddBarang extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->model('AddBarangModel');
			$this->load->helper('url');	
		}
		public function insert(){
			$data['js']=$this->load->view('include/javascript.php', NULL, TRUE);
			$data['css']=$this->load->view('include/css.php', NULL, TRUE);
			$this->load->view('../views/pages/addBarang.php',$data);

		}
		public function insert_action(){
			$value = array(
				'item_id'=> $this->input->post('item_id'),
				'name' => $this->input->post('name'),
				'price'=>$this->input->post('price'),
				'stock'=> $this->input->post('stock'),
				'gender'=> $this->input->post('gender'),
				'category'=> $this->input->post('category'),
				'description'=> $this->input->post('description')
			);
				$hasil=$this->AddBarangModel->insert($value);
				redirect("../?statsimpan=".$hasil);
				
				// $this->load->view('../views/pages/homeview.php');
		}
	}
 ?>