
function busqueda(){
	
	var ubi=document.getElementById('ubi').value;	
	var tipo=document.getElementById('ti').value;
	var marca=document.getElementById('ma').value;
	var modelo=document.getElementById('mod').value;
	var tra=document.getElementById('tr').value;

	console.log(ubi);
	
	var xmlhttp;
		if (ubi=="")
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
		document.getElementById("resultado").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","consultas/consultaBuscador.php?ubi="+ubi+"&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&trans="+tra,true);
	xmlhttp.send();
	
}



/*Validaciones para formularios*/

/*Validar si las contraseñas son iguales*/
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

/*Validar si las contraseñas son iguales cuando se modifica*/
function Figuales2(){
	
	var a=document.getElementById('clave2').value;
	var b=document.getElementById('repetir2').value;
	document.getElementById('errorC2').style.display='none';
	
	if(a!=b){
		
		document.getElementById('errorC2').style.display='block';
		document.getElementById('clave2').value='';
		document.getElementById('repetir2').value='';
		
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
		//document.getElementById("correoR").value='';
		}
	}
	xmlhttp.open("GET","system/usuario/get_usuario.php?c="+str,true);
	xmlhttp.send();
}

/*Funcion ajax para verificar que el correo de usuario existe en la base de datos y recuperar la clave*/

function usuarioE2(str){
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
		document.getElementById("existe2").innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","usuario/get_usuario.php?c="+str+"&a=1",true);
	xmlhttp.send();
}

/*Funcion ajax para verificar si el usuario ya existe en la base de datos cuando se agrega un nuevo usuario desde el administrador*/

function usuarioE3(str){
		
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
		document.getElementById("cexi").innerHTML=xmlhttp.responseText;
		//document.getElementById("correoElectronico").value='';
			
		}
	}
	xmlhttp.open("GET","usuario/get_usuario.php?c="+str,true);
	xmlhttp.send();
}

/*Funcion ajax para verificar si la clave actual es la correcta*/

function actual(str){
	
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
		document.getElementById("act").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","usuario/get_clave.php?c="+str,true);
	xmlhttp.send();
}


/*funcion para limpiar el campó de correo*/

function limpiarCorreo(){

	document.getElementById('correo').value="";
	
};


function actuter(val){
	
	//$('#actuter').modal('show');
	//Document.getElementById('correoR').value=val;
}


/*función para mostrar los estados segun el pais*/

function busquedaEstado(str){
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
		document.getElementById("est").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","usuario/estados.php?c="+str,true);
	xmlhttp.send();
}

function mostrar(val){
	
	if (val==1){
		
	document.getElementById('Panelpass').style.display='block';
	document.getElementById('Paneluser').style.display='none';
		
	}else{
		
	document.getElementById('Panelpass').style.display='none';
	document.getElementById('Paneluser').style.display='block';
	}
	
}

/*Seleccion de ciudad desde formulario de edicion de usuario*/
function showselect5(str){
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
		document.getElementById("ciuD").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","usuario/ciudad.php?c="+str,true);
	xmlhttp.send();

		  }
