<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DataBuku;
use App\Http\Controllers\DataSiswa;
use App\Http\Controllers\HalamanUser;
use App\Http\Controllers\Laporan;
use App\Http\Controllers\Peminjaman;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', [HalamanUser::class, 'index']);

Route::get('/HalamanPeminjaman/{kode_buku}', [HalamanUser::class, 'peminjaman']);

Route::get('/kategori/{kategori}', [HalamanUser::class, 'kategori']);
// End Halaman Utama

// =============================================================================

// Login Admin
Route::get('/admin/login', [Admin::class, 'index']);

Route::post('/admin/login', [Admin::class, 'login']);

Route::get('/dashboard', [Admin::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('auth:admin');

// =============================================================================

//Dashboard
Route::get('/dashboard', [Dashboard::class, 'index']);

// =============================================================================

// Master Data / DataSiswa
Route::get('/datasiswa', [DataSiswa::class, 'index']);
// DataSiswa Tambah
Route::get('/datasiswa/tambah', [DataSiswa::class, 'Tambah']);
Route::post('/datasiswa/tambah', [DataSiswa::class, 'Create']);
// Edit
Route::get('/datasiswa/Edit/{nis}', [DataSiswa::class, 'Edit']);
Route::post('/datasiswa/Edit/{nis}', [DataSiswa::class, 'Update']);
// Hapus
Route::get('/datasiswa/Hapus/{nis}', [DataSiswa::class, 'Hapus']);

// =============================================================================

// Master Data / DataBuku
Route::get('/databuku', [DataBuku::class, 'index']);
// Tambah
Route::get('/databuku/tambah', [DataBuku::class, 'tambah']);
Route::post('/databuku/tambah', [DataBuku::class, 'Create']);
// Edit
Route::get('/databuku/edit/{kode_buku}', [DataBuku::class, 'Edit']);
Route::post('/databuku/edit/{kode_buku}', [DataBuku::class, 'Update']);
// Hapus
Route::get('/databuku/hapus/{kode_buku}', [DataBuku::class, 'hapus']);

// =============================================================================

// Transaksi / Peminjaman
Route::get('/peminjaman', [Peminjaman::class, 'index']);

// Peminjaman Tambah
Route::get('/peminjaman/tambah', [Peminjaman::class, 'Tambah']);
Route::post('/peminjaman/tambah', [Peminjaman::class, 'Create']);

// Route API
Route::get('/peminjaman/tambah/{nis}', [Peminjaman::class, 'apiSiswa']);
Route::get('/peminjaman/tambah/Buku/{kode_buku}', [Peminjaman::class, 'apiBuku']);

// =============================================================================

// Transaksi / Pengembalian
Route::get('/pengembalian', function () {
    return view('Dashboard.Pages.Transaksi.Pengembalian.datapengembalian');
});

// =============================================================================

// Laporan / LaporanPeminjamanPerHari`
Route::get('/laporanPeminjaman',[Laporan::class,'index']);

// Laporan / LaporanPengembalian
Route::get('/laporanPengembalian', function () {
    return view('Dashboard.Pages.Laporan.bukubelumkembali');
});

// Laporan / LaporanTerfavorit
Route::get('/laporanTerfavorit', [Laporan::class, 'terfovorite']);

// =============================================================================

// Search
Route::get('/search', [DataBuku::class, 'search'])->name('search');
