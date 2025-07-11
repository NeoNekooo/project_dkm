
{{-- resources/views/pages/admin/pembangunan/edit.blade.php --}}
@extends('layouts.admin.app')
@section('title', 'Edit Pembangunan')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-green-800 mb-6">Edit Tahapan Pembangunan</h1>

    <form action="{{ route('admin.pembangunan.update', $pembangunan) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        @include('pages.admin.pembangunan._form', ['button' => 'Perbarui'])
    </form>
</div>
@endsection
