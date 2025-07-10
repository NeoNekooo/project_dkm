@props(['program'])

<section class="bg-white rounded-xl shadow p-6 md:p-10 space-y-10">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-green-700 mb-2">Program Amalan</h2>
        <p class="text-gray-600">Masjid Al-Mubarokah</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Menu Harian -->
        <div>
            <h3 class="text-green-600 font-semibold mb-2">Menu Harian</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                @foreach ($program['menu_harian'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Menu Mingguan -->
        <div>
            <h3 class="text-green-600 font-semibold mb-2">Menu Mingguan</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                @foreach ($program['menu_mingguan'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Program Muslimah -->
        <div>
            <h3 class="text-green-600 font-semibold mb-2">Program Muslimah</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                @foreach ($program['program_muslimah'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Menu Bulanan/Tahunan -->
        <div>
            <h3 class="text-green-600 font-semibold mb-2">Menu Bulanan / Tahunan</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                @foreach ($program['menu_bulanan'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
