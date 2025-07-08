@extends('layouts.user.user')

@section('content')
<section class="py-16 px-6 bg-white">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-green-800 mb-4">{{ $post->title }}</h1>
        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full rounded mb-6">
        <div class="prose max-w-none">
            {!! $post->body !!}
        </div>
        <a href="{{ route('blog') }}" class="mt-8 inline-block text-green-700 hover:underline">← Kembali ke Blog</a>
    </div>
</section>
@endsection
