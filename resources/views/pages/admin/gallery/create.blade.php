@extends('layouts.admin.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Tambah Gambar</h1>

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label>Nama Gambar</label>
            <input type="text" name="name" class="form-input w-full" required>
        </div>
        <div>
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-input w-full" required>
        </div>
        <div>
            <label>Tag</label>
            <input type="text" name="tag" class="form-input w-full" required>
        </div>
        <div>
            <label>Upload Gambar</label>
            <input type="file" name="image" accept="image/*" class="form-input w-full" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
