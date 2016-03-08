@extends('layouts.main')

@section('content')
	<h2>Official Fan Club</h2>
	<li>{{$song->title}}</li>
	@if($song->lyrics)
		<li>{{nl2br($song->lyrics)}}</li>
	@endif
	<a href="{{url("songs/$song->slug/edit")}}" class="btn btn-default">Edit</a>
	{!! link_to_route('songs_path', 'Go black home') !!}
	<?php //{!! link_to_route('songs.index', 'Go black home') !!}?>
@endsection