<?php
    class Pieza {
        public $IdPieza;
        public $Descripcion;
        public $Categoria;
        public $IdCoche;
        public $Stock;
        public $Precio;

        public function __construct($id, $des, $cat, $idc, $st, $pre){
            $this->IdPieza=$id;
            $this->Descripcion=$des;
            $this->Categoria=$cat;
            $this->IdCoche=$idc;
            $this->Stock=$st;
            $this->Precio=$pre;
        }
        public function getId(){
            return $this->IdPieza;
        }
        public function getDescripcion(){
            return $this->Descripcion;
        }
        public function getCategoria(){
            return $this->Categoria;
        }
        public function getIdcoche() {
            return $this->Idcoche;
        }
        public function getStock(){
            return $this->Stock;
        }
        public function getPrecio(){
            return $this->Precio;
        }
        public static function getPiezas(){
            $piezas =["111-AAA"=>new Pieza("111-AAA","Tortinillo","Ruedas", "222-bb-bbbb-22", "100", "5")];
            return $piezas;
        }

    }
?>