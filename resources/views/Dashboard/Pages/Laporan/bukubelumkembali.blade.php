@extends('Dashboard.LayoutDB')

@section('konten')

<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Daftar Buku Belum Kembali</h1>
        <p class="text-gray-400">Laporan > Buku Belum Kembali</p>
    </div>

    @if(isset($bukuBelumKembali) && count($bukuBelumKembali) > 0)
        <table class="min-w-full bg-gray-800 text-white border border-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium uppercase tracking-wider">Judul Buku</th>
                    <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium uppercase tracking-wider">Peminjam</th>
                    <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium uppercase tracking-wider">Tanggal Pinjam</th>
                    <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-gray-700 divide-y divide-gray-600">
                @foreach ($bukuBelumKembali as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img src="{{ asset('images/' . $item->buku->foto) }}" alt="{{ $item->buku->judul }}" class="w-10 h-10 object-cover rounded-full mr-3">
                            <span>{{ $item->buku->judul }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->peminjaman->siswa->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->peminjaman->tanggal_pinjam }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($item->terlambat)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Terlambat</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Belum Terlambat</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-400">Tidak ada data buku yang belum dikembalikan.</p>
    @endif
</div>

@endsection