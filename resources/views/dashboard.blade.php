@extends('layouts.app')

@section('content')

    <h2 class="font-bold text-4xl text-amber-600 mb-6">Dashboard</h2>
    <hr class="h-1 bg-amber-600 mb-8">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
        <!-- Total Users Card -->
        <div class="bg-blue-600 p-6 shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="font-semibold text-3xl text-white">Total Users</h3>
            <p class="text-5xl text-white font-extrabold">{{ $totalUsers }}</p>
        </div>

        <!-- Total Rooms Card -->
        <div class="bg-red-600 p-6 shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="font-semibold text-3xl text-white">Total Rooms</h3>
            <p class="text-5xl text-white font-extrabold">{{ $totalRooms }}</p>
        </div>

        <!-- Available Rooms Card -->
        <div class="bg-green-600 p-6 shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="font-semibold text-3xl text-white">Available Rooms</h3>
            <p class="text-5xl text-white font-extrabold">{{ $availableRooms }}</p>
        </div>

        <!-- Pending Requests Card -->
        <div class="bg-yellow-600 p-6 shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="font-semibold text-3xl text-white">Pending Requests</h3>
            <p class="text-5xl text-white font-extrabold">{{ $pendingRequests }}</p>
        </div>

        <!-- Total Visits Card -->
        <div class="bg-amber-600 p-6 shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="font-semibold text-3xl text-white">Total Visits</h3>
            <p class="text-5xl text-white font-extrabold">{{ $totalVisits }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        <!-- Booking Trends (Line Chart) -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="font-bold text-xl text-gray-800 mb-4">Booking Trends</h3>
            <canvas id="line-chart" class="chart-canvas" height="300px"></canvas>
        </div>

        <!-- Total Visits per Day (Pie Chart) -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="font-bold text-xl text-gray-800 mb-4">Total Visits Per Day</h3>
            <canvas id="pie-chart" class="chart-canvas" height="300px"></canvas>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Line Chart for Booking Trends
        const ctxLine = document.getElementById('line-chart').getContext('2d');
        const monthlyUserGrowth = JSON.parse('{!! json_encode($monthlyUserGrowth) !!}');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: Object.keys(monthlyUserGrowth), // Months as labels
                datasets: [{
                    label: 'Bookings',
                    data: Object.values(monthlyUserGrowth), // Monthly growth data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.5)'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(200, 200, 200, 0.5)'
                        }
                    }
                }
            }
        });

        // Pie Chart for Total Visits Per Day
        const ctxPie = document.getElementById('pie-chart').getContext('2d');
        const visitedUsersPerDay = JSON.parse('{!! json_encode($visitedUsersPerDay) !!}');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: Object.keys(visitedUsersPerDay), // Dates as labels
                datasets: [{
                    label: 'Visits',
                    data: Object.values(visitedUsersPerDay), // Visits per day data
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(201, 203, 207, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(201, 203, 207, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    </script>

@endsection
