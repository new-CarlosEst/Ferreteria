<?php
    /**
     * Clase POJO para crear almacenar los datos de la tabla productopedidos en un objeto
     * Este objeto/tabla actua como una especie de <i>cesta</i> o <i>linea de pedido</i> y es la que relaciona a producto con pedido
     */
    class Cesta {
        /**
         * @var int Codigo del producto al que se relaciona (Identificador de producto)
         */
        private $codProducto;

        /**
         * @var int Codigo del predido al que se relaciona (Identificador de pedido)
         */
        private $codPedido;

        /**
         * @var int Codigo de la tabla/objeto (idenficador)
         */
        private $codCesta;

        /**
         * @var int Numero de unidades pedidas
         */
        private $unidades;

        /**
         * Constructor para crear un objeto Cesta
         * 
         * @param int $codProd Codigo del producto al que se relaciona
         * @param int $codPed Codigo del pedido al que se relaciona
         * @param int $CodCesta Codigo de la cesta
         * @param int $unidades Numero de unidades
          */
        public function __construct($codProd,$codPed, $unidades){
            $this->codProducto = $codProd;
            $this->codPedido = $codPed;
            $this->unidades = $unidades;
            $this->codCesta = null;
        }

        //me hago los settes y getters
        public function getCodProducto(){
            return $this->codProducto;
        }

        public function setCodProducto($codProducto){
            $this->codProducto = $codProducto;
        }

        public function getCodPedido(){
            return $this->codPedido;
        }

        public function setCodPedido($codPedido){
            $this->codPedido = $codPedido;
        }

        public function getCodCesta(){
            return $this->codCesta;
        }

        public function setCodCesta($codCesta){
            $this->codCesta = $codCesta;
        }

        public function getUnidades(){
            return $this->unidades;
        }

        public function setUnidades($unidades){
            $this->unidades = $unidades;
        }
    }
?>