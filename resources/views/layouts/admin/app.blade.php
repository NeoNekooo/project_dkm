<!DOCTYPE html class="scroll-smooth" x-cloak>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/e686fa0059.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">

        <!-- Navbar -->
        <nav class="bg-white shadow-md py-3 px-6 flex justify-between items-center sticky top-0 z-50">
            <div class="flex items-center gap-4">
                <button class="text-gray-600 md:hidden focus:outline-none" id="sidebarToggle">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" class="h-8 mr-2">

                    <span class="text-xl font-bold text-gray-800">{{ env('APP_NAME') }}</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ url('/') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    <i class="fas fa-home mr-1"></i> Beranda
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Wrapper -->
        <div class="flex flex-1">

            <!-- Sidebar - Green Theme -->
            <aside id="sidebar" class="w-64 bg-gradient-to-b from-green-700 to-green-800 text-white py-6 px-4 hidden md:block transition-all duration-300">
                <!-- User Profile -->
                <div class="flex flex-col items-center mb-8">
                    <div class="relative mb-3">
                        <img src="https://i.pinimg.com/736x/f4/60/a3/f460a3a083bf32447cd0ffb2f6bd646d.jpg"
                            class="w-16 h-16 rounded-full border-2 border-green-300 shadow" alt="User Photo">

                    </div>
                    <p class="text-sm font-medium">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-green-200 mt-1">Administrator</p>
                </div>
                <div x-data="{ test: 'Hello' }" x-init="console.log(test)"></div>
                <!-- Navigation -->
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard')}}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        <span>Dashboard</span>
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    </a>
                    <a href="{{ route('admin.profil.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-user-circle w-5"></i>
                        <span>Kelola Profil</span>
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    </a>
                    <a href="{{ route('admin.kontak.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-address-book w-5"></i>
                        <span>Kelola Kontak</span>
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    </a>
                    <a href="{{ route('admin.tentang.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-info-circle w-5"></i>
                        <span>Tentang Kami</span>
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    </a>
                    <a href="{{ route('admin.infaq.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-coins  w-5"></i>
                        <span>Infaq</span>
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    </a>
                    <a href="{{ route('admin.post.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-paper  w-5"></i>
                        <span>Post</span>
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    </a>
                    <a href="{{ route('admin.gallery.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-albums  w-5"></i>
                        <span>Gallery</span>
                        <i class="fas fa-chevron-right ml-auto text-xs opacity-70"></i>
                    </a>
                </nav>

                <!-- Sidebar Footer -->
                {{-- <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs text-green-200 ">
                    <p>DKM Masjid Al-Ikhlash</p>
                    <p class="mt-1">© {{ date('Y') }}</p>
                </div> --}}
            </aside>

            <!-- Content - White Theme -->
            <main class="flex-1 p-6 bg-gray-50">
                <!-- Page Header -->
                <div class="mb-6 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
                        <p class="text-sm text-gray-500">@yield('subtitle', 'Administrator Dashboard')</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">
                            <i class="fas fa-circle text-[6px] mr-1"></i> Online
                        </span>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    @yield('content')
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
            <div class="max-w-6xl mx-auto px-4">
                <p>© {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });
        </script>
</body>

</html>
