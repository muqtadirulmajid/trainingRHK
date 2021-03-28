<!doctype html>
<html lang="en">

<head>

   <!--====== Required meta tags ======-->
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="description"
      content="Sharia Economic Fair 2021 merupakan sebuah event mini talkshow yang dihadirkan oleh Sharfin, sebuah platform edukasi keuangan syariah kepada masyarakat agar bisa lebih mengenal ekonomi dan keuangan syariah lebih luas. Menghadirkan tokoh-tokoh berpengaruh dan inspiratif di industri keuangan syariah. Mengambil tema yang berjudul Sharia Economic Outlook 2021 dengan harapan kita bisa bangkit dan menyambut tahun 2021 dengan optimisme yang luar biasa setelah kita mengalami masa-masa yang sulit di 2020.">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="facebook-domain-verification" content="u6l4wb5m9m0iu105t5ib8az7lupbbn" />
   <!--====== Title ======-->
   <meta name="keywords"
      content="shariaeconomicfair, sharia economic fair, sef2021, sharia, economic, finance, sef sharfin, sharfinid, event sharfin, talkshow, lomba tiktok, tiktok challenge, belajar saham, investasi">
   <title>@yield('title', "Knowledge hub - 2021")</title>

   <!--====== Favicon Icon ======-->
   <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/dataimg/logoKhTop.png') }}">

   <!--====== Bootstrap css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

   <!--====== Flaticon css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

   <!--====== Line Icons css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css') }}">

   <!--====== Animate css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

   <!--====== Magnific Popup css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

   <!--====== Slick css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

   <!--====== Default css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

   <!--Floating WhatsApp css-->
   <link rel="stylesheet" href="{{ asset('assets/js/vendor/floating-wpp.min.css') }}">

   <!--====== Style css ======-->
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

   <link rel="stylesheet" href="{{ asset('assets-dashboard/css/sweetalert.min.css') }}">


</head>

<body>

   <!--====== PRELOADER PART START ======-->

   <div class="preloader">
      <div class="loader">
         <div class="ytp-spinner">
            <div class="ytp-spinner-container">
               <div class="ytp-spinner-rotator">
                  <div class="ytp-spinner-left">
                     <div class="ytp-spinner-circle"></div>
                  </div>
                  <div class="ytp-spinner-right">
                     <div class="ytp-spinner-circle"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @yield('content')
   <!--====== FEATURES PART ENDS ======-->

   <!--====== FOOTER PART ENDS ======-->

   <!--====== BACK TOP TOP PART START ======-->

   <div id='whatsapp-chat' class='hide'>
      <div class='header-chat'>
         <div class='head-home'>
            <h6>Salam!</h6>
            <p>Ada yang bisa kami bantu?</p>
         </div>
         <div class='get-new hide'>
            <div id='get-label'></div>
            <div id='get-nama'></div>
         </div>
      </div>
      <div class='home-chat'>
         <!-- Info Contact Start -->
         <div class='informasi'>
            {{-- <div class='info-avatar'><img src="{{ asset('upload/avatar/'. $avatar_wa) }}" />
            </div>
            <div class='info-chat'>
               <span class='chat-label'>{{ $tipe_wa }}</span>
               <span class='chat-nama'>{{ $name_wa }}</span>
            </div><span class='my-number'>{{ $number_wa }}</span> --}}
            <form action="{{ route('send.telegram') }}" method="POST">
               @csrf
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" placeholder="Nama" name="name" required>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="text" placeholder="Nomor Telegram" name="number" required>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" type="text" placeholder="Keterangan" name="keterangan" required>
                        </div>
                    </div>
                </div>
               <div class="text-center pt-4 mb-4">
                  <button type="submit" class="btn btn-sm btn-warning text-white">Kirim</button>
               </div>
            </form>
         </div>
         <!-- Info Contact End --> 
      </div>
      <div id='get-number'></div><a class='close-chat' href='javascript:void'>×</a>
   </div>
   <a class='blantershow-chat' href='javascript:void' title='Show Chat'><i class='lni-telegram'></i>Hubungi Kami</a>

   <!--====== BACK TOP TOP PART ENDS ======-->

   <!--====== jquery js ======-->
   <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

   <!--====== Bootstrap js ======-->
   <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/js/popper.min.js') }}"></script>

   <!--====== Counter Up js ======-->
   <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

   <!--====== Slick js ======-->
   <script src="{{ asset('assets/js/slick.min.js') }}"></script>

   <!--====== Magnific Popup js ======-->
   <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

   <!--====== Scrolling Nav js ======-->
   <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
   <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>

   <!--====== Countdown js ======-->
   <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>

   <!--====== wow js ======-->
   <script src="{{ asset('assets/js/wow.min.js') }}"></script>

   <!--====== Ajax Contact js ======-->
   <script src="{{ asset('assets/js/ajax-contact.js') }}"></script>

   <!--====== Main js ======-->
   <script src="{{ asset('assets/js/main.js') }}"></script>
   <script src="{{ asset('assets-dashboard/js/sweet-alert/sweetalert.min.js') }}"></script>

   <!-- Facebook Pixel Code -->
   <script>
      // !function(f,b,e,v,n,t,s)
        // {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        // n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        // if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        // n.queue=[];t=b.createElement(e);t.async=!0;
        // t.src=v;s=b.getElementsByTagName(e)[0];
        // s.parentNode.insertBefore(t,s)}(window,document,'script',
        // 'https://connect.facebook.net/en_US/fbevents.js');
        // fbq('init', '734768103834405'); 
        // fbq('track', 'PageView');   
   </script>

   <script type="text/javascript">
      $(document).ready(function() {
         @if(session('success'))
         Swal.fire(
            'Sukses!',
            'Berhasil kirim pesan!',
            'success'
         )
         @endif
      })
      $('#detailTalk').click(function() {
        // fbq('track', 'ViewContent');
        window.location.href('talkshow.php');
    });

    $('#detailTiktok').click(function() {
        // fbq('track', 'ViewContent');
        window.location.href('lomba.php');
    });

    $('#beliTiketsatu').click(function() {

        // google
         
        // gtag('event', 'conversion', {
        //     'send_to': 'AW-450492567/nvgDCIucu-8BEJfx59YB',
        //     'value':1.0,
        //     'currency': 'USD'
        // });
        // fb

        // fbq('track', 'Purchase', {currency: "IDR", value: 100000});
        window.open('http://bit.ly/sef-sharfin', '_blank');
        
    });

    $('#beliTiketdua').click(function() {
        // google
         
        // gtag('event', 'conversion', {
        //     'send_to': 'AW-450492567/TVfTCJmkzu8BEJfx59YB',
        //     'value':1.5 ,
        //     'currency': 'USD'
        // });
        // fb
        // fbq('track', 'Purchase', {currency: "IDR", value: 150000});
        window.open('http://bit.ly/sef-sharfin', '_blank')
    });

    $('#beliKontak').click(function() {
        // fbq('track', 'Contact');
        window.open('http://Wa.me/6285607822853', '_blank');
    });

   </script>

   <!-- End Facebook Pixel Code -->

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-PT35WK2PFX"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-PT35WK2PFX');
   </script>

   <!-- Global site tag (gtag.js) - Google Ads: 450492567 -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=AW-450492567">
   </script>
   <script>
      window.dataLayer = window.dataLayer || []; 
        function gtag(){
            dataLayer.push(arguments);
        } 
        gtag('js', new Date()); 
        gtag('config', 'AW-450492567'); 
   </script>

   <script>
      $(document).on("click", "#send-it", function () {
            var a = document.getElementById("chat-input");
            if ("" != a.value) {
                var b = $("#get-number").text(),
                    c = document.getElementById("chat-input").value,
                    d = "https://web.whatsapp.com/send",
                    e = b,
                    f = "&text=" + c;
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
                    var d = "whatsapp://send";
                var g = d + "?phone=" + e + f;
                window.open(g, '_blank')
            }
        }), $(document).on("click", ".informasi", function () {
            document.getElementById("get-number").innerHTML = $(this).children(".my-number").text(), document.getElementById("get-nama").innerHTML = $(this)
                .children(".info-chat").children(".chat-nama").text(), document.getElementById("get-label")
                .innerHTML = $(this).children(".info-chat").children(".chat-label").text()
        }), $(document).on("click", ".close-chat", function () {
            $("#whatsapp-chat").addClass("hide").removeClass("show")
        }), $(document).on("click", ".blantershow-chat", function () {
            $("#whatsapp-chat").addClass("show").removeClass("hide")
        });
   </script>
   <script>
      $(".navbar-nav a").on("click", function(){
      $(".navbar-nav").find(".active").removeClass("active");
      $(this).parent().addClass("active");
    });
   </script>
</body>

</html>