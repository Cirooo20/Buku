<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DataBuku extends Controller
{

    public function index()
    {
        $DataBuku = Book::paginate(10);

        return view('Dashboard.Pages.MasterData.DataBuku.databuku', compact('DataBuku'));
    }

    public function tambah()
    {
        return view('Dashboard.Pages.MasterData.DataBuku.Tambah');
    }

    public function Create(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'sinopsis' => 'required',
            'penulis' => 'required',
        ], [
            'kode_buku.required' => 'Kode buku harus diisi',
            'judul.required' => 'Judul buku harus diisi',
            'penerbit.required' => 'Penerbit harus diisi',
            'tahun_terbit.required' => 'Tahun terbit harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar dengan format jpeg, png, jpg, atau gif',
            'foto.max' => 'Foto harus berukuran maksimal 10MB',
            'sinopsis.required' => 'Sipnosis harus diisi',
            'penulis.required' => 'Penulis harus diisi',
        ]);

        $buku = new Book();
        $buku->kode_buku = $request->kode_buku;
        $buku->judul = $request->judul;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->sinopsis = $request->sinopsis;
        $buku->penulis = $request->penulis;
        $buku->kategori = $request->kategori;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $buku->foto = $imageName;
        }

        $buku->save();
        return redirect('/databuku');
    }

    public function Edit($kode_buku)
    {
        $buku = new Book();
        return view('Dashboard.Pages.MasterData.DataBuku.Edit', ['buku' => $buku->find($kode_buku)]);
    }

    public function Update(Request $request, $kode_buku)
    {
        $buku = Book::find($kode_buku);

        $validatedData = $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'sinopsis' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
        ], [
            'kode_buku.required' => 'Kode buku harus diisi',
            'judul.required' => 'Judul buku harus diisi',
            'penerbit.required' => 'Penerbit harus diisi',
            'tahun_terbit.required' => 'Tahun terbit harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar dengan format jpeg, png, jpg, atau gif',
            'foto.max' => 'Foto harus berukuran maksimal 10MB',
            'sinopsis.required' => 'Sipnosis harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'kategori.required' => 'katgori harus diisi',
        ]);

        $buku->update([
            'kode_buku' => $validatedData['kode_buku'],
            'judul' => $validatedData['judul'],
            'penerbit' => $validatedData['penerbit'],
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'sinopsis' => $validatedData['sinopsis'],
            'penulis' => $validatedData['penulis'],
            'kategori' => $validatedData['kategori'],
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $buku->update(['foto' => $imageName]);
        }

        return redirect('/databuku');
    }

    public function hapus($kode_buku)
    {
        $buku = new Book();
        $buku->find($kode_buku)->Delete();
        return redirect('/databuku');
    }

    // Search
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect('/'); 
        }
        $books = Book::where('judul', 'LIKE', "%{$query}%")
            ->orWhere('penerbit', 'LIKE', "%{$query}%")
            ->orWhere('penulis', 'LIKE', "%{$query}%")
            ->get();


        // return response()->json($books);
        return view('halamanUtama.Pages.search',  [
            'books' => $books,
            'query' => $query 
        ]);
    }
}
