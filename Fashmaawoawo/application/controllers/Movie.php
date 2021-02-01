<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

	public function index(){

		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$crud = new grocery_CRUD();
			
		
		// load database nya 
		$crud->set_table('item');
		$crud->set_theme('datatables');

		
		// menampilkan column 
		$crud->columns('item_id','name','stock','price','gender','category','Image');
		//$crud->unset_columns('description');
		$crud->display_as('name','Nama Barang');
		$crud->fields('item_id','name','stock','price','gender','category','description','Image');
		$crud->set_field_upload('Image','assets/uploads/poto');
		$crud->set_subject('Fashmawo');

		// untuk menampilkan dropdownnya, karena kita gk relation
		$crud->field_type('gender','dropdown', array('1' => 'F', '2' => 'M'));
		$crud->field_type('category','dropdown',array('1' => 'Shirt', '2' => 'T-Shirt','3' => 'Long Pants' , '4' => 'Shoes', '5' => 'Short'));

		// untuk menampilkan textarea 
		$crud->callback_edit_field('description',array($this,'edit_desc'));
		$crud->callback_add_field('description',array($this,'add_desc'));

		// sesuai namanya jadi form nya required
		$crud->required_fields('item_id','name','gender');

		// untuk memastikan bahwa price diisi dengan angka
		$crud->set_rules('price','Price','numeric');

	
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		// $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		// $data['css'] = $this->load->view('include/css.php',NULL,TRUE);
		// $data['header'] = $this->load->view('pages/header.php',NULL,TRUE);
		// $data['footer'] = $this->load->view('pages/footer.php',NULL,TRUE); 

		$this->load->view('Home',$data);
		// $this->_example_output($output);
	}

	public function edit_desc($value,$primary_key)
	{
		return "<textarea name='description'> $value</textarea>";
	}

	public function add_desc()
	{
		return "<textarea name='description'></textarea>";
	}

}


?>