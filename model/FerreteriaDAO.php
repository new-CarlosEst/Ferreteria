<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Ferreteria.php";

    /**
     * Clase DAO (Data Acess Object) que contendra varios objetos Categoria con sus datos 
     * Tiene un array con los objetos y ademas una conexion a una DB para tener persistencia en esos datos
     * Tambien tendra metodos para el manejo de la tabla Ferreteria y para consultar/borrar/insertar datos
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class FerreteriaDAO{
        /**
         * @var PDO Conexion a la db
         */
        private $conexion;

        /**
         * @var Ferreteria[] Array con los objetos ferreteria que cargare desde el DB
         */
        private $listaFerreteria = [];

        public function __construct(){
            //Me hago la instancia de la clase conexion para que siempre sea la misma conexion
            $this->conexion = Conexion::getInstancia()->getConexion();
            
        }
    }
?> 