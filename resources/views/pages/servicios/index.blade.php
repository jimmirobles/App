@extends('layouts.principal')

@section('page-title', 'Servicios')

@section('title', 'Listado de servicios')

@section('content')
    <div class="row">
    	<div class="col-lg-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				Servicios
    				<a href="{{ route('servicios.create') }}" class="btn btn-info btn-xs pull-right">Nuevo</a>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-striped table-bordered table-hover">
    						<thead>
    							<tr>
    								<th>#</th>
    								<th>Nombre</th>
                                    <th>Acción</th>
    							</tr>
    						</thead>
    						<tbody>
                                @foreach($servicios as $servicio)
                                <tr>
                                    <td>{{ $servicio->id }}</td>
                                    <td>{{ $servicio->nombre }}</td>
                                    <td>
                                        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-default btn-xs">Editar</a>
                                        <a href="{{ route('servicios.destroy', $servicio->id) }}" onclick="return confirm('¿Deseas eliminarlo?')" class="btn btn-danger btn-xs">Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach
    						</tbody>
    					</table>
    				</div>
                    {{ $servicios->links() }}
    			</div>
    		</div>
    	</div>
    </div>
    <!-- /.row -->
@endsection