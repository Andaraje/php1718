<?php
    class Coche {
        public $IdCoche;
        public $Marca;
        public $Modelo;
        public $Combustible;
        public $AnioFabricacion;
        public $Observaciones;

        public function __construct($id, $ma, $mo, $com, $anio, $ob){
            $this->IdCoche=$id;
            $this->Marca=$ma;
            $this->Modelo=$mo;
            $this->Combustible=$com;
            $this->AnioFabricacion=$anio;
            $this->Observaciones=$ob;
        }
        public static function getCoches(){

            //$coches=[$coche1->getIDCoche()=>coche1, $coche2->getIDCoche()=>coche2, $coche3->getIDCoche()=>coche3];
            $coches =["222-bb-bbbb-22"=>new Coche("222-bb-bbbb-22","FORD","FIESTA", "gasolina", "2014", "bicolor"),
                    "222bbb"=>new Coche("222bbb", "RENAULT", "MEGANE", "diesel", "2010", "bimasa"),
                     "333ccc"=>new Coche("333ccc", "OPEL", "CORSA","gasolina", "2000", "automatico")];
            return $coches;
        }
        public function getMarca(){
            return $this->Marca;
        }
        public function getModelo(){
            return $this->Modelo;
        }
    }
?>