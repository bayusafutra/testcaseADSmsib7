@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Pengiriman Pesanan Srikandi
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
                            <h4 class="card-title">Data Audit Pengiriman Pesanan</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Pesanan : {{ $dikirim->count() }}</strong>
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
                                    <th> Catatan Pesanan </th>
                                    <th> Jasa Pengiriman </th>
                                    <th> No Resi Pengiriman </th>
                                    <th> Alamat Pengiriman </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @if ($all->count() == 0)
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <strong style="color: #6C7293; font-family:courier new">Data Pesanan Dikirim Belum
                                Ada</strong>
                        </div>
                    @else
                        @foreach ($dikirim as $kat)
                            <tr>
                                <td>
                                    <strong>{{ $dikirim->firstItem() + $loop->index }}</strong>
                                </td>
                                <td>
                                    <span class="pl-2">{{ ucwords($kat->nomer) }}</span>
                                </td>
                                <td> {{ ucwords($kat->user->name) }} </td>
                                <td>
                                    <button class="btn btn-primary"
                                        style="margin-right: 5px; border-radius: 5px; background-color: rgb(50, 45, 134); padding: 12px 27px 12px 27px"
                                        data-bs-toggle="modal" data-bs-target="#detail{{ $kat->id }}">Detail
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
                                                                Rp
                                                                {{ number_format($det->qtyitem * $det->barang->harga, 2, ',', '.') }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="row d-flex justify-content-between mt-4">
                                                        <div class="col-7">

                                                        </div>
                                                        <div class="col-5 ms-auto">
                                                            Subtotal : <strong>Rp
                                                                {{ number_format($kat->subtotal, 2, ',', '.') }}</strong>
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
                                <td>
                                    @if ($kat->catatan)
                                        {{ $kat->catatan }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $kat->jaskir }}</td>
                                <td>{{ $kat->noresi }}</td>
                                <td>
                                    @if ($kat->alamat_id)
                                        <button data-bs-toggle="modal" data-bs-target="#alamat{{ $kat->id }}"
                                            style="border-radius: 5px; background-color: rgb(15, 127, 84); color: white; padding: 12px 27px 12px 27px">
                                            Lihat Detail
                                        </button>

                                        <div class="modal fade" id="alamat{{ $kat->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content"
                                                    style="background-color: #2A3038; color:white; border-radius: 1rem; width: max-content;">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title fs-1" id="exampleModalLabel">
                                                            Detail Pengiriman Pesanan #{{ ucwords($kat->nomer) }}
                                                        </h3>
                                                    </div>
                                                    <div class="modal-body  d-flex justify-content-start"
                                                        style="text-align: start" style="width: 500px">
                                                        <p>
                                                        <div class="row">
                                                            <div class="col-3 mb-2">
                                                                Nama Penerima
                                                            </div>
                                                            <div class="col-9 mb-2">
                                                                : {{ ucwords($kat->alamat->nama) }}
                                                            </div>

                                                            <div class="col-3 mb-2">
                                                                No telpon
                                                            </div>
                                                            <div class="col-9 mb-2">
                                                                : {{ $kat->alamat->notelp }}
                                                            </div>

                                                            <div class="col-3 mb-2">
                                                                Alamat
                                                            </div>
                                                            <div class="col-9 mb-2">
                                                                : {{ $kat->alamat->alamat }}
                                                                @if ($kat->alamat->detail)
                                                                    ({{ $kat->alamat->detail }})
                                                                @endif
                                                                ,Kelurahan {{ $kat->alamat->kelurahan }}
                                                                ,<br>
                                                                Kecamatan {{ $kat->alamat->kecamatan }}
                                                                ,{{ $kat->alamat->kota }}
                                                                ,{{ $kat->alamat->provinsi }}
                                                                ,{{ $kat->alamat->kodepos }}
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
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $dikirim->links() }}
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
