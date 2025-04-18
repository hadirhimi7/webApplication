<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Dashboard</title>
    @vite('resources/css/app.css') <!-- TailwindCSS load -->
</head>
<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col p-6">
        <h1 class="text-2xl font-bold mb-8">Delivery App</h1>

        <nav class="flex flex-col space-y-4">
            <a href="{{ route('client.dashboard') }}" class="hover:text-gray-300">Dashboard</a>
            <a href="{{ route('client.createDelivery') }}" class="hover:text-gray-300">Create Delivery</a>
            <a href="{{ route('client.browseDrivers') }}" class="hover:text-gray-300">Browse Drivers</a>
            <a href="{{ route('client.myDeliveries') }}" class="hover:text-gray-300">My Deliveries</a>

            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf
                <button type="submit" class="hover:text-gray-300">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</body>
</html>