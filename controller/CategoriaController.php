<?php
    //Inicio la sesion y me traigo el dao
    require_once __DIR__ . "/../util/iniciarSesion.php";
    require_once __DIR__ . "/../model/CategoriaDAO.php";

    class CategoriaController{
        private $dao;

        public function __construct(){
            $this->dao = new CategoriaDAO();
        }


        public function mostrarCategorias(){
            $categorias = $this->dao->getCategorias();

            //si es falso muestro un error
            if (!$categorias){
                echo "ERROR";
            }
            else if (count($categorias) === 0) {
                //si esta vacio muestro que no hay categorias
                echo "Categorias no encontradas";
            }
            //Si no muestro las categorias
            else {
                foreach($categorias as $categoria){
                    //Saco todos los datos
                    $n = $categoria->getNombre();
                    $d = $categoria->getDescripcion();
                    $id = $categoria->getCodCategoria();

                    //Pongo en un boton el value como el id de la categoria, asi despues puedo hacer un consulta con ese id a suminsitros
                    $box = '<button class="item" name="categoria" value="' . $id . '">
                        <div class="nombre">' . $n . '</div>
                        <div class="desc">' . $d . '</div>
                    </button>';

                    echo $box;
                }
            }
        }
    }
?>