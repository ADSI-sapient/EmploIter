$(window).load(function(){
	listSelectProf();
});


function borrarProfesion(idProf){
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url: uri+"ctrEmpleado/borrarProfesion",
		data: {idProf: idProf}
	}).done(function(respuesta){
		alert(respuesta);
	}).fail(function(){
	});
}

function editarProfesion(profesion, id){
		var fila = $(profesion).parent().parent();
		$("#btnEditProf"+id).attr("disabled", true);
		var value = "<input type='text' id='inpProf"+id+"' style='border-radius:5px;' class='form-control' value='"+ $(fila).find("td").eq(1).html() +"' >";
		$(fila).find("td").eq(1).html(value);
		$("#btnGuardarProf"+id).find("i").css("color", "blue");
		$("#btnGuardarProf"+id).attr("disabled", false);

		$("#tbody-profesion tr").each(function(){
			if ($(fila).find("td").eq(0).html() != $(this).find("td").eq(0).html()) {
				if ($(this).find("td").eq(1).text() == "") {
					var idBoton = $(this).find("td").eq(5).html();
					var val = $(this).find("td").eq(1).html();
					$(this).find("td").eq(1).html($(val).val());
					$("#btnEditProf"+idBoton).attr("disabled", false);
					$("#btnGuardarProf"+idBoton).find("i").css("color", "grey");
					$("#btnGuardarProf"+idBoton).attr("disabled", true);
				}
			}
		});
}

function guardarCambiosProf(profesion, id){
	var fila = $(profesion).parent().parent();
	var nomProf = $("#inpProf"+id).val();
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: uri+"ctrEmpleado/modificarProfesion",
		data:{nomProf: nomProf, idProf: id}
	}).done(function(respuesta){
		if (respuesta) {
			// $(fila).find("td").eq(1).html($("#inpProf"+id).val());
			// $("#btnGuardarProf"+id).attr("disabled", true);
			// $("#btnEditProf"+id).attr("disabled", false);
			// $("#btnGuardarProf"+id).find("i").css("color", "grey");
			listTableProf();
			listSelectProf();
		}
	}).fail(function(){

	});
}

function listSelectProf(){
	$('#SelectProfesion').empty();
	$.ajax({
		dataType: 'json',
		url: uri+"ctrEmpleado/listProfesiones"
	}).done(function(respuesta){
		if (respuesta) {
			var option1 = '<option selected=""></option>';
			$('#SelectProfesion').append(option1);
			$.each(respuesta, function(i){
				option = '<option value="'+respuesta[i]["id_profesion"]+'">'+respuesta[i]["nombre"]+'</option> ';
				$('#SelectProfesion').append(option);
			});
		}
	})
}

function listTableProf(){
	$('#tbody-profesion').empty();
	$.ajax({
		dataType: 'json',
		url: uri+"ctrEmpleado/listProfesiones"
	}).done(function(respuesta){
		var cont = 0;
		$.each(respuesta, function(i){
			var fila = "<tr><td>"+(cont += 1)+"</td><td>"+respuesta[i]["nombre"]
			+"</td><td style='text-align: center;'><button id='btnEditProf"+respuesta[i]["id_profesion"]+
			"' onclick='editarProfesion(this, "+respuesta[i]["id_profesion"]+");' class='btn btn-box-tool'><i style='font-size: 150%; color: green;' class='fa fa-pencil-square-o' arial-hidden='true'></i></button></td>  <td style='text-align: center;'><button onclick='borrarProfesion("+
			respuesta[i]["id_profesion"]+"); $(this).parent().parent().remove(); listSelectProf();' data-dismiss='alert' class='btn btn-box-tool'><i style='font-size: 150%; color: red;' class='fa fa-times' arial-hidden='true'></i></button></td><td style='text-align: center;'><button disabled='true' id='btnGuardarProf"+respuesta[i]["id_profesion"]+
			"' onclick='guardarCambiosProf(this, "+respuesta[i]["id_profesion"]+");' type='button' class='btn btn-box-tool'><i class='font-size: 150%; fa fa-check' arial-hidden='true'></i></button></td><td style='display: none;'>"+respuesta[i]["id_profesion"]+"</td></tr>";

			$("#tbody-profesion").append(fila);
		})
	}).fail(function(){

	});
}

function registrarProfesion(){
	var profesion = $("#txtProfesion").val();
	$.ajax({
		type: 'POST',
		dataType: 'json',
		data: {txtProfesion: profesion},
		url: uri+'ctrEmpleado/regProfesion'
	}).done(function(respuesta){
		if (respuesta) {
			listTableProf();
			$("#txtProfesion").val("");
			listSelectProf();
		}
	});
}


function consFichaRies(empleado, idCargo){
	console.log(idCargo);
	$("#titleMod").empty();
	var emp = $(empleado).parent().parent();
	var tituloModal = "<p><strong>Nombre:</strong> "+$(emp).find("td").eq(0).html()+
	"  <br> <strong>Cargo:</strong> "+$(emp).find("td").eq(1).html()+
	"  <br> <strong>CC:</strong> "+$(emp).find("td").eq(3).html()+"</p>";

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: uri+'ctrProceso/listarProcesos',
		data:{idcargo: idCargo}
	}).done(function(resp){
		console.log(resp);
		if (resp) {
			arrayProcesos = resp;
			$("#proceso").html("Proceso: "+arrayProcesos[0]["nobre"]);
			$("#tareas").html("Tareas: "+arrayProcesos[0]["tareas"]);
			$("#rutina").html("Rutinaria: "+arrayProcesos[0]["rutinaria"]);
			$("#zona").html("Zona: "+arrayProcesos[0]["zona"]);

			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: uri+'ctrPeligro/consPeligros',
				data:{id_proceso: arrayProcesos[0]["id_proceso"]}
			}).done(function(respuesta){


			});
		}
	});


	$("#titleMod").append(tituloModal);
}

