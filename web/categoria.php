<?php

        class Categoria {
            
                protected $Id;
                protected $Nombre;
            
                function __construct($id, $nombre) {
            
                    $this->Id = $id;
                    $this->Nombre = $nombre;
                }
            
                public function getId() {
            
                    return $this->Id;
                }

                            
                public function getNombre() {
                    
                    return $this->Nombre;
                }
            
                public static function getCategorias() {
                    
                $categoria=[
                "1A" => new Categoria("1A","Alcohol"), 
                "2B" => new Categoria("2B","Cerveza"),
                "3C" => new Categoria("3C","Agua")
                ];

                return $categoria;

                }
            }
?>