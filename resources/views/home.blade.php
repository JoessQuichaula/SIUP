@extends('layouts.app')

@section('content')



<div class="cards-list" id="cards-list-home">

    <div class="card 1" id="card-home">
      <div class="card_image">
          <img src="https://www.shutterstock.com/blog/wp-content/uploads/sites/5/2018/05/Gradient-Roundup-Illustrator-02.jpg" alt="">
          <!--<img src="https://i.redd.it/b3esnz5ra34y.jpg" />-->
         </div>
      <div class="card_title title-white">
        <p>Minhas Solicitações</p>
      </div>
    </div>

      <div class="card 2" id="card-home">
      <div class="card_image">
        <img src="https://cdn.blackmilkclothing.com/media/wysiwyg/Wallpapers/PhoneWallpapers_FloralCoral.jpg" />
        </div>
      <div class="card_title title-white">
        <p>Meu Perfil</p>
      </div>
    </div>

    <div class="card 3" id="card-home">
      <div class="card_image">
        <img src="https://media.giphy.com/media/10SvWCbt1ytWCc/giphy.gif" />
      </div>
      <div class="card_title">
        <p>Notificações</p>
      </div>
    </div>

      <div class="card 4" id="card-home">
      <div class="card_image">
        <img src="https://media.giphy.com/media/LwIyvaNcnzsD6/giphy.gif" />
        </div>
      <div class="card_title title-black">
        <p>Card Title</p>
      </div>
      </div>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
