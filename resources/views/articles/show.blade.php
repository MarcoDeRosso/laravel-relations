@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('articles.index')}}"><button type="button"  class="btn btn-secondary"><- Torna indietro</button></a>  
        <h1>{{$article->title}}</h1>
        <h2>{{$article->author->name}} {{$article->author->surname}}</h2>
        <p>{{$article->text}}</p>
        <img src="{{$article->picture}}" alt="A picture of article {{$article->title}}">
    </div>
    
@endsection
