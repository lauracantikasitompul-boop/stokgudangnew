@extends('layouts.manajer')

@section('title', 'Laporan Stok')
@section('page_title', 'Cetak laporan')

@section('content')
<div class="flex flex-col gap-6">
    <!-- Action Bar -->
    <div class="bg-[#e2e2e2] rounded py-3 px-6 flex justify-between items-center w-full">
        <!-- Filter Periode -->
        <form action="" method="GET" class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <label for="start_date" class="text-sm font-medium text-black">Mulai:</label>
                <input type="date" id="start_date" name="start_date" class="border border-gray-400 rounded px-2 py-1 text-sm bg-white text-black outline-none focus:border-sidebar">
            </div>
            <div class="flex items-center gap-2">
                <label for="end_date" class="text-sm font-medium text-black">Sampai:</label>
                <input type="date" id="end_date" name="end_date" class="border border-gray-400 rounded px-2 py-1 text-sm bg-white text-black outline-none focus:border-sidebar">
            </div>
            <button type="submit" class="bg-sidebar hover:bg-opacity-90 text-black font-medium py-1 px-4 rounded shadow-sm text-sm">
                OKE
            </button>
        </form>

        <!-- Tombol Cetak -->
        <button onclick="window.print()" class="bg-[#9bd485] hover:bg-[#8bc475] text-black font-medium py-1.5 px-8 rounded shadow-sm flex items-center gap-2">
            <i data-lucide="printer" class="w-4 h-4"></i> Cetak
        </button>
    </div>

    <!-- Table -->
    <div class="w-full bg-[#e2e2e2] rounded overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-sidebar text-black border-b border-gray-400 font-bold">
                <tr>
                    <th class="px-4 py-3 w-12 text-center">No</th>
                    <th class="px-4 py-3">Nama Barang</th>
                    <th class="px-4 py-3">Supplier</th>
                    <th class="px-4 py-3">kategori</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-400 bg-[#e2e2e2] text-black">
                <!-- Row 1 -->
                <tr>
                    <td class="px-4 py-3 text-center">1</td>
                    <td class="px-4 py-3">Televisi</td>
                    <td class="px-4 py-3">PT.maju terus</td>
                    <td class="px-4 py-3">Elektronik</td>
                    <td class="px-4 py-3">0</td>
                    <td class="px-4 py-3 text-center">
                        <span class="bg-[#c93232] text-white px-3 py-1 rounded text-xs font-semibold shadow-sm inline-block min-w-[70px]">Habis</span>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr>
                    <td class="px-4 py-3 text-center">2</td>
                    <td class="px-4 py-3">Router WiFi</td>
                    <td class="px-4 py-3">PT.ungger</td>
                    <td class="px-4 py-3">Jaringan</td>
                    <td class="px-4 py-3">10</td>
                    <td class="px-4 py-3 text-center">
                        <span class="bg-[#e59530] text-white px-3 py-1 rounded text-xs font-semibold shadow-sm inline-block min-w-[70px]">Menipis</span>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr>
                    <td class="px-4 py-3 text-center">3</td>
                    <td class="px-4 py-3">Printer Canon</td>
                    <td class="px-4 py-3">PT.jaya</td>
                    <td class="px-4 py-3">Elektronik</td>
                    <td class="px-4 py-3">09</td>
                    <td class="px-4 py-3 text-center">
                        <span class="bg-[#e59530] text-white px-3 py-1 rounded text-xs font-semibold shadow-sm inline-block min-w-[70px]">Menipis</span>
                    </td>
                </tr>
                <!-- Row 4 -->
                <tr>
                    <td class="px-4 py-3 text-center">4</td>
                    <td class="px-4 py-3">Kabel LAN</td>
                    <td class="px-4 py-3">PT.abadi</td>
                    <td class="px-4 py-3">Aksesoris Komputer</td>
                    <td class="px-4 py-3">30</td>
                    <td class="px-4 py-3 text-center">
                        <span class="bg-[#7ce054] text-black px-3 py-1 rounded text-xs font-semibold shadow-sm inline-block min-w-[70px]">Aman</span>
                    </td>
                </tr>
                <!-- Empty Rows to match design -->
                <tr class="h-10"><td colspan="6"></td></tr>
                <tr class="h-10"><td colspan="6"></td></tr>
                <tr class="h-10"><td colspan="6"></td></tr>
                <tr class="h-10"><td colspan="6"></td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
