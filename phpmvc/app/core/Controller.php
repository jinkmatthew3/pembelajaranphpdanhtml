<?php

class Controller{
    //kalo yang dipake itu view
    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    } 

    //kalo yang dipake itu model
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model; //karena model itu class makanya diinisiaisi di sini
    }
}

?>