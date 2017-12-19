<?php
    class Agricultor
    {
        public $NSocio;
        public $Nombre;
        public $Apellidos;
        public $Contrasena;

        public function __construct($ns, $nm, $ap, $paswd)
        {
            $this->NSocio=$ns;
            $this->Nombre=$nm;
            $this->Apellidos=$ap;
            $this->Contrasena=$paswd;
        }
        public function getNSocio(){
            return $this->NSocio;
        }
        public function getPass(){
            return $this->Contrasena;
        }
        public static function getAgricultores(){
            $agricultores =["111aaa"=>new Agricultor("111aaa","pepe","Quesada perez", "111@a"),
                            "222bbb"=>new Agricultor("222bbb", "oscar", "Jimenez Sanchez", "222@b")];
            return $agricultores;
        }
    }
?>