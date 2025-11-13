<?php

/**
 * Clase POJO para almacenar los datos de la tabla ferreterias en un objeto
 * 
 * @author Carlos Esteban Diez (new-CarlosEst)
 */
class Ferreteria {
    /**
     * @var int Codigo (identificador) de la ferreteria
     */
    private $codFerreteria;

    /**
     * @var string Nombre  de la ferreteria
     */
    private $nombre;

    /**
     * @var string Correo de la ferreteria (El correo tambien es el correo para poder iniciar sesion del usuario)
     */
    private $correo;

    /**
     * @var string Contraseña de la ferreteria (Contraseña para poder iniciar sesion)
     */
    private $clave;

    /**
     * @var string Pais en el que esta la ferreteria
     */
    private $pais;

    /**
     * @var int Codigo postal de la ferreteria
     */
    private $cp;

    /**
     * @var string Ciudad en la que se encuentra al ferreteria
     */
    private $ciudad;

    /**
     * @var string Direccion de la ferreteria 
     */
    private $direccion;

    /**
     * @var int Rol que tiene el usuario en la ferreteria
     */
    private $rol;

    /**
     * Constructor para crear un objeto Ferreteria
     * 
     * @param int $cod Codigo de la ferreteria
     * @param string $nb Nombre de la ferreteria
     * @param string $correo Correo de la ferreteria
     * @param string $clave Contraseña de la ferreteria 
     * @param string $pais Pais de la ferreteria
     * @param string $ciudad Ciudad de la ferreteria
     * @param string $dir Direccion de la ferreteria
     * @param int $rol Rol del usuario de la ferreteria
     */
    public function __construct(int $cod, string $nb, string $correo, string $clave, string $pais, int $cp, string $ciudad, string $dir, int $rol){
        $this->codFerreteria = $cod;
        $this->nombre = $nb;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->pais = $pais;
        $this->cp = $cp;
        $this->ciudad = $ciudad;
        $this->direccion = $dir;
        $this->rol = $rol;
    }

    //TODO Hacer getters y setters necesarios y el toString (En principio solo los de clave, correo y nombre)
}
?>