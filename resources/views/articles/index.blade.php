@extends('layouts.app')

@section('content')
    @foreach($allArticles as $article)
        <h1>{{$article->title}}</h1>
        <p>{{$article->text}}</p>
        <img src="{{$article->picture}}" alt="A picture of article {{$article->title}}">
    @endforeach
@endsection
