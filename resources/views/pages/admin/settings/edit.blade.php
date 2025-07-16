@extends('layouts.admin.app')
@section('title', 'Pengaturan Profil')

@section('content')
    @if (session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700 border border-red-200">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-2xl bg-white shadow rounded-lg p-6 mx-auto">
        @csrf
        @method('PATCH')

        <h1 class="text-2xl font-bold text-gray-800 mb-4">Pengaturan Profil</h1>

        {{-- Foto Profil --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
            <div class="flex items-center gap-4">
                <img
                    src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                    alt="Foto Profil"
                    class="w-16 h-16 rounded-full border border-gray-300 object-cover">

                <label class="cursor-pointer inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 text-sm rounded-md text-gray-800">
                    Pilih Foto
                    <input type="file" name="photo" accept="image/*" class="hidden">
                </label>
            </div>
        </div>

        {{-- Nama --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                   required
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none text-gray-800">
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   required
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none text-gray-800">
        </div>

        {{-- Password --}}
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
                <input type="password" name="password"
                       placeholder="Kosongkan jika tidak ingin ganti"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none text-gray-800">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation"
                       placeholder="Ulangi kata sandi baru"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none text-gray-800">
            </div>
        </div>

        {{-- Tombol --}}
        <div class="pt-4">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow-sm transition-all duration-200">
                Simpan Perubahan
            </button>
        </div>
    </form>
@endsection
