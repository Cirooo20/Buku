@extends('halamanUtama.LayoutH')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-8 text-center">kategori buku</h1>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <a href="{{ url('/kategori/fiksi') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-book text-4xl mb-4 text-blue-500"></i>
                    <h3 class="text-xl font-semibold">fiksi</h3>
                </a>
                <a href="{{ url('/kategori/non-fiksi') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-book text-4xl mb-4 text-green-500"></i>
                    <h3 class="text-xl font-semibold">non-fiksi</h3>
                </a>
                <a href="{{ url('/kategori/sains') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-flask text-4xl mb-4 text-purple-500"></i>
                    <h3 class="text-xl font-semibold">sains</h3>
                </a>
                <a href="{{ url('/kategori/teknologi') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-microchip text-4xl mb-4 text-blue-500"></i>
                    <h3 class="text-xl font-semibold">teknologi</h3>
                </a>
                <a href="{{ url('/kategori/sejarah') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-history text-4xl mb-4 text-yellow-500"></i>
                    <h3 class="text-xl font-semibold">sejarah</h3>
                </a>
                <a href="{{ url('/kategori/biografi') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-user text-4xl mb-4 text-orange-500"></i>
                    <h3 class="text-xl font-semibold">biografi</h3>
                </a>
                <a href="{{ url('/kategori/pendidikan') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-graduation-cap text-4xl mb-4 text-red-500"></i>
                    <h3 class="text-xl font-semibold">pendidikan</h3>
                </a>
                <a href="{{ url('/kategori/dongeng') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-book-open text-4xl mb-4 text-pink-500"></i>
                    <h3 class="text-xl font-semibold">dongeng</h3>
                </a>
                <a href="{{ url('/kategori/agama') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-pray text-4xl mb-4 text-teal-500"></i>
                    <h3 class="text-xl font-semibold">agama</h3>
                </a>
                <a href="{{ url('/kategori/musik') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-music text-4xl mb-4 text-indigo-500"></i>
                    <h3 class="text-xl font-semibold">musik</h3>
                </a>
                <a href="{{ url('/kategori/kuliner') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-utensils text-4xl mb-4 text-yellow-400"></i>
                    <h3 class="text-xl font-semibold">kuliner</h3>
                </a>
                <a href="{{ url('/kategori/seni') }}" class="bg-gray-700 p-6 rounded-lg shadow-lg text-center block">
                    <i class="fas fa-palette text-4xl mb-4 text-pink-400"></i>
                    <h3 class="text-xl font-semibold">seni</h3>
                </a>
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Disarankan Untuk Anda</h2>
            <div class="relative overflow-x-auto">
                <div class="flex space-x-6 pb-4 overflow-x-scroll scrollbar-hide">
                    @for ($i = 1; $i <= 10; $i++)
                        @if(isset($buku[$i]))
                            <div class="flex-none w-64">
                                <div class="bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="{{ asset('images/' . $buku[$i]->foto) }}" alt=""
                                        class="w-full h-48 object-cover mb-4 rounded">
                                    <h3 class="text-xl font-semibold mb-2">{{ $buku[$i]->judul }}</h3>
                                    <p class="text-gray-300 mb-2">Penulis: {{ $buku[$i]->penulis }}</p>
                                    <a href="/HalamanPeminjaman/{{ $buku[$i]->kode_buku }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Lihat Detail</a>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-center">Buku Terfavorit</h2>
            <div class="flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-8">
                <div class="bg-gray-700 rounded-lg shadow-lg overflow-hidden w-full md:w-1/2">
                    <img src="{{ asset('images/' . $buku[6]->foto) }}" alt="Buku Favorit 1" class="w-full h-96 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $buku[6]->judul }}</h3>
                        <p class="text-gray-300 mb-2">Penulis: {{ $buku[6]->penulis }}</p>
                        <a href="/HalamanPeminjaman/{{ $buku[6]->Kode_buku }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Lihat
                            Detail</a>
                    </div>
                </div>

                <div class="bg-gray-700 rounded-lg shadow-lg overflow-hidden w-full md:w-1/2">
                    <img src="{{ asset('images/' . $buku[7]->foto) }}" alt="Buku Favorit 2" class="w-full h-96 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $buku[7]->judul }}</h3>
                        <p class="text-gray-300 mb-2">Penulis: {{ $buku[7]->penulis }}</p>
                        <a href="/HalamanPeminjaman/{{ $buku[7]->Kode_buku }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Lihat
                            Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Buku Terbaru</h2>
            <div class="relative overflow-x-auto">
                <div class="flex space-x-6 pb-4 overflow-x-scroll scrollbar-hide">
                    @for ($i = 11; $i <= 20; $i++)
                        @if(isset($buku[$i]))
                            <div class="flex-none w-64">
                                <div class="bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="{{ asset('images/' . $buku[$i]->foto) }}" alt=""
                                        class="w-full h-48 object-cover mb-4 rounded">
                                    <h3 class="text-xl font-semibold mb-2">{{ $buku[$i]->judul }}</h3>
                                    <p class="text-gray-300 mb-2">Penulis: {{ $buku[$i]->penulis }}</p>
                                    <a href="/HalamanPeminjaman/{{ $buku[$i]->kode_buku }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Lihat Detail</a>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Buku Umum</h2>
            <div class="relative overflow-x-auto">
                <div class="flex space-x-6 pb-4 overflow-x-scroll scrollbar-hide">
                    @for ($i = 5; $i <= 14; $i++)
                        @if(isset($buku[$i]))
                            <div class="flex-none w-64">
                                <div class="bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="{{ asset('images/' . $buku[$i]->foto) }}" alt=""
                                        class="w-full h-48 object-cover mb-4 rounded">
                                    <h3 class="text-xl font-semibold mb-2">{{ $buku[$i]->judul }}</h3>
                                    <p class="text-gray-300 mb-2">Penulis: {{ $buku[$i]->penulis }}</p>
                                    <a href="/HalamanPeminjaman/{{ $buku[$i]->kode_buku }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Lihat Detail</a>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <div class="mt-16" id="index">
            <h2 class="text-3xl font-bold mb-8 text-center">Buku Rekomendasi</h2>
            <div class="container mx-auto px-4">
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg flex flex-col md:flex-row">
                    <img src="{{ asset('images/' . $buku[16]->foto) }}" alt="Buku Rekomendasi"
                        class="w-full md:w-1/3 h-64 md:h-auto object-cover mb-4 md:mb-0 md:mr-6 rounded">
                    <div class="md:w-2/3">
                        <h3 class="text-2xl font-semibold mb-4">{{ $buku[16]->judul }}</h3>
                        <p class="text-gray-300 mb-4">Penulis: {{ $buku[16]->penulis }}</p>
                        <p class="text-gray-400 mb-6">{{ $buku[16]->sinopsis }}</p>
                        <a href="/HalamanPeminjaman/{{ $buku[16]->Kode_buku }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded inline-block">Lihat
                            Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
