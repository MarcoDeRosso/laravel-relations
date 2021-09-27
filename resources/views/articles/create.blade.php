@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('articles.index')}}"><button type="button"  class="btn btn-secondary"><- Torna indietro</button></a>  
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form class="d-flex flex-column" action="{{route('articles.store')}}" method="post">
        @csrf
        <label for="title">Titolo :</label>
        <input type="text" name="title" id="title">
        <label  type="text" for="text">Articolo :</label>
        <input  name="text" id="text">
        <label for="picture">Immagine :</label>
        <input type="text" name="picture" id="picture">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="author_id">Options</label>
                </div>
                <select class="custom-select" id="author_id" name="author_id">
                    <option selected>Choose...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->name }} {{ $author->surname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <h3>Tags:</h3>
        @foreach($tags as $tag)
            <div>
                <label>{{$tag->tag}}</label>
                <input name="tags[]" type="checkbox" value="{{ $tag->id }}">
            </div>
        @endforeach
        <input class="btn btn-primary" type="submit" value="Invia">
    </form>
    
</div>
    </div>
    
@endsection
