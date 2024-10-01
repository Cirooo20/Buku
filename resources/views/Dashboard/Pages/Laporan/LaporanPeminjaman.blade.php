@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">Laporan Peminjaman</h1>
            <p class="text-gray-400">Laporan > Peminjaman Per Hari</p>
        </div>
        
        <table class="min-w-full bg-gray-700 text-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jumlah Peminjaman</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Hari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Bulan</th>
                </tr>
            </thead>
            <tbody class="bg-gray-600 divide-y divide-gray-500">
                @foreach ($peminjamanPerHari as $peminjaman)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $peminjaman->jumlah_peminjaman }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('l') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('F') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
