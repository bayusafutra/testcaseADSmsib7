@extends('layouts.mainSC')
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                @if (session()->has('alamat'))
                    <div class="row justify-content-center">
                        <div class="alert alert-success alert-dismissible text-center col-lg-6 fade show" role="alert">
                            {{ session('alamat') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/pesanansaya"><i
                            class="bi bi-arrow-left"></i>
                    </a>Detail Pesanan</h4>
                <form action="/checkout" method="POST">
                    @csrf
                    <input type="hidden" name="pesanan" value="{{ $pesanan->id }}">
                    <div class="row">
                        <div class="col-lg-6" style="max-height: 507px; overflow-y: auto">
                            <div class="checkout__input">
                                <div class="row">

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Metode Pengiriman</h4>
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-check form">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pembayaran" id="pembayaran1" value="1">
                                                                <label class="form-check-label" for="pembayaran1">
                                                                    <span class="text-success fw-bold">Ambil di
                                                                        tempat</span>
                                                                    <p class="card-text">Ambil pesananmu pada alamat yang
                                                                        tertera di bawah ini!</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-check form">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pembayaran" id="pembayaran2" value="2"
                                                                    checked>
                                                                <label class="form-check-label" for="pembayaran2">
                                                                    <span class="text-success fw-bold">Dikirim ke
                                                                        rumah</span>
                                                                    <p class="card-text">Pilih alamat pengiriman untuk
                                                                        pesanan Anda!</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-3" id="alamat">
                                        <div class="card-body">
                                            @if ($pesanan->alamat_id == null)
                                                <h4 class="card-title">Alamat Pengiriman</h4>
                                                <p class="card-text"><span class="text-success fw-bold d-f">Belum ada daftar
                                                        alamat pada pengiriman akun anda</span></p>
                                                <a href="/tambahAlamat/{{ $pesanan->slug }}"
                                                    class="btn btn-primary">Tambahkan Alamat
                                                    Pengiriman</a>
                                            @else
                                                <h4 class="card-title">Alamat Pengiriman</h4>
                                                <span class="text-success fw-bold">{{ ucwords($pesanan->alamat->nama) }}
                                                </span>
                                                <p class="card-text"><strong>+62 {{ $pesanan->alamat->notelp }}</strong><br>
                                                    {{ $pesanan->alamat->alamat }} @if ($pesanan->alamat->detail)
                                                        ({{ $pesanan->alamat->detail }})
                                                    @endif, Kelurahan
                                                    {{ $pesanan->alamat->kelurahan }}, Kecamatan
                                                    {{ $pesanan->alamat->kecamatan }}, {{ $pesanan->alamat->kota }}
                                                    {{ $pesanan->alamat->provinsi }}, {{ $pesanan->alamat->kodepos }}
                                                </p>
                                                <a href="/ubahAlamat/{{ $pesanan->slug }}" class="btn btn-primary">Ubah
                                                    Alamat Pengiriman</a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card mt-3" id="tempat">
                                        <div class="card-body">
                                            <h4 class="card-title">Alamat Pengambilan</h4>
                                            <span class="text-success fw-bold">Rumah Bapak Parmo
                                            </span>
                                            <p class="card-text"><strong>+62 85648784577</strong><br>
                                                Jalan Kendung IX, Kelurahan SEMEMI, Kecamatan BENOWO, SURABAYA JAWA TIMUR,
                                                60198
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h4 class="card-title">Catatan Pesanan (optional)</h4>
                                            <textarea class="form-control" placeholder="Silahkan tinggalkan catatan..." name="catatan"cols="68" rows="5">{{ $pesanan->catatan }}</textarea>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h4 class="card-title">Pilih Metode Pembayaran</h4>

                                            @if ($payment->count() == 1)
                                                @foreach ($payment as $pay)
                                                    <div class="col-sm-9 mb-2">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-check form">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="payment" value="{{ $pay->id }}"
                                                                        onsubmit="return validateForm()" checked
                                                                        required>
                                                                    <label class="form-check-label" for="pembayaran1">
                                                                        <span
                                                                            class="text-success fw-bold">{{ ucwords($pay->nama) }}</span><br>
                                                                        <img class="img-fluid"
                                                                            src="{{ asset('storage/' . $pay->logo) }}"
                                                                            style="height: 60px; width: 100px"
                                                                            alt="">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach ($payment as $pay)
                                                    <div class="col-sm-9 mb-2">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-check form">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="payment" value="{{ $pay->id }}"
                                                                        onsubmit="return validateForm()"
                                                                        @if ($pesanan->payment_id) {{ $pay->id == $pesanan->payment->id ? 'checked' : '' }} @endif
                                                                        required>
                                                                    <label class="form-check-label" for="pembayaran1">
                                                                        <span
                                                                            class="text-success fw-bold">{{ ucwords($pay->nama) }}</span><br>
                                                                        <img class="img-fluid"
                                                                            src="{{ asset('storage/' . $pay->logo) }}"
                                                                            style="height: 60px; width: 100px"
                                                                            alt="">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__order">
                                <h4>Pesanan Anda</h4>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-7">
                                        <strong>No Pesanan : #{{ $pesanan->nomer }}</strong><br>
                                    </div>
                                    <div class="col-5">
                                        <small class=""
                                            style="font-size: 15px">{{ \Carbon\Carbon::parse($pesanan->created_at)->translatedFormat('l, d F Y H:i') }}</small>
                                    </div>
                                </div>
                                <div class="checkout_order_subtotal my-3">
                                    <div class="row d-flex justify-content-between">
                                        <span class="text-start">Rincian Produk</span>
                                        @foreach ($produk as $pro)
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
                                                    {{ number_format($subtotal, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

                                <div class="checkout_order_subtotal mb-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-start fw-bold">Total Biaya</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="fw-bold" id="subtotal1">Rp
                                                    {{ number_format($subtotal, 2, ',', '.') }}</span>
                                                <span class="fw-bold" id="subtotal2">Rp
                                                    {{ number_format($subtotal + 7000, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="site-btn" role="button">Checkout</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pembayaranRadios = document.querySelectorAll('[name="pembayaran"]');
            const tempatCard = document.getElementById('tempat');
            const alamatCard = document.getElementById('alamat');
            const ongkir = document.getElementById('ongkir');
            const subtotal1 = document.getElementById('subtotal1');
            const subtotal2 = document.getElementById('subtotal2');

            function handlePembayaranChange() {
                if (pembayaranRadios[1].checked) {
                    tempatCard.style.display = 'none';
                    alamatCard.style.display = 'block';
                    subtotal1.style.display = 'none';
                    subtotal2.style.display = 'block';
                } else {
                    tempatCard.style.display = 'block';
                    alamatCard.style.display = 'none';
                    subtotal1.style.display = 'block';
                    subtotal2.style.display = 'none';
                }
            }

            for (let radio of pembayaranRadios) {
                radio.addEventListener('change', handlePembayaranChange);
            }

            const pembayaranRadio1 = document.getElementById('pembayaran1');
            const pembayaranRadio2 = document.getElementById('pembayaran2');

            function handleOngkirDisplay() {
                if (pembayaranRadio2.checked) {
                    ongkir.style.display = 'block';
                } else {
                    ongkir.style.display = 'none';
                }
            }

            pembayaranRadio1.addEventListener('change', handleOngkirDisplay);
            pembayaranRadio2.addEventListener('change', handleOngkirDisplay);

            // Inisialisasi visibilitas berdasarkan status default yang terpilih
            handlePembayaranChange();
            handleOngkirDisplay();
        });
    </script>

    <script>
        function validateForm() {
            var selectedRadio = document.querySelector('input[type="radio"][name="payment"]:checked');
            if (!selectedRadio) {
                alert('Pilih salah satu metode pembayaran.');
                return false;
            }
            return true;
        }
    </script>
@endsection
