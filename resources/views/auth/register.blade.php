<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 px-6 py-12">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-indigo-600">Create Your Account</h2>
                <p class="mt-2 text-sm text-gray-500">Sign up to start using our services</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" name="name" type="text" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>

                <!-- Role Selector -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Register As</label>
                    <select id="role" name="role" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="client">Client</option>
                        <option value="driver">Driver</option>
                    </select>
                </div>

                <!-- Driver Extra Fields (Initially Hidden) -->
                <div id="driver-extra-fields" class="hidden space-y-4">

                    <!-- Vehicle Type -->
                    <div>
                        <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                        <input id="vehicle_type" name="vehicle_type" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>

                    <!-- Plate Number -->
                    <div>
                        <label for="plate_number" class="block text-sm font-medium text-gray-700">Plate Number</label>
                        <input id="plate_number" name="plate_number" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>

                    <!-- License Details -->
                    <div>
                        <label for="license_details" class="block text-sm font-medium text-gray-700">License Details</label>
                        <input id="license_details" name="license_details" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>

                    <!-- Pricing Model -->
                    <div>
                        <label for="pricing_model" class="block text-sm font-medium text-gray-700">Pricing Model</label>
                        <select id="pricing_model" name="pricing_model"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="fixed">Fixed Price</option>
                            <option value="per_km">Price Per Kilometer</option>
                        </select>
                    </div>

                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Sign Up
                    </button>
                </div>

                <div class="text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Sign In</a>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700 text-sm">&larr; Back to Home</a>
                </div>

            </form>
        </div>
    </div>

    <!-- Small JS to toggle driver extra fields -->
    <script>
        const roleSelect = document.getElementById('role');
        const driverFields = document.getElementById('driver-extra-fields');

        roleSelect.addEventListener('change', function() {
            if (this.value === 'driver') {
                driverFields.classList.remove('hidden');
            } else {
                driverFields.classList.add('hidden');
            }
        });
    </script>
</x-guest-layout>