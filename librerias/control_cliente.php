<?php

include_once '../modelo/class_cliente.php';

$cliente = new class_cliente();
$type = $_GET['type'];

/**
 * Type 1: Resultados del autocomplete.
 * Type 2: Formulario para agregar usuarios.
 * Type 3: Funcion para agregar usuario.
 */
switch ($type) {
    case 1:     
        echo $cliente->leer($_GET['term']);
    break;

    case 2:
?>
    <legend>Crear</legend>
        <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputEmail">Documento</label>
              <div class="controls">
                <input type="text" id="inputEmail" placeholder="Documento">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Nombre</label>
              <div class="controls">
                <input type="text" id="inputPassword" placeholder="Nombre">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Apellidos</label>
              <div class="controls">
                <input type="text" id="inputPassword" placeholder="Apellidos">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Empresa</label>
              <div class="controls">
                <input type="text" id="inputPassword" placeholder="Empresa">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Correo</label>
                <div class="controls">
                <input type="email" id="inputPassword" placeholder="Correo">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                <button id="btnCancelarCliente" class="btn">Cancelar</button>
                <button id="btnCrearCliente" class="btn btn-warning">Crear Cliente</button>
                </div>
            </div>
    </form>
<?php
    break;

    case 3:
        $cliente->crear($_GET);
    break;

    case 4:
        $cliente->actualizar($_GET, $_GET['id_usuario']);
    break;

    case 5:
        echo "he llegado aqui";
    break;

    default:
    break;
}

?>