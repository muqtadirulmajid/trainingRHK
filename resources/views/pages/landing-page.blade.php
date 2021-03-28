@extends('layouts.master')

@section('content')
<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">
   <div class="navbar-area navbar-two">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="index.php">
                     <img src="{{ asset('assets/images/dataimg/LogoKHPutih.png') }}" alt="Logo" height="65px">
                  </a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo"
                     aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="toggler-icon"></span>
                     <span class="toggler-icon"></span>
                     <span class="toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                     <ul class="navbar-nav ">
                        <li class="nav-item active">
                           <a class="page-scroll" href="#home">Beranda</a>
                        </li>
                        <li class="nav-item">
                           <a class="page-scroll" href="#pelatihan">Pelatihan</a>
                        </li>
                     </ul>
                  </div>
               </nav> <!-- navbar -->
            </div>
         </div> <!-- row -->
      </div> <!-- container -->
   </div>
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         @foreach ($slider as $key => $value)
         <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
            class="{{ $key == 0 ? 'active' : '' }}"></li>
         @endforeach
      </ol>
      <div class="carousel-inner">
         @foreach ($slider as $key => $value)
         <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img class="d-block w-100" src="{{ asset('upload/slider/'.$value->image) }}" alt="{{ $value->name }}">
         </div>
         @endforeach
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</header>

<!--====== HEADER PART ENDS ======-->
<!--====== FEATURES PART START ======-->

<section id="pelatihan" class="features-area pt-115 pb-130 gray-bg">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="section-title text-center pb-20">
               <h2 class="title">{{ $heading }}</h2>
               <p class="text">{{ $subheading }}</p>
            </div> <!-- section title -->
         </div>
      </div> <!-- row -->
      <div class="row justify-content-center">
         @foreach ($training as $key => $value)
         <div class="col-lg-4 col-md-6 col-sm-8">
            <a href="{{ route('landing.show', [
                  'slug' => $value->slug, 'year' => $value->year, 'month' => $value->month
               ]) }}" class="single-features text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
               
               <div class="">
                  <h4 class="text-black">{{ $value->title }}</h4>
                   <p class="text">{{ $value->description }}</p>
               </div>
            </a> <!-- single features -->
         </div>
         @endforeach
      </div> <!-- row -->
   </div> <!-- container -->
</section>
<section id="footer" class="footer-area bg_cover" >
 
   <div class="footer-copyright">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="copyright text-center">
                  <p class="text">Knowledge HUB - 2021</p>
               </div> <!-- copyright -->
            </div>
         </div> <!-- row -->
      </div> <!-- container -->
   </div> <!-- container -->
</section>
@endsection