<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Pedido.php";

    /**
     * Clase DAO (Data Acess Object) que contendra varios objetos Pedido con sus datos 
     * Tiene un array con los objetos y ademas una conexion a una DB para tener persistencia en esos datos
     * Tambien tendra metodos para el manejo de la tabla pedidos y para consultar/borrar/insertar datos
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class PedidoDAO{
        /**
         * @var PDO Conexion a la db
         */
        private $conexion;

        /**
         * @var Pedido[] Array con los objetos pedido que cargare desde el DB
         */
        private $listaPedidos;

        /**
         * Constructor para crearme un objeto PedidoDAO que hara la funcion de contendor
         */
        public function __construct(){
            //Me saco a la instancia de la conexion y llamo al metodo getConexion para recibir el PDO
            //Esto lo hago asi para que siempre tenga una misma conexion en todos mis archivos y no sea diferente
            $this->conexion = Conexion::getInstancia()->getConexion();
            //inicializo el array
            $this->listaPedidos = [];
        }
    }
?> 