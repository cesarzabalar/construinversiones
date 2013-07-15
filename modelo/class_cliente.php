<?php

/**
 * Description of class_cliente
 *
 * @author Jorge Ivan
 */
include_once("../modelo/Conexion_Mysql.php");

class class_cliente extends Conexion_Mysql {
    private $idcliente="";
    private $nombre="";
    private $apellido="";
    private $documento="";
    private $empresa="";
    private $correo="";
    private $direccion="";

    public function __construct(){
        $this->data_base = "construpresu";
    }
    
    public function __destruct() {
        unset($this);
    }
    
    /**
     * Metodo que realiza el ingreso mediante el logueo de un cliente
     * @param type $cliente_data
     */
    public function queryLogueo($cliente_data)
    {
        $redirectURL = 'admin.php';
        
        foreach ($cliente_data as $campo=>$valor) 
        {
            $$campo = $valor;
        }
        //return "Correo2: ".$correo."  -  Documento: ".$documento."";
        $this->query = "SELECT * FROM cliente WHERE correo = '".$correo."' AND documento = '".$documento."'";
        $this->realizarConsultaMultiple();
        
        if(count($this->rows) == 1)
	{
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            
            //Inicio de sesión y variables de sesión
            session_start();
            
            //Datos que llevara el arreglo de sesión
            $_SESSION["nombre"] = $this->nombre;
            $_SESSION["apellido"] = $this->apellido;
            $_SESSION["idUsuario"] = $this->idcliente;
			
            echo '{"status":1, "redirectURL":"'.$redirectURL.'"}';
            exit;
        }else{
            die('{"status":0,"mensaje":"Nombre de usuario o contraseña incorrectos"}');
        }
    }


    /************* METODOS ABSTRACTOS ******************/
    
    protected function leer() {
        
    }
    
    protected function crear() {
        
    }
    
    protected function actualizar() {
        
    }

    protected function eliminar() {
        
    }
}
?>