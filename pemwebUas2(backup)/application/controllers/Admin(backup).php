<?php

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

  public function index(){

		$crud = new grocery_CRUD();
		$data['judul'] = 'Admin Barang' ;
			
		
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
		$crud->field_type('gender','dropdown', array('F' => 'F', 'M' => 'M'));
		$crud->field_type('category','dropdown',array('Shirt' => 'Shirt', 'T-Shirt' => 'T-Shirt','Long Pants' => 'Long Pants' , 'Shoes' => 'Shoes', 'Short' => 'Short'));

		// untuk menampilkan textarea 
		$crud->callback_edit_field('description',array($this,'edit_desc'));
		$crud->callback_add_field('description',array($this,'add_desc'));

		// sesuai namanya jadi form nya required
		$crud->required_fields('item_id','name','gender');

		// untuk memastikan bahwa price diisi dengan angka
		$crud->set_rules('price','Price','numeric');

	
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		$data['css'] = $this->load->view('templates/cssadmin',$data,TRUE);
    	$data['js'] = $this->load->view('templates/jsadmin',$data,TRUE);
		$data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
		//$data['footer'] = $this->load->view('pages/footer.php',NULL,TRUE); 
		$this->load->view('templates/header', $data);
		$this->load->view('pages/admin/barang',$data);
		$this->load->view('templates/footer',$data);
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
