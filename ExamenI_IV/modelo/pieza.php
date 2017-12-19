<?php
class Pieza
{
    private $IDPieza;
    private $Descripcion;
    private $Categoria;
    private $IDCoche;
    private $Stock;
    private $Precio;
    public function __construct($id,$des,$cat,$idc,$stk,$pre)
    {
        $this->IDPieza=$id;
        $this->Categoria=$cat;
        $this->Descripcion=$des;
        $this->IDCoche=$idc;
        $this->Precio=$pre;
        $this->Stock=$stk;
    }

    public function getIDPieza()
    {
        return $this->IDPieza;
    }
}