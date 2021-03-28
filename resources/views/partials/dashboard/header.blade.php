<div class="page-main-header">
   <div class="main-header-left">
      <div class="logo-wrapper">
         <a href="index.html">
            <img src="{{ asset('assets/images/dataimg/LogoKH.png') }}" style="margin-bottom:20px;margin-top:20px;margin-left:20px; " class="image-dark" alt="" />
            <img src="{{ asset('assets/images/dataimg/LogoKH.png') }}" class="image-light" alt="" />
         </a>
      </div>
   </div>
   <div class="main-header-right row">
      <div class="mobile-sidebar">
         <div class="media-body text-right switch-sm">
            <label class="switch">
               <input type="checkbox" id="sidebar-toggle" checked>
               <span class="switch-state"></span>
            </label>
         </div>
      </div>
      <div class="nav-right col">
         <ul class="nav-menus">
            <li class="onhover-dropdown">
               <div class="media  align-items-center">
                  <img class="align-self-center pull-right mr-2" src="{{ asset('assets-dashboard/images/dashboard/user.png') }}"
                     alt="header-user" />
                  <div class="media-body">
                     <h6 class="m-0 txt-dark f-16">
                        My Account
                        <i class="fa fa-angle-down pull-right ml-2"></i>
                     </h6>
                  </div>
               </div>
               <ul class="profile-dropdown onhover-show-div p-20">
                  <li>
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        <i class="icon-power-off"></i>
                        Logout
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
         <div class="d-lg-none mobile-toggle">
            <i class="icon-more"></i>
         </div>
      </div>
   </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
   @csrf
</form>