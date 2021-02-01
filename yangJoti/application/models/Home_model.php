<?php

    class Home_model extends CI_model
    {
        public function randBarang(){
            $query = $this->db->query("
            SELECT name, Image
            FROM item 
            ORDER BY RAND()
            LIMIT 4;");
            return $query->result_array();
        }
    }
    

?>