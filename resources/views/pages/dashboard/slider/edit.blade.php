@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Pengaturan
               <small>Edit Slider</small>
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
            <h5>Edit Slider</h5>
         </div>
         <div class="card-body row container">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <form action="{{ route('dashboard.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="form-group">
                     <label for="">Gambar</label>
                     <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                     @error('image')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label for="name">Status</label>
                     <select name="status" class="form-control @error('status') is-invalid @enderror" autocomplete="off" required>
                        <option value="" selected disabled>-- Pilih --</option>
                        <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                     </select>
                     @error('status')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <img src="{{ asset('upload/slider/'.$slider->image) }}" alt="{{ $slider->name }}" class="img-fluid" width="200">
                  </div>
                  <button class="btn btn-success" type="submit">Update</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection