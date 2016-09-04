$(window).load(function(){
	listSelectZona();
});

function listSelectZona(){
	$('#selectZona').empty();
	$.ajax({
		dataType: 'json',
		url: uri+"ctrProceso/listZona"
	}).done(function(respuesta){
		if (respuesta) {
			var option1 = '<option selected=""></option>';
			$('#selectZona').append(option1);
			$.each(respuesta, function(i){
				option = '<option value="'+respuesta[i]["id_zona"]+'">'+respuesta[i]["nombre"]+'</option> ';
				$('#selectZona').append(option);
			});
		}
	})
}

function listTableZona(){
	$('#tbody-zona').empty();
	$.ajax({
		dataType: 'json',
		url: uri+"ctrProceso/listZona"
	}).done(function(respuesta){
		var cont = 0;
		$.each(respuesta, function(i){
			var fila = "<tr><td>"+(cont += 1)+"</td><td>"+respuesta[i]["nombre"]
			+"</td><td style='text-align: center;'><button id='btnEditZona"+respuesta[i]["id_zona"]+
			"' onclick='editarZona(this, "+respuesta[i]["id_zona"]+");' class='btn btn-box-tool'><i style='font-size: 150%; color: green;' class='fa fa-pencil-square-o' arial-hidden='true'></i></button></td>  <td style='text-align: center;'><button onclick='borrarZona("+
			respuesta[i]["id_zona"]+"); $(this).parent().parent().remove(); listSelectZona();' data-dismiss='alert' class='btn btn-box-tool'><i style='font-size: 150%; color: red;' class='fa fa-times' arial-hidden='true'></i></button></td><td style='text-align: center;'><button disabled='true' id='btnGuardarZona"+respuesta[i]["id_zona"]+
			"' onclick='guardarCambiosZona(this, "+respuesta[i]["id_zona"]+");' type='button' class='btn btn-box-tool'><i class='font-size: 150%; fa fa-check' arial-hidden='true'></i></button></td><td style='display: none;'>"+respuesta[i]["id_zona"]+"</td></tr>";

			$("#tbody-zona").append(fila);
		})
	}).fail(function(){

	});
}

function borrarZona(idZona){
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url: uri+"ctrProceso/borrarZona",
		data: {idZona: idZona}
	}).done(function(respuesta){
		alert(respuesta);
	}).fail(function(){
	});
}


function editarZona(zona, id){
		var fila = $(zona).parent().parent();
		$("#btnEditZona"+id).attr("disabled", true);
		var value = "<input type='text' id='inpZona"+id+"' style='border-radius:5px;' class='form-control' value='"+ $(fila).find("td").eq(1).html() +"' >";
		$(fila).find("td").eq(1).html(value);
		$("#btnGuardarZona"+id).find("i").css("color", "blue");
		$("#btnGuardarZona"+id).attr("disabled", false);

		$("#tbody-zona tr").each(function(){
			if ($(fila).find("td").eq(0).html() != $(this).find("td").eq(0).html()) {
				if ($(this).find("td").eq(1).text() == "") {
					var idBoton = $(this).find("td").eq(5).html();
					var val = $(this).find("td").eq(1).html();
					$(this).find("td").eq(1).html($(val).val());
					$("#btnEditZona"+idBoton).attr("disabled", false);
					$("#btnGuardarZona"+idBoton).find("i").css("color", "grey");
					$("#btnGuardarZona"+idBoton).attr("disabled", true);
				}
			}
		});
}


function guardarCambiosZona(zona, id){
	var fila = $(zona).parent().parent();
	var nomZona = $("#inpZona"+id).val();
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: uri+"ctrProceso/modificarZona",
		data:{nomZona: nomZona, idZona: id}
	}).done(function(respuesta){
		if (respuesta) {
			listTableZona();
			listSelectZona();
		}
	}).fail(function(){

	});
}

function registrarZona(){
	var zona = $("#txtZona").val();
	$.ajax({
		type: 'POST',
		dataType: 'json',
		data: {nomZona: zona},
		url: uri+'ctrProceso/regZona'
	}).done(function(respuesta){
		if (respuesta) {
			listTableZona();
			$("#txtZona").val("");
			listSelectZona();
		}
	});
}


function asociarPeligro(peligros){
	var peligro = $(peligros).parent().parent();
	var boton = "<button type='button' class='btn btn-box-tool' onclick='$(this).parent().parent().remove(); cargMod2(this);'><i style='color: red; font-size: 150%;' class='fa fa-times'></i></button>"
	$(peligro).find("td").eq(5).html(boton);

	$("#tableOcultaProces").css("display", "");
	$("#tbody-proceso").append(peligro);

	$("#btnRegCargo").css("display", "");
}


function cargMod2(peligros){
	var peligro = $(peligros).parent().parent();
	var boton = "<button id='' type='button' class='btn btn-box-tool' onclick='asociarPeligro(this)'><i style='color: blue;' class='fa fa-plus'></i></button>";
	$(peligro).find("td").eq(5).html(boton);
	$("#tbody-modPeligro").append(peligro);
}

function arrayPeligro(){
	var array = [];
	$("#tbody-proceso tr").each(function(){
		array.unshift([$(this).find("td").eq(0).html()]);
	});

	$("#inpPeligro").val(array);
	$("#inpText").val($("#textAreaProc").val());
}

function enviarProc(){
	var cantFilas = $("#tbody-proceso tr").size();
	if (cantFilas <= 0) {
		alert("Debe asociar peligros al proceso");
		return false;
	}else{
		return true;
	}
}


function agreRegProc(){
	$("#regProc").removeAttr("style");
	$("#lisProc").css("display", "none");
}

function agreLisProc(){
	$("#lisProc").removeAttr("style");
	$("#regProc").css("display", "none");
}

function borrarProceso(idProceso){
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url: uri+'ctrProceso/borrarProceso',
		data: {id_proceso: idProceso}
	}).done(function(resp){
		location.href = uri+'ctrProceso/registrarProceso';
	}).fail(function(){
		alert("Hay cargos asociados al proceso");
	});
}


