@extends('halamanUtama.LayoutH')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        @if($buku->isEmpty())
            <div class="flex flex-col items-center justify-center">
                <p class="text-center text-gray-500 mb-4">Tidak ada buku yang ditemukan dalam kategori ini.</p>
                <a href="{{ url('/') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-full inline-flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 shadow-lg">
                    <i class="fas fa-home mr-2"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        @else
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Kategori: {{ $kategori }}</h2>
                <a href="{{ url('/') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-full inline-flex items-center transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 shadow-lg">
                    <i class="fas fa-home mr-2"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($buku as $item)
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                        <img src="{{ asset('images/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-300 mb-2">Penulis: {{ $item->penulis }}</p>
                        <p class="text-gray-300 mb-2">Tahun Terbit: {{ $item->tahun_terbit }}</p>
                        <a href="{{ url('/HalamanPeminjaman/' . $item->kode_buku) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
