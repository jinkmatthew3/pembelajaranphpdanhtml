<?php 
	class Model_CMS_Barang extends CI_Model{
		function get_product()
		{
			$query =$this->db->query("SELECT * FROM item");
			return $query->result_array();
		}
		
		
	}
 ?>