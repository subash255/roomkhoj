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

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10">
        <!-- Booking Trends (Line Chart) -->
        <div class="card bg-white shadow-md rounded-lg p-4">
            <h3 class="font-bold text-lg text-gray-800 mb-4">Booking Trends</h3>
            <canvas id="line-chart" class="chart-canvas" height="300px"></canvas>
        </div>

        <!-- Total Visits per Day (Pie Chart) -->
        <div class="card bg-white shadow-md rounded-lg p-4">
            <h3 class="font-bold text-lg text-gray-800 mb-4">Total Visits Per Day</h3>
            <canvas id="pie-chart" class="chart-canvas" height="300px"></canvas>
        </div>
    </div>

    <script>
    // Line Chart for Booking Trends
    const ctxLine = document.getElementById('line-chart').getContext('2d');
    const monthlyUserGrowth = @json($monthlyUserGrowth);
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
    const visitedUsersPerDay = @json($visitedUsersPerDay);
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
                    'rgba(75, 192, 192, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
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
