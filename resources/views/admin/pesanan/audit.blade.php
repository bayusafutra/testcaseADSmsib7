@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Audit Pembayaran Pesanan Srikandi
            Semanggi
        </h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end" style="padding-right: 18px">
                    <div class="alert alert-success col-lg-5" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col" style="padding-left: 28px">
                            <h4 class="card-title">Data Audit Pembayaran Pesanan</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Pesanan : {{ $all->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead class="text-center">
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nomer Pesanan </th>
                                    <th> Nama Pelanggan </th>
                                    <th> Detail Pesanan </th>
                                    <th> Nomer Pembayaran </th>
                                    <th> Metode Pembayaran </th>
                                    <th> Subtotal Pembayaran </th>
                                    <th> Bukti Pembayaran </th>
                                    <th> Revisi Bukti Pembayaran </th>
                                    <th> Waktu Pembayaran </th>
                                    <th> Terima Pembayaran </th>
                                    <th> Tolak Pembayaran </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @if ($all->count() == 0)
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <strong style="color: #6C7293; font-family:courier new">Data Audit Pembayaran Pesanan Belum
                                Ada</strong>
                        </div>
                    @else
                        @foreach ($audit as $kat)
                            <tr>
                                <td>
                                    <strong>{{ $audit->firstItem() + $loop->index }}</strong>
                                </td>
                                <td>
                                    <span class="pl-2">{{ ucwords($kat->nomer) }}</span>
                                </td>
                                <td> {{ ucwords($kat->user->name) }} </td>
                                <td>
                                    <button class="btn btn-primary"
                                        style="margin-right: 5px; border-radius: 5px; background-color: rgb(50, 45, 134); padding: 12px 27px 12px 27px" data-bs-toggle="modal" data-bs-target="#detail{{ $kat->id }}">Detail
                                    </button>

                                    <div class="modal fade" id="detail{{ $kat->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="background-color: #2A3038; color:white; border-radius: 1rem; width: max-content;">
                                                <div class="modal-header">
                                                    <h3 class="modal-title fs-1" id="exampleModalLabel">
                                                        Detail Pesanan #{{ ucwords($kat->nomer) }}
                                                    </h3>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        <div class="row">
                                                            @foreach ($kat->detail()->get() as $det)
                                                                <div class="col-3 mb-2">
                                                                    {{ ucwords($det->barang->nama) }}
                                                                </div>
                                                                <div class="col-5 mb-2">
                                                                    (x{{ $det->qtyitem }})
                                                                </div>
                                                                <div class="col-4 mb-2">
                                                                    Rp {{ number_format($det->qtyitem*$det->barang->harga, 2, ',', '.') }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row d-flex justify-content-between mt-4">
                                                            <div class="col-7">

                                                            </div>
                                                            <div class="col-5 ms-auto">
                                                                Subtotal : <strong>Rp {{ number_format($kat->subtotal, 2, ',', '.') }}</strong>
                                                            </div>
                                                        </div>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                                        style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $kat->pembayaran->nomer }}</td>
                                <td>{{ ucwords($kat->payment->nama) }}</td>
                                <td>Rp {{ number_format($kat->subtotal, 2, ',', '.') }}</td>
                                <td>
                                    <button title="Lihat Bukti Pembayaran" data-bs-toggle="modal"
                                        data-bs-target="#bukti{{ $kat->id }}" style="background: none; border: none">
                                        <img src="{{ asset('storage/' . $kat->pembayaran->gambar) }}"
                                            style="border-radius: 0; height: 75px; width: 50px; " alt="">
                                    </button>
                                    <div class="modal fade" id="bukti{{ $kat->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-1" id="exampleModalLabel">
                                                        Pembayaran #{{ ucwords($kat->pembayaran->nomer) }}</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="bukti d-flex justify-content-center">
                                                        <img src="{{ asset('storage/' . $kat->pembayaran->gambar) }}"
                                                            style="height: 550px; width: 400px; border-radius: 0"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                                        style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @if ($kat->pembayaran->revisibukti)
                                    <td>
                                        <button title="Lihat Revisi Bukti Pembayaran" data-bs-toggle="modal"
                                            data-bs-target="#revisi{{ $kat->id }}"
                                            style="background: none; border: none">
                                            <img src="{{ asset('storage/' . $kat->pembayaran->revisibukti) }}"
                                                style="border-radius: 0; height: 75px; width: 50px; " alt="">
                                        </button>
                                        <div class="modal fade" id="revisi{{ $kat->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content"
                                                    style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-1" id="exampleModalLabel">
                                                            Pembayaran #{{ ucwords($kat->pembayaran->nomer) }}</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="bukti d-flex justify-content-center">
                                                            <img src="{{ asset('storage/' . $kat->pembayaran->revisibukti) }}"
                                                                style="height: 550px; width: 400px; border-radius: 0"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                                            style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        -
                                    </td>
                                @endif
                                <td> {{ \Carbon\Carbon::parse($kat->paidTime)->translatedFormat('l, d F Y H:i') }} </td>
                                <td>
                                    <form action="/dash-audit" method="POST">
                                        @csrf
                                        <input type="hidden" name="terima" value="{{ $kat->id }}">
                                        <button type="submit"
                                            style=" border-radius: 5px; background-color: rgb(26, 100, 63); color: white; padding: 12px 27px 12px 27px">
                                            Terima
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <button
                                        style=" border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px"
                                        data-bs-toggle="modal" data-bs-target="#tolak{{ $kat->id }}">
                                        Tolak
                                    </button>

                                    <div class="modal fade" id="tolak{{ $kat->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-1" id="exampleModalLabel">
                                                        Pembayaran #{{ ucwords($kat->pembayaran->nomer) }}</h1>
                                                </div>
                                                <form action="/dash-tolakaudit" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="tolak" value="{{ $kat->id }}">
                                                    <div class="modal-body">
                                                        <div class="bodi">
                                                            <label for="">Berikan alasan mengapa Anda menolak
                                                                pembayaran pesanan ini!</label>
                                                            <input type="text"
                                                                style="background-color: rgb(205, 205, 205); color: black"
                                                                name="pesantolak" class="form-control mt-3" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal"
                                                            style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak</button>
                                                        <input type="hidden" name="id"
                                                            value="{{ $kat->id }}">
                                                        <button type="submit" class="btn btn-light"
                                                            style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Iya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $audit->links() }}
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
