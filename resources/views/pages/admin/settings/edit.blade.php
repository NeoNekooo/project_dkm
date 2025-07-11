    @extends('layouts.admin.app')
    @section('title', 'Pengaturan Profil')

    @section('content')
        @if (session('success'))
            <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700 border border-red-200">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Foto Profil -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                <div class="flex items-center space-x-4">
                    <img
                        src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                        alt="Foto Profil"
                        class="w-16 h-16 rounded-full border border-gray-300 object-cover"
                    >
                    <input type="file" name="photo" accept="image/*" class="text-sm text-gray-600">
                </div>
            </div>

            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none"
                    required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none"
                    required>
            </div>

            <!-- Password -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none"
                        placeholder="Kosongkan jika tidak ingin ganti">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-200 focus:outline-none"
                        placeholder="Ulangi kata sandi baru">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow-sm transition-all duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    @endsection
