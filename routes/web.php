<?php

use App\Http\Controllers\AlamatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailRatingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/catalog', [CatalogController::class, 'index']);

Route::get('/profilkampungsemanggi', function () {
    return view('profile');
});


Route::get('/profilpengguna', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/editprofile', [ProfileController::class, 'edit'])->middleware('auth');
Route::post('/editprofile', [ProfileController::class, 'update'])->middleware('auth');
Route::get('/pesanansaya', [ProfileController::class, 'pesanan'])->middleware('auth');
Route::post('/hapuspp', [ProfileController::class, 'hapuspp'])->middleware('auth');
Route::get('/penilaiansaya', [ProfileController::class, 'penilaian'])->middleware('auth');
Route::get('/detailpenilaian/{slug}', [ProfileController::class, 'detail'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store'])->middleware('guest');
Route::get('/verifikasi', [SignupController::class, 'verifikasi'])->middleware('guest');
Route::post('/verifikasi', [SignupController::class, 'postverifikasi'])->middleware('guest');
Route::get('/validasi', [SignupController::class, 'validasi'])->middleware('auth');
Route::post('/validasi', [SignupController::class, 'validasipost'])->middleware('auth');

Route::get('/lupapassword', [LupaPasswordController::class, 'index'])->middleware('guest');
Route::post('/lupapassword', [LupaPasswordController::class, 'lupapassword'])->middleware('guest');
Route::get('/resetpassword/{token}', [LupaPasswordController::class, 'resetpassword'])->name('reset.password.get')->middleware('guest');
Route::post('/resetpassword', [LupaPasswordController::class, 'resetpass'])->middleware('guest');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login')->middleware('guest');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback')->middleware('guest');

Route::get('/ubahpassword', [UbahPasswordController::class, 'index'])->middleware('auth');
Route::post('/ubahpassword', [UbahPasswordController::class, 'store'])->middleware('auth');

Route::get('/detailproduk/{slug}', [BarangController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'store'])->middleware('auth');
Route::post('/cart-remove', [CartController::class, 'destroy'])->middleware('auth');
Route::post('/update-cart', [CartController::class, 'updateCart'])->middleware('auth');

Route::post('/pesan', [PesananController::class, 'store'])->middleware('auth');
Route::post('/pesanproduk', [PesananController::class, 'create'])->middleware('auth');
Route::get('/checkout/{slug}', [PesananController::class, 'index'])->middleware(['auth', 'checkout']);
Route::post('/checkout', [PesananController::class, 'checkout'])->middleware('auth');
Route::post('/pesananbatal', [PesananController::class, 'batal'])->middleware('auth');
Route::post('/waktuhabis', [PesananController::class, 'waktuhabis'])->middleware('auth');
Route::post('/terimapesanan', [PesananController::class, 'terimapesanan'])->middleware('auth');

Route::get('inputProvinsi', [AlamatController::class, 'provinsi'])->name('pilihProv');
Route::get('inputKota/{id}', [AlamatController::class, 'regency'])->name('pilihKota');
Route::get('inputKecamatan/{id}', [AlamatController::class, 'district'])->name('pilihKecamatan');
Route::get('inputKelurahan/{id}', [AlamatController::class, 'village'])->name('pilihKelurahan');
Route::get('inputKodePos/{id}', [AlamatController::class, 'kodepos'])->name('pilihKodePos');

Route::get('/ubahAlamat/{slug}', [AlamatController::class, 'index'])->middleware(['auth', 'checkout']);
Route::post('/ubahalamat', [AlamatController::class, 'ubahalamat'])->middleware('auth');
Route::get('/tambahAlamat/{slug}', [AlamatController::class, 'create'])->middleware(['auth', 'checkout']);
Route::post('/createalamat', [AlamatController::class, 'store'])->middleware('auth');
Route::get('/editalamat/{slug}', [AlamatController::class, 'edit'])->middleware('auth');
Route::post('/editalamat', [AlamatController::class, 'update'])->middleware('auth');
Route::post('/hapusalamat', [AlamatController::class, 'destroy'])->middleware('auth');

Route::get('/pembayaran/{slug}', [PembayaranController::class, 'index'])->middleware(['auth', 'bayar']);
Route::get('/revisipembayaran/{slug}', [PembayaranController::class, 'revisi'])->middleware(['auth', 'bayar']);
Route::post('/unggahbukti', [PembayaranController::class, 'unggah'])->middleware('auth');
Route::post('/revisiunggahbukti', [PembayaranController::class, 'unggahrevisi'])->middleware('auth');

Route::post('/rating', [DetailRatingController::class, 'rating'])->middleware('auth');

Route::get('/pembayaran/kode-unik', function () {
    return view('kodepembayaran');
});

//////////////////////////ADMIN////////////////////////////
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');
Route::get('/dash-audit', [DashboardController::class, 'audit'])->middleware('admin');
Route::post('/dash-audit', [PesananController::class, 'audit'])->middleware('admin');
Route::post('/dash-tolakaudit', [PesananController::class, 'tolakaudit'])->middleware('admin');
Route::get('/dash-dikemas', [DashboardController::class, 'dikemas'])->middleware('admin');
Route::post('/dash-dikemas', [DashboardController::class, 'dikemaspost'])->middleware('admin');
Route::post('/dash-jaskir', [DashboardController::class, 'jaskir'])->middleware('admin');
Route::get('/dash-dikirim', [DashboardController::class, 'dikirim'])->middleware('admin');
Route::get('/dash-diambil', [DashboardController::class, 'diambil'])->middleware('admin');
Route::get('/dash-batal', [DashboardController::class, 'batal'])->middleware('admin');
Route::get('/dash-selesai', [DashboardController::class, 'selesai'])->middleware('admin');
Route::get('/dash-pesanan', [DashboardController::class, 'pesanan'])->middleware('admin');
Route::get('/dash-pembayaran', [DashboardController::class, 'pembayaran'])->middleware('admin');

Route::get('/dash-kategori', [KategoriController::class, 'index'])->middleware('admin');
Route::get('/dash-buatkategori', [KategoriController::class, 'create'])->middleware('admin');
Route::post('/dash-buatkategori', [KategoriController::class, 'store'])->middleware('admin');
Route::get('/createslugkategori', [KategoriController::class, 'checkSlug'])->middleware('admin');
Route::get('/dash-daftarproduk/{slug}', [KategoriController::class, 'listprogram'])->name('programkategori')->middleware('admin');
Route::get('/dash-updatekategori/{slug}', [KategoriController::class, 'indexupdate'])->name('updatekategori')->middleware('admin');
Route::post('/dash-updatekategori', [KategoriController::class, 'update'])->middleware('admin');
Route::post('/dash-nonaktifkankategori', [KategoriController::class, 'nonaktif'])->middleware('admin');
Route::post('/dash-aktifkankategori', [KategoriController::class, 'aktif'])->middleware('admin');

Route::get('/dash-produk', [BarangController::class, 'index'])->middleware('admin');
Route::get('/dash-buatproduk', [BarangController::class, 'indexcreate'])->middleware('admin');
Route::post('/dash-buatproduk', [BarangController::class, 'store'])->middleware('admin');
Route::post('/dash-updatestok', [BarangController::class, 'updatestok'])->middleware('admin');
Route::post('/dash-updateproduk', [BarangController::class, 'update'])->middleware('admin');
Route::post('/dash-deleteproduk', [BarangController::class, 'destroy'])->middleware('admin');

Route::get('/dash-metodepembayaran', [PaymentController::class, 'index'])->middleware('admin');
Route::get('/dash-tambahmetodepembayaran', [PaymentController::class, 'create'])->middleware('admin');
Route::post('/dash-tambahmetodepembayaran', [PaymentController::class, 'store'])->middleware('admin');
Route::get('/dash-ubahmetodepembayaran/{slug}', [PaymentController::class, 'edit'])->middleware('admin');
Route::post('/dash-ubahmetodepembayaran', [PaymentController::class, 'update'])->middleware('admin');
Route::post('/dash-nonaktifmetodepembayaran', [PaymentController::class, 'nonaktif'])->middleware('admin');
Route::post('/dash-aktifmetodepembayaran', [PaymentController::class, 'aktif'])->middleware('admin');

