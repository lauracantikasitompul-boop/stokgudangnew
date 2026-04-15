@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">📞 Contact</h1>

    <div class="bg-white shadow-lg rounded-lg p-6">

        <form>
            @csrf

            <div class="mb-4">
                <label class="block mb-2">Nama</label>
                <input type="text"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block mb-2">Email</label>
                <input type="email"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block mb-2">Pesan</label>
                <textarea rows="4"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                Kirim
            </button>

        </form>

        <hr class="my-6">

        <div>
            <h2 class="font-semibold text-lg">📍 Info Kontak</h2>
            <p>Email: emailkamu@gmail.com</p>
            <p>Telp: 08xxxxxxxxxx</p>
            <p>Alamat: Indonesia</p>
        </div>

    </div>
</div>
@endsection