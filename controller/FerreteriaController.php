<?php
    //Me traigo el dao
    require_once __DIR__ . "/../model/FerreteriaDAO.php";

    class FerreteriaController {

        private $dao;

        public function __construct(){
            $this->dao = new FerreteriaDAO();
        }

        public function comprobarCredenciales($user, $password){
            
        }
    }
?>