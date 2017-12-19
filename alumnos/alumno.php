<?php

    class Alumno {
    
        protected $Nie;
        protected $Nombre;
        protected $Apellidos;
        private $Edad;
        private $Curso;

        //Constructor
        function __construct($nie, $nombre, $apellidos, $edad, $curso) {

            $this->Nie=$nie;
            $this->Nombre=$nombre;
            $this->Apellidos=$apellidos;
            $this->Edad=$edad;
            $this->Curso=$curso;
        }

        public function getEdad() {
            
            return $this->Edad;
        }

        public function getCurso() {
            
            return $this->Curso;
        }

        public function getNombre() {
            
            return $this->Nombre;
        }

        public function getApellidos() {
            
            return $this->Apellidos;
        }

        public function getNie() {
            
            return $this->Nie;
        }

        public function setEdad($Edad) {
            
            $this->Edad=$Edad;
        }

        public function setCurso($Curso) {
            
            $this->Curso=$Curso;
        }

        public function setNie($Nie) {
            
            $this->Nie=$Nie;
        }

        public function setNombre($Nombre) {
            
            $this->Nombre=$Nombre;
        }

        public function setApellidos($Apellidos) {
            
            $this->Apellidos=$Apellidos;
        }

        public static function Becario() {

            return "Enhorabuena te han concedido 1000€ de beca";
        }

        public function NombreCompleto() {

            return $this->Nombre." ".$this->Apellidos;
        }

        public static function getAlumnos() {

            $alumnos=[
            "111A" => new Alumno("111A","Franchesquito","Se mete coca",20,"2º DAW",250), 
            "222B" => new Alumno("222B","Fran","Vicaria Consuegra",28,"1º DAW",210),
            "333C" => new Alumno("333C","Fransisco","Que no eres bueno",25,"2º DAW",200)
            ];
            return $alumnos;
        }

    }

    class AlumnoSabio extends Alumno {
        
         private $CI;

         function __construct($n,$nm,$ap,$ed,$cur,$ci) {

            parent::__construct($n,$nm,$ap,$ed,$cur);
            $this->CI=$ci;
         }

         public function getCi() {
            
            return $this->CI;
        }

        public function setCi($CI) {
            
            $this->CI=$ci;
        }
    }
?>