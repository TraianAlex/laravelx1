@extends('layouts.main')
@section('content')
	<h2>Write a new article</h2>
	{!! Form::open(['url' => 'article']) !!}
		@include('articles.form', ['submitButtonText' => 'Add Article'])
	{!! Form::close() !!}
	@include('errors.list')
@endsection