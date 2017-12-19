<?php

class Producto {

    protected $Id;
    protected $Marca;
    protected $Stock;
    protected $Precio;

    function __construct($id, $marca, $stock, $precio) {

        $this->Id = $id;
        $this->Marca = $marca;
        $this->Stock = $stock;
        $this->Precio = $precio;
    }

    public function getId() {

        return $this->Id;
    }

    public function getMarca() {

        return $this->Marca;
    }

    public function getStock() {
        
        return $this->Stock;
    }

    public function getPrecio() {
                
        return $this->Precio;
    }

    public function setId($Id) {

        $this->Id=$Id;
    }

    public function setMarca($Marca) {
        
        $this->Marca=$Marca;
    }

    public function setStock($Stock) {
        
        $this->Stock=$Stock;
    }

    public function setPrecio($Precio) {
        
        $this->Precio=$Precio;
    }

    public static function getProductos() {
        
        $productos=[
        "1A" => new Producto("1A","Negrita",20,250), 
        "2B" => new Producto("2B","Estrella Galicia",28,210),
        "3C" => new Producto("3C","AquaBona",25,200)
         ];

        return $productos;
    }

}

?>