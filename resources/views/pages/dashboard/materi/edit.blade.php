@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Edit Materi</h3>
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
            <h5>Edit Materi</h5>
         </div>
         <div class="card-body row container">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <form action="{{ route('dashboard.materi.update', $training->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="form-group">
                     <label for="">Judul</label>
                     <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $training->title }}">
                     @error('title')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Gambar <span class="text-danger">Kosongkan jika tidak update gambar</span></label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                           @error('image')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <img src="{{ asset('upload/training/'.$training->image) }}" alt="{{ $training->name }}" width="200" class="img=fluid">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Tanggal Awal</label>
                           <input type="text" name="start" class="form-control digits @error('start') is-invalid @enderror" id="startDate" value="{{ date('m/d/Y', strtotime($training->start)) }}">
                           @error('start')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Tanggal Akhir</label>
                           <input type="text" name="end" class="form-control digits @error('end') is-invalid @enderror" id="endDate" value="{{ date('m/d/Y', strtotime($training->end)) }}">
                           @error('end')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="">Subtitle</label>
                     <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ $training->subtitle }}">
                     @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label for="">Deskripsi Singakt (Di Landing Page)</label>
                     <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $training->description }}">
                     @error('description')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label for="">Deskripsi Lengkap</label>
                     <textarea name="description2" class="form-control @error('description2') is-invalid @enderror">{{ $training->description2 }}</textarea>
                     @error('description2')
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

@section('css')
   <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/date-picker.css') }}">
@endsection

@section('js')
<script src="{{ asset('assets-dashboard/js/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets-dashboard/js/date-picker/datepicker.en.js') }}"></script>
<script>
   $(document).ready(function(){
      let start_date
      $('#startDate').datepicker({
         language: 'en',
         minDate: new Date(),
         position: 'top left',
         onSelect: function(dateText){
            start_date = new Date(dateText)
            $('#endDate').datepicker({
               language: 'en',
               minDate: start_date,
               position: 'top left',
            })
         }
      })

      $('#endDate').datepicker({
         language: 'en',
         minDate: new Date(`{{ $training->start }}`),
         position: 'top left',
      })

   })
</script>
@endsection