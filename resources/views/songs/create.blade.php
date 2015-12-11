@extends('layouts.main')
@section('content')
	<h2>Write a new song</h2>
	{!! Form::open(['route' => 'songs.store']) !!}
		@include('partials.form_song', ['submitButtonText' => 'Add song'])
	{!! Form::close() !!}
@endsection
<?php //{!! Form::model($song = new \App\Song, ['route' => 'songs.store']) !!}?>