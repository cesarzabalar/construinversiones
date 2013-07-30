$(document).ready(function()
{
    /**
     * Funcion que permite la edición de un campo seleccionado
     */
    $('.editar').on('click', function(){
        $(this).closest('span').fadeOut('fast', function(){
            $(this).closest('span').next('span').fadeIn('fast');
        });
        return false;
     });
     
     /**
      * Función para volver al estado original del dato al cancelar su edición
      */
    $('.cancel').on('click', function(){
        $(this).closest('span').fadeOut('fast', function(){
            $(this).closest('span').prev('span').fadeIn('fast');
        });
        return false;
    });
    
    /**
     * Función para guardar los cambios de actualizacion
     */
    $('.grd_info').on('click', function(){
        var data;
        var element = $(this);
        var id_cliente = $('#id_cliente').val();
	var nombre_cliente = $('#nombre_cliente').val();
	var apellido_cliente = $('#apellido_cliente').val();
        var empresa_cliente = $('#empresa_cliente').val();
        var correo_cliente = $('#correo_cliente').val();
        var direccion_cliente = validarString($('#direccion_cliente').val());
        var info_usuario = $(this).siblings('input').val();
                    
        if ( $(this).siblings('input').attr('id') == 'nombre_cliente' )
        {
            data = 'type=4&nombre_cliente=' + nombre_cliente + '&id_cliente=' + id_cliente;
						
            $.get('librerias/control_cliente.php', data, function(respuesta)
            {
                element.closest('span').fadeOut('fast', function(){
                    $(this).closest('span').prev('span').html(
                        nombre_cliente + ' <a class="editar btn btn-mini">Editar</a>');
                    
                    $(this).closest('span').prev('span').fadeIn('fast');
                });
                
                $( "#mensaje2" ).text(respuesta.mensaje);
                $( "#mensaje2" ).show();
                $( "#mensaje2" ).dialog({
                    height: 100,
                    modal: true
                });
            }, "json");
					
         } else if ( $(this).siblings('input').attr('id') == 'apellido_cliente' )
         {
            data = 'type=4&apellido_cliente=' + apellido_cliente + '&id_cliente=' + id_cliente;
						
            $.get('librerias/control_cliente.php', data, function(respuesta)
            {
                element.closest('span').fadeOut('fast', function(){
                    $(this).closest('span').prev('span').html(
                        apellido_cliente + ' <a class="editar btn btn-mini">Editar</a>');
                    
                    $(this).closest('span').prev('span').fadeIn('fast');
                });
                
                $( "#mensaje2" ).text(respuesta.mensaje);
                $( "#mensaje2" ).show();
                $( "#mensaje2" ).dialog({
                    height: 100,
                    modal: true
                });
            }, "json");				
         } else if ( $(this).siblings('input').attr('id') == 'empresa_cliente' )
         {
            data = 'type=4&empresa_cliente=' + empresa_cliente + '&id_cliente=' + id_cliente;
						
            $.get('librerias/control_cliente.php', data, function(respuesta)
            {
                element.closest('span').fadeOut('fast', function(){
                    $(this).closest('span').prev('span').html(
                        empresa_cliente + ' <a class="editar btn btn-mini">Editar</a>');
                    
                    $(this).closest('span').prev('span').fadeIn('fast');
                });
                
                $( "#mensaje2" ).text(respuesta.mensaje);
                $( "#mensaje2" ).show();
                $( "#mensaje2" ).dialog({
                    height: 100,
                    modal: true
                });
            },"json");				
         } else if ( $(this).siblings('input').attr('id') == 'correo_cliente' )
         {
            data = 'type=4&correo_cliente=' + apellido_cliente + '&id_cliente=' + id_cliente;
						
            $.get('librerias/control_cliente.php', data, function(respuesta)
            {
                element.closest('span').fadeOut('fast', function(){
                    $(this).closest('span').prev('span').html(
                        correo_cliente + ' <a class="editar btn btn-mini">Editar</a>');
                    
                    $(this).closest('span').prev('span').fadeIn('fast');
                });
                
                $( "#mensaje2" ).text(respuesta.mensaje);
                $( "#mensaje2" ).show();
                $( "#mensaje2" ).dialog({
                    height: 100,
                    modal: true
                });
            }, "json");				
         } else if ( $(this).siblings('input').attr('id') == 'direccion_cliente' )
         {
            data = 'type=4&direccion_cliente=' + direccion_cliente + '&id_cliente=' + id_cliente;
						
            $.get('librerias/control_cliente.php', data, function(respuesta)
            {
                element.closest('span').fadeOut('fast', function(){
                    $(this).closest('span').prev('span').html(
                        direccion_cliente + ' <a class="editar btn btn-mini">Editar</a>');
                    
                    $(this).closest('span').prev('span').fadeIn('fast');
                });
                
                $( "#mensaje2" ).text(respuesta.mensaje);
                $( "#mensaje2" ).show();
                $( "#mensaje2" ).dialog({
                    height: 100,
                    modal: true
                });
            }, "json");				
         } 
        return false;
    });
    
    /**
    * Función para la creación de un cliente, tomando los valores de los
    * inputs del formulario y enviandolos a la clase conttroladora
    */
   $('#btnCrearCliente').on('click', function(){
        var data = 'type=3'+
                   '&documento=' + $('#documento').val() +
                   '&nombre=' + $('#nombre').val() +
                   '&apellido=' + $('#apellido').val() +
                   '&empresa=' + $('#empresa').val() +
                   '&correo=' + $('#correo').val() +
                   '&direccion=' + validarString($('#direccion').val()) +
                   '&rol=' + $('#rol').find(':selected').val();
           
         //Llamado Ajax		
        $.ajax({
            type: "GET",
            url: "librerias/control_cliente.php",
            dataType: 'json',
            data: data,
            
           success: function(data){

                if(data.status){
                    $( "#mensaje2" ).text(data.mensaje);
                    $( "#mensaje2" ).show();
                    $( "#mensaje2" ).dialog({
                        height: 100,
                        modal: true
                    });
                    $('#resultados').fadeOut();
                    $('#busqCliente').fadeIn();
                }else{
                    $( "#mensaje2" ).text(data.mensaje);
                    $( "#mensaje2" ).show();
                    $( "#mensaje2" ).dialog({
                        height: 100,
                        modal: true
                    });
                }
            }//cierro success
	});//cierro ajax
    });
    
    /**
     * Función para la cancelación de la creación de un cliente, haciendo que
     * el formulario de datos se oculte y aparezca el campo de busqueda.
     */
    $('#btnCancelarCliente').click(function(){
       $('#resultados').fadeOut();
       $('#resultados').html('');
       $('#busqCliente').fadeIn();
   });
    
});

//Función que valida la presencia del signo '#' y lo reemplaza por 'No.'
//para evitar conflictos
function validarString (cadenaAnalizar) {
   var cad = cadenaAnalizar.split('');
   var cadena = '';
   
   for (var i = 0; i< cadenaAnalizar.length; i++) 
   {
         if( cad[i] == '#') {
            //alert("Caracter no permitido");
            cad[i] = 'No.';
            cadena = cadena+cad[i];
          }  else {
            cadena = cadena+cad[i];
          }
    }
    return cadena;
}  