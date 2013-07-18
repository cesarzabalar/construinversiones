<?php

$raiz ="./"; //distancia hasta la raiz, empieza en punto y termina en barra
include_once("modelo/funciones-comunes.php");

$descripcion ="Aplicativo para la gestion de presupuestos";
$keywords ="Presupuestos, costos, insumos, APU";
$titulo_pagina="Presupuesto :: ConstruInversiones";

include("includes/cabecera.php");
include_once 'modelo/class_cliente.php';
if(!isset($_SESSION['nombre']))
{
	header("location:login.php");
} else {
    

//Se captura el id del usuario ingresado
$id = $_SESSION['idUsuario'];

?>
<!--Encabezado-->
<style>
.ui-autocomplete-loading {
    background: white url('images/ajax16.gif') right center no-repeat;
}
</style>

<div style="background-color:#fff; margin-bottom:20px" class="container-fluid redondeado">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div style="margin-top:20px" class="span4">
					<img alt="Logo construinversiones" src="images/LogoConstrupeq.png" width="500px" />
				</div>
				<div style="margin-top:20px" class="span8">
					<div class="page-header">
						<h1>
							APLICATIVO  <br /><small>Presupuestos</small>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Fin Encabezado-->


<!--CONTENEDOR PRINCIPAL-->

<div style="background-color:#fff; margin-bottom:20px; padding:10px" class="container-fluid redondeado">
    <div class="tabbable tabs-left" id="tabs-217435">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#panel-294544" data-toggle="tab">Clientes</a>
            </li>
            <li>
		<a href="#panel-250405" data-toggle="tab">Presupuesto</a>
            </li>
	</ul>
				
        <div class="tab-content">
            <div class="tab-pane active" id="panel-294544">
                <h3>Clientes</h3>
                
                <div id="busqCliente">
                    <label>Buscar Cliente</label>
                    <input type="text" name="buscar_cliente" id="buscar_cliente" val="" />
                    <a id="crear_cliente" style="margin-top: -10px" class="btn btn-warning">Crear Cliente</a>
                </div>
                <div id="resultados">
                    <?php
                        //$cliente = new class_cliente();
                        //echo $cliente->leer('a');
                    ?>
                </div>
    
            </div>
            
            <div class="tab-pane" id="panel-250405">
		<p>
                    Howdy, I'm in Section 2.
		</p>
            </div>
	</div>
    </div>	
</div>

<?php
    include("includes/pie.php");
}
 ?>