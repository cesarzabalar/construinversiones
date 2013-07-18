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
    
});