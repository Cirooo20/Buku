@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2 text-white">Tambah Pengembalian</h1>
            <p class="text-gray-400">Transaksi > Tambah Pengembalian</p>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg p-6">

            <form action="" method="post" id="form" name="form">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-3">
                        <label for="nis" class="block text-sm font-medium text-white">NIS</label>
                        <input type="text" name="nis" id="nis"
                            class="form-input bg-body-secondary w-full text-black focus:outline-none @error('nis') border-red-500 @enderror"
                            value="{{ old('nis') }}">
                        @error('nis')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kembali" class="block text-sm font-medium text-white">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                            class="form-input border-0 bg-body-secondary w-full text-black focus:outline-none @error('tanggal_kembali') border-red-500 @enderror"
                            value="{{ old('tanggal_kembali', date('Y-m-d')) }}">
                        @error('tanggal_kembali')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-3">
                        <label for="nama" class="block text-sm font-medium text-white">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-input w-full text-black focus:outline-none @error('nama') border-red-500 @enderror" readonly value="{{ old('nama') }}">
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-3">
                        <label for="kode_kelas" class="block text-sm font-medium text-white">Kode Kelas</label>
                        <input type="text" name="kode_kelas" id="kode_kelas"
                            class="form-input w-full text-black focus:outline-none" readonly
                            value="{{ old('kode_kelas') }}">
                    </div>
                </div>

                <table id="bookTable" class="table-peminjaman min-w-full bg-gray-700 text-white border border-white border-collapse">
                    <thead>
                        <tr class="align-middle border-b border-white">
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                #
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="kode_buku" class="form-label">Kode Buku</label>
                                <input type="text" id="kode_buku" name="kode_buku"
                                    class="form-input form-input-sm text-black focus:outline-none"
                                    value="{{ old('kode_buku') }}">
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input type="text" id="judul" name="judul"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="{{ old('judul') }}">
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" id="penulis" name="penulis"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="{{ old('penulis') }}">
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" id="penerbit" name="penerbit"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="{{ old('penerbit') }}">
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                    <input type="text" id="tahun_terbit" name="tahun_terbit"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="{{ old('tahun_terbit') }}">
                            </th>
                            <th
                                class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="jumlah" class="form-label">Jumlah Buku</label>
                                <input type="number" id="jumlah" name="jumlah"
                                    class="form-input form-input-sm text-black focus:outline-none"
                                    value="{{ old('jumlah') }}">
                            </th>
                        </tr>
                    </thead>
                    <tbody id="bookTableBody">

                    </tbody>
                </table>
                <div class="flex justify-end mt-4 gap-4">
                    <button type="submit" id="kirim"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

        <script src="/js/ApiPengemablian.js"></script>
@endsection

@push('scripts')
<script src="{{ asset('JS/ApiPengemablian.js') }}"></script>
@endpush
