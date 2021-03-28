@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Pengaturan
               <small>Edit Landing Page</small>
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
            <h5>Edit {{ $landing->name }}</h5>
         </div>
         <div class="card-body row container">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <form action="{{ route('dashboard.landing.update', $landing->code) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="form-group">
                     <label for="">{{ $landing->name }}</label>
                     @if ($landing->type != 'area')
                        <input class="form-control @error('value') is-invalid @enderror" type="{{ $landing->type }}" name="value" value="{{ $landing->value }}">
                        @error('value')
                           <span class="invalid-feedback" role="alert"></span>
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                     @else
                        <textarea class="form-control" name="value" cols="30" rows="10">{{ $landing->value }}</textarea>
                     @endif
                  </div>
                  <button class="btn btn-success" type="submit">Update</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection