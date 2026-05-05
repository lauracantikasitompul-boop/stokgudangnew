@extends('layouts.manajer')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Card 1: Total Barang -->
    <div class="bg-card rounded-lg p-4 shadow-sm h-32 flex flex-col justify-between">
        <div class="flex items-start gap-2">
            <i data-lucide="boxes" class="w-6 h-6 text-black"></i>
            <span class="font-bold text-black text-lg">Total Barang</span>
        </div>
        <div class="text-right">
            <span class="font-bold text-4xl text-black">150</span>
        </div>
    </div>

    <!-- Card 2: Barang Masuk -->
    <div class="bg-card rounded-lg p-4 shadow-sm h-32 flex flex-col justify-between">
        <div class="flex items-start gap-2">
            <div class="bg-black text-card rounded-sm p-0.5">
                <i data-lucide="arrow-down" class="w-5 h-5 text-white"></i>
            </div>
            <span class="font-bold text-black text-lg">Barang Masuk</span>
        </div>
        <div class="text-right">
            <span class="font-bold text-4xl text-black">32</span>
        </div>
    </div>

    <!-- Card 3: Barang keluar -->
    <div class="bg-card rounded-lg p-4 shadow-sm h-32 flex flex-col justify-between">
        <div class="flex items-start gap-2">
            <div class="border-2 border-black rounded-sm p-0.5">
                <i data-lucide="arrow-up" class="w-4 h-4 text-black"></i>
            </div>
            <span class="font-bold text-black text-lg">Barang keluar</span>
        </div>
        <div class="text-right">
            <span class="font-bold text-4xl text-black">20</span>
        </div>
    </div>

    <!-- Card 4: Total transaksi -->
    <div class="bg-card rounded-lg p-4 shadow-sm h-32 flex flex-col justify-between">
        <div class="flex items-start gap-2">
            <i data-lucide="refresh-cw" class="w-6 h-6 text-black"></i>
            <span class="font-bold text-black text-lg leading-tight">Total transaksi</span>
        </div>
        <div class="text-right">
            <span class="font-bold text-4xl text-black">20</span>
        </div>
    </div>

    <!-- Card 5: Stok menipis -->
    <div class="bg-card rounded-lg p-4 shadow-sm h-32 flex flex-col justify-between lg:col-span-1">
        <div class="flex items-start gap-2">
            <i data-lucide="circle-alert" class="w-6 h-6 text-black"></i>
            <span class="font-bold text-black text-lg">Stok menipis</span>
        </div>
        <div class="text-right">
            <span class="font-bold text-4xl text-black">3</span>
        </div>
    </div>
</div>
@endsection
