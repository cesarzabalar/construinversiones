<?php


/**
 * Clase encargada de realizar la conexion a la base de datos de MySQL haciendo
 * uso de atributos y metodos para tal tarea
 *
 * @author Cesar
 */
class Conexion_Mysql {
    
    /*****************************************************
     * ATRIBUTOS DE LA CLASE
     ****************************************************/
    
    /**
     * Permite especificar el nombre, direccion, o ip del servidor de BD
     * @var type string
     */
    var $server = "127.0.0.1";
    
    /**
     * Permite especificar el nombre de usuario de la base de datos
     * @var type string
     */
    var $user = "root";
    
    /**
     * Permite especificar la contraseña de la base de datos
     * @var type string
     */
    var $pass = "";
    
    /**
     * Permite especificar el nombre de la base de datos
     * @var type string
     */
    var $data_base = "construpresu";
    
    /**
     * Almacena la conexion realizada
     * @var type mysql_connection
     */
    var $conexion;
    
    /**
     * Variable de control para verificar si ha habido conexion o no
     * @var type boolean
     */
    var $flag = false;
    
    /**
     * Permite personalizar un mensaje de error al realizar la conexion
     * @var type 
     */
    var $error_conexion = "Error en la conexion a la base de datos";
    
    /**
     * Metodo constructor
     */
    public function  __construct() {
        
    }
    
    /**
     * Metodo encargado de realizar la conexion a la base de datos
     * @return type mysql_connect
     */
    public function conectar(){
            $this->conexion = @mysql_connect($this->server,$this->user,$this->pass) or die($this->error_conexion);
            $this->flag = true;
            @mysql_query("SET NAMES utf8");
            return $this->conexion;
    }
    
    /**
     * Metodo que permite el cierre de una conexion a la base de datos
     */
    function cerrar_conexion(){
        if($this->flag == true){
            @mysql_close($this->conexion);
        }
    }
    
    /**
     * Metodo que permite la realizacion de una consulta SQL
     * @param type $query: Cadena sql con la consulta
     * @return type estructura de los datos devueltos por la consulta
     */
    function query($query){
        return @mysql_db_query($this->data_base,$query);
    }
    
    /**
     * Metodo que permite la realizacion de una consulta devolviendo los
     * objetos que hacen parte de los resultados de esta, solo se pueden acceder
     * mediante el nombre del campo no mediante indices
     * @param type $query
     * @return type fila de la consulta
     */
    function f_obj($query){
        return @mysql_fetch_object($query);
    }
    
    /**
     * Metodo que permite la realizacion de una consulta dovolviendo las filas
     * con la posibilidad de acceder a ellas mediante array o indices
     * @param type $query cadena sql
     * @return type 
     */
    function f_array($query){
        return @mysql_fetch_assoc($query);
    }
    
    /**
     * Metodo que permite calcular el numero de fila o resultados devueltos
     * por la consulta
     * @param type $query
     * @return type integer
     */
    function num_filas($query){
        return @mysql_num_rows($query);
    }
    
    /**
     * Establece la base de datos activa actual en el servidor asociado con el 
     * identificador de enlace especificado
     * @param type $db
     * @return boolean
     */
    function select($db){
        $result = @mysql_select_db($db,$this->conexion);
        if($result){
            $this->data_base = $db; 
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Libera los resultados devueltos por una consulta realizada a la
     * base de datos
     * @param type $query
     */
    function liberar_sql($query){
        mysql_free_result($query);
    }
    
    
}
?>