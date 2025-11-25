<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Cesta.php";

    //Me traigo el Dao de pedido y de producto
    require_once __DIR__ . "/../model/ProductoDAO.php";
    require_once __DIR__ . "/../model/PedidoDAO.php";


    /**
     * Clase DAO (Data Acess Object) que contendra varios objetos Cesta con sus datos 
     * Tiene un array con los objetos y ademas una conexion a una DB para tener persistencia en esos datos
     * Tambien tendra metodos para el manejo de la tabla productospedidos y para consultar/borrar/insertar datos
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class CestaDAO{
        /**
         * @var PDO Conexion a la db
         */
        private $conexion;
        
        /**
         * Constructor para crearme un objeto CestaDAO que hara la funcion de contendor
         */
        public function __construct(){
            //Me hago la instancia de la clase conexion para que siempre sea la misma conexion
            $this->conexion = Conexion::getInstancia()->getConexion();
        }


        public function nuevoPedido($idProducto, $idFerreteria, $unidades){
            //Hago un dao de pedidos
            $pedidos = new PedidoDAO();
            $pedido = $pedidos->addPedido($idFerreteria);

            //Hago un dao de productos
            $productos = new ProductoDAO();
            $producto = $productos->getProductoById($idProducto);

            if (!$producto){
                return false;
            }
            else {
                //saco las claves
                $codProd = $producto->getCodProducto();
                $codPed = $pedido->getCodPedido();
                //añado un pedido de un producto a la cesta en una sesion
                //en caso de que la cesta no exista la creo
                if (!isset($_SESSION['cesta'])) {
                    $_SESSION['cesta'] = [];
                }
                
                //Se usa ese uppersand para que me modifique el las unidades del array de la sasssion, si no no lo haria
                $estaCesta = false;
                foreach ($_SESSION['cesta'] as &$item) {
                    if ($item['codProducto'] == $codProd) {
                        // Si ya existe, solo sumar las unidades en la cesta
                        $item['unidades'] += $unidades;
                        $encontrado = true;
                        break;
                    }
                }
                unset($item); // Quito la referencia para que no lo puedo modificar
                
                // Si no estaba en la cesta, añado el producto
                if (!$estaCesta) {
                    $_SESSION['cesta'][] = [
                        'codProducto' => $codProd,
                        'codPedido' => $codPed,
                        'unidades' => $unidades
                    ];
                }
            }
        }

        public function createPedido($idProd, $unidades, $idFerreteria){
            // Inserto el pedido
            $pedidos = new PedidoDAO();
            $pedido = $pedidos->insertPedido($idFerreteria);

            // VALIDAR que el pedido se creó correctamente
            if ($pedido === false) {
                return false;
            }

            // Saco el codigo del pedido
            $idPed = $pedido->getCodPedido();

            try{
                // ME hago el prepared
                $sql = "INSERT INTO pedidosproductos (Pedido, Producto, Unidades) VALUES (:idPed, :idProd, :unidades)";
                $sentenciaPreparada = $this->conexion->prepare($sql);

                // Bindeo y ejecuto (CORREGIDO el orden de parámetros)
                $prod = (int)$idProd;
                $ped = (int)$idPed;
                $uni = (int)$unidades;
                $sentenciaPreparada->bindParam(":idPed", $ped);
                $sentenciaPreparada->bindParam(":idProd", $prod);
                $sentenciaPreparada->bindParam(":unidades", $uni);
                $sentenciaPreparada->execute();

                // Devuelvo el código del pedido (no lastInsertId de pedidosproductos)
                return $idPed;

            }
            catch (PDOException $e){
                error_log("Error en createPedido: " . $e->getMessage());
                return false;
            }
        }
    }
?>