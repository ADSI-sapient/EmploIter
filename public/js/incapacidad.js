var salario = 0;

$(function(){
  $('.fecha').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    language: 'es'
  });
});

$(".sel").select2({});


$("#tipoInc").on("change", function(){
	if ($("#tipoInc").val() == "Accidente de trabajo") {
		$("#claseAccident").prop("required", true);
		$("#claseAccident").removeAttr("disabled");
		$("#grupEnf").select2("val", "");
		$("#grupEnf").attr("disabled", true);
	} else if ($("#tipoInc").val() == "Enfermedad laboral") {
		$("#grupEnf").prop("required", true);
		$("#grupEnf").removeAttr("disabled");
		$("#claseAccident").select2("val", "");
		$("#claseAccident").attr("disabled", true);
	} else{
		$("#grupEnf").select2("val", "");
		$("#claseAccident").select2("val", "");
		$("#claseAccident").attr("disabled", true);
		$("#grupEnf").attr("disabled", true);
	}
});


$("#grupEnf").on("change", function(){
	var idEnfermedad = $("#grupEnf").val();
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url: uri+'ctrIncapacidad/consEnfermedad',
		data: {idEnfermedad: idEnfermedad}
	}).done(function(enfermedad){
		$("#descGrupEnf").val(enfermedad["descripcion"]);
	}).fail(function(){
		console.log("error");
	});
});


function selectEmpl(){
	var cedEmp = $("#selEmp").val();
	if (cedEmp != ""){
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: uri+"ctrIncapacidad/consEmpleado",
			data: {cedEmp: cedEmp}
		}).done(function(emp){
			salario = emp["salario"];
			calcValorIncapacidad();
		});		
	}else{
		salario = 0;
		calcValorIncapacidad();
	}

}

$("#diasInc").on("keyup change", function(){
	calcValorIncapacidad();
});

function calcValorIncapacidad(){
	var salDiario = parseInt(salario/30);
	$("#valInc").val(salDiario * $("#diasInc").val());
}


$("#claseAccident").on("change", function(){
	var idAccidente = $("#claseAccident").val();
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: uri+'ctrIncapacidad/consAccidente',
		data: {idAccidente: idAccidente}
	}).done(function(accidente){
		$("#descGrupEnf").val(accidente["descripcion"]);
	});
});


function asigRegInc(){
	$("#regIncap").removeAttr("style");
	$("#lisIncapacidades").css("display", "none");
}

function asigLisInc(){
	$("#lisIncapacidades").removeAttr("style");
	$("#regIncap").css("display", "none");
}


function consIncap(inc){
	var incapacidad = $(inc).parent().parent();
	$("#descInc").val($(incapacidad).find("td").eq(0).html());

	var idEnfermedad = $(incapacidad).find("td").eq(1).html();
	var idAccidente = $(incapacidad).find("td").eq(2).html();

	if (idAccidente) {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: uri+'ctrIncapacidad/consAccidente',
			data: {idAccidente: idAccidente}
		}).done(function(res){
			$("#accInca2").val(res["causa"]);
			$("#enfInca2").val("");
		});
	}else{
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: uri+'ctrIncapacidad/consEnfermedad',
			data: {idEnfermedad: idEnfermedad}
		}).done(function(res){
			$("#enfInca2").val("Grupo: " + res["grupo"]);
			$("#accInca2").val("");
		});
	}
}


function detalleIncapacidad(inc){
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