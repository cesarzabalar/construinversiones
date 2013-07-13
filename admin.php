<?php
//session_start();

/*if(!isset($_SESSION['nombre']))
{
	header("location:login.php");
} else {*/


$raiz ="./"; //distancia hasta la raiz, empieza en punto y termina en barra
include_once("librerias/funciones-comunes.php");

$descripcion ="Aplicativo para la gestion de presupuestos";
$keywords ="Presupuestos, costos, insumos, APU";
$titulo_pagina="Presupuesto :: ConstruInversiones";

include("includes/cabecera.php");
if(!isset($_SESSION['nombre']))
{
	header("location:login.php");
} else {
    
include ("clases/conexion_Mysql.php");

$conexion = new Conexion_Mysql();
$conexion->conectar();


//Se captura el id del usuario ingresado
$id = $_SESSION['idUsuario'];


?>
<!--Encabezado-->
<div style="background-color:#ffffff; margin-bottom:20px" class="container-fluid redondeado">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div style="margin-top:20px" class="span2">
					<img alt="Logo construinversiones" src="" width="130px" />
				</div>
				<div style="margin-top:20px" class="span10">
					<div class="page-header">
						<h1>
							CONSTRUINVERSIONES  <br /><small>Aplicativo de Presupuestos</small>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Fin Encabezado-->


<!--CONTENEDOR PRINCIPAL-->

<div style="background-color:#ffffff; margin-bottom:20px; padding:10px" class="container-fluid redondeado">
	
	
</div>

<?php
    include("includes/pie.php");
    $conexion->cerrar_conexion();
	}
 ?>
 
