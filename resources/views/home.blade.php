@extends('layouts.app')

@section('content')
<div class="container">
<div class="d-flex justify-content-center">
  {!! $allArticles->links() !!}
</div>
    <div class="row ">
    @foreach($allArticles as $atricle)
            <div class="card col-md-3" style="width: 18rem;">
                <img class="card-img-top" src="{{ $atricle->picture }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $atricle->title }}</h5>
                    <p class="card-text">{{ $atricle->text }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
