	<div class="row">
		<div class="col-xl-4 mb-4">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-file-pdf-o"></i>
					</div>
					<div class="mr-5">{{ $c_doctos }} Servicios totales!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('documentos.create') }}">
					<span class="float-left">Crear servicio</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-4 mb-4">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-user-circle-o"></i>
					</div>
					<div class="mr-5">{{ $c_clientes }} Clientes totales</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('clientes.index') }}">
					<span class="float-left">Ir a clientes</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-4 mb-4">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-comments"></i>
					</div>
					<div class="mr-5">{{ $c_comments }} Comentarios totales</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('comentarios.index') }}">
					<span class="float-left">Ver listado</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
	</div>