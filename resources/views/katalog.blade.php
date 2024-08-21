@extends('layouts.navbarHome')

@section('content')

    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="slider/slider2.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="slider/slider3.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="slider/slider4.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <section id="listproduk">
        <div class="container-xxl py-5">
            <div class="container portofolio">
                <div class="row g-0 gx-5 d-flex justify-content-center mb-5">
                    <div class="col-lg-12 text-start text-lg-end wow slideInCenter" data-wow-delay="100">
                        <ul class="produk nav nav-pills d-flex mx-auto justify-content-center mb-5">

                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                    href="#tab-1">Semua</a>
                            </li>

                            @foreach ($kategori as $kat)
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary border-2" data-bs-toggle="pill"
                                        href="#{{ $kat->slug }}">{{ ucwords($kat->nama) }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @if ($produk->count())
                                @foreach ($produk as $ker)
                                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="product-item">
                                            <div class="position-relative bg-light overflow-hidden">
                                                @if ($ker->gambar)
                                                    <img class="img-fluid w-100" src="{{ asset('storage/' . $ker->gambar) }}"
                                                        style="width: 261px; height: 261px" alt="{{ $ker->nama }}">
                                                @else
                                                    <img class="img-fluid w-100" src="img/food.png"
                                                        style="width: 261px; height: 261px" alt="{{ $ker->nama }}">
                                                @endif
                                            </div>
                                            <div class="text-center p-4">
                                                <div class="nama" style="height: 60px;">
                                                    <a class="d-block h5 mb-2" href="/detailproduk/{{ $ker->slug }}">{{ ucwords($ker->nama) }}</a>
                                                </div>
                                                <span class="text-primary me-1">Rp
                                                    {{ number_format($ker->harga, 2, ',', '.') }}</span>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="w-50 text-center border-end py-2 d-flex align-items-center justify-content-center">
                                                    <a class="text-body" href="/detailproduk/{{ $ker->slug }}"><i
                                                            class="fa fa-eye text-primary me-2"></i>Lihat Produk</a>
                                                </small>
                                                <small class="w-50 text-center py-2 d-flex align-items-center justify-content-center">
                                                    <form action="/cart" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="total"
                                                            value="{{ $ker->harga * $ker->minim }}">
                                                        <input type="hidden" name="barang" value="{{ $ker->id }}">
                                                        <input type="hidden" name="quantity" value="{{ $ker->minim }}">
                                                        <button type="submit" class="text-body border-0"
                                                            style="background: none"><i
                                                                class="fa fa-shopping-bag text-primary me-2"></i>Tambahkan ke
                                                            keranjang</button>
                                                    </form>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="ket text-center my-3">
                                    Produk tidak ditemukan
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- @dd($kategori) --}}
                    @foreach ($kategori as $kat)
                        <div id="{{ $kat->slug }}" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @if ($kat->barang()->where('status', 1)->where('nama', 'like', '%' .request('search') .  '%')->count())
                                    @foreach ($kat->barang()->where('status', 1)->where('nama', 'like', '%' .request('search') .  '%')->get() as $ker)
                                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="product-item">
                                                <div class="position-relative bg-light overflow-hidden">
                                                    @if ($ker->gambar)
                                                        <img class="img-fluid w-100"
                                                            src="{{ asset('storage/' . $ker->gambar) }}"
                                                            style="width: 261px; height: 261px" alt="{{ $ker->nama }}">
                                                    @else
                                                        <img class="img-fluid w-100" src="img/food.png"
                                                            style="width: 261px; height: 261px" alt="{{ $ker->nama }}">
                                                    @endif
                                                </div>
                                                <div class="text-center p-4">
                                                    <div class="nama" style="height: 60px;">
                                                        <a class="d-block h5 mb-2"
                                                            href="">{{ ucwords($ker->nama) }}</a>
                                                    </div>
                                                    <span class="text-primary me-1">Rp
                                                        {{ number_format($ker->harga, 2, ',', '.') }}</span>
                                                </div>
                                                <div class="d-flex border-top">
                                                    <small class="w-50 text-center border-end py-2 d-flex align-items-center justify-content-center">
                                                        <a class="text-body" href="/detailproduk/{{ $ker->slug }}"><i
                                                                class="fa fa-eye text-primary me-2"></i>Lihat Produk</a>
                                                    </small>
                                                    <small class="w-50 text-center py-2 d-flex align-items-center justify-content-center">
                                                        <form action="/cart" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="total"
                                                                value="{{ $ker->harga * $ker->minim }}">
                                                            <input type="hidden" name="barang"
                                                                value="{{ $ker->id }}">
                                                            <input type="hidden" name="quantity"
                                                                value="{{ $ker->minim }}">
                                                            <button type="submit" class="text-body border-0"
                                                                style="background: none"><i
                                                                    class="fa fa-shopping-bag text-primary me-2"></i>Tambahkan
                                                                ke keranjang</button>
                                                        </form>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="ket text-center my-3">
                                        Produk tidak ditemukan pada kategori ini
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
