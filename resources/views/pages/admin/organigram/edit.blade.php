@extends('layouts.admin.app')
@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Edit Organigram</h2>
    @if(session('success'))
        <div class="bg-green-100 p-2 mb-3 rounded text-green-700">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.organigram.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Gambar Organigram</label>
            <input type="file" name="gambar" class="border p-2 w-full">
            @if($organigram->gambar)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $organigram->gambar) }}" alt="Organigram" class="w-full max-w-lg">
                </div>
            @endif
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
