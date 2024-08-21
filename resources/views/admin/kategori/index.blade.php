@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Kategori Program Produk Srikandi
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
                            <h4 class="card-title">Data Master Kategori Produk</h4>
                        </div>
                        <div class="col d-flex justify-content-end" style="padding-right: 23px">
                            <a class="btn btn-primary"
                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(11, 136, 156); padding: 12px 27px 12px 27px"
                                href="/dash-buatkategori"><span style="font-size: 20px; color:rgb(245, 230, 17)">+</span>
                                Tambahkan Kategori</a>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Kategori Produk : {{ $kategori->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead class="text-center">
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama Kategori </th>
                                    <th> Dibuat oleh </th>
                                    <th> Tanggal dan Waktu dibuat </th>
                                    <th> List Program </th>
                                    <th> Tindakan </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @if ($all->count() == 0)
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <strong style="color: #6C7293; font-family:courier new">Daftar kategori produk tidak
                                tersedia!</strong>
                        </div>
                    @else
                        @foreach ($kategori as $kat)
                            <tr>
                                <td>
                                    <strong>{{ $kategori->firstItem() + $loop->index }}</strong>
                                </td>
                                <td>
                                    <span class="pl-2">{{ ucwords($kat->nama) }}</span>
                                </td>
                                <td> {{ $kat->user->name }} </td>
                                <td> {{ \Carbon\Carbon::parse($kat->created_at)->translatedFormat('l, d F Y H:i') }} </td>
                                <td> <a class="btn btn-primary"
                                        style="margin-right: 5px; border-radius: 5px; background-color: rgb(50, 45, 134); padding: 12px 27px 12px 27px"
                                        href="/dash-daftarproduk/{{ $kat->slug }}">Detail</a> </td>
                                <td>
                                    <div class="row justify-content-center">
                                        <a href="/dash-updatekategori/{{ $kat->slug }}" class="btn btn-light"
                                            style="margin-right: 5px; border-radius: 5px; background-color: rgb(26, 100, 63); color: white; padding: 12px 27px 12px 27px">Update
                                        </a>
                                        @if ($kat->status == 1)
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#{{ $kat->id }}"
                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Non
                                                Aktif
                                            </button>

                                            <div class="modal fade" id="{{ $kat->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content"
                                                        style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-1" id="exampleModalLabel">Kategori:
                                                                {{ ucwords($kat->nama) }}</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin untuk menonaktifkan kategori program ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak</button>
                                                            <form action="/dash-nonaktifkankategori" method="POST">
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
                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(103, 7, 98); color: white; padding: 12px 42px 12px 42px">
                                                Aktif
                                            </button>

                                            <div class="modal fade" id="aktif{{ $kat->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content"
                                                        style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-1" id="exampleModalLabel">Kategori:
                                                                {{ ucwords($kat->nama) }}</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin untuk mengaktifkan kategori program ini kembali?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak</button>
                                                            <form action="/dash-aktifkankategori" method="POST">
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
                            {{ $kategori->links() }}
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
