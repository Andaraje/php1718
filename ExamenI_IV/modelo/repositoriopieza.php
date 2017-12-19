<?php
include_once __DIR__.'./pieza.php';
class RepositorioPieza
{
    private static $Piezas;

    public static function Iniciar()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
        if(!isset($_SESSION["piezas"]))
        {
            RepositorioPieza::$Piezas=array();
        }
        else
        {
            $this->Piezas=$_SESSION["piezas"];
        }
    }

    public static function NuevaPieza($pieza)
    {
        RepositorioPieza::$Piezas[$pieza->getIDPieza()]=$pieza;
        $_SESSION["piezas"]=RepositorioPieza::$Piezas;
    }

    public function getPiezas()
    {
        return RepositorioPieza::$Piezas;
    }
}
