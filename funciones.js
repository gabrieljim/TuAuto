
function busqueda(){
	
		
	var ubi=document.getElementById('ubi').value;
	var tipo=document.getElementById('ti').value;
	var marca=document.getElementById('ma').value;
	var modelo=document.getElementById('mod').value;
	var tra=document.getElementById('tr').value;
	
	var xmlhttp;

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
		document.getElementById("resultado").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","consultas/consultaBuscador.php?ubi="+ubi+"&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&trans="+tra,true);
	xmlhttp.send();
	
}


function envio(){

	 if(document.getElementById('ms').value==''){
		 
		 
		 document.getElementById('exito').style.display='none';
		 document.getElementById('error').style.display='block';
		 
		 
		 
	 }else{
		 
		 var correo=document.getElementById('corr').value;
		 var men=document.getElementById('ms').value;		 
		 
		var xmlhttp;
		if (correo=="")
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
		document.getElementById("exito").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","consultas/correo.php?c="+correo+"&m="+men,true);
	xmlhttp.send();
		 
		 document.getElementById('error').style.display='none';
		 document.getElementById('ms').value="";
		 
	 }
	 

  }


 function borrar(){

	 document.getElementById('ms').value=""; 

  }
	  

  function abre(c){

	  var codigo=c;

	  ShowTab('info');

	  MostrarConsulta2('consultas/info.php?c='+codigo); return false;

  }

  function showselect(str){
		var xmlhttp;
	
	  	  	  
	     if (str=="")
			 
			 //alert('En lbanco');
			
		 {
		 //document.getElementById("txtHint").innerHTML="";
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
		document.getElementById("tipo").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","consultas/tipoSearch.php?c="+str,true);
	xmlhttp.send();
}

function showModelo(str){
	var xmlhttp;

			  
	 if (str=="")
		 
		 //alert('En lbanco');
		
	 {
	 //document.getElementById("txtHint").innerHTML="";
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
	document.getElementById("modelo").innerHTML=xmlhttp.responseText;
	}
}
xmlhttp.open("GET","consultas/modeloSearch.php?c="+str,true);
xmlhttp.send();
}



	  function showselect2(str){
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
		document.getElementById("marca").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","consultas/marca.php?c="+str,true);
	xmlhttp.send();

		  }

	  function showselect3(str){
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
		document.getElementById("modelo").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","consultas/modelo.php?c="+str,true);
	xmlhttp.send();
}

	  function showselect4(str){
		var xmlhttp;
		if (str=="")
		 {
		 //document.getElementById("txtHint").innerHTML="";
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
		document.getElementById("trans").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","consultas/trans.php?c="+str,true);
	xmlhttp.send();
}


/*Validaciones para formularios*/

function Figuales(){
	
	var a=document.getElementById('clave').value;
	var b=document.getElementById('repetir').value;
	
	if(a!=b){
		
		document.getElementById('errorC').style.display='block';
		document.getElementById('clave').value='';
		document.getElementById('repetir').value='';
		
	}else{
		
		document.getElementById('errorC').style.display='none';
		//document.getElementById('FormEntrar').submit();
	}
	
}


/*Funcion ajax para verificar si el usuario ya existe en la base de datos*/

function usuarioE(str){
		var xmlhttp;
	
	  	  	  
	     if (str=="")
			 
			 //alert('En lbanco');
			
		 {
		 //document.getElementById("txtHint").innerHTML="";
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
		document.getElementById("existe").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","usuario/get_usuario.php?c="+str,true);
	xmlhttp.send();
}

/*funcion para limpiar el campó de correo*/

function limpiarCorreo(){
	document.getElementById('correo').value="";
	
};

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

