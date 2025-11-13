<?php

    /**
     * Clase POJO para almacenar los datos de la tabla categorias en un objeto
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class Categoria {
        /**
         * @var int Codigo (identificador) de la categoria
         */
        private $codCategoria;

        /**
         * @var string Nombre de la categoria
         */
        private $nombre;

        /**
         * @var string Descripcion de la categorai
         */
        private $descripcion;

        /**
         * Constructor para crear un objeto Categoria
         * 
         * @param int $codCat Codigo del objeto categoria
         * @param string $nb Nombre del objeto categoria
         * @param string $desc Descripcion del objeto categoria
         */
        public function __construct(int $codCat, string $nb, string $desc){
            $this->codCategoria = $codCat;
            $this->nombre = $nb;
            $this->descripcion = $desc;
        }

        //TODO Getters y setters
        
    }
?>