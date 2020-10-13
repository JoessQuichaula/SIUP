@extends('layouts.app')

@section('content')



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
<div class="container">

    <div class="row">
    </div>

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="storage/man1.jpg" width="380px" height="380px" alt="">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#5a6165;"></rect><text x="50%" y="50%" fill="#777" dy=".3em" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#9d9488;">140x140</text></svg>
        <h2>Heading</h2>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#5a6165;"></rect><text x="50%" y="50%" fill="#777" dy=".3em" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#9d9488;">140x140</text></svg>
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col-lg-8">
                <div class="titulo">
                    <span>Notícias do Governo de Angola</span>
                </div>
            </div>
            <div class="col-lg-4 my-2 text-right">
                <a href="" class="font-weight-bold" style="text-transform:uppercase;">Veja todas as notícias</a>
            </div>
        </div>

        <div class="row">
                        <div class="col-lg-6">

                            <a href="/ao/noticias/nenhum-obito-por-covid-19-em-24-horas/">

                                <div class="item">

                                    <div class="cover">

                                        <img src="storage/man1.jpg" class="w-100">

                                    </div>
                                        <div class="tag">Saúde</div>
                                        <div class="info">
                <h2 class="resumo-2">Nenhum óbito por COVID-19 em 24 horas</h2>
                <p class="resumo-2">Angola detecta 53 novos casos positivos </p>
            </div>
        </div>
    </a>
</div>
                <div class="col-lg-6">
    <a href="/ao/noticias/cuanza-sul-com-maior-taxa-de-letalidade/">
        <div class="item">
            <div class="cover">
                <img src="/fotos/frontend_1/noticias/th_egov_noticias_500046_11100194305f65f0690a3db.jpg" class="w-100">
            </div>
                                        <div class="tag">Saúde</div>
                                        <div class="info">
                <h2 class="resumo-2">Cuanza Sul com maior taxa de letalidade</h2>
                <p class="resumo-2">Angola regista mais três óbitos e 59 infecções</p>
            </div>
        </div>
    </a>
</div>
                    </div><!-- end .row -->
                            <div class="row">
                        <div class="col-lg-4">
    <a href="/ao/noticias/mais-114-casos-positivos/">
        <div class="item">
            <div class="cover">
                <img src="/fotos/frontend_1/noticias/th_egov_noticias_500045_5534420505f652c61b3b82.jpg" class="w-100">
            </div>
                                        <div class="tag">Saúde</div>
                                        <div class="info">
                <h2 class="resumo-2">Mais 114 casos positivos</h2>
                <p class="resumo-2">Huambo regista segunda morte por COVID-19</p>
            </div>
        </div>
    </a>
</div>
                <div class="col-lg-4">
    <a href="/ao/noticias/presidente-da-republica-felicita-mexico/">
        <div class="item">
            <div class="cover">
                <img src="/fotos/frontend_1/noticias/th_egov_noticias_500044_21261566605f636b68598b2.jpg" class="w-100">
            </div>
                                        <div class="tag">Internacional</div>
                                        <div class="info">
                <h2 class="resumo-2">Presidente da República felicita México</h2>
                <p class="resumo-2">O Presidente da República, João Lourenço, associou-se nesta quarta-feira, 16, aos festejos dos 210 anos da Independência do México, através de uma mensagem enviada ao seu homólogo, Andrés Manu...</p>
            </div>
        </div>
    </a>
</div>
                <div class="col-lg-4">
    <a href="/ao/noticias/recuperados-69-pacientes/">
        <div class="item">
            <div class="cover">
                <img src="/fotos/frontend_1/noticias/th_egov_noticias_500043_7705555215f636adbbc387.jpg" class="w-100">
            </div>
                                        <div class="tag">Saúde</div>
                                        <div class="info">
                <h2 class="resumo-2">Recuperados 69 pacientes</h2>
                <p class="resumo-2">Mais quatro óbitos e 106 casos positivos</p>
            </div>
        </div>
    </a>
</div>
                    </div>
</div>

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img src="storage/man2.jpg" class="img-fluid" width="500px" height="500px" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#222426;"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#b2aca2;">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#222426;"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#b2aca2;">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div>




@endsection

