@extends('layouts.main')

@section('content')
	<h2>Official Fan Club</h2>
	{!! link_to_route('songs.create', 'Create a song', [], ['class' => 'btn btn-default']) !!}
	@foreach ($songs as $song)
		<li><a href="{{ url("songs/$song->slug") }}">{{ $song->title }}</a></li>
		<li>{!! link_to(url("songs/$song->slug"), $song->title) !!}</li>
		<li><a href="{{ route('song_path', [$song->slug]) }}">{{ $song->title }}</a></li>
		<li>{!! link_to_route('song_path', $song->title, [$song->slug]) !!}</li>
		<?php /*<li>{!! link_to_route('songs.show', $song->title, [$song->slug]) !!}</li>*/?>
	@endforeach
@endsection