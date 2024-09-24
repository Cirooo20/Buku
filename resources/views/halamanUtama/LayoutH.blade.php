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
    @vite('resources/css/app.css')

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #index {
            transition: transform 10s ease-in-out;
        }

        #index {
            transition: transform 10s ease-in-out;
        }
    </style>

</head>

<body class="bg-gray-900 text-white">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <a href="/" class="text-white text-2xl font-bold mb-4 md:mb-0">PerpustakaanDigital</a>
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                <form action="/search" method="GET" class="relative w-full md:w-auto mt-4 md:mt-0">
                    <input type="text" name="query" placeholder="Cari buku..."
                        class="w-full md:w-auto bg-gray-700 text-white rounded-full py-2 px-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                        <i class="fas fa-search text-gray-400"></i>
                    </button>
                </form>
                <a href="/admin/login" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <main class="main bg-gray-900" id="main">
            @yield('konten')
    </main>
</body>

</html>
