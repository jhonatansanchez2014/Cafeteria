$(document).on('ready', function(){
	$(function(){
		$("[data-toggle='tooltip']").tooltip();
	});
	//Insertar usuarios
	var peticion=$('.adduser form').attr('action');
	var metodo=$('.adduser form').attr('method');

	$('.adduser form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				/*pre-loader*/
			},
			url: peticion,
			type: metodo,
			dataType: "json",
			data: $('.adduser form').serialize(),
			success: function(respuesta){
				if(respuesta.e){
					$('.adduser form')[0].reset();
					$('.add-new').append(respuesta.contenido);
					$("#user").removeClass("error-ps");
					$("#documento").removeClass("error-ps");
				}if(respuesta.u){
					$("#user").addClass("error-ps").focus();
					$("#documento").addClass("error-ps");
				}
				if(respuesta.d){
					$("#documento").addClass("error-ps").focus();
					$("#user").removeClass("error-ps");
				}
				$('.mensaje').html(respuesta.mensaje);
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

	//Editar usuarios
	var userAe = $('.edit-user form').attr('action');
	var userMe = $('.edit-user form').attr('method');

	$('.edit-user form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				/*pre-loader*/
			},
			url: userAe,
			type: userMe,
			dataType: "json",
			data: $('.edit-user form').serialize(),
			success: function(respuesta){
				if(respuesta.e){
					$('.add-new').html(respuesta.contenido);
					$("#us").removeClass("error-ps");
					$("#doc").removeClass("error-ps");
				}if(respuesta.u){
					$("#us").addClass("error-ps").focus();
					$("#doc").addClass("error-ps");
				}
				$('.mensaje').html(respuesta.mensaje);
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
	});/*end*/

	//Cargar datos de los usuarios al recargar la pagina con Ajax
	$.post('../includes/u.redy.user.php',function(data){
		$('.add-new').html(data);
		//console.log(data);
	});

	//Para insertar nuevos productos
	var Api=$('.add-product form').attr('action');
	var Mpi=$('.add-product form').attr('method');

	$('.add-product form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				$('.loader-wrapper').removeClass("hide");
			},
			url: Api,
			type: Mpi,
			dataType: "json",
			data: $('.add-product form').serialize(),
			success: function(response){
				$('.loader-wrapper').addClass("hide");
				if(response.error_date==false){
					$('.add-product form')[0].reset();
				}
				$('.mensaje').html(response.mensaje);
				$('.valor').html(response.total);
				$('.content-table').append(response.contenido);
				//alert(response.contenido);
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
	});/*end*/

	/*Ajax para actualizar datos del admin*/
	var Aadmin = $('.admin-data form').attr('action');
	var Madmin = $('.admin-data form').attr('method');

	$('.admin-data form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				/*preloader*/
				$('.loader-wrapper').removeClass("hide");
			},
			url: Aadmin,
			type: Madmin,
			dataType: "json",
			data: $('.admin-data form').serialize(),
			success: function(response){
				$('.mensaje').html(response.mensaje);
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
	/*end*/

	/*Ajax para cambiar contraseña del admin*/
	var pet = $('.change-passw form').attr('action');
	var met = $('.change-passw form').attr('method');

	$('.change-passw form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				/*preloader*/
				$('.loader-wrapper').removeClass("hide");
			},
			url: pet,
			type: met,
			dataType: "json",
			data: $('.change-passw form').serialize(),
			success: function(response){
				if(response.cambio == true){
					$('.change-passw form')[0].reset();
					$("#pwn").removeClass("error-ps");
					$("#pwr").removeClass("error-ps");
					$("#old").removeClass("error-ps");
				}
				else if(response.pwold == true){
					$("#old").addClass("error-ps").focus();
					$("#pwn").removeClass("error-ps");
					$("#pwr").removeClass("error-ps");
				}
				else if(response.pwnew == true){
					$("#pwn").addClass("error-ps");
					$("#pwr").addClass("error-ps").focus();
					$("#old").removeClass("error-ps");
				}
				$('.mensaje').html(response.mensaje);
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
	/*end*/
	/*Ajax para guardar datos del proveedor*/
	var Apri=$('.insert-pr form').attr('action');
	var Mpri=$('.insert-pr form').attr('method');

	$('.insert-pr form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				/*preloader*/
				$('.loader-wrapper').removeClass("hide");
			},
			url: Apri,
			type: Mpri,
			dataType: "json",
			data: $('.insert-pr form').serialize(),
			success: function(response){
				if(response.estado == true){
					$('.insert-pr form')[0].reset();
					$('.content-table').html(response.table);
					$('.loader-wrapper').addClass("hide");
				}
				$('.mensaje').html(response.mensaje);
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
	/*end*/

	/*Ajax para actualizar datos del proveedor*/
	var Aproa=$('.edit-pr form').attr('action');
	var Mproa=$('.edit-pr form').attr('method');

	$('.edit-pr form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			beforeSend: function(){
				/*preloader*/
			},
			url: Aproa,
			type: Mproa,
			dataType: "json",
			data: $('.edit-pr form').serialize(),
			success: function(response){
				if(response.aux == true){
					$('.content-table').html(response.res);
				}
				$('.mensaje').html(response.msg);
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
	/*end*/

//search date productos
	var Apros=$('.filtre form').attr('action');
	var Mpros=$('.filtre form').attr('method');

	$('.filtre form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url: Apros,
			type: Mpros,
			dataType: "json",
			data: $('.filtre form').serialize(),
			success: function(res){
				//alert(response.contenido);
				$('.content-table').html(res.cont);
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

//Eliminar un usuario
function delete_user(valor){
	$.ajax({
		beforeSend: function(){
			/*preloader*/
		},
		url: '../includes/delete.user.php',
		type: 'post',
		dataType: "json",
		data: "documento="+valor,
		success: function(response){
			$('.add-new').html(response.respuesta);
			$('.mensaje').html(response.mensaje);
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
}

//search data
function busca(value){
	//alert(value);
	$.ajax({
		url: "../includes/load.data.php",
		type: "POST",
		dataType: "json",
		data: "dd="+value,
		success: function(response){
			//alert(response.contenido);
			$('.content-table').html(response.contenido);
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
}

/*edit
Para tomar valor que del documento de un enlace.
Para mostrar datos sobre del usuario y editar estos*/
function _datos_user(){
	$(document).on("click", ".doc-user", function(){
		var doc = $(this).data('id');
		/*Metodo Ajax*/
		$.ajax({
			beforeSend: function(){
				/*preloader*/
				$('.loader-wrapper').removeClass("hide");
			},
			url: '../includes/load.data.php',
			type: 'post',
			dataType: "json",
			data: "_doc_user="+doc,
			success: function(response){
				$("#doc").val(response.documento);
				$("#documentoH").val(response.documento);
				$("#nombres").val(response.nombres);
				$("#apellidos").val(response.apellidos);
				$("#edad").val(response.edad);
				$("#celular").val(response.celular);
				$("#u").val(response.user);
				$("#userH").val(response.user);
				$("#estado").html(response.estado);

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
}
/*end*/

/*Proveedor*/
/*Para tomar valor que del nit de un enlace*/
$(document).on("click", ".nit-em", function(){
	var dl = $(this).data('id');
	$("#nit_pr").val(dl);
	$(".nit-delete").html(dl);
});
/*end*/

/*edit
Para tomar valor que del nit de un enlace.
Para mostrar datos sobre los proveedores y editar estos*/
function _datos_pr(){
	$(document).on("click", ".nit-em", function(){
		var nit = $(this).data('id');
		/*Metodo Ajax*/
		$.ajax({
			beforeSend: function(){
				/*preloader*/
				$('.loader-wrapper').removeClass("hide");
			},
			url: '../includes/load.data.php',
			type: 'post',
			dataType: "json",
			data: "nit_edi="+nit,
			success: function(response){
				$("#nit_up").val(response.nit);
				$("#nit_up_oc").val(response.nit);
				$("#empresa_up").val(response.empresa);
				$("#telefono_up").val(response.telefono);
				$("#direccion_up").val(response.direccion);
				$("#repa_up").val(response.nombre);
				$("#repap_up").val(response.apellido);
				$("#reptel_up").val(response.tel);
				$("#repmail_up").val(response.mail);
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
}
/*end*/
/*--------------------------------------------*/
/*Para tomar valor que del nit de un enlace
Para mostrar datos sobre los proveedores*/
$(document).on("click", ".nit-em", function(){
	var nit=$(this).data('id');
	
	$.ajax({
		beforeSend: function(){
			/*preloader*/
			$('.loader-wrapper').removeClass("hide");
		},
		url: '../includes/load.data.php',
		type: 'post',
		dataType: "json",
		data: "nit="+nit,
		success: function(response){
			$('.pr-rep').html(response.tableCon);
			$('.pr-pro').html(response.producto);
			$('.title-pr').html(response.nombre);
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
/*end*/

/*Para tooltip, titulos hover*/
$(function(){
	$("[data-toggle='tooltip']").tooltip();
});
/*end function*/

/*Ajax para eliminar*/
function delete_pr(valor){
	$.ajax({
		beforeSend: function(){
			/*preloader*/
		},
		url: '../includes/delete.pr.php',
		type: 'post',
		dataType: "json",
		data: "n="+valor,
		success: function(response){
			if(response.aux == true){
				$('.content-table').html(response.res);
			}
			$('.mensaje').html(response.msg);

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
}
/*end function*/

/*Usuarios*/
$(document).on("click", ".delete-user", function(){
	var documento=$(this).data('id');
	$(".modal-footer #dc").val(documento);
	$(".documento-delete").html(documento);
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