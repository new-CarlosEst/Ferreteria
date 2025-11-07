<?php 
    class Pedido {
        private $codPedido;
        private $fecha;
        private $enviado;
        private $codFerreteria;

        public function __construct($codPed, $fecha, $enviado, $codFerr){
            $this->codPedido = $codPed;
            $this->fecha = $fecha;
            $this->enviado = $enviado;
            $this->codFerreteria = $codFerr;
        }

        //TODO Getters y setters + toString
    }
?>