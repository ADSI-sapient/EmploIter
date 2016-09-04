$(window).load(function(){
	cargarRegCargo();
});

function cargarRegCargo(){
	$("#listCargo").css("display", "none");
	$("#espacioParaCargo").empty();
	$("#espacioParaCargo").append($("#regCargo").html());
}

function cargarListCargos(){
	$("#regCargo").css("display", "none");
	$("#espacioParaCargo").empty();
	$("#espacioParaCargo").append($("#listCargo").html());
}


function asociarProceso(procesos){
	var proces = $(procesos).parent().parent();
	var boton = "<button type='button' class='btn btn-box-tool' onclick='$(this).parent().parent().remove(); cargMod(this);'><i style='font-size: 150%; color: red;' class='fa fa-times'></i></button>"
	$(proces).find("td").eq(4).html(boton);

	$("#di").css("display", "");
	$("#tbody-cargo").append(proces);


	$("#spanRed").css("display", "none");
	$("#btnRegCargo").css("display", "");
}

function cargMod(procesos){
	var proces = $(procesos).parent().parent();
	var boton = "<button id='' type='button' class='btn btn-box-tool' onclick='asociarProceso(this)'><i style='color: blue;' class='fa fa-plus'></i></button>";
	$(proces).find("td").eq(4).html(boton);
	$("#tbody-modProces").append(proces);
}

function arrayProces(){
	var array = [];
	$("#tbody-cargo tr").each(function(){
		array.unshift([$(this).find("td").eq(0).html()]);
	});

	$("#inpProces").val(array);
}

function seleRiesgo(option){
  var idRiesgo = $(option).val();
  $.ajax({
  	dataType: 'json',
  	type: 'POST',
  	url: uri+'ctrCargo/consRiesgo',
  	data: {idRiesgo: idRiesgo}
  }).done(function (resp){
  	$("#inpTarifa").val(resp["tarifa"]);
  	$("#textAct").val(resp["actividades"]);
  })
}

function enviar(){
	var elemTabla = $("#tbody-cargo tr").size();
	if (elemTabla <= 0) {
		alert("deben haber elementos en la tabla");
			return false;
	}else{
		return true;
	}
}

function borrarCargo(idCargo){
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url: uri+'ctrCargo/borrarCargo',
		data: {id_cargo: idCargo}
	}).done(function(resp){
		location.href = uri+'ctrCargo/registrarCargo';
	}).fail(function(){
		alert("No se puede borrar un empleado tiene asociado este cargo");
	});
}
	

