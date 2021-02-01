<?php 
	class AddBarangModel extends CI_Model
	{
		public function insert($values){
			$hasil=$this->db->insert('item',$values);
			if($hasil) {
				return $hasil;
			} else {
				return 0;
			}
		}	
	}
 ?>