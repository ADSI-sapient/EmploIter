function borrarPeligro(idPeligro){
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url: uri+'ctrPeligro/borrarPeligro',
		data: {idPeligro: idPeligro}
	}).done(function(resp){
		location.href = uri+'ctrPeligro/listarPeligros';
	}).fail(function(){
		alert("Hay procesos asociados a este peligro");
	});
}