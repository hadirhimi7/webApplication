<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS via Vite -->
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col p-6 fixed h-full">
        <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>
        <nav class="flex flex-col space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-300">Dashboard</a>
            <a href="{{ route('admin.manageDrivers') }}" class="hover:text-gray-300">Manage Drivers</a>
            <a href="{{ route('admin.deliveries') }}" class="hover:text-gray-300">Deliveries</a>
            <!-- Logout Link Inside Sidebar -->
            <a href="{{ route('logout') }}" class="hover:text-gray-300 mt-6" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 overflow-y-auto">
        @yield('content')
    </main>

</body>
</html>
