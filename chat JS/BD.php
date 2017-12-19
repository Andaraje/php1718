<?php
class BD
{
    private $host;
    private $basedatos;
    private $puerto;
    private $usuario;
    private $password;
    private $conexion;
    private $BD_error;

    public function getBD_error()
    {
        return $this->BD_error;
    }
    public function getconexion()
    {
        return $this->conexion;
    }

    //Constructor
    public function __construct($host,$base,$usuario,$pswd="",$puerto=3306)
    {
        try
        {
            $this->conexion=new PDO("mysql:dbname=$base;host=$host;port=$puerto",
            $usuario,$pswd);
            $this->conexion->
            setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec("set names utf8");
        }
        catch(PDOException $e)
        {
            $this->conexion=NULL;
            $this->BD_error=$e->getMessage();
        }
    }
    
    /**
     * Función para crear un nuevo registro
     *
     * @param [string] $tabla nombre de la tabla donde se crea
     * @param [array] $camposvalores array asociativo con clave <nombrecampo>
     * y <valor> valor del campo Ej.:["ID"=>34,"NombreAlumno"=>"Juan"...]
     * @return boolean TRUE exito o FALSE error.
     */
    public function Crear($tabla,$camposvalores)
    {
        if($this->conexion!=NULL)
        {
            $sql="insert into ".$tabla." (";
            $valores="(";
            foreach ($camposvalores as $campo => $valor) {
                $sql.=$campo.",";
                $valores.="?,";
            }
            $sql=substr($sql,0,strlen($sql)-1);
            $valores=substr($valores,0,strlen($valores)-1);
            $sql.=") values ".$valores.")";
        
            try
            {
                $stm=$this->conexion->prepare($sql);
                $i=1;
                foreach ($camposvalores as $campo => $valor)
                {
                    $stm->bindValue($i,$valor);
                    $i++;    
                }
                $stm->execute();
                return TRUE;
            }
            catch(PDOException $e)
            {
                $this->BD_error=$e->getMessage();
                return FALSE;
            }
        }
        return FALSE;
    }
    /**
     * Función para borrar una tupla
     *
     * @param [string] $tabla nombre de la tabla donde se borra
     * @param [array] $primary array asociativo con clave <nombrecampo>
     * y <valor> valor del campo Ej.:["ID"=>34,"NombreAlumno"=>"Juan"...]
     * @return boolean TRUE exito o FALSE error.
     */
    public function Borrar($tabla,$primary)
    {
        if($this->conexion!=NULL)
        {
            $sql="delete from $tabla where $primary[0]=? ";
            
            //Ataco la base de datos
            try
            {
                $stm=$this->conexion->prepare($sql);
                                
                //Parámetro del where
                $stm->bindValue(1,$primary[1]);
                $stm->execute();
                return TRUE;
            }
            catch(PDOException $e)
            {
                $this->BD_error=$e->getMessage();
                return FALSE;
            }
        }
        return FALSE;
    }/**
     * Función para leer un registro
     *
     * @param [string] $tabla nombre de la tabla donde se desea leer
     * la consulta devolverá un array de todas las tuplas de esa tabla
     * @return boolean TRUE exito o FALSE error.
     */
    public function Leer($tabla){
        if($this->conexion!=NULL)
        {
            try{
                $stm=$this->conexion->query("select * from $tabla ");
                $datos=$stm->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            }catch(PDOException $e){
                $this->BD_error=$e->getMessage();
                return false;
            }
           

        }
    }
    public function LeerPorId($tabla,$primary)
    {
        if($this->conexion!=NULL)
        {
            try
            {
                $stm=$this->conexion->prepare(
                "select * from $tabla where $primary[0]=?");
                $stm->bindValue(1,$primary[1]);
                $stm->execute();
                return $stm->fetch(PDO::FETCH_ASSOC);;
            }
            catch(PDOException $e)
            {
                $this->BD_error=$e->getMessage();
                return NULL;
            }   
        }
        return NULL;
    }
    /**
     * Actualizar
     *
     * @param [string] $tabla tabla donde se desea modificar un registro
     * @param [string] $id  el id de la tabla que se desea modificar
     * @param [string] $ids el valor del id de esa tabla
     * @param [string] $set campo a modificar
     * @param [string] $sets    valor a modificar
     * @return void
     */
    public function Actualizar($tabla, $id, $ids, $set, $sets)
    {
        if($this->conexion!=null)
        {
            $sql="update $tabla set $set = $sets where $id = '$ids'";

            try{
                $stm=$this->conexion->query($sql);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    }
    /**
     * Función para modificar un registro por clave primaria
     *
     * @param [string] $tabla Nombre de la tabla
     * @param [array] $camposvalores Array asociativo con nombre campo y valor
     * La clave <primary> guarda un array con el nombre y el valor del campo
     * que hace de clave primaria.
     * @return [boolean] True exito, False error
     */
    public function Modificar($tabla,$camposvalores)
    {
        if($this->conexion!=NULL)
        {
            $sql="update $tabla ";
            foreach ($camposvalores as $campo => $valor) {
                if($campo!="primary")
                {
                    $sql.="set $campo =?,";
                }
            }

            //quito última coma
            $sql=substr($sql,0,strlen($sql)-1);
            //Añado la condición
            $sql.=" where {$camposvalores['primary'][0]}=?";
            //Ataco la base de datos
            try
            {
                $stm=$this->conexion->prepare($sql);
                //Los enlaces con los parámetros
                $i=1;
                foreach ($camposvalores as $campo => $valor) {
                    if($campo!="primary")
                    {
                        $stm->bindValue($i,$valor);
                    }
                    $i++;
                }
                //Parámetro del where
                $stm->bindValue($i-1,$camposvalores['primary'][1]);
                $stm->execute();
                return TRUE;
            }
            catch(PDOException $e)
            {
                $this->BD_error=$e->getMessage();
                return FALSE;
            }
        }
        return FALSE;
    }

}
