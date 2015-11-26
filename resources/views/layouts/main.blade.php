<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css" rel="stylesheet" />
</head>
<body>
	<div class="container">
		@include('partials.navigation')
		@include('flash::message')<!-- 'partials.flash' -->
		<section>
			@yield('content')
		</section>
	</div>
	<script src="{{ asset('assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<!--script src="//code.jquery.com/jquery.js"></script-->
	<!--script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>
	<script type="text/javascript">
		$('#flash-overlay-modal').modal();
		//$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>
	@yield('footer')
</body>
</html>