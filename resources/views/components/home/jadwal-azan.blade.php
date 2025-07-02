<section class="bg-white text-gray-800 py-13">
    <div class="max-w-6xl mx-auto px-4">
        <div class="border-t-2 border-gray-300 w-full mb-12"></div>

        <h1 class="text-3xl font-bold text-center text-gray-800 mt-12 mb-12">JADWAL AZAN</h1>

        <p class="text-center text-lg text-gray-600 mb-8" id="currentDateJS">
            Hari Ini: Memuat tanggal...
        </p>

        <div id="prayerTimesError"
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 hidden" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline" id="errorMessageJS"></span>
        </div>

        <div class="overflow-x-auto rounded-lg shadow-md"> 
            <table class="w-full text-left text-gray-700 bg-white"> 
                <thead class="bg-blue-600 text-white uppercase text-sm">
                    <tr>
                        <th scope="col" class="py-3 px-6 rounded-tl-lg">Waktu Sholat</th>
                        <th scope="col" class="py-3 px-6 rounded-tr-lg">Jam</th>
                    </tr>
                </thead>
                <tbody id="prayerTimesTableBody" class="text-center">
                    <tr>
                        <td class="py-3 px-6 font-medium text-gray-900">Subuh</td>
                        <td class="py-3 px-6" id="fajrTime">Memuat...</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-6 font-medium text-gray-900">Dzuhur</td>
                        <td class="py-3 px-6" id="dhuhrTime">Memuat...</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-6 font-medium text-gray-900">Ashar</td>
                        <td class="py-3 px-6" id="asrTime">Memuat...</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-6 font-medium text-gray-900">Maghrib</td>
                        <td class="py-3 px-6" id="maghribTime">Memuat...</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-6 font-medium text-gray-900 rounded-bl-lg">Isya</td>
                        <td class="py-3 px-6 rounded-br-lg" id="ishaTime">Memuat...</td>
                    </tr>
                </tbody>
            </table>
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

        document.getElementById('currentDateJS').textContent = `Hari Ini: ${formattedDate}`;

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
                            document.getElementById('fajrTime').textContent = timings.Fajr;
                            document.getElementById('dhuhrTime').textContent = timings.Dhuhr;
                            document.getElementById('asrTime').textContent = timings.Asr;
                            document.getElementById('maghribTime').textContent = timings.Maghrib;
                            document.getElementById('ishaTime').textContent = timings.Isha;
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
                    'Gagal memuat jadwal sholat.';
                document.getElementById('fajrTime').textContent = 'N/A';
                document.getElementById('dhuhrTime').textContent = 'N/A';
                document.getElementById('asrTime').textContent = 'N/A';
                document.getElementById('maghribTime').textContent = 'N/A';
                document.getElementById('ishaTime').textContent = 'N/A';
            });
    });
</script>