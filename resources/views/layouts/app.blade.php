<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/app.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Bacata</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Terbaru</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Rekomendasi</a>
      </li>
  </div>
</nav> 
<div class="h-100 my-2 d-flex justify-content-center align-items-center border-bottom py-3">
    @isset($category)
    @foreach($category as $c)
    <a href="#"><h5 class="  mx-3">{{$c->category}}</h5></a>
    @endforeach
    @endisset
 
  </div>
<div class="container">
    <div class="row">
        <div class="col-4 py-3" >
    <div class="input-group mb-3">
    <input type="text" class="form-control mr-3" placeholder="Type Keyword Here"  aria-describedby="basic-addon2">
    <div class="input-group-append pl-3">
        <button class="btn btn-primary" type="button">Search</button>
    </div>
    </div>
    </div>
</div>
</div>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendors/tinymce/plugins/code/plugin.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <!-- toastify -->
    <script src="{{asset('assets/vendors/toastify/toastify.js')}}"></script>
    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="{{asset('datetimepicker-master/jquery.js')}}"></script>
    <script src="{{asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/xhrequest.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>

</html>
