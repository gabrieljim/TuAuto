function modelos(str) {

    var xmlhttp;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mod").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "escritorio/modelos.php?c=" + str, true);
    xmlhttp.send();

}


function mostrarVehi(str) {

    //e.preventDefault();
    //var descripcion = $("#descrip").val();
    /*apellido = $("#apellido").val(),
    edad = $("#edad").val(),*/

    //"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
   /* var datos = {
        "id": str,
    };
    console.log(datos);

    $.ajax({
        url: "escritorio/vehiculo.php?id="+str,
        type: "POST",
        data: datos,
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $(".respuesta").html("Servidor:<br><pre>" + JSON.stringify(response, null, 2) + "</pre>");
        }
    });*/
	
	
	var xmlhttp;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("editar").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "escritorio/vehiculo.php?id=" + str, true);
    xmlhttp.send();
}


function eliminarVehi(str) {

    var xmlhttp;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("eliminar").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "escritorio/eliminar.php?id=" + str, true);
    xmlhttp.send();
}



/* alert(str);
		var xmlhttp;
		if (str=="")
		 {
		 document.getElementById("txtHint").innerHTML="";
		return;
		 }
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		 }
		else
		 {// code for IE6, IE5
		 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("descrip").value=xmlhttp.responseText;
			//document.getElementById("editar").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","escritorio/mostrar.php?c="+str,true);
	xmlhttp.send();
*/