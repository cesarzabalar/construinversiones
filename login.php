<?php
session_start();

if(isset($_SESSION['idUsuario']))
{
    header("location:admin.php");
} else {
$raiz ="./"; //distancia hasta la raiz, empieza en punto y termina en barra
include_once("librerias/funciones-comunes.php");

$descripcion ="Portal para el aplicativo de presupuestos";
$keywords ="presupuestos, constructora, normas APU";
$titulo_pagina="Presupuestos :: Construinversiones";

include("includes/cabecera2.php");

?> 

<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 50px auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    
    <form id="frmLogin" method="post" action="librerias/procSesion.php" class="form-signin">
        <img alt="Logo construinversiones" src="images/LogoConstrupeq.png" />
        <h2 class="form-signin-heading">Ingresar</h2>
        <label>Correo electrónico</label>
        <input type="text" name="login" class="input-block-level" placeholder="ej. usuario@constru.com">

        <label>Contraseña</label>
        <input type="password" name="password" class="input-block-level">
        <button class="btn btn-large btn-warning" type="submit">Ingresar</button>
      </form>

 <?php
    include("includes/pie.php");
}
 ?>