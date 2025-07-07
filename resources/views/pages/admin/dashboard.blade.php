@extends('layouts.admin.app')

@section('title', 'Dashboard Admin')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-green-600 py-20 px-6 text-white overflow-hidden rounded-xl shadow mb-10">
    <!-- Background blur effects -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-700 rounded-full blur-[100px] opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-500 rounded-full blur-[100px] opacity-20"></div>

    <div class="relative z-10 text-center max-w-2xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}</h1>
        <p class="text-lg opacity-90 mb-6">
            Semoga hari ini penuh berkah dan kemudahan.
            Ayo kelola informasi masjid dengan semangat! 🌙
        </p>
        <a href="{{ route('admin.profil.index') }}"
           class="inline-block px-6 py-3 bg-white text-green-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
            <i class="fas fa-user-cog mr-2"></i> Kelola Profil Masjid
        </a>
    </div>
</section>

{{-- Quick Stats Section --}}
<section class="py-8">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Infaq Total Card -->
        <div class="bg-green-50 border border-green-100 rounded-xl p-6 shadow text-center">
            <i class="fas fa-hand-holding-heart text-3xl text-green-600 mb-3"></i>
            <h3 class="text-xl font-bold text-gray-700">Total Infaq</h3>
            <p class="text-lg text-green-700 mt-1">Rp 12.000.000</p>
        </div>

        <!-- Jumlah Pengurus -->
        <div class="bg-green-50 border border-green-100 rounded-xl p-6 shadow text-center">
            <i class="fas fa-users text-3xl text-green-600 mb-3"></i>
            <h3 class="text-xl font-bold text-gray-700">Jumlah Pengurus</h3>
            <p class="text-lg text-green-700 mt-1">8 Orang</p>
        </div>

        <!-- Laporan Masuk -->
        <div class="bg-green-50 border border-green-100 rounded-xl p-6 shadow text-center">
            <i class="fas fa-file-alt text-3xl text-green-600 mb-3"></i>
            <h3 class="text-xl font-bold text-gray-700">Laporan</h3>
            <p class="text-lg text-green-700 mt-1">2 Laporan Masuk</p>
        </div>
    </div>
</section>

{{-- Extra Tips Section (Optional) --}}
<section class="py-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow border border-gray-100 text-center">
        <p class="text-gray-600 italic">
            “Sesungguhnya yang memakmurkan masjid-masjid Allah ialah orang-orang yang beriman kepada Allah dan hari kemudian.”
            <br><span class="text-sm text-green-700 font-semibold">(QS. At-Taubah: 18)</span>
        </p>
    </div>
</section>

@endsection
