@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Pengaturan
               <small>Slider</small>
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
            <h5>Data Slider Landing Page</h5>
            <button data-toggle="modal" data-target="#modalData" class="btn btn-primary mt-2"><i class="fa fa-plus"></i> Tambah Slider</button>
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
                           <th width="20%">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($slider as $value)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td><img src="{{ asset('upload/slider/'.$value->image) }}" alt="{{ $value->name }}" class="img-fluid" width="200"></td>
                           <td>{!! $value->status ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' !!}</td>
                           <td>
                              <form action="{{ route('dashboard.slider.destroy', $value->id) }}" method="post" id="form-{{ $value->id }}">
                                 @csrf
                                 @method("DELETE")
                                    <a href="{{ route('dashboard.slider.edit', $value->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</a>
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
                           <td colspan="4">
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
                     {{ $slider->appends($data)->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.slider.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="form-group">
                           <label for="image">Image</label>
                           <input name="image" type="file" class="form-control form-control-user @error('image') is-invalid @enderror" required>
                           @error('image')
                           <span class="invalid-feedback" role="alert"></span>
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="name">Status</label>
                           <select name="status" class="form-control" autocomplete="off" required>
                              <option value="" selected disabled>-- Pilih --</option>
                              <option value="1">Aktif</option>
                              <option value="0">Tidak Aktif</option>
                           </select>
                           @error('status')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
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
      const URL_STATUS = `{{ route('dashboard.slider.status') }}`
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