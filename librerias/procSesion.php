<?php
    //Importación de clases
    include_once("../modelo/class_cliente.php");
        
    //Instanciación de la clase class_cliente
    $cliente = new class_cliente();
	//$conexion = $cliente->conectar();
        
    //Dirección a la que sera redireccionado en caso de un ingreso exitoso
    //$redirectURL = 'admin.php';
	
    //Validación del envio de datos por el formulario
    if($_POST['login'] != "" && $_POST['password'] != "")
    {	
        $cliente_data['correo'] = $_POST['login'];
        $cliente_data['documento'] = $_POST['password'];

        //echo "Correo: ".$cliente_data['correo']."<br>";
	$cliente->queryLogueo($cliente_data);
        //echo $cliente::query;

	// nos devuelve 1 si encontro el usuario y el password
/*	if(count($cliente->rows) == 1)
	{
            //Inicio de sesión y variables de sesión
            session_start();
            
            //Datos que llevara el arreglo de sesión
            $_SESSION["nombre"] = $cliente->rows["nombre"];
            $_SESSION["apellido"] = $cliente->rows["apellido"];
            $_SESSION["idUsuario"] = $cliente->rows["id_cliente"];
			
            echo '{"status":1, "redirectURL":"'.$redirectURL.'"}';
            exit;
        }else{
            die('{"status":0,"mensaje":"Nombre de usuario o contraseña incorrectos"}');}
    */}else{
	die ('{"status":0,"mensaje":"Faltan campos por llenar"}');
    }
	
    //$cliente->liberar_sql($query);
    //$cliente->cerrar_conexion();
?> 