<?php

class Ramal {
        public $id;
        public $ramal;
        public $nome;
        public $ip;
        public $status;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
    }

?>    