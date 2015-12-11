@extends('layouts.main')

@section('content')
	<h2>Edit {{$song->title}}</h2>
	{!! Form::model($song, ['route' => ['songs.update', $song->slug], 'method' => 'PATCH']) !!}
		@include('partials.form_song', ['submitButtonText' => 'Edit Song'])
	{!! Form::close() !!}

	{!! delete_form(['songs.destroy', $song->slug]) !!}
@endsection
<?php //{!! Form::model($song, ['url' => url('songs/'.$song->slug), 'method' => 'PATCH']) !!}?>