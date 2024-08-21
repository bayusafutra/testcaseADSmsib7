@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Metode Pembayaran Srikandi Semanggi
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
                            <h4 class="card-title">Data Master Metode Pembayaran</h4>
                        </div>
                        <div class="col d-flex justify-content-end" style="padding-right: 23px">
                            <a class="btn btn-primary"
                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(11, 136, 156); padding: 12px 27px 12px 27px"
                                href="/dash-tambahmetodepembayaran"><span
                                    style="font-size: 20px; color:rgb(245, 230, 17)">+</span>
                                Tambahkan Metode Pembayaran</a>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Metode Pembayaran : {{ $payment->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead class="text-center">
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama </th>
                                    <th> Nomer Rekening</th>
                                    <th> Atas Nama </th>
                                    <th> Logo </th>
                                    <th> Barcode </th>
                                    <th> Status </th>
                                    <th> Tindakan </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @if ($payment->count() == 0)
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <strong style="color: #6C7293; font-family:courier new">Daftar metode pembayaran tidak
                                tersedia!</strong>
                        </div>
                    @else
                        @foreach ($payment as $kat)
                            <tr>
                                <td>
                                    <strong>{{ $payment->firstItem() + $loop->index }}</strong>
                                </td>
                                <td>
                                    <span class="pl-2">{{ ucwords($kat->nama) }}</span>
                                </td>
                                <td> {{ $kat->nomer }} </td>
                                <td> {{ ucwords($kat->atasnama) }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('storage/'.$kat->logo) }}" style="height: 40px; width: 65px; background: white" style="border-radius: 0" alt="">
                                </td>
                                <td>
                                    <button title="Lihat Barcode" data-bs-toggle="modal"
                                        data-bs-target="#{{ $kat->id }}" style="background: none; border: none">
                                        <img src="{{ asset('storage/' . $kat->gambar) }}"
                                            style="border-radius: 0; height: 75px; width: 50px; " alt="">
                                    </button>
                                    <div class="modal fade" id="{{ $kat->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-1" id="exampleModalLabel">
                                                        {{ ucwords($kat->nama) }}</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="bukti d-flex justify-content-center">
                                                        <img src="{{ asset('storage/' . $kat->gambar) }}"
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
                                <td>
                                    @if ($kat->status == 1)
                                        <div class="badge badge-outline-success"
                                            style="padding-left: 15px; padding-right: 15px">Aktif</div>
                                    @else
                                        <div class="badge badge-outline-danger"
                                            style="padding-left: 18px; padding-right: 18px">Non-Aktif</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="row justify-content-center">
                                        <a href="/dash-ubahmetodepembayaran/{{ $kat->slug }}" class="btn btn-light"
                                            style="margin-right: 5px; border-radius: 5px; background-color: rgb(26, 100, 63); color: white; padding: 12px 27px 12px 27px">Update
                                        </a>
                                        @if ($kat->status == 1)
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#ki{{ $kat->id }}"
                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Non
                                                Aktif
                                            </button>
                                            <div class="modal fade" id="ki{{ $kat->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content"
                                                        style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-1" id="exampleModalLabel">Metode
                                                                Pembayaran:
                                                                {{ ucwords($kat->nama) }}</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin untuk menonaktifkan metode pembayaran ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak</button>
                                                            <form action="/dash-nonaktifmetodepembayaran" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $kat->id }}">
                                                                <button type="submit" class="btn btn-light"
                                                                    style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Iya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#aktif{{ $kat->id }}"
                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(57, 21, 114); color: white; padding: 12px 43px 12px 43px">Aktif
                                            </button>

                                            <div class="modal fade" id="aktif{{ $kat->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content"
                                                        style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-1" id="exampleModalLabel">Metode
                                                                Pembayaran:
                                                                {{ ucwords($kat->nama) }}</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin untuk mengaktifkan kembali metode pembayaran ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak</button>
                                                            <form action="/dash-aktifmetodepembayaran" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $kat->id }}">
                                                                <button type="submit" class="btn btn-light"
                                                                    style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Iya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $payment->links() }}
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
