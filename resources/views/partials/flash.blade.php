@if(Session::has('msg'))
	<div class="row">
		<div class="col-md-5 col-md-offset-4">
			<div class="alert {{ Session::get('alert-class', 'alert-info') }} {{ Session::has('msg_important') ? 'alert-important' : ''}}">
			@if(Session::has('msg_important'))
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			@endif
				{{ session('msg') }}
			</div>
		</div>
	</div>
@endif