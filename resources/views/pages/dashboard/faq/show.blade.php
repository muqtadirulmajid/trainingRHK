@extends('layouts.dashboard')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <h3>Edit FAQ</h3>
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
            <h5>Edit FAQ</h5>
         </div>
         <div class="card-body row container">
            <div class="col-sm-12 col-lg-12 col-xl-12">
               <form action="{{ route('faq.update', $id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="form-group">
                     <label for="">FAQ</label>
                     <textarea name="faq" id="faq" cols="30" rows="20"
                        class="form-control @error('image') is-invalid @enderror">{{ $faq->faq }}</textarea>
                     @error('image')
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

@section('js')
<script src="{{ asset('assets-dashboard/tinymce/tinymce.min.js') }}"></script>
<script>
   const editor_config = {
      selector: 'textarea',
      directionality: document.dir,
      path_absolute: "/",
      menubar: 'edit insert view format table',
      plugins: [
            "advlist autolink lists link image charmap preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media save table contextmenu directionality",
            "paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | formatselect styleselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen code",
      relative_urls: false,
      language: document.documentElement.lang,
      height: 500,
      paste_data_images: true,
   }
   tinymce.init(editor_config);
</script>
@endsection