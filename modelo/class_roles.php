<?php

/**
 * Clase encargada de realizar las operaciones necesarias para la creacion,
 * actualizacion y consulta de un cliente
 */
include_once("Conexion_Mysql.php");
include_once("funciones-comunes.php");

class class_roles extends Conexion_Mysql 
{
    var $id_rol = "";
    var $nombre_rol = "";
    
    var $mensajeu="";

    public function __construct(){
        $this->data_base = "construpresu";
    }
    
    public function __destruct() {
        unset($this);
    }
    
    
    protected function actualizar($data, $id) {
        
    }

    protected function crear() {
        
    }

    protected function eliminar($id) {
        
    }
    
    /**
     * 
     */
    public function leer() 
    {
        $data_roles = array();
        $datos;
        
        $this->query = "SELECT * FROM roles";
        $this->realizarConsultaMultiple();

        if(count($this->rows) > 0) {
            $data_roles = $this->rows;
            return $data_roles;
        } else {
            echo $this->mensajeu = '{"status":1,"mensaje":"No existen Roles"}';
        }
    }
}

?>
