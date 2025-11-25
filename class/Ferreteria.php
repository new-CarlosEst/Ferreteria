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
     * Se pondra pasar parametros pero en caso que invoque vacio se pondra todo en null 
     * 
     * @param int|null $cod Codigo de la ferreteria
     * @param string|null $nb Nombre de la ferreteria
     * @param string|null $correo Correo de la ferreteria
     * @param string|null $clave Contraseña de la ferreteria 
     * @param string|null $pais Pais de la ferreteria
     * @param int/null $cp Codigo postal
     * @param string|null $ciudad Ciudad de la ferreteria
     * @param string|null $dir Direccion de la ferreteria
     * @param int|null $rol Rol del usuario de la ferreteria
     */
    public function __construct(?int $cod = null, ?string $nb=null, ?string $correo=null, ?string $clave=null, ?string $pais=null, ?int $cp=null, ?string $ciudad=null, ?string $dir=null, ?int $rol=null){
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

    //Me hago los setters de correo y clave
    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setClave($clave){
        $this->clave = $clave;
    }

    //Me hago los getters de contraseña y correo
    public function getClave (){
        return $this->clave;
    }

    public function getCorreo (){
        return $this->correo;
    }

    public function getCodFerreteria(){
        return $this->codFerreteria;
    }
}
?>