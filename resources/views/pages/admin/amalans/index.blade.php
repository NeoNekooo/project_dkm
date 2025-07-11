@extends('layouts.admin.app') 

@section('title', 'Daftar Amalan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.amalans.create') }}"
       class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all">
        <i class="fas fa-plus mr-1"></i> Tambah Amalan
    </a>
</div>

@if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-600">
            <tr>
                <th class="px-6 py-3 text-left font-medium">Kategori</th>
                <th class="px-6 py-3 text-left font-medium">Nama Amalan</th>
                <th class="px-6 py-3 text-left font-medium">Deskripsi</th>
                <th class="px-6 py-3 text-left font-medium">Waktu</th>
                <th class="px-6 py-3 text-center font-medium">Urutan</th>
                <th class="px-6 py-3 text-center font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($amalans as $amalan)
                <tr>
                    <td class="px-6 py-4">{{ $amalan->kategori }}</td>
                    <td class="px-6 py-4">{{ $amalan->nama_amalan }}</td>
                    <td class="px-6 py-4">{{ $amalan->deskripsi ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $amalan->waktu ?? '-' }}</td>
                    <td class="px-6 py-4 text-center">{{ $amalan->urutan ?? '-' }}</td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('admin.amalans.edit', $amalan->id) }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                            Edit
                        </a>
                        <form action="{{ route('admin.amalans.destroy', $amalan->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus amalan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada amalan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection