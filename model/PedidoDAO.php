<?php
    //Me traigo las clases de sus respectivas rutas
    require_once __DIR__ . "/Conexion.php";
    require_once __DIR__ . "/../class/Pedido.php";

    /**
     * Clase DAO (Data Acess Object) que contendra varios objetos Pedido con sus datos 
     * Tiene un array con los objetos y ademas una conexion a una DB para tener persistencia en esos datos
     * Tambien tendra metodos para el manejo de la tabla pedidos y para consultar/borrar/insertar datos
     * 
     * @author Carlos Esteban Diez (new-CarlosEst)
     */
    class PedidoDAO{
        /**
         * @var PDO Conexion a la db
         */
        private $conexion;

        /**
         * Constructor para crearme un objeto PedidoDAO que hara la funcion de contendor
         */
        public function __construct(){
            //Me saco a la instancia de la conexion y llamo al metodo getConexion para recibir el PDO
            //Esto lo hago asi para que siempre tenga una misma conexion en todos mis archivos y no sea diferente
            $this->conexion = Conexion::getInstancia()->getConexion();
        }

        public function addPedido($codFer){
            //Saco la fecha de hoy
            $fechaPedido = new DateTime('now', new DateTimeZone('Europe/Madrid'));

            //Uso una variable de sesion para autoincrementar cada vez que haga un pedido
            if (!isset($_SESSION['contadorPedidoTemp'])) {
                $_SESSION['contadorPedidoTemp'] = 1;
            }

            $idTemporal = $_SESSION['contadorPedidoTemp']++;
            return new Pedido($idTemporal, $fechaPedido, 0, $codFer);
        }

        public function insertPedido($codFer){
            try{
                $sql = "INSERT INTO pedidos (Fecha, Enviado, ferreteria) VALUES (now(), 0, :ferreteria)";
                $sentenciaPreparada = $this->conexion->prepare($sql);

                //Bindeo y ejecuto
                $sentenciaPreparada->bindParam(":ferreteria", $codFer);
                $sentenciaPreparada->execute();

                //Saco el id de este insert
                $clave = $this->conexion->lastInsertId();

                //Me pongo otro sql con el select
                $sql2 = "SELECT * FROM pedidos WHERE CodPed = :clave";
                $sentenciaPreparada = $this->conexion->prepare($sql2);

                //Biendo y ejecuto
                $sentenciaPreparada->bindParam(":clave", $clave);
                $sentenciaPreparada->execute();

                //saco los datos como array asociativo
                $datosPedido = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
                
                //Convierto la fecha a DateTime
                $fechaDateTime = new DateTime($datosPedido["Fecha"]);
                
                return new Pedido(
                    $datosPedido["CodPed"],
                    $fechaDateTime,
                    $datosPedido["Enviado"],
                    $datosPedido["ferreteria"]
                );
            } 
            catch (PDOException $e){
                return false;
            }
        }
    }
?> 