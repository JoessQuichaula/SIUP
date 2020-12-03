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


@endsection

