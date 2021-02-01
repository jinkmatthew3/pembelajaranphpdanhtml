<?php

    //Di halaman utama supaya bisa nampilin barang secara random
    class Home_model extends CI_model
    {   
        //dapetin random barang buat di home
        public function randBarang(){
            $query = $this->db->query("
            SELECT item_id,name, Image
            FROM item 
            ORDER BY RAND()
            LIMIT 4;");
            return $query->result_array();
        }

        //dapetin detail product barang
        public function detailProductModel($idBarang){
            $query = $this->db->query("
            SELECT item_id , price, name, gender, category, 
            description, material, Image
            FROM item 
            WHERE item_id = ".$idBarang." ;");
            if($query->num_rows() == 1){
                //print_r($query->result_array());
                return $query->result_array();
            }
            else{
                return NULL;
            }
            //return $query->result_array();
        }

        //dapetin detail size dari product
        public function detailProductSizeModel($idBarang){
            $query = $this->db->query("
            SELECT s.name as size
            FROM item as i 
            left join clothes_size as cs on i.item_id = cs.item_id 
            left join size as s on cs.size_id = s.size_id
            WHERE i.item_id = ".$idBarang." ;");
            if($query->num_rows() >= 1){
                //print_r($query->result_array());
                return $query->result_array();
            }
            else{
                return NULL;
            }
        }

        //kalo dia pilih all product di halaman utama
        public function getAllProducts(){
            $query = $this->db->query("
            SELECT item_id, Image , name, price
            FROM item;");
            if($query->num_rows() >= 1){
                //print_r($query->result_array());
                return $query->result_array();
            }
            else{
                return NULL;
            }
        }

        public function getByCategoryProducts($category){
            $query = $this->db->query("
            SELECT item_id, Image , name, price
            FROM item
            WHERE category='".$category."';");
            if($query->num_rows() >= 1){
                //print_r($query->result_array());
                return $query->result_array();
            }
            else{
                return NULL;
            }
        }

        //kalo dia pilih sesuai dengan gender yg diminta tapi kategorinya semua
        public function getGenderProducts($gender){
            if($gender == "man"){
                $charGender = 'M';
            }
            else if($gender == "woman"){
                $charGender = 'F';
            }
            $query = $this->db->query("
            SELECT item_id, Image , name, price
            FROM item
            where gender = '".$charGender."';");
            if($query->num_rows() >= 1){
                //print_r($query->result_array());
                return $query->result_array();
            }
            else{
                return NULL;
            }
        }

        //buat ngambil sesuai yg gender dan kategori yg diminta
        public function getProducts( $gender , $kategori ){
            if($gender == "man"){
                $charGender = 'M';
            }
            else if($gender == "woman"){
                $charGender = 'F';
            }
            $query = $this->db->query("
            SELECT item_id, Image , name, price
            FROM item
            where gender = '".$charGender."' and category = '".$kategori."';");
            if($query->num_rows() >= 1){
                //print_r($query->result_array());
                return $query->result_array();
            }
            else{
                return NULL;
            }
        }
        
        public function searchProduct($txtSearch){
            $query = $this->db->query("
            SELECT item_id, Image , name, price
            FROM item
            WHERE name LIKE '%".$txtSearch['txtSearch']."%';");
            if($query->num_rows() >= 1){
                //print_r($query->result_array());
                return $query->result_array();
            }
            else{
                return NULL;
            }
        }
    }
?>