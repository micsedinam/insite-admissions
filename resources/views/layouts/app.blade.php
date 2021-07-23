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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Datatables CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/fh-3.1.8/kt-2.6.1/r-2.2.7/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.css"/> --}}
    {{-- <link rel="stylesheet" href="{{asset('DataTables/datatables.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('DataTables/DataTables-1.10.25/css/jquery.dataTables.css')}}">

    <!-- Datatables JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{{asset('DataTables/jQuery-3.3.1/jquery-3.3.1.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/fh-3.1.8/kt-2.6.1/r-2.2.7/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script> --}}
    {{-- <script src="{{asset('DataTables/datatables.js')}}"></script> --}}
    <script src="{{asset('DataTables/jQuery-1.12.4/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('DataTables/DataTables-1.10.25/js/jquery.dataTables.js')}}"></script>

    <script src="https://use.fontawesome.com/384a65e58b.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/login') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        @include('layouts.application-logo')
                    </a>
                @else
                    @if (Auth::user()->is_admin == 1)
                        <a class="navbar-brand" href="{{ url('admin/home') }}">
                            {{-- {{ config('app.name', 'Laravel') }} --}}
                            @include('layouts.application-logo')
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('user/home') }}">
                            {{-- {{ config('app.name', 'Laravel') }} --}}
                            @include('layouts.application-logo')
                        </a>
                    @endif
                @endguest
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                        
                    @else
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-secondary nounderline" href="{{url('user/home')}}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary text-decoration-none" href="{{url('user/payment')}}">New Application</a>
                            </li>
                            {{-- <li class="nav-item px-2"><a class="text-secondary text-decoration-none" href="{{url('user/show')}}">My Applications</a></li> --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">My Applications</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#accessFormModal">Access Form</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="{{url('user/show')}}">My Applications</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endguest
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('sweet::alert')
            @include('flash-message')

            @yield('content')

            <!-- Modal -->
            <div class="modal fade" id="accessFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verify Payment Reference</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <form action="{{route('access.form')}}" method="post">
                                @csrf
    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="" for="reference">Payment Reference <small>(You can find it in your email)</small></label>
                                        <input class="form-control" type="text" id="reference" name="reference" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="col-md-8 offset-md-2 btn btn-primary">Access Form</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
        </main>
    </div>
    
    {{-- <script>
        $('#flash-overlay-modal').modal();
        setTimeout("$('.alert').delay(3000).slideUp(400)",400);
    </script> --}}

    <script>
        // setTimeout(() => {
        //     console.log("ready");
        //     $(document).ready(function() {
        //         // DataTable initialisation
        //         $('#dataTable').DataTable(
        //             {
        //                 "dom": '<"dt-buttons"Bf><"clear">lirtp',
        //                 "paging": true,
        //                 "autoWidth": true,
        //                 "buttons": [
        //                     'colvis',
        //                     'copyHtml5',
        //                     'csvHtml5',
        //                     'excelHtml5',
        //                     'pdfHtml5',
        //                     'print'
        //                 ]
        //             }
        //         );
        //     });
        // }, 2000);
        /* $(document).ready(function() {
            // DataTable initialisation
            $('#example').DataTable(
                {
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": true,
                    "autoWidth": true,
                    "buttons": [
                        'colvis',
                        'copyHtml5',
                        'csvHtml5',
                        'excelHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                }
            );
        }); */

        // $(document).ready(function() {
        //     $('#example').DataTable({
        //         responsive: true,
        //         dom: 'lBfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     });
        // } );
    </script>

    <script src="{{asset('DataTables/jQuery-1.12.4/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js')}}"></script>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>
</html>
