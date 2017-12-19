<?php
class error {
	private $codigo;
	private $campo;
    private $mensaje;
    
    public function __construct($codigo, $campo, $mensaje){
        $this->campo=$campo;
        $this->codigo=$codigo;
        $this->mensaje=$mensaje;
    }
}

class Validacion{
	private $Errores; {

	public function __construct(){
	    $this->Errores=array();
	}
	public function Valida_Numero($campo, $valor, $min=null, $max=null){
        if($min=null && $max=null){
            if(!filter_var($valor, FILTER_VALIDATE_INT)){
                $this->Errores[$campo]=new error(1,$campo, "El campo $campo no es un entero")
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            if(!filter_var($valor, FILTER_VALIDATE_INT,["options"=>["min_range"=>$min, "max_range"=>$max]])){
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    public function Valida_Numero2($campo, $valor, $min=PHP_INT_MIN, $max=PHP_INT_MAX){
            if(!filter_var($valor, FILTER_VALIDATE_INT,["options"=>["min_range"=>$min, "max_range"=>$max]])){
                $this->Errores[$campo]=new error(1,$campo, "El campo $campo no es un numero válido")
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    //validar string, validar dni (bien hecho)
}
?>