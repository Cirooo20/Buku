<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\detail_peminjaman;
use App\Models\Students;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $JumlahSiswa = Students::Count();
        $JumlahBuku = Book::Count();
        $JumlahPeminjaman = detail_peminjaman::sum('jumlah'); 
        $Awal = Book::latest('created_at')->first();

        $bukuTerpopuler = detail_peminjaman::select('kode_buku')
            ->groupBy('kode_buku')
            ->orderByRaw('SUM(jumlah) DESC')
            ->get()
            ->map(function ($item) {
                $buku = Book::find($item->kode_buku);
                return [
                    'judul' => $buku->judul,
                    'foto' => $buku->foto,
                    'penulis' => $buku->penulis,
                    'tahun_terbit' => $buku->tahun_terbit,
                    'sinopsis' => $buku->sinopsis,
                    'jumlah_peminjaman' => detail_peminjaman::where('kode_buku', $item->kode_buku)->sum('jumlah')
                ];
            });

        $labels = ['JumlahAnggota', 'JumlahBuku', 'JumlahPeminjaman'];
        $dataFiksi = Book::where('kategori', 'Fiksi')->count();
        $dataNonFiksi = Book::where('kategori', 'Non-Fiksi')->count();
        $dataPendidikan = Book::where('kategori', 'Pendidikan')->count();

        return view(
            "Dashboard.Pages.Dashboard",
            [
                "JumlahAnggota" => $JumlahSiswa,
                "JumlahBuku" => $JumlahBuku,
                "JumlahPeminjaman" => $JumlahPeminjaman, 
                'Awal' => $Awal,
                'bukuTerpopuler' => $bukuTerpopuler,
                'labels' => $labels,
                'dataFiksi' => $dataFiksi,
                'dataNonFiksi' => $dataNonFiksi,
                'dataPendidikan' => $dataPendidikan
            ]
        );
    }
}
