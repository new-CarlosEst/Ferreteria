<?php
    //Inicio la sesion y me traigo el dao
    require_once __DIR__ . "/../util/iniciarSesion.php";
    require_once __DIR__ . "/../model/CestaDAO.php";
    require_once __DIR__ . "/../model/FerreteriaDAO.php";
    require_once __DIR__ . "/../model/ProductoDAO.php";
    
    //me traigo la cesta
    require_once __DIR__ . "/../class/Cesta.php";

    class CestaController{
        private $dao;

        public function __construct(){
            $this->dao = new CestaDAO();
        }

        public function hacerPedido($idProducto, $unidades, $correo){
            //Saco la ferreteria por correo
            $ferreterias = new FerreteriaDAO();
            $ferreteria = $ferreterias->getFerreteriaByCorreo($correo);

            //Saco la clave 
            $clave = $ferreteria->getClave();

            //LLamo a añadir un pedido al array
            $this->dao->nuevoPedido($idProducto, $clave, $unidades);
        }

        public function listarPedidos(){
            if (!isset($_SESSION["cesta"])){
                echo '<div class="vacio">No hay productos seleccionados aun</div>';
            }
            else {
                $lista = $_SESSION["cesta"];
                $productos = new ProductoDAO();
                $par = "impar";
                foreach($lista as $pedido){
                    //Saco unidades, codProd e codPedido
                    $codProd = $pedido['codProducto'];
                    $codPedido = $pedido['codPedido'];
                    $unidades = $pedido['unidades'];

                    //Saco el producto segun el id del producto
                    $producto = $productos->getProductoById($codProd);
                    $nb = $producto->getNombre();
                    $desc = $producto->getDescripcion();
                    $peso = $producto->getPeso();

                    //meto los datos en un string y lo imprimo
                    $box = '
                        <div class="item ' . $par . '">
                            <div class="nombre">' . $nb . '</div>
                            <div class="desc">' . $desc . '</div>
                            <div class="peso">' . $peso . '</div>
                            <div class="unidades">' . $unidades . '</div>
                            <div class="unidad">
                                <img src="../public/resources/icons/BiTrash3Fill.png">
                                <input type="text" name="unidades[' . $codProd . ']" value="0">
                            </div>
                            <div class="eliminar">
                                <button type="submit" name="producto" value="' . $codProd . '">Comprar</button>
                            </div>
                        </div>';

                    $par = ($par == "impar") ? $par="par" : $par="impar";
                    echo $box;

                }
            }
        }

        public function eliminarUnidades($codProd, $unidades){
            foreach ($_SESSION['cesta'] as &$item) {
                if ($item['codProducto'] == $codProd) {
                    // Si ya existe, solo sumar las unidades en la cesta
                    $item['unidades'] -= $unidades;
                    break;
                }
            }
            unset($item); // Quito la referencia para que no lo puedo modificar
        }
    }


?>