<?php
    class hewan{
        private $hidup = true;
        private $name;

        function __construct($nama_hewan){
            $this->name = $nama_hewan;
            echo $this->name." adalah hewan hidup<br>";
        }

        public function makan(){
            return $this->name." suka makan, nyam nyam nyam.<br>";
        }

        public function tidur(){
            return $this->name." suka tidur,zzzz zzzz zzzz.<br>";
        }

        public function berjalan(){
            return $this->name." suka berjalan, tuk ku tuk<br>";
        }

        function __destruct(){
            echo $this->name." telah wafat<br>";
        }
    }

    $obj1 = new hewan("Momo");
    $obj2 = new hewan("Mimi");
    $obj3 = new hewan("Mumu");

    echo "<br><br>";

    echo $obj1->makan();
    echo $obj2->tidur();
    echo $obj3->berjalan();

    echo "<br><br>";

    unset($obj1);
    unset($obj2);
    unset($obj3);
?>
