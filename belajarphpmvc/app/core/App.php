<?php

class App{
    protected $controller = 'Home'; // ini buat nerima controllernya
    protected $method = 'index'; // ini buat nerima methodnya
    protected $params = []; // ini buat nerima parameter2nya

    function __construct(){
        $url = $this->parseURL();

        //controller
        if(file_exists('../app/controllers/'. $url[0] . '.php')){ //ini buat ngecek file controllernya ada atau engak
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php'; 
        $this->controller = new $this->controller; // ini buat inisiasi controllernya

        //method
        if( isset($url[1]) ){ // ini buat nerima methodnya
            if( method_exists($this->controller,$url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //parameter
        if( !empty($url) ){
            $this->params = array_values($url);
        }

        //jalanin controller, method , & parameter kalo ada
        call_user_func_array([$this->controller, $this->method ],$this->params);
    }

    public function parseURL(){ // ini supaya webnya aman dari attack buat di urlnya
        if( isset($_GET['url']) ){
            $url = rtrim($_GET['url'],'/');//supaya enggak dapet / di bagian belakan dari url
            $url = filter_var($url,FILTER_SANITIZE_URL); //supaya dibersihin dari attack2
            $url = explode('/',$url);//misahin antara controller method sama parameter
            return $url;
        }
    }
}