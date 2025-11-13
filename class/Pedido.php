<?php 

    /**
     * Clase POJO para almacenar los datos de la tabla pedidos en un objeto
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class Pedido {
        /**
         * @var int Codigo (identificador) del pedido
         */
        private $codPedido;

        /**
         * @var DateTime Fecha en la que se realizo el pedido (formato YYYY-MM-DD HH:MM:SS)
         */
        private $fecha;

        /**
         * @var int Variable que indica si esta enviado o no (0 para no, 1 para si)
         */
        private $enviado;

        /**
         * @var int Clave de la ferreteria a la que pertence el pedido (Codigo Idenficador de la ferreteria)
         */
        private $codFerreteria;

        /**
         * Constructor para crear un objeto Pedido
         * 
         * @param int $codPed Codigo del pedido
         * @param DateTime $fecha Fecha en la que se realizo el pedido (formato YYYY-MM-DD HH:MM:SS)
         * @param int $enviado 0 si <b>NO</b> esta enviado, 1 si esta enviado
         * @param int $codFerr Codigo de la ferreterai a la que pertence el pedido
         */
        public function __construct(int $codPed, DateTime $fecha, int $enviado, int $codFerr){
            $this->codPedido = $codPed;
            $this->fecha = $fecha;
            $this->enviado = $enviado;
            $this->codFerreteria = $codFerr;
        }

        //TODO Getters y setters + toString
    }
?>