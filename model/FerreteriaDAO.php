<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Ferreteria.php";

    /**
     * Clase DAO (Data Acess Object) que contendra varios objetos Ferreteria con sus datos 
     * Tiene un array con los objetos y ademas una conexion a una DB para tener persistencia en esos datos
     * Tambien tendra metodos para el manejo de la tabla ferreterais y para consultar/borrar/insertar datos
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class FerreteriaDAO{
        /**
         * @var PDO Conexion a la db
         */
        private $conexion;

        /**
         * Constructor para crearme un objeto FerreteriaDAO que hara la funcion de contendor
         */
        public function __construct(){
            //Me hago la instancia de la clase conexion para que siempre sea la misma conexion
            $this->conexion = Conexion::getInstancia()->getConexion();
        }

        /**
         * Metodo que recibe un correo y hace un sentencia sql donde coincida ese objeto y devuelve o false o el objeto
         */
        public function getFerreteriaByCorreo($user){
            try {
                //Hacemos la sentencia
                $sql = "SELECT * FROM ferreterias WHERE Correo = :correo";

                //Hacemos un prepared statement para evitar inyeccion sql 
                $sentenciaPreparada = $this->conexion->prepare($sql);

                //Bindeo el parametro $user a :correo y ejecutamos la sentencia
                $sentenciaPreparada->bindValue(':correo', $user);
                $sentenciaPreparada->execute();

                //Meto los datos aqui en un array asociativo
                $datosferreteria = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
                //Si devuelve false
                if (!$datosferreteria){
                    return false;
                }
                else{
                    //Me hago un ferreteria con todo null, ya que solo me interesa el correo y la clave
                    //Me lo haria con el pdo:Fetch_class pero me daba error de depracated
                    $ferreteria = new Ferreteria();
                    $ferreteria->setCorreo($datosferreteria["Correo"]);
                    $ferreteria->setClave($datosferreteria["Clave"]);
                    $ferreteria->setCodFerreteria($datosferreteria["CodRes"]);
                    return $ferreteria;
                }
                
            }
            catch (PDOException $e){
                return false;
            }
        }
    }
?> 