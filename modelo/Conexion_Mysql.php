<?php


/**
 * Clase encargada de realizar la conexion a la base de datos de MySQL haciendo
 * uso de atributos y metodos para tal tarea
 *
 * @author Cesar
 */
abstract class Conexion_Mysql {
    
    /*****************************************************
     * ATRIBUTOS DE LA CLASE
     ****************************************************/
    
    /**
     * Permite especificar el nombre, direccion, o ip del servidor de BD
     * @var type string
     */
    private static $server = "127.0.0.1";
    
    /**
     * Permite especificar el nombre de usuario de la base de datos
     * @var type string
     */
    private static $user = "root";
    
    /**
     * Permite especificar la contraseña de la base de datos
     * @var type string
     */
    private static $pass = "";
    
    /**
     * Permite especificar el nombre de la base de datos
     * @var type string
     */
    protected $data_base = "construpresu";
    
    /**
     * Almacena la conexion realizada
     * @var type mysql_connection
     */
    private $conexion;
    
    /**
     * Variable que almacena una cadena de consulta sql
     * @var type 
     */
    protected $query = "";
    
    /**
     * Almacena en un arreglo los resultados de una consulta
     * @var type 
     */
    protected $rows = array();
    
    /**
     * Variable de control para verificar si ha habido conexion o no
     * @var type boolean
     */
    protected $flag = false;
    
    /**
     * Permite personalizar un mensaje de error al realizar la conexion
     * @var type 
     */
    var $error_conexion = "Error en la conexion a la base de datos";
    
    /**
     * Metodo encargado de realizar la conexion a la base de datos
     * @return type mysql_connect
     */
    private function conectar(){
        $this->conexion = new mysqli(self::$server, self::$user, 
	                             self::$pass, $this->data_base);
       
        @mysql_query("SET NAMES utf8");

    }
    
    /**
     * Metodo que permite el cierre de una conexion a la base de datos
     */
    private function cerrar_conexion(){
        if($this->flag == true){
            $this->conexion->close();
        }
    }
    
    /**
     * Metodo que permite la realizacion de una consulta SQL
     */
    protected function realizarConsultaSencilla(){
        if($_POST) {
            $this->conectar();
            $this->conexion->query($this->query);
            $this->cerrar_conexion();
        } else {
	        $this->mensaje = 'Metodo no permitido';
	}
    }
    
    /**
     * Traer resultados de una consulta en un Array
     */
    protected function realizarConsultaMultiple() {
        $this->conectar();
        $result = $this->conexion->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->cerrar_conexion();
        array_pop($this->rows);
    }
    
    
    # Metodos abstractos para presupuesto de clases que hereden    
    abstract protected function leer();
    abstract protected function crear();
    abstract protected function actualizar();
    abstract protected function eliminar();
    
}
?>