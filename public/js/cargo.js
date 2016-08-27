$(window).load(function(){
	cargarRegCargo();
});

function cargarRegCargo(){
	$("#espacioParaCargo").empty();
	$("#espacioParaCargo").append($("#regCargo").html());
}


function asociarProceso(procesos){
	var proces = $(procesos).parent().parent();
	var boton = "<button type='button' class='btn btn-box-tool' onclick='$(this).parent().parent().remove(); cargMod(this);'><i style='color: red;' class='fa fa-times'></i></button>"
	$(proces).find("td").eq(4).html(boton);

	$("#di").removeAttr("style");
	$("#tbody-cargo").append(proces);


	$("#spanRed").css("display", "none");
	$("#btnRegCargo").css("display", "");
}

function cargMod(procesos){
	var proces = $(procesos).parent().parent();
	var boton = "<button id='' type='button' class='btn btn-box-tool' onclick='asociarProceso(this)'><i class='fa fa-plus'></i></button>";
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
