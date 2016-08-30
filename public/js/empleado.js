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
	$("#titleMod").empty();
	var emp = $(empleado).parent().parent();
	var tituloModal = "<p><strong>Nombre:</strong> "+$(emp).find("td").eq(0).html()+
	"  <br> <strong>Cargo:</strong> "+$(emp).find("td").eq(1).html()+
	"  <br> <strong>CC:</strong> "+$(emp).find("td").eq(3).html()+"</p>";
	$("#titleMod").append(tituloModal);

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: uri+'ctrProceso/listarProcesos',
		data:{idcargo: idCargo}
	}).done(function(resp){
		if (resp) {
			var iterador = "";
			for (j in resp) {
			
			$("#proceso").html("Proceso: "+resp[j]["nobre"]);
			$("#tareas").html("Tareas: "+resp[j]["tareas"]);
			$("#rutina").html("Rutinaria: "+resp[j]["rutinaria"]);
			$("#zona").html("Zona: "+resp[j]["zona"]);

			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: uri+'ctrPeligro/consPeligros',
				data:{id_proceso: resp[j]["id_proceso"]}
			}).done(function(respuesta){

				var tr = "";
				for (i in respuesta) {

					tr += "<tr><td>"+respuesta[i]["descripcion"]+"</td><td>"+respuesta[i]["clasificacion"]+"</td><td>"+respuesta[i]["efectos"]+"</td>"
					tr += "<td>"+respuesta[i]["ND"]+"</td><td>"+respuesta[i]["NE"]+"</td><td>"+respuesta[i]["NP"]+"</td>"
					tr += "<td>"+respuesta[i]["interp"]+"</td><td>"+respuesta[i]["NC"]+"</td><td>"+respuesta[i]["NR"]+"</td>"
					tr += "<td>"+respuesta[i]["nivelRiesgo"]+"</td><td>"+respuesta[i]["valoracion"]+"</td><td>"+respuesta[i]["fuente"]+"</td>"
					tr += "<td>"+respuesta[i]["medio"]+"</td><td>"+respuesta[i]["individuo"]+"</td><td>"+respuesta[i]["peorConsecuencia"]+"</td>"
					tr += "<td>"+respuesta[i]["requisitoLegal"]+"</td><td>"+respuesta[i]["ctrIngenieria"]+"</td><td>"+respuesta[i]["descripcion"]+"</td></tr>";
				}
				
				iterador++;
				console.log(iterador);
				$("#tableEmpOculta").prop("id", "tableEmpOculta"+iterador);
				$("#tbodyTableEmp").prop("id", "tbodyTableEmp"+iterador);
				$("#tbodyTableEmp"+iterador).append(tr);
				
			});
				$("#tableEmplMod").append($("#tableEmpOculta"+iterador).html());
	  			$("#tableEmpOculta").css("display", "");
		}
	  }
	});
	
}

// $("#tableEmplMod").append($("#tableEmpOculta").html());
// $("#tableEmpOculta").removeAttr("style");

