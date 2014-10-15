$(document).on('ready', function(){
	//Insertar usuarios
	var peticion=$('.adduser form').attr('action');
	var metodo=$('.adduser form').attr('method');

	$('.adduser form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				$('.loader-wrapper').removeClass("hide");
				$('.msg-error').hide();
			},
			url: peticion,
			type: metodo,
			data: $('.adduser form').serialize(),
			success: function(respuesta){
				$('.loader-wrapper').addClass("hide");
				if(respuesta=="Ups al parecer sucedió un problema al intentar guardar el usuario en la base de datos, verifica los datos."){
					$('.msg-error').html(respuesta).show();
				}
				else{
					$('.add-new').append(respuesta);
					$('.msg-error').html('Usuario registrado con exito.').show();
				}
			},
			error: function(jqXHR, estado, error){
				console.log(estado);
				console.log(error);
			},
			complete: function(jqXHR, estado){
				console.log(estado);
			},
			timeout: 10000
		});
	});

	//Cargar datos de los usuarios al recargar la pagina con Ajax
	$.post('../includes/u.redy.user.php',function(data){
		$('.add-new').html(data);
		//console.log(data);
	});

	//Eliminar un usuario
	var pet=$('.modal-footer form').attr('action');
	var met=$('.modal-footer form').attr('method');

	$('.modal-footer form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				$('.loader-wrapper').removeClass("hide");
				$('.msg-error').hide();
			},
			url: pet,
			//dataType: "json",
			type: met,
			data: $('.modal-footer form').serialize(),
			success: function(respuesta){
				$('.loader-wrapper').addClass("hide");
				$('.add-new').html(respuesta);
			},
			error: function(jqXHR, estado, error){
				console.log(estado);
				console.log(error);
			},
			complete: function(jqXHR, estado){
				console.log(estado);
			},
			timeout: 10000
		});
	});

	//Para insertar nuevos productos
	var pet=$('.modal-body form').attr('action');
	var met=$('.modal-body form').attr('method');

	$('.modal-body form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				$('.loader-wrapper').removeClass("hide");
				$('.msg-error').hide();
			},
			url: pet,
			type: met,
			dataType: "json",
			data: $('.modal-body form').serialize(),
			success: function(response){
				$('.loader-wrapper').addClass("hide");
				if(response.error_date==false){
					$('.modal-body form')[0].reset();
				}
				$('.msg-error').html(response.mensaje).show();
				$('.content-table').append(response.contenido);
				alert(response.contenido);
			},
			error: function(jqXHR, estado, error){
				console.log(estado);
				console.log(error);
			},
			complete: function(jqXHR, estado){
				console.log(estado);
			},
			timeout: 10000
		});
	});
//end
});
//Función que valida solo Números.
function validatenum(){
	if((event.keyCode < 48) || (event.keyCode > 57)) 
 		event.returnValue = false;
}
//Funcioón que valida solo letras.
function validatetext(){
	if ((event.keyCode != 32)&&(event.keyCode < 65)||(event.keyCode > 90)&&(event.keyCode < 97)||(event.keyCode > 122))
		event.returnValue = false;
}


//Código para colocar 
//los indicadores de miles mientras se escribe
//script por tunait!
function decimales(donde,caracter){
	pat=/[\*,\+,\(,\),\?,\,$,\[,\],\^]/
	valor=donde.value
	largo=valor.length
	crtr=true
	if(isNaN(caracter)||pat.test(caracter)==true){
		if (pat.test(caracter)==true){ 
			caracter="/"+caracter
		}
		carcter=new RegExp(caracter,"g")
		valor=valor.replace(carcter,"")
		donde.value=valor
		crtr=false
	}
	else{
		var nums=new Array()
		cont=0
		for(m=0;m<largo;m++){
			if(valor.charAt(m)=="."||valor.charAt(m)==" ")
				{continue;}
			else{
				nums[cont]=valor.charAt(m)
				cont++
			}
		}
	}
	var cad1="",cad2="",tres=0
	if(largo>3&&crtr==true){
		for(k=nums.length-1;k>=0;k--){
			cad1=nums[k]
			cad2=cad1+cad2
			tres++
			if((tres%3)==0){
				if(k!=0){
					cad2="."+cad2
				}
			}
		}
		donde.value=cad2
	}
}
/*function uploadUser(){
	
		$.post('../includes/u.redy.user.php',function(data){
			$('.add-date').removeClass(data);
			console.log(data);
		});
	
}*/
