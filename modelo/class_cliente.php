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
    private $rol="";
    
    var $mensajeu="";

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
            $_SESSION["idRol"] = $this->rol;
			
            echo '{"status":1, "redirectURL":"'.$redirectURL.'"}';
            exit;
        }else{
            die('{"status":0,"mensaje":"Nombre de usuario o contraseña incorrectos"}');
        }
    }


    /************* METODOS ABSTRACTOS ******************/
    
    public function buscar($nombreUsuario) {
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
                                 "documento" => $datos['documento'],
                                 "nombre" => $datos['nombre'],
                                 "apellido" => $datos['apellido'],
                                 "empresa" => $datos['empresa'],
                                 "correo" => $datos['correo'],
                                 "direccion" => $datos['direccion'],
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
    
    /**
     * 
     */
    public function leer($documento = ''){
        if($documento != '') 
	{	
            $this->query = "SELECT * FROM cliente WHERE documento = '$documento'";
            $this->realizarConsultaMultiple();
        }

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Cliente encontrado';
        } else {
            $this->mensaje = 'Cliente no encontrado';
        }
    }
    
    /**
     * 
     * @param type $cliente_data
     */
    public function crear($cliente_data=array()) {
        if(array_key_exists('documento', $cliente_data)) {
            $this->leer($cliente_data['documento']);
            if($cliente_data['documento'] != $this->documento) {
                foreach ($cliente_data as $campo=>$valor) {
                    $$campo = $valor;
                }
                $this->query = "
                        INSERT INTO cliente
                        (nombre, apellido, documento, empresa, correo, direccion, id_rol)
                         VALUES
                        ('$nombre', '$apellido', '$documento', '$empresa', '$correo', '$direccion', '$rol')
                ";
                $this->realizarConsultaSencilla();
                echo $this->mensajeu = '{"status":1,"mensaje":"Cliente agregado exitosamente"}';
                
            } else {
                echo $this->mensajeu = '{"status":0,"mensaje":"El Cliente ya existe"}';
            }
        } else {
            echo $this->mensajeu = '{"status":0,"mensaje":"No se ha agregado al Cliente"}';
        }
    }
    
    /**
     * 
     * @param type $cliente_data
     * @param type $id_cliente
     */
    public function actualizar($cliente_data=array(), $id_cliente) 
    {
        if(isset($cliente_data['nombre_cliente']))
        {
            $this->query = "UPDATE cliente SET nombre='" . $cliente_data['nombre_cliente'] . "'
                   WHERE id_cliente = '" . $id_cliente . "'";
        } 
	elseif (isset($cliente_data['apellido_cliente']))
        {
            $this->query = "UPDATE cliente SET apellido = '" . $cliente_data['apellido_cliente'] . "'
                    WHERE id_cliente = '" . $id_cliente . "'";
        }
	elseif (isset($cliente_data['empresa_cliente']))
        {
            $this->query = "UPDATE cliente SET empresa = '" . $cliente_data['empresa_cliente'] . "'
                    WHERE id_cliente = '" . $id_cliente . "'";
        }
        elseif (isset($cliente_data['correo_cliente']))
        {
            $this->query = "UPDATE cliente SET correo = '" . $cliente_data['correo_cliente'] . "'
                    WHERE id_cliente = '" . $id_cliente . "'";
        }
        elseif (isset($cliente_data['direccion_cliente']))
        {
            $this->query = "UPDATE cliente SET direccion = '" . $cliente_data['direccion_cliente'] . "'
                    WHERE id_cliente = '" . $id_cliente . "'";
        }
        
        if($this->realizarConsultaSencilla())
        {
            echo $this->mensajeu = '{"status":1,"mensaje":"Se han realizado los cambios!!"}';
        }else{
            echo $this->mensajeu = '{"status":0,"mensaje":"Error al realizar los cambios!!"}';
        }
    }

    /**
     * 
     * @param type $id_cliente
     */
    public function eliminar($id_cliente) {
        
    }
}


?>