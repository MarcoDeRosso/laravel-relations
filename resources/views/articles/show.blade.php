@extends('layouts.app')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<div class="container">
    <a href="{{route('articles.index')}}"><button type="button"  class="btn btn-secondary"><- Torna indietro</button></a>  
    <h1>{{$article->title}}</h1>
    <h2>{{$article->author->name}} {{$article->author->surname}}</h2>
    <p>{{$article->text}}</p>
    @foreach($article->tag as $tag)
        <div class="tag">{{$tag->tag}}</div> 
    @endforeach
        <img src="{{$article->picture}}" alt="A picture of article {{$article->title}}">
        <h2>Commenti</h2>
        @foreach($article->comment as $comment)
        <h4>
            Autore : {{$comment->user_name}}
        </h4>
        <p>
            Commento: {{$comment->comment_text}}
        </p>
        @endforeach
        <h2>
            Aggiungi un tuo commento!
        </h2>
        <form action="{{route('comments.store', ['id'=>$article->id])}}" method="POST">
            @csrf
            <label for="user_name">Autore :</label>
            <input type="text" name="user_name" id="user_name">
            <label for="comment_text">Commento :</label>
            <textarea  name="comment_text" id="comment_text" cols="30" rows="10"></textarea>
            <input class="btn btn-primary" type="submit" value="Invia">
        </form>
    </div>
    
@endsection
