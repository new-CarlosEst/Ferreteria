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
        public function __construct($codProd, $codPed, $codCesta, $unidades){
            $this->codProducto = $codProd;
            $this->codPedido = $codPed;
            $this->unidades = $unidades;
            $this->codCesta = $codCesta;
        }

        //TODO Getters y setters 
    }
?>