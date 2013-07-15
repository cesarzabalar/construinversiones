$(document).ready(function(){
						   
	$('#frmLogin').submit(function(e){

		var datos = $(this).serialize()+'&fromAjax=1';
		
		$.ajax({
                    type: "POST",
                    url: "librerias/procSesion.php",
                    dataType: 'json',
                    data: datos,
                    
                    success: function(data){
	  			
			//$('section').fadeIn();
				
                        if(!data.status)
                        {
                           $("#mensaje").show(); // Ponemos en visible en contenedor del mensaje	
                            
                            
            		   $( "#mensaje" ).dialog({
				height: 100,
				modal: true
                            });
                            
                           $('#mensaje').text(data.mensaje);
                            
			}//fin if data.status
			else{
                            location.replace(data.redirectURL);
			}				
		      }//cierro success

        });//cierro funcion ajax
		e.preventDefault();
	});

});

function showTooltip(elem, dato)
{
   /*$(elem).popover({
       delay: { show: 500, hide: 100 },
       title: dato,
       trigger: "focus"
   });*/

	//elem.css({"border":'solid #F00 1px'});
	//elem.blur();
}