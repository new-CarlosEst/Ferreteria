<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Ferreteria.php";

    /**
     * Clase DAO (Data Acess Object) que contendra varios objetos Ferreteria con sus datos 
     * Tiene un array con los objetos y ademas una conexion a una DB para tener persistencia en esos datos
     * Tambien tendra metodos para el manejo de la tabla ferreterais y para consultar/borrar/insertar datos
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class FerreteriaDAO{
        /**
         * @var PDO Conexion a la db
         */
        private $conexion;

        /**
         * Constructor para crearme un objeto FerreteriaDAO que hara la funcion de contendor
         */
        public function __construct(){
            //Me hago la instancia de la clase conexion para que siempre sea la misma conexion
            $this->conexion = Conexion::getInstancia()->getConexion();
            
        }
    }
?> 