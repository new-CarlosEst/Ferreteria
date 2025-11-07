<?php
class Ferreteria {
    private $codFerreteria;
    private $nombre;
    private $correo;
    private $clave;
    private $pais;
    private $cp;
    private $ciudad;
    private $direccion;
    private $rol;

    public function __construct($cod, $nb, $correo, $clave, $pais, $cp, $ciudad, $dir, $rol){
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