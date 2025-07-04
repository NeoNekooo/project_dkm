<section class="bg-emerald-900 text-white py-16">
    <div class="max-w-6xl mx-auto px-4">

        <div class="garisatas-white"></div>

        <h1 class="text-3xl font-bold text-center text-white mt-12 mb-12">LOKASI KAMI</h1>

        <div class="w-full mt-12">
            <iframe
                src="{{ $profil->kontak->map }}"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded-lg shadow-md"
            ></iframe>
        </div>
    </div>
</section>
