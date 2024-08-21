@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Data Pembayaran Srikandi
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
                            <h4 class="card-title">Data Semua Pembayaran</h4>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Pembayaran : {{ $all->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead class="text-center">
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nomer Pembayaran </th>
                                    <th> Nama Pelanggan </th>
                                    <th> Subtotal Pembayaran</th>
                                    <th> Status Pembayaran </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @if ($pembayaran->count() == 0)
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <strong style="color: #6C7293; font-family:courier new">Data Pembayaran Srikandi Semanggi Belum
                                Ada</strong>
                        </div>
                    @else
                        @foreach ($pembayaran as $kat)
                            <tr>
                                <td>
                                    <strong>{{ $pembayaran->firstItem() + $loop->index }}</strong>
                                </td>
                                <td>
                                    <span class="pl-2">{{ ucwords($kat->nomer) }}</span>
                                </td>
                                <td> {{ ucwords($kat->user->name) }} </td>
                                <td>
                                     Rp {{ number_format($kat->pesanan->subtotal, 2, ',','.') }}
                                </td>
                                <td>
                                    @if ($kat->status == 1)
                                        Menunggu Pembayaran
                                    @elseif ($kat->status == 2)
                                        Verifikasi
                                    @elseif ($kat->status == 3)
                                        Berhasil
                                    @elseif ($kat->status == 4)
                                        Batal
                                    @elseif ($kat->status == 5)
                                        Ditolak
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $pembayaran->links() }}
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
