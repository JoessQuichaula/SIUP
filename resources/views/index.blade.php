@extends('layouts.app')

@section('content')

<!--App-Carousel(Slider)-->
<div id="carouselId" class="carousel slide mt-n4 " data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="storage/img0.jpg" class="img-fluid" width="100%"  alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Title</h3>
                <p>Description</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="storage/img1.jpg" width="100%" class="img-fluid"  alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Title</h3>
                <p>Description</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="storage/img2.jpg" class="img-fluid" width="100%"  alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Title</h3>
                <p>Description</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="row" style="width:94%; margin:140px auto auto; ;background: url(https://image.freepik.com/free-vector/white-elegant-texture-wallpaper_23-2148417584.jpg);">
    <div class="col-lg-4">
      <img class="" src="{{asset('storage/4253055.svg')}}" alt="Generic placeholder image" width="140" height="140">
      <h2>Um Novo Banco de Dados</h2>
      <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
      <p><a class="btn btn-primary btn-grad" id="btnLogin" href="#" role="button">View details »</a></p>

  </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="" src="{{asset('storage/4253333.svg')}}" alt="Generic placeholder image" width="140" height="140">
      <h2>Envie o seu Documento</h2>
      <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
      <p><a class="btn btn-primary btn-grad" id="btnLogin" href="#" role="button">View details »</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="" src="{{asset('storage/4253044.svg')}}" alt="Generic placeholder image" width="140" height="140">
      <h2>Agora todos os Processos na Nuvem</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn btn-primary btn-grad" id="btnLogin" href="#" role="button">View details »</a></p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->
<div class="container marketing" style="margin-top:10%">
    <!-- Three columns of text below the carousel -->
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette mt-5">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="{{asset('storage/screenshot2.png')}}" alt="500x500" style="" src="" data-holder-rendered="true">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette mt-5">
      <div class="col-md-7 order-md-2" style="margin-top: 10%">
        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="{{asset('storage/screenshot.png')}}" data-holder-rendered="true" style="">
      </div>
    </div>

    <hr class="">

    <div class="row mt-5">
      <div class="col-md-7" style="margin-top: 10%">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="{{asset('storage/screenshot3.png')}}" data-holder-rendered="true" style="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="col-md-5 text-center text-md-left">
        <h1 class="lead-1">Baixe aqui o Aplicativo</h1>
        <p class="lead-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit blandit dui id sollicitudin. Donec quis neque lacus. Donec efficitur magna et eros ultricies, eget porta enim gravida. Sed consectetur at diam ac malesuada. Nulla ullamcorper facilisis commodo..</p>
        <a href="" style="margin-left: -35px">
            <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png?hl=pt-br" alt="" style="height: 200px; width:500px">
        </a>
    </div>

</div>


    <!-- /END THE FEATURETTES -->

<div class="contact-form">
        <div class="contact-image">
            <img src="{{asset('storage/email.png')}}" style="background: white; padding:20px" alt="rocket_contact">
        </div>
        <form method="post">
            <h3>Envie nos uma Mensagem</h3>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Seu Nome *" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtEmail" class="form-control" placeholder="Seu Email *" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtPhone" class="form-control" placeholder="Número de Telemóvel *" value="">
                    </div>
                    <div class="form-group">
                        <input type="submit" style="background: white; border:1px solid #fd6721; color:#fd6721" name="btnSubmit" class="btnContact" value="Enviar Mensagem">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Escreva a sua mensagem..." style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>
            </div>
        </form>
</div>


@endsection

