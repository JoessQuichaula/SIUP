@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Notícias</h1>
    <hr id="hr" style="margin-bottom: 16px; height:1px">
    <div class="row row-cols-1 row-cols-md-2">
        @foreach ($posts as $post)
        <div class="col mb-4">
            <div class="card">
            <img src="storage/{{$post->image}}" class="card-img-top" alt="...">
              <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">Last updated 3 mins ago</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>
       {{$posts->links()}}


</div>



@endsection
