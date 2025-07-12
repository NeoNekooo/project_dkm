<section class="relative bg-gradient-to-b from-white to-green-50 py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <!-- Subtle Islamic pattern -->
    <div class="absolute inset-0 opacity-5 bg-[url('https://i.pinimg.com/736x/3e/3f/4f/3e3f4f19b77e2cd505cf4d1d7b30f3e2.jpg')] bg-cover mix-blend-overlay"></div>

    <div class="relative z-10 max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-start">
        <!-- Contact Information -->
        <div class="space-y-6">
            <div class="inline-flex items-center gap-3">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 uppercase tracking-widest text-sm font-medium">Hubungi Kami</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                <span class="text-green-600">Kontak</span> Masjid Kami
            </h2>

            <p class="text-gray-600">
                Silakan hubungi kami untuk informasi lebih lanjut tentang kegiatan masjid, program keagamaan, atau jika Anda membutuhkan bantuan.
            </p>

            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-green-100 rounded-full text-green-600">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <p class="text-gray-800 font-medium">Nomor Telepon</p>
                        @if($profil->kontak && $profil->kontak->nomer1)
                            @foreach(explode(',', $profil->kontak->nomer1) as $phone)
                                <p class="text-gray-600">
                                    <a href="tel:{{ trim($phone) }}" class="hover:text-green-600 transition-colors">
                                        {{ trim($phone) }}
                                    </a>
                                </p>
                            @endforeach
                        @else
                            <p class="text-gray-400">Belum tersedia</p>
                        @endif
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="p-3 bg-green-100 rounded-full text-green-600">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <p class="text-gray-800 font-medium">Alamat Masjid</p>
                        @if($profil->kontak && $profil->kontak->alamat)
                            <p class="text-gray-600">{{ $profil->kontak->alamat }}</p>
                        @else
                            <p class="text-gray-400">Belum tersedia</p>
                        @endif
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-green-100 rounded-full text-green-600">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div>
                        <p class="text-gray-800 font-medium">Media Sosial</p>
                        <div class="flex gap-4 mt-2">
                            @if($profil->fb)
                                <a href="{{ Str::startsWith($profil->fb, 'http') ? $profil->fb : 'https://facebook.com/'.$profil->fb }}"
                                   target="_blank"
                                   class="text-green-600 hover:text-green-800 transition-colors">
                                    <i class="fab fa-facebook-f text-xl"></i>
                                </a>
                            @endif

                            @if($profil->ig)
                                <a href="{{ Str::startsWith($profil->ig, 'http') ? $profil->ig : 'https://instagram.com/'.$profil->ig }}"
                                   target="_blank"
                                   class="text-green-600 hover:text-green-800 transition-colors">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                            @endif

                            @if($profil->yt)
                                <a href="{{ Str::startsWith($profil->yt, 'http') ? $profil->yt : 'https://youtube.com/'.$profil->yt }}"
                                   target="_blank"
                                   class="text-green-600 hover:text-green-800 transition-colors">
                                    <i class="fab fa-youtube text-xl"></i>
                                </a>
                            @endif

                            @if($profil->wa)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->wa) }}"
                                   target="_blank"
                                   class="text-green-600 hover:text-green-800 transition-colors">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Kirim Pesan Langsung</h3>

            <form id="wa-form" onsubmit="return kirimKeWhatsApp(event)">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Depan*</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Nama depan Anda" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Belakang</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Nama keluarga Anda"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300">
                    </div>
                </div>


                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan Anda*</label>
                    <textarea id="message" name="message" rows="4" required placeholder="Tulis pesan Anda di sini..."
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"></textarea>
                </div>

                <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center">
                    <i class="fab fa-whatsapp mr-2 text-xl"></i> Kirim via WhatsApp
                </button>
            </form>
        </div>
    </div>
</section>

<script>
function kirimKeWhatsApp(event) {
    event.preventDefault();

    const namaDepan = document.getElementById("first_name").value;
    const namaBelakang = document.getElementById("last_name").value;
    const pesan = document.getElementById("message").value;

    const nomorAdmin = "{{ preg_replace('/[^0-9]/', '', $profil->wa ?? '') }}";

    if (!nomorAdmin) {
        alert('Nomor WhatsApp admin belum terdaftar');
        return false;
    }

    // Construct message
    let teks = `Assalamu'alaikum Warahmatullahi Wabarakatuh%0A%0A`;
    teks += `*Nama*: ${namaDepan} ${namaBelakang}%0A`;
    teks += `*Pesan*:%0A${encodeURIComponent(pesan)}%0A%0A`;

    const linkWA = `https://wa.me/${nomorAdmin}?text=${teks}`;
    window.open(linkWA, '_blank');

    // Optional: Reset form
    event.target.reset();

    return false;
}
</script>
