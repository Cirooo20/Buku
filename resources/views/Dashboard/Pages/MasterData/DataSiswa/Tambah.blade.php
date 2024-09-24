@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2 text-white">Tambah Data Siswa</h1>
            <p class="text-gray-200">MasterData > Data Siswa > Tambah</p>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <form method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nis" class="block text-gray-200 text-sm font-bold mb-2">NIS:</label>
                    <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" value="{{ old('nis') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('nis')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-200 text-sm font-bold mb-2">Nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('nama')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-200 text-sm font-bold mb-2">Alamat:</label>
                    <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" value="{{ old('alamat') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    @error('alamat')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="no_telp" class="block text-gray-200 text-sm font-bold mb-2">No. Telp:</label>
                    <input type="text" id="no_telp" name="no_telp" placeholder="Masukkan No. Telp" value="{{ old('no_telp') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline">
                    @error('no_telp')
                        <div class="alert alert-danger text-red-500" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="mb-4">
                        <label for="kode_kelas" class="block text-gray-200 text-sm font-bold mb-2">Kode Kelas:</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" name="kode_kelas" id="kode_kelas">
                            <option value="">Pilih Kode Kelas</option>
                            @foreach ($Classroom as $class)
                                <option value="{{ $class->kode_kelas }}" 
                                    {{ old('kode_kelas') == $class->kode_kelas ? 'selected' : '' }}>
                                    {{ $class->kode_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_kelas')
                            <div class="alert alert-danger text-red-500" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </form>
        </div>
    </div>
@endsection
