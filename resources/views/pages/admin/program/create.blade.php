{{-- resources/views/pages/admin/program/create.blade.php --}}
@extends('layouts.admin.app')

@section('title', 'Tambah Program')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h1 class="text-xl font-bold mb-4 text-gray-800">Tambah Program</h1>

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

        <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="desc" rows="3" required class="w-full px-4 py-2 border rounded-lg">{{ old('desc') }}</textarea>
        </div>

        <div x-data="{ icon: '{{ old('icon', 'fa-building') }}' }">
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Icon (Font Awesome)</label>
            <div class="flex items-center gap-3">
                <select name="icon" x-model="icon" class="w-full px-4 py-2 border rounded-lg">
                    <option value="fa-building">Gedung </option>
                    <option value="fa-mosque">Masjid </option>
                    <option value="fa-hands-helping">Jabat Tangan</option>
                    <option value="fa-coins">Zakat </option>
                    <option value="fa-heart">Hati</option>
                    <option value="fa-quran">Qur'an</option>
                    <option value="fa-book">Buku</option>
                    <option value="fa-money">Uang</option>
                    <option value="fa-hand-holding">Memegang Hati</option>
                    <option value="fa-users">Users</option>
                </select>
                <div class="w-10 h-10 flex items-center justify-center border rounded text-xl bg-gray-100">
                    <i :class="`fas ${icon}`"></i>
                </div>
            </div>
        </div>

        <div class="pt-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Simpan</button>
            <a href="{{ route('admin.program.index') }}" class="ml-2 text-sm text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
