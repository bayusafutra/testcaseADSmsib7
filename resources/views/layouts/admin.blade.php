<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('../../assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/vendors/css/vendor.bundle.base.css') }}">
      <link rel="stylesheet" href="{{ asset('../../assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('../../assets/images/anjay2.svg') }}" />
    <style>
        input[type=file]::file-selector-button {
            margin-top: -4px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
    @yield('css')
</head>

<body>

    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="/dashboard"><img src="{{ asset('assets/images/anjay.svg') }}"
                        alt="logo" style="height: 100px;" /></a>
                <a class="sidebar-brand brand-logo-mini" href="/dashboard"><img
                        src="{{ asset('../../assets/images/anjay2.svg') }}" style="height: 10cm;" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                @if (auth()->user()->gambar)
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('storage/' . auth()->user()->gambar) }}">
                                @else
                                    <img class="img-xs rounded-circle"
                                        src="https://cdn-icons-png.flaticon.com/512/21/21104.png">
                                @endif
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">{{ ucwords(auth()->user()->name) }}</h5>
                                <span>{{ auth()->user()->username }}</span>
                            </div>
                        </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="/dashboard">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="/">
                        <span class="menu-icon">
                            <i class="mdi mdi-bank text-success"></i>
                        </span>
                        <span class="menu-title">Srikandi Semanggi</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false"
                        aria-controls="master">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Master</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="master">
                        <ul class="nav flex-column sub-menu">
                            {{-- <li class="nav-item"><a class="nav-link" href="/dash-user">User</a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="/dash-kategori">Kategori Produk</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/dash-produk">Produk</a></li>
                            <li class="nav-item"><a class="nav-link" href="/dash-metodepembayaran">Metode Pembayaran</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false"
                        aria-controls="transaksi">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-bar"></i>
                        </span>
                        <span class="menu-title">Transaksi</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="transaksi">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/dash-pesanan">Pesanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="/dash-pembayaran">Pembayaran</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="/dashboard"><img
                            src="../../assets/images/anjay2.svg" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link btn btn-lg create-new-button"
                                style="background-color: #104d45" id="createbuttonDropdown" data-toggle="dropdown"
                                aria-expanded="false" href="#">+ Tambah Data Master</a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="createbuttonDropdown">
                                <h6 class="p-3 mb-0">Data Master</h6>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item" href="/dash-buatkategori">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-web text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Kategori Produk</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item" href="/dash-buatproduk">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-file-outline text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Produk</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item" href="/dash-tambahmetodepembayaran">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi mdi-cash-usd text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Metode Pembayaran</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    @if (auth()->user()->gambar)
                                        <img class="img-xs rounded-circle"
                                            src="{{ asset('storage/' . auth()->user()->gambar) }}">
                                    @else
                                        <img class="img-xs rounded-circle"
                                            src="https://cdn-icons-png.flaticon.com/512/21/21104.png">
                                    @endif
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ ucwords(auth()->user()->name) }}
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profil</h6>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Log out</p>
                                        </div>
                                    </button>
                                </form>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('erga')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright&copy; <a
                                href="/" style="font-style: italic">Website Srikandi Semanggi</a> 2023</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/assets/js/misc.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('https://cdn.amcharts.com/lib/5/themes/Animated.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.23/jquery.inputmask.min.js') }}">
    </script>

    <!-- plugins:js -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('../../assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('../../assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('../../assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('../../assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('../../assets/js/select2.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->


</body>

</html>
{{--  --}}
