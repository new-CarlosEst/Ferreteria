<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Producto.php";
    require_once __DIR__ . "/../class/Categoria.php";

    /**
     * Clase DAO (Data Acess Object) que contendra varios objetos Producto con sus datos 
     * Tiene un array con los objetos y ademas una conexion a una DB para tener persistencia en esos datos
     * Tambien tendra metodos para el manejo de la tabla productos y para consultar/borrar/insertar datos
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class ProductoDAO{
        /**
         * @var PDO Conexion a la db
         */
        private $conexion;


        /**
         * Constructor para crearme un objeto ProductoDAO que hara la funcion de contendor
         */
        public function __construct(){
            //Me hago la instancia de la clase conexion para que siempre sea la misma conexion
            $this->conexion = Conexion::getInstancia()->getConexion();
        }

        /**
         * Funcion que saca el nombre de categoria y su descripccion y las pinta
         */
        public function getCategoriaByID($idCat){
            try{
                //Hacemos la sentencia
                $sql = "SELECT * FROM categorias WHERE CodCat = :id";

                //Hacemos un prepared statement para evitar inyeccion sql 
                $sentenciaPreparada = $this->conexion->prepare($sql);

                //Bindeo el parametro $user a :correo, ejecutamos la sentencia y lo meto todo en un array asociativo 
                $sentenciaPreparada->bindValue(':id', $idCat);
                $sentenciaPreparada->execute();
                $datosCategoria = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);

                //Devolvemos el objeto
                return new Categoria($datosCategoria["CodCat"], $datosCategoria["Nombre"], $datosCategoria["Descripcion"]);
            } catch (PDOException $e){
                return false;
            }
        }
    }
?> 