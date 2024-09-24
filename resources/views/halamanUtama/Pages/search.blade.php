@extends('halamanUtama.LayoutH')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        @if($books->isEmpty())
            <p class="text-center text-gray-500">Tidak ada buku yang ditemukan berdasarkan pencarian.</p>
        @else
            <h2 class="text-3xl font-bold mb-8">Hasil Pencarian untuk "{{ $query }}"</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($books as $book)
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                        <img src="{{ asset('images/' . $book->foto) }}" alt="{{ $book->judul }}" class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-semibold mb-2">{{ $book->judul }}</h3>
                        <p class="text-gray-300 mb-2">Penulis: {{ $book->penulis }}</p>
                        <a href="/HalamanPeminjaman/{{ $book->Kode_buku }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection