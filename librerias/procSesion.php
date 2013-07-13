<?php
	include_once("../clases/Conexion_Mysql.php");
	$conexion = new Conexion_Mysql();
	$conexion->conectar();
	
	$redirectURL = 'admin.php';
	
	if($_POST['login'] != "" && $_POST['password'] != "")
	{	
		$nick = $_POST['login'];
		$pass = $_POST['password']; // encriptamos en MD5 para despues comprar (Modificado)
		
		$query = $conexion->query("SELECT * FROM cliente WHERE correo = '$nick' AND documento = '$pass'");
				  	  

		// nos devuelve 1 si encontro el usuario y el password
		if($conexion->num_filas($query))
		{ 
                    session_start();
                    
                    $array = $conexion->f_array($query);
                    $_SESSION["nombre"] = $array["nombre"];
                    $_SESSION["apellido"] = $array["apellido"];
                    $_SESSION["idUsuario"] = $array["id_cliente"];
			
			echo '{"status":1, "redirectURL":"'.$redirectURL.'"}';
			exit;
		}else{
		die('{"status":0,"mensaje":"Nombre de usuario o contrase&ntilde;a incorrectos"}');}
	}else{
		die ('{"status":0,"mensaje":"Faltan campos por llenar"}');
	}
	
	$conexion->liberar_sql($query);
	$conexion->cerrar_conexion();
?> 