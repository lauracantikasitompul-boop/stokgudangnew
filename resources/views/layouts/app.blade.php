<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Gudang</title>
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-600 p-4 text-white flex gap-4">
        <a href="/" class="font-bold">Home</a>
        <a href="/product">Produk</a>
        <a href="/contact">Contact</a>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>