<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HalamanUser extends Controller
{
    public function index()
    {
        $Buku = new Book();
        return view(
            "halamanUtama.Pages.index",
            [
                'buku' => $Buku->all()
            ]
        );
    }

    public function peminjaman($kode_Buku)
    {
        $Buku = new Book();
        return view(
            'halamanUtama.Pages.HalamanPeminjaman',
            [
                "peminjaman" => $Buku->find($kode_Buku)
            ]
        );
    }

    public function kategori($kategori)
    {
        $buku = Book::where('kategori', $kategori)->get();
        return view(
            'halamanUtama.Pages.Kategori',
            [
                'kategori' => $kategori,
                'buku' => $buku
            ]
        );
    }
}