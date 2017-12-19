<?php
class Categoria
{
    private $CodCategoria;
    private $Categoria;

    //Constructor
    public function __construct($cod,$cat)
    {
        $this->Categoria=$cat;
        $this->CodCategoria=$cod;
    }

    public function getCategoria()
    {
        return $this->Categoria;
    }
    public function getCodigo()
    {
        return $this->CodCategoria;
    }
    public static function getCategorias()
    {
        return [new Categoria("tor","Tornillos"),
        new Categoria("ali","Tenazas y alicates")];
    }
    public static function getCategoriaId($cod)
    {
        foreach (self::getCategorias() as $categ) {
            if($categ->getCodigo()==$cod)
            {
                return $categ->getCategoria();
            }
        }
        return NULL;
    }
}