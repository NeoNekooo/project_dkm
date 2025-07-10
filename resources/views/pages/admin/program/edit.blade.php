{{-- resources/views/pages/admin/program/edit.blade.php --}}
@extends('layouts.admin.app')

@section('title', 'Edit Program')

@section('content')
@php
    $iconOptions = [
        'fa-building' => 'Gedung',
        'fa-mosque' => 'Masjid',
        'fa-hands-helping' => 'Bantuan Sosial',
        'fa-coins' => 'Zakat & Infaq',
        'fa-heart' => 'Kemanusiaan',
        'fa-quran' => 'Al-Qur\'an',
    ];
    $selectedIcon = old('icon', $program->icon ?? 'fa-building');
@endphp
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h1 class="text-xl font-bold mb-4 text-gray-800">Edit Program</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 rounded text-red-700 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.program.update', $program->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title', $program->title) }}" required class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="desc" rows="3" required class="w-full px-4 py-2 border rounded-lg">{{ old('desc', $program->desc) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Icon (Font Awesome)</label>
            <div class="flex items-center gap-3">
                <select name="icon" id="icon-select" onchange="updateIconPreview()" required
                    class="w-full px-4 py-2 border rounded-lg">
                    @foreach ($iconOptions as $icon => $label)
                        <option value="{{ $icon }}" {{ $selectedIcon === $icon ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>

                <!-- Preview -->
                <div id="icon-preview" class="text-2xl text-gray-700 p-2 border rounded-lg bg-gray-50">
                    <i class="fas {{ $selectedIcon }}"></i>
                </div>
            </div>
        </div>




        {{-- Hidden color input --}}
        <input type="hidden" name="color" value="{{ $program->color }}">

        <div class="pt-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Simpan</button>
            <a href="{{ route('admin.program.index') }}" class="ml-2 text-sm text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>

<script>
    function updateIconPreview() {
        const select = document.getElementById('icon-select');
        const icon = select.value;
        document.getElementById('icon-preview').innerHTML = `<i class="fas ${icon}"></i>`;
    }

    // Initialize preview on page load
    document.addEventListener('DOMContentLoaded', updateIconPreview);
</script>

@endsection
