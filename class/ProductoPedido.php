<?php
    class ProductoPedido {
        private $codProducto;
        private $codPedido;
        private $codPedProd;
        private $unidades;

        public function __construct($codProd, $codPed, $codPedProd, $unidades){
            $this->codProducto = $codProd;
            $this->codPedido = $codPed;
            $this->unidades = $unidades;
            $this->codPedProd = $codPedProd;
        }

        //TODO Getters y setters 
    }
?>