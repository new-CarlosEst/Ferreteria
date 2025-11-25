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

        /**
         * Hace un pedido (cesta) con el id dle producto, las unidades
         */
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
                if (count($lista) <= 0){
                    echo '<div class="vacio">No hay productos seleccionados aun</div>';
                }
                else {
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
                                    <button type="submit" name="producto" value="' . $codProd . '">Eliminar</button>
                                </div>
                            </div>';

                        $par = ($par == "impar") ? $par="par" : $par="impar";
                        echo $box;
                    }
                }
                
            }
        }

        public function eliminarUnidades($codProd, $unidades){
            foreach ($_SESSION['cesta'] as $clave => &$item) {
                if ($item['codProducto'] == $codProd) {
                    // Si ya existe, solo sumar las unidades en la cesta
                    $item['unidades'] -= $unidades;

                    //Si las unidades son 0 o negativo quito es producto del pedido
                    if ($item["unidades"] <= 0){
                        unset($_SESSION["cesta"][$clave]);
                    }
                    break;
                }


            }
            unset($item); // Quito la referencia para que no lo puedo modificar
        }

        /**
         * Funcion que te llama a la funcion create pedido que hace los inserts tanto a pedido, como a pedido producto
         */
        public function enviarPedido($correo){
            if (!isset($_SESSION["cesta"])){
                return false;
            }
            
            if (count($_SESSION["cesta"]) <= 0){
                return false;
            }
            
            // Saco la ferreteria por correo
            $ferreterias = new FerreteriaDAO();
            $ferreteria = $ferreterias->getFerreteriaByCorreo($correo);
            
            // VALIDAR que se encontró la ferretería
            if ($ferreteria === false || $ferreteria === null) {
                return false;
            }

            // Saco la clave 
            $clave = $ferreteria->getCodFerreteria();

            // Variable para guardar el número de pedido
            $nPed = null;
            
            foreach ($_SESSION['cesta'] as &$item) {
                $resultado = $this->dao->createPedido($item['codProducto'], $item["unidades"], $clave);
                
                // VALIDAR que se creó correctamente
                if ($resultado === false) {
                    return false;
                }
                
                $nPed = $resultado;
            }

            // Meto el numPedido en una session
            $_SESSION["numPed"] = $nPed;
            return true;
}

        public function listaPedidoFinal(){
            $productos = new ProductoDAO();
                    $par = "impar";
                    foreach($_SESSION["cesta"] as $pedido){
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
                                <div class="unidades">' . $unidades . '</div>';

                        $par = ($par == "impar") ? $par="par" : $par="impar";
                        echo $box;
                    }
        }
    }


?>