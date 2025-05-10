@extends('layouts.driverpage')

@section('content')
<div class="dashboard" style="padding: 24px; background: linear-gradient(135deg, #6b46c1, #3b82f6); color: white; border-radius: 8px; text-align: center;">
    <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 24px;">Driver Dashboard</h1>

    <!-- Cards for each section -->
    <div class="card-container" style="display: flex; flex-wrap: wrap; gap: 16px; justify-content: center; margin-bottom: 24px;">
        <!-- Dashboard Overview Card -->
        <a href="#overview" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Dashboard Overview</h3>
            <p>See a summary of your total deliveries, active deliveries, and earnings.</p>
        </a>

        <!-- Upcoming & Active Deliveries Card -->
        <a href="#active-deliveries" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Upcoming & Active Deliveries</h3>
            <p>Track your current and upcoming deliveries.</p>
        </a>

        <!-- Delivery History Card -->
        <a href="#delivery-history" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Delivery History</h3>
            <p>Review the details of your past deliveries.</p>
        </a>

        <!-- Interactive Map Card -->
        <a href="#map" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Interactive Map</h3>
            <p>View a live map with your delivery routes.</p>
        </a>

        <!-- Profile Management Card -->
        <a href="#profile-management" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Profile Management</h3>
            <p>Update your profile information.</p>
        </a>

        <!-- Performance Metrics Card -->
        <a href="#performance-metrics" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Performance Metrics</h3>
            <p>See your performance over the week.</p>
        </a>

        <!-- Help and Support Card -->
        <a href="#support" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Help and Support</h3>
            <p>Get help and resolve issues.</p>
        </a>

        <!-- Notifications Card -->
        <a href="#notifications" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Notifications</h3>
            <p>Check the latest updates.</p>
        </a>

        <!-- Payment Card -->
        <a href="#payment" style="text-decoration: none; width: 250px; padding: 16px; background-color: #ffffff; color: #333333; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 12px;">Payment</h3>
            <p>Request your earnings payout.</p>
        </a>
    </div>

  <!-- Dashboard Overview -->
<section id="overview" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Dashboard Overview</h2>
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
        <div style="background-color: #f9fafb; padding: 16px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <h3 style="font-weight: 600; color: #4a5568;">Total Deliveries</h3>
            <p style="font-size: 1.5rem; font-weight: bold; color: #48bb78;">120</p>
        </div>
        <div style="background-color: #f9fafb; padding: 16px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <h3 style="font-weight: 600; color: #4a5568;">Active Deliveries</h3>
            <p style="font-size: 1.5rem; font-weight: bold; color: #4299e1;">5</p>
        </div>
        <div style="background-color: #f9fafb; padding: 16px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <h3 style="font-weight: 600; color: #4a5568;">Earnings This Week</h3>
            <p style="font-size: 1.5rem; font-weight: bold; color: #9f7aea;">$450</p>
        </div>
    </div>
</section>

<!-- Upcoming & Active Deliveries -->
<section id="active-deliveries" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Upcoming & Active Deliveries</h2>
    <table style="width: 100%; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-collapse: collapse; overflow: hidden;">
        <thead>
            <tr style="background-color: #f7fafc;">
                <th style="padding: 12px; text-align: left; font-weight: bold; border-bottom: 1px solid #ddd; color: #333333;">Delivery ID</th>
                <th style="padding: 12px; text-align: left; font-weight: bold; border-bottom: 1px solid #ddd; color: #333333;">Pickup Location</th>
                <th style="padding: 12px; text-align: left; font-weight: bold; border-bottom: 1px solid #ddd; color: #333333;">Drop-off Location</th>
                <th style="padding: 12px; text-align: left; font-weight: bold; border-bottom: 1px solid #ddd; color: #333333;">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd; color: #4a4a4a;">#101</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd; color: #4a4a4a;">Downtown</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd; color: #4a4a4a;">Suburb</td>
                <td style="padding: 12px; color: #4299e1; font-weight: bold; border-bottom: 1px solid #ddd;">Active</td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd; color: #4a4a4a;">#102</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd; color: #4a4a4a;">City Center</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd; color: #4a4a4a;">Riverside</td>
                <td style="padding: 12px; color: #48bb78; font-weight: bold; border-bottom: 1px solid #ddd;">Upcoming</td>
            </tr>
        </tbody>
    </table>
</section>


<!-- Delivery History -->
<section id="delivery-history" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Delivery History</h2>
    <div style="overflow-y: auto; max-height: 160px;">
        <ul style="background-color: #ffffff; padding: 16px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <li style="border-bottom: 1px solid #ddd; padding: 8px 0; color: #4a4a4a;">
                <strong>Delivery #100:</strong> Completed on April 22, 2025.
            </li>
            <li style="border-bottom: 1px solid #ddd; padding: 8px 0; color: #4a4a4a;">
                <strong>Delivery #99:</strong> Completed on April 21, 2025.
            </li>
            <li style="padding: 8px 0; color: #4a4a4a;">
                <strong>Delivery #98:</strong> Completed on April 20, 2025.
            </li>
        </ul>
    </div>
</section>
<!-- Interactive Map -->
<section id="map" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Interactive Map</h2>
    <div id="map-container" style="width: 100%; height: 256px; background-color: #e2e8f0; border-radius: 8px;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const map = L.map('map-container').setView([33.8938, 35.5018], 12); // Coordinates for Lebanon
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
        });
    </script>
</section>


 <!-- Profile Management -->
<section id="profile-management" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Profile Management</h2>
    <form>
        <!-- Name Field -->
        <label style="display: block; margin-bottom: 8px; color: #333333;">Name:</label>
        <input type="text" style="width: 100%; padding: 8px; margin-bottom: 16px; border-radius: 8px; border: 1px solid #ccc;" placeholder="Enter your name">
        
        <!-- Email Field -->
        <label style="display: block; margin-bottom: 8px; color: #333333;">Email:</label>
        <input type="email" style="width: 100%; padding: 8px; margin-bottom: 16px; border-radius: 8px; border: 1px solid #ccc;" placeholder="Enter your email">
        
        <!-- Password Field -->
        <label style="display: block; margin-bottom: 8px; color: #333333;">Password:</label>
        <input type="password" style="width: 100%; padding: 8px; margin-bottom: 16px; border-radius: 8px; border: 1px solid #ccc;" placeholder="Enter your password">
        
        <!-- Car Type Field -->
        <label style="display: block; margin-bottom: 8px; color: #333333;">Car Type:</label>
        <select style="width: 100%; padding: 8px; margin-bottom: 16px; border-radius: 8px; border: 1px solid #ccc;">
            <option value="sedan">Sedan</option>
            <option value="suv">SUV</option>
            <option value="truck">Truck</option>
            <option value="van">Van</option>
            <option value="coupe">Coupe</option>
        </select>

        <!-- Update Button -->
        <button type="submit" style="padding: 8px 16px; background-color: #4299e1; color: white; border-radius: 8px; border: none;">Update Profile</button>
    </form>
</section>

<!-- Performance Metrics -->
<section id="performance-metrics" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Performance Metrics</h2>
    <canvas id="performance-chart" style="width: 100%; height: 160px;"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('performance-chart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                    datasets: [{
                        label: 'Deliveries',
                        data: [5, 10, 7, 8, 6],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }]
                }
            });
        });
    </script>
</section>

<!-- Help and Support -->
<section id="support" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Help and Support</h2>
    <form>
        <textarea style="width: 100%; padding: 8px; margin-bottom: 16px; border-radius: 8px; border: 1px solid #ccc;" rows="4" placeholder="Describe your issue"></textarea>
        <button type="submit" style="padding: 8px 16px; background-color: #48bb78; color: white; border-radius: 8px; border: none;">Submit</button>
    </form>
</section>

<!-- Notifications -->
<section id="notifications" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Notifications</h2>
    <ul style="background-color: #ffffff; padding: 16px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <li style="border-bottom: 1px solid #ddd; padding: 8px 0; color: #4a4a4a;">Delivery #101: Pickup scheduled for 2 PM.</li>
        <li style="border-bottom: 1px solid #ddd; padding: 8px 0; color: #4a4a4a;">System update completed successfully.</li>
        <li style="padding: 8px 0; color: #4a4a4a;">Earnings have been updated.</li>
    </ul>
</section>

<!-- Payment Section -->
<section id="payment" style="padding: 16px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 24px;">
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 16px; color: #333333;">Payment</h2>
    <p style="color: #333333;">Total Earnings: <strong>$1200</strong></p>
    <button style="padding: 8px 16px; background-color: #4299e1; color: white; border-radius: 8px; border: none;">Request Payout</button>
</section>
    </div>
</div>
@endsection
<style>
    .card-container a:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }
</style>