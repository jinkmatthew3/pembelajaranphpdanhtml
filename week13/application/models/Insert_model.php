<?php
class Insert_model extends CI_Model{
    public function insert($values){
        $this->db->insert('products',$values);
    }
}
    
?>