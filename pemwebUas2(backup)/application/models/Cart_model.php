<?php

    //Di halaman utama supaya bisa nampilin barang secara random
    class Cart_model extends CI_model
    {   
        public function getItem($barangs){
            $query = $this->db->query("
            SELECT item_id, name, Image , price
            FROM item 
            WHERE item_id = ". $barangs['id_barang'] .";");
            return $query->result_array();
        }

        public function getItemReceipt($barangs){
            $query = $this->db->query("
            SELECT item_id, name, Image , price
            FROM item 
            WHERE item_id = ". $barangs['item_id'] .";");
            return $query->result_array();
        }

        public function userDetail($user_id){
            $query = $this->db->query("
            SELECT fName, lName, address , pNumber , email
            FROM user 
            WHERE user_id = ". $user_id .";");
            return $query->result_array();
        }

        public function insertTransaction($shipAddress){
            $input = [
            'user_id'=>$_SESSION['id'], 
            'shipping_address'=>$shipAddress
            ];

            $this->db->insert('transactions', $input);
         
            $insertId = $this->db->insert_id();
        
            return  $insertId;
        }

        public function insertTransactionDetail($insertId,$detail){
            $input = [
            'transactions_id'=>$insertId, 
            'item_id'=>$detail['id_barang'],
            'qty'=>$detail['qty']
            ];

            $this->db->insert('transaction_detail', $input);
            //print_r($detail);
            //echo $insertId;
        }

        public function getTransaction($id_transaksi){
            $query = $this->db->query("
            SELECT transactions_id, shipping_address, user_id
            FROM transactions 
            WHERE transactions_id = ". $id_transaksi .";");
            return $query->result_array();
        }


        public function getTransactionDetail($id_transaksi){
            $query = $this->db->query("
            SELECT item_id, qty
            FROM transaction_detail 
            WHERE transactions_id = ". $id_transaksi .";");
            return $query->result_array();
        }
    }
?>