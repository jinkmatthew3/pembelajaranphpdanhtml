<?php

class Home extends Controller{

    public function index(){
        $this->view('home/index',$data);//view yang mau ditampilin
    }

?>