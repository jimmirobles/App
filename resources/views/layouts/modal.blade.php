<!-- Modal -->
<div class="modal fade" id="@yield('modal-id')" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">@yield('modal-title')</h4>
			</div>
			@yield('modal-content')
		</div>
	</div>
</div>