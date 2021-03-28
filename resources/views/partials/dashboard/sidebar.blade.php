<div class="page-sidebar custom-scrollbar">
   <div class="sidebar-user text-center">
      <div>
         <img class="img-50 rounded-circle" src="{{ asset('assets-dashboard/images/user/1.jpg') }}" alt="#">
      </div>
      <h6 class="mt-3 f-12">{{ auth()->user()->name }}</h6>
   </div>
   @php
      $landing = request()->segment(2) == 'landing'
   @endphp
   <ul class="sidebar-menu">
      <li class="{{ $landing ? 'active' : '' }}">
         <div class="sidebar-title">Landing Page</div>
         <a href="{{ route('dashboard') }}" class="sidebar-header">
            <i class="icon-desktop"></i><span>Dashboard</span>
         </a>
         <a href="#" class="sidebar-header">
            <i class="icon-rocket"></i><span>Landing Page</span>
            <i class="fa fa-angle-right pull-right"></i>
         </a>
         <ul class="sidebar-submenu {{ $landing ? 'menu-open' : '' }}">
            <li><a href="{{ route('dashboard.landing_page') }}"><i class="fa fa-angle-right"></i>Pengaturan</a></li>
            <li><a href="{{ route('dashboard.slider') }}"><i class="fa fa-angle-right"></i>Slider</a></li>
         </ul>
         <a href="{{ route('dashboard.materi.index') }}" class="sidebar-header">
            <i class="icofont icofont-tasks"></i><span>Materi</span>
         </a>
      </li>
   </ul>
   <div class="sidebar-widget text-center">
      <div class="sidebar-widget-top">
         <h6 class="mb-2 fs-14">Need Help</h6>
         <i class="icon-bell"></i>
      </div>
      <div class="sidebar-widget-bottom p-20 m-20">
         <p>0856-0404-1552
            <br>Muqtadirul Majid 
         </p>
      </div>
   </div>
</div>