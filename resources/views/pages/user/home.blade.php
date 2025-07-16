@extends('layouts.user.user')
@vite('resources/css/app.css')

@section('title', 'Beranda')

@section('content')




<x-home.hero />
    {{-- <div  class="bg-green-800 text-white py-2 px-4 md:px-8 flex justify-between items-center text-sm">

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
    </div> --}}

    <x-home.hero-info />
    <x-home.about />
    {{-- <x-home.gallery-slide /> --}}
    {{-- <x-home.donasi /> --}}
    <x-lokasi />
    <x-home.jadwal-azan/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/e686fa0059.js" crossorigin="anonymous"></script>
@endsection
