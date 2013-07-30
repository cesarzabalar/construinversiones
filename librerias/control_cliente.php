<?php

include_once '../modelo/class_cliente.php';
include_once '../modelo/class_roles.php';
//include_once '../modelo/funciones-comunes.php';

$cliente = new class_cliente();
$roles = new class_roles();

//$conex = conecta_base_datos();
$type = $_GET['type'];

/**
 * Type 1: Resultados del autocomplete.
 * Type 2: Formulario para agregar usuarios.
 * Type 3: Funcion para agregar usuario.
 * Type 4: Funcion para actualizar un usuario.
 */
switch ($type) {
    case 1:     
        echo $cliente->buscar($_GET['term']);
    break;

    case 2:
        //$query = mysql_query("SELECT * FROM roles ORDER BY id_rol ASC");
?>
    <legend>Añadir un nuevo cliente</legend>
        <div id="frmCrearCliente" class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputDocumento">Documento</label>
              <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-file"></i></span>
                        <input type="text" name="documento" id="documento" placeholder="Documento" required>
                  </div>   
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputNombre">Nombre</label>
              <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-edit"></i></span>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                  </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputApellidos">Apellidos</label>
              <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-edit"></i></span>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellidos" required>
                  </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmpresa">Empresa</label>
              <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-calendar"></i></span>
                        <input type="text" name="empresa" id="empresa" placeholder="Empresa" required>
                  </div>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputCorreo">Correo</label>
                <div class="controls">
                    <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                        <input type="email" name="correo" id="correo" placeholder="Correo" required>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputDireccion">Direccion</label>
                <div class="controls">
                    <div class="input-prepend">
                    <span class="add-on"><i class="icon-home"></i></span>
                        <input type="text" name="direccion" id="direccion" placeholder="Direccion" required>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputRol">Rol</label>
                <div class="controls">
                    <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <select name="rol" id="rol">
                        <?php 
                            foreach ($roles->leer() as $valor) {?>
                            <option value="<?php echo $valor['id_rol'] ?>"><?php echo $valor['nombre_rol'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                <div id="btnCancelarCliente" class="btn btn-danger"><i class="icon-remove-sign icon-white"></i> Cancelar</div>
                <div id="btnCrearCliente" class="btn btn-success"><i class="icon-plus-sign icon-white"></i> Crear Cliente</div>
                </div>
            </div>
    </div>
    <script src="librerias/js/funciones_cliente.js"></script>
<?php

    break;

    case 3:
        //Array que guardara las cadenas de errores si los hay
        $errors = array();
        
        //Se comprueba que cada campo tenga los datos debidos
        if(!$_GET['documento'])
        {
            $errors['Documento']='Por favor escriba un documento correcto!';
        }

        if(!$_GET['nombre'])
        {
            $errors['Nombre']='Por favor escriba un nombre!';
        }

        if(!$_GET['apellido'])
        {
            $errors['Apellidos']='Por favor escriba un apellido!';
        }
        
        if(!$_GET['empresa'])
        {
            $errors['Empresa']='Por favor escriba una empresa!';
        }
        
        if(!filter_var($_GET['correo'], FILTER_VALIDATE_EMAIL))
        {
            $errors['Email']='Por favor escriba un correo válido';
        }
        
        if(!$_GET['direccion'])
        {
            //or !ereg("[a-zA-Z0-9\-]", $_GET['direccion'])
            $errors['Direccion']='Por favor escriba una direccion correcta. Evite el uso del signo #';
        }
        
        //Si el arreglo de errores ha encontrado alguno mostrara el error en pantallaa
        if(count($errors))
	{
		$errString = array();
		foreach($errors as $k=>$v)
		{
			$errString[]='"mensaje":"'.$v.'"';
		}
		
		// JSON error response:
		echo '{"status":0,'.join(',',$errString).'}';
        //De lo contrario al no encontrara errores enviara los datos para la creacion d
        //del nuevo cliente
	}else{
            $cliente->crear($_GET);
        }
    break;

    case 4:
        $cliente->actualizar($_GET, $_GET['id_cliente']);
    break;

    case 5:
        echo "he llegado aqui";
    break;

    default:
    break;
}

?>

