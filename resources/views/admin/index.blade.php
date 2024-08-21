@extends('layouts.admin')
@section('erga')
    <div class="row">
        <div class="col-sm-4 grid-margin">
            <a href="/dash-audit">
                <div class="card">
                    <div class="card-body">
                        <h5>Audit Pembayaran Pesanan</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $audit->count() }} Pesanan</h2>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-marker-check text-primary ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-dikemas">
                <div class="card">
                    <div class="card-body">
                        <h5>Pesanan Dikemas</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $dikemas->count() }} Pesanan</h2>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-package-variant text-info ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-dikirim">
                <div class="card">
                    <div class="card-body">
                        <h5>Kirim Pesanan</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $kirim->count() }} Pesanan</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-cube-send text-warning ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-diambil">
                <div class="card">
                    <div class="card-body">
                        <h5>Pesanan Menunggu Diambil</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $ambil->count() }} Pesanan</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-timer-sand text-light ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-batal">
                <div class="card">
                    <div class="card-body">
                        <h5>Pesanan Batal</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $batal->count() }} Pesanan</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-block-helper text-danger ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 grid-margin">
            <a href="/dash-selesai">
                <div class="card">
                    <div class="card-body">
                        <h5>Pesanan Selesai</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $selesai->count() }} Pesanan</h2>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-package-variant-closed text-success ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
