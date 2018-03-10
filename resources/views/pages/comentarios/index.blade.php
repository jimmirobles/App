@extends('layouts.principal')

@section('page-title', 'Comentarios')

@section('wrapper-title')
	<i class="fa fa-comments-o"></i> Comentarios
@endsection

@section('content')
	<div class="table-responsive">
		<table class="table table-bordered table-sm">
			<thead class="thead-light">
				<tr>
					<th>Fecha</th>
					<th>Folio</th>
					<th>Cliente</th>
					<th class="text-center"><i class="fa fa-cog fa-lg"></i></th>
				</tr>
			</thead>
			<tbody>
				@foreach($comentarios as $comentario)
				<tr>
					<th scope="row">{{ $comentario->created_at }}</th>
					<td>{{ $comentario->id_documento }}</td>
					<td>{{ $comentario->nombreCliente }}</td>
					<td>
						<div class="btn-group" role="group">
							<a role="button" href="" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
							<a role="button" href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{{ $comentarios->links() }}
@endsection