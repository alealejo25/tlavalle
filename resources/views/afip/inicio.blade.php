<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>afip</title>
</head>
<body>
{!!Form::open(array('url'=>'afip/prueba','method'=>'get','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!} 
	<input type="text" name="cuit" id="cuit">
	<input type="submit" name="afip">
{!!Form::close()!!}
</form>

</body>
</html>