<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description"
      content="universal admin is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities.">
   <meta name="keywords"
      content="admin template, universal admin template, dashboard template, flat admin template, responsive admin template, web app">
   <meta name="author" content="pixelstrap">
   <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/dataimg/logoKhTop.png') }}">
   <link rel="icon" href="{{ asset('assets/images/dataimg/logoKhTop.png') }}" type="image/x-icon" />
   <title>@yield('title', 'Knowledge hub - Dashboard')</title>

   <!--Google font-->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

   <link rel="stylesheet" href="{{ asset('assets-dashboard/css/animate.css') }}">

   <!-- Font Awesome -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/fontawesome.css') }}">

   <!-- ico-font -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/icofont.css') }}">

   <!-- Themify icon -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/themify.css') }}">

   <!-- Flag icon -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/flag-icon.css') }}">

   <!-- Bootstrap css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/bootstrap.css') }}">

   <!-- App css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/style.css') }}">

   <!-- Responsive css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/responsive.css') }}">

   @yield('css')

</head>

<body {!! (greetings() == 'malam' || greetings() == 'sore') ? 'main-theme-layout="main-theme-layout-4"' : '' !!}>
{{-- <body> --}}

   <!-- Loader starts -->
   <div class="loader-wrapper">
      <div class="loader bg-white">
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <h4>Have a great day at work today <span>&#x263A;</span></h4>
      </div>
   </div>
   <!-- Loader ends -->

   <!--page-wrapper Start-->
   <div class="page-wrapper">

      <!--Page Header Start-->
      @include('partials.dashboard.header')
      <!--Page Header Ends-->

      <!--Page Body Start-->
      <div class="page-body-wrapper">
         <!--Page Sidebar Start-->
         @include('partials.dashboard.sidebar')
         <!--Page Sidebar Ends-->

         <div class="page-body">
            @yield('content')
         </div>
      </div>
      <!--Page Body Ends-->

   </div>
   <!--page-wrapper Ends-->

   <!-- latest jquery-->
   <script src="{{ asset('assets-dashboard/js/jquery-3.2.1.min.js') }}"></script>

   <!-- Bootstrap js-->
   <script src="{{ asset('assets-dashboard/js/bootstrap/popper.min.js') }}"></script>
   <script src="{{ asset('assets-dashboard/js/bootstrap/bootstrap.js') }}"></script>

   <!-- Sidebar jquery-->
   <script src="{{ asset('assets-dashboard/js/sidebar-menu.js') }}"></script>

   <!-- Theme js-->
   <script src="{{ asset('assets-dashboard/js/script.js') }}"></script>

   <script src="{{ asset('assets-dashboard/js/notify/bootstrap-notify.min.js') }}"></script>
   <script src="{{ asset('assets-dashboard/js/notify/notify-script.js') }}"></script>

   @yield('js')

   <script>
      $(document).ready(function() {
         @if(session('success'))
            $.notify({
               message: `{!! session('success') !!}` 
            },{
               timer: 2000,
               type: 'success',
               delay: 1000,
               animate: {
                  enter:'animated slideInDown',
                  exit:'animated slideOutUp'
               }
            })
         @endif

         @if(session('error'))
            $.notify({
               message: `{!! session('error') !!}` 
            },{
               timer: 2000,
               type: 'danger',
               delay: 1000,
               animate: {
                  enter:'animated slideInDown',
                  exit:'animated slideOutUp'
               }
            })
         @endif
      })
   </script>

</body>

</html>