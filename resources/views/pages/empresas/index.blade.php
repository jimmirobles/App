@extends('layouts.principal')

@section('page-title', 'Empresas')

@section('title', 'Listado de empresas')

@section('content')
    <div class="row">
    	<div class="col-lg-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				Empresas
    				<a href="{{ route('empresas.create') }}" class="btn btn-default btn-xs pull-right">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
                    </a>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-striped table-bordered table-hover">
    						<thead>
    							<tr>
    								<th>#</th>
    								<th>Nombre</th>
                                    <th>RFC</th>
                                    <th class="col-lg-2">Acción</th>
    							</tr>
    						</thead>
    						<tbody>
                                @foreach($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>
                                    <td>{{ $empresa->razon_social }}</td>
                                    <td>{{ $empresa->rfc }}</td>
                                    <td>
                                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-default btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                                        </a>
                                        <a href="{{ route('empresas.destroy', $empresa->id) }}" onclick="return confirm('¿Deseas eliminarlo?')" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar
                                        </a>
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