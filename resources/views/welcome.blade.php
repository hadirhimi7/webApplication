<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Delivery App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="text-center p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-4xl font-bold text-indigo-600 mb-4">Welcome to Delivery App</h1>
        <p class="text-gray-600 mb-6">Fast, Reliable, and Professional Delivery Services.</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" 
               class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Log In</a>
            <a href="{{ route('register') }}" 
               class="px-6 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Register</a>
        </div>
    </div>
</body>
</html>