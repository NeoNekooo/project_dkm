<!DOCTYPE html class="scroll-smooth" x-cloak>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />a
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

        <nav class="bg-white shadow-md py-3 px-6 flex justify-between items-center sticky top-0 z-50 w-full">
            <!-- Left Section -->
            <div class="flex items-center space-x-4">
                <!-- Mobile Menu Button (hidden on larger screens) -->
                <button
                    id="sidebarToggle"
                    class="text-gray-600 hover:text-gray-900 md:hidden focus:outline-none focus:ring-2 focus:ring-green-500 rounded p-1 transition-colors"
                    aria-label="Toggle menu"
                    aria-expanded="false"
                >
                    <i class="fas fa-bars text-xl w-6 h-6 flex items-center justify-center"></i>
                </button>

                <!-- Logo/Brand -->
                <a href="{{ url('/') }}" class="flex items-center group">
                    <img
                        src="{{ asset('storage/' . $profil->logo) }}"
                        alt="{{ $profil->nama }} Logo"
                        class="h-8 w-auto mr-2 transition-transform group-hover:scale-105"
                    >
                    <span class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">
                        {{ $profil->nama }}
                    </span>
                </a>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-3">
                <!-- Home Button -->
                <a
                    href="{{ url('/') }}"
                    class="flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                    aria-label="Go to homepage"
                >
                    <i class="fas fa-home mr-2"></i>
                    <span class="hidden sm:inline">Beranda</span>
                </a>

                <!-- Logout Button -->

            </div>
        </nav>

        <!-- Wrapper -->
        <div class="flex flex-1">

            <!-- Sidebar - Green Theme -->
            <aside id="sidebar" class="w-64 bg-gradient-to-b from-green-700 to-green-800 text-white py-6 px-4 hidden md:block transition-all duration-300">
                <!-- User Profile -->
                <div class="flex flex-col items-center mb-8">
                    <div class="relative mb-3">
                        <img
                         src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
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

                    </a>
                    <a href="{{ route('admin.profil.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-user-circle w-5"></i>
                        <span>Kelola Profil</span>

                    </a>
                    <a href="{{ route('admin.kontak.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-address-book w-5"></i>
                        <span>Kelola Kontak</span>

                    </a>
                    <a href="{{ route('admin.tentang.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-info-circle w-5"></i>
                        <span>Tentang Kami</span>

                    </a>
                    <a href="{{ route('admin.infaq.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-coins  w-5"></i>
                        <span>Infaq</span>

                    </a>
                    <a href="{{ route('admin.post.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-pencil  w-5"></i>
                        <span>Post</span>

                    </a>
                    <a href="{{ route('admin.gallery.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-image  w-5"></i>
                        <span>Gallery</span>

                    </a>
                    <a href="{{ route('admin.kegiatan.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-calendar  w-5"></i>
                        <span>Kegiatan</span>

                    </a>
                    <a href="{{ route('admin.program.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-person-running  w-5"></i>
                        <span>Program</span>

                    </a>
                     <a href="{{ route('admin.amalans.index') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-mosque  w-5"></i>
                        <span>Amalan Ramadhan</span>
                    </a>
                    <a href="{{ route('admin.settings.edit') }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <i class="fas fa-gear  w-5"></i>
                        <span>Settings</span>

                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="flex items-center gap-3 mt-8 py-3 bg-red-500 hover:bg-red-600 text-white px-4 rounded-lg text-sm font-medium transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            aria-label="Logout"
                        >
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </nav>

                <!-- Sidebar Footer -->
                {{-- <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs text-green-200 ">
                    <p>DKM Masjid Al-Ikhlash</p>
                    <p class="mt-1">© {{ date('Y') }}</p>
                </div> --}}
            </aside>

            <!-- Content - White Theme -->
            <main class="flex-1 p-4 bg-gray-50">
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
            <div class="bg-white rounded-xl shadow-sm border border-gray-100  w-full max-w-screen-xl mx-auto">

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
