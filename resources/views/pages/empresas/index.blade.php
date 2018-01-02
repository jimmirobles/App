@extends('layouts.principal')

@section('page-title', 'Empresas')

@section('title', 'Listado de empresas')

@section('content')
    <div class="row">
    	<div class="col-lg-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				Empresas
    				<a href="{{ route('empresas.create') }}" class="btn btn-info btn-xs pull-right">Nuevo</a>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-striped table-bordered table-hover">
    						<thead>
    							<tr>
    								<th>#</th>
    								<th>Nombre</th>
                                    <th>RFC</th>
                                    <th>Acción</th>
    							</tr>
    						</thead>
    						<tbody>
                                @foreach($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>
                                    <td>{{ $empresa->razon_social }}</td>
                                    <td>{{ $empresa->rfc }}</td>
                                    <td>
                                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-default btn-xs">Editar</a>
                                        <a href="{{ route('empresas.destroy', $empresa->id) }}" onclick="return confirm('¿Deseas eliminarlo?')" class="btn btn-danger btn-xs">Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach
    						</tbody>
    					</table>
    				</div>
                    {{ $empresas->links() }}
    			</div>
    		</div>
    	</div>
    </div>
    <!-- /.row -->
@endsection