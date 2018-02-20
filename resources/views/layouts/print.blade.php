<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jimmi Robles">
	<title>Servicio: @yield('t-folio')</title>
	<!-- Bootstrap Core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		#wrapper{
			border: .5px solid #CCC;
			margin: 0 auto; 
			overflow: hidden;
			padding: 35px 47px;
			width: 75%;
		}
		@media only screen 
		and (min-device-width : 375px) 
		and (max-device-width : 667px) {
			#wrapper{
				width: 100%;
				padding: 2px;
			}
			.media-logo{
				text-align: center;
			}
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
			<img src="{{ asset('img/logo-512x512.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
			Human Business
		</a>
		<button type="button" class="btn btn-primary navbar-btn pull-right" data-toggle="modal" data-target="#firmaModal">Dejar un comentario...</button>
	</nav>
	<div id="wrapper">
		@yield('contenido')
	</div>
	@include('modals.comentario')
	<!-- Bootstrap Core JavaScript -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
	@include('alertify::alertify')
</body>
</html>