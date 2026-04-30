@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">📞 Contact</h1>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-6">

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-2">Nama</label>
                <input type="text" name="nama"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2">Email</label>
                <input type="email" name="email"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2">Pesan</label>
                <textarea rows="4" name="pesan"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                Kirim
            </button>
        </form>

        <hr class="my-6">

        <div>
            <h2 class="font-semibold text-lg">📍 Data Kontak</h2>

            @forelse($contacts as $contact)
                <div class="border-b py-2">
                    <p><strong>Nama:</strong> {{ $contact->nama }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Pesan:</strong> {{ $contact->pesan }}</p>
                </div>
            @empty
                <p>Belum ada kontak masuk.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection