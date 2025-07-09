@extends('layouts.user.user')

@section('content')
    <section class="py-12 px-4 md:px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Left Column: Main Blog Content --}}
            <div class="md:col-span-2 bg-white rounded-lg shadow-lg p-6 lg:p-8">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-800 mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
                {{-- Image container: Adjusted to ensure the entire image is visible, as per request --}}
                <div class="mb-8 overflow-hidden rounded-md shadow-md flex justify-center items-center bg-gray-100">
                    {{-- max-w-full and h-auto ensure aspect ratio is maintained and image fits within bounds. object-contain will show the whole image. --}}
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                        class="max-w-full h-auto object-contain">
                </div>
                <div class="prose max-w-none text-gray-700 leading-relaxed text-base lg:text-lg mb-10">
                    @php
                        $contentParagraphs = explode("\n", str_replace(["\r\n", "\r"], "\n", $post->body ?? ''));
                    @endphp

                    @foreach ($contentParagraphs as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p>{{ $paragraph }}</p>
                        @endif
                    @endforeach
                </div>
                <div class="text-left">
                    <a href="{{ route('blog') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-300 ease-in-out">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Blog
                    </a>
                </div>
            </div>

            <div class="md:col-span-1 max-h-screen overflow-y-auto"> {{-- Added max-h-screen and overflow-y-auto --}}
                <h2 class="text-xl font-bold text-gray-800 mb-3 px-2 md:px-0">Artikel Pilihan</h2> {{-- Reduced font size and margin --}}
                <div class="space-y-4"> {{-- Reduced spacing between cards --}}
                    @forelse($recommendedPosts as $recPost)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-green-200">
                            {{-- Using rounded-lg for slightly less rounding --}}
                            <div class="h-32 overflow-hidden flex items-center justify-center bg-gray-100 rounded-t-lg">
                                {{-- Reduced height --}}
                                <img src="{{ asset('storage/' . $recPost->thumbnail) }}" alt="{{ $recPost->title }}"
                                    class="w-full h-full object-contain object-center">
                            </div>
                            <div class="p-3"> {{-- Reduced padding --}}
                                @if (isset($recPost->category_name))
                                    <span
                                        class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded-full mb-1">
                                        {{-- Reduced padding and margin --}}
                                        {{ $recPost->category_name }}
                                    </span>
                                @else
                                    <span
                                        class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded-full mb-1">
                                        {{-- Reduced padding and margin --}}
                                        Informasi
                                    </span>
                                @endif
                                <h3 class="text-sm font-semibold text-gray-800 mb-1 line-clamp-2"> {{-- Reduced font size and margin --}}
                                    {{ $recPost->title }}
                                </h3>
                                <p class="text-xs text-gray-600 mb-2 line-clamp-2"> {{-- Reduced font size and margin --}}
                                    {{ Str::limit(strip_tags($recPost->body), 50) }} {{-- Shortened character limit --}}
                                </p>
                                <a href="{{ route('blog.detail', $recPost->slug) }}"
                                    class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-600 rounded-md hover:bg-green-50 transition duration-150 ease-in-out group text-xs">
                                    {{-- Reduced padding and font size --}}
                                    Baca Selengkapnya
                                    <svg class="w-3 h-3 ml-1 mt-px transition-transform duration-200 group-hover:translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600 text-center text-sm">Belum ada artikel rekomendasi lainnya.</p>
                        {{-- Reduced font size --}}
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
