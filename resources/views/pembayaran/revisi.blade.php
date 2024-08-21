@extends('layouts.mainSC')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <style>
        #bi-quote::before {
            transform: rotate(180deg);
        }
    </style>
    <style>
        input[type=file] {
            display: none;
        }

        label.file-selector-button {
            border: none;
            background: #5B8C51;
            padding: 9px 10px;
            border-radius: 10px;
            color: #ffffff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        label.file-selector-button:hover {
            background: #000000;
            /* Ubah warna latar saat kursor diarahkan */
        }

        .img-preview {
            display: none;
        }
    </style>
@endsection
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                @if (session()->has('gagal'))
                    <div class="row justify-content-center">
                        <div class="alert alert-success alert-dismissible text-center col-lg-6 fade show" role="alert">
                            {{ session('gagal') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/pesanansaya"><i
                            class="bi bi-arrow-left"></i>
                    </a>Revisi Pembayaran Pesanan</h4>
                <form action="/revisiunggahbukti" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pembayaran" value="{{ $bayar->id }}">
                    <input type="hidden" name="pesanan" value="{{ $bayar->pesanan->id }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row title">
                                <div class="col-7">
                                    <div class="nomerpesanan">
                                        <span class="fw-bold" style="color: black; font-size: 17px">Pembayaran
                                            #{{ $bayar->nomer }}</span>
                                    </div>
                                </div>
                                <div class="col-5 text-end d-flex align-items-center">
                                    <div class="tgl">
                                        <small>{{ \Carbon\Carbon::parse($bayar->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="warning mt-5 d-flex justify-content-center">
                                <span
                                    style="color: black; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-weight: 500">
                                    <i class="bi bi-quote" style="color: #5B8C51"></i>
                                    Bayar Sebelum Tenggat Waktu
                                    <i class="bi bi-quote" id="bi-quote" style="color: #5B8C51"></i>
                                </span>
                            </div>
                            <div class="waktu d-flex justify-content-center mt-3">
                                <p id="countdown" style="font-weight: 900; font-size: 35px; color: #F68037"></p><br>
                            </div>

                            <div class="tempo d-flex justify-content-center mt-3">
                                <span>Jatuh tempo pada
                                    {{ \Carbon\Carbon::parse($bayar->pesanan->deadlinePaid)->translatedFormat('l, d F Y H:i') }}</span>
                            </div>

                            <div class="metode mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <p style="font-weight: 600; color: black">Tagihan Pesanan Anda</p>
                                        <p>
                                            Silahkan transfer dengan nominal
                                            <span class="fw-bold" style="color: #F68037">
                                                Rp {{ number_format($bayar->pesanan->subtotal, 2, ',', '.') }}
                                            </span>
                                        </p>
                                        <p>
                                            Alasan pengulangan transaksi pembayaran Anda : <strong>{{ $bayar->tolakaudit }}</strong>
                                        </p>

                                        <p>
                                        <div class="spedah p-3" style="max-height: 250px; overflow-y: auto">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-5">
                                                    Nama Metode Pembayaran
                                                </div>
                                                <div class="col-7">:
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/' . $bayar->pesanan->payment->logo) }}"
                                                        style="height: 50px; width: 75px" alt="">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-5">
                                                    Nomer Metode Pembayaran
                                                </div>
                                                <div class="col-7">:
                                                    <strong>{{ $bayar->pesanan->payment->nomer }}</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <img class="img-fluid" style="height: 500px; 50px"
                                                    src="/payment/barcode.png" alt="">
                                            </div>
                                        </div>
                                        </p>

                                        <p class="mt-3">
                                            <strong>Unggah bukti pembayaran Anda!</strong><br><br>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="fileInput" class="file-selector-button">Pilih Bukti
                                                    Pembayaran</label>
                                            </div>
                                            <div class="col-6">
                                                <img class="img-preview img-fluid mb-3" style="height: 200px; width: 125px"
                                                    id="gambar">
                                            </div>
                                        </div>
                                        <input type="file" id="fileInput" class="form-control" name="revisibukti"
                                            id="gambar" onchange="previewImage()">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__order">
                                <h4>Pesanan Anda</h4>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <strong>No Pesanan : #{{ $bayar->pesanan->nomer }}</strong><br>
                                    </div>
                                    <div class="col-5">
                                        <small class=""
                                            style="font-size: 15px">{{ \Carbon\Carbon::parse($bayar->pesanan->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                    </div>
                                </div>
                                <div class="checkout_order_subtotal my-3">
                                    <div class="row d-flex justify-content-between">
                                        <span class="text-start">Rincian Produk</span>
                                        @foreach ($bayar->pesanan->detail()->get() as $pro)
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="col-7">{{ ucwords($pro->barang->nama) }}
                                                        (x{{ $pro->qtyitem }})
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-end">Rp
                                                        {{ number_format($pro->barang->harga * $pro->qtyitem, 2, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr>

                                <div class="checkout_order_subtotal mb-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start">Subtotal Produk</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="text-end">Rp
                                                    {{ number_format($bayar->pesanan->total, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($bayar->pesanan->alamat_id)
                                    <div class="checkout_order_subtotal mb-2" id="ongkir">
                                        <div class="row d-flex justify-content-between">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="text-start">Ongkos Kirim</span>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-end">Rp 7.000,00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="checkout_order_subtotal mb-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start fw-bold">Total Biaya</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="fw-bold">Rp
                                                    {{ number_format($bayar->pesanan->subtotal, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="site-btn" role="button">Kirim Bukti
                                                Pembayaran</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </section>
@endsection
@section('js')
    <script>
        // Mengambil waktu sekarang
        var now = new Date().getTime();

        // Deadline dari variabel $bayar->pesanan->deadlinePaid
        var deadline = new Date("{{ $bayar->pesanan->deadlinePaid }}")
            .getTime(); // Ubah sesuai format deadlinePaid yang sesuai

        // Menghitung selisih waktu antara sekarang dan deadline
        var timeRemaining = deadline - now;

        // Fungsi untuk mengupdate countdown setiap 1 detik
        function updateCountdown() {
            var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            // Menampilkan countdown dalam elemen dengan id "countdown"
            document.getElementById("countdown").innerHTML =
                hours + " jam " + minutes + " menit " + seconds + " detik ";

            // Mengurangi waktu yang tersisa setiap 1 detik
            timeRemaining -= 1000;

            // Jika waktu sudah habis, tampilkan pesan
            if (timeRemaining < 0) {
                clearInterval(interval);
                document.getElementById("countdown").innerHTML = "Waktu telah habis!";
                updateStatus(); // Panggil fungsi untuk memperbarui status
                // window.location.href = "/pesanansaya"; // Tidak perlu alihkan halaman di sini
            }
        }
        // Memanggil fungsi updateCountdown setiap 1 detik
        var interval = setInterval(updateCountdown, 1000);

        function updateStatus() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Lakukan permintaan ke server untuk mengubah status pesanan menjadi 8
            fetch('/waktuhabis', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Sertakan token CSRF dalam header
                    },
                    body: JSON.stringify({
                        orderId: {{ $bayar->pesanan->id }} // Ganti dengan orderId yang sesuai
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    window.location.href = "/pesanansaya";
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }
    </script>

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
@endsection
