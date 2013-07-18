<?php

/**
 * Clase encargada de realizar las operaciones necesarias para la creacion,
 * actualizacion y consulta de un cliente
 */
include_once("Conexion_Mysql.php");
include_once("funciones-comunes.php");
class class_cliente extends Conexion_Mysql {
    private $id_cliente="";
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
            $_SESSION["idUsuario"] = $this->id_cliente;
			
            echo '{"status":1, "redirectURL":"'.$redirectURL.'"}';
            exit;
        }else{
            die('{"status":0,"mensaje":"Nombre de usuario o contraseña incorrectos"}');
        }
    }


    /************* METODOS ABSTRACTOS ******************/
    
    public function leer($nombreUsuario) {
        $conex = conecta_base_datos();
        
        $datosArray = array();
        $query = mysql_query("SELECT * FROM cliente
                WHERE nombre LIKE '%".$nombreUsuario."%'
                OR apellido LIKE '%".$nombreUsuario."%'");
        
        if(mysql_num_rows($query))
        {
            $i = 0;
            while ($datos = mysql_fetch_array($query))
            {
                $datosArray[] = array("value" => $datos['nombre'].' '.$datos['apellido'],
                                 "nombre" => $datos['nombre'],
                                 "apellido" => $datos['apellido'],
                                 "empresa" => $datos['empresa'],
                                 "correo" => $datos['correo'],
                                 "id" => $datos['id_cliente']);
            
                $i++;
            }
            //return 'Encontre registros '.$i;
            return json_encode($datosArray);
        }else{
            return 'No se encontraron resultados';
        }
        
        
        mysql_close($conex);
    }
    
    public function crear() {
        
    }
    
    public function actualizar() {
        
    }

    public function eliminar() {
        
    }
}


?>