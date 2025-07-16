{{-- resources/views/pages/admin/program/create.blade.php --}}
@extends('layouts.admin.app')

@section('title', 'Tambah Program')

@section('content')
@php
    $icons = [
        'fa-building' => 'Gedung',
        'fa-mosque' => 'Masjid',
        'fa-hands-helping' => 'Jabat Tangan',
        'fa-coins' => 'Zakat',
        'fa-heart' => 'Hati',
        'fa-quran' => 'Qur\'an',
        'fa-book' => 'Buku',
        'fa-money-bill' => 'Uang',
        'fa-hand-holding' => 'Tangan Memberi',
        'fa-users' => 'Users',
    ];

    $colors = [
        'bg-red-500' => 'Merah',
        'bg-green-500' => 'Hijau',
        'bg-blue-500' => 'Biru',
        'bg-yellow-500' => 'Kuning',
        'bg-purple-500' => 'Ungu',
        'bg-pink-500' => 'Pink',
        'bg-indigo-500' => 'Indigo',
        'bg-gray-500' => 'Abu-abu',
    ];
@endphp

<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h1 class="text-xl font-bold mb-4 text-gray-800">Tambah Program</h1>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 rounded text-red-700 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.program.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Judul --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2 border rounded-lg">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="desc" rows="3" required class="w-full px-4 py-2 border rounded-lg">{{ old('desc') }}</textarea>
        </div>

        {{-- Ikon & Warna --}}
        <div x-data="{
            icon: '{{ old('icon', 'fa-building') }}',
            color: '{{ old('color', 'bg-green-500') }}'
        }" class="space-y-4">

            {{-- Ikon --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Ikon</label>
                <div class="flex items-center gap-3">
                    <select name="icon" x-model="icon" class="w-full px-4 py-2 border rounded-lg">
                        @foreach ($icons as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <div class="w-10 h-10 flex items-center justify-center border rounded text-xl bg-gray-100">
                        <i :class="`fas ${icon}`"></i>
                    </div>
                </div>
            </div>

            {{-- Warna --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Warna</label>
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($colors as $value => $label)
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="color" value="{{ $value }}" x-model="color" class="form-radio text-green-600">
                            <div class="flex items-center gap-2">
                                <span :class="'w-4 h-4 rounded-full {{ $value }}'"></span>
                                <span class="text-sm text-gray-600">{{ $label }}</span>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Preview --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Preview</label>
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-white text-xl" :class="color">
                    <i :class="`fas ${icon}`"></i>
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="pt-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Simpan</button>
            <a href="{{ route('admin.program.index') }}" class="ml-2 text-sm text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
