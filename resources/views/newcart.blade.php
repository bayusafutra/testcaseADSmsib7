@extends('layouts.mainSC')
<style>
    .form-check-input.custom-checkbox {
      width: 1.5em;
      height: 1.5em;
    }
    .color-preview {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: #5E9D7B;
    }
</style>

@section('content')
    <section class="">
        @if (session()->has('success'))
            <div class="container alert alert-success col-lg-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="border-bottom">
                <h4 class="mb-3 mt-3 text-center" >KERANJANG SAYA</h4>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                        <table>
                            <tbody>
                                @foreach ($items as $item)
                                <div class="card mb-3">
                                    <div class="card-body shadow-sm">
                                      <div class="row align-items-center">
                                        <div class="col">
                                            <div class="form-check">
                                              <input class="form-check-input custom-checkbox" type="checkbox" value="" id="productCheckbox1">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="img/{{ $item->gambar }}" class="img-fluid" style="width: 100px; height: 100px" alt="">
                                        </div>
                                        <div class="col-md-7">
                                          <h5 class="card-title">{{ $item->nama }}</h5>
                                          <p class="card-text fw-bold" style="color: #5E9D7B">Rp {{ number_format($item->harga) }}</p>
                                          <div class="row">
                                            <div class="col-sm-3">
                                                <div class="input-group mb-3">
                                                    <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                                    <input type="number" class="form-control numeric-input" min="1" value="{{ $item->quantity }}">
                                                    <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-sm btn-warning" style="color: white">Update</button>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                            <h5 class="card-text mt-3" style="color: #5E9D7B">Total : Rp {{ number_format($item->harga*$item->quantity) }}</h5>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                            </tbody>
                        </table>
                </div>

                <div class="col-lg-12 mt-5">
                    <div class="shoping__checkout shadow-lg p-3">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total Produk<span>{{ $items->count() }}</span></li>
                            <li>Total Item<span>
                                <?php
                                    $count=0;
                                    foreach ($items as $item) {
                                        $count=$count+$item->quantity;
                                    }
                                    echo $count;
                                ?>
                                </span>
                            </li>

                            <li>Subtotal <span>Rp
                                <?php
                                    $jumlah=0;
                                    foreach ($items as $item) {
                                        $jumlah=$jumlah+$item->harga*$item->quantity;
                                    }
                                    echo number_format($jumlah);
                                ?>
                            </span></li>
                        </ul>
                        {{-- <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a> --}}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="mt-4 mb-4">
                        <a href="/catalog" class="primary-btn cart-btn shadow">CONTINUE SHOPPING</a>
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                            CHECKOUT
                          </button> --}}
                        <a href="#confirmationModal" class="primary-btn cart-btn cart-btn-right shadow" data-bs-toggle="modal" data-bs-target="#confirmationModal">CHECKOUT</a>
                    </div>
                </div>
                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pembelian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah pesanan anda sudah sesuai?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="/checkout" class="btn btn-primary">Lanjutkan</a>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endsection
