@extends('layouts.main')
@section('content')
	<a href="{{url("article/create")}}" class="btn btn-default">Create an article</a>
	@if($articles)
    	<ul>
    	@foreach ($articles as $article)
    		<li><a href="{{url("article/$article->id")}}"><strong>title:</strong> {{ $article->title }}</a> {{$article->published_at}}</li>
    		<!--li><a href="{{ action('ArticleController@show', [$article->id]) }}"><strong>title:</strong> {{ $article->title }}</a></li>
    		<li><a href="{{ url('article', $article->id) }}"><strong>title:</strong> {{ $article->title }}</a></li-->
    	@endforeach
    	</ul>
	@endif
@endsection