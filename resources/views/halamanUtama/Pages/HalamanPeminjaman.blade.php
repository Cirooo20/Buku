@extends('halamanUtama.LayoutH')

@section('konten')
    <div class="container mx-auto px-4 py-8 min-h-screen flex flex-col">
        <div class="flex-grow">
            <div class="bg-gray-800 rounded-lg shadow-lg p-8 mb-8 max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/' . $peminjaman->foto) }}" alt="Sampul Buku"
                            class="w-full h-auto rounded-lg shadow-md">
                    </div>
                    <div class="md:w-1/2 md:pl-8">
                        <h1 class="text-4xl font-bold mb-4">{{ $peminjaman->judul }}</h1>
                        <p class="text-sm text-gray-400 mb-2">{{ $peminjaman->penulis }} |
                            <span>{{ $peminjaman->penerbit }}</span></p>
                        <p class="text-lg mb-8">{{ $peminjaman->sinopsis }}</p>
                        <div class="flex space-x-4 mt-4">
                            <a href="/"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded text-lg">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function bukaPopup() {
            document.getElementById('popupFormulir').classList.remove('hidden');
        }

        function tutupPopup() {
            document.getElementById('popupFormulir').classList.add('hidden');
        }
    </script>
@endsection
