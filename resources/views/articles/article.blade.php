@extends('layouts.main')
@section('content')
	<h3>Title: {{ $article->title }}</h3>
	<p>Body: {{ $article->body }}</p>
	<p>Published at: {{$article->published_at}}</p>
	
	@unless($article->tags->isEmpty())
		<h4>Tags:</h4>
		<ul>
			@foreach ($article->tags as $tag)
				<li><a href="{{url("tags/$tag->name")}}">{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	@endunless

	<a href="{{url("article/$article->id/edit")}}" class="btn btn-default">Edit</a>
	{!! Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $article->id]]) !!}
	{!! Form::submit('Delete Article', ['class' => 'btn btn-danger']) !!}
	{!! Form::close() !!}
@endsection