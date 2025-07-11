
{{-- resources/views/pages/admin/pembangunan/_form.blade.php --}}
<div>
    <label class="block mb-1 font-medium">Judul</label>
    <input type="text" name="judul" value="{{ old('judul', $pembangunan->judul ?? '') }}" required class="w-full border rounded px-4 py-2">
</div>

<div>
    <label class="block mb-1 font-medium">Tanggal</label>
    <input type="date" name="tanggal" value="{{ old('tanggal', $pembangunan->tanggal ?? '') }}" required class="w-full border rounded px-4 py-2">
</div>

<div>
    <label class="block mb-1 font-medium">Deskripsi</label>
    <textarea name="deskripsi" rows="4" required class="w-full border rounded px-4 py-2">{{ old('deskripsi', $pembangunan->deskripsi ?? '') }}</textarea>
</div>

<div>
    <label class="block mb-1 font-medium">Gambar (opsional)</label>
    <input type="file" name="gambar" class="w-full border rounded px-4 py-2">
    @if(!empty($pembangunan?->gambar))
        <img src="{{ asset('storage/' . $pembangunan->gambar) }}" alt="Gambar lama" class="mt-2 w-32 h-auto rounded">
    @endif
</div>

<div>
    <label class="block mb-1 font-medium">Urutan</label>
    <input type="number" name="urutan" value="{{ old('urutan', $pembangunan->urutan ?? 0) }}" class="w-full border rounded px-4 py-2">
</div>

<div class="pt-4">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">{{ $button }}</button>
</div>
