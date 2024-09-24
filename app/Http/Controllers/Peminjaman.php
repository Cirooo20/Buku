<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\borrowing;
use App\Models\detail_peminjaman;
use App\Models\Students;
use Illuminate\Http\Request;

class Peminjaman extends Controller
{
    public function index()
    {
        $peminjaman = new borrowing();
        $siswa = new Students();
        return view('Dashboard.Pages.Transaksi.Peminjaman.datapeminjaman', ["Peminjaman" => $peminjaman->all(), "siswa" => $siswa->all()]);
    }

    public function tambah()
    {
        return view('Dashboard.Pages.Transaksi.Peminjaman.Tambah');
    }

    public function Create(Request $request)
    {
        $peminjaman = new borrowing();
        $simpan = $peminjaman->create([
            'nis' => $request->nis,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);
        
        foreach ($request->kode_buku as $index => $kode_buku) {
            $detail_peminjaman = new detail_peminjaman();
            $detail_peminjaman->create([
                'kode_buku' => $kode_buku,
                'id_peminjaman' => $simpan->id,
                'jumlah' => $request->jumlah
            ]);
        }
        return response()->json($simpan);

        // return redirect()->route('peminjaman')->with('success', 'Peminjaman Berhasil Ditambahkan');
    }
    

    public function apiSiswa($nis)
    {
        $pelanggan = Students::where('nis', $nis)->first();

        if ($pelanggan->exists()) {
            return response()->json($pelanggan);
        }
        return response()->json(['pesan' => 'Kode Siswa Tidak Terdaftar'], 401);
    }

    public function apiBuku($kode_buku)
    {
        $buku = Book::where('kode_buku', $kode_buku)->first();

        if ($buku->exists()) {
            return response()->json($buku);
        }
        return response()->json(['pesan' => 'Kode Buku Tidak Terdaftar'], 401);
    }
}
