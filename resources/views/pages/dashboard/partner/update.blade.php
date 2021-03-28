@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Update partner</h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item"><a href="{{ route('dashboard.detail_materi.create', [
                  'slug' => $partner->training->slug,
                  'year' => $partner->training->year,
                  'month' => $partner->training->month,
                  'jenis' => 'partner'
               ]) }}">{{ $partner->training->title }}</a></li>
               <li class="breadcrumb-item active">partner</li>
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
            <h5>Update partner</h5>
         </div>
         <div class="card-body row container">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <form action="{{ route('partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="form-group">
                     <label for="">Nama</label>
                     <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $partner->name }}">
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label for="">Deskripsi</label>
                     <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $partner->description }}">
                     @error('description')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Gambar <span class="text-danger">Kosongkan jika tidak update gambar</span></label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
                           @error('image')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <img src="{{ asset('upload/partner/'.$partner->image) }}" alt="{{ $partner->image }}" class="img-fluid" width="200">
                     </div>
                  </div>
                  <button class="btn btn-success" type="submit">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection