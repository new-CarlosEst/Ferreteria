<?php
    //inicio session y me traigo el dao de producto
    require_once __DIR__ . "/../util/iniciarSesion.php";
    require_once __DIR__ . "/../model/ProductoDAO.php";

    class ProductoController{
        private $dao;

        public function __construct(){
            $this->dao = new ProductoDAO();
        }

        /**
         * Funcion que te pinta en dos div la categoria y su descripcion
         */
        public function datosCategoria($idCat){
            $categoria = $this->dao->sacarCategoria($idCat);
            if (!$categoria){
                return false;
            }
            else {
                $n = $categoria->getNombre();
                $d = $categoria->getDescripcion();

                $box = '<div class="nombre">' . $n . '</div>
                <div class="desc">'. $d .'</div>';

                return $box;
            }
        }

        public function mostrarProductos($idCat){
            $productos = $this->dao->getProductosByCategoria($idCat);

            //si es falso muestro un error
            if (!$productos){
                echo "ERROR";
            }
            else if (count($productos) === 0) {
                //si esta vacio muestro que no hay categorias
                echo "No hay productos para esta categoria";
            }
            //Si no muestro las categorias
            else {
                $par = "impar";
                foreach ($productos as $producto){
                    $id = $producto->getCodProducto();
                    $nb = $producto->getNombre();
                    $desc = $producto->getDescripcion();
                    $peso = $producto->getPeso();
                    $stock = $producto->getStock();

                    $box = '
                    <div class="item ' . $par . '">
                        <div class="nombre">' . $nb . '</div>
                        <div class="desc">' . $desc . '</div>
                        <div class="peso">' . $peso . '</div>
                        <div class="stock">' . $stock . '</div>
                        <div class="unidad">
                            <img src="../public/resources/icons/MdiCart.png">
                            <input type="text" name="unidades">
                        </div>
                        <div class="comprar">
                            <button type="submit" name="producto" value="' . $id . '">Comprar</button>
                        </div>
                    </div>';

                    $par = ($par == "impar") ? $par="par" : $par="impar";

                    echo $box;
                }
            }
        }
    }
?>