@extends('layouts.admin.app')

@section('title', 'Kelola Kegiatan')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-800">Daftar Kegiatan</h1>
        <a href="{{ route('admin.kegiatan.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">+ Tambah Kegiatan</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-green-100 text-green-800">
                <tr>
                    <th class="p-4 text-left">Judul</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Lokasi</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($kegiatans as $item)
                    <tr class="border-b hover:bg-green-50">
                        <td class="p-4">{{ $item->judul }}</td>
                        <td class="p-4">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                        <td class="p-4">{{ $item->lokasi }}</td>
                        <td class="p-4">
                            <form action="{{ route('admin.kegiatan.toggle', $item) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="relative inline-flex h-6 w-11 items-center rounded-full
                                           {{ $item->status ? 'bg-green-600' : 'bg-gray-300' }} transition">
                                    <span class="sr-only">Toggle Status</span>
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white
                                        transition {{ $item->status ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                            </form>
                        </td>

                        <td class="p-4 space-x-2">
                            <a href="{{ route('admin.kegiatan.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.kegiatan.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
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
