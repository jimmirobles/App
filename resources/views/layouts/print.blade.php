<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Servicio: @yield('t-folio')</title>
	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
    	#wrapper{
    		border: .5px solid #CCC;
    		height: 1120px;
			margin: 0 auto; 
			overflow: hidden;
			padding: 35px 47px;
    		width: 950px;
    	}
    </style>
</head>
<body>
	<div id="wrapper">
		@yield('contenido')
	</div>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>