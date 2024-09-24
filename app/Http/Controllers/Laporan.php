<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\borrowing;
use App\Models\detail_peminjaman;
use Illuminate\Http\Request;

class Laporan extends Controller
{
    public function index()
    {
        $peminjamanPerHari = borrowing::selectRaw('DATE(tanggal_pinjam) as tanggal, COUNT(*) as jumlah_peminjaman')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('Dashboard.Pages.Laporan.LaporanPeminjaman', [
            'peminjamanPerHari' => $peminjamanPerHari
        ]);
    }

    public function terfovorite()
    {
        $bukuTerfavorit = detail_peminjaman::select('kode_buku')
            ->groupBy('kode_buku')
            ->orderByRaw('SUM(jumlah) DESC')
            ->limit(10)
            ->get()
            ->map(function ($item) {
                $buku = Book::find($item->kode_buku);
                return [
                    'judul' => $buku->judul,
                    'foto' => $buku->foto,
                    'penulis' => $buku->penulis,
                    'jumlah_peminjaman' => detail_peminjaman::where('kode_buku', $item->kode_buku)->sum('jumlah')
                ];
            });

        return view('Dashboard.Pages.Laporan.bukuterfavorite', [
            'bukuTerfavorit' => $bukuTerfavorit
        ]);
    }
}
