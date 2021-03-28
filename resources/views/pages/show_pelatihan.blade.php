@extends('layouts.master')

@section('title')
   {{ $training->title }}
@endsection

@section('content')
<!--====== HEADER PART START ======-->

<header class="header-area">
   <div class="navbar-area navbar-two">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="{{ url('/') }}">
                     <img src="{{ asset('assets/images/dataimg/LogoKHPutih.png') }}" alt="Logo" height="65px">
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo"
                     aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="toggler-icon"></span>
                     <span class="toggler-icon"></span>
                     <span class="toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="page-scroll" href="">Beranda</a>
                        </li>
                        <li class="nav-item">
                           <a class="page-scroll" href="#dokumen">Dokumen Pelatihan</a>
                        </li>
                        <li class="nav-item">
                           <a class="page-scroll" href="#patner">Patner</a>
                        </li>
                        <li class="nav-item">
                           <a class="page-scroll" href="#galeri">Galeri</a>
                        </li>
                        <li class="nav-item">
                           <a class="page-scroll" href="#faq">FAQ</a>
                        </li>
                     </ul>
                  </div>
               </nav> <!-- navbar -->
            </div>
         </div> <!-- row -->
      </div> <!-- container -->
   </div>
</header>

<!--====== HEADER PART ENDS ======-->
<section id="banner">
   <div id="home" class="header-content-area bg_cover d-flex align-items-center"
      style="background-image: url({{ asset('upload/training/'.$training->image) }})">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-12">

               <div class="header-content text-center">
                  <h5 class="header-title"> </h5>
                  <h3 class="sub-title"> </h3>

               </div> <!-- header content -->
            </div>
         </div> <!-- row -->
      </div> <!-- container -->
   </div> <!-- header content -->
</section>
<!--====== TIKTOK PART START ======-->

<section id="deskripsi" class="about-area pb-130 pt-80">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-12">
            <div class="about-content mt-45 wow fadeInRight" data-wow-duration="1s">
               <div class="section-title">
                  <h6 class="title">Deskripsi Pelatihan </h6>
                  <p class="date">{{ Carbon\Carbon::parse($training->start)->isoFormat('D MMMM Y') }} s/d {{ Carbon\Carbon::parse($training->end)->isoFormat('D MMMM Y') }}</p>
               </div> <!-- section title -->

               <p class="text mt-30 mb-30 text-justify">{{ $training->description2 }}</p>

            </div> <!-- about content -->
         </div>

      </div> <!-- row -->
   </div> <!-- container -->
</section>

<!--====== TIKTOK PART ENDS ======-->
<!--====== EVENT SCHEDULE PART START ======-->

<section id="dokumen" class="event-schedule pt-80 pb-130 gray-bg">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="section-title text-center">
               <h5 class="title">Dokumen Pelatihan</h5>
            </div> <!-- section title -->
         </div>
      </div> <!-- row -->
      <div class="row">
         <div class="col-lg-12">
            <div class="event-tab mt-60">
               <ul class="nav justify-content-center align-items-center" id="myTab" role="tablist" style="list-style-type: none;">
                  @foreach ($document as $key => $value)
                     <li class="nav-item" >
                        <a class="{{ $key == 0 ? 'active' : '' }}" id="{{ Str::slug($value->name) }}-{{ $value->id }}-tab" data-toggle="tab" href="#{{ Str::slug($value->name) }}-{{ $value->id }}" role="tab"
                           aria-controls="{{ Str::slug($value->name) }}-{{ $value->id }}" aria-selected="true">
                           <h4 class="nav-title">{{ $value->name }}</h4>
                        </a>
                     </li>
                  @endforeach
               </ul>
               <div class="tab-content" id="myTabContent">
                  @foreach ($document as $key => $value)
                     <div class="tab-pane fade show {{ $key == 0 ? 'active' :'' }}" id="{{ Str::slug($value->name) }}-{{ $value->id }}" role="tabpanel" aria-labelledby="{{ Str::slug($value->name) }}-{{ $value->id }}-tab">
                        @foreach ($value->detail as $key2 => $value2)
                           <div class="event-content pt-4">
                              <div class="single-event d-md-flex mt-30">
                                 <div class="event-content media-body">
                                    <h4 class="event-title text-black">{{ $value2->type }}</h4>
                                    <p class="text-black text pb-4">Silahkan download file dibawah sesuai kebutuhan anda...</p>
                                    <ul class="" style="list-style-type: none;">
                                       @foreach ($value2->subdetail as $item)
                                       @php
                                          $ext = explode('.', $item->file);
                                       @endphp
                                       <li class="pb-2"><a class="main-btn main-btn-2 btn-sm" href="{{ asset('upload/dokumen-pelatihan/'. $item->file) }}" download="">Download {{ $item->name }}</a></li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  @endforeach
               </div>
            </div> <!-- event tab -->
         </div>
      </div> <!-- row -->
   </div> <!-- container -->
</section>

<!--====== EVENT SCHEDULE PART ENDS ======-->

<!--====== TEAM PART START ======-->

<section id="patner" class="team-area pt-5 pb-130">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="section-title text-center pb-40">
               <h5 class="title">Partner Kerja</h5>
            </div> <!-- section title -->
         </div>
      </div> <!-- row -->

      <div class="row justify-content-center">
         @foreach ($training->partner as $key => $value)
            <div class="col-lg-2 col-sm-6">
                
                <div class="card text-white bg-light">
                    <div class="card-body">
                        <img src="{{ asset('upload/partner/'.$value->image) }}" class="mb-3" alt="Team">
                        <h5 class="text-black text-center">{{ $value->name }}</h5>
                        <!--<p class="sub-title">{{ $value->description }}</p>-->
                    </div>
                </div>
            </div>            
         @endforeach
      </div> <!-- row -->
   </div> <!-- container -->
</section>

<!--====== TEAM PART ENDS ======-->
<section id="galeri" class="team-area pt-5 pb-130 gray-bg">
   <div class="container ">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="section-title text-center pb-40">
               <h5 class="title">Galeri</h5>
            </div> <!-- section title -->
         </div>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            @foreach ($training->gallery as $key => $value)
               <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
         </ol>
         <div class="carousel-inner">
            @foreach ($training->gallery as $key => $value)
               <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                  <img class="d-block w-100" src="{{ asset('upload/gallery/'.$value->image) }}" alt="First slide">
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
   </div>
</section>
<!--====== FOOTER PART START ======-->

<section id="faq" class="team-area pt-5 pb-130">
   <div class="container ">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="section-title text-center pb-40">
               <h5 class="title">FAQ</h5>
            </div> <!-- section title -->
         </div>
      </div>
      <div>
         {!! $training->faq->faq !!}
      </div>
   </div>
</section>

<section id="footer" class="footer-area bg_cover" style="background-image: url(assets/images/footer.jpg)">
 
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

<!--====== FOOTER PART ENDS ======-->
@endsection