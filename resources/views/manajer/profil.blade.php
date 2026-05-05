@extends('layouts.manajer')

@section('title', 'Profil')
@section('page_title', 'Profil')

@section('content')
<div class="flex flex-col items-center max-w-4xl mx-auto w-full mt-4">
    <!-- Profile Header -->
    <div class="flex flex-col items-center mb-8">
        <i data-lucide="user" class="w-24 h-24 text-black"></i>
        <h2 class="text-4xl font-medium mt-2">Manajer</h2>
    </div>

    <!-- Profile Details Box -->
    <div class="bg-sidebar w-full p-8 pb-12 rounded-md flex flex-col gap-4">
        
        <div class="bg-[#e2e2e2] rounded py-3 px-6 w-full text-lg font-bold text-black flex">
            <span class="w-24">Nama:</span> <span class="font-bold">Jesika anggelina</span>
        </div>
        
        <div class="bg-[#e2e2e2] rounded py-3 px-6 w-full text-lg font-bold text-black flex">
            <span class="w-24">Gmail:</span> <span class="font-bold">anggelina123456@mail.com</span>
        </div>
        
        <div class="bg-[#e2e2e2] rounded py-3 px-6 w-full text-lg font-bold text-black flex">
            <span class="w-24">NO.HP:</span> <span class="font-bold">081234567810</span>
        </div>
        
        <div class="bg-[#e2e2e2] rounded py-3 px-6 w-full text-lg font-bold text-black flex">
            <span class="w-24">Alamat:</span> <span class="font-bold">Tembesi,batu aji</span>
        </div>
        
        <div class="bg-[#e2e2e2] rounded py-3 px-6 w-full text-lg font-bold text-black flex">
            <span class="w-24">Role:</span> <span class="font-bold">Manajer</span>
        </div>
        
    </div>
</div>
@endsection
