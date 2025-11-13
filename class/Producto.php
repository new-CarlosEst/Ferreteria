<?php

    /**
     * Clase POJO para almacenar los datos de la tabla productos en un objeto
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class Producto {
        /**
         * @var int Codigo (identificador) del producto 
         */
        private $codProducto;

        /**
         * @var string Nombre del producto
         */
        private $nombre;

        /**
         * @var string Descripcion del producto
         */
        private $descripcion;

        /**
         * @var int Peso del producto
         */
        private $peso;

        /**
         * @var int Stock que hay del producto en la ferreteria
         */
        private $stock;

        /**
         * @var int Clave de la categoria a la que pretence el producto (Codigo identificador de la categoria)
         */
        private $codCategoria;


        /**
         * Constructor para crear un objeto Producto
         * 
         * @param int $codProd Codigo del producto
         * @param string $nb Nombre del producto
         * @param string $desc Descripcion del producto
         * @param int $peso Peso del producto
         * @param int $stock Stock del producto
         * @param int $codCat Codigo de la cetegoria a la que pertence el producto
         */
        public function __construct(int $codProd, string $nb, string $desc, int $peso, int $stock, int $codCat){
            $this->codProducto = $codProd;
            $this->nombre = $nb;
            $this->descripcion = $desc;
            $this->peso = $peso;
            $this->stock = $stock;
            $this->codCategoria = $codCat;
        }

        //TODO Getter y setters necesarios
    }
?>