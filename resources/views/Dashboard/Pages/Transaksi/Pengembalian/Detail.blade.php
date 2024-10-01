@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2 text-white">Detail Pengembalian</h1>
            <p class="text-gray-400">Transaksi > Detail Pengembalian</p>
        </div>

        <div id="detailView" class="bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-3">
                    <label for="nis" class="block text-sm font-medium text-white">NIS</label>
                    <input type="text" name="nis" id="nis"
                        class="form-input bg-body-secondary w-full text-black focus:outline-none"
                        value="{{ $pengembalian->nis }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal_kembali" class="block text-sm font-medium text-white">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                        class="form-input border-0 bg-body-secondary w-full text-black focus:outline-none"
                        value="{{ $pengembalian->tanggal_kembali }}" readonly>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-3">
                    <label for="nama" class="block text-sm font-medium text-white">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="form-input w-full text-black focus:outline-none" value="{{ $nama }}" readonly>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-3">
                    <label for="kode_kelas" class="block text-sm font-medium text-white">Kode Kelas</label>
                    <input type="text" name="kode_kelas" id="kode_kelas"
                        class="form-input w-full text-black focus:outline-none" readonly value="{{ $kode_kelas }}">
                </div>
            </div>
            <table class="table-pengembalian min-w-full bg-gray-700 text-white border border-white border-collapse mt-6">
                <thead>
                    <tr class="align-middle border-b border-white">
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">#
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                            Kode Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                            Judul Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                            Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                            Penerbit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                            Tahun Terbit</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                            Jumlah Buku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengembalian->detailPengembalian as $index => $detail)
                        <tr class="border-b border-white">
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white">
                                {{ $detail->book ? $detail->book->kode_buku : 'Data tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white">
                                {{ $detail->book ? $detail->book->judul : 'Data tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white">
                                {{ $detail->book ? $detail->book->penulis : 'Data tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white">
                                {{ $detail->book ? $detail->book->penerbit : 'Data tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white">
                                {{ $detail->book ? $detail->book->tahun_terbit : 'Data tidak tersedia' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-white">{{ $detail->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-end mt-4 gap-4">
                <a href="/pengembalian"
                    class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Kembali</a>
            </div>
        </div>

    </div>
@endsection
