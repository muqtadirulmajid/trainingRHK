@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Dokumen Pelatihan</h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item active">Dokumen Pelatihan</li>
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
            <h5>Data Dokumen Pelatihan</h5>
            <button data-toggle="modal" data-target="#modalData" class="btn btn-primary mt-2"><i class="fa fa-plus"></i> Tambah Dokumen Pelatihan</button>
         </div>
         <div class="card-body row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th width="30%">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($document as $value)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $value->name }}</td>
                           <td>
                              <form action="{{ route('destroy.document', $value->id) }}" method="post" id="form-{{ $value->id }}">
                                 @csrf
                                 @method("DELETE")
                                    <a href="{{ route('edit.document', $value->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('document.show', $value->id) }}" class="btn btn-warning"><i class="fa fa-plus"></i></a>
                                    <button type="button" data-id="{{ $value->id }}" class="btn btn-danger my-1 hapus">
                                    <i class="fa fa-trash"></i>
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
                           <th>Nama</th>
                           <th>Aksi</th>
                        </tr>
                     </tfoot>
                  </table>
                  <div class="mt-2">
                     {{ $document->appends($data)->links() }}
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
            <form action="{{ route('document.store') }}" method="post">
               @csrf
               <input type="hidden" name="month" value="{{ $month }}">
               <input type="hidden" name="year" value="{{ $year }}">
               <input type="hidden" name="slug" value="{{ $slug }}">
               <div class="modal-body">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="form-group">
                           <label for="name">Name</label>
                           <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Name" required>
                           @error('name')
                           <span class="invalid-feedback" role="alert"></span>
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