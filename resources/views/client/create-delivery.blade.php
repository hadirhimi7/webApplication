@extends('client.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Create New Delivery</h1>

    <form method="POST" action="{{ route('client.storeDelivery') }}" class="grid grid-cols-1 gap-6 bg-white p-8 rounded shadow-md">
        @csrf

        <!-- Pickup Location with Suggestions -->
        <div>
            <label class="block text-gray-700">Pickup Location</label>
            <input type="text" id="pickup_location" name="pickup_location" class="w-full border-gray-300 rounded p-2 mt-1" required autocomplete="off">
            <ul id="pickup_suggestions" class="bg-white border border-gray-300 rounded mt-1 hidden"></ul>
            <input type="hidden" name="pickup_lat">
            <input type="hidden" name="pickup_lng">
        </div>

        <!-- Drop-off Location with Suggestions -->
        <div>
            <label class="block text-gray-700">Drop-off Location</label>
            <input type="text" id="dropoff_location" name="dropoff_location" class="w-full border-gray-300 rounded p-2 mt-1" required autocomplete="off">
            <ul id="dropoff_suggestions" class="bg-white border border-gray-300 rounded mt-1 hidden"></ul>
            <input type="hidden" name="dropoff_lat">
            <input type="hidden" name="dropoff_lng">
        </div>

        <div>
            <label class="block text-gray-700">Package Size</label>
            <select name="package_size" class="w-full border-gray-300 rounded p-2 mt-1">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700">Package Weight (kg)</label>
            <input type="number" name="package_weight" class="w-full border-gray-300 rounded p-2 mt-1" required>
        </div>

        <div>
            <label class="block text-gray-700">Delivery Urgency</label>
            <div class="flex items-center gap-6 mt-2">
                <label><input type="radio" name="urgency" value="normal" checked> Normal</label>
                <label><input type="radio" name="urgency" value="urgent"> Urgent</label>
            </div>
        </div>

        <div>
            <label class="block text-gray-700">Assign Driver</label>
            <select name="driver_id" class="w-full border-gray-300 rounded p-2 mt-1">
                <option value="" selected disabled>Select a driver</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->user->id }}">
                        {{ $driver->user->name }} ({{ $driver->vehicle_type }})
                    </option>
                @endforeach
            </select>
        </div>


        <div>
            <label class="block text-gray-700">Payment Method</label>
            <select name="payment_method" class="w-full border-gray-300 rounded p-2 mt-1">
                <option>Credit Card</option>
                <option>Crypto</option>
                <option>Cash on Delivery</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Submit Delivery</button>
        </div>
    </form>

    <!-- JS Script for OpenCage Suggestions + Console Logs -->
    <script>
        const opencageUrl = "{{ env('OPENCAGE_API_URL') }}";
        const opencageKey = "{{ env('OPENCAGE_API_KEY') }}";

        function attachAutoComplete(inputId, suggestionsId, latField, lngField) {
            const input = document.getElementById(inputId);
            const suggestions = document.getElementById(suggestionsId);

            input.addEventListener('input', function () {
                const query = input.value.trim();
                if (query.length < 3) {
                    suggestions.innerHTML = '';
                    suggestions.classList.add('hidden');
                    return;
                }

                fetch(`${opencageUrl}?q=${encodeURIComponent(query)}&key=${opencageKey}&limit=5`)
                    .then(response => response.json())
                    .then(data => {
                        suggestions.innerHTML = '';
                        data.results.forEach(result => {
                            const li = document.createElement('li');
                            li.textContent = result.formatted;
                            li.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                            li.addEventListener('click', () => {
                                input.value = result.formatted;
                                const lat = result.geometry.lat;
                                const lng = result.geometry.lng;
                                document.querySelector(`input[name="${latField}"]`).value = lat;
                                document.querySelector(`input[name="${lngField}"]`).value = lng;
                                console.log(`${inputId} selected:`, { latitude: lat, longitude: lng });
                                suggestions.classList.add('hidden');
                            });
                            suggestions.appendChild(li);
                        });
                        suggestions.classList.remove('hidden');
                    });
            });

            document.addEventListener('click', function (e) {
                if (!suggestions.contains(e.target) && e.target !== input) {
                    suggestions.classList.add('hidden');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            attachAutoComplete('pickup_location', 'pickup_suggestions', 'pickup_lat', 'pickup_lng');
            attachAutoComplete('dropoff_location', 'dropoff_suggestions', 'dropoff_lat', 'dropoff_lng');
        });
    </script>
@endsection
