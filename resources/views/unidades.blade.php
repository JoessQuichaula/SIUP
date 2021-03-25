@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Unidades</h1>
    <hr id="hr" style="margin-bottom: 16px; height:1px">
      <hr>
      <div class="row row-cols-1 row-cols-md-2">
        @foreach ($unidades as $unidade)
      <a href="{{route('servicos.show',$unidade->id)}}">
        <div class="col mb-4">
            <div class="card">
            <img src="storage/{{$unidade->image}}" class="card-img-top" alt="...">
              <div class="card-body">
              <h5 class="card-title">{{$unidade->nome}}</h5>

              </div>
            </div>
          </div>
        </a>
        @endforeach


        <!--
    <div class="card bg-dark text-white">
        <img src="storage/{{$unidade->image}}" class="card-img" alt="...">
            <div class="card-img-overlay">
            <h5 class="card-title">{{$unidade->nome}}</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text">Last updated 3 mins ago</p>
            </div>
          </div>
      <div class="card bg-dark text-white">
        <img src="storage/img2.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text">Last updated 3 mins ago</p>
        </div>
      </div>
      <hr>
      <div class="card bg-dark text-white">
        <img src="storage/img2.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text">Last updated 3 mins ago</p>
        </div>
      </div>

    -->
@endsection
