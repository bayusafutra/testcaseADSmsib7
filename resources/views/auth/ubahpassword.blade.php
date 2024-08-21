<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    {{-- <link href="{{ asset('img/logotab.svg') }}" rel="icon"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('img/kintil.svg') }}" rel="icon">
    <title>{{ $title }}</title>
</head>

<body>
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

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/login.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="logo">
                            <img class="img-fluid" src="img/logo1.png" alt="">
                        </div>
                        <h3 class="text-center">Ubah Password</h3>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show col-md-12"
                                style="margin-left: 100px" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="/ubahpassword" method="post">
                            @csrf
                            <div class="form-floating mb-4 mt-4">
                                <input type="password" id="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="current_password" name="current_password" autofocus required
                                    value="{{ old('current_password') }}" />
                                <label for="current_password">Password saat ini</label>
                                @error('current_password')
                                    <div class="invalid-feedback"></div>
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="form-floating mb-4 mt-4">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="password" name="password" autofocus required
                                    value="{{ old('password') }}" />
                                <label for="password">Password baru</label>
                                @error('password')
                                    <div class="invalid-feedback"></div>
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="form-floating mb-4 mt-4">
                                <input type="password" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="password_confirmation" name="password_confirmation" autofocus
                                    required value="{{ old('password_confirmation') }}" />
                                <label for="password_confirmation">Konfirmasi passsword baru</label>
                                @error('password_confirmation')
                                    <div class="invalid-feedback"></div>
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="pt-1 mt-3 mb-4 d-flex justify-content-center text-center">
                                <button class="btn btn-success btn-lg btn-block"
                                    style="padding: 10px 100px 10px 100px" type="submit">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid footer mt-5 pt-5 wow fadeIn"
        style="background-color: #C0E6B7; color: black; position: relative; bottom: 0" data-wow-delay="0.1s">
        <div class="container py-5 d-flex justify-content-center">
            <div class="row g-5">
                <div class="col-lg-4">
                    <img src="{{ asset('img/logo1.png') }}" class="img-fluid" alt="">
                    <p style="color: black; font-weight: 400">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
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
                    <p style="color: black; font-weight: 400"><i class="fa fa-map-marker-alt me-3"></i>Jalan Kendung IX, Sememi, Kec. Benowo,
                        Kota Surabaya, Jawa Timur</p>
                    <p style="color: black; font-weight: 400"><i class="fa fa-phone-alt me-3"></i>0838 5744 9383</p>
                    <p style="color: black; font-weight: 400"><i class="fab fa-instagram me-3"></i>@srikandi_semanggi</p>
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

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
    <script src="{{ asset('js/login/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/login/popper.min.js') }}"></script>
    <script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login/main.js') }}"></script>
</body>

</html>
