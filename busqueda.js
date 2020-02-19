// JavaScript Document
$(document).ready(function(){
                                
        var consulta;
        
	
         //hacemos focus al campo de búsqueda
        $("#search").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#search").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#search").val();
                                                                           
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "consultas/consulta2.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          
						  
						  $("#resultado").empty();
                          $("#resultado").append(data);
						  
                                                             
                    }
              });
                                                                                  
                                                                           
        });
                                                                   
});