@extends('layouts.user.user')
@vite('resources/css/app.css')

@section('title', 'Beranda')

@section('content')



    <nav class="bg-white shadow-md py-4 px-4 md:px-8 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('img/image.png') }}" alt="Logo DKM" class="h-12 mr-3 rounded-full shadow-md">
            <span class="text-xl font-bold text-gray-800">DKM</span>
        </div>
        <div class="hidden md:flex space-x-6 text-gray-700 font-semibold">
            <a href="#" class="hover:text-green-600">Beranda</a>
            <a href="#" class="hover:text-green-600">Tentang Kami</a>
            <a href="#" class="hover:text-green-600">Program</a>
            <a href="#" class="hover:text-green-600">Infaq Masjid</a>
            <a href="#" class="hover:text-green-600">Events Masjid</a>
            <a href="#" class="hover:text-green-600">Berita Masjid</a>
            <a href="#" class="hover:text-green-600">Kontak</a>
        </div>
        <button class="md:hidden text-gray-700 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </nav>

    <section class="relative h-screen bg-cover bg-center flex items-center justify-center text-white"
             style="background-image: url('{{ asset('img/image.png') }}');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-wide drop-shadow-lg">ASSALAMUALAIKUM...</h1>
            <p class="text-lg md:text-xl mb-12 leading-relaxed drop-shadow-md">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus labore recusandae minima nulla odit, soluta animi tempora deleniti reprehenderit facere. In, fugiat modi!
            </p>

            <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-6">
                <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 rounded-full shadow-lg transition-colors duration-300 text-lg">INFO SELENGKAPNYA</a>
                <a href="#" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-colors duration-300 text-lg">INFAQ KE MASJID</a>
            </div>

            <p class="text-sm mt-16 drop-shadow-md">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde repellat magnam nobis natus alias dolores molestias perferendis. Alias nisi dolor sapiente! Quasi commodi inventore exercitationem sint eius magnam repellat. Magni quam aliquid iusto unde!
            </p>
        </div>
    </section>

    <div  class="bg-green-800 text-white py-2 px-4 md:px-8 flex justify-between items-center text-sm">

        <div class="flex items-center space-x-4">
            <a href="#" class="hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-gray-300"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-gray-300"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-full text-xs font-semibold">INFAQ MASJID</a>
            <span class="flex items-center">
                <i class="fas fa-phone mr-1"></i> (08111111111)
            </span>
        </div>
    </div>

    <x-hero-info />
    <x-about />
    <x-gallery-slide />
    <x-donasi />
    <x-lokasi />
    <x-jadwal-azan/>
    <x-footer-dashboard />
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/e686fa0059.js" crossorigin="anonymous"></script>
@endsection
