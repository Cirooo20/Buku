@extends('Dashboard.LayoutDB')

@section('konten')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">Dashboard</h1>
            <p class="text-gray-400">Dashboard</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Jumlah Anggota</h2>
                <p class="text-3xl font-bold">{{ $JumlahAnggota }}</p>
                <p class="text-sm text-gray-400 mt-2">Meningkat 5% dari bulan lalu</p>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Jumlah Buku</h2>
                <p class="text-3xl font-bold">{{ $JumlahBuku }}</p>
                <p class="text-sm text-gray-400 mt-2">Bertambah 50 buku bulan ini</p>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Peminjaman Aktif</h2>
                <p class="text-3xl font-bold">{{ $JumlahPeminjaman }}</p>
                <p class="text-sm text-gray-400 mt-2">Jumlah peminjaman saat ini</p>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Buku Terlambat</h2>
                <p class="text-3xl font-bold">45</p>
                <p class="text-sm text-gray-400 mt-2">Turun 10% dari minggu lalu</p>
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-between">
            <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full md:w-[48%] mb-4 md:mb-0">
                <h2 class="text-xl font-semibold mb-4">Buku Paling Sering Dipinjam</h2>
                <div class="flex flex-col md:flex-row">
                    <img src="{{ asset('images/' . $bukuTerpopuler[0]['foto']) }}" alt="{{ $bukuTerpopuler[0]['judul'] }}"
                        class="w-full md:w-48 h-72 object-cover rounded-lg shadow-md mb-4 md:mb-0 md:mr-6">
                    <div>
                        <p class="text-lg font-bold">{{ $bukuTerpopuler[0]['judul'] }}</p>
                        <p class="text-sm text-gray-400 mt-1">{{ $bukuTerpopuler[0]['penulis'] }} | {{ $bukuTerpopuler[0]['tahun_terbit'] }}</p>
                        <p class="mt-2">Jumlah Peminjaman: {{ $bukuTerpopuler[0]['jumlah_peminjaman'] }} kali</p>
                        <p class="mt-2">{{ Str::limit($bukuTerpopuler[0]['sinopsis'], 200) }}</p>
                    </div>
                </div>
            </div>
            @if ($Awal)
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full md:w-[48%]">
                    <div class="flex flex-col md:flex-row">
                        <img src="{{ asset('images/' . $Awal->foto) }}" alt="{{ $Awal->judul }}"
                            class="w-full md:w-48 h-72 object-cover rounded-lg shadow-md mb-4 md:mb-0 md:mr-6">
                        <div>
                            <p class="text-lg font-bold">{{ $Awal->judul }}</p>
                            <p class="text-sm text-gray-400 mt-1">{{ $Awal->penerbit }} |
                                {{ $Awal->tahun_terbit }}</p>
                            <p class="mt-2 text-gray-300">
                                {{ Str::limit($Awal->sinopsis, 150) }}
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full md:w-[48%]">
                    <p class="text-lg text-gray-400">Belum ada buku terbaru yang ditambahkan.</p>
                </div>
            @endif
        </div>

        <div class="mt-8">
            <div class="bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Buku Paling Banyak Dipinjam</h2>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="px-4 py-2">Peringkat</th>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Penulis</th>
                                <th class="px-4 py-2">Jumlah Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPeminjaman = 0;
                            @endphp
                            @foreach($bukuTerpopuler as $index => $buku)
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-2 text-center">
                                        <span class="text-xl font-bold
                                            @if($index == 0) text-yellow-500
                                            @elseif($index == 1) text-gray-400
                                            @elseif($index == 2) text-orange-600
                                            @else text-white
                                            @endif">{{ $index + 1 }}</span>
                                    </td>
                                    <td class="px-4 py-2">{{ $buku['judul'] }}</td>
                                    <td class="px-4 py-2 text-gray-400">{{ $buku['penulis'] }}</td>
                                    <td class="px-4 py-2 text-center">{{ number_format($buku['jumlah_peminjaman'], 0, ',', '.') }}</td>
                                </tr>
                                @php
                                    $totalPeminjaman += $buku['jumlah_peminjaman'];
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-right">
                    <p class="text-lg font-bold">Total Jumlah Peminjaman: <span class="text-xl text-blue-400">{{ $totalPeminjaman }}</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
