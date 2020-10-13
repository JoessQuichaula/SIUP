@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Minhas Notícias</h1>
    <hr id="hr" style="margin-bottom: 16px; height:1px">
    <div class="row row-cols-1 row-cols-md-2">
        @foreach ($posts as $post)
        <div class="col mb-4">
            <div class="card">
            <img src="storage/{{$post->image}}" class="card-img-top" alt="...">
              <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{!!$post->body!!}</p>
              </div>
            </div>
          </div>
        @endforeach


        <!--
        <div class="col mb-4">
          <div class="card">
            <img src="storage/img0.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card">
            <img src="storage/img0.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card">
            <img src="storage/img0.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
    -->
      </div>
       {{$posts->links()}}


</div>



@endsection