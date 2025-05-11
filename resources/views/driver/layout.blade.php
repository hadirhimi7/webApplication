<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Driver Dashboard</title>
    @vite('resources/css/app.css')  <!-- Make sure Vite is working -->
</head>
<body class="bg-gray-100 h-screen overflow-hidden">

<!-- Container Flex Layout -->
<div class="flex h-screen">

    <!-- Sidebar (Fixed) -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col p-6 fixed left-0 top-0 bottom-0 h-full">
        <h1 class="text-2xl font-bold mb-8">Driver Panel</h1>
        <nav class="flex flex-col space-y-4">
            <a href="{{ route('driver.dashboard') }}" class="hover:text-gray-300">Dashboard</a>
            <a href="{{ route('driver.activeDeliveries') }}" class="hover:text-gray-300">Active Deliveries</a>
            <a href="{{ route('driver.deliveryHistory') }}" class="hover:text-gray-300">Delivery History</a>
            <a href="{{ route('driver.map') }}" class="hover:text-gray-300">Map</a>
            <a href="{{ route('driver.profile') }}" class="hover:text-gray-300">Profile</a>
            <a href="{{ route('driver.performance') }}" class="hover:text-gray-300">Performance</a>
            <a href="{{ route('driver.notifications') }}" class="hover:text-gray-300">Notifications</a>
            <a href="{{ route('driver.payments') }}" class="hover:text-gray-300">Payments</a>
            <a href="{{ route('driver.support') }}" class="hover:text-gray-300">Support</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-gray-300 text-left">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content (Scrollable) -->
    <main class="flex-1 ml-64 p-10 overflow-y-auto h-screen">
        @yield('content')
    </main>

</div>

<!-- Location Tracking Script -->
<script>
    const updateDriverLocation = () => {
        fetch("{{ route('driver.updateLocation') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            credentials: "same-origin"
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(`📍 Location updated: Lat ${data.lat}, Lon ${data.lon}`);
                } else {
                    console.error("❌ Failed to update location:", data.message);
                }
            })
            .catch(err => console.error("🚨 Error updating location:", err));
    };

    updateDriverLocation(); // Immediately update once on load
    setInterval(updateDriverLocation, 300000); // Then every 5 min
</script>

</body>
</html>
