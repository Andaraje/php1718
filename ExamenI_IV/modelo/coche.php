<?php
class Coche
{
    private $IDCoche;
    private $Marca;
    private $Modelo;
    private $Combustible;
    private $AñoFabricacion;
    private $Observaciones;

    public function __construct($id,$mrc,$mdl,$comb,$anno,$obs="")
    {
       $this->AñoFabricacion=$anno;
       $this->Combustible=$comb;
       $this->IDCoche=$id;
       $this->Marca=$mrc;
       $this->Modelo=$mdl;
       $this->Observaciones=$obs;
    }

    public function getIDCoche()
    {
        return $this->IDCoche;
    }

    /**
     * Función que devuelve un array con la colección de coches
     * @return [ID=>coche...]
     */
    public static function getCoches()
    {
        $coche1=new Coche("1234-FD-FOCU-17","FORD","FOCUS","G",2017);
        $coche2=new Coche("3456-RN-MGAN-10","RENAULT","MEGANE","D",2010,"Metalizado");
        $coche3=new Coche("6389-OP-CORS-00","OPEL","CORSA","G",2000);
        $coches=[$coche1->getIDCoche()=>$coche1,$coche2->getIDCoche()=>$coche2,
        $coche3->getIDCoche()=>$coche3];
        return $coches;
    }
    
}