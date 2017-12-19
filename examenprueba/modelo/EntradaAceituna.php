<?php
    
    class EntradaAceituna
    {
        public $NSocio;
        public $IdParcela;
        public $FechaEntrada;
        public $Kilos;
        

        public function __construct($nso, $idp, $fe, $kg)
        {
            $this->NSocio=$nso;
            $this->IdParcela=$idp;
            $this->FechaEntrada=$fe;
            $this->Kilos=$kg;
            
        }
        public function getSocio(){
            return $this->NSocio;
        }
        public function getParcela(){
            return $this->IdParcela;
        }
        public function getFecha(){
            return $this->FechaEntrada;
        }
        public function getKilos(){
            return $this->Kilos;
        }
        public static function getEntradas(){
             $entradas = ["111aaa"=>[new EntradaAceituna("111aaa","aaa111","2017-10-11", "333")]];
            return $entradas;
        } 
    }
?>