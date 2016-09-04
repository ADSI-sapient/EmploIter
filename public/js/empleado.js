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
		$.each(respuesta, function(j){
			var fila = "<tr><td>"+(cont += 1)+"</td><td>"+respuesta[j]["nombre"]
			+"</td><td style='text-align: center;'><button id='btnEditProf"+respuesta[j]["id_profesion"]+
			"' onclick='editarProfesion(this, "+respuesta[j]["id_profesion"]+");' class='btn btn-box-tool'><i style='font-size: 150%; color: green;' class='fa fa-pencil-square-o' arial-hidden='true'></i></button></td>  <td style='text-align: center;'><button onclick='borrarProfesion("+
			respuesta[j]["id_profesion"]+"); $(this).parent().parent().remove(); listSelectProf();' data-dismiss='alert' class='btn btn-box-tool'><i style='font-size: 150%; color: red;' class='fa fa-times' arial-hidden='true'></i></button></td><td style='text-align: center;'><button disabled='true' id='btnGuardarProf"+respuesta[j]["id_profesion"]+
			"' onclick='guardarCambiosProf(this, "+respuesta[j]["id_profesion"]+");' type='button' class='btn btn-box-tool'><i class='font-size: 150%; fa fa-check' arial-hidden='true'></i></button></td><td style='display: none;'>"+respuesta[j]["id_profesion"]+"</td></tr>";

			$("#tbody-profesion").append(fila);
		})
	}).fail(function(){

	});
}

function registrarProfesion(){
	$("#tableEmplMod").empty();
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
	var emp = $(empleado).parent().parent();
			var html = '<!DOCTYPE html>';
				html +=	'<html>';
				html +=		'<head>';
				html +=		    '<title>Ficha de riesgos</title>';
				html +=		'</head>';
				html +=		'<body id="bodyPdf">';

			html += "<div style='text-align: center;'><h3>Ficha de riesgos</h3></div><div style='font-size: 85%;'><p><strong>Nombre:</strong> "+$(emp).find("td").eq(0).html()+
			"  <br> <strong>Cargo:</strong> "+$(emp).find("td").eq(1).html()+
			"  <br> <strong>CC:</strong> "+$(emp).find("td").eq(3).html()+"</p></div>";
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: uri+'ctrProceso/consProcesos',
		data:{idcargo: idCargo}
	}).done(function(resp){
			var idProcAnt = 0;
			var cont = 0;

			for (j in resp) {

			var idProceso = resp[j]["id_proceso"];

			if (idProceso != idProcAnt) {
				html += '<div style="margin-top: 5%;">';
	            html +=	'<div style="font-size: 85%;" class="dataTable_wrapper">';
	            html +=    	'<table width="100%" style="border-collapse: collapse" class="table table-striped table-bordered table-hover">';

				html += '<thead><tr>';
	            html +=    '<th style="border: 1px solid" id="proceso" style="text-align: center;" colspan="18">Proceso: '+resp[j]["nobre"]+'</th>';
	            html += '</tr>';
	            html += '<tr>';
	            html +=     '<th style="border: 1px solid" id="tareas" colspan="18">Tareas: '+resp[j]["tareas"]+'</th>';
	            html += '</tr>';
	            html += '<tr>';
	            html +=     '<th style="border: 1px solid" id="rutina" colspan="5">Rutinaria: '+resp[j]["rutinaria"]+'</th>';
	            html +=     '<th style="border: 1px solid" id="zona" colspan="13">Zona: '+resp[j]["zona"]+'</th>';
	            html += '</tr>';
	            html += '<tr>';
	            html +=     '<th style="border: 1px solid" id="peligro" colspan="3">Peligro</th>';
	            html +=     '<th style="border: 1px solid"  id="eval_riesg" colspan="8">Evaluación de riesgo</th>';
	            html +=     '<th style="border: 1px solid" id="contrl_exist" colspan="3">Controles existentes</th>';
	            html +=     '<th style="border: 1px solid" id="criter_control" colspan="2">Criterios para establecer controles</th>';;
	            html +=     '<th style="border: 1px solid" id="med_interv" colspan="2">Medidas de intervención</th>';
	            html += '</tr>';
	            html += '<tr>';
	            html +=     '<th style="border: 1px solid" >Descripción</th>';
	            html +=     '<th style="border: 1px solid" >Clasificación</th>';
	            html +=     '<th style="border: 1px solid" >Efectos posibles</th>';
	            html +=     '<th style="border: 1px solid" >ND</th>';
	            html +=     '<th style="border: 1px solid" >NE</th>';
	            html +=     '<th style="border: 1px solid" >NP</th>';
	            html +=     '<th style="border: 1px solid" >Interp</th>';
	            html +=     '<th style="border: 1px solid" >NC</th>';
	            html +=     '<th style="border: 1px solid" >NR</th>';
	            html +=     '<th style="border: 1px solid" >Interp</th>';
	            html +=     '<th style="border: 1px solid" >Aceptabilidad del riesgo</th>';
	            html +=     '<th style="border: 1px solid" >Fuente</th>';
	            html +=     '<th style="border: 1px solid" >Medio</th>';
	            html +=     '<th style="border: 1px solid" >Individuo</th>';
	            html +=     '<th style="border: 1px solid" >Peor consecuencia</th>';
	            html +=     '<th style="border: 1px solid" >Requisito legal asociado</th>';
	            html +=     '<th style="border: 1px solid" >Control ingenieria</th>';
	            html +=     '<th style="border: 1px solid" >Señalización</th>';
	            html += '</tr>';
	            html +='</thead>';	

				html += '<tbody>';
				idProcAnt = idProceso;

				$(resp).each(function(i){
					if (resp[i]["id_proceso"] == idProceso) {
							cont += 1; 
						}
				});
			}

				html += "<tr><td style='border: 1px solid'>"+resp[j]["descripcion"]+"</td><td style='border: 1px solid'>"+resp[j]["clasificacion"]+"</td><td style='border: 1px solid'>"+resp[j]["efectos"]+"</td>";
				html += "<td style='border: 1px solid'>"+resp[j]["ND"]+"</td><td style='border: 1px solid'>"+resp[j]["NE"]+"</td><td style='border: 1px solid'>"+resp[j]["NP"]+"</td>";
				html += "<td style='border: 1px solid'>"+resp[j]["interp"]+"</td><td style='border: 1px solid'>"+resp[j]["NC"]+"</td><td style='border: 1px solid'>"+resp[j]["NR"]+"</td>";
				html += "<td style='border: 1px solid'>"+resp[j]["nivelRiesgo"]+"</td><td style='border: 1px solid'>"+resp[j]["valoracion"]+"</td><td style='border: 1px solid'>"+resp[j]["fuente"]+"</td>";
				html += "<td style='border: 1px solid'>"+resp[j]["medio"]+"</td><td style='border: 1px solid'>"+resp[j]["individuo"]+"</td><td style='border: 1px solid'>"+resp[j]["peorConsecuencia"]+"</td>";
				html += "<td style='border: 1px solid'>"+resp[j]["requisitoLegal"]+"</td><td style='border: 1px solid'>"+resp[j]["ctrIngenieria"]+"</td><td style='border: 1px solid'>"+resp[j]["descripcion"]+"</td></tr>";


				if (j == (cont - 1)) {
					html += '</tbody>';
					html += '</table>';
				    html +=	'</div>';
					html +='</div>';
				}
			}
				html += '</body></html>';

				$.ajax({
					type:'POST',
					url: uri+'ctrEmpleado/generarFactura',
					data:{contenido: html}
				}).done(function(rsp){
					location.href = uri+"ctrEmpleado/generarFactura"; 
				}).fail(function(){
					alert("Error");
				});
	});
}

function generarPdf(){
	$.ajax({
		url: uri+'ctrEmpleado/generarFactura'
	}).done(function(respuesta){
		location.href = uri+"ctrEmpleado/generarFactura"; 
	});
}



function incaEmpl(emp){
	var empleado = $(emp).parent().parent();
	var cedula = $(empleado).find("td").eq(3).html();
	$("#nomEmpInca").text($(empleado).find("td").eq(4).html());

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: uri+'ctrIncapacidad/consIncapacidades',
		data: {cedula: cedula}
	}).done(function(incapacidades){
		$("#tbodyIncEmp").empty();
		var tr = "";
		if (incapacidades == false) {
			tr = '<tr><td colspan="7">No hay incapacidades asociadas al empleado</td></tr>';
		}
		else{
			var cont = 0;
			$(incapacidades).each(function(i){
				console.log();
				tr += '<tr><td>'+(cont+=1)+
				'</td><td style="display: none;">'+incapacidades[i]["des"]+
				'</td><td style="display: none;">'+incapacidades[i]["id_enfermedad"]+
				'</td><td style="display: none;">'+incapacidades[i]["id_accidente"]+
				'</td><td>'+incapacidades[i]["razonIncapacidad"]+
				'</td><td>'+incapacidades[i]["fechaInicio"]+
				'</td><td>'+incapacidades[i]["fechaFin"]+
				'</td><td>'+incapacidades[i]["diasIncapacidad"]+
				'</td><td>'+incapacidades[i]["valorIncapacidad"]+
				'</td><td style="text-align: center;"><button onclick="detalleIncapacidad(this)" class="btn btn-box-tool"><i style="color: blue; font-size: 150%;" class="fa fa-eye"></i></button></td></tr>';
			});
		}
		$("#tbodyIncEmp").append(tr);
	});
}

function detalleIncapacidad(inc){
	var incapacidad = $(inc).parent().parent();
	$("#descIncap").val($(incapacidad).find("td").eq(1).html());

	var idEnfermedad = $(incapacidad).find("td").eq(2).html();
	var idAccidente = $(incapacidad).find("td").eq(3).html();

	if (idAccidente != "null") {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: uri+'ctrIncapacidad/consAccidente',
			data: {idAccidente: idAccidente}
		}).done(function(res){
			$("#accInca").val(res["causa"]);
			$("#enfInca").val("");
		});
	}else{
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: uri+'ctrIncapacidad/consEnfermedad',
			data: {idEnfermedad: idEnfermedad}
		}).done(function(res){
			$("#enfInca").val("Grupo: " + res["grupo"]);
			$("#accInca").val("");
		});
	}
}

function limpForm(){
	$("#accInca").val("");
	$("#enfInca").val("");
	$("#descIncap").val("");
}

function borrarEmpleado(cedEmpleado){
	$.ajax({
		type: 'POST',
		url: uri+'ctrEmpleado/borrarEmpleado',
		data: {documento: cedEmpleado}
	}).done(function(){
		location.href = uri + 'ctrEmpleado/listarEmpleados';
	});
}

function modEmpleado(emp, idCargo, idProfesion){
	var empleado = $(emp).parent().parent();
	$("#cedEmpMod").val($(empleado).find("td").eq(3).html());
	$("#nomEmpEdit").val($(empleado).find("td").eq(0).html());
	$("#apeEmpEdit").val($(empleado).find("td").eq(1).html());
	$("#selProEmpEdit").val(idProfesion);
	$("#selCarEmpEdit").val(idCargo);
	$("#telEmpEdit").val($(empleado).find("td").eq(13).html());
	$("#dirEmpEdit").val($(empleado).find("td").eq(14).html());
}


