<?php
    //Inicio la sesion y me traigo el dao
    require_once __DIR__ . "/../util/iniciarSesion.php";
    require_once __DIR__ . "/../model/FerreteriaDAO.php";

    class FerreteriaController {

        private $dao;

        public function __construct(){
            $this->dao = new FerreteriaDAO();
        }

        public function login($user, $password){
            $login = $this->dao->getFerreteriaByCorreo($user);

            if (!$login){
                //si me ha devuelto false es que o ha habido un error en al consulta o el correo no es valido
                //Deberia diferenciarlos pero para eso me deberia hacer una api rest que te devolviera un json con ademas del ok (true/false) un mensaje
                return false;
            }
            //si me devuelve el objeto comparo su contraseña
            else {
                //si coincide devuelve true y me hago la session correo 
                if ($login->getClave() == $password){
                    $_SESSION["correo"] = $login->getCorreo();
                    return true;
                }
                else {
                    //si no devuelvo false
                    return false;
                }
            }
        }
    }
?>