@extends('Dashboard.LayoutDB')

@section('konten')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Data Pengembalian</h1>
        <p class="text-gray-400">Transaksi > Data Pengembalian</p>
    </div>

    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Daftar Pengembalian</h2>
        </div>
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-gray-700 text-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID Pengembalian</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Peminjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Kembali</th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-600 divide-y divide-gray-500">
                    @foreach ($pengembalian as $p)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $p->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $siswa->where('nis', $p->nis)->first()->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $p->tanggal_kembali }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="/pengembalian/detail/{{ $p->id }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection