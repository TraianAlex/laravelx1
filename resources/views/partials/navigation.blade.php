<nav class="navbar navbar-inverse" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">Home</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="{{url('article')}}">Articles</a></li>
			<li><a href="{{url('songs')}}">Songs</a></li>
		</ul>
		<form method="POST" action="{{ url('/search-results') }}" class="navbar-form navbar-left" role="search">
			<input type="hidden" name="_token" value={{ csrf_token() }}>
			<div class="form-group">
				<input type="text" id="search" name="search" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			@if($latest)
				<li>{!! link_to_action('ArticleController@show', $latest->title, [$latest->id]) !!}</li><!-- use composer class to persist this data // create Providers/ViewComposerServiceProvider class-->
			@endif
			@if(Auth::check())
				<li><a href="{{ url('/auth/logout') }}">Sign out</a></li>
				<li><a href="{{ url('users') }}">Users</a></li>
			@else
				<li><a href="{{ url('/auth/login') }}">Sign in</a></li>
				<li><a href="{{ url('/auth/register') }}">Register</a></li>
			@endif
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>