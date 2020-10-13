@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Meus Serviços</h1>
    <hr id="hr" style="margin-bottom: 16px; height:1px">

    @if ($servicos->count()!=0)
    <div class="card-deck">

        @foreach ($servicos as $servico)
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/'.$servico->imagem)}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">{{$servico->nome}}</h5>
            <p class="card-text">{!!$servico->descricao!!}</p>
            </div>
            <div class="list-group list-group-flush">
              <a href="" class="list-group-item bg-bottom">Procedimentos</a>
              <a href="" class="list-group-item"> Documentos Necessários</a></li>
              <a href="" class="list-group-item">Mais</a>
            </div>
            <div class="card-body">
              <a href="#" class="card-link">Unidade</a>
              <a href="#" class="card-link">Acessar</a>
            </div>
          </div>
        @endforeach


    </div>
    @else
    <h1>Mais Servicos Brevemente :)</h1>
    @endif


@endsection

