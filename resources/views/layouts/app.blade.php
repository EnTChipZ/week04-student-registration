<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration System')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col font-sans antialiased text-gray-900">
    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-md text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('students.index') }}" class="flex items-center space-x-2">
                        <i class="fa-solid fa-graduation-cap text-2xl"></i>
                        <span class="font-bold text-lg tracking-wide">ITST 302 Registry</span>
                    </a>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('students.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">Students List</a>
                    <a href="{{ route('students.create') }}" class="hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium bg-blue-800">Register Student</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex-grow w-full">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-950 font-bold">&times;</button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto py-4">
        <div class="max-w-7xl mx-auto text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} ITST 302 – Client-Server Technologies. All rights reserved.
        </div>
    </footer>
</body>
</html>
