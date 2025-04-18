<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 px-6 py-12">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-indigo-600">Welcome Back</h2>
                <p class="mt-2 text-sm text-gray-500">Please sign in to your account</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Sign In
                    </button>
                </div>

                <div class="text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Sign Up</a>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700 text-sm">&larr; Back to Home</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>