$(document).ready(function()
{
    /**************************************************/
    /**
     * Funcion para autocomletar el campo de busqueda de un cliente
     */
   $('#buscar_cliente').autocomplete({
       source : 'librerias/control_cliente.php?type=1',
       /**
        * Funcion que permite desplegar un formulario para la edición de la
        * informacion de un cliente, al presionar o dar click en una de los
        * resultados del autocomplete
        */
       select : function(event, ui){
          $('#resultados').toggle('fast', function(){
                $('#resultados').html(
                     '<h2>Detalles</h2>' +
                     '<input type="hidden" id="id_usuario" value="' + ui.item.id + '" />' +
                     '<strong>Nombre: </strong><span>' + ui.item.nombre + ' <a id="editar" class="editar btn btn-mini" href="#">Editar</a></span>' +
                     '<span class="oculto"><input id="nombre_usuario" type="text" value="' + ui.item.nombre +'" /><a class="grd_info" href="#">Ok</a> <a href="#" class="cancel">Cancelar</a></span><br/>' +
                     '<strong>Apellidos: </strong><span>' + ui.item.apellido + ' <a class="editar btn btn-mini" href="#">Editar</a></span>' +
                     '<span class="oculto"><input id="apellido_usuario" type="text" value="' + ui.item.apellido +'" /><a class="grd_info" href="#">Ok</a> <a href="#" class="cancel">Cancelar</a></span><br/>' +
                     '<strong>Empresa: </strong><span>' + ui.item.empresa + ' <a class="editar btn btn-mini" href="#">Editar</a></span>' +
                     '<span class="oculto"><input id="apellido_usuario" type="text" value="' + ui.item.empresa +'" /><a class="grd_info" href="#">Ok</a> <a href="#" class="cancel">Cancelar</a></span><br/>' +
                     '<strong>Correo: </strong><span>' + ui.item.correo + ' <a class="editar btn btn-mini" hr ef="#">Editar</a></span>' +
                     '<span class="oculto"><input id="descripcion"  type="text" value="' + ui.item.correo +'" /><a class="grd_info" href="#">Ok</a> <a href="#" class="cancel">Cancelar</a></span>'+
                     '<script src="librerias/js/funciones_cliente.js"></script>'
                 );
          });
          $('#resultados').slideDown('fast');
       }  
    });
    
//    $('.editar').click(function(){
//       alert('me dieron click'); 
//    });
    
    
    /**
     * Funcion que permite la edición de un campo seleccionado
     */
//    $('.editar').on('click', function(){
//        alert('Aqui toy');
//        $(this).closest('span').fadeOut('fast', function(){
//            $(this).closest('span').next('span').fadeIn('fast');
//        });
//        return false;
//     });
     
     /**
      * Función para volver al estado original del dato al cancelar su edición
      */
//    $('.cancel').on('click', function(){
//        $(this).closest('span').fadeOut('fast', function(){
//            $(this).closest('span').prev('span').fadeIn('fast');
//        });
//        return false;
//    });
    
    
    /**
     * Funcion para la aparicion del formulario de creacion de un cliente
     */
    $('#crear_cliente').click(function(){
        
        $('#resultados').html('');
        $('#busqCliente').fadeOut('fast', function(){
            $('#resultados').fadeIn('fast', function(){
                $(this).load('librerias/control_cliente.php?type=2', '', function(){
                    $(this).fadeIn('fast');
                });
            });
        });
        return false;
   });
   
   /**
    * Funcion al presionar el boton de cancelar la creacion de un cliente
    */
   $('#btnCancelarCliente').click(function(){
       $('#resultados').fadeOut();
       $('#resultados').html('');
       $('#busqCliente').fadeIn();
   })	
});