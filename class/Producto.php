<?php
    class Producto {
        private $codProducto;
        private $nombre;
        private $descripcion;
        private $peso;
        private $stock;
        private $codCategoria;

        public function __construct($codProd, $nb, $desc, $peso, $stock, $codCat){
            $this->codProducto = $codProd;
            $this->nombre = $nb;
            $this->descripcion = $desc;
            $this->peso = $peso;
            $this->stock = $stock;
            $this->codCategoria = $codCat;
        }

        //TODO Getter y setters necesarios
    }
?>