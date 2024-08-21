@extends('layouts.mainSC')
@section('content')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4><a type="button" class="btn p-0 ms-auto btn-lg me-md-2" href="/checkout/{{ $pesanan->slug }}"><i
                            class="bi bi-arrow-left"></i>
                    </a>Ubah Alamat Pengiriman</h4>
                <form action="/ubahalamat" method="POST">
                    @csrf
                    <input type="hidden" name="pesanan" value="{{ $pesanan->id }}">
                    <div class="row">
                        <div class="col-lg-6">
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

                            @if (session()->has('berhasil'))
                                <div class="row justify-content-center">
                                    <div class="alert alert-success alert-dismissible text-center col-lg-8 fade show"
                                        role="alert">
                                        {{ session('berhasil') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            @if (session()->has('hapus'))
                                <div class="row justify-content-center">
                                    <div class="alert alert-danger alert-dismissible text-center col-lg-8 fade show"
                                        role="alert">
                                        {{ session('hapus') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <div class="checkout__input">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h4 class="card-title">Pilih Alamat</h4>
                                                </div>
                                                <div class="col-4">
                                                    <a href="/tambahAlamat/{{ $pesanan->slug }}" class="btn"
                                                        style="background-color: #5B8C51; color: white">Tambah Alamat Baru</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @if ($alamat->count())
                                                    @foreach ($alamat as $al)
                                                        <div class="col-sm-12 mb-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-check form">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="alamat" id="pembayaran1"
                                                                            value="{{ $al->id }}"
                                                                            @if ($pesanan->alamat_id)
                                                                                {{ $al->id == $pesanan->alamat->id ? 'checked' : '' }}
                                                                            @endif
                                                                        >

                                                                        <label class="form-check-label" for="pembayaran1">
                                                                            <div class="row d-flex justify-content-between">
                                                                                <div class="col-10">
                                                                                    <span
                                                                                        class="text-success fw-bold">{{ $al->nama }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-2 ms-auto">
                                                                                    <a class="fw-bold" style="color: #F68037"
                                                                                        href="/editalamat/{{ $al->slug }}">
                                                                                        Ubah
                                                                                    </a>
                                                                                </div>
                                                                                <p class="card-text"><strong>+62
                                                                                        {{ $al->notelp }}</strong></p>
                                                                            </div>

                                                                            <p class="card-text">{{ $al->alamat }}
                                                                                @if ($al->detail)
                                                                                    ({{ $al->detail }})
                                                                                    ,
                                                                                @endif
                                                                                Kelurahan
                                                                                {{ $al->kelurahan }}, Kecamatan
                                                                                {{ $al->kecamatan }},
                                                                                {{ $al->kota }}
                                                                                {{ $al->provinsi }}
                                                                                {{ $al->kodepos }}

                                                                                <div class="utama" style="color: #5B8C51; margin-top: -17px; margin-bottom: -13px">
                                                                                    @if ($al->status == 1)
                                                                                        [Alamat Utama]
                                                                                    @endif
                                                                                </div>
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="ket">
                                                        Belum ada alamat pengiriman yang terdaftar pada akun Anda
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if ($alamat->count())
                                        <div class="erga mt-4 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-lg"
                                                style="background-color: #5B8C51; color: white">Simpan</button>
                                        </div>
                                    @endif
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

                                <div class="checkout_order_subtotal mb-2">
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
                                                <span class="text-end fw-bold">Rp
                                                    {{ number_format($subtotal + 7000, 2, ',', '.') }}</span>
                                            </div>
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
