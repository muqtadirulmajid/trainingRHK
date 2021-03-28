@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Update
               <small>Edit Document {{ $document->name }}</small>
            </h3>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
               <li class="breadcrumb-item active">Document</li>
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
            <h5>Edit Document {{ $document->name }}</h5>
         </div>
         <div class="card-body row container">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <form action="{{ route('update.document', $document->id) }}" method="POST">
                  @csrf
                  @method("PUT")
                  <div class="form-group">
                     <label for="">Nama</label>
                     <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $document->name }}">
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <button class="btn btn-success" type="submit">Update</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection