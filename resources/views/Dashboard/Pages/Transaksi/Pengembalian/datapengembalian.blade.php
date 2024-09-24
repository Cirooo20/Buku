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
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Pinjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Kembali</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Denda</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-600 divide-y divide-gray-500">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">PGM001</td>
                        <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                        <td class="px-6 py-4 whitespace-nowrap">Bumi Manusia</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-05-25</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-06-05</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp 10.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">PGM003</td>
                        <td class="px-6 py-4 whitespace-nowrap">Alice Johnson</td>
                        <td class="px-6 py-4 whitespace-nowrap">Pulang</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-06-03</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-06-10</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp 0</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">PGM004</td>
                        <td class="px-6 py-4 whitespace-nowrap">Bob Williams</td>
                        <td class="px-6 py-4 whitespace-nowrap">Filosofi Teras</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-05-28</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-06-07</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp 5.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">PGM005</td>
                        <td class="px-6 py-4 whitespace-nowrap">Emma Davis</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rentang Kisah</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-06-02</td>
                        <td class="px-6 py-4 whitespace-nowrap">2023-06-09</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp 0</td>
                    </tr>
                </tbody>
            </table>
        <div class="mt-4 flex justify-center">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-gray-700 text-sm font-medium text-gray-400 hover:bg-gray-600">
                    <span class="sr-only">Sebelumnya</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-gray-700 text-sm font-medium text-gray-400">
                    Halaman 1 dari 10
                </span>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-gray-700 text-sm font-medium text-gray-400 hover:bg-gray-600">
                    <span class="sr-only">Selanjutnya</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
        </div>
    </div>
</div>
@endsection