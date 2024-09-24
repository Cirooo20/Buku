@extends('Dashboard.LayoutDB')

@section('konten')

<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Daftar Buku Belum Kembali</h1>
        <p class="text-gray-400">Laporan > Buku Belum Kembali</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 1" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Bumi Manusia</h3>
                <p class="text-gray-400 mb-2">Penulis: Pramoedya Ananta Toer</p>
                <p class="text-gray-400 mb-2">Peminjam: John Doe</p>
                <p class="text-gray-400">Tanggal Pinjam: 15 Mei 2023</p>
                <p class="text-red-500 mt-2">Terlambat: 30 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 2" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Laskar Pelangi</h3>
                <p class="text-gray-400 mb-2">Penulis: Andrea Hirata</p>
                <p class="text-gray-400 mb-2">Peminjam: Jane Smith</p>
                <p class="text-gray-400">Tanggal Pinjam: 1 Juni 2023</p>
                <p class="text-yellow-500 mt-2">Terlambat: 13 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 3" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Pulang</h3>
                <p class="text-gray-400 mb-2">Penulis: Tere Liye</p>
                <p class="text-gray-400 mb-2">Peminjam: Alice Johnson</p>
                <p class="text-gray-400">Tanggal Pinjam: 10 Juni 2023</p>
                <p class="text-green-500 mt-2">Terlambat: 4 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 4" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Negeri 5 Menara</h3>
                <p class="text-gray-400 mb-2">Penulis: Ahmad Fuadi</p>
                <p class="text-gray-400 mb-2">Peminjam: Bob Williams</p>
                <p class="text-gray-400">Tanggal Pinjam: 5 Juni 2023</p>
                <p class="text-yellow-500 mt-2">Terlambat: 9 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 5" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Ronggeng Dukuh Paruk</h3>
                <p class="text-gray-400 mb-2">Penulis: Ahmad Tohari</p>
                <p class="text-gray-400 mb-2">Peminjam: Emma Davis</p>
                <p class="text-gray-400">Tanggal Pinjam: 20 Mei 2023</p>
                <p class="text-red-500 mt-2">Terlambat: 25 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 6" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Sang Pemimpi</h3>
                <p class="text-gray-400 mb-2">Penulis: Andrea Hirata</p>
                <p class="text-gray-400 mb-2">Peminjam: Michael Brown</p>
                <p class="text-gray-400">Tanggal Pinjam: 8 Juni 2023</p>
                <p class="text-green-500 mt-2">Terlambat: 6 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 7" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Perahu Kertas</h3>
                <p class="text-gray-400 mb-2">Penulis: Dee Lestari</p>
                <p class="text-gray-400 mb-2">Peminjam: Olivia Wilson</p>
                <p class="text-gray-400">Tanggal Pinjam: 3 Juni 2023</p>
                <p class="text-yellow-500 mt-2">Terlambat: 11 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 8" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Ayat-Ayat Cinta</h3>
                <p class="text-gray-400 mb-2">Penulis: Habiburrahman El Shirazy</p>
                <p class="text-gray-400 mb-2">Peminjam: Daniel Lee</p>
                <p class="text-gray-400">Tanggal Pinjam: 12 Juni 2023</p>
                <p class="text-green-500 mt-2">Terlambat: 2 hari</p>
            </div>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <img src="img/6.jpeg" alt="Buku 9" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">Cantik Itu Luka</h3>
                <p class="text-gray-400 mb-2">Penulis: Eka Kurniawan</p>
                <p class="text-gray-400 mb-2">Peminjam: Sophia Martinez</p>
                <p class="text-gray-400">Tanggal Pinjam: 25 Mei 2023</p>
                <p class="text-red-500 mt-2">Terlambat: 20 hari</p>
            </div>
        </div>

</div>

@endsection