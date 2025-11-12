<?php

    //Tanto en $dovenv y en donde esta vendor les subo una carpeta en la ruta ya que estan en la padre de model

    //Cargo el el autoload que carga los paquetes automaticamente
    require_once __DIR__ . "/../vendor/autoload.php";

    //Importo la clase Dotenv
    use Dotenv\Dotenv;

    //Digo donde estan .env con las variables de entorno y las cargo
    $dotenv = Dotenv::createImmutable(__DIR__. "/.."); 
    $dotenv->load();

    /**
     * Clase Conexion
     * 
     * Clase que te tendra la conexion pdo a la DB mySql y las credenciales/cosas para conectarte a ella
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class Conexion {
        /**
         * @var Conexion/null Intancia unica de la clase, para que asi solo haya una conexion
         */
        private static $instancia = null;

        /**
         * @var string Usuario de la DB
         */
        private $user;

        /**
         * @var string Contraseña de la DB
         */
        private $password;

        /**
         * @var string Nombre de la DB
         */
        private $db;

        /**
         * @var string Servicio de la base de datos 
         * En caso de que accedas desde dentro hay que poner el nombre del servicio
         * En caso de que se acceda desde fuera hay que poner el puerto y/o la direccion ip (puede ser localhost)
         */
        private $service;

        /**
         * @var PDO Conexion a la DB
         */
        private $conexion;

        /**
         * Constructor para la conexion a la db, los datos se reciben por un env
         */
        public function __construct(){
            $this->user = $_ENV["user"];
            $this->password = $_ENV["password"];
            $this->service = $_ENV["service"];
            $this->db = $_ENV["database"];
            $this->conexion = $this->conectarse();
        }

        /**
         * Funcion que devuelve la instancia de la clase
         * 
         * @return Conexion Devuelve el objeto Conexion (unico)
         */
        public static function getInstancia(){
            //Eso comprueba si la instancia es nula (Si hay una objeto Conexion ya creado o no)
            if (self::$instancia === null) {
                //Si no hay ninguna me la crea
                self::$instancia = new self(); //El new Self() hace un objeto de esta misma clase, osea en este caso es new Conexion()
            }
            
            //Devuelvo la instancia con la clase conexion
            return self::$instancia;
        }
        
        /**
         * Funcion que te hace la conexion a la DB
         * 
         * @return PDO Devuelve el objeto PDO con la conexion a la db
         */
        private function conectarse(){
            try {
                //Hago la conexion y activo los errores
                $conexion = new PDO ("mysql:host=". $this->service . ";dbname=". $this->db, $this->user, $this->password);
                $conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //Devuelvo la conexion
                return $conexion;

            } catch (PDOException $e){
                echo "Error al conectarse a la DB </br>" . $e;
            }
        }

        /**
         * Metodo que cierra la conexion a la DB
         */
        public function cerrarConexion(){
            $this->conexion = null;
        }

        /**
         * Metodo que devuelve el objeto conexion
         * 
         * @return PDO
         */
        public function getConexion(){
            return $this->conexion;
        }
    }
?>