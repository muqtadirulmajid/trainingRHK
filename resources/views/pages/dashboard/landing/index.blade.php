@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Pengaturan
               <small>Landing Page</small>
            </h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item active">Pengaturan</li>
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
            <h5>Data Landing Page</h5>
         </div>
         <div class="card-body row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Kode</th>
                           <th>Nama</th>
                           <th>Update Terakhir</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($landing_page as $value)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $value->code }}</td>
                           <td>{{ $value->name }}</td>
                           <td>{{ ($value->created_at == $value->updated_at) ? '-' : Carbon\Carbon::parse($value->updated_at)->isoFormat('D MMMM Y') }}</td>
                           <td>
                              <a href="{{ route('dashboard.landing.edit', $value->code) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                           </td>
                        </tr>
                        @empty
                        <tr>
                           <td colspan="5">
                               <div class="text-center mb-3 p-5 bg-light">
                                   <img class="mb-3" height="50px" src="{{ asset('images/null-icon.svg') }}" alt="">
                                   <h6>Tidak Ada Data</h6>
                               </div>
                           </td>
                        </tr>
                        @endforelse
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>No</th>
                           <th>Kode</th>
                           <th>Nama</th>
                           <th>Update Terakhir</th>
                           <th>Aksi</th>
                        </tr>
                     </tfoot>
                  </table>
                  <div class="mt-2">
                     {{ $landing_page->appends($data)->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection