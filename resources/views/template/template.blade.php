<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Bacata</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('img/SITIJAYA LOGO FOOTER.png')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="avatar avatar-xl1" id="okkk">

                            <a href="{{URL::to('/admin')}}"><img src="" style="height: 50px; width: 50px; " alt="Bacata" srcset=""> </a>
                            <p class="" style="font-size: 15px; margin-top: 18px; margin-left: 8px;">
                            </p>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu ">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                            <a href="{{Route('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @if(Auth::user()->hasRole('Supa-Admin'))
                        <li class="sidebar-item {{ Request::is('admin') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class='sidebar-link'>
                                <i class="bi bi-shop-window"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->hasRole('contributor'))
                        <li class="sidebar-item has-sub {{ Request::segment(2)==='news' ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Berita</span>
                            </a>

                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::segment(3)==='draft' ? 'active' : '' }} ">
                                <a href="{{URL::to('/contributor/news/draft')}}">Draft</a>
                            </li>
                            <li class="submenu-item {{ Request::segment(3)==='complete' ? 'active' : '' }} ">
                                <a href="{{URL::to('/contributor/news/complete')}}">Submited</a>
                            </li>
                            <li class="submenu-item {{ Request::segment(3)==='releaspublisheded' ? 'active' : '' }} ">
                                <a href="{{URL::to('/contributor/news/published')}}">Released</a>
                            </li>
                        </ul>
                        </li>
                        <li class="sidebar-item {{ Request::is('admin') ? 'active' : '' }}">
                            <a href="{{Route('notifikasi')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Notifikasi</span> <span class="bg-danger text-white notificate" style="border-radius:10px; width:20px; height:20px">0</span>
                            </a>
                        </li>

                        @endif
                        @if(Auth::user()->hasRole('editor'))
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Berita</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item {{ Request::segment(3)==='draft' ? 'active' : '' }} ">
                                    <a href="{{ route('proposal.index') }}">Proposal</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('editor.published') }}">Published</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item {{ Request::is('admin') ? 'active' : '' }}">
                            <a href="{{URL::to('/editor/contributor-request')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Contributor Request</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Category</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('category.index') }}">Dafar Kategori</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('category.create') }}">Tambah Kategori</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if(Auth::user()->hasRole('user'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('contributor-request.form') }}">
                                <i class="bi bi-person"></i>
                                <span>Contributor Request</span>
                            </a>
                        </li>
                        @endif

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="bi bi-person"></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted" style="margin-top: 160px;">
                    <div style="text-align:center">
                        <p>2021 &copy; Bacata Baca Berita Dong
                    </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendors/tinymce/plugins/code/plugin.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <!-- image editor -->
        <script
            src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
        <!-- toastify -->
        <script src="{{asset('assets/vendors/toastify/toastify.js')}}"></script>
        <!-- filepond validation -->
        <script
            src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script
            src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <!-- filepond -->
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script src="{{asset('datetimepicker-master/jquery.js')}}"></script>
        <script src="{{asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js')}}"></script>

        <script>

            tinymce.init({ selector: '#default' });
            tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code image', plugins: 'code image' });


        </script>

        <script src="{{asset('assets/js/main.js')}}"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script>



    var msg = '{{Session::get('success')}}';
    var err = '{{Session::get('failed')}}';

    var success = '{{Session::has('success')}}';
    var alert = '{{Session::has('failed')}}';
    var id = {{Auth::user()->id}};
    console.log(id);

    if(success){
        Toastify({
                    text: msg,
                    duration: 3000,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
    }

    if(alert){
        Toastify({
                    text: err,
                    duration: 3000,
                    backgroundColor: "#ff0000",
                }).showToast();
    }

    let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);


    $('form #btn-delete').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                form.submit();
            }
        });
    });




   
     </script>
<script src="/js/app.js"></script>
</html>
