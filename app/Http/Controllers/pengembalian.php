<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\borrowing;
use App\Models\detail_pengembalian;
use App\Models\returned;
use App\Models\Students;
use Illuminate\Http\Request;

class pengembalian extends Controller
{
    public function index()
    {
        $pengembalian = Returned::with('borrowing')->get();
        $siswa = Students::all();
        $borrowing = borrowing::all();

        foreach ($pengembalian as $p) {
            if ($p->borrowing && $p->borrowing->tanggal_kembali) {
                $tanggal_kembali_seharusnya = $p->borrowing->tanggal_kembali;
                $tanggal_kembali_aktual = $p->tanggal_kembali;
                $selisih_hari = max(0, $tanggal_kembali_aktual->diffInDays($tanggal_kembali_seharusnya));
                $p->denda = $selisih_hari * 10000;
                $p->save();
            }
        }

        return view('Dashboard.Pages.Transaksi.Pengembalian.datapengembalian', compact('pengembalian', 'siswa'));
    }

    public function Detail($id_pengembalian)
    {
        $pengembalian = returned::with(['detailPengembalian.book'])->findOrFail($id_pengembalian);
        $siswa = Students::where('nis', $pengembalian->nis)->first();

        return view('Dashboard.Pages.Transaksi.Pengembalian.Detail', [
            "pengembalian" => $pengembalian,
            "nama" => $siswa->nama,
            "kode_kelas" => $siswa->kode_kelas
        ]);
    }

    // ======================================================================================

    // Route API
    public function apiSiswa($nis)
    {
        $siswa = Students::where('nis', $nis)->first();

        if ($siswa) {
            return response()->json($siswa);
        }
        return response()->json(['pesan' => 'NIS Siswa Tidak Terdaftar'], 404);
    }

    public function apiBuku($kode_buku)
    {
        $buku = Book::where('kode_buku', $kode_buku)->first();

        if ($buku) {
            return response()->json($buku);
        }
        return response()->json(['pesan' => 'Kode Buku Tidak Terdaftar'], 404);
    }
}
