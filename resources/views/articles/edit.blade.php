@extends('layouts.main')
@section('content')
	<h2>Edit: {{ $article->title }}</h2>
	{!! Form::model($article, ['method' => 'PATCH', 'url' => url('article/'.$article->id)]) !!}
		@include('articles.form', ['submitButtonText' => 'Update Article'])
	{!! Form::close() !!}
	@include('errors.list')
@endsection
<!--
Form::open(['method' => 'PATCH', 'route' => 'article/'.$article->id])
Form::open(['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]])
-->