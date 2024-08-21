@extends('layouts.mainSC')
@section('css')
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
@endsection
@section('content')
    <section class="">
        @if (session()->has('success'))
            <div class="container alert alert-success col-lg-6 text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="border-bottom">
                <h4 class="mb-3 mt-3 text-center">KERANJANG SAYA</h4>
            </div>
            <div class="col-lg-12">
                <table>
                    <tbody>
                        @if ($items->count())
                            @foreach ($items as $item)
                                <div class="card mb-3">
                                    <div class="card-body shadow-sm">
                                        <div class="row align-items-center">
                                            {{-- <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input custom-checkbox" type="checkbox"
                                                                    value="" id="productCheckbox1">
                                                            </div>
                                                        </div> --}}
                                            <div class="col-md-2">
                                                @if ($item->barang->gambar)
                                                    <a href="/detailproduk/{{ $item->barang->slug }}">
                                                        <img src="{{ asset('storage/' . $item->barang->gambar) }}"
                                                            class="img-fluid" style="width: 100px; height: 100px"
                                                            alt="">
                                                    </a>
                                                @else
                                                    <a href="/detailproduk/{{ $item->barang->slug }}">
                                                        <img src="img/food.png" class="img-fluid"
                                                            style="width: 100px; height: 100px" alt="">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <a href="/detailproduk/{{ $item->barang->slug }}" style="color: black">
                                                    <h5 class="card-title">{{ ucwords($item->barang->nama) }}</h5>
                                                </a>
                                                <p class="card-text fw-bold" style="color: #5E9D7B">Rp
                                                    {{ number_format($item->barang->harga, 2, ',', '.') }}</p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-outline-secondary minus-btn"
                                                                type="button">-</button>
                                                            <input type="text" style="background-color: white"
                                                                class="form-control numeric-input text-center fs-5"
                                                                min="{{ $item->barang->minim }}"
                                                                max="{{ $item->barang->stok }}" name="quantity"
                                                                value="{{ $item->quantity }}" readonly>
                                                            <button class="btn btn-outline-secondary plus-btn"
                                                                type="button" style="border-radius: 0 7px 7px 0">+</button>
                                                            <input type="hidden" class="stok-produk"
                                                                value="{{ $item->barang->stok }}">
                                                            <input type="hidden" class="minim-produk"
                                                                value="{{ $item->barang->minim }}"
                                                                data-item-id="{{ $item->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Detail Produk</h5>
                                                <p>minimum pembelian : {{ $item->barang->minim }}
                                                    {{ $item->barang->quantity }}</p>
                                                <p>stok produk : {{ $item->barang->stok }}
                                                    {{ $item->barang->quantity }}</p>
                                            </div>
                                            <div class="col-md-2">
                                                <h5 class="card-text mb-5" style="color: #5E9D7B">Total : <span
                                                        class="subtotal" style="border: none; color: #5E9D7B">Rp
                                                        {{ number_format($item->total, 2, ',', '.') }}</span></h5>
                                                <input type="hidden" class="harga" value="{{ $item->barang->harga }}">
                                                <form action="/cart-remove" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="hapus d-flex justify-content-center">
                                                        <button class="btn btn-danger btn-delete-item"
                                                            data-id="{{ $item->id }}">Hapus</button>

                                                    </div>
                                                </form>
                                                {{-- <input type="hidden" name="id" value="{{ $item->id }}">
                                                        {{-- <div class="hapus d-flex justify-content-center">
                                                            <a href="#{{ $item->barang->id }}"
                                                                class="btn btn-danger btn-delete-item" data-bs-toggle="modal"
                                                                data-bs-target="#{{ $item->barang->id }}">Hapus</a>
                                                        </div>

                                                        <div class="modal fade" id="{{ $item->barang->id }}" tabindex="-1"
                                                            aria-labelledby="confirmationModalLabel"aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="confirmationModalLabel">
                                                                            Apakah anda yakkin untuk menghapus produk ini
                                                                            dari keranjang?</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <strong>Rincian Produk</strong>
                                                                        <p>
                                                                            <span>{{ ucwords($item->barang->nama) }}</span><br>
                                                                            <span class="subtotal" style="border: none;">Rp
                                                                                {{ number_format($item->total, 2, ',', '.') }}<span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <form action="/cart-remove" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $item->barang->id }}">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Iya</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="ket text-center my-3">
                                Belum ada produk yang ditambahkan ke keranjang
                            </div>
                        @endif
                    </tbody>
                </table>

            </div>

            <form action="/pesan" method="POST">
                @csrf
                <div class="col-lg-12 mt-5">
                    <div class="shoping__checkout shadow-lg p-3">
                        <h5>Rincian Keranjang</h5>
                        <ul>
                            <li>Total Produk<span>{{ $items->count() }}</span></li>
                            <li>Total Item<span id="subItem" class="subitem"
                                    style="border: none; color: #5E9D7B">{{ $subitem }}</span>

                            </li>

                            <li>Subtotal<span id="totalKeranjang" class="subtotal1" style="border: none; color: #5E9D7B">Rp
                                    {{ number_format($totalkeranjang, 2, ',', '.') }}</span>
                                <input type="hidden" id="totalharga" name="price"
                                    value="{{ $totalkeranjang }}">
                            </li>
                        </ul>
                        {{-- <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a> --}}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="mt-4 mb-4">
                        <a href="/catalog" class="primary-btn cart-btn shadow">Lanjut Belanja</a>
                        <a href="#confirmationModal" class="primary-btn cart-btn cart-btn-right shadow"
                            data-bs-toggle="modal" data-bs-target="#confirmationModal">Pesan</a>
                    </div>
                </div>
                <div class="modal fade" id="confirmationModal" tabindex="-1"
                    aria-labelledby="confirmationModalLabel"aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pembelian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah pesanan anda sudah sesuai?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const minusBtns = document.querySelectorAll('.minus-btn');
            const plusBtns = document.querySelectorAll('.plus-btn');
            const numericInputs = document.querySelectorAll('.numeric-input');
            const stokProduks = document.querySelectorAll('.stok-produk');
            const minimun = document.querySelectorAll('.minim-produk');
            const subtotals = document.querySelectorAll('.subtotal');
            const hargas = document.querySelectorAll('.harga');

            function updateCart(item_id, quantity, price) {
                axios.post('/update-cart', {
                        item_id: item_id,
                        quantity: quantity,
                        price: price
                    })
                    .then(function(response) {
                        // Di sini Anda dapat menangani respons jika diperlukan
                        console.log(response.data);
                    })
                    .catch(function(error) {
                        // Di sini Anda dapat menangani kesalahan jika diperlukan
                        console.error(error);
                    });
            }

            minusBtns.forEach(function(minusBtn, index) {
                minusBtn.addEventListener('click', function() {
                    if (numericInputs[index].value > minimun[index].value * 1) {
                        numericInputs[index].value = parseInt(numericInputs[index].value) - 1;
                        updateSubtotal(index);
                        updateCart(minimun[index].dataset.itemId, numericInputs[index]
                            .value, parseInt(numericInputs[index].value * hargas[index].value));
                    }
                });
            });

            plusBtns.forEach(function(plusBtn, index) {
                plusBtn.addEventListener('click', function() {
                    if (numericInputs[index].value < stokProduks[index].value * 1) {
                        numericInputs[index].value = parseInt(numericInputs[index].value) + 1;
                        updateSubtotal(index);
                        updateCart(minimun[index].dataset.itemId, numericInputs[index]
                            .value, parseInt(numericInputs[index].value * hargas[index].value));
                    }
                });
            });

            function updateSubtotal(index) {
                const quantity = parseInt(numericInputs[index].value);
                const price = parseInt(hargas[index].value);
                const subtotalValue = quantity * price;
                subtotals[index].textContent = subtotalValue.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                updateTotalKeranjang();
                updateSubItem();

                updateTotalKeranjang(); // Memanggil fungsi untuk mengupdate nilai total keranjang

                // Memperbarui nilai pada input hidden dengan ID "totalharga"
                const totalKeranjangValue = getTotalKeranjangValue();
                const totalHargaInput = document.querySelector('#totalharga');
                totalHargaInput.value = totalKeranjangValue / 100;
            }

            function getTotalKeranjangValue() {
                const totalKeranjangElement = document.querySelector('#totalKeranjang');
                const totalKeranjangValue = parseFloat(totalKeranjangElement.textContent.replace(/[^0-9]/g, ''));
                return totalKeranjangValue;
            }

            function updateSubItem() {
                let SubItem = 0;

                const subitemElements = document.querySelectorAll('.numeric-input');
                subitemElements.forEach(function(subitemElement) {
                    const subitemValue = parseFloat(subitemElement
                        .value); // Menggunakan parseFloat() karena nilai dari input mungkin berupa desimal
                    if (!isNaN(subitemValue)) {
                        SubItem += subitemValue; // Pastikan hanya nilai numerik yang dijumlahkan
                    }
                });

                const totalSubitemElement = document.querySelector('#subItem');
                totalSubitemElement.textContent = SubItem;
            }


            function updateTotalKeranjang() {
                let totalKeranjang = 0;

                // Mengambil seluruh elemen subtotal dan menjumlahkannya
                const subtotalElements = document.querySelectorAll('.subtotal');
                subtotalElements.forEach(function(subtotalElement) {
                    const subtotalValue = parseFloat(subtotalElement.textContent.replace(/[^0-9]/g, ''));
                    totalKeranjang += subtotalValue / 100;
                });

                // Tampilkan kembali totalKeranjang
                const totalKeranjangElement = document.querySelector('#totalKeranjang');
                totalKeranjangElement.textContent = totalKeranjang.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
            }
        });
    </script>
@endsection
