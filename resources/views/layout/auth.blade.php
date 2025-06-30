<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }} | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-sm p-6 bg-white rounded-xl shadow-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Login</h1>
            <p class="text-sm text-gray-500">Masukan username dan katasandi anda</p>
        </div>

        <form action="{{ route('login.action') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <div class="mt-1 relative">
                    <input type="text" name="name" id="name"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Username">
                    <div class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1 relative">
                    <input type="password" name="password" id="password"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Password">
                    <div class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300">
                    Ingat sesi
                </label>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Log In
                </button>
            </div>
        </form>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
