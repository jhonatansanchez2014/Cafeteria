$(document).on('ready', function(){
	var pet=$('.body-page form').attr('action');
	var met=$('.body-page form').attr('method');

	$('.body-page form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				$('.loader-wrapper').removeClass("hide");
				$('.body-page form .msg-error').hide();
			},
			url: pet,
			type: met,
			data: $('.body-page form').serialize(),
			success: function(respuesta){
				$('.msg-error').html(respuesta).show();
				$('.loader-wrapper').addClass("hide");
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
					$('.add-date').append(respuesta);
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
		$('.add-date').append(data);
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
			type: met,
			data: $('.modal-footer form').serialize(),
			success: function(respuesta){
				$('.loader-wrapper').addClass("hide");
				$('.msg-error').html(respuesta);
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
function uploadUser(){
	
		$.post('../includes/u.redy.user.php',function(data){
			$('.add-date').removeClass(data);
			console.log(data);
		});
	
}
