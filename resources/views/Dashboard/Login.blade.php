<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="container mx-auto flex items-center justify-center p-4">
        <div class="bg-gray-800 rounded-lg shadow-lg flex w-full max-h-[100vh] overflow-hidden">

            <div class="w-1/2 p-16 flex flex-col justify-center items-center">
                <h2 class="text-5xl font-bold text-white mb-12 text-center">Login</h2>
                <form action="" method="POST" class="space-y-8 w-full max-w-md">
                    @csrf
                    <div>
                        <label for="email" class="block text-gray-300 text-lg mb-4">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 bg-gray-700 text-white text-base rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
                        @error('email')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-gray-300 text-lg mb-4">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 bg-gray-700 text-white text-base rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
                        @error('password')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white text-lg py-2 rounded-lg hover:bg-blue-700 transition duration-300 mt-12">Login</button>
                </form>
            </div>
            
            <div class="w-1/2">
                <img src="/images/1726619798.jpg" alt="Perpustakaan" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</body>
</html>
