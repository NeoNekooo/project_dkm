@extends('layouts.admin.app')

@section('title', 'Kelola Program')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Program</h1>
        <a href="{{ route('admin.program.create') }}"
           class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-sm transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Program
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

    @if($programs->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada program</h3>
            <p class="mt-1 text-gray-500">Mulai dengan menambahkan program baru</p>
            <div class="mt-6">
                <a href="{{ route('admin.program.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
                    Tambah Program Pertama
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($programs as $program)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div class="p-5">
                        <div class="flex items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full flex items-center justify-center {{ $program->color }}">
                                    <i class="fa {{ $program->icon }} text-white text-base"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $program->title }}</h3>
                            </div>
                        </div>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $program->desc }}</p>



                        <div class="mt-4 pt-4 border-t border-gray-100 flex justify-end space-x-2">
                            <a href="{{ route('admin.program.edit', $program->id) }}"
                               class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                                Edit
                            </a>

                            {{-- Use your reusable modal --}}
                          <x-modal
    id="deleteProgram{{ $program->id }}"
    :action="route('admin.program.destroy', $program->id)"
    title="Hapus Program"
    message="Apakah kamu yakin ingin menghapus program ini?"
    confirm="Ya, Hapus"
    triggerClass="inline-flex items-center px-3 py-1.5 text-sm rounded-md text-white bg-red-600 hover:bg-red-700"
>

</x-modal>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
