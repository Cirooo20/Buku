@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2 text-white">Tambah Data Buku</h1>
            <p class="text-gray-200">MasterData > Data Buku > Tambah</p>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="kode_buku" class="block text-gray-200 text-sm font-bold mb-2">Kode Buku:</label>
                    <input type="text" id="kode_buku" name="kode_buku" placeholder="Masukkan Kode Buku"
                        value="{{ old('kode_buku') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('kode_buku')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="judul" class="block text-gray-200 text-sm font-bold mb-2">Judul:</label>
                    <input type="text" id="judul" name="judul" placeholder="Masukkan Judul"
                        value="{{ old('judul') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('judul')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="penulis" class="block text-gray-200 text-sm font-bold mb-2">Penulis:</label>
                    <input type="text" id="penulis" name="penulis" placeholder="Masukkan Penulis"
                        value="{{ old('penulis') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('penulis')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="penerbit" class="block text-gray-200 text-sm font-bold mb-2">Penerbit:</label>
                    <input type="text" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit"
                        value="{{ old('penerbit') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('penerbit')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tahun_terbit" class="block text-gray-200 text-sm font-bold mb-2">Tahun Terbit:</label>
                    <input type="number" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan Tahun Terbit"
                        value="{{ old('tahun_terbit') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('tahun_terbit')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="mb-4">
                        <label for="sinopsis" class="block text-gray-200 text-sm font-bold mb-2">Sinopsis:</label>
                        <textarea id="sinopsis" name="sinopsis" rows="3" placeholder="Masukkan Sinopsis"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">{{ old('sinopsis') }}</textarea>
                        @error('sinopsis')
                            <div class="alert alert-danger text-red-500" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 flex flex-row flex-wrap">
                    <div class="w-full mb-4">
                        <label for="kategori" class="block text-gray-200 text-sm font-bold mb-2">Kategori Buku:</label>
                        <select id="kategori" name="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline bg-white">
                            <option value="">Pilih Kategori</option>
                            <option value="fiksi">Fiksi</option>
                            <option value="nonfiksi">Non-Fiksi</option>
                            <option value="sains">Sains</option>
                            <option value="teknologi">Teknologi</option>
                            <option value="sejarah">Sejarah</option>
                            <option value="biografi">Biografi</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="pendidikan">Dongeng </option>
                            <option value="pendidikan">Agama </option>
                        </select>
                        @error('kategori')
                            <div class="alert alert-danger text-red-500" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 flex flex-row flex-wrap">
                    <div class="w-full md:w-3/12 mb-4">
                        <img id="preview" src="" alt="" class="w-80 h-80 rounded-lg border-2 border-white mt-4">
                    </div>
                    <div class="w-full md:w-9/12 mb-4">
                        <label for="foto" class="block text-gray-200 text-sm font-bold mb-2">Foto Buku:</label>
                        <input type="file" id="foto" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline bg-white" onchange="previewImage(this)">
                        @error('foto')
                            <div class="alert alert-danger text-red-500" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
