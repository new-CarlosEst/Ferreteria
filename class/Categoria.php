<?php
    class Categoria {
        private $codCategoria;
        private $nombre;
        private $descripcion;

        public function __construct($codCat, $nb, $desc){
            $this->codCategoria = $codCat;
            $this->nombre = $nb;
            $this->descripcion = $desc;
        }

        //TODO Getters y setters
        
    }
?>