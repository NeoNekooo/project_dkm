<section class="w-full relative  shadow-xl overflow-hidden h-[90%]  ">
    @php
        $images = [
            'https://i.pinimg.com/736x/b7/d2/b2/b7d2b2fa7e5fee19c3bcabaa85eb6f05.jpg',
            'https://i.pinimg.com/736x/39/1d/2d/391d2d56b0c09cf6c513d031086da7c2.jpg',
            'https://i.pinimg.com/736x/e5/1d/48/e51d4830b30afce39e363557c256ce52.jpg',
        ];
    @endphp

    @foreach ($images as $index => $img)
        <img src="{{ $img }}"
            class="slide-img absolute inset-0 w-full h-full object-cover transition-opacity duration-[2000ms] ease-in-out opacity-0 scale-100 @if ($index == 0) opacity-100 @endif"
            style="transition: transform 3s ease-in-out;"
            alt="Galeri Masjid {{ $index + 1 }}">
    @endforeach

    <!-- Gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent z-10"></div>

    <!-- Caption -->
    <div class="absolute bottom-6 left-6 z-20 text-white text-xl md:text-2xl font-semibold backdrop-blur-md bg-white/10 px-4 py-2 shadow-lg border border-white/20">
        Galeri Masjid
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const slides = document.querySelectorAll(".slide-img");
        let current = 0;

        setInterval(() => {
            slides[current].classList.remove("opacity-100");
            slides[current].classList.add("opacity-0");
            slides[current].style.transform = 'scale(1)';

            current = (current + 1) % slides.length;

            slides[current].classList.remove("opacity-0");
            slides[current].classList.add("opacity-100");
            slides[current].style.transform = 'scale(1.05)'; // slight zoom
        }, 6000); // Every 6s
    });
</script>
