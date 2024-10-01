<?php

namespace App\Http\Controllers;

use App\Models\detail_peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BukuBelumKembali extends Controller
{
    public function index()
    {
        $bukuBelumKembali = detail_peminjaman::whereNull('tanggal_kembali')
            ->with(['buku', 'peminjaman.siswa'])
            ->get()
            ->map(function ($item) {
                $item->terlambat = Carbon::parse($item->peminjaman->tanggal_pinjam)->addDays(7)->isPast();
                return $item;
            });

        return view('Dashboard.Pages.Laporan.bukubelumkembali', compact('bukuBelumKembali'));
    }
}
