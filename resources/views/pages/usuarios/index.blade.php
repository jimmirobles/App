@extends('layouts.principal')

@section('page-title', 'Usuarios')

@section('wrapper-title')
	<i class="fa fa-users"></i> Usuarios
@endsection

@section('title-buttons')
	<div class="pull-right">
		<div class="btn-group btn-group-sm" role="group" aria-label="Botones de acciones de tabla">
			<a role="button" href="{{ route('usuarios.create') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil fa-fw"></i> Nuevo</a>
			<div class="btn-group btn-group-sm" role="group">
				<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
				<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					<a class="dropdown-item" href="#">Descargar .XLS</a>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('content')
	<div class="table-responsive">
		<table class="table table-bordered table-sm">
			<thead class="thead-light">
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th class="text-center"><i class="fa fa-cog fa-lg"></i></th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->name }}</td>
					<td>{{ $usuario->email }}</td>
					<td>
						<div class="btn-group" role="group">
							<a role="button" href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info btn-sm">
								<i class="fa fa-pencil"></i> Editar
							</a>
							<a role="button" href="{{ route('usuarios.destroy', $usuario->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminarlo?')"><i class="fa fa-trash"></i></a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{{ $usuarios->links() }}
@endsection