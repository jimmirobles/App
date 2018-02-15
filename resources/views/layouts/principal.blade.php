<!DOCTYPE html>
<html lang="es">
<head>

	@include('includes.head')

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

	<div id="wrapper">
		<!-- Navigation -->
		@include('includes.menu')

		<!-- Page Content -->
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
					<h1 class="h2">@yield('wrapper-title')</h1>
					@yield('title-buttons')
				</div>
				@include('flash::message')
				@yield('content')
				<hr>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © Human Business 2018</small>
			</div>
		  </div>
		</footer>    
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
		  <i class="fa fa-angle-up"></i>
		</a>
	</div>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
	<!-- /#wrapper -->
@include('includes.scripts')
@yield('custom_scripts')
</body>
</html>
