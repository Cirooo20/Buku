@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">Data Buku</h1>
            <p class="text-gray-400">MasterData > Data Buku</p>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Daftar Buku</h2>
                <a href="/databuku/tambah" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Buku
                </a>
            </div>
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-gray-700 text-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Foto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kode Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Penulis</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Penerbit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tahun Terbit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-600 divide-y divide-gray-500">
                        @foreach ($DataBuku as $DB)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><img src="{{ asset('images/' . $DB->foto) }}"
                                        alt="Foto Buku" class="w-24 h-32 rounded-sm"></td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $DB->kode_buku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $DB->judul }}</td>
                                <td class="px-6 py-4">{{ $DB->penulis }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $DB->penerbit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $DB->tahun_terbit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $DB->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="/databuku/edit/{{ $DB->kode_buku }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                        Edit
                                    </a>
                                    <a href="/databuku/hapus/{{ $DB->kode_buku }}"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Anda yakin?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 flex justify-center">
                    {{ $DataBuku->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
