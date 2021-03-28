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
            <h5>Data Gallery</h5>
            <a href="{{ route('dashboard.detail_materi.create_gallery', [
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
                           <th>Status</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($gallery as $value)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td><img src="{{ asset('upload/gallery/'. $value->image) }}" alt="{{ $value->image }}" class="img-fluid" width="200"></td>
                              <td>{!! $value->status ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' !!}</td>
                              <td>
                                 <form action="{{ route('gallery.destroy', $value->id) }}" method="post" id="form-{{ $value->id }}">
                                    @csrf
                                    @method("DELETE")
                                       <a href="{{ route('gallery.edit', $value->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</a>
                                       @if ($value->status)
                                          <button type="button" data-id="{{ $value->id }}" class="btn btn-warning my-1 nonaktif"> Non Aktifkan</button>
                                       @else
                                          <button type="button" data-id="{{ $value->id }}" class="btn btn-success my-1 aktif"> Aktifkan</button>
                                       @endif
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
                           <th>Status</th>
                           <th>Aksi</th>
                        </tr>
                     </tfoot>
                  </table>
                  <div class="mt-2">
                     {{ $gallery->appends($data)->links() }}
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
      const URL_STATUS = `{{ route('gallery.status') }}`
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

      $(".nonaktif").on('click', function () {
         Swal.fire({
               title: 'Yakin?',
               text: "Ingin Nonaktifkan data ini!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               cancelButtonText: 'Tidak',
               confirmButtonText: 'Ya!'
         }).then((result) => {
               if (result.isConfirmed) {
                  let id = $(this).data('id')
                  window.location.replace(`${URL_STATUS}/${id}/0`)
               }
         })
      })

      $(".aktif").on('click', function () {
         Swal.fire({
               title: 'Yakin?',
               text: "Ingin Aktifkan data ini!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               cancelButtonText: 'Tidak',
               confirmButtonText: 'Ya!'
         }).then((result) => {
               if (result.isConfirmed) {
                  let id = $(this).data('id')
                  window.location.replace(`${URL_STATUS}/${id}/1`)
               }
         })
      })
   </script>
@endsection