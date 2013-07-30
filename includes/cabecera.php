<?php 
$recurso = $_SERVER['REQUEST_URI'];
$separar = explode(".",$recurso);
$separar = end($separar); 
if($separar  == "php"){
    $dir =substr("$recurso", 0, -4); //
    // o mejor
    // $dir = "404.html"; // ´lo mandas a un "not found" para que no insistan con el .php
    header("Location: $dir");
}


session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php parametro_plantilla("titulo_pagina");?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php parametro_plantilla("descripcion");?>">
    <meta name="keywords" content="<?php parametro_plantilla("keywords");?>">
    <meta name="author" content="ConstruInversiones">

    <!-- Le styles -->
    <link href="<?php echo $raiz;?>framework/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $raiz;?>framework/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo $raiz;?>librerias/jquery-ui/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet"/>

     <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="framework/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $raiz;?>framework/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $raiz;?>framework/bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $raiz;?>framework/bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $raiz;?>framework/bootstrap/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo $raiz;?>images/favicon.ico">
    
  </head>

  <body>

    <div class="navbar navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">ConstruInversiones</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="#about">Nosotros</a></li>
              <li><a href="#contact">Contacto</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="login.php">Ingresar</a></li>
                  <li><a href="#">Registrarse</a></li>
                  <li><a href="#">Olvidó la contraseña?</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>   
            <?php if(!isset($_SESSION['idUsuario'])){?>
            
            <form id="frmLogin" action="librerias/procSesion.php" method="post" class="navbar-form pull-right">
              <input class="span2" name="login" type="text" placeholder="email">
              <input class="span2" name="password" type="password" placeholder="Contraseña" >
              <button type="submit" class="btn btn-warning">Ingresar</button>
            </form>
            <?php }else{ ?>
              <ul class="nav pull-right">
                  <div class="btn-group">
                    <a class="btn btn-warning" href="login.php"><i class="icon-user icon-white"></i>  <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]?></a>
                    <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-edit"></i> Ver Perfil</a></li>
                      <li class="divider"></li>
                      <li><a href="librerias/salir.php"><i class="icon-off"></i> Salir</a></li>
                    </ul>
                  </div>
              </ul>
            <?php }?>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
      
     
      
   <div class="container">
	 <div id="mensaje" title="Error de Ingreso"></div>
         <div id="mensaje2" title="Mensaje"></div>
