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
<div class="d-flex justify-content-center">
  {!! $allArticles->links() !!}
</div>
<div class="container">
    <a href="{{route('articles.create')}}"><button type="button"  class="btn btn-success">Crea un nuovo Articolo!</button></a>

    @foreach($allArticles as $article)
        <h1>{{$article->title}}</h1>
        <p>{{$article->text}}</p>
        <h2>{{$article->author->name}} {{$article->author->surname}}</h2>
        <img src="{{$article->picture}}" alt="A picture of article {{$article->title}}">
        <a href="{{route('articles.show',['article'=>$article->id])}}"><button type="button" class="btn btn-primary">Vai all'articolo!</button></a>
    @endforeach
</div>
@endsection
