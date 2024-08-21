@extends('layouts.auth')
@section('auth')

    <body>
        <div class="d-lg-flex half">
            <div class="bg order-1 order-md-2" style="background-image: url({{ asset('images/login.jpg') }});"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="logo">
                                <img class="img-fluid" src="{{ asset('img/logo1.png') }}" alt="">
                            </div>
                            <h3 class="text-center">Reset Password</h3>
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
                            <div class="pesan text-center">
                                <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                                    Masukkan password baru akun <span style="font-style: italic">Srikandi Semanggi</span>
                                    anda
                                </div>
                            </div>
                            <form action="/resetpassword" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-floating mb-4 mt-4">
                                    <input type="text" id="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                        name="email" readonly required value="{{ $email->email }}" />
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback"></div>
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password" required />
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Password_confirmation" required />
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="pt-1 mt-3 mb-4 d-flex justify-content-center text-center">
                                    <button class="btn btn-success btn-lg btn-block" style="padding: 10px 100px 10px 100px"
                                        type="submit">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/login/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/login/popper.min.js') }}"></script>
        <script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/login/main.js') }}"></script>
    </body>
@endsection
