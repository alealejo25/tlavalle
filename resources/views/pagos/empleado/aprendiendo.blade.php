@extends('layouts.admin')
@section('contenido')


<script>
$(function(){


	$("#btn").on("click",function(){
		var _nombre=$("#nombre").val();
		var _apellido=$("#apellido").val();
		$.post("datos_post.php",{nombre: _nombre, apellido: _apellido}, function(datos){
			$("#contenido").html(datos);
		});
	});
});	


</script>
<div id="texto"></div>
<form method="post">
	<input type="text" name="nombre" id="nombre">
	<input type="text" name="apellido" id="apellido">
	<button type="button" id="btn">enviar</button>
</form>

@endsection
