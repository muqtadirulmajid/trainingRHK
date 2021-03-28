@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Dashboard 
            </h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- Container-fluid Ends -->

<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>Selamat Datang di halaman administrator</h5> 
            </div>
            <div class="card-body">
               <p>
                  Halaman ini merupakan tempat untuk mengelola semua konten pada landing page. Jadi setiap ada perubahan data pada konten landing page silahkan akses halaman ini dengan cara melakukan login terlebih dahulu.   
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Container-fluid starts -->
@endsection