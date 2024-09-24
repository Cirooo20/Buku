@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">Data Siswa</h1>
            <p class="text-gray-400">MasterData > Data Siswa</p>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Daftar Siswa</h2>
                <a href="datasiswa/tambah" class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Siswa
                </a>
            </div>
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-gray-700 text-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">NIS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No. Telp</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kode Kelas</th>
                            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-600 divide-y divide-gray-500">
                        @foreach ($siswa as $s)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $s->nis }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $s->nama }}</td>
                                <td class="px-6 py-4">{{ $s->alamat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $s->no_telp }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $s->kode_kelas }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="/datasiswa/Edit/{{ $s->nis }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                        Edit
                                    </a>
                                    <a href="/datasiswa/Hapus/{{ $s->nis }}"
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
                    {{ $siswa->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
