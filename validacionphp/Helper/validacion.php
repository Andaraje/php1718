<?php
class ErrorValida
{
    private $codigo;
    private $campo;
    private $mensaje;

    public function __construct($codigo,$campo,$mensaje)
    {
        $this->campo=$campo;
        $this->codigo=$codigo;
        $this->mensaje=$mensaje;
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
}

class Validacion
{
    private $Errores;

    public function __construct()
    {
        $this->Errores=array();
    }

    public function Valida_Requerido($campo,$valor)
    {
        if (empty($valor)) {
            $this->Errores[$campo]=
            new ErrorValida(8,$campo,
            "El campo $campo es necesario");
            return FALSE;
        }
        return TRUE;
    }
    
    public function Valida_Numero_Min($campo,$valor,$min=PHP_INT_MIN)
    {
        
        if(!filter_var($valor,FILTER_VALIDATE_INT,
        ["options"=>["min_range"=>$min]]))
        {
            $this->Errores[$campo]=
            new ErrorValida(1,$campo,
    "El campo $campo debe ser un número mayor que $min");
            return FALSE;
        }
        return TRUE;
    }

    public function Valida_Numero_Max($campo,$valor,$max=PHP_INT_MAX)
    {
        
        if(!filter_var($valor,FILTER_VALIDATE_INT,
        ["options"=>["max_range"=>$max]]))
        {
            $this->Errores[$campo]=new ErrorValida(1,$campo,
            "El campo $campo debe ser un número menor que $max");
            return FALSE;
        }
        return TRUE;
    }

    public function Valida_Email($campo,$valor)
    {
        if(filter_var($valor,FILTER_VALIDATE_EMAIL)==NULL)
        {
            $this->Errores[$campo]=new ErrorValida(2,$campo,
            "El campo $campo no es un email válido");
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Válida una cadena de caracteres con una longitud mínima y máxima
     * 
     * @param [string] $campo nombre del campo input del que procede el valor
     * @param [string] $valor valor del campo anterior
     * @param integer $min longitud mínima de la cadena valor por defecto NULL
     * @return boolean TRUE si pasa la validación FALSE si no
     */
    public function Valida_Cadena_Min($campo,$valor,$min=NULL)
    {
        if($min!=NULL && strlen($valor)<$min)
        {
            $error=new ErrorValida(4,$campo,
            "El campo $campo debe tener al menos $min caracteres"); 
            $this->Errores[$campo]=$error;
            return FALSE;
        }
        return TRUE;
    }

    public function Valida_Cadena_Max($campo,$valor,$max=NULL)
    {
        if($max!=NULL && strlen($valor)>$max)
        {
            $error=new ErrorValida(5,$campo,
            "El campo $campo no puede tener mas de $max caracteres"); 
            $this->Errores[$campo]=$error;
            return FALSE;
        }
        return TRUE;
    }

    public function Valida_Patron($campo,$valor,$patron)
    {
        if(preg_match($patron,$valor)!=1)
        {
            $this->Errores[$campo]=new ErrorValida(6,$campo,
            "El campo $campo no cumple el patrón $patron");
            return FALSE;
        }
        return TRUE;
    }
    public function ValidaDNI($campo, $valor, $patron)
    {
        if(preg_match($patron, $valor)!=1)
        {
            $this->Errores[$campo]=new ErrorValida(6,$campo,
            "El campo $campo no cumple el patrón $patron");
            return FALSE;
        }else{
            function validar_dni($valor){
                $letra = substr($valor, -1);
                $numeros = substr($valor, 0, -1);
                if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }
             
        }
    }

    /**
     * Función que valida los datos de un formulario
     * de acuerdo con las normas contenidas en un array
     * @param [array] $normas_validacion
     * @return void
     */
    public function Valida($normas_validacion)
    {
        foreach ($normas_validacion as $campo => $normas) {
            foreach ($normas as $norma => $valor) {
                switch ($norma) {
                    case 'requerido':
                        $this->Valida_Requerido($campo,$_POST[$campo]);
                        break;
                    case 'patron':
                        $this->Valida_Patron($campo,$_POST[$campo],$valor);
                        break;
                    case 'min':
                        $this->Valida_Numero_Min($campo,$_POST[$campo],$valor);
                        break;
                    case 'max':
                        $this->Valida_Numero_Max($campo,$_POST[$campo],$valor);
                        break;
                    case 'min_longitud':
                        $this->Valida_Cadena_Min($campo,$_POST[$campo],$valor);
                        break;
                    case 'max_longitud':
                        $this->Valida_Cadena_Max($campo,$_POST[$campo],$valor);
                        break;
                    default:
                        throw new Exception("Norma validación invalida", 1);
                        break;
                }
            }
        }
    }
    public function ValidacionPasada()
    {
        if(count($this->Errores)==0)
        {
            return TRUE;
        }
        return FALSE;
    }
    public function ImprimeError($campo)
    {
        $cadena="";
        if(isset($this->Errores[$campo]))
        {
            $cadena="<span class='error_valida'>".$this->Errores[$campo]->getMensaje().
            "</span>";
        }
        return $cadena;
    }
    public function ImprimeValor($campo)
    {
        return isset($_POST[$campo])?$_POST[$campo]:"";
    }

    public function getErrores()
    {
        return $this->Errores;
    }
}