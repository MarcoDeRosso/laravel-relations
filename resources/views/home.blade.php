@extends('layouts.app')

@section('content')
<div class="container">
<div class="d-flex justify-content-center">
  {!! $allArticles->links() !!}
</div>
    <div class="row ">
    @foreach($allArticles as $article)
            <div class="card col-md-3" style="width: 18rem;">
                <img class="card-img-top" src="{{ $article->picture }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->text }}</p>
                    @if(Auth::check())
                        <a href="{{route('articles.show',['article'=>$article->id])}}"><button type="button" class="btn btn-primary">Leggi</button></a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
