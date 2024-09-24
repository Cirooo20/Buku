@extends('halamanUtama.LayoutH')

@section('konten')
    <div class="container mx-auto px-4 py-8 min-h-screen flex flex-col">
        <div class="flex-grow">
            <div class="bg-gray-800 rounded-lg shadow-lg p-8 mb-8 max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/' . $peminjaman->foto) }}" alt="Sampul Buku" class="w-full h-auto rounded-lg shadow-md">
                    </div>
                    <div class="md:w-1/2 md:pl-8">
                        <h1 class="text-4xl font-bold mb-4">{{ $peminjaman->judul }}</h1>
                        <p class="text-sm text-gray-400 mb-2">{{ $peminjaman->penulis }} | <span>{{ $peminjaman->penerbit }}</span></p>
                        <p class="text-lg mb-8">{{ $peminjaman->sinopsis }}</p>
                        <div class="flex space-x-4 mt-4">
                            <button onclick="bukaPopup()"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded text-lg">
                                Pinjam Buku
                            </button>
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

    <div id="popupFormulir"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden flex items-center justify-center">
        <div class="relative p-8 border w-full max-w-2xl shadow-lg rounded-md bg-gray-800">
            <div class="mt-3 text-center">
                <h3 class="text-2xl leading-6 font-medium text-white mb-4">Formulir Peminjaman Buku</h3>
                <div class="mt-2">
                    <form>
                        <div class="mb-4">
                            <label for="nama" class="block text-white text-lg font-bold mb-2">Nama:</label>
                            <input type="text" id="nama" name="nama"
                                class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-white text-lg font-bold mb-2">Email:</label>
                            <input type="email" id="email" name="email"
                                class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal" class="block text-white text-lg font-bold mb-2">Tanggal
                                Peminjaman:</label>
                            <input type="date" id="tanggal" name="tanggal"
                                class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline text-lg">
                                Kirim
                            </button>
                            <button type="button" onclick="tutupPopup()"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline text-lg">
                                Batal
                            </button>
                        </div>
                    </form>
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
