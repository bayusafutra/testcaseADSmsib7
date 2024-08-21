@extends('layouts.profilelayout')
@section('css')
    <link href="{{ asset('form/css/main.css') }}" rel="stylesheet" media="all">
    <link href="/form/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/form/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <style>
        textarea:focus {
            outline: none;
        }

        input[type=file]::file-selector-button {
            /* margin-top: -7px; */
            border: none;
            background: #5B8C51;
            /* padding: 9px 10px; */
            border-radius: 10px;
            /* color: #ffffff; */
            cursor: pointer;
            transition: background .2s ease-in-out;
            content: "Pilih Berkas";
        }

        input[type="file"]::file-selector-button::before {
            content: "Pilih Berkas";
            background: #5B8C51;
            color: #ffffff;
            padding: 9px 10px;
            border-radius: 10px;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        a {
            color: var(--color-primary);
            text-decoration: none;
        }

        input[type=file]::file-selector-button:hover {
            background-color: #5B8C51;
        }
    </style>
@endsection
@section('kontent')
    <div id="snippetContent">
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="profile-nav col-md-3">
                    <div class="panel" style="border: white">
                        <div class="user-heading round" style="background-color: #5B8C51">
                            @if (auth()->user()->gambar)
                                <a href="#">
                                    <img class="img-fluid" src="{{ asset('storage/' . auth()->user()->gambar) }}"
                                        alt="">
                                </a>
                                <form action="/hapuspp" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="oldImage" value="{{ auth()->user()->gambar }}">
                                    <button type="submit" style="border: none; background: none; color: #5d0e09">
                                        <span class="fw-bold" style="font-size: 17px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">[Hapus Foto Profil]</span>
                                    </button>
                                </form>
                            @else
                                <a href="#">
                                    <img class="img-fluid"
                                        src="data:image/png;base64,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"
                                        alt="">
                                </a>
                            @endif
                            <h1 class="mt-2" style="color: white">{{ ucwords(auth()->user()->name) }}</h1>
                            <p>{{ auth()->user()->email }}</p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li style="width: 100%;">
                                <a class="d-flex align-items-center" style="padding: 10px 15px 10px 15px"
                                    href="/profilpengguna"><i class="fa fa-user"></i>Profil
                                </a>
                            </li>
                            <li style="width: 100%">
                                <a class="d-flex align-items-center justify-content-between" href="/pesanansaya"
                                    style="padding: 0px 15px 0px 15px"><i class="fa fa-cube" style="color: #89817F">
                                        Pesanan Saya</i>
                                    <span class="label pull-right r-activity m-2"
                                        style="background: #5B8C51; color: white; padding: 1px 10px 1px 10px;">
                                        @php
                                            use App\Models\Pesanan;
                                            $pesanan = Pesanan::where('user_id', auth()->user()->id)->get();
                                            echo $pesanan->count();
                                        @endphp
                                    </span>
                                </a>
                            </li>
                            <li style="width: 100%">
                                <a class="d-flex align-items-center justify-content-between" href="/penilaiansaya"
                                    style="padding: 0px 15px 0px 15px"><i class="fa fa-star-o" style="color: #89817F">
                                        Penilaian Saya</i>
                                    <span class="label pull-right r-activity m-2"
                                        style="background: #5B8C51; color: white; padding: 1px 10px 1px 10px;">
                                        @php
                                            use App\Models\Rating;
                                            $rating = Rating::where('user_id', auth()->user()->id)->get();
                                            echo $rating->count();
                                        @endphp
                                    </span>
                                </a>
                            </li>
                            <li class="active" style="width: 100%">
                                <a class="d-flex align-items-center" href="#" style="padding: 10px 15px 10px 15px"><i
                                        class="fa fa-edit" style="color: #89817F"></i>Edit Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="profile-info col-md-9">
                    <div class="row justify-content-center">
                        <div class="col-10 grid-margin stretch-card">
                            @if (session()->has('success'))
                                <div class="row justify-content-center">
                                    <div class="alert alert-success alert-dismissible text-center col-lg-6 fade show"
                                        role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            <div class="card card-5">
                                <div class="card-heading">
                                    <h2 class="title">Edit Profil Pengguna</h2>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/editprofile" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                        <div class="form-row">
                                            <div class="name">Nama</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <input class="input--style-5 @error('name') is-invalid @enderror"
                                                        id="name" name="name" type="text" required
                                                        value="{{ old('name', auth()->user()->name) }}">
                                                </div>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="name">Username</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <input class="input--style-5 @error('username') is-invalid @enderror"
                                                        id="username" name="username" type="text"
                                                        value="{{ old('username', auth()->user()->username) }}">
                                                </div>
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="name">No Telepon</div>
                                            <div class="value">
                                                <div class="input-group" style="height: 52px">
                                                    <span class="input-group-text" style="background-color: white"
                                                        id="basic-addon1">+62</span>
                                                    <input type="text"
                                                        class="form-control @error('notelp') is-invalid @enderror"
                                                        id="notelp" name="notelp" type="text" required
                                                        placeholder="Masukkan no telepon"
                                                        style="background-color: #E5E5E5"
                                                        value="{{ old('notelp', auth()->user()->notelp) }}"
                                                        aria-label="Nomor" aria-describedby="addon-wrapping"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                </div>
                                                @error('notelp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="name">Tanggal Lahir</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <input class="input--style-5 @error('tgllahir') is-invalid @enderror"
                                                        name="tgllahir" style="background-color: #E5E5E5; height: 55px"
                                                        type="date" max="{{ now()->format('Y-m-d') }}" required
                                                        value="{{ old('tgllahir', auth()->user()->tgllahir) }}">
                                                </div>
                                                @error('tgllahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="name">Jenis Kelamin</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <div class="rs-select2 js-select-simple select--no-search"
                                                        style="width: 50%">
                                                        <select id="gender" name="gender">
                                                            @if (auth()->user()->gender !== null)
                                                                @if (auth()->user()->gender == true)
                                                                    <option value="{{ auth()->user()->gender }}" selected>
                                                                        Pria</option>
                                                                    <option value="0">Wanita</option>
                                                                @else
                                                                    <option value="{{ auth()->user()->gender }}" selected>
                                                                        Wanita</option>
                                                                    <option value="1">Pria</option>
                                                                @endif
                                                            @else
                                                                <option disabled="disabled" selected="selected">
                                                                    Pilih Jenis Kelamin</option>
                                                                <option value="1">Pria</option>
                                                                <option value="0">Wanita</option>
                                                            @endif
                                                        </select>
                                                        <div class="select-dropdown"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-row">
                                            <div class="name">Alamat</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <textarea id="alamat" name="alamat" type="text" class="input--style-5 @error('alamat') is-invalid @enderror"
                                                        style="border: none" value="{{ old('alamat', auth()->user()->alamat) }}" cols="55" rows="2"
                                                        placeholder="Masukkan alamat rumah anda">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                                                </div>
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="name">Foto Profil</div>
                                            <div class="value">
                                                <div class="input-group">
                                                    <input type="hidden" name="oldImage"
                                                        value="{{ auth()->user()->gambar }}">
                                                    <input class="input--style-4 @error('gambar') is-invalid @enderror"
                                                        type="file" id="fileInput" name="gambar"
                                                        value="{{ old('gambar') }}" onchange="previewImage()">
                                                </div>
                                                <small style="color: red">* Abaikan bila tidak ingin mengubah foto
                                                    profil</small>
                                                @error('gambar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <img class="img-preview img-fluid mb-3 rounded-circle"
                                            style="height: 125px; width: 125px; display: none" id="gambar">

                                        <div class="form-row d-flex justify-content-center">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <button class="btn btn--radius-2"
                                                            style="background-color: #5B8C51; color: white; font-family: sans-serif"
                                                            type="submit">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script type="text/javascript"></script>
        <style>
            #bsaHolder {
                right: 10px;
                position: absolute;
                top: 0;
                width: 345px;
                z-index: 10
            }

            #bsa_closeAd {
                width: 15px;
                height: 15px;
                overflow: hidden;
                position: absolute;
                top: 10px;
                right: 110px;
                border: none !important;
                z-index: 1;
                text-decoration: none !important;
                background: url(https://bootdey.com/img/x_icon.png) red no-repeat
            }
        </style>
    </div>
@endsection
@section('js')
    <script>
        function previewImage() {
            const gambar = document.querySelector('#fileInput');
            const imgPreview = document.querySelector('.img-preview');

            // Pastikan ada file yang dipilih sebelum menampilkan gambar
            if (gambar.files && gambar.files[0]) {
                const oFReader = new FileReader();
                oFReader.readAsDataURL(gambar.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }

                // Tampilkan gambar
                imgPreview.style.display = 'block';
            } else {
                // Sembunyikan gambar jika tidak ada file yang dipilih
                imgPreview.style.display = 'none';
            }
        }
    </script>
    <script src="form/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="form/vendor/select2/select2.min.js"></script>
    <script src="form/vendor/datepicker/moment.min.js"></script>
    <script src="form/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="form/js/global.js"></script>
@endsection
