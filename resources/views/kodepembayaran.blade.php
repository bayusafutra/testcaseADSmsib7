@extends('layouts.mainSC')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Detail Pembayaran</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <div class="left"><div class="image"><img data-src="https://images.soco.id/534885c4-1a4f-4077-93e1-d54d8e2897ac-49011772152-1611643388390.png" sizes="" alt="BCA Virtual Account" class="lazy-img payment-list__bca_virtual_account" style="background-color: transparent;" src="https://images.soco.id/534885c4-1a4f-4077-93e1-d54d8e2897ac-49011772152-1611643388390.png" data-loaded="true"></div><sup></sup></div>
                                    </button>
                                  </h2>
                                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Panduan Pembayaran melalui ATM BCA</div>
                                    <p>1. Masukkan kartu ke mesin ATM</p>
                                    <p>2. Masukkan 6 digit PIN Anda</p>
                                    <p>3. Pilih “Transaksi Lainnya”</p>
                                    <p>4. Pilih “Transfer”</p>
                                    <p>5. Pilih ke “ke Rekening BCA Virtual Account”</p>
                                    <p>6. Masukkan nomor BCA Virtual Account Anda, kemudian tekan “Benar”</p>
                                    <p>7. Masukkan jumlah yang akan dibayarkan, selanjutnya tekan “Benar”</p>
                                    <p>8. Validasi pembayaran Anda. Pastikan semua detail transaksi yang ditampilkan sudah benar, kemudian pilih “Ya”</p>
                                    <p>9. Pembayaran Anda telah selesai. Tekan “Tidak” untuk menyelesaikan transaksi, atau tekan “Ya” untuk melakukan transaksi lainnya</p>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        ShopeePay
                                    </button>
                                  </h2>
                                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Panduan pembayaran mengguakan ShopeePay</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Gopay
                                    </button>
                                  </h2>
                                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Panduan pembayaran mengguakan ShopeePay</div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>

                                <h5 class="card-title">Alamat Pengiriman</h5>
                                <p class="card-text"><span class="text-success fw-bold">Tasya Rania Arinastia</span>, Jl. Jaksa Agung Suprapto No.12, Kauman, Kec. Nganjuk, Kabupaten Nganjuk, Jawa Timur 64411, Nganjuk, Nganjuk, Jawa Timur, 64411</p>

                                <h5 class="card-title">Detail Pemesanan</h5>
                                <div class="checkout_order_products">Total<span> Produk</span></div>
                                <ul>
                                    <li>Stik Semanggi <span>Rp 20.000</span></li>
                                    <li>Mie Semanggi <span>Rp 35.000</span></li>
                                    <li>Kue Dahlia Semanggi <span>Rp 35.000</span></li>
                                </ul>
                                <div class="checkout_order_subtotal">
                                    <div class="row">
                                        <span class="text-start">Subtotal</span>
                                        <span class="text-end fw-bold">Rp.90.000</span>
                                    </div>
                                </div>

                                <div class="checkout_order_ongkir">
                                    <div class="row">
                                        <span class="text-start">Ongkir</span>
                                        <span class="text-end fw-bold">Rp.20.000</span>
                                    </div>
                                </div>

                                <div class="checkout_order_biayaLayanan">
                                    <div class="row">
                                        <span class="text-start">Biaya Layanan</span>
                                        <span class="text-end fw-bold">Rp.5.000</span>
                                    </div>
                                </div>

                                <div class="checkout_order_total">
                                    <div class="row">
                                        <span class="text-start">Total</span>
                                        <span class="text-end fw-bold">Rp.115.000</span>
                                    </div>
                                </div>

                                <div class="container mt-4">
                                    <div class="row">
                                      <div class="col text-center">
                                        <a class="site-btn" href="/pembayaran/kode-unik" role="button">Konfirmasi Pembayaran</a>
                                      </div>
                                    </div>
                                  </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </section>

@endsection
