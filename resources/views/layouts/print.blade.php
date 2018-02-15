<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Servicio: @yield('t-folio')</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom Fonts -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
    	body { padding-top: 55px; }
    	#wrapper{
    		border: .5px solid #CCC;
			margin: 0 auto; 
			overflow: hidden;
			padding: 35px 47px;
    		width: 950px;
    	}
    </style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">
	        <img alt="Brand" src="{{ asset('img/logo-512x512.png') }}" width="25px">
	      </a>
	    </div>
	    <p class="navbar-text">Vista general del servicio.</p>
	    <button type="button" class="btn btn-primary navbar-btn pull-right" data-toggle="modal" data-target="#firmaModal">Dejar un comentario del servicio</button>
	  </div>
	</nav>
	<div id="wrapper">
		@yield('contenido')
	</div>
	@include('modals.comentario')
	<!-- Bootstrap Core JavaScript -->
    @include('includes.scripts')
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    @include('alertify::alertify')
</body>
</html>