@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Update Gallery</h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item"><a href="{{ route('dashboard.detail_materi.create', [
                  'slug' => $gallery->training->slug,
                  'year' => $gallery->training->year,
                  'month' => $gallery->training->month,
                  'jenis' => 'gallery'
               ]) }}">{{ $gallery->training->title }}</a></li>
               <li class="breadcrumb-item active">Gallery</li>
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
            <h5>Update Gallery</h5>
         </div>
         <div class="card-body row container">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Gambar</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                           @error('image')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <img src="{{ asset('upload/gallery/'.$gallery->image) }}" alt="{{ $gallery->image }}" class="img-fluid" width="200">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="">Status</label>
                     <select name="status" class="form-control @error('image') is-invalid @enderror" autocomplete="off">
                        <option value="1" {{ $gallery->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $gallery->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                     </select>
                     @error('status')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <button class="btn btn-success" type="submit">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection