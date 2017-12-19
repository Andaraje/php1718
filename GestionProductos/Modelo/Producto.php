<?php
class Producto
{
    private $CodProducto;
    private $Descripcion;
    private $Stock;
    private $Precio;
    private $CodCategoria;

    public function __construct($cod,$des,$stk,$pre,$cat)
    {
        $this->CodProducto=$cod;
        $this->Descripcion=$des;
        $this->Precio=$pre;
        $this->Stock=$stk;
        $this->CodCategoria=$cat;
    }

    public function getCodigo()
    {
        return $this->CodProducto;
    }
    public function getDescripcion()
    {
        return $this->Descripcion;
    }
    public function getPrecio()
    {
        return $this->Precio;
    }
    public function getStock()
    {
        return $this->Stock;
    }
    public static function getProductos()
    {
        return ["tor"=>[new Producto("tor123",
        "Tornillo tres vueltas",1000,1,"tor"),
        new Producto("torexa","Tornillo cabeza hexahonal",
        500,1.5,"tor")],"ali"=>[new Producto("alifino",
        "Alicate de hoja fina",20,5,"ali"),
        new Producto("alicha","Alicate de chapa",10,
        8,"ali")]
    ];
    }
}