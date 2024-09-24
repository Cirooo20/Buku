<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite('resources/css/app.css')

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .active-menu {
            background-color: #4a5568;
        }

        .active-submenu {
            color: #4299e1;
            background-color: #2d3748;
        }
    </style>

</head>

<body class="bg-gray-900 text-white flex flex-col ">

    <nav class="bg-gray-800 p-4 w-full fixed top-0 z-10 flex justify-between items-center">
        <div class="flex items-center">
            <button id="sidebarToggle" class="text-white mr-5">
                <i class="bi bi-list text-2xl"></i>
            </button>
            <h1 class="text-white text-2xl font-bold">PerpustakaanDigital</h1>
        </div>
        <div class="flex items-center space-x-4">
            <a href="/" class="text-white hover:text-gray-300 bg-red-600 px-4 py-2 rounded">
                Logout
            </a>
        </div>
    </nav>

    <div class="flex flex-1 mt-16">
        <aside id="sidebar"
            class="bg-gray-800 text-white w-64 min-h-screen p-4 fixed left-0 top-16 bottom-0 overflow-y-auto transition-transform duration-300 ease-in-out transform flex flex-col">
            <ul class="space-y-4 flex-grow">
                <li>
                    <a href="/dashboard"
                        class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('dashboard') ? 'active-menu' : '' }}">
                        <i class="bi bi-speedometer2 text-xl"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-700 {{ request()->is('databuku*') || request()->is('datasiswa*') ? 'active-menu' : '' }}"
                        onclick="toggleDropdown('masterDataDropdown')">
                        <div class="flex items-center space-x-2">
                            <i class="bi bi-database text-xl"></i>
                            <span>Master Data</span>
                        </div>
                        <i class="bi bi-caret-down-fill transition-transform duration-300" id="masterDataIcon"></i>
                    </a>
                    <ul id="masterDataDropdown"
                        class="pl-4 mt-2 space-y-2 transition-all duration-300 ease-in-out {{ request()->is('databuku*') || request()->is('datasiswa*') ? '' : 'hidden' }}">
                        <li>
                            <a href="/datasiswa"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('datasiswa*') ? 'active-submenu' : '' }}">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span>Data Siswa</span>
                            </a>
                        </li>
                        <li>
                            <a href="/databuku"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('databuku*') ? 'active-submenu' : '' }}">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span>Data Buku</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-700 {{ request()->is('peminjaman*') || request()->is('pengembalian*') ? 'active-menu' : '' }}"
                        onclick="toggleDropdown('transaksiDropdown')">
                        <div class="flex items-center space-x-2">
                            <i class="bi bi-arrow-left-right text-xl"></i>
                            <span>Transaksi</span>
                        </div>
                        <i class="bi bi-caret-down-fill transition-transform duration-300" id="transaksiIcon"></i>
                    </a>
                    <ul id="transaksiDropdown"
                        class="pl-4 mt-2 space-y-2 transition-all duration-300 ease-in-out {{ request()->is('peminjaman*') || request()->is('pengembalian*') ? '' : 'hidden' }}">
                        <li>
                            <a href="/peminjaman"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('peminjaman*') ? 'active-submenu' : '' }}">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span>Data Peminjaman</span>
                            </a>
                        </li>
                        <li>
                            <a href="/pengembalian"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('pengembalian*') ? 'active-submenu' : '' }}">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span>Data Pengembalian</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-700 {{ request()->is('laporanPeminjaman*') || request()->is('laporanPengembalian*') || request()->is('laporanTerfavorit*') ? 'active-menu' : '' }}"
                        onclick="toggleDropdown('laporanDropdown')">
                        <div class="flex items-center space-x-2">
                            <i class="bi bi-bar-chart text-xl"></i>
                            <span>Laporan</span>
                        </div>
                        <i class="bi bi-caret-down-fill transition-transform duration-300" id="laporanIcon"></i>
                    </a>
                    <ul id="laporanDropdown"
                        class="pl-4 mt-2 space-y-2 transition-all duration-300 ease-in-out {{ request()->is('laporanPeminjaman*') || request()->is('laporanPengembalian*') || request()->is('laporanTerfavorit*') ? '' : 'hidden' }}">
                        <li>
                            <a href="/laporanPeminjaman"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('laporanPeminjaman*') ? 'active-submenu' : '' }}">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span>LaporanPeminjaman/Hari</span>
                            </a>
                        </li>
                        <li>
                            <a href="/laporanPengembalian"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('laporanPengembalian*') ? 'active-submenu' : '' }}">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span>Buku Belum Kembali</span>
                            </a>
                        </li>
                        <li>
                            <a href="/laporanTerfavorit"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 {{ request()->is('laporanTerfavorit*') ? 'active-submenu' : '' }}">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span>Buku Terfavorit</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>

        <main id="main-content" class="flex-1 ml-64 p-8 transition-all duration-300 ease-in-out">
            <div class="konten">
                @yield('konten')
            </div>
        </main>
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const icon = document.getElementById(id + 'Icon');
            dropdown.classList.toggle('hidden');
            if (dropdown.classList.contains('hidden')) {
                dropdown.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
            } else {
                dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        }

        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('-translate-x-full');
            mainContent.classList.toggle('ml-0');
            mainContent.classList.toggle('ml-64');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const activeDropdowns = document.querySelectorAll('ul:not(.hidden)');
            activeDropdowns.forEach(function(dropdown) {
                dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                const icon = dropdown.previousElementSibling.querySelector('.bi-caret-down-fill');
                if (icon) {
                    icon.style.transform = 'rotate(180deg)';
                }
            });

            const laporanDropdown = document.getElementById('laporanDropdown');
            const laporanIcon = document.getElementById('laporanIcon');
            if (laporanDropdown && !laporanDropdown.classList.contains('hidden')) {
                laporanDropdown.style.maxHeight = laporanDropdown.scrollHeight + 'px';
                if (laporanIcon) {
                    laporanIcon.style.transform = 'rotate(180deg)';
                }
            }
        });
    </script>
    <script src="/js/axios.min.js"></script>
    <script src="/js/Api.js"></script>
</body>
</html>
