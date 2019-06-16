<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ ( !empty($title) ? $title.' | ' : '') }}{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js')}}"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js" type="text/javascript"></script>
    
    {{-- Chart JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" type="text/javascript"></script>

</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper" style="min-height:100vh">

        @if (!empty(Auth::user()))
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Edotel Pamekasan</div>
                </a>
            
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
            
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                @if (Auth::user()->type != 'store_keeper')
                    <!-- Nav Item - Reservasi -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservasi.index') }}">
                            <i class="fas fa-fw fa-bell"></i>
                            <span>Reservasi</span>
                        </a>
                    </li>

                    <!-- Nav Item - Guest In -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guestin.index') }}">
                            <i class="fas fa-fw fa-hotel"></i>
                            <span>Guest List</span>
                        </a>
                    </li>

                    <!-- Nav Item - Cari Kamar -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carikamar.index') }}">
                            <i class="fas fa-fw fa-calendar"></i>
                            <span>Cari Kamar</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                @endif
                
                @if (Auth::user()->type != 'store_keeper')
                    <!-- Nav Item - Menej Kamar -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kamar.index')}}">
                            <i class="fas fa-fw fa-bed"></i>
                            <span>Manajemen Kamar</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                @endif

                @if (Auth::user()->type != 'receptionist')  
                    <!-- Nav Item - Menej Barang -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barang.index') }}">
                            <i class="fas fa-fw fa-boxes"></i>
                            <span>Manajemen Barang</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                @endif

                @if (Auth::user()->type != 'receptionist')
                    <!-- Nav Item - Barang Masuk -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barangmasuk.index') }}">
                            <i class="fas fa-fw fa-sign-in-alt"></i>
                            <span>Barang Masuk</span>
                        </a>
                    </li>

                    <!-- Nav Item - Barang Keluar -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barangkeluar.index') }}">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Barang Keluar</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                @endif

                @if (Auth::user()->type == 'manager' || Auth::user()->type == 'super_admin' )                
                    <!-- Nav Item - Laporan -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">
                            <i class="fas fa-fw fa-clipboard"></i>
                            <span>Laporan</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                @endif

                <!-- Nav Item - Menej Pelanggan -->
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelanggan.index')}}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Manajemen Pelanggan</span>
                    </a>
                </li> --}}
    
            </ul>
            <!-- End of Sidebar -->
        @endif
            
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
    
            <!-- Main Content -->
            <div id="content">
        
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            
                    @if (!empty(Auth::user()))
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <a class="dropdown-item disabled" href="#" role="button">
                                {{ Auth::user()->name }}
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    @else
                        <!-- Sidebar - Brand -->
                        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                            <div class="sidebar-brand-icon">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <div class="sidebar-brand-text mx-3">Edotel Pamekasan</div>
                        </a>
                    @endif
                </nav>
                <!-- End of Topbar -->
        
                <!-- Begin Page Content -->
                <div class="container-fluid">
        
                    <main class="py-4">
                        @yield('content')
                    </main>
                            
                </div>
                <!-- /.container-fluid -->
        
            </div>
            <!-- End of Main Content -->
        
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; EdoTEL Pamekasan 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
    
        </div>
        <!-- End of Content Wrapper -->
    
    </div>
    <!-- End of Page Wrapper -->

</body>
</html>