<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\borrowing;
use App\Models\detail_peminjaman;
use App\Models\detail_pengembalian;
use App\Models\returned;
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
        $peminjaman = borrowing::create([
            'nis' => $request->nis,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);
    
        $id_peminjaman = $peminjaman->id;
    
        for ($i = 0; $i < count($request->kode_buku); $i++) {
            detail_peminjaman::create([
                'kode_buku' => $request->kode_buku[$i],
                'id_peminjaman' => $id_peminjaman,
                'jumlah' => $request->jumlah[$i]
            ]);
        }
    
        return redirect("/peminjaman");
    }
    
    // ======================================================================================
    // Detail
    public function Detail(Request $request, $id_peminjaman)
    {
        $peminjaman = borrowing::with(['detailPeminjaman.book'])->findOrFail($id_peminjaman);
        $siswa = Students::where('nis', $peminjaman->nis)->first();
        
        return view('Dashboard.Pages.Transaksi.Peminjaman.Detail', [
            "peminjaman" => $peminjaman,
            "nama" => $siswa->nama,
            "kode_kelas" => $siswa->kode_kelas
        ]);
    }

    public function selesai(Request $request, $id_peminjaman)
    {
        $pengembalian = returned::create([
            'nis' => $request->nis,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        $id_pengembalian = $pengembalian->id;

        for ($i = 0; $i < count($request->kode_buku); $i++) {
            detail_pengembalian::create([
                'kode_buku' => $request->kode_buku[$i],
                'id_pengembalian' => $id_pengembalian,
                'jumlah' => $request->jumlah[$i]
            ]);
        }

        $selectedBooks = $request->input('selected_books', []);
        detail_peminjaman::where('id_peminjaman', $id_peminjaman)
            ->whereIn('kode_buku', $selectedBooks)
            ->delete();

        $remainingDetails = detail_peminjaman::where('id_peminjaman', $id_peminjaman)->count();

        if ($remainingDetails == 0) {
            borrowing::where('id', $id_peminjaman)->delete();
        }

        return redirect("/peminjaman");
    }

    
    public function Delete($id_peminjaman)
    {
        $peminjaman = borrowing::findOrFail($id_peminjaman);
        $peminjaman->delete();
        return redirect("/peminjaman");
    }

    // ======================================================================================
    // API

    public function apiSiswa($nis)
    {
        $pelanggan = Students::where('nis', $nis)->first();

        if ($pelanggan) {
            return response()->json($pelanggan);
        }
        return response()->json(['pesan' => 'Kode Siswa Tidak Terdaftar'], 401);
    }

    public function apiBuku($kode_buku)
    {
        $buku = Book::where('kode_buku', $kode_buku)->first();

        if ($buku) {
            return response()->json($buku);
        }
        return response()->json(['pesan' => 'Kode Buku Tidak Terdaftar'], 401);
    }
}
