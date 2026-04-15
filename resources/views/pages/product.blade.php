@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">📦 Data Produk</h1>

    <!-- Button Modal -->
    <button data-modal-target="productModal" data-modal-toggle="productModal"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Tambah Produk
    </button>

    <!-- Table -->
    <div class="mt-6 overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Stok</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <tr class="border-b">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Mouse</td>
                    <td class="px-6 py-4">Aksesoris</td>
                    <td class="px-6 py-4">50</td>
                    <td class="px-6 py-4">
                        <button class="text-blue-500">Edit</button> |
                        <button class="text-red-500">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal -->
<div id="productModal" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 left-0 right-0 z-50 justify-center items-center w-full h-full bg-black/50">

    <div class="bg-white rounded-lg shadow w-full max-w-md p-6">
        <h2 class="text-xl font-semibold mb-4">Tambah Produk</h2>

        <form>
            <div class="mb-3">
                <label class="block mb-1">Nama Barang</label>
                <input type="text" class="w-full border rounded p-2">
            </div>

            <div class="mb-3">
                <label class="block mb-1">Kategori</label>
                <input type="text" class="w-full border rounded p-2">
            </div>

            <div class="mb-3">
                <label class="block mb-1">Stok</label>
                <input type="number" class="w-full border rounded p-2">
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" data-modal-hide="productModal"
                    class="bg-gray-400 text-white px-3 py-2 rounded">
                    Batal
                </button>
                <button class="bg-blue-600 text-white px-3 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection