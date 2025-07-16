@extends('layouts.admin.app')

@section('title', 'Daftar Amalan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Amalan</h1>
        <a href="{{ route('admin.amalans.create') }}"
           class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-sm transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Amalan
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if($amalans->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada amalan</h3>
            <p class="mt-1 text-gray-500">Mulai dengan menambahkan amalan baru</p>
            <div class="mt-6">
                <a href="{{ route('admin.amalans.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
                    Tambah Amalan Pertama
                </a>
            </div>
        </div>
    @else
        <div class="space-y-4">
            @foreach($amalans as $kategori => $list)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        {{ $kategori }}
                    </h3>
                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">
                        {{ count($list) }} Amalan
                    </span>
                </div>

                <div class="divide-y divide-gray-100">
                    @foreach($list as $amalan)
                    <div class="p-5 hover:bg-gray-50 transition-colors">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800 mb-1">{{ $amalan->nama_amalan }}</h4>
                                <p class="text-sm text-gray-600 mb-2">{{ $amalan->deskripsi }}</p>
                                <div class="flex items-center space-x-4 text-sm">
                                    <span class="flex items-center text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $amalan->waktu ?? '-' }}
                                    </span>
                                    <span class="flex items-center text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                        Urutan: {{ $amalan->urutan ?? '-' }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <a href="{{ route('admin.amalans.edit', $amalan->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                   <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                           <x-modal
    :id="$amalan->id"
    :action="route('admin.amalans.destroy', $amalan->id)"
    title="Hapus Amalan"
    :message="'Yakin ingin menghapus ' . $amalan->nama_amalan . '?'"
    confirm="Ya, Hapus"
    trigger="🗑️"
    triggerClass="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-red-700 bg-white hover:bg-gray-50"
/>


                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
