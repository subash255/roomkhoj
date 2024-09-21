@extends('layouts.app')
@section('content')

    <h2 class="font-bold text-3xl text-amber-600">Dashboard</h2>
    <hr class="h-1 bg-amber-600 mb-8">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-10">
        <!-- Total Users Card -->
        <div class="bg-blue-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Users</h3>
            <p class="text-4xl text-white font-bold">{{ $totalUsers }}</p>
        </div>

        <!-- Total Rooms Card -->
        <div class="bg-red-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Rooms</h3>
            <p class="text-4xl text-white font-bold">{{ $totalRooms }}</p>
        </div>

        <!-- Available Rooms Card -->
        <div class="bg-green-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Available Rooms</h3>
            <p class="text-4xl text-white font-bold">{{ $availableRooms }}</p>
        </div>

        <!-- Pending Requests Card -->
        <div class="bg-green-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Pending Requests</h3>
            <p class="text-4xl text-white font-bold">{{ $pendingRequests }}</p>
        </div>

        <!-- Total Visits Card -->
        <div class="bg-amber-600 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Visits</h3>
            <p class="text-4xl text-white font-bold">{{ $totalVisits }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
        <!-- Pie Chart -->
        <div class="bg-white p-6 shadow-lg rounded-lg">
            <h3 class="font-bold text-2xl text-gray-700 mb-4">Room Availability</h3>
            <canvas id="pieChart"></canvas>
        </div>

        <!-- Bar Chart -->
        <div class="bg-white p-6 shadow-lg rounded-lg">
            <h3 class="font-bold text-2xl text-gray-700 mb-4">User Growth</h3>
            <canvas id="barChart"></canvas>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Pass PHP data directly as a JavaScript variable
        var availableRooms = {{ $availableRooms }};
        var bookedRooms = {{ $bookedRooms }};
        var monthlyUserGrowth = @json($monthlyUserGrowth);

        // Pie Chart Configuration
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Available Rooms', 'Booked Rooms'],
                datasets: [{
                    label: 'Room Availability',
                    data: [availableRooms, bookedRooms],
                    backgroundColor: ['#22c55e', '#ef4444'],
                    hoverBackgroundColor: ['#16a34a', '#dc2626']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Bar Chart Configuration
        var barCtx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // Modify the labels as needed
                datasets: [{
                    label: 'New Users',
                    data: monthlyUserGrowth,
                    backgroundColor: '#3b82f6',
                    hoverBackgroundColor: '#1d4ed8',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
