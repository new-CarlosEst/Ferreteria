<?php
    //inicio session y me traigo el dao de producto
    require_once __DIR__ . "/../util/iniciarSesion.php";
    require_once __DIR__ . "/../model/ProductoDAO.php";

    class ProductoController{
        private $dao;

        public function __construct(){
            $this->dao = new ProductoDAO();
        }

        public function pintarCategorias($idCat){
            $categoria = $this->dao->getCategoriaById($idCat);
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
    }
?>