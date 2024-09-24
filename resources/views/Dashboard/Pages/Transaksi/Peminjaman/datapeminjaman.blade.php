@extends('Dashboard.LayoutDB')

@section('konten')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Data Peminjaman</h1>
        <p class="text-gray-400">Transaksi > Data Peminjaman</p>
    </div>

    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Daftar Peminjaman</h2>
            <a href="/peminjaman/tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</a>
        </div>
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-gray-700 text-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Peminjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Peminjaman</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Pengembalian</th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-600 divide-y divide-gray-500">
                    @foreach ($Peminjaman as $p)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $siswa->where('nis', $p->nis)->first()->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $p->tanggal_pinjam }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $p->tanggal_kembali }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="mt-4 flex justify-center">
                {{ $DataBuku->links('vendor.pagination.tailwind') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection