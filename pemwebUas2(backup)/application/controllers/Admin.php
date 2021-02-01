<?php

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
    }
    
    public function index(){
        $crud = new grocery_CRUD();

        $crud->set_table('transactions');
        $crud->set_theme('datatables');
        $crud->set_relation('user_id','user','{fname} {lname}');
        $crud->display_as('user_id','User Name');
        $crud->columns('transactions_id','date','user_id','shipping_address');
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $this->load->view('home',$data);
            
    }

    public function hal_chart(){
        $crud = new grocery_CRUD();
            
        
        // load database nya 
        $crud->set_table('transactions');
        $crud->set_theme('datatables');
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $this->load->view('charts',$data);
    }

    public function hal_table(){
        $crud = new grocery_CRUD();

        // load database nya 
        $crud->set_table('transactions');
        $crud->set_theme('datatables');
        //$crud->set_relation('user_id','user','fname');
        //$crud->set_relation('user_id','user','email');
        $crud->set_relation('user_id','user','{fname} {lname}');
        $crud->display_as('user_id','User Name');
        $crud->columns('transactions_id','date','user_id','shipping_address');
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $this->load->view('tables',$data);
    }

    public function hal_table_customer()
    {
        $crud = new grocery_CRUD();

        // load database nya 
        $crud->set_table('user');
        $crud->set_theme('datatables');
        $crud->unset_columns('password');
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $this->load->view('tables',$data);
    }

    public function hal_table_products()
    {
        $crud = new grocery_CRUD();

        // load databasenya
        $crud->set_table('item');
        $crud->set_theme('datatables');

        //relation 2 tabel
        $crud->set_relation_n_n('Size','clothes_size','size','item_id','size_id','name');

        // menampilkan column 
        $crud->columns('item_id','name','stock','price','gender','category','Image','Size');
        //$crud->unset_columns('description');
        $crud->display_as('name','Nama Barang');
        $crud->fields('item_id','name','stock','price','gender','category','description','Image');
        $crud->set_field_upload('Image','assets/uploads/poto');
        $crud->set_subject('Fashmawo');
        $crud->unset_delete();
       

        // untuk menampilkan dropdownnya, karena kita gk relation
        $crud->field_type('gender','dropdown', array('F' => 'F', 'M' => 'M'));
        $crud->field_type('category','dropdown',array('Shirt' => 'Shirt', 'T-Shirt' => 'T-Shirt','Long Pants' => 'Long Pants', 'Shoes' => 'Shoes', 'Short' => 'Short'));

        // untuk menampilkan textarea 
        $crud->callback_edit_field('description',array($this,'edit_desc'));
        $crud->callback_add_field('description',array($this,'add_desc'));

        // sesuai namanya jadi form nya required
        $crud->required_fields('item_id','name','gender');

        // untuk memastikan bahwa price diisi dengan angka
        $crud->set_rules('price','Price','numeric');

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $this->load->view('tables',$data);

        // select item.name, group_concat(size.name) 
        // from item join
        // clothes_size on clothes_size.item_id = item.item_id
        // join size on clothes_size.size_id = size.size_id
        // group by item.item_id;

        // select date ,concat(fname," ",lname) as "nama gabung", email, shipping_address, pnumber
        // from transactions
        // join user on transactions.user_id = user.user_id;
        
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
