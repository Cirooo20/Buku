@extends('Dashboard.LayoutDB')

@section('konten')

<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Buku Terfavorit</h1>
        <p class="text-gray-400">Laporan > Buku Terfavorit Bulan Ini</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach ($bukuTerfavorit as $buku)
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="{{ asset('images/' . $buku['foto']) }}" alt="{{ $buku['judul'] }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $buku['judul'] }}</h3>
                <p class="text-gray-400">Penulis: {{ $buku['penulis'] }}</p>
                <p class="text-gray-400 mt-2">Jumlah Peminjaman: {{ $buku['jumlah_peminjaman'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection