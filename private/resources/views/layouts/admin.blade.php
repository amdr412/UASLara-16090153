<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pemetaan Rambu</title>
    <link href="{{ asset('./public/admin/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./public/admin/vendors/base/vendor.bundle.base.css') }}" rel="stylesheet">
    <link href="{{ asset('./public/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('./public/admin/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('./public/images/dishub.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('./public/admin/docs/images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin="" />
    
    
</head>
<style>
    #map {
        height: 30%;
        width: 48vw;
        margin: auto;
    }

</style>

<body id="page-top">
    <div id="wrapper">
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex justify-content-center">
                    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                        <a class="navbar-brand brand-logo" href="{{route('home')}}"><img
                                src="{{asset('./public/images/logo_navbar2.png')}}" width="100%" /></a>
                        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img
                                src="{{asset('./public/images/dishub.png')}}" alt="logo" /></a>
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                            data-toggle="minimize">
                            <span class="mdi mdi-sort-variant"></span>
                        </button>
                    </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown mr-1">
                            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                                id="messageDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-message-text mx-0"></i>
                                <span class="count"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="messageDropdown">
                                <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                                <a class="dropdown-item">
                                    <div class="item-thumbnail">
                                        <img src="./public/admin/images/faces/face3.jpg" alt="image" class="profile-pic">
                                    </div>
                                    <div class="item-content flex-grow">
                                        <h6 class="ellipsis font-weight-normal"> Johnson
                                        </h6>
                                        <p class="font-weight-light small-text text-muted mb-0">
                                            Upcoming board meeting
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown mr-4">
                            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
                                id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell mx-0"></i>
                                <span class="count"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="notificationDropdown">
                                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                                <a class="dropdown-item">
                                    <div class="item-thumbnail">
                                        <div class="item-icon bg-info">
                                            <i class="mdi mdi-account-box mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="font-weight-normal">New user registration</h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            2 days ago
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">
                                <i class="mdi mdi-home menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#data_lokasi" aria-expanded="false"
                                aria-controls="data_lokasi">
                                <i class="mdi mdi-database-check menu-icon"></i>
                                <span class="menu-title"> Data Lokasi</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="data_lokasi">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{route('lokasi_kebutuhan_index')}}">Lokasi Kebutuhan Rambu</a></li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{route('lokasi_ketersediaan_index')}}">Lokasi Ketersediaan Rambu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                                aria-controls="ui-basic">
                                <i class="mdi mdi-table menu-icon"></i>
                                <span class="menu-title">Master Data</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{route('jenis_rambu_index')}}">Data
                                            Jenis Rambu</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{route('rambu_index')}}">Data
                                            Rambu</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{route('kecamatan_index')}}">Data
                                            Kecamatan</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{route('kelurahan_index')}}">Data
                                            Kelurahan</a></li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{route('pejabat_struktural_index')}}">Data
                                            Pejabat Struktural</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('laporan_masyarakat_data')}}">
                                <i class="mdi mdi-email menu-icon"></i>
                                <span class="menu-title">Laporan Masyarakat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user_index')}}">
                            <i class="mdi mdi-account-circle  menu-icon"></i>
                                <span class="menu-title">Data User</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                @yield('content')

                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019</i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    </div>
</body>
    <script src="{{ asset('./public/js/app.js') }}"></script>

    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="crossorigin=""></script>
    <script src="{{ asset('./public/sweetalert\sweetalert.min.js') }}"></script>
    <!-- plugins:js -->
    <script src="{{ asset('./public//admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('./public/admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('./public/admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('./public/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('./public/admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('./public/admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('./public/admin/js/template.js') }}"></script>    
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('./public/admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('./public/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('./public/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('./public/admin/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('./public/admin/js/file-upload.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    @stack('scripts')
</html>
