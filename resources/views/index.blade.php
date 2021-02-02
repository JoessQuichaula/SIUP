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

<a href="http://siup.test/storage/demandas\2020\dezembro\74\FlKA9pXlAoInAPdE8buXRpYb8xezc0WsqBzO8ikQ.pdf" target="blank" class="card" style="width: 23rem; border-radius: 5px; display: inline-block; margin-left: 25px; box-shadow: gray 0px 0px 5px; --darkreader-inline-boxshadow:#60686c 0px 0px 5px;" data-darkreader-inline-boxshadow="">
    <img class="card-img img-fluid" style="width: 100%; height:25em;" src="http://siup.test/storage/demandas\2020\dezembro\74\thumbnails\phpD954.jpeg" alt="Card image cap">
    <div class="card-img-overlay" style="margin-top:35em border-top: 2px solid gray; --darkreader-inline-border-top:#545b5e;" data-darkreader-inline-border-top="">
      <h4 class="card-title" style="">Documento</h4>
      <button class="btn btn-warning"></button>
    </div>
  </a>

@endsection

