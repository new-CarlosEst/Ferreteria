<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Producto.php";
    require_once __DIR__ . "/../model/CategoriaDao.php";

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
         * Funcion que devuelve el objeto categoria al controlador de productos
         */
        public function sacarCategoria($idCat){
            $dao = new CategoriaDAO();
            return $dao->getCategoriaById($idCat);
        }

        /**
         * Funcion que devuelve un array de objetos con todos los productos de un categoria o false si da error
         */
        public function getProductosByCategoria($idCat){
            try {
                //Hacemos un prepared statement
                $sql = "SELECT * FROM productos WHERE Categoria = :id";
                $sentenciaPreparada = $this->conexion->prepare($sql);

                //Bindeo los parametros, ejecuto la sentencia y metodo todas las consultas en un array asociativo
                $sentenciaPreparada->bindParam(":id", $idCat);
                $sentenciaPreparada->execute();
                $datosProductos = $sentenciaPreparada->fetchAll(PDO::FETCH_ASSOC);

                //recorro el array asociativo y metodo todos lso datos en objetos y en un array con esos objetos
                $productos = [];
                foreach ($datosProductos as $producto){
                    $productos[] = new Producto(
                        $producto["CodProd"],
                        $producto["Nombre"],
                        $producto["Descripcion"],
                        $producto["Peso"],
                        $producto["Stock"],
                        $producto["Categoria"]
                    );
                }
                //Devuelvo el array
                return $productos;

            } catch (PDOException $e){
                return false;
            }
        }

        /**
         * Funcion que hace un select segun un id pasado por parametro y te devuelve el objeto producto
         */
        public function getProductoById($idProd){
            try{
                //Hacemos la sentencia
                $sql = "SELECT * FROM productos WHERE CodProd = :id";

                //Hacemos un prepared statement para evitar inyeccion sql 
                $sentenciaPreparada = $this->conexion->prepare($sql);

                //Bindeo el parametro $user a :correo, ejecutamos la sentencia y lo meto todo en un array asociativo 
                $sentenciaPreparada->bindValue(':id', $idProd);
                $sentenciaPreparada->execute();
                $datosProducto = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);

                //Devolvemos el objeto
                return new Producto(
                    $datosProducto["CodProd"], 
                    $datosProducto["Nombre"],
                    $datosProducto["Descripcion"],
                    $datosProducto["Peso"],
                    $datosProducto["Stock"],
                    $datosProducto["Categoria"]
                );
            } catch (PDOException $e){
                return false;
            }
        }

        /**
         * Funcion que te actualiza el stock
         */
        function updateStockOfProduto($unidades, $idProducto) {
            try {
                $sql = "UPDATE productos SET Stock = Stock + :unidades WHERE CodProd = :idProducto";
                
                $sentenciaPreparada = $this->conexion->prepare($sql);
                $sentenciaPreparada->bindParam(':unidades', $unidades, PDO::PARAM_INT);
                $sentenciaPreparada->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
                
                $sentenciaPreparada->execute();
                
                return $sentenciaPreparada->rowCount();
            } catch (PDOException $e) {
                return false;
            }
        }
    }
?> 