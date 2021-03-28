@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Materi</h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item active">Materi</li>
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
            <h5>Data partner</h5>
            <a href="{{ route('dashboard.detail_materi.create_partner', [
               'slug' => $slug,
               'year' => $year,
               'month' => $month
            ]) }}" class="btn btn-primary mt-2"><i class="fa fa-plus"></i> Tambah {{ $raw_data->name }}</a>
         </div>
         <div class="card-body row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Image</th>
                           <th>Nama</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($partner as $value)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td><img src="{{ asset('upload/partner/'. $value->image) }}" alt="{{ $value->image }}" class="img-fluid" width="200"></td>
                              <td>{{ $value->name }}</td>
                              <td>{{ $value->description }}</td>
                              <td>
                                 <form action="{{ route('partner.destroy', $value->id) }}" method="post" id="form-{{ $value->id }}">
                                    @csrf
                                    @method("DELETE")
                                       <a href="{{ route('partner.edit', $value->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</a>
                                       <button type="button" data-id="{{ $value->id }}" class="btn btn-danger my-1 hapus">
                                       <i class="fa fa-trash"></i> Hapus
                                    </button>
                                 </form>
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
                           <th>Image</th>
                           <th>Nama</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                        </tr>
                     </tfoot>
                  </table>
                  <div class="mt-2">
                     {{ $partner->appends($data)->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('assets-dashboard/css/sweetalert.min.css') }}">
@endsection

@section('js')
   <script src="{{ asset('assets-dashboard/js/sweet-alert/sweetalert.min.js') }}"></script>
   <script>
      $(".hapus").on('click', function () {
         Swal.fire({
               title: 'Yakin?',
               text: "Ingin menghapus data ini!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               cancelButtonText: 'Tidak',
               confirmButtonText: 'Ya!'
         }).then((result) => {
               if (result.isConfirmed) {
                  let id = $(this).data('id')
                  $(`#form-${id}`).submit()
               }
         })
      })
   </script>
@endsection