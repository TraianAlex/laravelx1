@extends('layouts.main')
@section('content')
	<h3>Title: {{ $article->title }}</h3>
	<p>Body: {{ $article->body }}</p>
	<p>Published at: {{$article->published_at}}</p>
	<a href="{{url("article/$article->id/edit")}}" class="btn btn-default">Edit</a>
	@unless($article->tags->isEmpty())
		<h4>Tags:</h4>
		<ul>
			@foreach ($article->tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endunless
@endsection