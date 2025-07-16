<section class="relative py-12 bg-white">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-green-800 mb-4">Struktur Organisasi {{$profil->nama}}</h2>
        <p class="text-gray-600 mb-8">Berikut adalah susunan kepengurusan DKM yang bertanggung jawab dalam pengelolaan masjid.</p>

        @if($organigram && $organigram->gambar)
            <div class="relative overflow-hidden rounded-xl shadow-xl border border-gray-200">
                <img 
                    src="{{ asset('storage/' . $organigram->gambar) }}" 
                    alt="Struktur Organisasi" 
                    class="w-full h-auto mx-auto object-contain"
                >
            </div>
        @else
            <p class="text-red-500">Belum ada gambar organigram yang tersedia.</p>
        @endif
    </div>
</section>