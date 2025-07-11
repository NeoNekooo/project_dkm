
{{-- resources/views/pages/admin/pembangunan/create.blade.php --}}
@extends('layouts.admin.app')
@section('title', 'Tambah Pembangunan')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-green-800 mb-6">Tambah Tahapan Pembangunan</h1>

    <form action="{{ route('admin.pembangunan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        @include('pages.admin.pembangunan._form', ['button' => 'Simpan'])
    </form>
</div>
@endsection
