@extends('layouts.principal')

@section('page-title', 'Home')

@section('wrapper-title')
	<i class="fa fa-home"></i> Inicio
@endsection

@section('content')
	@include('pages.front.cards')

	<div class="row">
		<div class="col-12 table-responsive">
			<table class="table table-bordered table-striped" id="documents-table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Folio</th>
						<th>Empresa</th>
						<th>Fecha</th>
						<th class="text-center"><li class="fa fa-cog fa-lg"></li></th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
	@include('modals.send-email')
@endsection
@section('custom_scripts')
<script>
	$(document).ready(function(){
		$('#documents-table').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"order": [[ 0, "desc" ]],
			"columnDefs": [
				{ "orderable": false, "targets": 3 }
			],
			"processing": true,
			"serverSide": true,
			"ajax": "{{ route('api.documentos') }}",
			"columns":[
				{data: 'folio'},
				{data: 'razon_social'},
				{data: 'fecha'},
				{data: 'action'},
			]
		});
		/*$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});*/
		$('#sendEmailModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); 
		  var iddocto = button.data('id'); 
		  var emaildocto = button.data('email'); 
		  var modal = $(this);
		  modal.find('.modal-body input#email').val(emaildocto);
		  modal.find('.modal-body input#id').val(iddocto);
		});
	});
</script>
@endsection