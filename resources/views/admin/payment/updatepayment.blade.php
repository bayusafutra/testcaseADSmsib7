@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Update Metode Pembayaran {{ ucwords($payment->nama) }}</h1>
    </div>
    {{-- Start Form --}}
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="alert alert-success col-lg-6" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if ($errors)
        @foreach ($errors as $error )
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <div class="row justify-content-center">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Metode Pembayaran Srikandi Semanggi</h4>

                    <form action="/dash-ubahmetodepembayaran" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{ $payment->id }}">
                        <div class="form-group">
                            <label for="nama">Nama Metode Pembayaran</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama kategori produk" required value="{{ old('nama', $payment->nama) }}" autofocus>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nomer">Nomer Rekening</label>
                            <input type="text" class="form-control @error('nomer') is-invalid @enderror" name="nomer" id="nomer" placeholder="Nomer rekening" required value="{{ old('nomer', $payment->nomer) }}"/>
                            @error('nomer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="atasnama">Nama Pemilik Rekening</label>
                            <input type="text" class="form-control @error('atasnama') is-invalid @enderror" name="atasnama" id="atasnama" placeholder="Nama Pemilik Rekening" required value="{{ old('atasnama', $payment->atasnama) }}"/>
                            @error('atasnama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Logo</label>
                            <div class="input-group col-xs-12">
                                <input type="hidden" name="oldLogo" value="{{ $payment->logo }}">
                                <input type="file" name="logo"
                                    class="form-control file-upload-info @error('logo') is-invalid @enderror"
                                    style="background-color: #2A3038; height: 2.875rem; padding: 0.56rem 0.75rem; font-size: 0.875rem;
                            font-weight: 400; color: #495057; border-radius: 2px"
                                    placeholder="Upload Image" value="{{ old('logo') }}"
                                >
                            </div>
                            <small style="color: red">*Abaikan bila tidak ingin merubah logo</small>
                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Barcode</label>
                            <div class="input-group col-xs-12">
                                <input type="hidden" name="oldGambar" value="{{ $payment->gambar }}">
                                <input type="file" name="gambar"
                                    class="form-control file-upload-info @error('gambar') is-invalid @enderror"
                                    style="background-color: #2A3038; height: 2.875rem; padding: 0.56rem 0.75rem; font-size: 0.875rem;
                            font-weight: 400; color: #495057; border-radius: 2px"
                                    placeholder="Upload Image" value="{{ old('gambar') }}">
                            </div>
                            <small style="color: red">*Abaikan bila tidak ingin merubah barcode</small>
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(50, 45, 134); color: white; padding: 12px 27px 12px 27px">Update</button>
                                <input type="reset" class="btn btn-light" style="border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="/dash-metodepembayaran" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(196, 106, 16); color: white; padding: 12px 27px 12px 27px">Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
