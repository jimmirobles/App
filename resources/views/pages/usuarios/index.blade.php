@extends('layouts.principal')

@section('page-title', 'Usuarios')

@section('title', 'Listado de usuarios')

@section('content')
    <div class="row">
    	<div class="col-lg-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				Asesores
    				<a href="{{ route('usuarios.create') }}" class="btn btn-default btn-xs pull-right">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
                    </a>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-striped table-bordered table-hover">
    						<thead>
    							<tr>
    								<th>ID</th>
    								<th>Nombre</th>
                                    <th>Correo</th>
                                    <th class="col-lg-2">Acción</th>
    							</tr>
    						</thead>
    						<tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                                        </a>
                                        <a href="{{ route('usuarios.destroy', $usuario->id) }}" onclick="return confirm('¿Deseas eliminarlo?')" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
    						</tbody>
    					</table>
    				</div>
                    {{ $usuarios->links() }}
    			</div>
    		</div>
    	</div>
    </div>
    <!-- /.row -->
@endsection