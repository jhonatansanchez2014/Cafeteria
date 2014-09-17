$(document).on('ready', function(){
	//Para el login
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
});