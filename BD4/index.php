<?php
    class BD{
        private $host;
        private $basedatos;
        private $puerto;
        private $usuario;
        private $password;
        private $conexion;
        private $BD_error;
        public function getConexion(){
            return $this->conexion;
        }
        public function getBD_error(){
            return $this->BD_error;
        }

        //constructor

        public function __construct($host, $base,  $usuario, $puerto=3306, $passwd="")
        {
            try{
                $this->conexion=new PDO("mysql:dbname=$base;host=$host;port=$puerto,$usuario, $passwd");
                $this->conexion->PDO::ATTR_ERRMODE, PDO:ERRMODE_EXCEPTION);
                $this->conexion->exec("set names utf8");
            }catch(PDOException $e){
                $this->conexion=null;
                $this->BD_error=$e->getMessage();
            }
        }

        /**
         * Function para crear un nueva tupla
         *
         * @param [string] $tabla nombre de la tabla donde se crea
         * @param [array] $camposvalores array asociativo con clave <nombrecampo>
         * y <valor> valor del campo Ej.:["ID"=> 34, "NOMBREALUMNO"=>"JUAN",..]
         * @return boolean TRUE exito o FALSE error.
         */

        public function Crear($tabla, $camposvalores){
            //variables para guardar los datos de $camposvalores
            $campo="";
            $valor="";

            foreach ($camposvalores as $key => $value) {
                $campo=$campo . $key . ",";
                $valor=$valor ."'". $value. "'" . ",";
        
            }

            //quito la ultima coma de cada variable
            $campo = substr($campo, 0, -1);
            $valor = substr($valor, 0 , -1);

            //inserto las variables a la cadena final
            $sql="INSERT INTO " . $tabla . " (" . $campo . ") VALUES (". $valor .")";
            //devuelvo la cadena final
            return $sql;
            try{
                $stm=$this->conexion->prepare($sql);
                $i=1;

            }catch(PDOException $e){
                
            }
        }

    }

    
    $bd= new Bd("127.0.0.1", "nortwind", "root");
   // $bd->Crear("categories", ["CategoryID"=>20, "CategoryName"=>"Ferreteria"]);
    
    $stm=$bd->Crear("categories", ["CategoryID"=>20, "CategoryName"=>"Ferreteria"])
    //                      VARIABLE  filtro para que sea string, distancia
    $stm->bindParam(":cat", $namecat, PDO::PARAM_STR, 25);
    $stm->execute();        //ejecuta
    $datos=$stm->fetchAll();//guardo en la variable datos en forma de array
    var_dump($datos);
?>