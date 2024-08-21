<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Srikandi Semanggi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @yield('meta')
    <!-- Google Font -->
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap') }}" rel="stylesheet">
    <!-- Dalam bagian head -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('det/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('det/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('det/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('det/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('det/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('det/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('det/css/style.css') }}" type="text/css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('img/kintil.svg') }}" rel="icon">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
    @yield('css')
</head>

<body>
    {{-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div> --}}

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
                                    id="formGroupExampleInput" type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Produk apa yang anda cari hari ini?" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="/cart" class="btn p-0 ms-auto position-relative"><i class="fa fa-shopping-cart fs-4"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #F68037">
                    @php
                        use App\Models\Cart;
                        if(auth()->user()){
                            $cart = Cart::where("user_id", auth()->user()->id)->get();
                            echo $cart->count();
                        }else {
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
                        <a class="dropdown-item py-2" href="/profilpengguna" style="text-decoration: none">Profil Pengguna</a>
                        <a class="dropdown-item py-2" href="/ubahpassword" style="text-decoration: none">Ubah Password</a>
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

    <!-- Shoping Cart Section Begin -->
    <div class="ShopCart">
        @yield('content')
    </div>

    <div class="container-fluid footer mt-5 pt-5 wow fadeIn" style="background-color: #C0E6B7; color: black; position: relative; bottom: 0" data-wow-delay="0.1s">
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
                    <p><i class="fa fa-map-marker-alt me-3"></i>Jalan Kendung IX, Sememi, Kec. Benowo,
                        Kota Surabaya, Jawa Timur</p>
                    <p><i class="fa fa-phone-alt me-3"></i>0838 5744 9383</p>
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

    @yield('js')

    <!-- Js Plugins -->
    <script src="{{ asset('det/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('det/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('det/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('det/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('det/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('det/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('det/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('det/js/main.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

</body>

</html>
