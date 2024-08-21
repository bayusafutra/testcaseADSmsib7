<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Srikandi Semanggi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap') }}"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css') }}"
        rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap') }}"
        rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    {{-- form --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="form/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/form/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('img/kintil.svg') }}" rel="icon">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}">
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/rating/style.css') }}">
    @yield('css')
    <style type="text/css">
        .pull-right {
            float: right !important;
        }

        .nav-pills>li {
            float: left;
        }

        .nav-pills>li>a {
            border-radius: 4px;
        }

        .nav-pills>li+li {
            margin-left: 2px;
        }

        .nav-pills>li.active>a,
        .nav-pills>li.active>a:focus,
        .nav-pills>li.active>a:hover {
            color: #fff;
            background-color: #337ab7;
        }

        .nav-stacked>li {
            float: none;
        }

        .nav-stacked>li+li {
            margin-top: 2px;
            margin-left: 0;
        }

        .list-group-item.active>.badge,
        .nav-pills>.active>a>.badge {
            color: #337ab7;
            background-color: #fff;
        }

        .list-group-item>.badge {
            float: right;
        }

        .list-group-item>.badge+.badge {
            margin-right: 5px;
        }

        .nav-pills>li>a>.badge {
            margin-left: 3px;
        }

        body {
            color: #797979;
            background: #f1f2f7;
            font-family: 'Open Sans', sans-serif;
            padding: 0px !important;
            margin: 0px !important;
            font-size: 13px;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
        }

        .profile-nav,
        .profile-info {
            margin-top: 30px;
        }

        .profile-nav .user-heading {
            background: #008374;
            color: #fff;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            padding: 30px;
            text-align: center;
        }

        .profile-nav .user-heading.round a {
            border-radius: 50%;
            -webkit-border-radius: 50%;
            border: 10px solid rgba(255, 255, 255, 0.3);
            display: inline-block;
        }

        .profile-nav .user-heading a img {
            width: 112px;
            height: 112px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
        }

        .profile-nav .user-heading h1 {
            font-size: 22px;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .profile-nav .user-heading p {
            font-size: 12px;
        }

        .profile-nav ul {
            margin-top: 1px;
        }

        .profile-nav ul>li {
            border-bottom: 1px solid #ebeae6;
            margin-top: 0;
            line-height: 30px;
        }

        .profile-nav ul>li:last-child {
            border-bottom: none;
        }

        .profile-nav ul>li>a {
            border-radius: 0;
            -webkit-border-radius: 0;
            color: #89817f;
            border-left: 5px solid #fff;
        }

        .profile-nav ul>li>a {
            background-color: white
        }

        /* erga */
        .profile-nav ul>li>a:hover,
        .profile-nav ul>li>a:focus,
        .profile-nav ul li.active a {
            background: #f8f7f5 !important;
            border-left: 5px solid #5B8C51;
            color: #89817f !important;
        }

        .profile-nav ul>li:last-child>a:last-child {
            border-radius: 0 0 4px 4px;
            -webkit-border-radius: 0 0 4px 4px;
        }

        .profile-nav ul>li>a>i {
            font-size: 16px;
            padding-right: 10px;
            color: #bcb3aa;
        }

        .r-activity {
            margin: 6px 0 0;
            font-size: 12px;
        }


        .p-text-area,
        .p-text-area:focus {
            border: none;
            font-weight: 300;
            box-shadow: none;
            color: #c3c3c3;
            font-size: 16px;
        }

        .profile-info .panel-footer {
            background-color: #f8f7f5;
            border-top: 1px solid #e7ebee;
        }

        .profile-info .panel-footer ul li a {
            color: #7a7a7a;
        }

        .bio-graph-heading {
            background: black;
            color: #fff;
            text-align: center;
            font-style: italic;
            padding: 40px 110px;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            font-size: 16px;
            font-weight: 300;
        }

        .bio-graph-info {
            color: #89817e;
        }

        .bio-graph-info h1 {
            font-size: 22px;
            font-weight: 300;
            margin: 0 0 20px;
        }

        .bio-row {
            width: 50%;
            float: left;
            margin-bottom: 10px;
            padding: 0 15px;
        }

        .bio-row p span {
            width: 100px;
            display: inline-block;
        }

        .bio-chart,
        .bio-desk {
            float: left;
        }

        .bio-chart {
            width: 40%;
        }

        .bio-desk {
            width: 60%;
        }

        .bio-desk h4 {
            font-size: 15px;
            font-weight: 400;
        }

        .bio-desk h4.terques {
            color: #4CC5CD;
        }

        .bio-desk h4.red {
            color: #e26b7f;
        }

        .bio-desk h4.green {
            color: #97be4b;
        }

        .bio-desk h4.purple {
            color: #caa3da;
        }

        .file-pos {
            margin: 6px 0 10px 0;
        }

        .profile-activity h5 {
            font-weight: 300;
            margin-top: 0;
            color: #c3c3c3;
        }

        .summary-head {
            background: #ee7272;
            color: #fff;
            text-align: center;
            border-bottom: 1px solid #ee7272;
        }

        .summary-head h4 {
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .summary-head p {
            color: rgba(255, 255, 255, 0.6);
        }

        ul.summary-list {
            display: inline-block;
            padding-left: 0;
            width: 100%;
            margin-bottom: 0;
        }

        ul.summary-list>li {
            display: inline-block;
            width: 19.5%;
            text-align: center;
        }

        ul.summary-list>li>a>i {
            display: block;
            font-size: 18px;
            padding-bottom: 5px;
        }

        ul.summary-list>li>a {
            padding: 10px 0;
            display: inline-block;
            color: #818181;
        }

        ul.summary-list>li {
            border-right: 1px solid #eaeaea;
        }

        ul.summary-list>li:last-child {
            border-right: none;
        }

        .activity {
            width: 100%;
            float: left;
            margin-bottom: 10px;
        }

        .activity.alt {
            width: 100%;
            float: right;
            margin-bottom: 10px;
        }

        .activity span {
            float: left;
        }

        .activity.alt span {
            float: right;
        }

        .activity span,
        .activity.alt span {
            width: 45px;
            height: 45px;
            line-height: 45px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            background: #eee;
            text-align: center;
            color: #fff;
            font-size: 16px;
        }

        .activity.terques span {
            background: #8dd7d6;
        }

        .activity.terques h4 {
            color: #8dd7d6;
        }

        .activity.purple span {
            background: #b984dc;
        }

        .activity.purple h4 {
            color: #b984dc;
        }

        .activity.blue span {
            background: #90b4e6;
        }

        .activity.blue h4 {
            color: #90b4e6;
        }

        .activity.green span {
            background: #aec785;
        }

        .activity.green h4 {
            color: #aec785;
        }

        .activity h4 {
            margin-top: 0;
            font-size: 16px;
        }

        .activity p {
            margin-bottom: 0;
            font-size: 13px;
        }

        .activity .activity-desk i,
        .activity.alt .activity-desk i {
            float: left;
            font-size: 18px;
            margin-right: 10px;
            color: #bebebe;
        }

        .activity .activity-desk {
            margin-left: 70px;
            position: relative;
        }

        .activity.alt .activity-desk {
            margin-right: 70px;
            position: relative;
        }

        .activity.alt .activity-desk .panel {
            float: right;
            position: relative;
        }

        .activity-desk .panel {
            background: #F4F4F4;
            display: inline-block;
        }


        .activity .activity-desk .arrow {
            border-right: 8px solid #F4F4F4 !important;
        }

        .activity .activity-desk .arrow {
            border-bottom: 8px solid transparent;
            border-top: 8px solid transparent;
            display: block;
            height: 0;
            left: -7px;
            position: absolute;
            top: 13px;
            width: 0;
        }

        .activity-desk .arrow-alt {
            border-left: 8px solid #F4F4F4 !important;
        }

        .activity-desk .arrow-alt {
            border-bottom: 8px solid transparent;
            border-top: 8px solid transparent;
            display: block;
            height: 0;
            right: -7px;
            position: absolute;
            top: 13px;
            width: 0;
        }

        .activity-desk .album {
            display: inline-block;
            margin-top: 10px;
        }

        .activity-desk .album a {
            margin-right: 10px;
        }

        .activity-desk .album a:last-child {
            margin-right: 0px;
        }
    </style>
</head>

<body>
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 d-inline-flex align-items-center text-light">
                    <a class="btn btn-link text-light" href="/"><i>Home</i></a>
                    <a class="btn btn-link text-light" href="/profilkampungsemanggi"><i>Profil Kampung Semanggi</i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-5">
        <div class="brand row d-flex align-items-center">
            <div class="col-11">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('img/logo1.png') }}" class="img-fluid" style="height: 75px" alt="">
                </a>
            </div>
            <div class="col-1">
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse px-5" id="navbarCollapse">
            <div class="row justify-content-between">
                <div class="col-auto d-none d-lg-block">
                    <div class="d-flex align-items-center">
                        <form action="/catalog#listproduk">
                            <div class="input-group d-flex flex-end-center" style="width: 16cm">
                                <input class="form-control form-eduprixsearch-control rounded-pill"
                                    id="formGroupExampleInput" type="text" name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Produk apa yang anda cari hari ini?" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="/cart" class="btn p-0 ms-auto position-relative"><i class="fa fa-shopping-cart fs-4"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                    style="background-color: #F68037">
                    @php
                        use App\Models\Cart;
                        if (auth()->user()) {
                            $cart = Cart::where('user_id', auth()->user()->id)->get();
                            echo $cart->count();
                        } else {
                            echo 0;
                        }
                    @endphp
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
            <div class="nav-item dropdown">
                @auth
                    <li class="nav-link dropdown-toggle fs-5" data-bs-toggle="dropdown" style="color: black">
                        {{ auth()->user()->username }}</li>
                    <li class="dropdown-menu rounded-0 rounded-bottom m-0">
                        @can('admin')
                            <a href="/dashboard" class="dropdown-item py-2">Administrator</a>
                            <hr style="border: 2px black">
                        @endcan
                        <a class="dropdown-item py-2" href="/profilpengguna" style="text-decoration: none">Profil
                            Pengguna</a>
                        <a class="dropdown-item py-2" href="/ubahpassword" style="text-decoration: none">Ubah
                            Password</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="dropdown-item py-2" style="color: black">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-link dropdown-toggle fs-5" data-bs-toggle="dropdown" style="color: black">User</li>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="/login" class="dropdown-item">Login</a>
                        <a href="/signup" class="dropdown-item">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    @yield('kontent')

    <div class="container-fluid footer mt-5 pt-5 wow fadeIn"
        style="background-color: #C0E6B7; color: black; position: relative; bottom: 0" data-wow-delay="0.1s">
        <div class="container py-5 d-flex justify-content-center">
            <div class="row g-5">
                <div class="col-lg-4">
                    {{-- <h1 class="fw-bold text-primary mb-4">Srikandi<span class="text-warning">Semanggi</span></h1> --}}
                    <img src="{{ asset('img/logo1.png') }}" class="img-fluid" alt="">
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1 text-dark" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1 text-dark" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1 text-dark" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0 text-dark" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4 class="text-dark mb-4">Address</h4>
                    <p><i class="fa fa-map-marker me-3"></i>Jalan Kendung IX, Sememi, Kec. Benowo,
                        Kota Surabaya, Jawa Timur</p>
                    <p><i class="fa fa-phone me-3"></i>0838 5744 9383</p>
                    <p><i class="fab fa-instagram me-3"></i>@srikandi_semanggi</p>
                </div>
                <div class="col-lg-2">
                    <h4 class="text-dark mb-4">Quick Links</h4>
                    <a class="btn btn-link" style="color: black" href="/">Home</a>
                    <a class="btn btn-link" style="color: black" href="/profilkampungsemanggi">Profile</a>
                    <a class="btn btn-link" style="color: black" href="/catalog">Catalog</a>
                    @guest
                        <a class="btn btn-link" style="color: black" href="/login">Login</a>
                        <a class="btn btn-link" style="color: black" href="/signup">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary text-body copyright py-4">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-semi-bold" style="color: #E7B10A" href="#"><span
                            style="color:rgb(10, 67, 37)">Srikandi</span> Semanggi 2023</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <span style="font-style: italic">Gebang Software House</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F1RTS0P1CD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-F1RTS0P1CD');
    </script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>

</html>
