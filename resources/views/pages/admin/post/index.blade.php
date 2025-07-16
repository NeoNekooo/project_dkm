@extends('layouts.admin.app')

@section('title', 'Daftar Postingan Blog')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Postingan Blog</h1>
        <a href="{{ route('admin.post.create') }}"
           class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all whitespace-nowrap">
            <i class="fas fa-plus mr-2"></i> Tambah Postingan
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($posts->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <p class="text-gray-500">Belum ada postingan.</p>
            <a href="{{ route('admin.post.create') }}" class="mt-4 inline-block text-green-600 hover:text-green-700 font-medium">
                Buat postingan pertama Anda
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    @if($post->thumbnail)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-800 line-clamp-2">{{ $post->title }}</h3>
                        </div>

                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->translatedFormat('d M Y') : 'Belum dipublikasi' }}</span>
                        </div>

                        <div class="flex items-center text-sm mb-4">
                            @if($post->is_published)
                                <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 text-xs rounded">
                                    <i class="fas fa-check-circle mr-1"></i> Dipublikasi
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded">
                                    <i class="fas fa-clock mr-1"></i> Draft
                                </span>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-100">
                            <a href="{{ route('admin.post.edit', $post->id) }}"
                               class="flex-1 min-w-[50px] text-center bg-blue-50 hover:bg-blue-100 text-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-pen mr-1"></i> Edit
                            </a>

                            {{-- Toggle Publish --}}
                            <form action="{{ route('admin.post.togglePublish', $post->id) }}" method="POST" class="flex-1 min-w-[50px]">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="w-full text-center {{ $post->is_published ? 'bg-yellow-50 hover:bg-yellow-100 text-yellow-600' : 'bg-green-50 hover:bg-green-100 text-green-700' }} px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                    @if($post->is_published)
                                        <i class="fas fa-eye-slash mr-1"></i> Unpublish
                                    @else
                                        <i class="fas fa-eye mr-1"></i> Publish
                                    @endif
                                </button>
                            </form>

                            {{-- Hapus --}}
                            <x-modal
                                id="deletePost{{ $post->id }}"
                                :action="route('admin.post.destroy', $post->id)"
                                title="Hapus Post"
                                message="Apakah kamu yakin ingin menghapus Post ini?"
                                confirm="Ya, Hapus"
                                triggerClass="w-full bg-red-50 hover:bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors"
                            />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
