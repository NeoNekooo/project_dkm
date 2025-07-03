<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col">

        <!-- Navbar -->
        <nav class="bg-white border-b shadow px-4 py-3 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <button class="text-gray-600 md:hidden focus:outline-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="text-lg font-semibold">{{ env('APP_NAME') }}</span>
            </div>
           
            <form action="{{ route('logout') }}" method="POST" class="ml-auto">
                 <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                <a href="{{ url('/') }}">Beranda</a>
            </button>
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>

        <!-- Wrapper -->
        <div class="flex flex-1">

            <!-- Sidebar -->
            <aside id="sidebar" class="w-64 bg-gray-800 text-white py-6 px-4 hidden md:block">
                <div class="flex flex-col items-center mb-6">
                    <img src="https://i.pinimg.com/736x/f4/60/a3/f460a3a083bf32447cd0ffb2f6bd646d.jpg"
                        class="w-16 h-16 rounded-full mb-2" alt="User Photo">
                    <p class="text-sm font-medium">{{ Auth::user()->name ?? 'User' }}</p>
                </div>

                <nav class="space-y-2">
                    <a href="" class="block py-2 px-3 rounded hover:bg-gray-700">Dashboard</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Kelola Anggota</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Kelola Kategori Buku</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Kelola Buku</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Kelola Peminjaman</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Laporan Peminjaman</a>
                </nav>
            </aside>

            <!-- Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>

        <footer class="bg-white text-center text-sm text-gray-500 border-t py-2">
            yeye
        </footer>
        <!-- Footer -->
    </div>

    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>

</html>
