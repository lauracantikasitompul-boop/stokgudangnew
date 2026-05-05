<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - UNGS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Custom colors from image */
        .bg-sidebar { background-color: #839581; }
        .bg-active-menu { background-color: #e2e2e2; }
        .bg-card { background-color: #bad0b6; }
        .text-dark { color: #1a1a1a; }
        .border-line { border-color: #a0a0a0; }
    </style>
</head>
<body class="bg-white flex h-screen overflow-hidden font-sans text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-sidebar flex flex-col justify-between text-black flex-shrink-0">
        <div>
            <!-- Logo Section -->
            <div class="h-32 flex flex-col items-center justify-center border-b border-white/30 pt-4">
                <div class="w-16 h-16 bg-[#d9d9d9] rounded-full flex items-center justify-center mb-2">
                    <i data-lucide="building-2" class="w-8 h-8 text-black"></i>
                </div>
                <h1 class="text-xl font-semibold">UNGS</h1>
            </div>

            <!-- Navigation -->
            <nav class="mt-4 flex flex-col gap-1">
                <a href="/manajer/dashboard" class="px-6 py-3 {{ request()->is('manajer/dashboard') ? 'bg-active-menu font-medium' : 'hover:bg-black/10' }}">
                    Dashboard
                </a>
                <a href="/manajer/laporan" class="px-6 py-3 {{ request()->is('manajer/laporan') ? 'bg-active-menu font-medium' : 'hover:bg-black/10' }}">
                    Laporan stok
                </a>
            </nav>
        </div>

        <!-- User Profile Bottom -->
        <div class="bg-active-menu p-4 flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center border border-gray-400">
                <i data-lucide="user" class="w-6 h-6 text-black"></i>
            </div>
            <span class="font-medium text-lg">Manajer</span>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <!-- Topbar -->
        <header class="h-20 flex items-center justify-between px-8 pt-4">
            <h2 class="text-3xl font-medium text-black">@yield('page_title')</h2>
            
            <div class="flex items-center gap-4 border-b border-black pb-2 flex-grow ml-4 justify-end">
                <div class="flex flex-col items-end group relative cursor-pointer">
                    <i data-lucide="user" class="w-7 h-7 text-black"></i>
                    
                    <!-- Dropdown mock (visible in image as a small popover) -->
                    <div class="absolute top-8 right-[-10px] bg-[#e2e2e2] border border-gray-300 text-xs p-1 shadow-sm flex flex-col gap-1 w-20 invisible group-hover:visible z-50">
                        <a href="/manajer/profil" class="flex items-center gap-1 hover:bg-gray-300 px-1 py-0.5 cursor-pointer text-black">
                            <i data-lucide="user" class="w-3 h-3"></i> profil
                        </a>
                        <div onclick="document.getElementById('logout-modal').classList.remove('hidden')" class="flex items-center gap-1 hover:bg-gray-300 px-1 py-0.5 cursor-pointer text-black">
                            <i data-lucide="log-out" class="w-3 h-3"></i> logout
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Logout Confirmation Modal -->
        <div id="logout-modal" class="hidden absolute top-20 right-8 bg-[#a8ba9e] p-4 rounded shadow-lg z-50 border border-gray-400">
            <p class="text-black text-sm mb-3">Apakah Anda yakin ingin logout?</p>
            <div class="flex gap-2 justify-center">
                <a href="/" class="bg-[#9bd485] hover:bg-[#8bc475] text-black px-4 py-1 rounded text-xs font-medium text-center inline-block">Logout</a>
                <button onclick="document.getElementById('logout-modal').classList.add('hidden')" class="bg-white hover:bg-gray-100 text-black px-4 py-1 rounded text-xs font-medium">Batal</button>
            </div>
        </div>

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white px-8 py-6">
            @yield('content')
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
