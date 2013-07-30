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
                     '<h4 class="text-info">Información</h4>' +
                     '<input type="hidden" id="id_cliente" value="' + ui.item.id + '" />' +
                     '<strong>Documento: </strong><span>' + ui.item.documento + '</span><br/>' +
                     '<strong>Nombre: </strong><span>' + ui.item.nombre + ' <a class="editar btn btn-mini">Editar</a></span>' +
                     '<span class="oculto"><input id="nombre_cliente" type="text" value="' + ui.item.nombre +'" />  <a style="margin-top: -10px" class="grd_info btn btn-success"> <i class="icon-ok icon-white"></i>  </a> <a style="margin-top: -10px" class="cancel btn btn-danger"> <i class="icon-remove icon-white"></i></a></span><br/>' +
                     '<strong>Apellidos: </strong><span>' + ui.item.apellido + ' <a class="editar btn btn-mini">Editar</a></span>' +
                     '<span class="oculto"><input id="apellido_cliente" type="text" value="' + ui.item.apellido +'" />  <a style="margin-top: -10px" class="grd_info btn btn-success"> <i class="icon-ok icon-white"></i>  </a> <a style="margin-top: -10px" class="cancel btn btn-danger"> <i class="icon-remove icon-white"></i></a></span><br/>' +
                     '<strong>Empresa: </strong><span>' + ui.item.empresa + ' <a class="editar btn btn-mini">Editar</a></span>' +
                     '<span class="oculto"><input id="empresa_cliente" type="text" value="' + ui.item.empresa +'" />  <a style="margin-top: -10px" class="grd_info btn btn-success"> <i class="icon-ok icon-white"></i>  </a> <a style="margin-top: -10px" class="cancel btn btn-danger"> <i class="icon-remove icon-white"></i></a></span><br/>' +
                     '<strong>Correo: </strong><span>' + ui.item.correo + ' <a class="editar btn btn-mini">Editar</a></span>' +
                     '<span class="oculto"><input id="correo_cliente"  type="email" value="' + ui.item.correo +'" />  <a style="margin-top: -10px" class="grd_info btn btn-success"> <i class="icon-ok icon-white"></i>  </a> <a style="margin-top: -10px" class="cancel btn btn-danger"> <i class="icon-remove icon-white"></i></a></span><br/>' +
                     '<strong>Direccion: </strong><span>' + ui.item.direccion + ' <a class="editar btn btn-mini">Editar</a></span>' +
                     '<span class="oculto"><input id="direccion_cliente"  type="text" value="' + ui.item.direccion +'" />  <a style="margin-top: -10px" class="grd_info btn btn-success"> <i class="icon-ok icon-white"></i>  </a> <a style="margin-top: -10px" class="cancel btn btn-danger"> <i class="icon-remove icon-white"></i></a></span><br/>' +
                     '<script src="librerias/js/funciones_cliente.js"></script>'
                 );
          });
          $('#resultados').slideDown('fast');
       }  
    });

     
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
});