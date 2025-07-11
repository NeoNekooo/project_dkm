{{-- resources/views/pages/admin/pembangunan/index.blade.php --}}
@extends('layouts.admin.app')
@section('title', 'Kelola Pembangunan')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-800">Daftar Tahapan Pembangunan</h1>
        <a href="{{ route('admin.pembangunan.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Tahapan</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-green-100 text-green-800">
                <tr>
                    <th class="p-4 text-left">Judul</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Urutan</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($pembangunans as $item)
                    <tr class="border-b hover:bg-green-50">
                        <td class="p-4">{{ $item->judul }}</td>
                        <td class="p-4">{{ $item->tanggal }}</td>
                        <td class="p-4">{{ $item->urutan }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('admin.pembangunan.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.pembangunan.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus tahapan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
