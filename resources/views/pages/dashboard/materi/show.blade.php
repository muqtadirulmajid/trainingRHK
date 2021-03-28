@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Detail Materi</h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item"><a href="{{ route('dashboard.materi.index') }}">{{ $training->title }}</a></li>
               <li class="breadcrumb-item active">Detail Materi</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- Container-fluid Ends -->
<div class="container-fluid">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
            <h5>Detail Materi</h5>
         </div>
         <div class="card-body row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Jenis</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($raw_detail as $value)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $value->name }}</td>
                              <td>{{ $value->type }}</td>
                              <td>
                                 <a href="{{ route('dashboard.detail_materi.create', [
                                    'slug' => $slug,
                                    'year' => $year,
                                    'month' => $month,
                                    'jenis' => $value->code
                                 ]) }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Jenis</th>
                           <th>Aksi</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection