<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuBelumKembali;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DataBuku;
use App\Http\Controllers\DataSiswa;
use App\Http\Controllers\HalamanUser;
use App\Http\Controllers\Laporan;
use App\Http\Controllers\Peminjaman;
use App\Http\Controllers\pengembalian;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', [HalamanUser::class, 'index']);

Route::get('/HalamanPeminjaman/{kode_buku}', [HalamanUser::class, 'peminjaman']);

Route::get('/kategori/{kategori}', [HalamanUser::class, 'kategori']);
// End Halaman Utama

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

// Detail
Route::get('/peminjaman/detail/{id_peminjaman}', [Peminjaman::class, 'Detail']);
Route::post('/peminjaman/detail/{id_peminjaman}', [Peminjaman::class, 'selesai']);

// Delete
Route::get('/peminjaman/delete/{id_peminjaman}', [Peminjaman::class, 'Delete']);

// Route API
Route::get('/peminjaman/tambah/{nis}', [Peminjaman::class, 'apiSiswa']);
Route::get('/peminjaman/tambah/Buku/{kode_buku}', [Peminjaman::class, 'apiBuku']);

// =============================================================================

// Transaksi / Pengembalian
Route::get('/pengembalian', [pengembalian::class, 'index']);

// pengembalian Tambah
Route::get('/pengembalian/tambah', [Pengembalian::class, 'Tambah']);
Route::post('/pengembalian/tambah', [Pengembalian::class, 'Create']);

// Detail
Route::get('/pengembalian/detail/{id_pengembalian}', [Pengembalian::class, 'Detail']);

// Route API
Route::get('/pengembalian/tambah/{nis}', [pengembalian::class, 'apiSiswa']);
Route::get('/pengembalian/tambah/Buku/{kode_buku}', [pengembalian::class, 'apiBuku']);

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

// =============================================================================

// Login Admin
Route::prefix('admin')->group(function () {
    Route::get('/data', [AdminController::class, 'index'])->name('admin.data.index');
    Route::get('/data/create', [AdminController::class, 'create'])->name('admin.data.create');
    Route::post('/data', [AdminController::class, 'store'])->name('admin.data.store');
    Route::get('/data/{id}/edit', [AdminController::class, 'edit'])->name('admin.data.edit');
    Route::put('/data/{id}', [AdminController::class, 'update'])->name('admin.data.update');
    Route::delete('/data/{id}', [AdminController::class, 'destroy'])->name('admin.data.destroy');
});