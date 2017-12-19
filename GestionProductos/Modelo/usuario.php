<?php
class Usuario
{
    private $usuario;
    private $pasword;

    public function __construct($u,$p)
    {
        $this->pasword=$p;
        $this->usuario=$u;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getPasword()
    {
        return $this->pasword;
    }

    public static function getUsuarios()
    {
        $usu=new Usuario("usuario","usuario");
        return [$usu->getPasword()=>$usu];
    }
}