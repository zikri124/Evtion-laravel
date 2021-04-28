<head>
    <style>
        body{
            font-size: 2pt;
        }
        .carousel-inner{
            
        }
        img.d-block{
            max-height: 250px;
            min-height: 100px;

            min-width: 100%;
        }
        .carousel-caption{
            background: rgba(0, 0, 0, 0.268);
            background-size: 10px 10px;
        }
    </style>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="carousel.css" rel="stylesheet">
    <title>Home Page . EVTION</title>
</head>
<body>
@extends('layout.header')
@section('header1')
@section('content')

    <!-- make a carousel-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/image/profile/IwkiwkkjYoT3b38ZRd93XS0ECH8vnDwqVsRODuLY.jpg" class="d-block w-100" alt=".1">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/image/profile/j53mJY9oQAwAkTXfuHOKF8USDptcwuvl9njeXAvt.jpg" class="d-block w-100" alt=".2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/image/profile/IwkiwkkjYoT3b38ZRd93XS0ECH8vnDwqVsRODuLY.jpg" class="d-block w-100" alt=".3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <!-- make a carousel-->

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Lomba Terbaru</h2>
            </div>
            <div class="float-right">
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <div class="container">
        <div class="row">
        @foreach ($posts as $post)
        <div class="col-sm-6">
            <div class="card" style="width: 18rem;">
                <img src="/image/{{ $post->photo }}" class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->caption }}"</p>
                    <a href="/view/{{ $post->id }}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    </table>
 
    {{ $posts->links() }}
 
@endsection
</body>