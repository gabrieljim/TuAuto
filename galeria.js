// JavaScript Document

function galeria(n){
	
	
	
	switch(n) {
  
case 1:

	var imagen1=document.getElementById('im1').src;		
	var principal=document.getElementById('imp').src;
			
	document.getElementById('im1').src=principal;
	document.getElementById('imp').src=imagen1;
		
			
    break;
case 2:

	var imagen2=document.getElementById('im2').src;		
	var principal=document.getElementById('imp').src;
			
	document.getElementById('im2').src=principal;
	document.getElementById('imp').src=imagen2;	
			
	break;
			
case 3:

	var imagen3=document.getElementById('im3').src;		
	var principal=document.getElementById('imp').src;
			
	document.getElementById('im3').src=principal;
	document.getElementById('imp').src=imagen3;	
			
	break;
			
			
case 4:

	var imagen4=document.getElementById('im4').src;		
	var principal=document.getElementById('imp').src;
			
	document.getElementById('im4').src=principal;
	document.getElementById('imp').src=imagen4;		 
			
	break;			

   
} 
	
	
	
}