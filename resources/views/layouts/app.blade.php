<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('site.title') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel = "icon" href =
    "{{asset('storage/reallogo2.png')}}"
            type = "image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.css">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('storage/reallogo2.png')}}" width="60vh" height="60vh" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a href="{{route('root')}}" class="nav-link">Página Inicial</a>
                        </li>

                        <li class="nav-item">
                        <a href="{{route('noticias.index')}}" class="nav-link">Notícias</a>
                        </li>

                         <li class="nav-item">
                         <a href="{{route('unidades.index')}}" class="nav-link">Unidades</a>
                         </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">Sobre</a>
                            </li>

                             <li class="nav-item dropdown">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Serviços
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Direcção Nacional de Arquivo e Identificação</a>
                                      <a class="dropdown-item" href="#">Conservatória do Registo</a>
                                      <a class="dropdown-item" href="#">Cartório Notarial</a>
                                    </div>
                                  </div>
                             </li>
                             <li class="nav-item">
                                <a href="{{route('unidades.index')}}" class="nav-link">Agendar o BI</a>
                                </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-warning nav-link" href="{{ route('login') }}">{{ __('Iniciar Sessão') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Criar Conta') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('home')}}">{{ __('Atividades') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <hr id="hr">
        <main class="py-4">
            @yield('content')
        </main>


        <footer class="container-fluid py-5">
            <div class="row ml-4 mr-4">
              <div class="col-12 col-md">
                <img src="{{asset("storage/reallogo2.png")}}" width="54px" height="54px" alt="">
                <small class="d-block mb-3 text-muted">© 2020-2021</small>
              </div>
              <div class="col-6 col-md">
                <h5 id="btnLink">Features</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Cool stuff</a></li>
                  <li><a class="text-muted" href="#">Random feature</a></li>
                  <li><a class="text-muted" href="#">Team feature</a></li>
                  <li><a class="text-muted" href="#">Stuff for developers</a></li>
                  <li><a class="text-muted" href="#">Another one</a></li>
                  <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5 id="btnLink">Resources</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Resource</a></li>
                  <li><a class="text-muted" href="#">Resource name</a></li>
                  <li><a class="text-muted" href="#">Another resource</a></li>
                  <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5 id="btnLink">Resources</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Business</a></li>
                  <li><a class="text-muted" href="#">Education</a></li>
                  <li><a class="text-muted" href="#">Government</a></li>
                  <li><a class="text-muted" href="#">Gaming</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5 id="btnLink">Sobre</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Equipa</a></li>
                  <li><a class="text-muted" href="#">Localização</a></li>
                  <li><a class="text-muted" href="#">Politícas de Privacidade</a></li>
                  <li><a class="text-muted" href="#">Termos de Uso</a></li>
                </ul>
              </div>
            </div>
          </footer>
    </div>
</body>
</html>
