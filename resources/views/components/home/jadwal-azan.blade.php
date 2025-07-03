<section class="relative bg-gradient-to-b from-white to-gray-50 py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-50 rounded-full blur-[100px] opacity-40"></div>

    <!-- Subtle Islamic pattern -->
    <div class="absolute inset-0 opacity-5 bg-[url('https://i.pinimg.com/736x/3e/3f/4f/3e3f4f19b77e2cd505cf4d1d7b30f3e2.jpg')] bg-cover mix-blend-overlay"></div>

    <div class="relative z-10 max-w-4xl mx-auto">
        <!-- Section header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-4 mb-4">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 font-medium uppercase tracking-wider">Jadwal Sholat</span>
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Waktu Azan Hari Ini
            </h1>
            <p class="text-lg text-gray-600" id="currentDateJS">
                Memuat tanggal...
            </p>
        </div>

        <!-- Error message -->
        <div id="prayerTimesError" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-8 hidden" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd"></path>
                </svg>
                <strong class="font-bold">Error! </strong>
                <span class="block sm:inline ml-1" id="errorMessageJS"></span>
            </div>
        </div>

        <!-- Prayer times table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-green-600 to-green-500 text-white">
                    <tr>
                        <th class="py-4 px-6 text-left font-semibold">Waktu Sholat</th>
                        <th class="py-4 px-6 text-right font-semibold">Jam</th>
                    </tr>
                </thead>
                <tbody id="prayerTimesTableBody" class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 font-medium text-gray-900 text-left">Subuh</td>
                        <td class="py-4 px-6 text-green-600 font-medium text-right" id="fajrTime">Memuat...</td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 font-medium text-gray-900 text-left">Dzuhur</td>
                        <td class="py-4 px-6 text-green-600 font-medium text-right" id="dhuhrTime">Memuat...</td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 font-medium text-gray-900 text-left">Ashar</td>
                        <td class="py-4 px-6 text-green-600 font-medium text-right" id="asrTime">Memuat...</td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 font-medium text-gray-900 text-left">Maghrib</td>
                        <td class="py-4 px-6 text-green-600 font-medium text-right" id="maghribTime">Memuat...</td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 font-medium text-gray-900 text-left">Isya</td>
                        <td class="py-4 px-6 text-green-600 font-medium text-right" id="ishaTime">Memuat...</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Location info -->
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>Lokasi: Masjid Al-Ikhlash, Vila Mutiara Cikarang</p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const latitude = -6.8208;
        const longitude = 107.1437;
        const method = 2;
        const today = new Date();
        const month = today.getMonth() + 1;
        const year = today.getFullYear();
        const formattedDate = new Intl.DateTimeFormat('id-ID', {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        }).format(today);

        document.getElementById('currentDateJS').textContent = formattedDate;

        const apiUrl =
            `https://api.aladhan.com/v1/calendar?latitude=${latitude}&longitude=${longitude}&method=${method}&month=${month}&year=${year}`;

        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.data && data.data.length > 0) {
                    const todayDateString =
                        `${String(today.getDate()).padStart(2, '0')}-${String(today.getMonth() + 1).padStart(2, '0')}-${today.getFullYear()}`;

                    let found = false;
                    for (let i = 0; i < data.data.length; i++) {
                        if (data.data[i].date.gregorian.date === todayDateString) {
                            const timings = data.data[i].timings;

                            // Format times to remove timezone info (e.g., "04:28 (WIB)")
                            const formatTime = (timeStr) => timeStr.split(' ')[0];

                            document.getElementById('fajrTime').textContent = formatTime(timings.Fajr);
                            document.getElementById('dhuhrTime').textContent = formatTime(timings.Dhuhr);
                            document.getElementById('asrTime').textContent = formatTime(timings.Asr);
                            document.getElementById('maghribTime').textContent = formatTime(timings.Maghrib);
                            document.getElementById('ishaTime').textContent = formatTime(timings.Isha);
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        throw new Error('Jadwal sholat untuk hari ini tidak ditemukan.');
                    }
                } else {
                    throw new Error('Data jadwal sholat tidak valid.');
                }
            })
            .catch(error => {
                console.error('Error fetching prayer times:', error);
                document.getElementById('prayerTimesError').classList.remove('hidden');
                document.getElementById('errorMessageJS').textContent = error.message ||
                    'Gagal memuat jadwal sholat. Silakan coba lagi nanti.';
                document.getElementById('fajrTime').textContent = '--:--';
                document.getElementById('dhuhrTime').textContent = '--:--';
                document.getElementById('asrTime').textContent = '--:--';
                document.getElementById('maghribTime').textContent = '--:--';
                document.getElementById('ishaTime').textContent = '--:--';
            });
    });
</script>
